<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{$setting->website_title}}</title>
    <meta name="description" content="{{$setting->website_description}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">
      <!-- إضافة الرابط إلى ملفات Bootstrap -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      

   <style>
/* إعطاء الحاوية الرئيسية عرض الشاشة والارتفاع وجعل المحتوى في الوسط */
.main-container {
    display: flex;
    justify-content: center; /* لتوسيط المحتوى أفقيًا */
    align-items: center; /* لتوسيط المحتوى عموديًا */
    min-height: 100vh;
    background-color: #f2f2f2;
}

.card-content {
    display: flex;
    justify-content: flex-start; /* محاذاة المحتوى في الجهة اليسرى أفقيًا */
    align-items: center; /* محاذاة المحتوى في الوسط عموديًا */
    height: 45vh; /* تعيين ارتفاع المحتوى بنسبة 100% من ارتفاع الشاشة */
}

.card {
    border: 2px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    padding: 20px;
    width: 50%; /* تحديد عرض البطاقة بنسبة 20% من عرض الشاشة */
    margin: 0 auto; /* تحديد هوامش للبطاقة لجعلها تظهر في وسط الشاشة الأفقي */
}


.user-image {
    width: 400px; /* يمكنك تعديل العرض حسب الحجم المطلوب */
    height: 400px; /* يمكنك تعديل الارتفاع حسب الحجم المطلوب */
    margin-right: 30px;
}

.user-image img {
    width: 60%;
    height: 60%;
    border-radius: 70%;
    object-fit: cover;
}

.user-details {
    flex: 10;
}

.user-details p {
    margin: 1px 0;
}
body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 900px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        td a {
            display: inline-block;
            padding: 6px 12px;
            background-color: #4CAF50;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
        }

        td a:hover {
            background-color: #45a049;
        }


    </style>
</head>

<body>
 
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('user_dashboard') }}"><i class="menu-icon fa fa-laptop"></i>Dashboard</a>
                </li>
                <li class="{{ Request::is('order') ? 'active' : '' }}">
                    <a href="{{ route('user_order') }}"><i class="menu-icon fa fa-shopping-cart"></i>Cart</a>
                </li>

                <li class="{{ Request::is('sales') ? 'active' : '' }}">
                    <a href="{{ route('cart.show') }}">
                        <i class="menu-icon fa fa-shopping-basket"></i> <!-- استخدام رمز تعبيري للسلة -->
                        Shopping Cart Items <!-- تغيير النص هنا -->
                    </a>
                </li>


                <li class="{{ Request::is('sales') ? 'active' : '' }}">
                                <a href="{{ route('showOrders') }}">
                                    <i class="menu-icon fa fa-history"></i> <!-- تغيير الايقونة هنا -->
                                    Orders History <!-- تغيير النص هنا -->
                                </a>
                            </li>


            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>




<!-- /#left-panel -->


    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    {{$setting->website_name}}
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>


 <div class="user-area dropdown float-right">
    <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      
        {{ Auth::user()->name }} <!-- هنا نستخدم القيمة Auth::user()->name لعرض اسم المستخدم -->
        <img class="user-avatar rounded-circle" src="{{ asset('/images/default.png') }}" alt="User Avatar">
    </a>

    <div class="user-menu dropdown-menu">
        <a class="nav-link" href="{{ route('profile.edit') }}"><i class="fa fa-user"></i> My Profile</a>

        <a class="nav-link" href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fa fa-power-off"></i> Logout</a>

        <form id="logout-form" action="{{ route('logout_submit') }}" method="post" style="display: none;">
            @csrf
        </form>

        <script>
            // يُضاف هذا الكود الخاص بتحديث طريقة النموذج عند تغيير اللغة للتأكد من أنها تتطابق مع طريقة الاستدعاء الفعلية
            document.getElementById('logout-form').setAttribute('method', 'POST');
        </script>
    </div>
</div>


                </div>
            </div>
        </header>
        <!-- /#header -->