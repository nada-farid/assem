@extends('layouts.admin')

@section('content')
    <h4>تفاصيل طلب الدورة: {{ $courseRequest->course->title }} - الجمعية: {{ $courseRequest->association->name }}</h4>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>الاسم</th>
                <th>الهوية</th>
                <th>الجوال</th>
                <th>النوع</th>
                <th>العنوان</th>
                {{-- <th>الحالة الحالية</th>
                <th>تحديث الحالة</th> --}}
                <th>الحضور</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($courseRequest->beneficiaries as $beneficiary)
                <tr>
                    <td>{{ $beneficiary->user?->name }}</td>
                    <td>{{ $beneficiary->identity_number }}</td>
                    <td>{{ $beneficiary->phone }}</td>
                    <td>{{ \App\Models\Beneficiary::Gender[$beneficiary->gender] }}</td>
                    <td>{{ $beneficiary->address }}</td>
                    {{-- <td>
                        @php $status = $beneficiary->pivot->status ?? 'pending'; @endphp
                        @if ($status === 'approved')
                            <span class="badge bg-success">مقبول</span>
                        @elseif($status === 'refused')
                            <span class="badge bg-danger">مرفوض</span>
                        @else
                            <span class="badge bg-warning text-dark">قيد المراجعة</span>
                        @endif
                    </td> --}}
                    {{-- <td>
                        <select class="form-control form-control-sm status-dropdown"
                            data-request-id="{{ $courseRequest->id }}" data-beneficiary-id="{{ $beneficiary->id }}">
                            <option value="pending" {{ $status == 'pending' ? 'selected' : '' }}>قيد المراجعة</option>
                            <option value="approved" {{ $status == 'approved' ? 'selected' : '' }}>مقبول</option>
                            <option value="refused" {{ $status == 'refused' ? 'selected' : '' }}>مرفوض</option>
                        </select> --}}
                    </td>
                    <td>
                        <ul style="list-style: none; padding: 0;">
                            <li>عدد الدروس: {{ $beneficiary->lessonStats['total'] }}</li>
                            <li>الحضور: {{ $beneficiary->lessonStats['attended'] }}</li>
                            <li>الغياب: {{ $beneficiary->lessonStats['missed'] }}</li>
                            <li>النسبة: {{ $beneficiary->lessonStats['percentage'] }}%</li>
                        </ul>
                        <canvas id="chart-{{ $beneficiary->id }}" width="100" height="100"></canvas>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('scripts')
    <script>
        $(document).on('change', '.status-dropdown', function() {
            let CourseRequestId = $(this).data('request-id');
            let beneficiaryId = $(this).data('beneficiary-id');
            let status = $(this).val();

            $.ajax({
                url: '{{ route('admin.course-requests.update-status') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    course_courseRequest_id: CourseRequestId,
                    beneficiary_id: beneficiaryId,
                    status: status
                },
                success: function(response) {
                    alert(response.message);


                    let badgeCell = $(
                            `select[data-request-id="${CourseRequestId}"][data-beneficiary-id="${beneficiaryId}"]`
                        )
                        .closest('tr').find('td').eq(2);

                    let newBadge = '';
                    if (status === 'approved') {
                        newBadge = '<span class="badge bg-success">مقبول</span>';
                    } else if (status === 'refused') {
                        newBadge = '<span class="badge bg-danger">مرفوض</span>';
                    } else {
                        newBadge = '<span class="badge bg-warning text-dark">قيد المراجعة</span>';
                    }

                    badgeCell.html(newBadge);
                },

                error: function(xhr) {
                    alert('حدث خطأ أثناء تحديث الحالة');
                }
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        @foreach ($courseRequest->beneficiaries as $beneficiary)
            new Chart(document.getElementById('chart-{{ $beneficiary->id }}').getContext('2d'), {
                type: 'doughnut',
                data: {
                    labels: ['حضور', 'غياب'],
                    datasets: [{
                        data: [{{ $beneficiary->lessonStats['attended'] }},
                            {{ $beneficiary->lessonStats['missed'] }}
                        ],
                        backgroundColor: ['#4CAF50', '#F44336']
                    }]
                },
                options: {
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });
        @endforeach
    </script>
@endsection
