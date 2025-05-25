<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCourseRequest;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Category;
use App\Models\Center;
use App\Models\Course;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;
use Alert;

class CourseController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('course_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Course::with(['category', 'center'])->select(sprintf('%s.*', (new Course)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'course_show';
                $editGate = 'course_edit';
                $deleteGate = 'course_delete';
                $crudRoutePart = 'courses';

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
            $table->editColumn('photo', function ($row) {
                if ($photo = $row->photo) {
                    return sprintf(
                        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
                        $photo->url,
                        $photo->thumbnail
                    );
                }

                return '';
            });
            $table->addColumn('category_title', function ($row) {
                return $row->category ? $row->category->title : '';
            });

            $table->editColumn('title', function ($row) {
                return $row->title ? $row->title : '';
            });
            $table->editColumn('short_description', function ($row) {
                return $row->short_description ? $row->short_description : '';
            });
            $table->addColumn('center_name', function ($row) {
                return $row->center ? $row->center->name : '';
            });

            $table->editColumn('type', function ($row) {
                return $row->type ? Course::TYPE_SELECT[$row->type] : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'photo', 'category', 'center']);

            return $table->make(true);
        }

        return view('admin.courses.index');
    }

    public function create()
    {
        abort_if(Gate::denies('course_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $centers = Center::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.courses.create', compact('categories', 'centers'));
    }

    public function store(StoreCourseRequest $request)
    {
        $course = Course::create($request->all());

        if ($request->input('photo', false)) {
            $course->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        if ($request->input('inside_image', false)) {
            $course->addMedia(storage_path('tmp/uploads/' . basename($request->input('inside_image'))))->toMediaCollection('inside_image');
        }

        if ($request->input('video_background', false)) {
            $course->addMedia(storage_path('tmp/uploads/' . basename($request->input('video_background'))))->toMediaCollection('video_background');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $course->id]);
        }

        Alert::success('اضافة بنجاح', 'تمت الاضافة بنجاح');

        return redirect()->route('admin.courses.index');
    }

    public function edit(Course $course)
    {
        abort_if(Gate::denies('course_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $centers = Center::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $course->load('category', 'center');

        return view('admin.courses.edit', compact('categories', 'centers', 'course'));
    }

    public function update(UpdateCourseRequest $request, Course $course)
    {
        $course->update($request->all());

        if ($request->input('photo', false)) {
            if (!$course->photo || $request->input('photo') !== $course->photo->file_name) {
                if ($course->photo) {
                    $course->photo->delete();
                }
                $course->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
            }
        } elseif ($course->photo) {
            $course->photo->delete();
        }

        if ($request->input('inside_image', false)) {
            if (!$course->inside_image || $request->input('inside_image') !== $course->inside_image->file_name) {
                if ($course->inside_image) {
                    $course->inside_image->delete();
                }
                $course->addMedia(storage_path('tmp/uploads/' . basename($request->input('inside_image'))))->toMediaCollection('inside_image');
            }
        } elseif ($course->inside_image) {
            $course->inside_image->delete();
        }

        if ($request->input('video_background', false)) {
            if (!$course->video_background || $request->input('video_background') !== $course->video_background->file_name) {
                if ($course->video_background) {
                    $course->video_background->delete();
                }
                $course->addMedia(storage_path('tmp/uploads/' . basename($request->input('video_background'))))->toMediaCollection('video_background');
            }
        } elseif ($course->video_background) {
            $course->video_background->delete();
        }

        Alert::success('تحديث بنجاح', 'تم التحديث بنجاح');

        return redirect()->route('admin.courses.index');
    }

    public function show(Course $course)
    {
        abort_if(Gate::denies('course_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $course->load('category', 'center');

        return view('admin.courses.show', compact('course'));
    }

    public function destroy(Course $course)
    {
        abort_if(Gate::denies('course_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $course->delete();

        return back();
    }

    public function massDestroy(MassDestroyCourseRequest $request)
    {
        $courses = Course::find(request('ids'));

        foreach ($courses as $course) {
            $course->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('course_create') && Gate::denies('course_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model = new Course();
        $model->id = $request->input('crud_id', 0);
        $model->exists = true;
        $media = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
