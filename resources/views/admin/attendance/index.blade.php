@extends('layouts.admin')

@section('content')
    <h3>تسجيل الحضور - {{ $lesson->title }}</h3>

    <form method="POST" action="{{ route('admin.attendance.store') }}">
        @csrf
        <input type="hidden" name="lesson_id" value="{{ $lesson->id }}">

        <table class="table">
            <thead>
                <tr>
                    <th>الاسم</th>
                    <th>حضور</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($beneficiaries as $beneficiary)
                    <tr>
                        <td>{{ $beneficiary->user?->name ?? 'اسم غير متوفر' }}</td>
                        <td>
                            <select name="attendance[{{ $beneficiary->id }}]" class="form-control">
                                <option value="1"
                                    {{ $lesson->attend($beneficiary->id)?->attended == 1 ? 'selected' : '' }}>حضر
                                </option>
                                <option value="0"
                                    {{ $lesson->attend($beneficiary->id)?->attended === 0 ? 'selected' : '' }}>غاب
                                </option>
                            </select>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <button type="submit" class="btn btn-primary">حفظ الحضور</button>
    </form>

    <script>
        $('#attendance-form').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: '{{ route('admin.attendance.store') }}',
                method: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    alert('تم الحفظ بنجاح');
                }
            });
        });
    </script>
@endsection
