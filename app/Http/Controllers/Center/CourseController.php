<?php

namespace App\Http\Controllers\Center;

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
use Auth;


class CourseController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        $center = Center::where('user_id', Auth::id())->first();
        if ($request->ajax()) {
            $query = Course::where('center_id', $center->id)->with(['category', 'center'])->select(sprintf('%s.*', (new Course)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = true;
                $editGate = true;
                $deleteGate = true;
                $crudRoutePart = 'center.courses';

                return view('partials.datatablesActions_noauth', compact(
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

            $table->editColumn('status', function ($row) {
                if ($row->status === 'new') {
                    return '<span class="text-white badge bg-info">جديدة</span>';
                } elseif ($row->status === 'active') {
                    return '<span class="text-white badge bg-success">نشطة</span>';
                } elseif ($row->status === 'past') {
                    return '<span class="text-white badge bg-secondary">منتهية</span>';
                } else {
                    return '<span class="text-white badge bg-dark">غير معروفة</span>';
                }
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

            $table->rawColumns(['actions', 'placeholder', 'photo', 'category', 'center','status']);

            return $table->make(true);
        }

        return view('center.courses.index');
    }


    public function show(Course $course)
    {

        $course->load('category', 'center');

        return view('center.courses.show', compact('course'));
    }
}
