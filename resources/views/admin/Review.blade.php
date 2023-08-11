<!doctype html>
<html class="no-js" lang=""> <!--<![endif]-->
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


<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/cs-skin-elastic.css') }}" rel="stylesheet" />


   <style>
    #weatherWidget .currentDesc {
        color: #ffffff!important;
    }
        .traffic-chart {
            min-height: 335px;
        }
        #flotPie1  {
            height: 150px;
        }
        #flotPie1 td {
            padding:3px;
        }
        #flotPie1 table {
            top: 20px!important;
            right: -10px!important;
        }
        .chart-container {
            display: table;
            min-width: 270px ;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        #flotLine5  {
             height: 105px;
        }

        #flotBarChart {
            height: 150px;
        }
        #cellPaiChart{
            height: 160px;
        }
        .comments-section {
    margin-top: 20px;
}

.comment-list {
    list-style: none;
    padding: 0;
}

.comment-item {
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 10px;
    margin-bottom: 10px;
}

.no-comment {
    color: #999;
    font-style: italic;
}


    </style>
</head>

<body>
    <!-- Left Panel -->
  
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}"><i class="menu-icon fa fa-laptop"></i>Dashboard</a>
                </li>
                <li class="{{ Request::is('categories*') ? 'active' : '' }}">
                    <a href="{{ route('categories.index') }}"><i class="menu-icon fa fa-tags"></i>Categories</a>
                </li>
                <li class="{{ Request::is('products*') ? 'active' : '' }}">
                    <a href="{{ route('products.index') }}"><i class="menu-icon fa fa-cube"></i>Products</a>
                </li>
                <li class="{{ Request::is('colors*') ? 'active' : '' }}">
                    <a href="{{ route('colors.index') }}"><i class="menu-icon fa fa-paint-brush"></i>Colors</a>
                </li>
                <li class="{{ Request::is('users*') ? 'active' : '' }}">
                    <a href="{{ route('users.index') }}"><i class="menu-icon fa fa-users"></i>Users</a>
                </li>
                <li class="{{ Request::is('delivery*') ? 'active' : '' }}">
                    <a href="{{ route('delivery-users.index') }}"><i class="menu-icon fa fa-truck"></i>Delivery</a>
                </li>
                <li class="{{ Request::is('variations*') ? 'active' : '' }}">
                    <a href="{{ route('variations.create') }}"><i class="menu-icon fa fa-random"></i>Variations</a>
                </li>
                

                <li>
                    <a href="{{ route('Reviews.show') }}">
                        <i class="menu-icon fa fa-comments"></i> Reviews
                    </a>
                </li>


                <li>
                    <a href="{{ route('discounts.index') }}">
                        <i class="menu-icon fas fa-percent"></i>Discount Management
                    </a>
                </li>
                
                <li>
                    <a href="{{ route('system_settings.index') }}">
                        <i class="menu-icon fa fa-cog"></i>Settings
                    </a>
                </li>
          
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>

 <!-- /#left-panel -->
    <!-- Right Panel -->
    <div class="right-panel" id="right-panel">
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
                  
                </div>

                <div class="user-area dropdown float-right">
                    <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      
                            {{ Auth::user()->name }} <!-- هنا نستخدم القيمة Auth::user()->name لعرض اسم المستخدم -->
                            <img class="user-avatar rounded-circle" src="{{ asset('/images/default.png') }}" alt="User Avatar">
                        </a>
                                                

                      <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="{{ route('profile.edit') }}"><i class="fa fa-user"></i> My Profile</a>

                            <a class="nav-link" href="{{route('system_settings.index')}}"><i class="fa fa-cog"></i> Settings</a>
                            <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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

    <div class="container">
    <div class="product-info">
        @if($product)
            <h2>Product Information:</h2>
            <p><strong>Product Name:</strong> {{ $product->product_name }}</p>
            <p><strong>Color:</strong> {{ $product->color_name }}</p>
            <p><strong>Price:</strong> {{ $product->price }}</p>
            <p><strong>Size:</strong> {{ $product->size }}</p>
            <p><strong>Total Reviews:</strong> {{ $product->total_reviews }}</p>
            <p><strong>Average Rating:</strong> {{ $product->average_rating }}</p>
        @else
            <div class="product-not-found">
                <h2>No Product Found</h2>
            </div>
        @endif
    </div>

    
    <div class="comments-section">
    <h2>Comments:</h2>
    <ul class="comment-list">
        @forelse($comments as $comment)
            <li class="comment-item">{{ $comment->comment }}</li>
        @empty
            <li class="no-comment">No comments yet.</li>
        @endforelse
    </ul>



        <div class="add-comment">
            <h2>Add Your Comment:</h2>
            <form action="{{ route('addComment') }}" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"> <!-- Assuming you have the authenticated user, you can retrieve the user_id like this -->
                <input type="hidden" name="variation_id" value="{{ $product->variation_id }}"> <!-- Assuming you have the variation_id available for the product -->
                <input type="hidden" name="order_id" value="{{ $product->id }}">
                <div class="form-group">
                    <label for="comment">Your Comment:</label>
                    <textarea name="comment" id="comment" class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

    </div>
</div>





<br><br><br><br><br><br><br><br><br><br><br><br>
@include('admin.down')
