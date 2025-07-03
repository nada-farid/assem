@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.association.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">

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
                            <th>
                                {{ trans('cruds.association.fields.status') }}
                            </th>

                            <td>
                                @if ($association->user?->approved == 1)
                                    <span class="badge badge-success">تم القبول</span>
                                @else
                                    <span class="badge badge-secondary mb-2 d-block">بانتظار المراجعة</span>

                                   
                                    <a class="btn btn-success btn-sm"
                                        href="{{ route('admin.associations.approve', $association->id) }}">
                                        قبول الجمعية
                                    </a>

                                   
                                    <button class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#rejectModal-{{ $association->id }}">
                                        رفض الجمعية
                                    </button>

                                    <!-- Modal الرفض -->
                                    <div class="modal fade" id="rejectModal-{{ $association->id }}" tabindex="-1"
                                        role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <form method="POST"
                                                action="{{ route('admin.associations.reject', $association->id) }}">
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
                    <a class="btn btn-default" href="{{ route('admin.associations.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
