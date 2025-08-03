<div class="form-group">
    <label class=" " for="supporter_id">{{ trans('cruds.course.fields.supporter') }}</label>
    <select class="form-control select2" name="supporter_id" id="supporter_id"  >
        @foreach ($supporters as $id => $entry)
            <option value="{{ $id }}" {{ (old('supporter_id') ?? $course->supporter_id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label class=" " for="support_value">{{ trans('cruds.course.fields.support_value') }}</label>
    <input class="form-control" type="number" name="support_value" id="support_value" value="{{ old('support_value', $course->support_value ?? '') }}"  >
</div>

<div class="form-group">
    <label class=" " for="number_supported">{{ trans('cruds.course.fields.number_supported') }}</label>
    <input class="form-control" type="number" name="number_supported" id="number_supported" value="{{ old('number_supported', $course->number_supported ?? '') }}"  >
</div>

<div class="form-group">
    <label class=" " for="goal_id">{{ trans('cruds.course.fields.goal') }}</label>
    <select class="form-control select2" name="goal_id" id="goal_id"  >
        @foreach ($goals as $id => $entry)
            <option value="{{ $id }}" {{ (old('goal_id') ?? $course->goal_id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
        @endforeach
    </select>
</div>
