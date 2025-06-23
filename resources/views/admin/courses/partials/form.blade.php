@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ isset($course) ? trans('global.edit') : trans('global.create') }} {{ trans('cruds.course.title_singular') }}
        </div>
        <div class="card-body">
            <form method="POST"
                action="{{ isset($course) ? route('admin.courses.update', $course->id) : route('admin.courses.store') }}"
                enctype="multipart/form-data">
                @csrf
                @if (isset($course))
                    @method('PUT')
                @endif

                <ul class="nav nav-tabs" id="courseTab" role="tablist">
                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#basic">معلومات أساسية</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#media">الوصف والوسائط</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#schedule">الجدول الزمني</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#support">الدعم</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#extra">تفاصيل إضافية</a></li>
                </ul>

                <div class="tab-content mt-3">
                    <div class="tab-pane fade show active" id="basic">@include('admin.courses.partials.fields_basic')</div>
                    <div class="tab-pane fade" id="media">@include('admin.courses.partials.fields_media')</div>
                    <div class="tab-pane fade" id="schedule">@include('admin.courses.partials.fields_schedule')</div>
                    <div class="tab-pane fade" id="support">@include('admin.courses.partials.fields_support')</div>
                    <div class="tab-pane fade" id="extra">@include('admin.courses.partials.fields_extra')</div>
                </div>

                <div class="form-navigation mt-3 d-flex justify-content-between">
                    <button type="button" class="btn btn-secondary previous d-none">السابق</button>
                    <button type="button" class="btn btn-primary next">التالي</button>
                    <button type="submit" class="btn btn-danger d-none submit">حفظ</button>
                </div>
            </form>
        </div>
    </div>
@endsection