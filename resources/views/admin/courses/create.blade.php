@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.course.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.courses.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="required" for="start_at">{{ trans('cruds.course.fields.start_at') }}</label>
                    <input class="form-control date {{ $errors->has('start_at') ? 'is-invalid' : '' }}" type="text"
                        name="start_at" id="start_at" value="{{ old('start_at') }}" required>
                    @if ($errors->has('start_at'))
                        <div class="invalid-feedback">
                            {{ $errors->first('start_at') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.course.fields.start_at_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="end_at">{{ trans('cruds.course.fields.end_at') }}</label>
                    <input class="form-control date {{ $errors->has('end_at') ? 'is-invalid' : '' }}" type="text"
                        name="end_at" id="end_at" value="{{ old('end_at') }}" required>
                    @if ($errors->has('end_at'))
                        <div class="invalid-feedback">
                            {{ $errors->first('end_at') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.course.fields.end_at_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="photo">{{ trans('cruds.course.fields.photo') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('photo') ? 'is-invalid' : '' }}" id="photo-dropzone">
                    </div>
                    @if ($errors->has('photo'))
                        <div class="invalid-feedback">
                            {{ $errors->first('photo') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.course.fields.photo_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="description">{{ trans('cruds.course.fields.description') }}</label>
                    <textarea class="form-control ckeditor {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description"
                        id="description">{!! old('description') !!}</textarea>
                    @if ($errors->has('description'))
                        <div class="invalid-feedback">
                            {{ $errors->first('description') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.course.fields.description_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="category_id">{{ trans('cruds.course.fields.category') }}</label>
                    <select class="form-control select2 {{ $errors->has('category') ? 'is-invalid' : '' }}"
                        name="category_id" id="category_id" required>
                        @foreach ($categories as $id => $entry)
                            <option value="{{ $id }}" {{ old('category_id') == $id ? 'selected' : '' }}>
                                {{ $entry }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('category'))
                        <div class="invalid-feedback">
                            {{ $errors->first('category') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.course.fields.category_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="title">{{ trans('cruds.course.fields.title') }}</label>
                    <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text"
                        name="title" id="title" value="{{ old('title', '') }}" required>
                    @if ($errors->has('title'))
                        <div class="invalid-feedback">
                            {{ $errors->first('title') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.course.fields.title_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="short_description">{{ trans('cruds.course.fields.short_description') }}</label>
                    <textarea class="form-control {{ $errors->has('short_description') ? 'is-invalid' : '' }}" name="short_description"
                        id="short_description">{{ old('short_description') }}</textarea>
                    @if ($errors->has('short_description'))
                        <div class="invalid-feedback">
                            {{ $errors->first('short_description') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.course.fields.short_description_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="center_id">{{ trans('cruds.course.fields.center') }}</label>
                    <select class="form-control select2 {{ $errors->has('center') ? 'is-invalid' : '' }}" name="center_id"
                        id="center_id" required>
                        @foreach ($centers as $id => $entry)
                            <option value="{{ $id }}" {{ old('center_id') == $id ? 'selected' : '' }}>
                                {{ $entry }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('center'))
                        <div class="invalid-feedback">
                            {{ $errors->first('center') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.course.fields.center_helper') }}</span>
                </div>
                <div class="form-group">
                    <label>{{ trans('cruds.course.fields.type') }}</label>
                    <select class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" name="type"
                        id="type">
                        <option value disabled {{ old('type', null) === null ? 'selected' : '' }}>
                            {{ trans('global.pleaseSelect') }}</option>
                        @foreach (App\Models\Course::TYPE_SELECT as $key => $label)
                            <option value="{{ $key }}" {{ old('type', '') === (string) $key ? 'selected' : '' }}>
                                {{ $label }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('type'))
                        <div class="invalid-feedback">
                            {{ $errors->first('type') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.course.fields.type_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="trainer">{{ trans('cruds.course.fields.trainer') }}</label>
                    <input class="form-control {{ $errors->has('trainer') ? 'is-invalid' : '' }}" type="text"
                        name="trainer" id="trainer" value="{{ old('trainer', '') }}">
                    @if ($errors->has('trainer'))
                        <div class="invalid-feedback">
                            {{ $errors->first('trainer') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.course.fields.trainer_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="inside_image">{{ trans('cruds.course.fields.inside_image') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('inside_image') ? 'is-invalid' : '' }}"
                        id="inside_image-dropzone">
                    </div>
                    @if ($errors->has('inside_image'))
                        <div class="invalid-feedback">
                            {{ $errors->first('inside_image') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.course.fields.inside_image_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="video_url">{{ trans('cruds.course.fields.video_url') }}</label>
                    <input class="form-control {{ $errors->has('video_url') ? 'is-invalid' : '' }}" type="text"
                        name="video_url" id="video_url" value="{{ old('video_url', '') }}" required>
                    @if ($errors->has('video_url'))
                        <div class="invalid-feedback">
                            {{ $errors->first('video_url') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.course.fields.video_url_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="duration">{{ trans('cruds.course.fields.duration') }}</label>
                    <input class="form-control {{ $errors->has('duration') ? 'is-invalid' : '' }}" type="text"
                        name="duration" id="duration" value="{{ old('duration', '') }}" required>
                    @if ($errors->has('duration'))
                        <div class="invalid-feedback">
                            {{ $errors->first('duration') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.course.fields.duration_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required"
                        for="duration_weekly">{{ trans('cruds.course.fields.duration_weekly') }}</label>
                    <input class="form-control {{ $errors->has('duration_weekly') ? 'is-invalid' : '' }}" type="text"
                        name="duration_weekly" id="duration_weekly" value="{{ old('duration_weekly', '') }}" required>
                    @if ($errors->has('duration_weekly'))
                        <div class="invalid-feedback">
                            {{ $errors->first('duration_weekly') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.course.fields.duration_weekly_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="beneficiary_count">{{ trans('cruds.course.fields.beneficiary_count') }}</label>
                    <input class="form-control {{ $errors->has('beneficiary_count') ? 'is-invalid' : '' }}"
                        type="number" name="beneficiary_count" id="beneficiary_count"
                        value="{{ old('beneficiary_count', '') }}" step="1">
                    @if ($errors->has('beneficiary_count'))
                        <div class="invalid-feedback">
                            {{ $errors->first('beneficiary_count') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.course.fields.beneficiary_count_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="goals">{{ trans('cruds.course.fields.goals') }}</label>
                    <textarea class="form-control ckeditor {{ $errors->has('goals') ? 'is-invalid' : '' }}" name="goals"
                        id="goals">{!! old('goals') !!}</textarea>
                    @if ($errors->has('goals'))
                        <div class="invalid-feedback">
                            {{ $errors->first('goals') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.course.fields.goals_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required"
                        for="video_background">{{ trans('cruds.course.fields.video_background') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('video_background') ? 'is-invalid' : '' }}"
                        id="video_background-dropzone">
                    </div>
                    @if ($errors->has('video_background'))
                        <div class="invalid-feedback">
                            {{ $errors->first('video_background') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.course.fields.video_background_helper') }}</span>
                </div>
                <div class="form-group">
                    <span class="toggle-text">{{ trans('cruds.course.fields.avaliable') }}</span>

                    <div class="form-check {{ $errors->has('avaliable') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="checkbox" name="avaliable" id="avaliable" value="1"
                            {{old('avaliable', 0) === 1 ? 'checked' : '' }}>
                        <label class="form-check-label toggle-label" for="avaliable"></label>
                    </div>
                    @if ($errors->has('avaliable'))
                        <div class="invalid-feedback">
                            {{ $errors->first('avaliable') }}
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
        Dropzone.options.photoDropzone = {
            url: '{{ route('admin.courses.storeMedia') }}',
            maxFilesize: 2, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif',
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 2,
                width: 410,
                height: 330
            },
            success: function(file, response) {
                $('form').find('input[name="photo"]').remove()
                $('form').append('<input type="hidden" name="photo" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="photo"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                @if (isset($course) && $course->photo)
                    var file = {!! json_encode($course->photo) !!}
                    this.options.addedfile.call(this, file)
                    this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="photo" value="' + file.file_name + '">')
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
    <script>
        $(document).ready(function() {
            function SimpleUploadAdapter(editor) {
                editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
                    return {
                        upload: function() {
                            return loader.file
                                .then(function(file) {
                                    return new Promise(function(resolve, reject) {
                                        // Init request
                                        var xhr = new XMLHttpRequest();
                                        xhr.open('POST',
                                            '{{ route('admin.courses.storeCKEditorImages') }}',
                                            true);
                                        xhr.setRequestHeader('x-csrf-token', window._token);
                                        xhr.setRequestHeader('Accept', 'application/json');
                                        xhr.responseType = 'json';

                                        // Init listeners
                                        var genericErrorText =
                                            `Couldn't upload file: ${ file.name }.`;
                                        xhr.addEventListener('error', function() {
                                            reject(genericErrorText)
                                        });
                                        xhr.addEventListener('abort', function() {
                                            reject()
                                        });
                                        xhr.addEventListener('load', function() {
                                            var response = xhr.response;

                                            if (!response || xhr.status !== 201) {
                                                return reject(response && response
                                                    .message ?
                                                    `${genericErrorText}\n${xhr.status} ${response.message}` :
                                                    `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`
                                                    );
                                            }

                                            $('form').append(
                                                '<input type="hidden" name="ck-media[]" value="' +
                                                response.id + '">');

                                            resolve({
                                                default: response.url
                                            });
                                        });

                                        if (xhr.upload) {
                                            xhr.upload.addEventListener('progress', function(
                                            e) {
                                                if (e.lengthComputable) {
                                                    loader.uploadTotal = e.total;
                                                    loader.uploaded = e.loaded;
                                                }
                                            });
                                        }

                                        // Send request
                                        var data = new FormData();
                                        data.append('upload', file);
                                        data.append('crud_id', '{{ $course->id ?? 0 }}');
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
        Dropzone.options.insideImageDropzone = {
            url: '{{ route('admin.courses.storeMedia') }}',
            maxFilesize: 20, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif',
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 20,
                width: 860,
                height: 430
            },
            success: function(file, response) {
                $('form').find('input[name="inside_image"]').remove()
                $('form').append('<input type="hidden" name="inside_image" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="inside_image"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                @if (isset($course) && $course->inside_image)
                    var file = {!! json_encode($course->inside_image) !!}
                    this.options.addedfile.call(this, file)
                    this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="inside_image" value="' + file.file_name + '">')
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
    <script>
        Dropzone.options.videoBackgroundDropzone = {
            url: '{{ route('admin.courses.storeMedia') }}',
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
            success: function(file, response) {
                $('form').find('input[name="video_background"]').remove()
                $('form').append('<input type="hidden" name="video_background" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="video_background"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                @if (isset($course) && $course->video_background)
                    var file = {!! json_encode($course->video_background) !!}
                    this.options.addedfile.call(this, file)
                    this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="video_background" value="' + file.file_name + '">')
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
