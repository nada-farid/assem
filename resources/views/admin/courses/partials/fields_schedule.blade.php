<div class="form-group">
    <label class="required" for="duration">{{ trans('cruds.course.fields.duration') }}</label>
    <input class="form-control" type="text" name="duration" id="duration" value="{{ old('duration', $course->duration ?? '') }}" required>
</div>

<div class="form-group">
    <label class="required" for="duration_weekly">{{ trans('cruds.course.fields.duration_weekly') }}</label>
    <input class="form-control" type="text" name="duration_weekly" id="duration_weekly" value="{{ old('duration_weekly', $course->duration_weekly ?? '') }}" required>
</div>

<div class="form-group">
    <label for="start_at">{{ trans('cruds.course.fields.start_at') }}</label>
    <input class="form-control datetime" type="text" name="start_at" id="start_at" value="{{ old('start_at', $course->start_at ?? '') }}">
</div>

<div class="form-group">
    <label for="end_at">{{ trans('cruds.course.fields.end_at') }}</label>
    <input class="form-control datetime" type="text" name="end_at" id="end_at" value="{{ old('end_at', $course->end_at ?? '') }}">
</div>
