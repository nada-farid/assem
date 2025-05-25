@extends('associations.layout')
@section('content')
    <div class="az-content pd-y-20 pd-lg-y-30 pd-xl-y-40">
        <div class="container">

            <div class="az-content-body pd-lg-l-40 d-flex flex-column">

                <h3>ملخص حضور الدورات</h3>
                <canvas id="attendanceChart" width="600" height="300"></canvas>

                <hr class="mg-y-30">

                <div class="az-dashboard-one-title">
                    <div>
                        <h2 class="az-dashboard-title"> تقارير الطلبات</h2>
                    </div>
                </div>


                <div class="table-responsive">
                    <table class="table table-striped mg-b-0">
                        <thead>
                            <tr>
                                <th>عنوان الدورة</th>
                                <th>عدد المستفيدين </th>
                                <th>تقارير</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($requests as $request)
                                <tr>
                                    <td><a href="{{ route('frontend.course', $request->course_id) }}">
                                            {{ $request->course->title }} </a> </td>
                                    <td>{{ $request->beneficiaries->count() }} </td>

                                    <td><a href="{{ route('association.reports.show', $request->id) }}"> <i
                                                class="fa-solid fa-file"></i></a></td>

                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div><!-- bd -->




            </div><!-- az-content-body -->
        </div><!-- container -->
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const chartData = @json($chartData);

        const ctx = document.getElementById('attendanceChart').getContext('2d');

        const labels = chartData.map(item => item.course_title);

        const attendancePercentages = chartData.map(item => item.attendance_percentage);

        const totalAttended = chartData.map(item => item.total_attended);
        const totalMissed = chartData.map(item => item.total_missed);

        // مثال على Donut Chart لنسب الحضور والغياب المجمعة لكل دورة:
        const attendanceChart = new Chart(ctx, {
            type: 'bar', // ممكن تغير لـ 'line' أو 'bar' حسب الشكل اللي تحبه
            data: {
                labels: labels,
                datasets: [{
                    label: 'نسبة الحضور (%)',
                    data: attendancePercentages,
                    backgroundColor: 'rgba(54, 162, 235, 0.7)'
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top'
                    },
                    title: {
                        display: true,
                        text: 'نسبة الحضور في الدورات'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100,
                        title: {
                            display: true,
                            text: 'نسبة الحضور (%)'
                        }
                    }
                }
            }
        });
    </script>
@endsection
