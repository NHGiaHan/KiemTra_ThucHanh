<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <title>Trang quản trị tài khoản</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Scripts -->

  <style>
    .sidebar {
      position: fixed;
      top: 0;
      bottom: 0;
      left: 0;
      width: 180px;
      z-index: 100;
      padding: 48px 0 0;
      box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
      background-color: #404e68!important;
    }
    .sidebar a {
        color: white!important;
    }
    .navbar {
        font-weight: bold;
        margin: 0 0 20px 180px;
    }
    .navbar-nav {
        margin: 0 auto;
        width: auto;
    }
    .navbar-nav a {
        color: black!important;
    }
    .content {
      margin-left: 180px;
      padding: 20px;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="{{url('sach')}}">Trang chủ</a>
            </li>
        </ul>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <nav class="col-md-2 d-none d-md-block  sidebar">
        <div class="sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" href="#">
                Thông tin tài khoản
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                Quản lý sách
              </a>
            </li>
          </ul>
        </div>
      </nav>

      <main role="main" class="col-md-10 ml-sm-auto col-lg-10 px-md-4 content ">
        <!-- Nội dung trang quản trị -->
            {{$slot}}
      </main>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
