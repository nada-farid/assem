@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.courseRequest.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.course-requests.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="course_id">{{ trans('cruds.courseRequest.fields.course') }}</label>
                <select class="form-control select2 {{ $errors->has('course') ? 'is-invalid' : '' }}" name="course_id" id="course_id" required>
                    @foreach($courses as $id => $entry)
                        <option value="{{ $id }}" {{ old('course_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('course'))
                    <div class="invalid-feedback">
                        {{ $errors->first('course') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.courseRequest.fields.course_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="association_id">{{ trans('cruds.courseRequest.fields.association') }}</label>
                <select class="form-control select2 {{ $errors->has('association') ? 'is-invalid' : '' }}" name="association_id" id="association_id" required>
                    @foreach($associations as $id => $entry)
                        <option value="{{ $id }}" {{ old('association_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('association'))
                    <div class="invalid-feedback">
                        {{ $errors->first('association') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.courseRequest.fields.association_helper') }}</span>
            </div>
            {{-- <div class="form-group">
                <label class="required" for="beneficiar">{{ trans('cruds.courseRequest.fields.beneficiar') }}</label>
                <div class="needsclick dropzone {{ $errors->has('beneficiar') ? 'is-invalid' : '' }}" id="beneficiar-dropzone">
                </div>
                @if($errors->has('beneficiar'))
                    <div class="invalid-feedback">
                        {{ $errors->first('beneficiar') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.courseRequest.fields.beneficiar_helper') }}</span>
            </div> --}}
            <div class="form-group">
                <label>{{ trans('cruds.courseRequest.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\CourseRequest::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', 'bending') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.courseRequest.fields.status_helper') }}</span>
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
    Dropzone.options.beneficiarDropzone = {
    url: '{{ route('admin.course-requests.storeMedia') }}',
    maxFilesize: 40, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 40
    },
    success: function (file, response) {
      $('form').find('input[name="beneficiar"]').remove()
      $('form').append('<input type="hidden" name="beneficiar" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="beneficiar"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($courseRequest) && $courseRequest->beneficiar)
      var file = {!! json_encode($courseRequest->beneficiar) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="beneficiar" value="' + file.file_name + '">')
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