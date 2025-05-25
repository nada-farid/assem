
@extends('frontend.layouts.main')

@section('content')
@include('frontend.partials.breadcrumb', [
           'heading' => 'الاخبار',
       ])

       <section class="space-top space-bottom ">
           <div class="container ltr">

               <div class="row wow fadeInUp  wow-animated">
                   @foreach ($news as $new)
                       <div class="col-sm-6 col-xl-4 ">
                           <div class="vs-blog blog-style2">
                               <div class="blog-img">
                                   <a href="news-details.html" tabindex="-1"><img class="w-100"
                                           src="{{ $new->photo->getUrl() }}" alt="Blog Img"></a>
                               </div>
                               <div class="blog-content">
                                   <div class="blog-meta">
                                       <a href="{{ route('frontend.news') }}" tabindex="-1"><i
                                               class="fal fa-calendar-alt"></i>{{ $new->custom_date }}</a>
                                   </div>
                                   <h4 class="blog-title h5"><a href="{{ route('frontend.new', $new->id) }}"
                                           tabindex="-1">{{ $new->title }}</a></h4>
                                   <p class="blog-text">
                                       {{ $new->short_description }}
                                   </p>

                               </div>
                           </div>
                       </div>
                   @endforeach

                  {{ $news->links('vendor.pagination.custom-pagination') }}

               </div>
           </div>

       </section>

   @endsection
