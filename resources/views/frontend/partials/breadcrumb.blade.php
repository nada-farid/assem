<div class="breadcumb-wrapper " data-bg-src="{{asset('frontend/assets/img/breadcumb/breadcumb-bg.png')}}">
    <div class="container z-index-common">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">{{$heading}}</h1>
            @if (isset($text))
                <p class="breadcumb-text">
                    {{ $text }}
                </p>
            @endif
            <div class="breadcumb-menu-wrap">
                <ul class="breadcumb-menu">
                    <li><a href="{{route('frontend.home')}}">الرئيسية</a></li>
                    <li> {{$heading}}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
