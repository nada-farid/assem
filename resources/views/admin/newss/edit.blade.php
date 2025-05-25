@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.news.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.newss.update", [$news->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.news.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $news->title) }}" required>
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.news.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="short_description">{{ trans('cruds.news.fields.short_description') }}</label>
                <textarea class="form-control {{ $errors->has('short_description') ? 'is-invalid' : '' }}" name="short_description" id="short_description" required>{{ old('short_description', $news->short_description) }}</textarea>
                @if($errors->has('short_description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('short_description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.news.fields.short_description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.news.fields.description') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{!! old('description', $news->description) !!}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.news.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="photo">{{ trans('cruds.news.fields.photo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('photo') ? 'is-invalid' : '' }}" id="photo-dropzone">
                </div>
                @if($errors->has('photo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('photo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.news.fields.photo_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="inside_image">{{ trans('cruds.news.fields.inside_image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('inside_image') ? 'is-invalid' : '' }}" id="inside_image-dropzone">
                </div>
                @if($errors->has('inside_image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('inside_image') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.news.fields.inside_image_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description_2">{{ trans('cruds.news.fields.description_2') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('description_2') ? 'is-invalid' : '' }}" name="description_2" id="description_2">{!! old('description_2', $news->description_2) !!}</textarea>
                @if($errors->has('description_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.news.fields.description_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="views">{{ trans('cruds.news.fields.views') }}</label>
                <input class="form-control {{ $errors->has('views') ? 'is-invalid' : '' }}" type="number" name="views" id="views" value="{{ old('views', $news->views) }}" step="1">
                @if($errors->has('views'))
                    <div class="invalid-feedback">
                        {{ $errors->first('views') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.news.fields.views_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="video_url">{{ trans('cruds.news.fields.video_url') }}</label>
                <input class="form-control {{ $errors->has('video_url') ? 'is-invalid' : '' }}" type="text" name="video_url" id="video_url" value="{{ old('video_url', $news->video_url) }}">
                @if($errors->has('video_url'))
                    <div class="invalid-feedback">
                        {{ $errors->first('video_url') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.news.fields.video_url_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="background_image">{{ trans('cruds.news.fields.background_image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('background_image') ? 'is-invalid' : '' }}" id="background_image-dropzone">
                </div>
                @if($errors->has('background_image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('background_image') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.news.fields.background_image_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="date">{{ trans('cruds.news.fields.date') }}</label>
                <input class="form-control date {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text" name="date" id="date" value="{{ old('date', $news->date) }}" required>
                @if($errors->has('date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.news.fields.date_helper') }}</span>
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
                xhr.open('POST', '{{ route('admin.newss.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $news->id ?? 0 }}');
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
    Dropzone.options.photoDropzone = {
    url: '{{ route('admin.newss.storeMedia') }}',
    maxFilesize: 4, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 4,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="photo"]').remove()
      $('form').append('<input type="hidden" name="photo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="photo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($news) && $news->photo)
      var file = {!! json_encode($news->photo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="photo" value="' + file.file_name + '">')
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
    Dropzone.options.insideImageDropzone = {
    url: '{{ route('admin.newss.storeMedia') }}',
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
      $('form').find('input[name="inside_image"]').remove()
      $('form').append('<input type="hidden" name="inside_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="inside_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($news) && $news->inside_image)
      var file = {!! json_encode($news->inside_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="inside_image" value="' + file.file_name + '">')
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
    Dropzone.options.backgroundImageDropzone = {
    url: '{{ route('admin.newss.storeMedia') }}',
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
      $('form').find('input[name="background_image"]').remove()
      $('form').append('<input type="hidden" name="background_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="background_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($news) && $news->background_image)
      var file = {!! json_encode($news->background_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="background_image" value="' + file.file_name + '">')
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