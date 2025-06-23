<!DOCTYPE html>
<html dir="rtl">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Certification</title>
        <style>
            * {
                font-family: DejaVu Sans !important;
            }
    
            body {
                font-size: 16px;
                font-family: 'DejaVu Sans', 'Roboto', 'Montserrat', 'Open Sans', sans-serif;
                padding: 10px;
                margin: 10px;
    
                color: #777;
            }
    
    
            body {
                color: #7e3d0f;
                text-align: right;
            }
    
            body h1 {
    
                margin-bottom: 0px;
                padding-bottom: 0px;
                color: #000;
            }
    
            body h3 {
    
                margin-top: 10px;
                margin-bottom: 20px;
                color: #555;
            }
    
            body a {
                color: #06f;
            }
    
            @page {
                size: a4;
                margin: 0;
                padding: 0;
            }
    
            .invoice-box table {
                direction: ltr;
                width: 100%;
                text-align: right;
                border: 1px solid;
                font-family: 'DejaVu Sans', 'Roboto', 'Montserrat', 'Open Sans', sans-serif;
            }
    
    
            .row {
                display: block;
                padding-left: 24;
                padding-right: 24;
                page-break-before: avoid;
                page-break-after: avoid;
            }
    
            .column {
                display: block;
                page-break-before: avoid;
                page-break-after: avoid;
            }
        </style>
    </head>
    <body>
        <div>
            <p
                style="
                    position: absolute;
                    top: 178px;
                    font-size: 22px;
                    right: 280px;
                "
            >
                {{ $name }}
            </p> 
            <p
                style="
                    position: absolute;
                    top: 215px;
                    font-size: 22px;
                    right: 280px; 
                "
            > 
                {{ $course_name }}
            </p>
            <p
                style="
                    position: absolute;
                    top: 249px;
                    font-size: 22px;
                    right: 280px; 
                "
            > 
                {{ $trainer }}
            </p>
            <p
                style="
                    position: absolute;
                    top: 290px;
                    font-size: 22px;
                    right: 230px; 
                "
            > 
                {{ $attend_type }}
            </p>
            <p
                style="
                    position: absolute;
                    top: 290px;
                    font-size: 22px;
                    right: 420px; 
                "
            > 
                {{ $day }}
            </p>
            <p
                style="
                    position: absolute;
                    top: 303px;
                    font-size: 17px;
                    right: 580px; 
                "
            > 
                {{ $course_date }}
            </p> 
            <img
                src="https://daam.org.sa/public/course-certificate.jpg"
                alt=""
                height="500"
                width="750"
            />
        </div>
    </body>
</html>
