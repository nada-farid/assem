
@extends('frontend.layouts.main')

@section('content')
@include('frontend.partials.breadcrumb', [
           'heading' => 'الاخبار',
       ])

         <section class="vs-blog-wrapper blog-details space-top space-extra-bottom">
        <div class="container">
            <div class="row gx-40">`
                <div class="col-lg-2"></div>
                    <div class="col-lg-8">

                        <div class="vs-blog blog-single">
                            <div class="blog-img">
                                <img src="{{$new->inside_image->getUrl()}}" alt="Blog Image">
                                <a href="blog.html" class="blog-date"><span class="day">11</span><span class="month">January</span></a>
                            </div>
                            <div class="blog-content">
                                <div class="blog-meta">
                                  
                                    <a href="blog.html"><i class="fal fa-eye"></i>{{$new->views}} مشاهدة</a>
                                </div>
                                <h2 class="blog-title">{{$new->title}}</h2>
                                {!! $new->description !!}
                                <div class="position-relative mt-30 mb-30">
                                    <img src="{{$new->backgroubd_image->getUrl()}}" alt="blog video">
                                    <a href="{{$new->video_link}}" class="play-btn position-center popup-video"><i class="fas fa-play"></i></a>
                                </div>
                                {!! $new->description_2 !!}
                            
                               
                            <div class="share-links clearfix  ">
                                <div class="row justify-content-between">

                                    <div class="col-xl-auto text-xl-end">
                                        <span class="share-links-title">مشاركة:</span>
                                        <ul class="social-links">
                                            <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>

                </div>
            </div>
    </section>
   

   @endsection
