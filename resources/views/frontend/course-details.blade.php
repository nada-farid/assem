@extends('frontend.layouts.main')


@section('content')
    <!--==============================
                            Course Area
                        ==============================-->
    @include('frontend.partials.breadcrumb', [
        'heading' => 'الدورات التدريبية',
        'text' => $course->title,
    ])
    <section class="course-details space-top space-extra-bottom">
        <div class="container">
            <div class="mega-hover course-img"><img src="{{ $course->inside_image?->getUrl() }}" alt="girl"></div>
            <div class="row flex-row-reverse">
                <div class="col-lg-4">

                    <div class="course-meta-box">
                        <h6 class="text-center">بواسطة</h6>
                        <div class="team-img text-center">
                            <img src="{{ $course->center->image?->getUrl() }}" alt="">
                        </div>
                        <table>
                            <tbody>
                                <tr>
                                    <th><i class="far fa-hourglass"></i>المدة:</th>
                                    <td>{{ $course->duration }} أسابيع</td>
                                </tr>
                                <tr>
                                    <th><i class="far fa-clock"></i>مدة الدراسة في الاسبوع:</th>
                                    <td>{{ $course->duration_weekly }} ساعة</td>
                                </tr>
                                <tr>
                                    <th><i class="far fa-user-alt"></i>عدد المستفيدين:</th>
                                    <td>{{ $course->beneficiary_count }} مستفيد</td>
                                </tr>
                                <tr>
                                    <th><i class="far fa-suitcase"></i>نوع الدورة:</th>
                                    <td>{{ \App\Models\Course::TYPE_SELECT[$course->type] ?? '' }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="{{ route('association.courses.add') }}" class="vs-btn">تسجيل المستفيدين</a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="course-category">
                        <a href="#">{{ $course->category?->title }}</a>
                    </div>
                    <h2 class="course-title">
                        {{ $course->title }}
                    </h2>
                    <h5 class="border-title2">نبذة تعريفية</h5>
                    {!! $course->description !!}
                    <h5>أهداف الدورة التدريبية</h5>
                    <div class="list-style1 vs-list">
                        <ul>

                            <li>{!! $course->goals !!}</li>

                        </ul>
                    </div>
                    @if ($course->video_url)
                        <div class="inner-video-box">
                            <img src="{{ $course->video_background ? $course->video_background->getUrl() : asset('frontend/assets/img/course/course-details-2.jpg') }}"
                                alt="course video">
                            <a href="{{ $course->video_url }}" class="play-btn position-center popup-video">
                                <i class="fas fa-play"></i>
                            </a>
                        </div>
                    @endif
                    <h5 class="border-title2">المنهج </h5>

                    <div class="accordion accordion-style4" id="faqVersion2">
                        @foreach ($course->chapters ?? [] as $index => $week)
                            <div class="accordion-item {{ $index === 0 ? 'active' : '' }}">
                                <div class="accordion-header" id="heading{{ $index }}">
                                    <button class="accordion-button {{ $index !== 0 ? 'collapsed' : '' }}" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}"
                                        aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                                        aria-controls="collapse{{ $index }}">
                                        <span class="button-label">الأسبوع {{ $index + 1 }}</span>
                                        {{ $week['title'] ?? 'عنوان غير متوفر' }}
                                    </button>
                                </div>
                                <div id="collapse{{ $index }}"
                                    class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}"
                                    aria-labelledby="heading{{ $index }}" data-bs-parent="#faqVersion2">
                                    <div class="accordion-body">

                                        <div class="syllabus-list">
                                            <div class="syllabus-content">
                                                <p class="syllabustext">{!! $week['discription'] !!}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <h5 class="border-title2">تريد ان تبدأ الان؟</h5>
                    <p>يجب تسجيل بيانات الجمعية اولا والموافقة عليها من قبل الإدارة لتقوم بتسجيل المستفيدين</p>
                    <p>اذا كنت مسجل بالفعل برجاء الدخول لتسجيل المستفيدين </p>
                    <a href="{{ route('association.courses.add') }}" class="vs-btn">تسجيل مستفيدين</a>
                    @if ($course->avaliable)
                        <span class="available-badge">متاح الآن</span>
                    @else
                        <span class="available-badge bg-secondary">غير متاح حاليًا</span>
                    @endif

                </div>
            </div>
        </div>
    </section>
@endsection
