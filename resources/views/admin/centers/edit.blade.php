@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.center.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.centers.update", [$center->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.center.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $center->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.center.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="specialization">{{ trans('cruds.center.fields.specialization') }}</label>
                <input class="form-control {{ $errors->has('specialization') ? 'is-invalid' : '' }}" type="text" name="specialization" id="specialization" value="{{ old('specialization', $center->specialization) }}" required>
                @if($errors->has('specialization'))
                    <div class="invalid-feedback">
                        {{ $errors->first('specialization') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.center.fields.specialization_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="experience_years">{{ trans('cruds.center.fields.experience_years') }}</label>
                <input class="form-control {{ $errors->has('experience_years') ? 'is-invalid' : '' }}" type="number" name="experience_years" id="experience_years" value="{{ old('experience_years', $center->experience_years) }}" step="1">
                @if($errors->has('experience_years'))
                    <div class="invalid-feedback">
                        {{ $errors->first('experience_years') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.center.fields.experience_years_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="beneficiar_count">{{ trans('cruds.center.fields.beneficiar_count') }}</label>
                <input class="form-control {{ $errors->has('beneficiar_count') ? 'is-invalid' : '' }}" type="number" name="beneficiar_count" id="beneficiar_count" value="{{ old('beneficiar_count', $center->beneficiar_count) }}" step="1">
                @if($errors->has('beneficiar_count'))
                    <div class="invalid-feedback">
                        {{ $errors->first('beneficiar_count') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.center.fields.beneficiar_count_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.center.fields.description') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{!! old('description', $center->description) !!}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.center.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="facebook_link">{{ trans('cruds.center.fields.facebook_link') }}</label>
                <input class="form-control {{ $errors->has('facebook_link') ? 'is-invalid' : '' }}" type="text" name="facebook_link" id="facebook_link" value="{{ old('facebook_link', $center->facebook_link) }}">
                @if($errors->has('facebook_link'))
                    <div class="invalid-feedback">
                        {{ $errors->first('facebook_link') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.center.fields.facebook_link_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="twitter_link">{{ trans('cruds.center.fields.twitter_link') }}</label>
                <input class="form-control {{ $errors->has('twitter_link') ? 'is-invalid' : '' }}" type="text" name="twitter_link" id="twitter_link" value="{{ old('twitter_link', $center->twitter_link) }}">
                @if($errors->has('twitter_link'))
                    <div class="invalid-feedback">
                        {{ $errors->first('twitter_link') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.center.fields.twitter_link_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="linked_in">{{ trans('cruds.center.fields.linked_in') }}</label>
                <input class="form-control {{ $errors->has('linked_in') ? 'is-invalid' : '' }}" type="text" name="linked_in" id="linked_in" value="{{ old('linked_in', $center->linked_in) }}">
                @if($errors->has('linked_in'))
                    <div class="invalid-feedback">
                        {{ $errors->first('linked_in') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.center.fields.linked_in_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="logo">{{ trans('cruds.center.fields.logo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('logo') ? 'is-invalid' : '' }}" id="logo-dropzone">
                </div>
                @if($errors->has('logo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('logo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.center.fields.logo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="image">{{ trans('cruds.center.fields.image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('image') ? 'is-invalid' : '' }}" id="image-dropzone">
                </div>
                @if($errors->has('image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('image') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.center.fields.image_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.center.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $center->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.center.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="location">{{ trans('cruds.center.fields.location') }}</label>
                <input class="form-control {{ $errors->has('location') ? 'is-invalid' : '' }}" type="text" name="location" id="location" value="{{ old('location', $center->location) }}">
                @if($errors->has('location'))
                    <div class="invalid-feedback">
                        {{ $errors->first('location') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.center.fields.location_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="website">{{ trans('cruds.center.fields.website') }}</label>
                <input class="form-control {{ $errors->has('website') ? 'is-invalid' : '' }}" type="text" name="website" id="website" value="{{ old('website', $center->website) }}">
                @if($errors->has('website'))
                    <div class="invalid-feedback">
                        {{ $errors->first('website') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.center.fields.website_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="license_number">{{ trans('cruds.center.fields.license_number') }}</label>
                <input class="form-control {{ $errors->has('license_number') ? 'is-invalid' : '' }}" type="text" name="license_number" id="license_number" value="{{ old('license_number', $center->license_number) }}">
                @if($errors->has('license_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('license_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.center.fields.license_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="end_date">{{ trans('cruds.center.fields.end_date') }}</label>
                <input class="form-control date {{ $errors->has('end_date') ? 'is-invalid' : '' }}" type="text" name="end_date" id="end_date" value="{{ old('end_date', $center->end_date) }}">
                @if($errors->has('end_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('end_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.center.fields.end_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="license_image">{{ trans('cruds.center.fields.license_image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('license_image') ? 'is-invalid' : '' }}" id="license_image-dropzone">
                </div>
                @if($errors->has('license_image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('license_image') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.center.fields.license_image_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="director_name">{{ trans('cruds.center.fields.director_name') }}</label>
                <input class="form-control {{ $errors->has('director_name') ? 'is-invalid' : '' }}" type="text" name="director_name" id="director_name" value="{{ old('director_name', $center->director_name) }}">
                @if($errors->has('director_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('director_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.center.fields.director_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="director_phone">{{ trans('cruds.center.fields.director_phone') }}</label>
                <input class="form-control {{ $errors->has('director_phone') ? 'is-invalid' : '' }}" type="number" name="director_phone" id="director_phone" value="{{ old('director_phone', $center->director_phone) }}" step="1">
                @if($errors->has('director_phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('director_phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.center.fields.director_phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="director_email">{{ trans('cruds.center.fields.director_email') }}</label>
                <input class="form-control {{ $errors->has('director_email') ? 'is-invalid' : '' }}" type="email" name="director_email" id="director_email" value="{{ old('director_email', $center->director_email) }}">
                @if($errors->has('director_email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('director_email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.center.fields.director_email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="coordinator_name">{{ trans('cruds.center.fields.coordinator_name') }}</label>
                <input class="form-control {{ $errors->has('coordinator_name') ? 'is-invalid' : '' }}" type="text" name="coordinator_name" id="coordinator_name" value="{{ old('coordinator_name', $center->coordinator_name) }}">
                @if($errors->has('coordinator_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('coordinator_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.center.fields.coordinator_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="coordinator_phone">{{ trans('cruds.center.fields.coordinator_phone') }}</label>
                <input class="form-control {{ $errors->has('coordinator_phone') ? 'is-invalid' : '' }}" type="number" name="coordinator_phone" id="coordinator_phone" value="{{ old('coordinator_phone', $center->coordinator_phone) }}" step="1">
                @if($errors->has('coordinator_phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('coordinator_phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.center.fields.coordinator_phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="coordinator_email">{{ trans('cruds.center.fields.coordinator_email') }}</label>
                <input class="form-control {{ $errors->has('coordinator_email') ? 'is-invalid' : '' }}" type="email" name="coordinator_email" id="coordinator_email" value="{{ old('coordinator_email', $center->coordinator_email) }}">
                @if($errors->has('coordinator_email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('coordinator_email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.center.fields.coordinator_email_helper') }}</span>
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
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.centers.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $center->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

<script>
    Dropzone.options.logoDropzone = {
    url: '{{ route('admin.centers.storeMedia') }}',
    maxFilesize: 20, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 20,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="logo"]').remove()
      $('form').append('<input type="hidden" name="logo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="logo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($center) && $center->logo)
      var file = {!! json_encode($center->logo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="logo" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
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
<script>
    Dropzone.options.imageDropzone = {
    url: '{{ route('admin.centers.storeMedia') }}',
    maxFilesize: 20, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 20,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="image"]').remove()
      $('form').append('<input type="hidden" name="image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($center) && $center->image)
      var file = {!! json_encode($center->image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="image" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
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
<script>
    Dropzone.options.licenseImageDropzone = {
    url: '{{ route('admin.centers.storeMedia') }}',
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
    success: function (file, response) {
      $('form').find('input[name="license_image"]').remove()
      $('form').append('<input type="hidden" name="license_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="license_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($center) && $center->license_image)
      var file = {!! json_encode($center->license_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="license_image" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
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