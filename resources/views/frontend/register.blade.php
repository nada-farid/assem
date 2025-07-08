@extends('frontend.layouts.main')
@section('styles')
<style>
    .step {
        display: none;
    }

    .step.active {
        display: block;
    }

    input,
    select,
    textarea {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border-radius: 5px;
        border: 1px solid #ccc;
    }

    .buttons {
        text-align: center;
        margin-top: 20px;
    }

    .progress {
        text-align: center;
        padding: 20px 0 50px;
        display: flex;
        justify-content: center;
    }

    .progress span {
        display: inline-block;
        width: 30px;
        height: 30px;
        background: #ccc;
        border-radius: 50%;
        margin: 0 5px;
        line-height: 30px;
        color: white;
    }

    .progress span.active {
        background: #ABC157;
    }

    .text-danger {
        color: #dc3545;
        font-size: 14px;
    }

    input.error,
    select.error,
    textarea.error {
        border: 1px solid #dc3545 !important;
    }

    input.valid,
    select.valid,
    textarea.valid {
        border: 1px solid #28a745 !important;
    }

    label.error {
        color: #dc3545 !important;
    }

    .iti {
        display: block !important;
    }

    .iti__selected-flag {
        border-radius: 15px;
    }

</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
@endsection

@section('content')
@include('frontend.partials.breadcrumb', ['heading' => 'تسجيل جهة', 'text' => 'اختر نوع الجهة واستكمل التسجيل'])

