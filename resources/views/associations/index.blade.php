@extends('associations.layout')

@section('content')
<div class="az-content az-content-dashboard">
    <div class="container">
        <div class="az-content-body">
            <div class="az-dashboard-one-title">
                <div>
                    <h2 class="az-dashboard-title">مرحبــا، اهلا بعودتك مره اخرى</h2>
                </div>
                <div class="az-content-header-right">
                    <div class="media">
                        <div class="media-body">
                            <label>تاريخ بداية الاشتراك</label>
                            <h6>{{ auth()->user()?->custom_date }}</h6>
                        </div>
                    </div>
                    <a href="{{ route('association.courses.add') }}" class="btn btn-purple btn-rounded">
                        إضافة المتدربين الى دورة
                    </a>
                </div>
            </div><!-- az-dashboard-one-title -->

            <div class="row">
                <div class="col-md-4">
                    <div class="counter-container">
                        <i class="fa-solid fa-users"></i>
                        <div class="counter" data-target="{{ $ben_count }}"></div>
                        <span>عدد المتدربين</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="counter-container">
                        <i class="fa-solid fa-chalkboard"></i>
                        <div class="counter" data-target="{{ $courses_count }}"></div>
                        <span>عدد الدورات التدريبية</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="counter-container">
                        <i class="fa-regular fa-file"></i>
                        <div class="counter" data-target="{{ $orders_count }}"></div>
                        <span>عدد الطلبات</span>
                    </div>
                </div>
            </div>

            <div class=" mt-4">
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="card shadow-sm">
                            <div class="card-header bg-primary text-white fw-bold">
                                الدورات الأكثر طلبًا
                            </div>
                            <div class="card-body">
                                <canvas id="popularCoursesChart" height="300"></canvas>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-4">
                        <div class="card shadow-sm">
                            <div class="card-header bg-info text-white fw-bold">
                                الطلبات الشهرية
                            </div>
                            <div class="card-body">
                                <canvas id="monthlyRequestsChart" height="300"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div><!-- az-content-body -->
    </div>
</div><!-- az-content -->
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

<script>
    const popularCoursesData = @json($popularCourses->map(function($item) {
        return ['title' => $item->course->title ?? 'غير محدد', 'total' => $item->total];
    }));

    const monthlyRequestsData = @json($monthlyRequests->map(function($item) {
        return ['month' => $item->month, 'total' => $item->total];
    }));

    // تشارت أكثر الدورات طلبًا - مخطط دونات
    const ctx1 = document.getElementById('popularCoursesChart').getContext('2d');
    new Chart(ctx1, {
        type: 'doughnut',
        data: {
            labels: popularCoursesData.map(item => item.title),
            datasets: [{
                label: 'عدد الطلبات',
                data: popularCoursesData.map(item => item.total),
                backgroundColor: [
                    '#6f42c1',
                    '#20c997',
                    '#fd7e14',
                    '#007bff',
                    '#dc3545'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom'
                },
                datalabels: {
                    color: '#fff',
                    formatter: (value, context) => {
                        let total = context.chart.data.datasets[0].data.reduce((a, b) => a + b, 0);
                        let percentage = (value / total * 100).toFixed(1);
                        return `${percentage}%`;
                    }
                }
            }
        },
        plugins: [ChartDataLabels]
    });

    // تشارت الطلبات الشهرية - خطي
    const ctx2 = document.getElementById('monthlyRequestsChart').getContext('2d');
    new Chart(ctx2, {
        type: 'line',
        data: {
            labels: monthlyRequestsData.map(item => item.month),
            datasets: [{
                label: 'عدد الطلبات',
                data: monthlyRequestsData.map(item => item.total),
                borderColor: '#20c997',
                backgroundColor: 'rgba(32, 201, 151, 0.2)',
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
</script>
@endsection
