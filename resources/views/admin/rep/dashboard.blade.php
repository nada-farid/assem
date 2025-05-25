@extends('layouts.admin')
@section('content')
<div class="container">
    <h2>لوحة التحكم - التقارير</h2>
    <canvas id="attendanceChart" width="400" height="200"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('attendanceChart').getContext('2d');
    var attendanceChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['دورة 1', 'دورة 2', 'دورة 3'],
            datasets: [{
                label: 'نسبة الحضور',
                data: [70, 85, 60],
                backgroundColor: 'rgba(54, 162, 235, 0.6)'
            }, {
                label: 'نسبة الغياب',
                data: [30, 15, 40],
                backgroundColor: 'rgba(255, 99, 132, 0.6)'
            }]
        }
    });
</script>
@endsection