<section class="space background-image" style="background-image: url('{{ asset('assets/img/bg/course-bg-pattern.jpg') }}');">
    <div class="container">
        <div class="form-style5 ajax-contact">
            <div class="container">
                <div class="progress">
                    <span class="step-indicator active">1</span>
                    <span class="step-indicator">2</span>
                    <span class="step-indicator">3</span>
                    <span class="step-indicator">4</span>
                </div>

                <form id="wizardForm" method="POST" action="{{ route('frontend.user.store') }}" enctype="multipart/form-data">
                    @csrf

                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                    </div>
                    @endif

                    <!-- Step 0 -->
                    <div class="step active" data-step="0">
                        <div class="form-group mt-20">
                            <label>نوع الجهة</label>
                            <select class="form-control" name="entity_type" id="entityType" required style="background:none;">
                                <option value="">اختر نوع الجهة</option>
                                <option value="center" {{ old('entity_type') == 'center' ? 'selected' : '' }}>مركز تدريب</option>
                                <option value="association" {{ old('entity_type') == 'association' ? 'selected' : '' }}>جمعية</option>
                            </select>
                            @error('entity_type') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <!-- Step 1 -->
                    <div class="step" data-step="1">
                        <!-- مركز -->
                        <div id="centerStep1" class="entity-step">
                            <input type="text" name="center_name" placeholder="اسم المركز" value="{{ old('center_name') }}" required />
                            @error('center_name') <div class="text-danger">{{ $message }}</div> @enderror

                            <label>الشعار</label>
                            <input type="file" name="center_logo" accept="image/*" required />
                            @error('center_logo') <div class="text-danger">{{ $message }}</div> @enderror

                            <input type="text" name="location" placeholder="الموقع الجغرافي" value="{{ old('location') }}" required />
                            @error('location') <div class="text-danger">{{ $message }}</div> @enderror

                            <input type="email" name="center_email" placeholder="البريد الإلكتروني الرسمي" value="{{ old('center_email') }}" required />
                            @error('center_email') <div class="text-danger">{{ $message }}</div> @enderror

                            <input type="password" name="center_password" placeholder="كلمة المرور" required />
                            @error('center_password') <div class="text-danger">{{ $message }}</div> @enderror

                            <input type="url" name="website" placeholder="موقع الإنترنت" value="{{ old('website') }}" required />
                            @error('website') <div class="text-danger">{{ $message }}</div> @enderror

                            <input type="text" name="center_phone" placeholder="رقم الهاتف" value="{{ old('center_phone') }}" class="phone form-control" required />
                            @error('center_phone') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>

                        <!-- جمعية -->
                        <div id="associationStep1" class="entity-step">
                            <input type="text" name="name" placeholder="اسم الجمعية" value="{{ old('name') }}" required />
                            @error('name') <div class="text-danger">{{ $message }}</div> @enderror
                            <input type="file" name="logo" accept="image/*" required />
                            @error('logo') <div class="text-danger">{{ $message }}</div> @enderror

                            <input type="email" name="email" placeholder="البريد الإلكتروني الرسمي" value="{{ old('email') }}" required />
                            @error('email') <div class="text-danger">{{ $message }}</div> @enderror

                            <input type="password" name="password" placeholder="كلمة المرور" required />
                            @error('password') <div class="text-danger">{{ $message }}</div> @enderror

                            <input type="text" name="manager" placeholder="اسم المدير" value="{{ old('manager') }}" required />
                            @error('manager') <div class="text-danger">{{ $message }}</div> @enderror

                            <input type="text" name="phone" placeholder="رقم الهاتف" value="{{ old('phone') }}" class="phone" required />
                            @error('phone') <div class="text-danger">{{ $message }}</div> @enderror

                            <input type="text" name="address" placeholder="العنوان" value="{{ old('address') }}" required />
                            @error('address') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="step" data-step="2">
                        <div id="centerStep2" class="entity-step">
                            <textarea name="description" placeholder="الوصف" required>{{ old('description') }}</textarea>
                            @error('description') <div class="text-danger">{{ $message }}</div> @enderror

                            <input type="text" name="center_license_number" placeholder="رقم الترخيص" value="{{ old('center_license_number') }}" required />
                            @error('center_license_number') <div class="text-danger">{{ $message }}</div> @enderror

                            <input type="text" name="specialization" placeholder="التخصص" value="{{ old('specialization') }}" required />
                            @error('specialization') <div class="text-danger">{{ $message }}</div> @enderror

                            <input type="number" name="experience_years" placeholder="سنوات الخبرة" value="{{ old('experience_years') }}" required />
                            @error('experience_years') <div class="text-danger">{{ $message }}</div> @enderror


                            <label>صورة الترخيص</label>
                            <input type="file" name="license_image" accept="image/*" required />
                            @error('license_image') <div class="text-danger">{{ $message }}</div> @enderror

                            <label>تاريخ انتهاء الترخيص</label>
                            <input type="date" name="center_end_date" value="{{ old('center_end_date') }}" required />
                            @error('center_end_date') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>

                        <div id="associationStep2" class="entity-step">
                            <input type="text" name="license_number" placeholder="رقم الترخيص" value="{{ old('license_number') }}" required />
                            @error('license_number') <div class="text-danger">{{ $message }}</div> @enderror

                            <label>تاريخ انتهاء الترخيص</label>
                            <input type="date" name="end_date" value="{{ old('end_date') }}" required />
                            @error('end_date') <div class="text-danger">{{ $message }}</div> @enderror

                            {{-- <input type="text" name="beneficiaries_count" placeholder="عدد المستفيدين" value="{{ old('beneficiaries_count') }}" />
                            @error('beneficiaries_count') <div class="text-danger">{{ $message }}</div> @enderror --}}

                            <textarea name="bref" placeholder="نبذة عن الجمعية" required>{{ old('bref') }}</textarea>
                            @error('bref') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div class="step" data-step="3">
                        <div id="centerStep3" class="entity-step">
                            <input type="text" name="center_director_name" placeholder="اسم المدير التنفيذي" value="{{ old('center_director_name') }}" required />
                            @error('center_director_name') <div class="text-danger">{{ $message }}</div> @enderror

                            <input type="text" name="center_director_phone" placeholder="رقم الجوال" value="{{ old('center_director_phone') }}" class="phone" required />
                            @error('center_director_phone') <div class="text-danger">{{ $message }}</div> @enderror

                            <input type="email" name="center_director_email" placeholder="البريد الإلكتروني" value="{{ old('center_director_email') }}" required />
                            @error('center_director_email') <div class="text-danger">{{ $message }}</div> @enderror
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="sameAsDirectorCenter">
                                <label class="form-check-label" for="sameAsDirectorCenter">
                                    نفس بيانات المدير التنفيذي
                                </label>
                            </div>

                            <input type="text" name="center_coordinator_name" placeholder="اسم المنسق" value="{{ old('center_coordinator_name') }}" required />
                            @error('center_coordinator_name') <div class="text-danger">{{ $message }}</div> @enderror

                            <input type="text" name="center_coordinator_phone" placeholder="رقم المنسق" value="{{ old('center_coordinator_phone') }}" class="phone" required />
                            @error('center_coordinator_phone') <div class="text-danger">{{ $message }}</div> @enderror

                            <input type="email" name="center_coordinator_email" placeholder="البريد الإلكتروني للمنسق" value="{{ old('center_coordinator_email') }}" required />
                            @error('center_coordinator_email') <div class="text-danger">{{ $message }}</div> @enderror
                            <input type="url" name="center_facebook_link" placeholder="رابط فيسبوك" value="{{ old('center_facebook_link') }}" />
                            @error('center_facebook_link') <div class="text-danger">{{ $message }}</div> @enderror

                            <input type="url" name="center_twitter_link" placeholder="رابط تويتر" value="{{ old('center_twitter_link') }}" />
                            @error('center_twitter_link') <div class="text-danger">{{ $message }}</div> @enderror

                            <input type="url" name="center_linked_in" placeholder="رابط لينكدإن" value="{{ old('center_linked_in') }}" />
                            @error('center_linked_in') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>

                        <div id="associationStep3" class="entity-step">

                            <input type="text" name="director_name" placeholder="اسم المدير التنفيذي" value="{{ old('director_name') }}" required />
                            @error('director_name') <div class="text-danger">{{ $message }}</div> @enderror

                            <input type="text" name="director_phone" placeholder="رقم الجوال" value="{{ old('director_phone') }}" class="phone" required />
                            @error('director_phone') <div class="text-danger">{{ $message }}</div> @enderror

                            <input type="email" name="director_email" placeholder="البريد الإلكتروني" value="{{ old('director_email') }}" required />
                            @error('director_email') <div class="text-danger">{{ $message }}</div> @enderror

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="sameAsDirectorAssociation">
                                <label class="form-check-label" for="sameAsDirectorAssociation">
                                    نفس بيانات المدير التنفيذي
                                </label>
                            </div>

                            <input type="text" name="coordinator_name" placeholder="اسم المنسق" value="{{ old('coordinator_name') }}" required />
                            @error('coordinator_name') <div class="text-danger">{{ $message }}</div> @enderror

                            <input type="text" name="coordinator_phone" placeholder="رقم المنسق" value="{{ old('coordinator_phone') }}" class="phone" required />
                            @error('coordinator_phone') <div class="text-danger">{{ $message }}</div> @enderror

                            <input type="email" name="coordinator_email" placeholder="البريد الإلكتروني للمنسق" value="{{ old('coordinator_email') }}" required />
                            @error('coordinator_email') <div class="text-danger">{{ $message }}</div> @enderror

                            <input type="url" name="facebook_link" placeholder="رابط فيسبوك" value="{{ old('facebook_link') }}" />
                            @error('facebook_link') <div class="text-danger">{{ $message }}</div> @enderror

                            <input type="url" name="twitter_link" placeholder="رابط تويتر" value="{{ old('twitter_link') }}" />
                            @error('twitter_link') <div class="text-danger">{{ $message }}</div> @enderror

                            <input type="url" name="linked_in" placeholder="رابط لينكدإن" value="{{ old('linked_in') }}" />
                            @error('linked_in') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="buttons">
                        <button style="display: none;" class="vs-btn" type="button" id="prevBtn" onclick="nextPrev(-1)">السابق</button>
                        <button class="vs-btn" type="button" id="nextBtn" onclick="nextPrev(1)">التالي</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.min.js"></script>

