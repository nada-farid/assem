@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.course.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.courses.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.id') }}
                        </th>
                        <td>
                            {{ $course->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.start_at') }}
                        </th>
                        <td>
                            {{ $course->start_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.end_at') }}
                        </th>
                        <td>
                            {{ $course->end_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.photo') }}
                        </th>
                        <td>
                            @if($course->photo)
                                <a href="{{ $course->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $course->photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.description') }}
                        </th>
                        <td>
                            {!! $course->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.category') }}
                        </th>
                        <td>
                            {{ $course->category->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.title') }}
                        </th>
                        <td>
                            {{ $course->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.short_description') }}
                        </th>
                        <td>
                            {{ $course->short_description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.center') }}
                        </th>
                        <td>
                            {{ $course->center->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.type') }}
                        </th>
                        <td>
                            {{ App\Models\Course::TYPE_SELECT[$course->type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.trainer') }}
                        </th>
                        <td>
                            {{ $course->trainer }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.inside_image') }}
                        </th>
                        <td>
                            @if($course->inside_image)
                                <a href="{{ $course->inside_image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $course->inside_image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.video_url') }}
                        </th>
                        <td>
                            {{ $course->video_url }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.duration') }}
                        </th>
                        <td>
                            {{ $course->duration }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.duration_weekly') }}
                        </th>
                        <td>
                            {{ $course->duration_weekly }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.beneficiary_count') }}
                        </th>
                        <td>
                            {{ $course->beneficiary_count }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.goals') }}
                        </th>
                        <td>
                            {!! $course->goals !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.video_background') }}
                        </th>
                        <td>
                            @if($course->video_background)
                                <a href="{{ $course->video_background->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $course->video_background->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.avaliable') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $course->avaliable ? 'checked' : '' }}>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.courses.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection