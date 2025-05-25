@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.setting.title_singular') }}
        </div>

        <div class="card-body">

            <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
                <li class="nav-item">
                    <a class="nav-link @if (request('setting_type', 'setting_1') == 'setting_1') active @endif" href="#setting_1" role="tab"
                        data-toggle="tab">
                        عام
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if (request('setting_type') == 'setting_2') active @endif" href="#setting_2" role="tab"
                        data-toggle="tab">
                        روابط السوشيال ميديا
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link @if (request('setting_type') == 'setting_3') active @endif" href="#setting_3" role="tab"
                        data-toggle="tab">
                        تحسين محركات البحث
                    </a>
                </li>  --}}
                <li class="nav-item">
                    <a class="nav-link @if (request('setting_type') == 'setting_4') active @endif" href="#setting_4" role="tab"
                        data-toggle="tab">
                        الأعداد
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link @if (request('setting_type') == 'setting_5') active @endif" href="#setting_5" role="tab"
                        data-toggle="tab">
                        إعادادات لوحة التحكم
                    </a>
                </li> --}}
            </ul>

            <div class="tab-content">
                <div class="tab-pane @if (request('setting_type', 'setting_1') == 'setting_1') active @endif" role="tabpanel" id="setting_1">
                    <form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data"
                        class="p-4">
                        @csrf
                        <input type="hidden" name="setting_type" value="setting_1">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="site_name">{{ trans('cruds.setting.fields.site_name') }}</label>
                                <input class="form-control {{ $errors->has('site_name') ? 'is-invalid' : '' }}"
                                    type="text" name="site_name" id="site_name"
                                    value="{{ old('site_name', get_setting('site_name')) }}">
                                <span class="help-block">{{ trans('cruds.setting.fields.site_name_helper') }}</span>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="logo">{{ trans('cruds.setting.fields.logo') }}</label>
                                <div class="needsclick dropzone {{ $errors->has('logo') ? 'is-invalid' : '' }}"
                                    id="logo-dropzone">
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="about">{{ trans('cruds.setting.fields.about') }}</label>
                                <div class="needsclick dropzone {{ $errors->has('about') ? 'is-invalid' : '' }}"
                                    id="about-dropzone">
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="phone">{{ trans('cruds.setting.fields.phone') }}</label>
                                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text"
                                    name="phone" id="phone" value="{{ old('phone', get_setting('phone')) }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="email">{{ trans('cruds.setting.fields.email') }}</label>
                                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email"
                                    name="email" id="email" value="{{ old('email', get_setting('email')) }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="address">{{ trans('cruds.setting.fields.address') }}</label>
                                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}"
                                    type="text" name="address" id="address"
                                    value="{{ old('address', get_setting('address')) }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="description">{{ trans('cruds.setting.fields.description') }}</label>
                                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }} ckeditor" name="description"
                                    id="description">{{ old('description', get_setting('description')) }}</textarea>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="description_2">{{ trans('cruds.setting.fields.description_2') }}</label>
                                <textarea class="form-control {{ $errors->has('description_2') ? 'is-invalid' : '' }} ckeditor" name="description_2"
                                    id="description_2">{{ old('description_2', get_setting('description_2')) }}</textarea>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="vision_text">{{ trans('cruds.setting.fields.vision_text') }}</label>
                                <textarea class="form-control {{ $errors->has('vision_text') ? 'is-invalid' : '' }}" name="vision_text"
                                    id="vision_text">{{ old('vision_text', get_setting('vision_text')) }}</textarea>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="mission_text">{{ trans('cruds.setting.fields.mission_text') }}</label>
                                <textarea class="form-control {{ $errors->has('mission_text') ? 'is-invalid' : '' }}" name="mission_text"
                                    id="mission_text">{{ old('mission_text', get_setting('mission_text')) }}</textarea>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="values_text">{{ trans('cruds.setting.fields.values_text') }}</label>
                                <textarea class="form-control  ckeditor {{ $errors->has('values_text') ? 'is-invalid' : '' }}" name="values_text"
                                    id="values_text">{{ old('values_text', get_setting('values_text')) }}</textarea>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="structure">{{ trans('cruds.setting.fields.structure') }}</label>
                                <div class="needsclick dropzone {{ $errors->has('structure') ? 'is-invalid' : '' }}"
                                    id="structure-dropzone">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
                <div class="tab-pane @if (request('setting_type') == 'setting_2') active @endif" role="tabpanel" id="setting_2">
                    <form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data"
                        class="p-4">
                        @csrf
                        <input type="hidden" name="setting_type" value="setting_2">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="website">{{ trans('cruds.setting.fields.website') }}</label>
                                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                    type="website" name="website" id="website"
                                    value="{{ old('website', get_setting('website')) }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="twitter">{{ trans('cruds.setting.fields.twitter') }}</label>
                                <input class="form-control {{ $errors->has('twitter') ? 'is-invalid' : '' }}"
                                    type="text" name="twitter" id="twitter"
                                    value="{{ old('twitter', get_setting('twitter')) }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="facebook">{{ trans('cruds.setting.fields.facebook') }}</label>
                                <input class="form-control {{ $errors->has('facebook') ? 'is-invalid' : '' }}"
                                    type="text" name="facebook" id="facebook"
                                    value="{{ old('facebook', get_setting('facebook')) }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="googleplus">{{ trans('cruds.setting.fields.googleplus') }}</label>
                                <input class="form-control {{ $errors->has('googleplus') ? 'is-invalid' : '' }}"
                                    type="text" name="googleplus" id="googleplus"
                                    value="{{ old('googleplus', get_setting('googleplus')) }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="instagram">{{ trans('cruds.setting.fields.instagram') }}</label>
                                <input class="form-control {{ $errors->has('instagram') ? 'is-invalid' : '' }}"
                                    type="text" name="instagram" id="instagram"
                                    value="{{ old('instagram', get_setting('instagram')) }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
                {{-- <div class="tab-pane @if (request('setting_type') == 'setting_3') active @endif" role="tabpanel" id="setting_3">
                    <form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data" class="p-4">
                        @csrf
                        <input type="hidden" name="setting_type" value="setting_3">
                        <div class="form-group">
                            <label>Meta Title</label>
                            <input class="form-control" type="text" name="meta_title"
                                value="{{ get_setting('meta_title') }}">
                        </div>
                        <div class="form-group">
                            <label>Meta Description</label>
                            <input class="form-control" type="test" name="meta_description"
                                value="{{ get_setting('meta_description') }}">
                        </div>
                        <div class="form-group">
                            <label>Keywords</label>
                            <input type="text" class="form-control" name="meta_keywords[]" placeholder="Keywords ..."
                                data-role="tagsinput" value="{{ get_setting('meta_keywords') }}">
                        </div>
                        <div class="form-group">
                            <label>Meta Image</label>
                            <div class="needsclick dropzone" id="metaimage-dropzone">
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>

                    </form>
                </div> --}}
                <div class="tab-pane @if (request('setting_type') == 'setting_4') active @endif" role="tabpanel" id="setting_4">
                    <form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data"
                        class="p-4">
                        @csrf

                        <input type="hidden" name="setting_type" value="setting_4">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="count_courses">{{ trans('cruds.setting.fields.count_courses') }}</label>
                                <input class="form-control {{ $errors->has('count_courses') ? 'is-invalid' : '' }}"
                                    type="text" name="count_courses" id="count_courses"
                                    value="{{ old('count_courses', get_setting('count_courses')) }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="count_benificair">{{ trans('cruds.setting.fields.count_benificair') }}</label>
                                <input class="form-control {{ $errors->has('count_benificair') ? 'is-invalid' : '' }}"
                                    type="text" name="count_benificair" id="count_benificair"
                                    value="{{ old('count_benificair', get_setting('count_benificair')) }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="count_centers">{{ trans('cruds.setting.fields.count_centers') }}</label>
                                <input class="form-control {{ $errors->has('count_centers') ? 'is-invalid' : '' }}"
                                    type="text" name="count_centers" id="count_centers"
                                    value="{{ old('count_centers', get_setting('count_centers')) }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label
                                    for="count_associations">{{ trans('cruds.setting.fields.count_associations') }}</label>
                                <input class="form-control {{ $errors->has('count_associations') ? 'is-invalid' : '' }}"
                                    type="text" name="count_associations" id="count_associations"
                                    value="{{ old('count_associations', get_setting('count_associations')) }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
                {{-- <div class="tab-pane @if (request('setting_type') == 'setting_5') active @endif" role="tabpanel" id="setting_5">
                    <form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data"
                        class="p-4">
                        @csrf
                        <input type="hidden" name="setting_type" value="setting_5">
                        <div class="form-group">
                            <label>Font Link</label>
                            <input class="form-control" type="text" name="font_link[]" placeholder="Font Links ..."
                            data-role="tagsinput" value="{{ get_setting('font_link') }}">
                        </div> 
                        <div class="form-group">
                            <label>Font Name</label>
                            <input class="form-control" type="text" name="font_name[]" placeholder="Fonts ..."
                            data-role="tagsinput" value="{{ get_setting('font_name') }}">
                        </div> 
                        <div class="form-group">
                            <label>Font Size</label>
                            <input class="form-control" type="text"
                                name="font_size" value="{{ get_setting('font_size') }}">
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>SideMenu BackGround Color</label>
                                <input class="form-control" type="color"
                                name="sidemenu_background" value="{{ get_setting('sidemenu_background') }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label>SideMenu Font Color</label>
                                <input class="form-control" type="color"
                                name="sidemenu_font_color" value="{{ get_setting('sidemenu_font_color') }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label>SideMenu Icon Color</label>
                                <input class="form-control" type="color"
                                name="sidemenu_icon_color" value="{{ get_setting('sidemenu_icon_color') }}">
                            </div> 
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div> --}}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        Dropzone.options.logoDropzone = {
            url: '{{ route('admin.settings.storeMedia') }}',
            maxFilesize: 5, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif',
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 5,
                width: 4096,
                height: 4096
            },
            success: function(file, response) {
                $('#setting_1 form').find('input[name="logo"]').remove()
                $('#setting_1 form').append('<input type="hidden" name="logo" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('#setting_1 form').find('input[name="logo"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                @if (get_setting('logo'))
                    var external_link = "{!! asset(get_setting('logo')) !!}"
                    var mockFile = {
                        name: "logo",
                        size: 12345
                    }; // Provide a mock file object
                    this.options.addedfile.call(this, mockFile)
                    this.options.thumbnail.call(this, mockFile, external_link)
                    mockFile.previewElement.classList.add('dz-complete')
                    $('#setting_1 form').append('<input type="hidden" name="logo" value="' + mockFile.file_name +
                        '">')
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
        Dropzone.options.aboutDropzone = {
            url: '{{ route('admin.settings.storeMedia') }}',
            maxFilesize: 5, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif',
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 5,
                width: 4096,
                height: 4096
            },
            success: function(file, response) {
                $('#setting_1 form').find('input[name="about"]').remove()
                $('#setting_1 form').append('<input type="hidden" name="about" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('#setting_1 form').find('input[name="about"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                @if (get_setting('about'))
                    var external_link = "{!! asset(get_setting('about')) !!}"
                    var mockFile = {
                        name: "about",
                        size: 12345
                    }; // Provide a mock file object
                    this.options.addedfile.call(this, mockFile)
                    this.options.thumbnail.call(this, mockFile, external_link)
                    mockFile.previewElement.classList.add('dz-complete')
                    $('#setting_1 form').append('<input type="hidden" name="about" value="' + mockFile.file_name +
                        '">')
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
        Dropzone.options.structureDropzone = {
            url: '{{ route('admin.settings.storeMedia') }}',
            maxFilesize: 5, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif',
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 5,
                width: 4096,
                height: 4096
            },
            success: function(file, response) {
                $('#setting_1 form').find('input[name="structure"]').remove()
                $('#setting_1 form').append('<input type="hidden" name="structure" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('#setting_1 form').find('input[name="structure"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                @if (get_setting('structure'))
                    var external_link = "{!! asset(get_setting('structure')) !!}"
                    var mockFile = {
                        name: "structure",
                        size: 12345
                    }; // Provide a mock file object
                    this.options.addedfile.call(this, mockFile)
                    this.options.thumbnail.call(this, mockFile, external_link)
                    mockFile.previewElement.classList.add('dz-complete')
                    $('#setting_1 form').append('<input type="hidden" name="structure" value="' + mockFile
                        .file_name +
                        '">')
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
        Dropzone.options.metaimageDropzone = {
            url: '{{ route('admin.settings.storeMedia') }}',
            maxFilesize: 5, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif',
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 5,
                width: 4096,
                height: 4096
            },
            success: function(file, response) {
                $('#setting_4 form').find('input[name="metaimage"]').remove()
                $('#setting_4 form').append('<input type="hidden" name="metaimage" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('#setting_4 form').find('input[name="metaimage"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                @if (get_setting('metaimage'))
                    var external_link = "{!! asset(get_setting('metaimage')) !!}"
                    var mockFile = {
                        name: "Meta Image",
                        size: 12345
                    }; // Provide a mock file object
                    this.options.addedfile.call(this, mockFile)
                    this.options.thumbnail.call(this, mockFile, external_link)
                    mockFile.previewElement.classList.add('dz-complete')
                    $('#setting_4 form').append('<input type="hidden" name="metaimage" value="' + mockFile
                        .file_name + '">')
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
                                            '{{ route('admin.settings.storeCKEditorImages') }}',
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
                                        data.append('crud_id', 0);
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
@endsection