<script>
    let currentStep = 0;
    const steps = document.querySelectorAll(".step");
    const indicators = document.querySelectorAll(".step-indicator");
    const nextBtn = document.getElementById("nextBtn");
    const prevBtn = document.getElementById("prevBtn");
    let entityType = "{{ old('entity_type') }}";

    function showStep(n) {
        steps.forEach((step, index) => {
            step.classList.toggle("active", index === n);
            indicators[index].classList.toggle("active", index <= n);
        });

        document.querySelectorAll(".entity-step").forEach(e => {
            e.style.display = "none";
            e.querySelectorAll("input, select, textarea").forEach(input => {
                input.removeAttribute("required");
            });
        });

        if (entityType) {
            const selector = `#${entityType}Step${n}`;
            const section = document.querySelector(selector);
            if (section) {
                section.style.display = "block";
                section.querySelectorAll("input, select, textarea").forEach(input => {
                    if (input.getAttribute("type") !== "hidden") {
                        input.setAttribute("required", "required");
                    }
                });
            }
        }

        prevBtn.style.display = n === 0 ? "none" : "inline-block";
        nextBtn.textContent = n === steps.length - 1 ? "إرسال" : "التالي";
    }

    function nextPrev(n) {
        const currentStepEl = steps[currentStep];


        const $currentFields = $(currentStepEl).find("input, select, textarea");


        if (n === 1) {
            let valid = true;
            $currentFields.each(function() {
                if (!$(this).valid()) {
                    valid = false;
                }
            });

            if (!valid) {
                return;
            }


            if (currentStep === 0) {
                const typeSelect = document.getElementById("entityType");
                if (!typeSelect.value) {
                    alert("يرجى اختيار نوع الجهة");
                    return;
                }
                entityType = typeSelect.value;
            }
        }

        currentStep += n;


        if (currentStep >= steps.length) {
            document.getElementById("wizardForm").submit();
            return;
        }


        showStep(currentStep);
    }



    document.addEventListener("DOMContentLoaded", function() {
        showStep(currentStep);
    });

