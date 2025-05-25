@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.association.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.associations.update', [$association->id]) }}"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label class="required" for="name">{{ trans('cruds.user.fields.name') }}</label>
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name"
                        id="name" value="{{ old('name', $association->user->name) }}" required>
                    @if ($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.user.fields.name_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="email">{{ trans('cruds.user.fields.email') }}</label>
                    <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email"
                        name="email" id="email" value="{{ old('email', $association->user->email) }}" required>
                    @if ($errors->has('email'))
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.user.fields.email_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="password">{{ trans('cruds.user.fields.password') }}</label>
                    <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password"
                        name="password" id="password">
                    @if ($errors->has('password'))
                        <div class="invalid-feedback">
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.user.fields.password_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="manager">{{ trans('cruds.association.fields.manager') }}</label>
                    <input class="form-control {{ $errors->has('manager') ? 'is-invalid' : '' }}" type="text"
                        name="manager" id="manager" value="{{ old('manager', $association->manager) }}">
                    @if ($errors->has('manager'))
                        <div class="invalid-feedback">
                            {{ $errors->first('manager') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.association.fields.manager_helper') }}</span>
                </div>
                <div class="form-group">
                    <label 
                        for="license_number">{{ trans('cruds.association.fields.license_number') }}</label>
                    <input class="form-control {{ $errors->has('license_number') ? 'is-invalid' : '' }}" type="number"
                        name="license_number" id="license_number"
                        value="{{ old('license_number', $association->license_number) }}" step="1" >
                    @if ($errors->has('license_number'))
                        <div class="invalid-feedback">
                            {{ $errors->first('license_number') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.association.fields.license_number_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="beneficiaries_count">{{ trans('cruds.association.fields.beneficiaries_count') }}</label>
                    <input class="form-control {{ $errors->has('beneficiaries_count') ? 'is-invalid' : '' }}"
                        type="text" name="beneficiaries_count" id="beneficiaries_count"
                        value="{{ old('beneficiaries_count', $association->beneficiaries_count) }}">
                    @if ($errors->has('beneficiaries_count'))
                        <div class="invalid-feedback">
                            {{ $errors->first('beneficiaries_count') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.association.fields.beneficiaries_count_helper') }}</span>
                </div>
                <div class="form-group">
                    <label  for="phone">{{ trans('cruds.association.fields.phone') }}</label>
                    <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text"
                        name="phone" id="phone" value="{{ old('phone', $association->phone) }}" >
                    @if ($errors->has('phone'))
                        <div class="invalid-feedback">
                            {{ $errors->first('phone') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.association.fields.phone_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="address">{{ trans('cruds.association.fields.address') }}</label>
                    <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text"
                        name="address" id="address" value="{{ old('address', $association->address) }}">
                    @if ($errors->has('address'))
                        <div class="invalid-feedback">
                            {{ $errors->first('address') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.association.fields.address_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="bref">{{ trans('cruds.association.fields.bref') }}</label>
                    <textarea class="form-control {{ $errors->has('bref') ? 'is-invalid' : '' }}" name="bref" id="bref">{{ old('bref', $association->bref) }}</textarea>
                    @if ($errors->has('bref'))
                        <div class="invalid-feedback">
                            {{ $errors->first('bref') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.association.fields.bref_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="facebook">{{ trans('cruds.association.fields.facebook') }}</label>
                    <input class="form-control {{ $errors->has('facebook') ? 'is-invalid' : '' }}" type="text"
                        name="facebook" id="facebook" value="{{ old('facebook', $association->facebook) }}">
                    @if ($errors->has('facebook'))
                        <div class="invalid-feedback">
                            {{ $errors->first('facebook') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.association.fields.facebook_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="twitter">{{ trans('cruds.association.fields.twitter') }}</label>
                    <input class="form-control {{ $errors->has('twitter') ? 'is-invalid' : '' }}" type="text"
                        name="twitter" id="twitter" value="{{ old('twitter', $association->twitter) }}">
                    @if ($errors->has('twitter'))
                        <div class="invalid-feedback">
                            {{ $errors->first('twitter') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.association.fields.twitter_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="linked_in">{{ trans('cruds.association.fields.linked_in') }}</label>
                    <input class="form-control {{ $errors->has('linked_in') ? 'is-invalid' : '' }}" type="text"
                        name="linked_in" id="linked_in" value="{{ old('linked_in', $association->linked_in) }}">
                    @if ($errors->has('linked_in'))
                        <div class="invalid-feedback">
                            {{ $errors->first('linked_in') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.association.fields.linked_in_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="logo">{{ trans('cruds.association.fields.logo') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('logo') ? 'is-invalid' : '' }}" id="logo-dropzone">
                    </div>
                    @if ($errors->has('logo'))
                        <div class="invalid-feedback">
                            {{ $errors->first('logo') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.association.fields.logo_helper') }}</span>
                </div>
                <div class="form-group">
                    <span class="toggle-text">{{ trans('cruds.user.fields.approve') }}</span>

                    <div class="form-check {{ $errors->has('approved') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="checkbox" name="approved" id="approved" value="1"
                            {{ $association->user->approved == 1 ||old('approved', 0) === 1 ? 'checked' : '' }}>
                        <label class="form-check-label toggle-label" for="approved"></label>
                    </div>
                    @if ($errors->has('approved'))
                        <div class="invalid-feedback">
                            {{ $errors->first('approved') }}
                        </div>
                    @endif
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

@section('scripts')
    <script>
        Dropzone.options.logoDropzone = {
            url: '{{ route('admin.associations.storeMedia') }}',
            maxFilesize: 2, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif',
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 2,
                width: 4096,
                height: 4096
            },
            success: function(file, response) {
                $('form').find('input[name="logo"]').remove()
                $('form').append('<input type="hidden" name="logo" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="logo"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                @if (isset($association) && $association->logo)
                    var file = {!! json_encode($association->logo) !!}
                    this.options.addedfile.call(this, file)
                    this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="logo" value="' + file.file_name + '">')
                    this.options.maxFiles = this.options.maxFiles - 1
                @endif
            },
            error: function(file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }

                return _results
            }
        }
    </script>
@endsection
