<!DOCTYPE html>
<html @if (app()->getLocale() == 'ar') dir="rtl" @endif>

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ trans('panel.site_title') }}</title>
    <link rel="icon" type="image/png" sizes="56x56" href="{{ asset('frontend/assets/images/fav-icon/icon.png') }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/select/1.3.0/css/select.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" rel="stylesheet" />
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css"
        rel="stylesheet" />
    <link href="https://unpkg.com/@coreui/coreui@3.2/dist/css/coreui.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/css/perfect-scrollbar.min.css"
        rel="stylesheet" />
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
    <style>
        /* تخصيص لوحة الألوان */
        .color-customizer {
            position: fixed;
            top: 50px;
            right: -260px;
            /* مخفية بشكل افتراضي */
            width: 250px;
            background: #fff;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease-in-out;
            z-index: 1100;
        }

        .color-customizer.open {
            right: 10px;
            /* تظهر عند فتحها */
        }

        /* الوضع الليلي */
        .dark-mode {
            background-color: #1e1e2d;
            color: #ffffff;
        }

        /* تخصيص ألوان الـ Sidebar */
        .dark-mode .c-sidebar {
            background-color: #2a2a3c !important;
        }

        .dark-mode .c-sidebar .c-sidebar-nav .c-nav-link {
            color: #ffffff !important;
        }

        .dark-mode .c-sidebar .c-sidebar-nav .c-active>a {
            background-color: #4b4b6a !important;
        }

        /* تخصيص ألوان الـ Navbar */
        .dark-mode .c-header {
            background-color: #222235 !important;
        }

        /* تخصيص ألوان الأزرار */
        .dark-mode .btn {
            background-color: #4b4b6a !important;
            border-color: #4b4b6a !important;
            color: white;
        }

        /* تخصيص الـ Sidebar */
        :root {
            --sidebar-bg-color: #343a40;
            /* اللون الافتراضي للـ Sidebar */
            --sidebar-text-color: #ffffff;
            /* لون النص داخل الـ Sidebar */
            --active-item-color: #007bff;
            /* لون الخلفية للعنصر النشط */
            --active-item-text-color: #ffffff;
            /* لون النص للعنصر النشط */
        }

        /* تخصيص الـ Sidebar */
        .c-sidebar {
            background-color: var(--sidebar-bg-color) !important;
            transition: all 0.3s ease-in-out;

        }

        .c-sidebar.c-sidebar-fixed {
            z-index: 10;
        }

        /* لون النص داخل الـ Sidebar */
        .c-sidebar .c-sidebar-nav-dropdown-toggle,
        .c-sidebar .c-sidebar-nav-link,
        .c-sidebar .c-sidebar-nav-icon {
            color: var(--sidebar-text-color) !important;
            transition: all 0.3s ease-in-out;
        }

        /* العنصر النشط */
        .c-sidebar .c-sidebar-nav-link.c-active {
            background-color: var(--active-item-color) !important;
            color: var(--active-item-text-color) !important;
        }

        /* تغيير لون الروابط داخل الـ Sidebar */
        .c-sidebar .c-sidebar-nav .c-nav-link {
            color: var(--sidebar-text-color) !important;
            transition: all 0.3s ease-in-out;
        }

        /* تغيير لون الـ Hover بناءً على اللون المحفوظ */
        .c-sidebar .c-sidebar-nav-link:hover,
        .c-sidebar .c-sidebar-nav-dropdown-toggle:hover {
            background-color: var(--active-item-color) !important;
            color: var(--active-item-text-color) !important;
        }

        /* buttons */
        :root {
            --bs-primary: #007bff;
            --bs-success: #28a745;
            --bs-warning: #ffc107;
            --bs-danger: #dc3545;
        }

        .btn-primary {
            background-color: var(--bs-primary) !important;
            border-color: var(--bs-primary) !important;
        }

        .btn-success {
            background-color: var(--bs-success) !important;
            border-color: var(--bs-success) !important;
        }

        .btn-warning {
            background-color: var(--bs-warning) !important;
            border-color: var(--bs-warning) !important;
        }

        .btn-danger {
            background-color: var(--bs-danger) !important;
            border-color: var(--bs-danger) !important;
        }

        :root {
            --dashboard-font-size: 16px;
        }

        body {
            font-size: var(--dashboard-font-size);
        }

        body.default-layout {
            max-width: 100%;
            margin: 0;
        }

        body.wide-layout {
            max-width: 100%;
            margin: 0;
        }

        body.boxed-layout {
            max-width: 80%;
            margin: auto;
            border: 5px solid #ddd;
            padding: 20px;
            background: #f5f5f5;
        }

        body.compact-layout {
            max-width: 90%;
            margin: auto;
            padding: 10px;
        }
    </style>
    @yield('styles')
