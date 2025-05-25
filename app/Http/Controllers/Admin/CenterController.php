<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCenterRequest;
use App\Http\Requests\StoreCenterRequest;
use App\Http\Requests\UpdateCenterRequest;
use App\Models\Center;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;
use Alert;

class CenterController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('center_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Center::query()->select(sprintf('%s.*', (new Center)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'center_show';
                $editGate = 'center_edit';
                $deleteGate = 'center_delete';
                $crudRoutePart = 'centers';

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
            $table->editColumn('specialization', function ($row) {
                return $row->specialization ? $row->specialization : '';
            });
            $table->editColumn('experience_years', function ($row) {
                return $row->experience_years ? $row->experience_years : '';
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
            $table->editColumn('image', function ($row) {
                if ($photo = $row->image) {
                    return sprintf(
                        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
                        $photo->url,
                        $photo->thumbnail
                    );
                }

                return '';
            });

            $table->rawColumns(['actions', 'placeholder', 'logo', 'image']);

            return $table->make(true);
        }

        return view('admin.centers.index');
    }

    public function create()
    {
        abort_if(Gate::denies('center_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.centers.create');
    }

    public function store(StoreCenterRequest $request)
    {
        $center = Center::create($request->all());

        if ($request->input('logo', false)) {
            $center->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
        }

        if ($request->input('image', false)) {
            $center->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $center->id]);
        }

        Alert::success('اضافة بنجاح', 'تمت الاضافة بنجاح');

        return redirect()->route('admin.centers.index');
    }

    public function edit(Center $center)
    {
        abort_if(Gate::denies('center_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.centers.edit', compact('center'));
    }

    public function update(UpdateCenterRequest $request, Center $center)
    {
        $center->update($request->all());

        if ($request->input('logo', false)) {
            if (!$center->logo || $request->input('logo') !== $center->logo->file_name) {
                if ($center->logo) {
                    $center->logo->delete();
                }
                $center->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
            }
        } elseif ($center->logo) {
            $center->logo->delete();
        }

        if ($request->input('image', false)) {
            if (!$center->image || $request->input('image') !== $center->image->file_name) {
                if ($center->image) {
                    $center->image->delete();
                }
                $center->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($center->image) {
            $center->image->delete();
        }

        Alert::success('تحديث بنجاح', 'تم التحديث بنجاح');

        return redirect()->route('admin.centers.index');
    }

    public function show(Center $center)
    {
        abort_if(Gate::denies('center_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.centers.show', compact('center'));
    }

    public function destroy(Center $center)
    {
        abort_if(Gate::denies('center_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $center->delete();

        return back();
    }

    public function massDestroy(MassDestroyCenterRequest $request)
    {
        $centers = Center::find(request('ids'));

        foreach ($centers as $center) {
            $center->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('center_create') && Gate::denies('center_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model = new Center();
        $model->id = $request->input('crud_id', 0);
        $model->exists = true;
        $media = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
