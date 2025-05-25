@extends('associations.layout')
@section('content')
    <div class="az-content pd-y-20 pd-lg-y-30 pd-xl-y-40">
        <div class="container">
            <div class="az-content-body pd-lg-l-40 d-flex flex-column">

                <hr class="mg-y-30">

                <div class="az-dashboard-one-title">
                    <div>
                        <h2 class="az-dashboard-title">إضافة متدربين إلى دورة تدريبية</h2>
                    </div>
                    <div class="az-content-header-right">
                        <a href="asso_course.html" class="btn btn-rounded btn-purple ml-2">عرض الدورات التدريبية</a>
                    </div>
                </div>

                <div class="az-signin-wrapper">
                    <div class="az-card-signin">
                        <div class="az-signin-header">

                            <form action="{{ route('association.courses.enroll') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @if ($errors->any())
                                    <div class="alert alert-danger mt-4">
                                        <h5 class="mb-2">حدثت الأخطاء التالية أثناء رفع الملف:</h5>
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif


                                <div class="row row-sm mg-b-20">
                                    <div class="col-lg-12">
                                        <p class="mg-b-10">إختر الدورة التدريبية</p>
                                        <select class="form-control select2-no-search" name="course_id" required>
                                            <option value="" disabled selected>الدورة التدريبية</option>
                                            @foreach ($courses as $course)
                                                <option value="{{ $course->id }}">{{ $course->title }}</option>
                                            @endforeach
                                        </select>
                                        @error('course_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-lg-12 mg-t-20 mt-20">
                                        <p class="mg-b-10">ملف المتدربين</p>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile" name="file"
                                                required>
                                            <label class="custom-file-label" for="customFile">برجاء تحديد الملف</label>
                                        </div>
                                        <small class="text-muted d-block mt-2">
                                            يمكنك تحميل <a href="{{ asset('files/beneficiaries_sample.xlsx') }}"
                                                download>نموذج ملف المتدربين</a> كمثال.
                                        </small>
                                        @error('file')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <button class="btn btn-az-primary btn-rounded">إضافة</button>

                            </form>
                        </div><!-- az-signin-header -->
                    </div><!-- az-card-signin -->
                </div>

            </div><!-- az-content-body -->
        </div><!-- container -->
    </div>
@endsection
