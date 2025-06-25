@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3>بيانات الطلب</h3>
            <p>اسم الدورة: {{ $courseRequest->course->title }}</p>
            <p>عدد المستفيدين المطلوبين: {{ $courseRequest->students->count() }}</p>
            <div class="row">

                <div class="col-md-6">

                    <h4>المستفيدين المرفوعين:</h4>
                </div>
                @if ($courseRequest->status === 'pending')
                    <div class="col-md-4">
                        <div class="d-flex justify-content-between">

                            <form action="{{ route('admin.course_requests.accept', $courseRequest->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success">قبول الطلب </button>
                            </form>

                            <form action="{{ route('admin.course_requests.reject', $courseRequest->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">رفض الطلب </button>
                            </form>
                        </div>
                    </div>
                @endif
            </div>
        </div>



        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-courseCourseStudents">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.courseStudent.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.courseStudent.fields.name') }}
                            </th>
                            <th>
                                {{ trans('cruds.courseStudent.fields.email') }}
                            </th>
                            <th>
                                {{ trans('cruds.courseStudent.fields.identity_num') }}
                            </th>
                            <th>
                                {{ trans('cruds.courseStudent.fields.phone_number') }}
                            </th>
                            <th>
                                {{ trans('cruds.courseStudent.fields.date_of_birth') }}
                            </th>
                            <th>
                                {{ trans('cruds.courseStudent.fields.registered') }}
                            </th>
                            <th>
                                {{ trans('cruds.courseStudent.fields.certificate') }}
                            </th>
                            <th>
                                {{ trans('cruds.courseStudent.fields.description') }}
                            </th>
                            <th>
                                {{ trans('cruds.courseStudent.fields.relevance') }}
                            </th>
                            <th>
                                {{ trans('cruds.courseStudent.fields.attend_course') }}
                            </th>
                            <th>
                                الدورات السابقة
                            </th>
                            <th>
                                {{ trans('cruds.courseStudent.fields.transportaion') }}
                            </th>
                            <th>
                                {{ trans('cruds.courseStudent.fields.prev_exper') }}
                            </th>
                            <th>
                                {{ trans('cruds.courseStudent.fields.address') }}
                            </th>
                            <th>الحالة</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courseRequest->students as $courseStudent)
                            <tr data-entry-id="{{ $courseStudent->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $courseStudent->id ?? '' }}
                                </td>
                                <td>
                                    {{ $courseStudent->name ?? '' }}
                                </td>
                                <td>
                                    {{ $courseStudent->email ?? '' }}
                                </td>
                                <td>
                                    {{ $courseStudent->identity_num ?? '' }}
                                </td>
                                <td>
                                    {{ $courseStudent->phone_number ?? '' }}
                                </td>
                                <td>
                                    {{ $courseStudent->date_of_birth ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\CourseStudent::REGISTERED_RADIO[$courseStudent->registered] ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\CourseStudent::CERTIFICATE_RADIO[$courseStudent->certificate] ?? '' }}
                                </td>
                                <td>
                                    {{ $courseStudent->description ?? '' }}
                                </td>
                                <td>
                                    {{ $courseStudent->relevance ?? '' }}
                                </td>
                                <td>
                                    {{ $courseStudent->attend_course ?? '' }}
                                </td>
                                <td>
                                    @if ($courseStudent->courses_before)
                                        @foreach (json_decode($courseStudent->courses_before, true) as $raw)
                                            {{ $raw['course_name'] }} ,
                                        @endforeach
                                    @endif
                                </td>
                                <td>
                                    {{ $courseStudent->transportaion ?? '' }}
                                </td>
                                <td>
                                    {{ $courseStudent->prev_exper ?? '' }}
                                </td>
                                <td>
                                    {{ $courseStudent->address ?? '' }}
                                </td>
                                <td>
                                    @if ($courseStudent->approved)
                                        <span class="badge bg-success">مقبول</span>
                                    @else
                                        <span class="badge bg-warning">في الانتظار</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
