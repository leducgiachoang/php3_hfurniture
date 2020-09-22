@extends('master.font-endMaster')

@section('content')
<div style="background-color: white;height: 150px;">
</div>
@section('title')
    Thông tin người dùng
@endsection
<div class="container">
    <div  class="bosxt">
          @if (session('thongbao'))
          <div class="alert alert-danger">
            {{ session('thongbao') }}
          </div>
          @endif
          <div class="alert alert-success" role="alert">
            Trang thông tin người dùng !
          </div>
          <div class="row">
              <div class="col-lg-3">
                <div class="list-group">
                    <button type="button" class="list-group-item list-group-item-action active">
                      Thông tin: {{ Auth::user()->HoTen }}
                    </button>
                    <button type="button" class="list-group-item list-group-item-action"><a href="taikhoan/thong-tin-nguoi-dung"><i class="fas fa-question-circle"></i> Thông tin người dùng</a></button>
                    <button type="button" class="list-group-item list-group-item-action"><a href="taikhoan/thay-doi-mat-khau"><i class="fas fa-lock"></i> Thay đổi mật khẩu</a></button>
                    <button type="button" class="list-group-item list-group-item-action"><a href="gio-hang/don-hang-cua-toi"><i class="fas fa-shopping-cart"></i> Đơn hàng của tôi</a></button>
                    <button type="button" class="list-group-item list-group-item-action"><a href="gio-hang/don-hang-da-huy"><i class="far fa-window-close"></i> Đơn hàng đổi tra</a></button>
                    <button type="button" class="list-group-item list-group-item-action"><a href="nhan-xet-cua-toi"><i class="fab fa-facebook-messenger"></i> Nhận xét của tôi</a></button>
           
                  </div>
              </div>

              <div class="col-lg-9">
                @yield('thongtinnguoidung')
              </div>
          </div>
        
    </div>
    
</div>

@endsection