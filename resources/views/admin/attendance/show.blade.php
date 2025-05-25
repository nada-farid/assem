@extends('layouts.admin')
@section('content')

<h3>تقرير المستفيد: {{ $beneficiary->name }}</h3>

<ul>
    <li>إجمالي عدد الدروس: {{ $totalLessons }}</li>
    <li>عدد الدروس التي حضرها: {{ $attended }}</li>
    <li>عدد الدروس التي غابها: {{ $missed }}</li>
    <li>نسبة الحضور: {{ $percentage }}%</li>
</ul>

<canvas id="attendanceChart"></canvas>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('attendanceChart').getContext('2d');
const chart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['حضور', 'غياب'],
        datasets: [{
            data: [{{ $attended }}, {{ $missed }}],
            backgroundColor: ['#4CAF50', '#F44336']
        }]
    }
});
</script>

@endsection
