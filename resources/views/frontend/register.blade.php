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
        color: red;
        font-size: 14px;
    }

</style>
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
                            <select class="form-control @error('entity_type') is-invalid @enderror" name="entity_type" id="entityType" required>
                                <option value="">اختر نوع الجهة</option>
                                <option value="center" {{ old('entity_type') == 'center' ? 'selected' : '' }}>مركز</option>
                                <option value="association" {{ old('entity_type') == 'association' ? 'selected' : '' }}>جمعية</option>
                            </select>
                            @error('entity_type') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <!-- Step 1 -->
                    <div class="step" data-step="1">
                        <!-- مركز -->
                        <div id="centerStep1" class="entity-step">
                            <input type="text" name="center_name" placeholder="اسم المركز" value="{{ old('center_name') }}" class="@error('center_name') is-invalid @enderror" required />
                            @error('center_name') <div class="text-danger">{{ $message }}</div> @enderror

                            <label>الشعار</label>
                            <input type="file" name="center_logo" accept="image/*" class="@error('center_logo') is-invalid @enderror" required />
                            @error('center_logo') <div class="text-danger">{{ $message }}</div> @enderror

                            <input type="text" name="location" placeholder="الموقع الجغرافي" value="{{ old('location') }}" class="@error('location') is-invalid @enderror" required />
                            @error('location') <div class="text-danger">{{ $message }}</div> @enderror

                            <input type="email" name="center_email" placeholder="البريد الإلكتروني الرسمي" value="{{ old('center_email') }}" class="@error('center_email') is-invalid @enderror" required />
                            @error('center_email') <div class="text-danger">{{ $message }}</div> @enderror

                            <input type="password" name="center_password" placeholder="كلمة المرور" class="@error('center_password') is-invalid @enderror" required />
                            @error('center_password') <div class="text-danger">{{ $message }}</div> @enderror

                            <input type="url" name="website" placeholder="موقع الإنترنت" value="{{ old('website') }}" class="@error('website') is-invalid @enderror" required />
                            @error('website') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>

                        <!-- جمعية -->
                        <div id="associationStep1" class="entity-step">
                            <input type="text" name="name" placeholder="اسم الجمعية" value="{{ old('name') }}" class="@error('name') is-invalid @enderror" required />
                            @error('name') <div class="text-danger">{{ $message }}</div> @enderror
                            <input type="file" name="logo" accept="image/*" class="@error('logo') is-invalid @enderror" required />
                            @error('logo') <div class="text-danger">{{ $message }}</div> @enderror

                            <input type="email" name="email" placeholder="البريد الإلكتروني الرسمي" value="{{ old('email') }}" class="@error('email') is-invalid @enderror" required />
                            @error('email') <div class="text-danger">{{ $message }}</div> @enderror

                            <input type="password" name="password" placeholder="كلمة المرور" class="@error('password') is-invalid @enderror" required />
                            @error('password') <div class="text-danger">{{ $message }}</div> @enderror

                            <input type="text" name="manager" placeholder="اسم المدير" value="{{ old('manager') }}" class="@error('manager') is-invalid @enderror" required />
                            @error('manager') <div class="text-danger">{{ $message }}</div> @enderror

                            <input type="text" name="phone" placeholder="رقم الهاتف" value="{{ old('phone') }}" class="@error('phone') is-invalid @enderror" required />
                            @error('phone') <div class="text-danger">{{ $message }}</div> @enderror

                            <input type="text" name="address" placeholder="العنوان" value="{{ old('address') }}" class="@error('address') is-invalid @enderror" required />
                            @error('address') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="step" data-step="2">
                        <div id="centerStep2" class="entity-step">
                            <textarea name="description" placeholder="الوصف" class="@error('description') is-invalid @enderror" required>{{ old('description') }}</textarea>
                            @error('description') <div class="text-danger">{{ $message }}</div> @enderror

                            <input type="text" name="center_license_number" placeholder="رقم الترخيص" value="{{ old('center_license_number') }}" class="@error('center_license_number') is-invalid @enderror" required />
                            @error('center_license_number') <div class="text-danger">{{ $message }}</div> @enderror

                            <input type="text" name="specialization" placeholder="التخصص" value="{{ old('specialization') }}" class="@error('specialization') is-invalid @enderror" required />
                            @error('specialization') <div class="text-danger">{{ $message }}</div> @enderror

                            <input type="number" name="experience_years" placeholder="سنوات الخبرة" value="{{ old('experience_years') }}" class="@error('experience_years') is-invalid @enderror" required />
                            @error('experience_years') <div class="text-danger">{{ $message }}</div> @enderror

                            <input type="date" name="end_date" value="{{ old('end_date') }}" class="@error('end_date') is-invalid @enderror" required />
                            @error('end_date') <div class="text-danger">{{ $message }}</div> @enderror

                            <label>صورة الترخيص</label>
                            <input type="file" name="license_image" accept="image/*" class="@error('license_image') is-invalid @enderror" required />
                            @error('license_image') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>

                        <div id="associationStep2" class="entity-step">
                            <input type="text" name="license_number" placeholder="رقم الترخيص" value="{{ old('license_number') }}" class="@error('license_number') is-invalid @enderror" required />
                            @error('license_number') <div class="text-danger">{{ $message }}</div> @enderror

                            <input type="text" name="beneficiaries_count" placeholder="عدد المستفيدين" value="{{ old('beneficiaries_count') }}" class="@error('beneficiaries_count') is-invalid @enderror" />
                            @error('beneficiaries_count') <div class="text-danger">{{ $message }}</div> @enderror

                            <textarea name="bref" placeholder="نبذة عن الجمعية" class="@error('bref') is-invalid @enderror" required>{{ old('bref') }}</textarea>
                            @error('bref') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div class="step" data-step="3">




                        <div id="centerStep3" class="entity-step">
                            <input type="text" name="director_name" placeholder="اسم المدير التنفيذي" value="{{ old('director_name') }}" class="@error('director_name') is-invalid @enderror" required />
                            @error('director_name') <div class="text-danger">{{ $message }}</div> @enderror

                            <input type="text" name="center_director_phone" placeholder="رقم الجوال" value="{{ old('center_director_phone') }}" class="@error('center_director_phone') is-invalid @enderror" required />
                            @error('center_director_phone') <div class="text-danger">{{ $message }}</div> @enderror

                            <input type="email" name="center_director_email" placeholder="البريد الإلكتروني" value="{{ old('center_director_email') }}" class="@error('center_director_email') is-invalid @enderror" required />
                            @error('center_director_email') <div class="text-danger">{{ $message }}</div> @enderror

                            <input type="text" name="center_coordinator_name" placeholder="اسم المنسق" value="{{ old('center_coordinator_name') }}" class="@error('center_coordinator_name') is-invalid @enderror" required />
                            @error('center_coordinator_name') <div class="text-danger">{{ $message }}</div> @enderror

                            <input type="text" name="center_coordinator_phone" placeholder="رقم المنسق" value="{{ old('center_coordinator_phone') }}" class="@error('center_coordinator_phone') is-invalid @enderror" required />
                            @error('center_coordinator_phone') <div class="text-danger">{{ $message }}</div> @enderror

                            <input type="email" name="center_coordinator_email" placeholder="البريد الإلكتروني للمنسق" value="{{ old('center_coordinator_email') }}" class="@error('center_coordinator_email') is-invalid @enderror" required />
                            @error('center_coordinator_email') <div class="text-danger">{{ $message }}</div> @enderror
                            <input type="url" name="facebook" placeholder="رابط فيسبوك" value="{{ old('facebook') }}" class="@error('facebook') is-invalid @enderror" />
                            @error('facebook') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>

                        <div id="associationStep3" class="entity-step">

                            <input type="text" name="director_name" placeholder="اسم المدير التنفيذي" value="{{ old('director_name') }}" class="@error('director_name') is-invalid @enderror" required />
                            @error('director_name') <div class="text-danger">{{ $message }}</div> @enderror

                            <input type="text" name="director_phone" placeholder="رقم الجوال" value="{{ old('director_phone') }}" class="@error('director_phone') is-invalid @enderror" required />
                            @error('director_phone') <div class="text-danger">{{ $message }}</div> @enderror

                            <input type="email" name="director_email" placeholder="البريد الإلكتروني" value="{{ old('director_email') }}" class="@error('director_email') is-invalid @enderror" required />
                            @error('director_email') <div class="text-danger">{{ $message }}</div> @enderror

                            <input type="text" name="coordinator_name" placeholder="اسم المنسق" value="{{ old('coordinator_name') }}" class="@error('coordinator_name') is-invalid @enderror" required />
                            @error('coordinator_name') <div class="text-danger">{{ $message }}</div> @enderror

                            <input type="text" name="coordinator_phone" placeholder="رقم المنسق" value="{{ old('coordinator_phone') }}" class="@error('coordinator_phone') is-invalid @enderror" required />
                            @error('coordinator_phone') <div class="text-danger">{{ $message }}</div> @enderror

                            <input type="email" name="coordinator_email" placeholder="البريد الإلكتروني للمنسق" value="{{ old('coordinator_email') }}" class="@error('coordinator_email') is-invalid @enderror" required />
                            @error('coordinator_email') <div class="text-danger">{{ $message }}</div> @enderror
                            <input type="url" name="twitter" placeholder="رابط تويتر" value="{{ old('twitter') }}" class="@error('twitter') is-invalid @enderror" />
                            @error('twitter') <div class="text-danger">{{ $message }}</div> @enderror

                            <input type="url" name="linked_in" placeholder="رابط لينكدإن" value="{{ old('linked_in') }}" class="@error('linked_in') is-invalid @enderror" />
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
        if (n === 1 && !validateForm()) return;

        if (n === 1 && currentStep === 0) {
            const typeSelect = document.getElementById("entityType");
            if (!typeSelect.value) {
                alert("يرجى اختيار نوع الجهة");
                return;
            }
            entityType = typeSelect.value;
        }

        currentStep += n;
        if (currentStep >= steps.length) {
            document.getElementById("wizardForm").submit();
            return;
        }
        showStep(currentStep);
    }

    function validateForm() {
        const currentInputs = steps[currentStep].querySelectorAll("input, select, textarea");
        for (const input of currentInputs) {
            if (input.hasAttribute("required") && !input.value.trim()) {
                input.style.border = "1px solid red";
                return false;
            } else {
                input.style.border = "1px solid #ccc";
            }
        }
        return true;
    }

    document.addEventListener("DOMContentLoaded", function() {
        showStep(currentStep);
    });

</script>
@endsection
