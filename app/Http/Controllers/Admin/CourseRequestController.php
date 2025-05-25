<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCourseRequestRequest;
use App\Http\Requests\StoreCourseRequestRequest;
use App\Http\Requests\UpdateCourseRequestRequest;
use App\Models\Association;
use App\Models\Course;
use App\Models\CourseRequest;
use App\Models\LessonAttendance;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CourseRequestController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('course_request_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = CourseRequest::with(['course', 'association'])->select(sprintf('%s.*', (new CourseRequest)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'course_request_show';
                $editGate = 'course_request_edit';
                $deleteGate = 'course_request_delete';
                $crudRoutePart = 'course-requests';

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
            $table->addColumn('course_title', function ($row) {
                return $row->course ? $row->course->title : '';
            });

            $table->addColumn('association_name', function ($row) {
                return $row->association ? $row->association->name : '';
            });

            $table->editColumn('beneficiar', function ($row) {
                return $row->beneficiar ? '<a href="' . $row->beneficiar->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>' : '';
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? CourseRequest::STATUS_SELECT[$row->status] : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'course', 'association', 'beneficiar']);

            return $table->make(true);
        }

        return view('admin.courseRequests.index');
    }

    public function create()
    {
        abort_if(Gate::denies('course_request_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courses = Course::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $associations = Association::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.courseRequests.create', compact('associations', 'courses'));
    }

    public function store(StoreCourseRequestRequest $request)
    {
        $courseRequest = CourseRequest::create($request->all());

        if ($request->input('beneficiar', false)) {
            $courseRequest->addMedia(storage_path('tmp/uploads/' . basename($request->input('beneficiar'))))->toMediaCollection('beneficiar');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $courseRequest->id]);
        }

        return redirect()->route('admin.course-requests.index');
    }

    public function edit(CourseRequest $courseRequest)
    {
        abort_if(Gate::denies('course_request_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courses = Course::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $associations = Association::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $courseRequest->load('course', 'association');

        return view('admin.courseRequests.edit', compact('associations', 'courseRequest', 'courses'));
    }

    public function update(UpdateCourseRequestRequest $request, CourseRequest $courseRequest)
    {
        $courseRequest->update($request->all());

        if ($request->input('beneficiar', false)) {
            if (!$courseRequest->beneficiar || $request->input('beneficiar') !== $courseRequest->beneficiar->file_name) {
                if ($courseRequest->beneficiar) {
                    $courseRequest->beneficiar->delete();
                }
                $courseRequest->addMedia(storage_path('tmp/uploads/' . basename($request->input('beneficiar'))))->toMediaCollection('beneficiar');
            }
        } elseif ($courseRequest->beneficiar) {
            $courseRequest->beneficiar->delete();
        }

        return redirect()->route('admin.course-requests.index');
    }

    // public function show(CourseRequest $courseRequest)
    // {
    //     abort_if(Gate::denies('course_request_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    //     $courseRequest->load('course', 'association', 'beneficiaries');

    //     return view('admin.courseRequests.show', compact('courseRequest'));
    // }

    public function show(CourseRequest $courseRequest)
    {
        abort_if(Gate::denies('course_request_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courseRequest->load('course.chapters', 'association', 'beneficiaries');

        $totalLessons = $courseRequest->course->chapters->count();

        foreach ($courseRequest->beneficiaries as $beneficiary) {
            $attended = LessonAttendance::where('beneficiary_id', $beneficiary->id)
                ->whereIn('curriculum_id', $courseRequest->course->chapters->pluck('id'))
                ->where('attended', 1)
                ->count();
            $missed = $totalLessons - $attended;
            $percentage = $totalLessons > 0 ? round(($attended / $totalLessons) * 100, 2) : 0;

            $beneficiary->lessonStats = [
                'total' => $totalLessons,
                'attended' => $attended,
                'missed' => $missed,
                'percentage' => $percentage,
            ];
        }

        return view('admin.courseRequests.show', compact('courseRequest'));
    }


    public function destroy(CourseRequest $courseRequest)
    {
        abort_if(Gate::denies('course_request_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courseRequest->delete();

        return back();
    }

    public function massDestroy(MassDestroyCourseRequestRequest $request)
    {
        $courseRequests = CourseRequest::find(request('ids'));

        foreach ($courseRequests as $courseRequest) {
            $courseRequest->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('course_request_create') && Gate::denies('course_request_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model = new CourseRequest();
        $model->id = $request->input('crud_id', 0);
        $model->exists = true;
        $media = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }


    public function updateBeneficiaryStatus(Request $request)
    {
        $request->validate([
            'course_courseRequest_id' => 'required|integer',
            'beneficiary_id' => 'required|integer',
            'status' => 'required|in:pending,approved,refused',
        ]);

        $courseRequest = CourseRequest::findOrFail($request->course_courseRequest_id);
        $beneficiaryId = $request->beneficiary_id;


        $courseRequest->beneficiaries()->updateExistingPivot($beneficiaryId, [
            'status' => $request->status,
        ]);

        return response()->json(['message' => 'تم تحديث الحالة بنجاح']);
    }



}
