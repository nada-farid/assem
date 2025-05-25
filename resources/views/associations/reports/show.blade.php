@extends('associations.layout')
@section('content')

    <h4 class="mt-4 text-center">متابعة طلب الدورة: {{ $courseRequest->course->title }}</h4>
   

    <ul >
        <li>عدد المستفيدين المسجلين: {{ $courseRequest->beneficiaries->count() }}</li>
        <li>معدل الحضور الكلي: {{ $overallAttendancePercentage }}%</li>
        <li>عدد الدروس الكلي: {{ $totalLessons }}</li>
        <li>عدد الحضور الكلي: {{ $totalAttended }}</li>
        <li>عدد الغياب الكلي: {{ $totalMissed }}</li>
    </ul>

    <canvas id="attendanceChart" width="400" height="200"></canvas>

@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('attendanceChart').getContext('2d');
    const attendanceChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['حضور', 'غياب'],
            datasets: [{
                label: 'إجمالي الحضور والغياب',
                data: [{{ $totalAttended }}, {{ $totalMissed }}],
                backgroundColor: ['#4CAF50', '#F44336']
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false }
            }
        }
    });
</script>
@endsection
