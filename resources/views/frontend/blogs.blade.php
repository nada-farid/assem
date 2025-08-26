@extends('frontend.layouts.main')

@section('content')
@include('frontend.partials.breadcrumb', [
'heading' => 'المدونات',
])

<section class="vs-blog-wrapper space-top space-extra-bottom">
    <div class="container">
        <div class="row gx-40">
            <div class="col-lg-8">
                @foreach($blogs as $blog)

                <div class="vs-blog blog-single">
                    <div class="blog-img">
                        <img src="{{$blog->photo->getUrl()}}" alt="Blog Image">
                        <a href="{{route('frontend.blog',$blog->id)}}" class="blog-date">
                            <span class="day">{{$blog->created_at->format('d')}}</span>
                            <span class="month">{{$blog->created_at->format('M')}}</span>
                        </a>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <a href="{{route('frontend.blog',$blog->id)}}"><i class="fal fa-user"></i>بواسطة {{$blog->by}}</a>
                            <a href="{{route('frontend.blog',$blog->id)}}"><i class="fal fa-comment-lines"></i>{{$blog->comments_count}} تعليق</a>
                        </div>
                        <h2 class="blog-title"><a href="{{route('frontend.blog',$blog->id)}}">"{{$blog->title}}"</a></h2>
                        <p>{!! $blog->content !!}</p>
                        <button type="submit" class="vs-btn">إرسال</button>
                    </div>
                </div>

                @endforeach


                {{$blogs->links()}}
            </div>
            <div class="col-lg-4">
                <aside class="sidebar-area">
                    <div class="widget   ">
                        <h3 class="widget_title">أحدث الاخبار</h3>
                        <div class="recent-post-wrap">
                            @foreach($news as $new)
                            <div class="recent-post">
                                <div class="media-img"><img src="{{$new->image->getUrl()}}" alt="thing"></div>
                                <div class="media-body">
                                    <h4 class="post-title"><a class="text-inherit" href="{{route('frontend.new',$new->id)}}">{{$new->title}}</a></h4>
                                    <div class="recent-post-meta"><a href="{{route('frontend.new',$new->id)}}">{{$new->custom_date}}</a></div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>


                </aside>
            </div>
        </div>
    </div>
</section>

@endsection
