<!DOCTYPE html>
<html>
         <head>
         <title>{{ $title ?? 'Nhà Sách' }}</title>
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <style>
        .navbar {
         background-color: #ff5850;
         font-weight:bold;
         }
        .nav-item a {
         color: #fff!important;
        }
        .navbar-nav {
        margin:0 auto;
        }
        .list-book{
        display:grid;
        grid-template-columns:repeat(4,24%);
         }
        .book {
         margin:10px;
        text-align:center;
        }
        .book
        {
        position:relative;
        margin:10px;
        text-align:center;
        padding-bottom:35px;
        }
        .btn-add-product
        {
        position:absolute;
        bottom:0;
        width:100%;
        }
    </style>
    </head>
     <body>
        <header style='text-align:center'>
        <img src="{{asset('images/banner_sach.jpg')}}" width="1000px">
        </header>
        <main style="width:1000px;margin:2px auto;">
        <div class='row'>
            <nav class="navbar navbar-expand-lg navbar-dark mt-2" style="width:1000px; margin:0 auto;">
                        <div class="container-fluid">
                            <<ul class="navbar-nav">
                                <li class="nav-item active">
                                    <a class="nav-link menu-the-loai" href="#" the_loai="">Trang chủ</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link menu-the-loai" href="#" the_loai="1">Tiểu thuyết</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link menu-the-loai" href="#" the_loai="2">Truyện ngắn - tản văn</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link menu-the-loai" href="#" the_loai="3">Tác phẩm kinh điển</a>
                                </li>
                                </ul>
                        </div>

                        <div style='color:white;position:relative' class='mr-2'>
                            <div style='width:20px; height:20px;background-color:#23b85c; font-size:12px; border:none;
                                border-radius:50%; position:absolute;right:2px;top:-2px' id='cart-number-product'>
                            @if (session('cart'))
                                {{ count(session('cart')) }}
                            @else
                                0
                            @endif
                            </div>
                            <a href="{{route('order')}}" style='cursor:pointer;color:white;'>
                                <i class="fa fa-cart-arrow-down fa-2x mr-2 mt-2" aria-hidden="true"></i>
                            </a>
                        </div>

                        <div class="navbar-nav">
                            @auth
                                <div class="dropdown">
                                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                                    {{ Auth::user()->name }}
                                    </button>
                                    <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{route('account')}}">Quản lý</a>
                                    <div class="dropdown-divider"></div>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button class="dropdown-item" onclick="event.preventDefault();
                                                            this.closest('form').submit();">Đăng xuất</button>
                                                            
                                    </form>
                                    </div>
                                </div>
                            @else
                                <a href="{{ route('login') }}">
                                    <button class='btn btn-sm btn-primary'>Đăng nhập</button>
                                </a>&nbsp;
                                <a href="{{ route('register') }}">
                                    <button class='btn btn-sm btn-success'>Đăng ký</button>
                                </a>
                            @endauth
                        </div>
            </nav>
             <div class='row'>
            <div class='col-3 pr-0'>
<nav class="navbar navbar-light">
<ul class="navbar-nav">
    <li class="nav-item active">
        <a class="nav-link menu-the-loai" href="#" the_loai="">Trang chủ</a>
    </li>
    <li class="nav-item">
        <a class="nav-link menu-the-loai" href="#" the_loai="1">Tiểu thuyết</a>
    </li>
    <li class="nav-item">
        <a class="nav-link menu-the-loai" href="#" the_loai="2">Truyện ngắn - tản văn</a>
    </li>
    <li class="nav-item">
        <a class="nav-link menu-the-loai" href="#" the_loai="3">Tác phẩm kinh điển</a>
    </li>
</ul>
</nav>
<img src="{{asset('images/sidebar_1.jpg')}}"width="100%"class='mt-1'>
<img src="{{asset('images/sidebar_2.jpg')}}"width="100%"class='mt-1'>
</div>
<div class='col-9'>
{{$slot}}
</div>
</div>
</main>
</body>
</html>