</head>

<body class="c-app">
    @include('partials.menu')
    <div class="c-wrapper">
        <header class="c-header c-header-fixed px-3">
            <button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar"
                data-class="c-sidebar-show">
                <i class="fas fa-fw fa-bars"></i>
            </button>

            <a class="c-header-brand d-lg-none" href="#">{{ trans('panel.site_title') }}</a>

            <button class="c-header-toggler mfs-3 d-md-down-none" type="button" responsive="true">
                <i class="fas fa-fw fa-bars"></i>
            </button>

            <ul class="c-header-nav ml-auto">
                @if (count(config('panel.available_languages', [])) > 1)
                    <li class="c-header-nav-item dropdown d-md-down-none">
                        <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="true" aria-expanded="false">
                            {{ strtoupper(app()->getLocale()) }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            @foreach (config('panel.available_languages') as $langLocale => $langName)
                                <a class="dropdown-item"
                                    href="{{ url()->current() }}?change_language={{ $langLocale }}">{{ strtoupper($langLocale) }}
                                    ({{ $langName }})
                                </a>
                            @endforeach
                        </div>
                    </li>
                @endif
                 <ul class="c-header-nav ml-auto">
                    <li class="c-header-nav-item dropdown notifications-menu">
                        <a href="#" class="c-header-nav-link" data-toggle="dropdown">
                            <i class="far fa-bell"></i>
                            @php($alertsCount = \Auth::user()->userUserAlerts()->where('read', false)->count())
                                @if($alertsCount > 0)
                                    <span class="badge badge-warning navbar-badge">
                                        {{ $alertsCount }}
                                    </span>
                                @endif
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            @if(count($alerts = \Auth::user()->userUserAlerts()->withPivot('read')->limit(10)->orderBy('created_at', 'ASC')->get()->reverse()) > 0)
                                @foreach($alerts as $alert)
                                    <div class="dropdown-item">
                                        <a href="{{ $alert->alert_link ? $alert->alert_link : "#" }}" target="_blank" rel="noopener noreferrer">
                                            @if($alert->pivot->read === 0) <strong> @endif
                                                {{ $alert->alert_text }}
                                                @if($alert->pivot->read === 0) </strong> @endif
                                        </a>
                                    </div>
                                @endforeach
                            @else
                                <div class="text-center">
                                    {{ trans('global.no_alerts') }}
                                </div>
                            @endif
                        </div>
                    </li>
                 </ul>

                <li class="nav-item dropdown">

                    <a class="nav-link" data-toggle="dropdown" href="#">
                        🎨
                    </a>
                    <div class="dropdown-menu dropdown-menu-right p-3" style="min-width: 250px;">
                        <h6 class="text-center">🎨 تخصيص الألوان</h6>

                        <label>لون الـ Sidebar:</label>
                        <input type="color" id="sidebarColorPicker" class="form-control mb-2">

                        <label>لون النص داخل الـ Sidebar:</label>
                        <input type="color" id="sidebarTextColorPicker" class="form-control mb-2">

                        <label>لون الخلفية للعنصر النشط:</label>
                        <input type="color" id="activeItemColorPicker" class="form-control mb-2">

                        <label>لون النص للعنصر النشط:</label>
                        <input type="color" id="activeItemTextColorPicker" class="form-control mb-2">
                        <label>لون الأزرار الأساسية (Primary):</label>
                        <input type="color" id="primaryButtonColorPicker" class="form-control mb-2">

                        <label>لون الأزرار الناجحة (Success):</label>
                        <input type="color" id="successButtonColorPicker" class="form-control mb-2">

                        <label>لون الأزرار التحذيرية (Warning):</label>
                        <input type="color" id="warningButtonColorPicker" class="form-control mb-2">

                        <label>لون الأزرار الخطيرة (Danger):</label>
                        <input type="color" id="dangerButtonColorPicker" class="form-control mb-2">

                        <!-- زر تفعيل الوضع الليلي -->
                        <div class="custom-control custom-switch mt-3">
                            <input type="checkbox" class="custom-control-input" id="toggleDarkMode">
                            <label class="custom-control-label" for="toggleDarkMode">🌙 تفعيل الوضع الليلي</label>
                        </div>



                        <button id="resetColors" class="btn btn-secondary btn-block mt-2">🔄 إعادة التعيين</button>
                    </div>
                </li>
                <li class="nav-item dropdown">

                    <a class="c-header-nav-link nav-link" data-toggle="dropdown" href="#">
                        الخطوط
                    </a>
                    <div class="dropdown-menu dropdown-menu-right p-3" style="min-width: 250px;">
                        <h6 class="text-center"> تخصيص الخطوط</h6>
                        <label>🔤 حجم الخط:</label>
                        <input type="range" id="fontSizePicker" class="form-control mb-2" min="12"
                            max="22" step="1">



                        <button id="resetFontSize" class="btn btn-secondary btn-block mt-2">🔄 إعادة تعيين
                            الخط</button>

                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#"> 🔲 </a>
                    <div id="layoutDropdown" class="dropdown-menu dropdown-menu-right p-3" style="min-width: 250px;">
                        <h6 class="text-center">🔲 اختيار التخطيط</h6>

                        <label>🔲 اختر التخطيط:</label>
                        <select id="layoutSelector" class="form-control mb-2">
                            <option value="default">📌 تخطيط افتراضي</option>
                            <option value="boxed">📦 تخطيط مُحاط</option>
                            <option value="compact">📏 تخطيط مُدمج</option>
                        </select>

                        <!-- زر إعادة تعيين التخطيط -->
                        <button id="resetLayout" class="btn btn-secondary btn-block mt-2">🔄 إعادة تعيين
                            التخطيط</button>
                    </div>
                </li>

            </ul>
        </header>

        <div class="c-body">
            <main class="c-main">


                <div class="container-fluid">
                    @if (session('message'))
                        <div class="row mb-2">
                            <div class="col-lg-12">
                                <div class="alert alert-success" role="alert">{{ session('message') }}</div>
                            </div>
                        </div>
                    @endif
                    @if ($errors->count() > 0)
                        <div class="alert alert-danger">
                            <ul class="list-unstyled">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @yield('content')

                </div>


            </main>
            <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/perfect-scrollbar.min.js"></script>
    <script src="https://unpkg.com/@coreui/coreui@3.2/dist/js/coreui.min.js"></script>
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
        $(function() {
            let copyButtonTrans = '{{ trans('global.datatables.copy') }}'
            let csvButtonTrans = '{{ trans('global.datatables.csv') }}'
            let excelButtonTrans = '{{ trans('global.datatables.excel') }}'
            let pdfButtonTrans = '{{ trans('global.datatables.pdf') }}'
            let printButtonTrans = '{{ trans('global.datatables.print') }}'
            let colvisButtonTrans = '{{ trans('global.datatables.colvis') }}'
            let selectAllButtonTrans = '{{ trans('global.select_all') }}'
            let selectNoneButtonTrans = '{{ trans('global.deselect_all') }}'

            let languages = {
                'ar': 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/Arabic.json',
                'en': 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/English.json'
            };

            $.extend(true, $.fn.dataTable.Buttons.defaults.dom.button, {
                className: 'btn'
            })
            $.extend(true, $.fn.dataTable.defaults, {
                language: {
                    url: languages['{{ app()->getLocale() }}']
                },
                columnDefs: [{
                    orderable: false,
                    className: 'select-checkbox',
                    targets: 0
                }, {
                    orderable: false,
                    searchable: false,
                    targets: -1
                }],
                select: {
                    style: 'multi+shift',
                    selector: 'td:first-child'
                },
                order: [],
                scrollX: true,
                pageLength: 100,
                dom: 'lBfrtip<"actions">',
                buttons: [{
                        extend: 'selectAll',
                        className: 'btn-primary',
                        text: selectAllButtonTrans,
                        exportOptions: {
                            columns: ':visible'
                        },
                        action: function(e, dt) {
                            e.preventDefault()
                            dt.rows().deselect();
                            dt.rows({
                                search: 'applied'
                            }).select();
                        }
                    },
                    {
                        extend: 'selectNone',
                        className: 'btn-primary',
                        text: selectNoneButtonTrans,
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'copy',
                        className: 'btn-default',
                        text: copyButtonTrans,
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'csv',
                        className: 'btn-default',
                        text: csvButtonTrans,
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'excel',
                        className: 'btn-default',
                        text: excelButtonTrans,
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'pdf',
                        className: 'btn-default',
                        text: pdfButtonTrans,
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'print',
                        className: 'btn-default',
                        text: printButtonTrans,
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'colvis',
                        className: 'btn-default',
                        text: colvisButtonTrans,
                        exportOptions: {
                            columns: ':visible'
                        }
                    }
                ]
            });

            $.fn.dataTable.ext.classes.sPageButton = '';
        });
    </script>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const sidebarColorPicker = document.getElementById("sidebarColorPicker");
            const sidebarTextColorPicker = document.getElementById("sidebarTextColorPicker");
            const activeItemColorPicker = document.getElementById("activeItemColorPicker");
            const activeItemTextColorPicker = document.getElementById("activeItemTextColorPicker");
            const resetButton = document.getElementById("resetColors");

            function loadSavedColors() {
                if (localStorage.getItem("sidebarBgColor")) {
                    document.documentElement.style.setProperty("--sidebar-bg-color", localStorage.getItem(
                        "sidebarBgColor"));
                    sidebarColorPicker.value = localStorage.getItem("sidebarBgColor");
                }
                if (localStorage.getItem("sidebarTextColor")) {
                    document.documentElement.style.setProperty("--sidebar-text-color", localStorage.getItem(
                        "sidebarTextColor"));
                    sidebarTextColorPicker.value = localStorage.getItem("sidebarTextColor");
                }
                if (localStorage.getItem("activeItemColor")) {
                    document.documentElement.style.setProperty("--active-item-color", localStorage.getItem(
                        "activeItemColor"));
                    activeItemColorPicker.value = localStorage.getItem("activeItemColor");
                }
                if (localStorage.getItem("activeItemTextColor")) {
                    document.documentElement.style.setProperty("--active-item-text-color", localStorage.getItem(
                        "activeItemTextColor"));
                    activeItemTextColorPicker.value = localStorage.getItem("activeItemTextColor");
                }
            }

            loadSavedColors();

            // تحديث LocalStorage عند اختيار الألوان
            function updateColor(property, value, storageKey) {
                document.documentElement.style.setProperty(property, value);
                localStorage.setItem(storageKey, value);
            }

            sidebarColorPicker.addEventListener("input", function() {
                updateColor("--sidebar-bg-color", this.value, "sidebarBgColor");
            });

            sidebarTextColorPicker.addEventListener("input", function() {
                updateColor("--sidebar-text-color", this.value, "sidebarTextColor");
            });

            activeItemColorPicker.addEventListener("input", function() {
                updateColor("--active-item-color", this.value, "activeItemColor");
            });

            activeItemTextColorPicker.addEventListener("input", function() {
                updateColor("--active-item-text-color", this.value, "activeItemTextColor");
            });

            // تغيير لون Hover عند تمرير الماوس
            const sidebarLinks = document.querySelectorAll(".c-sidebar-nav .c-nav-link");

            function applyHoverEffect() {
                sidebarLinks.forEach(link => {
                    link.addEventListener("mouseover", function() {
                        this.style.backgroundColor = localStorage.getItem("activeItemColor") ||
                            "#007bff";
                        this.style.color = localStorage.getItem("activeItemTextColor") || "#ffffff";
                    });

                    link.addEventListener("mouseout", function() {
                        this.style.backgroundColor = "transparent";
                        this.style.color = localStorage.getItem("sidebarTextColor") || "#ffffff";
                    });
                });
            }

            applyHoverEffect();

            // إعادة تعيين الألوان إلى الافتراضية
            resetButton.addEventListener("click", function() {
                localStorage.removeItem("sidebarBgColor");
                localStorage.removeItem("sidebarTextColor");
                localStorage.removeItem("activeItemColor");
                localStorage.removeItem("activeItemTextColor");
                let colorPickers = {
                    primary: document.getElementById("primaryButtonColorPicker"),
                    success: document.getElementById("successButtonColorPicker"),
                    warning: document.getElementById("warningButtonColorPicker"),
                    danger: document.getElementById("dangerButtonColorPicker")
                };
                let defaultColors = {
                    primary: "#007bff",
                    success: "#28a745",
                    warning: "#ffc107",
                    danger: "#dc3545"
                };
                Object.keys(colorPickers).forEach(type => {
                    localStorage.removeItem(type + "ButtonColor");
                    document.documentElement.style.setProperty(`--bs-${type}`, defaultColors[type]);
                    colorPickers[type].value = defaultColors[type];
                });
                location.reload();
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const toggleDarkMode = document.getElementById("toggleDarkMode");

            // التحقق مما إذا كان الوضع الليلي مفعل في LocalStorage
            if (localStorage.getItem("darkMode") === "true") {
                document.body.classList.add("dark-mode");
                toggleDarkMode.checked = true; // جعل زر التبديل مفعّل تلقائيًا
            }

            // تبديل الوضع الليلي عند الضغط على الزر
            toggleDarkMode.addEventListener("change", function() {
                if (this.checked) {
                    document.body.classList.add("dark-mode");
                    localStorage.setItem("darkMode", "true");
                } else {
                    document.body.classList.remove("dark-mode");
                    localStorage.setItem("darkMode", "false");
                }
            });
        });
        document.addEventListener("DOMContentLoaded", function() {
            let colorPickers = {
                primary: document.getElementById("primaryButtonColorPicker"),
                success: document.getElementById("successButtonColorPicker"),
                warning: document.getElementById("warningButtonColorPicker"),
                danger: document.getElementById("dangerButtonColorPicker")
            };

            let defaultColors = {
                primary: "#007bff",
                success: "#28a745",
                warning: "#ffc107",
                danger: "#dc3545"
            };

            // تحميل الألوان المحفوظة
            function loadButtonColors() {
                Object.keys(colorPickers).forEach(type => {
                    let savedColor = localStorage.getItem(type + "ButtonColor") || defaultColors[type];
                    document.documentElement.style.setProperty(`--bs-${type}`, savedColor);
                    colorPickers[type].value = savedColor;
                });
            }

            // حفظ الألوان وتحديث الثيم
            function saveButtonColor(type, color) {
                localStorage.setItem(type + "ButtonColor", color);
                document.documentElement.style.setProperty(`--bs-${type}`, color);
            }

            // إضافة المستمعين للألوان
            Object.keys(colorPickers).forEach(type => {
                colorPickers[type].addEventListener("input", function() {
                    saveButtonColor(type, this.value);
                });
            });

            // تطبيق الألوان عند تحميل الصفحة
            loadButtonColors();
        });
    </script>
    <script>
        let fontSizePicker = document.getElementById("fontSizePicker");

        // تحميل حجم الخط المحفوظ
        function loadFontSize() {
            let savedFontSize = localStorage.getItem("dashboardFontSize") || "16px";
            document.documentElement.style.setProperty("--dashboard-font-size", savedFontSize);
            fontSizePicker.value = parseInt(savedFontSize);
        }

        // حفظ حجم الخط
        fontSizePicker.addEventListener("input", function() {
            let newSize = this.value + "px";
            localStorage.setItem("dashboardFontSize", newSize);
            document.documentElement.style.setProperty("--dashboard-font-size", newSize);
        });

        // تطبيق عند تحميل الصفحة
        loadFontSize();

        let resetFontSizeBtn = document.getElementById("resetFontSize");

        // إعادة تعيين حجم الخط
        resetFontSizeBtn.addEventListener("click", function() {
            localStorage.removeItem("dashboardFontSize"); // حذف القيمة المخزنة
            document.documentElement.style.setProperty("--dashboard-font-size", "16px"); // العودة للحجم الافتراضي
            fontSizePicker.value = 16; // تحديث قيمة السلايدر
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let layoutSelector = document.getElementById("layoutSelector");
            let layoutDropdown = document.getElementById("layoutDropdown");
            let resetLayoutButton = document.getElementById("resetLayout");

            // استرجاع التخطيط المحفوظ في Local Storage
            let savedLayout = localStorage.getItem("dashboardLayout") || "default";
            document.body.classList.add(savedLayout + "-layout");
            layoutSelector.value = savedLayout;

            // عند تغيير التخطيط
            layoutSelector.addEventListener("change", function() {
                let selectedLayout = layoutSelector.value;

                // إزالة كل التخطيطات السابقة
                document.body.classList.remove("default-layout", "wide-layout", "boxed-layout",
                    "compact-layout");

                // تطبيق التخطيط الجديد
                document.body.classList.add(selectedLayout + "-layout");

                // حفظ الاختيار في Local Storage
                localStorage.setItem("dashboardLayout", selectedLayout);
            });

            // منع القائمة من الإغلاق عند الضغط داخلها
            layoutDropdown.addEventListener("click", function(event) {
                event.stopPropagation();
            });

            // إعادة تعيين التخطيط
            resetLayoutButton.addEventListener("click", function() {
                // مسح التخطيط المحفوظ
                localStorage.removeItem("dashboardLayout");

                // إزالة كل التخطيطات السابقة
                document.body.classList.remove("default-layout", "wide-layout", "boxed-layout",
                    "compact-layout");

                // تطبيق التخطيط الافتراضي
                document.body.classList.add("default-layout");
                layoutSelector.value = "default";

                // تحديث الصفحة لتطبيق التغييرات
                location.reload();
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

      <script>
        $(document).ready(function() {
            $('.searchable-field').select2({
                minimumInputLength: 3,
                ajax: {
                    url: '{{ route('admin.globalSearch') }}',
                    dataType: 'json',
                    type: 'GET',
                    delay: 200,
                    data: function(term) {
                        return {
                            search: term
                        };
                    },
                    results: function(data) {
                        return {
                            data
                        };
                    }
                },
                escapeMarkup: function(markup) {
                    return markup;
                },
                templateResult: formatItem,
                templateSelection: formatItemSelection,
                placeholder: '{{ trans('global.search') }}...',
                language: {
                    inputTooShort: function(args) {
                        var remainingChars = args.minimum - args.input.length;
                        var translation = '{{ trans('global.search_input_too_short') }}';

                        return translation.replace(':count', remainingChars);
                    },
                    errorLoading: function() {
                        return '{{ trans('global.results_could_not_be_loaded') }}';
                    },
                    searching: function() {
                        return '{{ trans('global.searching') }}';
                    },
                    noResults: function() {
                        return '{{ trans('global.no_results') }}';
                    },
                }

            });

            function formatItem(item) {
                if (item.loading) {
                    return '{{ trans('global.searching') }}...';
                }
                var markup = "<div class='searchable-link' href='" + item.url + "'>";
                markup += "<div class='searchable-title'>" + item.model + "</div>";
                $.each(item.fields, function(key, field) {
                    markup += "<div class='searchable-fields'>" + item.fields_formated[field] + " : " +
                        item[field] + "</div>";
                });
                markup += "</div>";

                return markup;
            }

            function formatItemSelection(item) {
                if (!item.model) {
                    return '{{ trans('global.search') }}...';
                }
                return item.model;
            }
            $(document).delegate('.searchable-link', 'click', function() {
                var url = $(this).attr('href');
                window.location = url;
            });
        });
    </script> 


    @yield('scripts')
    @include('sweetalert::alert')

</body>

</html>
