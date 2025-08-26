
@extends('frontend.layouts.main')

@section('content')
@include('frontend.partials.breadcrumb', [
           'heading' => 'المدونة',
       ])

         <section class="vs-blog-wrapper blog-details space-top space-extra-bottom">
        <div class="container">
            <div class="row gx-40">`
                <div class="col-lg-2"></div>
                    <div class="col-lg-8">

                        <div class="vs-blog blog-single">
                            <div class="blog-img">
                                <img src="{{$blog->inside_imag?->getUrl()}}" alt="Blog Image">
                                <a href="blog.html" class="blog-date"><span class="day">{{$blog->created_at->format('d')}}</span><span class="month">{{$blog->created_at->format('M')}}</span></a>
                            </div>
                            <div class="blog-content">
                                <h2 class="blog-title">{{$blog->title}}</h2>
                                {!! $blog->content !!}
                        </div>

                    </div>

                </div>
            </div>
    </section>
   

   @endsection