</script>
<script>
    $(document).ready(function() {


        $("#wizardForm").validate({
            highlight: function(element) {
                $(element).addClass('error').removeClass('valid');
            }
            , unhighlight: function(element) {
                $(element).removeClass('error').addClass('valid');
            }
            , ignore: []
            , rules: {
                entity_type: {
                    required: true
                }
                , password: {
                    minlength: 8
                }
                , phone: {
                    regex: /^05[0-9]{8}$/
                },


                name: {
                    required: function() {
                        return $("#entityType").val() === "association";
                    }
                }
                , email: {
                    required: function() {
                        return $("#entityType").val() === "association";
                    }
                    , email: true
                }
                , logo: {
                    required: function() {
                        return $("#entityType").val() === "association";
                    }
                    , extension: "jpg|jpeg|png|gif|svg"
                }
                , license_number: {
                    required: function() {
                        return $("#entityType").val() === "association";
                    }
                }
                , director_name: {
                    required: function() {
                        return $("#entityType").val() === "association";
                    }
                }
                , director_phone: {
                    required: function() {
                        return $("#entityType").val() === "association";
                    }
                    , regex: /^05[0-9]{8}$/
                }
                , director_email: {
                    required: function() {
                        return $("#entityType").val() === "association";
                    }
                    , email: true
                }
                , coordinator_name: {
                    required: function() {
                        return $("#entityType").val() === "association";
                    }
                }
                , coordinator_phone: {
                    required: function() {
                        return $("#entityType").val() === "association";
                    }
                    , regex: /^05[0-9]{8}$/
                }
                , coordinator_email: {
                    required: function() {
                        return $("#entityType").val() === "association";
                    }
                    , email: true
                },

                center_name: {
                    required: function() {
                        return $("#entityType").val() === "center";
                    }
                }
                , center_email: {
                    required: function() {
                        return $("#entityType").val() === "center";
                    }
                    , email: true
                }
                , center_password: {
                    required: function() {
                        return $("#entityType").val() === "center";
                    }
                    , minlength: 8
                }
                , center_logo: {
                    required: function() {
                        return $("#entityType").val() === "center";
                    }
                    , extension: "jpg|jpeg|png|gif|svg"
                }
                , center_license_number: {
                    required: function() {
                        return $("#entityType").val() === "center";
                    }
                }
                , location: {
                    required: function() {
                        return $("#entityType").val() === "center";
                    }
                }
                , website: {
                    required: function() {
                        return $("#entityType").val() === "center";
                    }
                    , url: true
                }
                , specialization: {
                    required: function() {
                        return $("#entityType").val() === "center";
                    }
                }
                , experience_years: {
                    required: function() {
                        return $("#entityType").val() === "center";
                    }
                    , digits: true
                }
                , center_end_date: {
                    required: function() {
                        return $("#entityType").val() === "center";
                    }
                    , date: true
                }
                , center_director_name: {
                    required: function() {
                        return $("#entityType").val() === "center";
                    }
                }
                , center_director_phone: {
                    required: function() {
                        return $("#entityType").val() === "center";
                    }
                    , regex: /^05[0-9]{8}$/
                }
                , center_director_email: {
                    required: function() {
                        return $("#entityType").val() === "center";
                    }
                    , email: true
                }
                , center_coordinator_name: {
                    required: function() {
                        return $("#entityType").val() === "center";
                    }
                }
                , center_coordinator_phone: {
                    required: function() {
                        return $("#entityType").val() === "center";
                    }
                    , regex: /^05[0-9]{8}$/
                }
                , center_coordinator_email: {
                    required: function() {
                        return $("#entityType").val() === "center";
                    }
                    , email: true
                }
                , center_phone: {
                    required: function() {
                        return $("#entityType").val() === "center";
                    }
                    , regex: /^05[0-9]{8}$/
                }
            }
            , messages: {
                entity_type: "يرجى اختيار نوع الجهة"
                , name: "اسم الجمعية مطلوب"
                , email: "البريد الإلكتروني غير صحيح"
                , password: "كلمة المرور يجب أن تكون 8 أحرف على الأقل"
                , logo: "يرجى رفع صورة بصيغة صحيحة"
                , license_number: "رقم الترخيص مطلوب"
                , director_name: "اسم المدير مطلوب"
                , director_phone: "رقم المدير يجب أن يبدأ بـ 05 ويكون 10 أرقام"
                , coordinator_phone: "رقم المنسق يجب أن يبدأ بـ 05 ويكون 10 أرقام"
                , center_name: "اسم المركز مطلوب"
                , center_email: "البريد الإلكتروني غير صالح"
                , center_password: "كلمة المرور يجب أن تكون 8 أحرف على الأقل"
                , website: "رابط الموقع الإلكتروني غير صالح"
                , experience_years: "يرجى إدخال عدد صحيح لسنوات الخبرة"
                , center_director_phone: "رقم المدير يجب أن يبدأ بـ 05 ويكون 10 أرقام"
                , center_coordinator_phone: "يجب أن يبدأ بـ 05 ويكون 10 أرقام"
                , center_phone: "يجب أن يبدأ بـ 05 ويكون 10 أرقام"
            }
        });

        jQuery.extend(jQuery.validator.messages, {
            required: "هذا الحقل مطلوب"
            , email: "يرجى إدخال بريد إلكتروني صالح"
            , url: "يرجى إدخال رابط صحيح"
            , number: "يرجى إدخال رقم صحيح"
            , digits: "يرجى إدخال أرقام فقط"
            , minlength: jQuery.validator.format("الحد الأدنى {0} حروف")
            , maxlength: jQuery.validator.format("الحد الأقصى {0} حروف")
            , equalTo: "من فضلك أدخل نفس القيمة مرة أخرى"
        });

        $.validator.addMethod("regex", function(value, element, regexp) {
            var re = new RegExp(regexp);
            return this.optional(element) || re.test(value);
        }, "القيمة غير صحيحة");


        // الفاليديشن عند مغادرة الحقل
        $("input, select").on("blur", function() {
            $(this).valid();
        });
    });

