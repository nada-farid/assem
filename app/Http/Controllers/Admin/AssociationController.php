<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyAssociationRequest;
use App\Http\Requests\StoreAssociationRequest;
use App\Http\Requests\UpdateAssociationRequest;
use App\Models\Association;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;
use Alert;

class AssociationController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('association_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Association::with(['user'])->select(sprintf('%s.*', (new Association)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'association_show';
                $editGate = 'association_edit';
                $deleteGate = 'association_delete';
                $crudRoutePart = 'associations';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('license_number', function ($row) {
                return $row->license_number ? $row->license_number : '';
            });
            $table->editColumn('phone', function ($row) {
                return $row->phone ? $row->phone : '';
            });
            $table->editColumn('address', function ($row) {
                return $row->address ? $row->address : '';
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? Association::STATUS_SELECT[$row->status] : '';
            });
            $table->addColumn('email', function ($row) {
                return $row->user ? $row->user->email : '';
            });

            $table->editColumn('logo', function ($row) {
                if ($photo = $row->logo) {
                    return sprintf(
                        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
                        $photo->url,
                        $photo->thumbnail
                    );
                }

                return '';
            });

            $table->editColumn('approved', function ($row) {
                return '<div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                ' . ($row->user?->approved == 1 ? 'checked' : null) . ' >
                                            <label class="form-check-label toggle-label change-approved"
                                                table="associationTable" route=' . route('admin.users.change-approved', $row->user?->id) . '></label>
                                        </div>
                                    </div>';
            });

            $table->rawColumns(['actions', 'placeholder', 'user', 'logo', 'approved']);

            return $table->make(true);
        }

        $users = User::get();

        return view('admin.associations.index', compact('users'));
    }

    public function create()
    {
        abort_if(Gate::denies('association_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.associations.create', compact('users'));
    }

    public function store(StoreAssociationRequest $request)
    {
        $user = User::create([
            'email' => $request->email,
            'password' => $request->password,
            'name' => $request->name,
            'user_type' => 'association',
            'approved' => 1
        ]);
        $association = Association::create($request->all());
        $association->user_id = $user->id;
        $association->save();

        if ($request->input('logo', false)) {
            $association->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $association->id]);
        }

        Alert::success('اضافة بنجاح', 'تمت الاضافة بنجاح');

        return redirect()->route('admin.associations.index');
    }

    public function edit(Association $association)
    {
        abort_if(Gate::denies('association_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $association->load('user');

        return view('admin.associations.edit', compact('association', 'users'));
    }

    public function update(UpdateAssociationRequest $request, Association $association)
    {
        $association->update($request->all());
        $user = User::find($association->user_id);
        $user->update($request->all());
        $user->approved = isset($request->approved) ? 1 : 0;
        $user->save();


        if ($request->input('logo', false)) {
            if (!$association->logo || $request->input('logo') !== $association->logo->file_name) {
                if ($association->logo) {
                    $association->logo->delete();
                }
                $association->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
            }
        } elseif ($association->logo) {
            $association->logo->delete();
        }

        Alert::success('تحديث بنجاح', 'تم التحديث بنجاح');

        return redirect()->route('admin.associations.index');
    }

    public function show(Association $association)
    {
        abort_if(Gate::denies('association_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $association->load('user');

        return view('admin.associations.show', compact('association'));
    }

    public function destroy(Association $association)
    {
        abort_if(Gate::denies('association_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $association->delete();

        return back();
    }

    public function massDestroy(MassDestroyAssociationRequest $request)
    {
        $associations = Association::find(request('ids'));

        foreach ($associations as $association) {
            $association->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('association_create') && Gate::denies('association_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model = new Association();
        $model->id = $request->input('crud_id', 0);
        $model->exists = true;
        $media = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
