<!DOCTYPE html>
<html>
    <head>
        <title>{{$title}}</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
                    <nav class="navbar navbar-expand-lg navbar-dark mt-2" style="width:1000px; margin:0 auto;">
            <div class="container-fluid d-flex align-items-center">
                 <ul class="navbar-nav">
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{url('sach')}}">Trang chủ</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('sach/theloai/1')}}">Tiểu thuyết</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('sach/theloai/2')}}">Truyện ngắn - tản văn</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('sach/theloai/3')}}">Tác phẩm kinh điển</a>
                                </li>
                            </ul>

                <div style='color:white; position:relative' class='mx-3'>
                    <div style='width:20px; height:20px; background-color:#23b85c; font-size:12px; border:none; border-radius:50%; position:absolute; right:2px; top:-2px; text-align:center' id='cart-number-product'>
                        @if (session('cart')) {{ count(session('cart')) }} @else 0 @endif
                    </div>
                    <a href="{{route('order')}}" style='cursor:pointer; color:white;'>
                        <i class="fa fa-cart-arrow-down fa-2x"></i>
                    </a>
                </div>

                <div class="navbar-nav ml-auto">
                    @auth
                        <div class="dropdown">
                              <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                                {{ Auth::user()->name }}
                                </button>
                                <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{route('account')}}">Quản lý</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a class="dropdown-item" onclick="event.preventDefault();
                                                        this.closest('form').submit();">Đăng xuất</a>
                                </form
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-sm btn-primary mr-1">Đăng nhập</a>
                        <a href="{{ route('register') }}" class="btn btn-sm btn-success">Đăng ký</a>
                    @endauth
                </div>
            </div>
        </nav>
        </header>
        <main style="width:1000px; margin:2px auto;">
            <div class='row'>
                <div class='col-12'>
                   {{$slot}}
                </div>
            </div>
        </main>
        <!--<footer>
            <div class='row' style='text-align:center'>
                <div class='col-4'>TRỤ SỞ</div>
                <div class='col-4'>THÔNG TIN CHUNG</div>
                <div class='col-4'>BẢN ĐỒ</div>
            </div>
        </footer>-->
    </body>
</html>