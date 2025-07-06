@extends('frontend.layouts.main')
@section('styles') 
    <script src="https://www.google.com/recaptcha/enterprise.js?render=6Ldk2VgoAAAAAOGVP5p3dduJoaAHwp1nF3YH6Muq"></script>
@endsection
@section('content')
 @include('frontend.partials.breadcrumb', [
        'heading' => 'عن الجمعية',
        'text' => 'اعتنى الإسلام بالأيتام عناية فائقة فأمر بالإحسان إليهم
                                            ورعايتهم وكفالتهم',
    ])


        <!-- contact-area -->
        <div class="contact-area pt-130">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="contact-form-wrap"> 
                            @if ($errors->count() > 0)
                                <div class="alert alert-danger">
                                    <ul class="list-unstyled">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <h3 class="my-4">أثبات حضور دورة <b>{{$course->title}}</b></h3>
                            <form action="{{ route('frontend.course.attend_store') }}" method="POST">
                                @csrf 
                                <input type="hidden" name="course_id" value="{{ $course->id }}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-grp">
                                            <input type="text" placeholder="رقم الهوية" required name="identity_num">
                                        </div>
                                    </div>  
                                    @include('frontend.partials.recaptcha')
                                    
                                    <div class="submit-btn text-center">
                                        <button type="submit" class="vs-btn mt-4">أثبات حضور</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- contact-area-end -->
@endsection
@section('scripts')

<script
    src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"
></script>
<script
    src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"
></script>
<script
    src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"
></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment-with-locales.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/moment-hijri@2.1.2/moment-hijri.min.js"></script>
<script src="{{ asset('hijri-date-picker-bootstrap/dist/js/bootstrap-hijri-datetimepicker.js?v2') }}"></script> 

<script type="text/javascript">
    $(function () {
        initHijrDatePicker();

        initHijrDatePickerDefault();

        $(".disable-date").hijriDatePicker({
            minDate: "2020-01-01",
            maxDate: "2021-01-01",
            viewMode: "years",
            hijri: true,
            debug: true,
        });
    });

    function initHijrDatePicker() {
        $(".hijri-date-input").hijriDatePicker({
            locale: "ar-sa",
            format: "DD-MM-YYYY",
            hijriFormat: "iDD/iMM/iYYYY",
            dayViewHeaderFormat: "MMMM YYYY",
            hijriDayViewHeaderFormat: "iMMMM iYYYY",
            showSwitcher: false,
            allowInputToggle: true,
            showTodayButton: false,
            useCurrent: true,
            isRTL: false,
            viewMode: "months",
            keepOpen: false,
            hijri: true,
            debug: true,
            showClear: true,
            showTodayButton: true,
            showClose: true,
        });
    }

    function initHijrDatePickerDefault() {
        $(".hijri-date-default").hijriDatePicker();
    } 
</script>

@endsection