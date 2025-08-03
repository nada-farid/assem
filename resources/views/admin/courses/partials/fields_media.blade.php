<div class="form-group">
    <label for="photo">{{ trans('cruds.course.fields.photo') }}</label>
    <div class="needsclick dropzone" id="photo-dropzone"></div>
          <span class="help-block">{{ trans('cruds.course.fields.photo_helper') }}</span>
</div>

<div class="form-group">
    <label for="inside_image">{{ trans('cruds.course.fields.inside_image') }}</label>
    <div class="needsclick dropzone" id="inside_image-dropzone"></div>
          <span class="help-block">{{ trans('cruds.course.fields.inside_image_helper') }}</span>
</div>

<div class="form-group">
    <label for="video_background">{{ trans('cruds.course.fields.video_background') }}</label>
    <div class="needsclick dropzone" id="video_background-dropzone"></div>
      <span class="help-block">{{ trans('cruds.course.fields.video_background_helper') }}</span>
</div>

<div class="form-group">
    <label for="description">{{ trans('cruds.course.fields.description') }}</label>
    <textarea class="form-control ckeditor" name="description" id="description">{!! old('description', $course->description ?? '') !!}</textarea>
</div>

<div class="form-group">
    <label for="short_description">{{ trans('cruds.course.fields.short_description') }}</label>
    <textarea class="form-control" name="short_description" id="short_description">{{ old('short_description', $course->short_description ?? '') }}</textarea>
</div>

<div class="form-group">
    <label  for="video_url">{{ trans('cruds.course.fields.video_url') }}</label>
    <input class="form-control" type="text" name="video_url" id="video_url" value="{{ old('video_url', $course->video_url ?? '') }}" >
</div>
