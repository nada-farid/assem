<div class="form-group">
    <label for="trainer">{{ trans('cruds.course.fields.trainer') }}</label>
    <input class="form-control" type="text" name="trainer" id="trainer"
        value="{{ old('trainer', $course->trainer ?? '') }}">
</div>

<div class="form-group">
    <label for="assistant">{{ trans('cruds.course.fields.assistant') }}</label>
    <input class="form-control" type="text" name="assistant" id="assistant"
        value="{{ old('assistant', $course->assistant ?? '') }}">
</div>

<div class="form-group">
    <label for="location">{{ trans('cruds.course.fields.location') }}</label>
    <input class="form-control" type="text" name="location" id="location"
        value="{{ old('location', $course->location ?? '') }}">
</div>

<div class="form-group">
    <label for="url">{{ trans('cruds.course.fields.url') }}</label>
    <input class="form-control" type="text" name="url" id="url"
        value="{{ old('url', $course->url ?? '') }}">
</div>

<div class="form-group">
    <label>{{ trans('cruds.course.fields.type') }}</label>
    <select class="form-control" name="type" id="type">
        <option value disabled>{{ trans('global.pleaseSelect') }}</option>
        @foreach (App\Models\Course::TYPE_SELECT as $key => $label)
            <option value="{{ $key }}" {{ old('type', $course->type ?? '') == $key ? 'selected' : '' }}>
                {{ $label }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <span class="toggle-text">{{ trans('cruds.course.fields.avaliable') }}</span>

<div class="form-check {{ $errors->has('avaliable') ? 'is-invalid' : '' }}">
    <input class="form-check-input" type="checkbox" name="avaliable" id="avaliable" value="1"
        {{ old('avaliable', $course->avaliable ?? 0) == 1 ? 'checked' : '' }}>
    <label class="form-check-label toggle-label" for="avaliable"></label>
</div>

    @if ($errors->has('avaliable'))
        <div class="invalid-feedback">
            {{ $errors->first('avaliable') }}
        </div>
    @endif
</div>


<div class="form-group mt-3">
    <button class="btn btn-danger" type="submit">
        {{ trans('global.save') }}
    </button>
</div>
