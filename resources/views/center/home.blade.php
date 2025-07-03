@extends('layouts.center')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        Dashboard
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-4 mb-4">
                                <div class="card shadow-sm">
                                    <div class="card-header bg-primary text-white fw-bold">
                                        احصائيات الدورات
                                    </div>
                                    <div class="card-body">
                                        <canvas id="courseChart" width="400" height="400"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('courseChart').getContext('2d');
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['جديدة', 'نشطة', 'منتهية'],
                datasets: [{
                    label: 'عدد الدورات',
                    data: [{{ $courseCounts['new'] }}, {{ $courseCounts['active'] }},
                        {{ $courseCounts['past'] }}
                    ],
                    backgroundColor: ['#36A2EB', '#4BC0C0', '#FF6384']
                }]
            }
        });
    </script>
@endsection
