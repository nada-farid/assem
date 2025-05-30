<div class="row">
    @forelse ($courses as $course)
        <div class="col-sm-6 col-xl-4">
            <div class="course-style1">
                <div class="course-img">
                    <a href="#"><img class="w-100" src="{{ $course->photo?->getUrl() }}" alt="Course Img"></a>
                    <div class="course-category">
                        <a href="#">{{ $course->category->title ?? 'بدون تصنيف' }}</a>
                    </div>
                    <a href="{{ $course->video_url }}" class="vs-btn style2 popup-video">
                        <i class="fas fa-play"></i>عرض الدورة
                    </a>
                </div>
                <div class="course-content">
                    <h3 class="h5 course-name"><a
                            href="{{ route('frontend.course', $course->id) }}">{{ $course->title }}</a></h3>
                    <div class="course-teacher"><a href="#" class="text-inherit">بواسطة :
                            {{ $course->center?->name }}</a></div>
                </div>
                <div class="course-meta">
                    <span><i class="fal fa-users"></i>{{ $course->beneficiary_count }} مستفيد</span>
                    <span><i class="fal fa-calendar-alt"></i>{{ $course->custom_date }}</span>
                </div>
            </div>
        </div>
    @empty
        <p>لا توجد دورات مطابقة.</p>
    @endforelse
</div>

@if ($courses->hasPages())
    <div class="vs-pagination">
        {{ $courses->appends(request()->except('page'))->links() }}
    </div>
@endif
