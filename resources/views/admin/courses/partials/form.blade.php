
<div class="card">
    <div class="card-header">
        {{ isset($course) ? trans('global.edit') : trans('global.create') }} {{ trans('cruds.course.title_singular') }}
    </div>
    <div class="card-body">
        <form method="POST"
            action="{{ isset($course) ? route('admin.courses.update', $course->id) : route('admin.courses.store') }}"
            enctype="multipart/form-data" id="courseFormWizard">
            @csrf
            @if (isset($course))
                @method('PUT')
            @endif

            {{-- Progress Bar --}}
            <div class="progress mb-4">
                <div class="progress-bar" role="progressbar" style="width: 20%" id="progressBar">الخطوة 1 من 5</div>
            </div>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="step-1">@include('admin.courses.partials.fields_basic')</div>
                <div class="tab-pane fade" id="step-2">@include('admin.courses.partials.fields_media')</div>
                <div class="tab-pane fade" id="step-3">@include('admin.courses.partials.fields_schedule')</div>
                <div class="tab-pane fade" id="step-4">@include('admin.courses.partials.fields_support')</div>
                <div class="tab-pane fade" id="step-5">@include('admin.courses.partials.fields_extra')</div>
            </div>

            <div class="form-navigation mt-3 d-flex justify-content-between">
                <button type="button" class="btn btn-secondary" id="prevBtn">السابق</button>
                <button type="button" class="btn btn-primary" id="nextBtn">التالي</button>
                <button type="submit" class="btn btn-danger d-none" id="submitBtn">حفظ</button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function () {
    const steps = ['#step-1', '#step-2', '#step-3', '#step-4', '#step-5'];
    let currentStep = 0;

    function showStep(index) {
        $('.tab-pane').removeClass('show active');
        $(steps[index]).addClass('show active');

        $('#prevBtn').toggle(index !== 0);
        $('#nextBtn').toggle(index !== steps.length - 1);
        $('#submitBtn').toggleClass('d-none', index !== steps.length - 1);

        // Progress Bar update
        let percent = ((index + 1) / steps.length) * 100;
        $('#progressBar')
            .css('width', percent + '%')
            .text(`الخطوة ${index + 1} من ${steps.length}`);
    }

    function validateCurrentStep() {
        let currentTab = $(steps[currentStep]);
        let valid = true;

        // Validate inputs
        currentTab.find('input, select, textarea').each(function () {
            if (!this.checkValidity()) {
                $(this).addClass('is-invalid');
                valid = false;
            } else {
                $(this).removeClass('is-invalid');
            }
        });

        return valid;
    }

    $('#nextBtn').click(function () {
        if (validateCurrentStep()) {
            currentStep++;
            showStep(currentStep);
        }
    });

    $('#prevBtn').click(function () {
        currentStep--;
        showStep(currentStep);
    });

    // Initialize first step
    showStep(currentStep);
});
</script>
@endpush