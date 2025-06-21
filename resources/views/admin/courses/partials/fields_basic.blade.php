<div class="form-group">
    <label class="required" for="title">{{ trans('cruds.course.fields.title') }}</label>
    <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title"
        value="{{ old('title', $course->title ?? '') }}" required>
    @if ($errors->has('title'))
        <div class="invalid-feedback">{{ $errors->first('title') }}</div>
    @endif
</div>

<div class="form-group">
    <label class="required" for="category_id">{{ trans('cruds.course.fields.category') }}</label>
    <select class="form-control select2 {{ $errors->has('category') ? 'is-invalid' : '' }}" name="category_id"
        id="category_id" required>
        @foreach ($categories as $id => $entry)
            <option value="{{ $id }}"
                {{ (old('category_id') ?? ($course->category_id ?? '')) == $id ? 'selected' : '' }}>{{ $entry }}
            </option>
        @endforeach
    </select>
    @if ($errors->has('category'))
        <div class="invalid-feedback">{{ $errors->first('category') }}</div>
    @endif
</div>

<div class="form-group">
    <label class="required" for="center_id">{{ trans('cruds.course.fields.center') }}</label>
    <select class="form-control select2 {{ $errors->has('center') ? 'is-invalid' : '' }}" name="center_id"
        id="center_id" required>
        @foreach ($centers as $id => $entry)
            <option value="{{ $id }}"
                {{ (old('center_id') ?? ($course->center_id ?? '')) == $id ? 'selected' : '' }}>{{ $entry }}
            </option>
        @endforeach
    </select>
    @if ($errors->has('center'))
        <div class="invalid-feedback">{{ $errors->first('center') }}</div>
    @endif
</div>
