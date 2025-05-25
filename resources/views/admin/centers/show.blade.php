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