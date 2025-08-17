@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.banq.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.banqs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.banq.fields.id') }}
                        </th>
                        <td>
                            {{ $banq->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.banq.fields.bank_name') }}
                        </th>
                        <td>
                            {{ $banq->bank_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.banq.fields.bank_number') }}
                        </th>
                        <td>
                            {{ $banq->bank_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.banq.fields.iban') }}
                        </th>
                        <td>
                            {{ $banq->iban }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.banqs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection