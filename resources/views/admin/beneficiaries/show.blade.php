@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.beneficiary.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.beneficiaries.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiary.fields.id') }}
                        </th>
                        <td>
                            {{ $beneficiary->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiary.fields.name') }}
                        </th>
                        <td>
                            {{ $beneficiary->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiary.fields.birth_date') }}
                        </th>
                        <td>
                            {{ $beneficiary->birth_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiary.fields.identity_number') }}
                        </th>
                        <td>
                            {{ $beneficiary->identity_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiary.fields.marital_status') }}
                        </th>
                        <td>
                            {{ App\Models\Beneficiary::MARITAL_STATUS_SELECT[$beneficiary->marital_status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiary.fields.marital_state_date') }}
                        </th>
                        <td>
                            {{ $beneficiary->marital_state_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiary.fields.address') }}
                        </th>
                        <td>
                            {{ $beneficiary->address }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.beneficiaries.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection