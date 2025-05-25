@extends('layouts.admin')
@section('content')
    <h3>تسجيل الحضور - {{ $lesson->title }}</h3>

    <form id="attendance-form" method="POST" action="{{route('admin.attendance.store')}}">
        @csrf
        <input type="hidden" name="lesson_id" value="{{ $lesson->id }}">

        <table class="table">
            <thead>
                <tr>
                    <th>المستفيد</th>
                    <th>حضر؟</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($beneficiaries as $beneficiary)
                    <tr>
                        <td>{{ $beneficiary->user?->name }}</td>
                        <td>
                            <input value="1" type="checkbox" name="attendance[{{ $beneficiary->id }}]" 
                                {{ $lesson->attend( $beneficiary->id)  ? 'checked' : '' }}>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <button type="submit" class="btn btn-primary">حفظ</button>
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
