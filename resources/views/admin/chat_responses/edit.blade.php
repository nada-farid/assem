@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        تعديل الرد
    </div>

    <div class="card-body">

        <form action="{{ route('admin.chat-chatResponses.update', $chatchatResponse->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="keyword" class="form-label">الكلمة المفتاحية</label>
                <input type="text" name="keyword" id="keyword" value="{{ $chatResponse->keyword }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="reply" class="form-label">الرد</label>
                <textarea name="chatResponse" id="reply" class="form-control" rows="4" required>{{ $chatResponse->reply }}</textarea>
            </div>
            <div class="form-group">
                <span class="toggle-text"> عرض كاختيار سريع</span>

                <div class="form-check {{ $errors->has('is_quick') ? 'is-invalid' : '' }}">
                    <input class="form-check-input" type="checkbox" name="is_quick" id="is_quick" value="1" {{ old('is_quick', $course->is_quick ?? 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label toggle-label" for="is_quick"></label>
                </div>

                @if ($errors->has('is_quick'))
                <div class="invalid-feedback">
                    {{ $errors->first('is_quick') }}
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
