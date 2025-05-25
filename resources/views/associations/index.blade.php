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
                                <h6>أكتوبر 10, 2023</h6>
                            </div><!-- media-body -->
                        </div><!-- media -->


                        <a href="{{ route('association.courses.add') }}" class="btn btn-purple btn-rounded">إضافة المتدربين
                            الى دورة</a>
                    </div>
                </div><!-- az-dashboard-one-title -->

                <div class="row">
                    <div class="col-md-4">
                        <div class="counter-container">
                            <i class="fa-solid fa-users"></i>
                            <div class="counter" data-target="{{$ben_count}}"></div>
                            <span>عدد المتدربين</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="counter-container">
                            <i class="fa-solid fa-chalkboard"></i>
                            <div class="counter" data-target="{{$courses_count}}"></div>
                            <span>عدد الدورات التدريبية</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="counter-container">
                            <i class="fa-regular fa-file"></i>
                            <div class="counter" data-target="{{$orders_count}}"></div>
                            <span>عدد الطلبات</span>
                        </div>
                    </div>
                </div>

            </div><!-- az-content-body -->
        </div>
    </div><!-- az-content -->
@endsection
@section('scripts')
    <script src="{{ asset('association/js/chart.chartjs.js') }}"></script>
    <script src="{{ asset('association/js/jquery.cookie.js" type="text/javascript') }}"></script>
@endsection
