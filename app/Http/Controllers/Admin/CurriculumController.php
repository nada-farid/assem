<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCurriculumRequest;
use App\Http\Requests\StoreCurriculumRequest;
use App\Http\Requests\UpdateCurriculumRequest;
use App\Models\Course;
use App\Models\Curriculum;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CurriculumController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('curriculum_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Curriculum::with(['course'])->select(sprintf('%s.*', (new Curriculum)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'curriculum_show';
                $editGate      = 'curriculum_edit';
                $deleteGate    = 'curriculum_delete';
                $crudRoutePart = 'curricula';

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
            $table->editColumn('title', function ($row) {
                return $row->title ? $row->title : '';
            });
            $table->addColumn('course_title', function ($row) {
                return $row->course ? $row->course->title : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'course']);

            return $table->make(true);
        }

        return view('admin.curricula.index');
    }

    public function create()
    {
        abort_if(Gate::denies('curriculum_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courses = Course::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.curricula.create', compact('courses'));
    }

    public function store(StoreCurriculumRequest $request)
    {
        $curriculum = Curriculum::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $curriculum->id]);
        }

        return redirect()->route('admin.curricula.index');
    }

    public function edit(Curriculum $curriculum)
    {
        abort_if(Gate::denies('curriculum_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courses = Course::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $curriculum->load('course');

        return view('admin.curricula.edit', compact('courses', 'curriculum'));
    }

    public function update(UpdateCurriculumRequest $request, Curriculum $curriculum)
    {
        $curriculum->update($request->all());

        return redirect()->route('admin.curricula.index');
    }

    public function show(Curriculum $curriculum)
    {
        abort_if(Gate::denies('curriculum_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $curriculum->load('course');

        return view('admin.curricula.show', compact('curriculum'));
    }

    public function destroy(Curriculum $curriculum)
    {
        abort_if(Gate::denies('curriculum_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $curriculum->delete();

        return back();
    }

    public function massDestroy(MassDestroyCurriculumRequest $request)
    {
        $curricula = Curriculum::find(request('ids'));

        foreach ($curricula as $curriculum) {
            $curriculum->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('curriculum_create') && Gate::denies('curriculum_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Curriculum();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
