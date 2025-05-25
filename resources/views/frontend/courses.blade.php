@extends('frontend.layouts.main')
@section('styles')
    <style>
        .filter-category.active {
            background-color: var(--theme-color3);
            color: var(--white-color);
        }

        .widget_categories li span.active {
            background-color: var(--theme-color);
            color: var(--white-color);
        }
    </style>
@endsection
@section('content')
    @include('frontend.partials.breadcrumb', [
        'heading' => 'الدورات التدريبية',
        'text' => 'اعتنى الإسلام بالأيتام عناية فائقة فأمر بالإحسان إليهم ورعايتهم وكفالتهم',
    ]) <section class="space-top space-extra-bottom ltr">
        <div class="container-lg">
            <div class="row wow fadeInUp">
                <div class="col-lg-3">
                    <aside class="sidebar-area">
                        <div class="widget widget_search">
                            <h3 class="widget_title">بحث</h3>
                            <form id="searchForm"><input type="text" id="searchInput" placeholder="كلمة البحث"></form>
                        </div>
                        <div class="widget widget_categories">
                            <h3 class="widget_title">فئات الدورات</h3>
                            <li>
                                <a href="#" class="filter-category active" data-id="">كل الفئات</a>
                                <span>{{ $totalCoursesCount }}</span>
                            </li>
                            <ul>
                                @foreach ($categories as $category)
                                    <li><a href="#" class="filter-category"
                                            data-id="{{ $category->id }}">{{ $category->title }}
                                        </a><span>{{ $category->courses_count }}</span></li>
                                @endforeach
                            </ul>
                        </div>
                    </aside>
                </div>
                <div class="col-lg-9">
                    <div id="courseContainer">@include('frontend.partials.course_list', ['courses' => $courses]) </div>
                </div>
            </div>
        </div>
    </section>
    @endsection @section('scripts')
    <script>
        let search = '';
        let category_id = '';
        let page = 1;

        function loadCourses() {
            $.ajax({
                url: "{{ route('frontend.courses.filter') }}",
                data: {
                    search: search,
                    category_id: category_id,
                    page: page
                },
                success: function(res) {
                    $('#courseContainer').html(res.html);
                }
            });
        }

        $(document).on('keyup', '#searchInput', function() {
            search = $(this).val();
            page = 1;
            loadCourses();
        });
        $(document).on('click', '.filter-category', function(e) {
            e.preventDefault();


            $('.filter-category').removeClass('active');
            $('.widget_categories li span').removeClass('active');


            $(this).addClass('active');


            $(this).next('span').addClass('active');


            category_id = $(this).data('id');
            page = 1;
            loadCourses();
        });


        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();
            page = $(this).attr('href').split('page=')[1];
            loadCourses();
        });
    </script>
@endsection
