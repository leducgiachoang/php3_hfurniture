@extends('master.font-endMaster')

@section('content')
@section('title')
    Lấy lại mật khẩu
@endsection
<div style="background-color: white;height: 150px;">
</div>

<div class="container">
    <div  class="bosxt col-lg-8">
      @if (session('thongbao'))
          <div class="alert alert-danger">
            {{ session('thongbao') }}
          </div>
          
          @endif

          @if (session('thongbaook'))
            <div class="alert alert-success">
              {{ session('thongbaook') }}
            </div>
          @endif
         <div class="alert alert-primary" role="alert">
          <h1>Vui lòng kiểm tra Email  để kích hoạt tài khoản của bạn !</h1>
          </div>
          
        
    </div>
    
</div>

@endsection