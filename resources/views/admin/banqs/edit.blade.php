@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.banq.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.banqs.update", [$banq->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="bank_name">{{ trans('cruds.banq.fields.bank_name') }}</label>
                <input class="form-control {{ $errors->has('bank_name') ? 'is-invalid' : '' }}" type="text" name="bank_name" id="bank_name" value="{{ old('bank_name', $banq->bank_name) }}" required>
                @if($errors->has('bank_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bank_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.banq.fields.bank_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="bank_number">{{ trans('cruds.banq.fields.bank_number') }}</label>
                <input class="form-control {{ $errors->has('bank_number') ? 'is-invalid' : '' }}" type="text" name="bank_number" id="bank_number" value="{{ old('bank_number', $banq->bank_number) }}" required>
                @if($errors->has('bank_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bank_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.banq.fields.bank_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="iban">{{ trans('cruds.banq.fields.iban') }}</label>
                <input class="form-control {{ $errors->has('iban') ? 'is-invalid' : '' }}" type="text" name="iban" id="iban" value="{{ old('iban', $banq->iban) }}" required>
                @if($errors->has('iban'))
                    <div class="invalid-feedback">
                        {{ $errors->first('iban') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.banq.fields.iban_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection