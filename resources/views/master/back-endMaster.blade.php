<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <base href="{{ asset('') }}">
    <style>
        .over-nav{
            overflow: auto;
        }
        .xem-show{
            display: none;
            position: fixed;
            top: 200px;
            width: 700px;
            height: 400px;
            border: 2px solid coral;
            border-radius: 10px;
            overflow: auto;
        }
        .traloi-show{
            display: none;
            position: fixed;
            top: 200px;
            width: 700px;
            height: 400px;
            border: 2px solid coral;
            border-radius: 10px;
            overflow: auto;
        }
        .nut-exit{
            float: right;
        }
        .nut-tra-loi-exit{
            float: right;
        }
        .nutbat{
            background:none;
            border: none;
          }
    </style>
    <script src="public/ckeditor/ckeditor.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>H FURNITURE - @yield('title')</title>
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="public/core.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="public/core.js"></script>
</head>

<body>

    <!-- Vertical navbar -->
    <div class="vertical-nav over-nav bg-dark" id="sidebar">
        <div class="py-4 px-3 mb-4 bg-dark">
            <div class="media-body">
                <h4 class="font-weight-white text-muted mb-0"><a href=""><img width="200" src="resources/assets/img/logo/logo.png" alt=""></a></h4>
            </div>
        </div>

        <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Danh mục</p>
        <ul class="nav flex-column bg-dark mb-0">
            <li class="nav-item">		
                <a href="admin/loai-san-pham/them" class="nav-link text-light font-italic bg-dark">
                    <i class="fa fa-th-large mr-3 text-primary fa-fw"></i>
                    Thêm mới
                </a>
            </li>
            <li class="nav-item">
                <a href="admin/loai-san-pham/danh-sach" class="nav-link text-light font-italic">
                    <i class="fa fa-address-card mr-3 text-primary fa-fw"></i>
                    Danh sách
                </a>
            </li>
        </ul>

        <p class="text-gray font-weight-bold text-uppercase px-3 small py-4 mb-0">Sản phẩm</p>

        <ul class="nav flex-column bg-dark mb-0">
            <li class="nav-item">		
                <a href="admin/san-pham/them" class="nav-link text-light font-italic bg-dark">
                    <i class="fa fa-th-large mr-3 text-primary fa-fw"></i>
                    Thêm mới
                </a>
            </li>
            <li class="nav-item">
                <a href="admin/san-pham/danh-sach" class="nav-link text-light font-italic">
                    <i class="fa fa-address-card mr-3 text-primary fa-fw"></i>
                    Danh sách
                </a>
            </li>
        </ul>

        <p class="text-gray font-weight-bold text-uppercase px-3 small py-4 mb-0">Người dùng</p>

        <ul class="nav flex-column bg-dark mb-0">
            <li class="nav-item">		
                <a href="admin/nguoi-dung/them" class="nav-link text-light font-italic bg-dark">
                    <i class="fa fa-th-large mr-3 text-primary fa-fw"></i>
                    Thêm mới
                </a>
            </li>
            <li class="nav-item">
                <a href="admin/nguoi-dung/danh-sach" class="nav-link text-light font-italic">
                    <i class="fa fa-address-card mr-3 text-primary fa-fw"></i>
                    Danh sách
                </a>
            </li>
        </ul>


        <p class="text-gray font-weight-bold text-uppercase px-3 small py-4 mb-0">Hóa đơn</p>

        <ul class="nav flex-column bg-dark mb-0 list-group">
            <li class="nav-item ">		
                <a href="admin/hoa-don/danh-sach" class="nav-link text-light font-italic bg-dark">
                    <i class="fa fa-th-large mr-3 text-primary fa-fw"></i>
                    Danh sách
                </a>
            </li>
            
        </ul>

        <p class="text-gray font-weight-bold text-uppercase px-3 small py-4 mb-0">Bình luận</p>

        <ul class="nav flex-column bg-dark mb-0 list-group">
            <li class="nav-item ">		
                <a href="admin/binh-luan/danh-sach" class="nav-link text-light font-italic bg-dark">
                    <i class="fa fa-th-large mr-3 text-primary fa-fw"></i>
                    Danh sách
                </a>
            </li>
            
        </ul>

        <p class="text-gray font-weight-bold text-uppercase px-3 small py-4 mb-0">Ảnh bìa</p>

        <ul class="nav flex-column bg-dark mb-0">
            <li class="nav-item">		
                <a href="admin/anh-bia/sua" class="nav-link text-light font-italic bg-dark">
                    <i class="fa fa-th-large mr-3 text-primary fa-fw"></i>
                    Chỉnh sửa
                </a>
            </li>
            
        </ul>


        <p class="text-gray font-weight-bold text-uppercase px-3 small py-4 mb-0">Charts</p>

        <ul class="nav flex-column bg-dark mb-0">

            <li class="nav-item">
                <a href="admin/bieu-do/bar" class="nav-link text-light font-italic">
                    <i class="fa fa-bar-chart mr-3 text-primary fa-fw"></i>
                    Bar charts
                </a>
            </li>
            <li class="nav-item">
                <a href="admin/bieu-do/pie" class="nav-link text-light font-italic">
                    <i class="fa fa-pie-chart mr-3 text-primary fa-fw"></i>
                    Pie charts
                </a>
            </li>
            <li class="nav-item">
                <a href="admin/bieu-do/line" class="nav-link text-light font-italic">
                    <i class="fa fa-line-chart mr-3 text-primary fa-fw"></i>
                    Line charts
                </a>
            </li>
        </ul>

    </div>
    <!-- End vertical navbar -->

    <!-- Page content holder -->
    <div class="page-content p-5" id="content">
        <!-- Toggle button -->
        <button id="sidebarCollapse" type="button" class="btn btn-outline-info rounded-pill shadow-sm px-4 mb-4"><i
                class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Danh Sách</small></button>
<div style="position: absolute;top: 5px;right: 5px;">
    <div class="btn-group dropleft">
        <button type="button" class="btn btn-outline-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img style="width: 30px; height: 30px;border-radius: 50%" src="public/images/users/{{ Auth::user()->AnhDaiDien }}" alt=""> {{ Auth::user()->HoTen }}</a>
        </button>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="taikhoan/thong-tin-nguoi-dung"><i class="fa fa-user" aria-hidden="true"></i> Thông tin tài khoản</a>
            <a class="dropdown-item" href="taikhoan/dang-xuat">Đăng xuất <i class="fa fa-sign-out" aria-hidden="true"></i></a>
        </div>
      </div>
</div>
		<!-- Demo content -->
		@yield('xcontent')
    </div>
      

    <script>
        CKEDITOR.replace('editor1');

    </script>
</body>

</html>
