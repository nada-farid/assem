@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.supporter.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.supporters.update", [$supporter->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.supporter.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $supporter->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.supporter.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="phone">{{ trans('cruds.supporter.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="number" name="phone" id="phone" value="{{ old('phone', $supporter->phone) }}" step="1" required>
                @if($errors->has('phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.supporter.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.supporter.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', $supporter->email) }}" required>
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.supporter.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="official_name">{{ trans('cruds.supporter.fields.official_name') }}</label>
                <input class="form-control {{ $errors->has('official_name') ? 'is-invalid' : '' }}" type="text" name="official_name" id="official_name" value="{{ old('official_name', $supporter->official_name) }}">
                @if($errors->has('official_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('official_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.supporter.fields.official_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="official_phone">{{ trans('cruds.supporter.fields.official_phone') }}</label>
                <input class="form-control {{ $errors->has('official_phone') ? 'is-invalid' : '' }}" type="number" name="official_phone" id="official_phone" value="{{ old('official_phone', $supporter->official_phone) }}" step="1">
                @if($errors->has('official_phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('official_phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.supporter.fields.official_phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="official_email">{{ trans('cruds.supporter.fields.official_email') }}</label>
                <input class="form-control {{ $errors->has('official_email') ? 'is-invalid' : '' }}" type="email" name="official_email" id="official_email" value="{{ old('official_email', $supporter->official_email) }}">
                @if($errors->has('official_email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('official_email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.supporter.fields.official_email_helper') }}</span>
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