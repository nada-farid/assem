@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.association.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.associations.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>
                                {{ trans('cruds.association.fields.id') }}
                            </th>
                            <td>
                                {{ $association->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.association.fields.name') }}
                            </th>
                            <td>
                                {{ $association->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.association.fields.manager') }}
                            </th>
                            <td>
                                {{ $association->manager }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.association.fields.license_number') }}
                            </th>
                            <td>
                                {{ $association->license_number }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.association.fields.beneficiaries_count') }}
                            </th>
                            <td>
                                {{ $association->beneficiaries_count }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.association.fields.phone') }}
                            </th>
                            <td>
                                {{ $association->phone }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.association.fields.address') }}
                            </th>
                            <td>
                                {{ $association->address }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.association.fields.bref') }}
                            </th>
                            <td>
                                {{ $association->bref }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.association.fields.facebook') }}
                            </th>
                            <td>
                                {{ $association->facebook }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.association.fields.twitter') }}
                            </th>
                            <td>
                                {{ $association->twitter }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.association.fields.linked_in') }}
                            </th>
                            <td>
                                {{ $association->linked_in }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.user.fields.email') }}
                            </th>
                            <td>
                                {{ $association->user->email ?? '' }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.association.fields.logo') }}
                            </th>
                            <td>
                                @if ($association->logo)
                                    <a href="{{ $association->logo->getUrl() }}" target="_blank"
                                        style="display: inline-block">
                                        <img src="{{ $association->logo->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>
                               <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                {{$association->user->approved == 1 ? 'checked' : null}} >
                                            <label class="form-check-label toggle-label change-published"
                                                table="newsTable" route="{{route('admin.news.change-status', $association->id)}}"></label>
                                        </div>
                                    </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.associations.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