</script>
<script>
    $(document).ready(function() {

        var inputs = document.querySelectorAll(".phone");

        inputs.forEach(function(input) {
            window.intlTelInput(input, {
                initialCountry: "sa"
                , preferredCountries: ["sa", "eg", "ae", "kw"]
                , separateDialCode: true
                , utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
            });
        });
    });

</script>
<script>
    $(document).ready(function() {
        // للمراكز
        $('#sameAsDirectorCenter').on('change', function() {
            if ($(this).is(':checked')) {
                $('input[name="center_coordinator_name"]').val($('input[name="center_director_name"]').val());
                $('input[name="center_coordinator_phone"]').val($('input[name="center_director_phone"]').val());
                $('input[name="center_coordinator_email"]').val($('input[name="center_director_email"]').val());
            } else {
                $('input[name="center_coordinator_name"]').val('');
                $('input[name="center_coordinator_phone"]').val('');
                $('input[name="center_coordinator_email"]').val('');
            }
        });

        // للجمعيات
        $('#sameAsDirectorAssociation').on('change', function() {
            if ($(this).is(':checked')) {
                $('input[name="coordinator_name"]').val($('input[name="director_name"]').val());
                $('input[name="coordinator_phone"]').val($('input[name="director_phone"]').val());
                $('input[name="coordinator_email"]').val($('input[name="director_email"]').val());
            } else {
                $('input[name="coordinator_name"]').val('');
                $('input[name="coordinator_phone"]').val('');
                $('input[name="coordinator_email"]').val('');
            }
        });

    });

</script>
@endsection
