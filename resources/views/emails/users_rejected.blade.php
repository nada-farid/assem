
<div class="email-container">
    <div class="logo">
        <img src="{{ asset('frontend/images/logo.png') }}" alt="شعار الموقع">
    </div>
    <div class="header">نأسف، تم رفض طلب الأنضمام</div>
    <p>عزيزي/عزيزتي <strong>{{ $user->name }}</strong>،</p>
    <p>نعتذر، لم يتم قبول طلب الأنضمام الخاص بكم، وذلك للأسباب التالية:</p>
    <blockquote style="background:#f9f9f9;padding:10px;border-right:5px solid #e3342f;">
        {{ $reason }}
    </blockquote>
    <p>للاستفسار يمكنكم الرد على هذا البريد أو التواصل معنا مباشرة.</p>
    <div class="footer">
        نظام جمعية عاصم - جميع الحقوق محفوظة
    </div>
</div>
