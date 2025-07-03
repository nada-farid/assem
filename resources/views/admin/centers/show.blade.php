@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.center.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.centers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.center.fields.id') }}
                        </th>
                        <td>
                            {{ $center->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.center.fields.name') }}
                        </th>
                        <td>
                            {{ $center->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.center.fields.specialization') }}
                        </th>
                        <td>
                            {{ $center->specialization }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.center.fields.experience_years') }}
                        </th>
                        <td>
                            {{ $center->experience_years }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.center.fields.beneficiar_count') }}
                        </th>
                        <td>
                            {{ $center->beneficiar_count }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.center.fields.description') }}
                        </th>
                        <td>
                            {!! $center->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.center.fields.facebook_link') }}
                        </th>
                        <td>
                            {{ $center->facebook_link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.center.fields.twitter_link') }}
                        </th>
                        <td>
                            {{ $center->twitter_link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.center.fields.linked_in') }}
                        </th>
                        <td>
                            {{ $center->linked_in }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.center.fields.logo') }}
                        </th>
                        <td>
                            @if($center->logo)
                                <a href="{{ $center->logo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $center->logo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.center.fields.image') }}
                        </th>
                        <td>
                            @if($center->image)
                                <a href="{{ $center->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $center->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.center.fields.user') }}
                        </th>
                        <td>
                            {{ $center->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.center.fields.location') }}
                        </th>
                        <td>
                            {{ $center->location }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.center.fields.website') }}
                        </th>
                        <td>
                            {{ $center->website }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.center.fields.license_number') }}
                        </th>
                        <td>
                            {{ $center->license_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.center.fields.end_date') }}
                        </th>
                        <td>
                            {{ $center->end_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.center.fields.license_image') }}
                        </th>
                        <td>
                            @if($center->license_image)
                                <a href="{{ $center->license_image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $center->license_image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.center.fields.director_name') }}
                        </th>
                        <td>
                            {{ $center->director_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.center.fields.director_phone') }}
                        </th>
                        <td>
                            {{ $center->director_phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.center.fields.director_email') }}
                        </th>
                        <td>
                            {{ $center->director_email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.center.fields.coordinator_name') }}
                        </th>
                        <td>
                            {{ $center->coordinator_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.center.fields.coordinator_phone') }}
                        </th>
                        <td>
                            {{ $center->coordinator_phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.center.fields.coordinator_email') }}
                        </th>
                        <td>
                            {{ $center->coordinator_email }}
                        </td>
                    </tr>
                                            <tr>
                            <th>
                             حالة المركز
                            </th>

                            <td>
                                @if ($center->user?->approved == 1)
                                    <span class="badge badge-success">تم القبول</span>
                                @else
                                    <span class="badge badge-secondary mb-2 d-block">بانتظار المراجعة</span>

                                   
                                    <a class="btn btn-success btn-sm"
                                        href="{{ route('admin.centers.approve',$center) }}">
                                        قبول المركز
                                    </a>

                                   
                                    <button class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#rejectModal-{{$center->user->id }}">
                                        رفض المركز
                                    </button>

                                    <!-- Modal الرفض -->
                                    <div class="modal fade" id="rejectModal-{{$center->user->id }}" tabindex="-1"
                                        role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <form method="POST"
                                                action="{{ route('admin.centers.reject', $center->id) }}">
                                                @csrf
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">سبب الرفض</h5>
                                                        <button type="button" class="close"
                                                            data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <textarea name="reason" class="form-control" required></textarea>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-danger">رفض نهائي</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                @endif
                            </td>

                        </tr>

                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.centers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection