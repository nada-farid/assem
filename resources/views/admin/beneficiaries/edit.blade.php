@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.beneficiary.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.beneficiaries.update", [$beneficiary->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.beneficiary.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $beneficiary->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiary.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="birth_date">{{ trans('cruds.beneficiary.fields.birth_date') }}</label>
                <input class="form-control date {{ $errors->has('birth_date') ? 'is-invalid' : '' }}" type="text" name="birth_date" id="birth_date" value="{{ old('birth_date', $beneficiary->birth_date) }}" required>
                @if($errors->has('birth_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('birth_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiary.fields.birth_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="identity_number">{{ trans('cruds.beneficiary.fields.identity_number') }}</label>
                <input class="form-control {{ $errors->has('identity_number') ? 'is-invalid' : '' }}" type="text" name="identity_number" id="identity_number" value="{{ old('identity_number', $beneficiary->identity_number) }}" required>
                @if($errors->has('identity_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('identity_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiary.fields.identity_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.beneficiary.fields.marital_status') }}</label>
                <select class="form-control {{ $errors->has('marital_status') ? 'is-invalid' : '' }}" name="marital_status" id="marital_status" required>
                    <option value disabled {{ old('marital_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Beneficiary::MARITAL_STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('marital_status', $beneficiary->marital_status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('marital_status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('marital_status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiary.fields.marital_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="marital_state_date">{{ trans('cruds.beneficiary.fields.marital_state_date') }}</label>
                <input class="form-control date {{ $errors->has('marital_state_date') ? 'is-invalid' : '' }}" type="text" name="marital_state_date" id="marital_state_date" value="{{ old('marital_state_date', $beneficiary->marital_state_date) }}">
                @if($errors->has('marital_state_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('marital_state_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiary.fields.marital_state_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address">{{ trans('cruds.beneficiary.fields.address') }}</label>
                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', $beneficiary->address) }}">
                @if($errors->has('address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiary.fields.address_helper') }}</span>
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