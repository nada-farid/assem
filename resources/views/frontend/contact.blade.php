@extends('frontend.layouts.main')
@section('content')
    @include('frontend.partials.breadcrumb', [
        'heading' => 'تواسل معنا ',
    ])
    <!--==============================
    Contact Area
    ==============================-->
    <section class=" space-top space-extra-bottom">
        <div class="container">
            <div class="row gx-80">
                <div class="col-lg-6 col-xl-6 mb-30 mb-lg-0">
                    <h2 class="h3 mt-n2">تواصل معنا</h2>
                    <p class="fs-md mb-4 pb-2">نرحب بتواصلك معنا اذا كان لديك اي من الاستفسارات او الشكاوى</p>
                    <p class="contact-info">
                        <i class="fas fa-clock"></i>
                        مواعيد العمل <br> من السبت الى الخميس : 8ص 5 مساء
                    </p>
                    <p class="contact-info">
                        <i class="fas fa-map-marker-alt"></i>
                        {{ get_setting('address') }}
                    </p>
                    <p class="contact-info">
                        <i class="fas fa-phone-alt"></i>
                        <a class="text-inherit" href="tel: +{{ get_setting('phone') }}">{{ get_setting('phone') }}</a>
                    </p>
                    <p class="contact-info">
                        <i class="fas fa-envelope"></i>
                        <a class="text-inherit" href="mailto:{{ get_setting('email') }}">{{ get_setting('email') }}</a>
                    </p>
                </div>
                <div class="col-lg-6 col-xl-6">
                    <form action="{{route('frontend.contact.store')}}" class="form-style5 ajax-contact">
                        @csrf
                        <div class="vs-circle"></div>
                        <div class="form-group">
                            <input type="text" name="name" id="name" placeholder="الاسم بالكامل">
                        </div>
                        <div class="form-group">
                            <input type="text" name="email" id="email" placeholder="البريد الإلكتروني">
                        </div>
                        <div class="form-group">
                            <input type="text" name="phone" id="number" placeholder="الجوال">
                        </div>
                      
                        <div class="form-group">
                            <textarea name="message" id="message" placeholder="الرسالة"></textarea>
                        </div>
                       
                        <button type="submit" class="vs-btn">إرسال</button>
                        <p class="form-messages"><span class="sr-only">For message will display here</span></p>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <div class="overflow-hidden rounded-20 space-bottom">
        <div class="container">
            <iframe class="bdrs20" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d50437.32487690385!2d144.96230200000002!3d-37.805673!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d4c2b349649%3A0xb6899234e561db11!2sEnvato!5e0!3m2!1sen!2sbd!4v1677062621439!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
    
@endsection
