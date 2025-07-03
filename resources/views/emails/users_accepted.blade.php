
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>تم قبول الجمعية</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .email-container {
            max-width: 600px;
            background-color: #ffffff;
            margin: 40px auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            direction: rtl;
            text-align: right;
        }
        .logo {
            text-align: center;
            margin-bottom: 25px;
        }
        .logo img {
            max-height: 70px;
        }
        .header {
            font-size: 22px;
            margin-bottom: 20px;
            color: #135a7c;
        }
        .footer {
            margin-top: 30px;
            font-size: 13px;
            text-align: center;
            color: #999;
        }
        .btn {
            display: inline-block;
            padding: 12px 20px;
            background-color: #135a7c;
            color: #fff;
            text-decoration: none;
            border-radius: 6px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="logo">
            <img src="{{ asset('frontend/images/logo.png') }}" alt="شعار الموقع">
        </div>
        <div class="header">
            تهانينا! تم قبول طلب الأنضمام في منصة <strong>عاصم</strong>
        </div>
        <p>عزيزي/عزيزتي <strong>{{ $user->name }}</strong>،</p>
        <p>تم <strong style="color: green;">قبول</strong> طلب الأنضمام ويمكنكم الآن الدخول إلى النظام واستخدام كافة المزايا.</p>
        <a href="{{ url('/') }}" class="btn">الذهاب إلى الموقع</a>
        <div class="footer">
            هذا البريد تم إرساله من نظام <strong>جمعية عاصم</strong> للتدريب والتأهيل.
        </div>
    </div>
</body>
</html>
