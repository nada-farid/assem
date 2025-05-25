@extends('layouts.admin')
@section('content')

    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        Dashboard
                    </div>
                    <div class="container-fluid mt-4">
                        <div class="row">
                            <div class="col-md-4 mb-4">
                                <div class="card shadow-sm">
                                    <div class="card-header bg-primary text-white fw-bold">
                                        الدورات الأكثر طلبًا
                                    </div>
                                    <div class="card-body">
                                        <canvas id="popularCoursesChart" height="300"></canvas>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 mb-4">
                                <div class="card shadow-sm">
                                    <div class="card-header bg-success text-white fw-bold">
                                        الجمعيات الأكثر تفاعلاً
                                    </div>
                                    <div class="card-body">
                                        <canvas id="topAssociationsChart" height="300"></canvas>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 mb-4">
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

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row">
                            <div class="{{ $settings1['column_class'] }}">
                                <div class="card text-white bg-info">
                                    <div class="card-body pb-0">
                                        <div class="text-value">{{ number_format($settings1['total_number']) }}</div>
                                        <div>{{ $settings1['chart_title'] }}</div>
                                        <br />
                                    </div>
                                </div>
                            </div>
                            <div class="{{ $settings2['column_class'] }}">
                                <div class="card text-white bg-primary">
                                    <div class="card-body pb-0">
                                        <div class="text-value">{{ number_format($settings2['total_number']) }}</div>
                                        <div>{{ $settings2['chart_title'] }}</div>
                                        <br />
                                    </div>
                                </div>
                            </div>
                            <div class="{{ $settings3['column_class'] }}">
                                <div class="card text-white bg-success">
                                    <div class="card-body pb-0">
                                        <div class="text-value">{{ number_format($settings3['total_number']) }}</div>
                                        <div>{{ $settings3['chart_title'] }}</div>
                                        <br />
                                    </div>
                                </div>
                            </div>
                            {{-- Widget - latest entries --}}
                            <div class="{{ $settings4['column_class'] }}" style="overflow-x: auto;">
                                <h3>{{ $settings4['chart_title'] }}</h3>
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            @foreach ($settings4['fields'] as $key => $value)
                                                <th>
                                                    {{ trans(sprintf('cruds.%s.fields.%s', $settings4['translation_key'] ?? 'pleaseUpdateWidget', $key)) }}
                                                </th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($settings4['data'] as $entry)
                                            <tr>
                                                @foreach ($settings4['fields'] as $key => $value)
                                                    <td>
                                                        @if ($value === '')
                                                            {{ $entry->{$key} }}
                                                        @elseif(is_iterable($entry->{$key}))
                                                            @foreach ($entry->{$key} as $subEentry)
                                                                <span
                                                                    class="label label-info">{{ $subEentry->{$value} }}</span>
                                                            @endforeach
                                                        @else
                                                            {{ data_get($entry, $key . '.' . $value) }}
                                                        @endif
                                                    </td>
                                                @endforeach
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="{{ count($settings4['fields']) }}">
                                                    {{ __('No entries found') }}</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            {{-- Widget - latest entries --}}
                            <div class="{{ $settings5['column_class'] }}" style="overflow-x: auto;">
                                <h3>{{ $settings5['chart_title'] }}</h3>
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            @foreach ($settings5['fields'] as $key => $value)
                                                <th>
                                                    {{ trans(sprintf('cruds.%s.fields.%s', $settings5['translation_key'] ?? 'pleaseUpdateWidget', $key)) }}
                                                </th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($settings5['data'] as $entry)
                                            <tr>
                                                @foreach ($settings5['fields'] as $key => $value)
                                                    <td>
                                                        @if ($value === '')
                                                            {{ $entry->{$key} }}
                                                        @elseif(is_iterable($entry->{$key}))
                                                            @foreach ($entry->{$key} as $subEentry)
                                                                <span
                                                                    class="label label-info">{{ $subEentry->{$value} }}</span>
                                                            @endforeach
                                                        @else
                                                            {{ data_get($entry, $key . '.' . $value) }}
                                                        @endif
                                                    </td>
                                                @endforeach
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="{{ count($settings5['fields']) }}">
                                                    {{ __('No entries found') }}</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
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
        const popularCoursesData = {
            labels: @json($popularCourses->pluck('course.title')),
            datasets: [{
                label: 'عدد الطلبات',
                data: @json($popularCourses->pluck('total')),
                backgroundColor: [
                    '#007bff', '#28a745', '#ffc107', '#dc3545', '#17a2b8'
                ],
                borderWidth: 1
            }]
        };

        const topAssociationsData = {
            labels: @json($topAssociations->pluck('name')),
            datasets: [{
                label: 'عدد الطلبات',
                data: @json($topAssociations->pluck('total')),
                backgroundColor: '#28a745',
                borderColor: '#1e7e34',
                borderWidth: 1
            }]
        };

        const monthlyRequestsData = {
            labels: @json($monthlyRequests->pluck('month')),
            datasets: [{
                label: 'عدد الطلبات',
                data: @json($monthlyRequests->pluck('total')),
                fill: false,
                borderColor: '#007bff',
                tension: 0.4
            }]
        };

        new Chart(document.getElementById('popularCoursesChart'), {
            type: 'doughnut',
            data: popularCoursesData,
            options: {
                responsive: true
            }
        });

        new Chart(document.getElementById('topAssociationsChart'), {
            type: 'bar',
            data: topAssociationsData,
            options: {
                responsive: true
            }
        });

        new Chart(document.getElementById('monthlyRequestsChart'), {
            type: 'line',
            data: monthlyRequestsData,
            options: {
                responsive: true
            }
        });
    </script>
@endsection
