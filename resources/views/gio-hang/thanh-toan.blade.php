@extends('master.font-endMaster')

@section('content')
@section('title')
    Giỏ hàng của bạn
@endsection
<div style="background-color: white;height: 200px;">
</div>

<div class="container">
    <div  class="bosxt">
          @if (session('thongbao'))
            <div class="alert alert-danger">
              {{ session('thongbao') }}
            </div>
          @endif

          @if (session('thongbaook'))
            <div class="alert alert-success">
              {{ session('thongbao') }}
            </div>
          @endif


        <div class="alert alert-primary" role="alert">
           Thanh toán
        </div>

        @foreach ($nguoidung as $nguoi)
            
        
<div class="row">
    <div class="col-lg-6">
        <div class="list-group-item list-group-item-action active">
            <strong>Thông tin thanh toán</strong> <p style="float: right"><a href="taikhoan/thong-tin-nguoi-dung"><i class="fas fa-edit"></i></a></p>
        </div>
        <form method="POST">
            @csrf
        
            <table class="table">
                <tr>
                    <th>Họ và tên: </th>
                    <th>
                        <input name="hoten" value="{{ $nguoi->HoTen }}" readonly type="text" class="form-control">
                        @error('hoten')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </th>
                </tr>
                <tr>
                    <th>Email: </th>
                    <th>
                        <input name="email" value="{{ $nguoi->email }}" readonly type="email" class="form-control">
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                       @enderror
                    </th>
                </tr>
                <tr>
                    <th>Số Điện Thoại: </th>
                    <th>
                        <input name="sodienthoai" value="{{ $nguoi->SoDienThoai }}" readonly type="tel" class="form-control">
                        @error('sodienthoai')
                        <div class="alert alert-danger">{{ $message }}</div>
                       @enderror
                    </th>
                    <input name="id_nguoi_dung" type="hidden" value="{{ $nguoi->id }}">
                </tr>

                <tr>
                    <th>Địa chỉ giao hàng: </th>
                    <th>
                        <input type="text" name="noinhan" class="form-control">
                        @error('noinhan')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </th>
                </tr>

                <tr>
                    <th>Ghi chú: </th>
                    <th>
                        <textarea class="form-control" name="ghichu" id="" cols="50" rows="4"></textarea>
                        @error('ghichu')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </th>
                </tr>

                <tr>
                    <th>Hình thức thanh toán</th>
                    <th>
                        <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <input type="radio" checked="checked" aria-label="Radio button for following text input">
                              </div>
                            </div>
                            <input type="text" class="form-control" placeholder="Thanh toán khi nhận hàng" readonly aria-label="Text input with radio button">
                        </div>
                    </th>
                </tr>

                

            </table>

           
          
    </div>
    @endforeach

    <div class="col-lg-6">
        <table class="table">
            
            <thead>
                <div class="list-group-item list-group-item-action active">
                    <strong>Danh sách sản phẩm</strong>
              </div>
              <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên Sản phẩm</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Thành tiền</th>
              </tr>
            </thead>
            <tbody>
                <?php $i = 1 ?>
        @foreach ($hang as $prod)
                
              <tr>
                <th scope="row">{{ $i }}</th>
                <td>{{ $prod->name }}</td>
                <td><img width="80" height="70" src="public/images/sp/{{ $prod->options->avatar }}" alt=""></td>
                <td>{{ number_format($prod->price * $prod->qty,0,',','.') }} đ</td>
                
              </tr>
              <?php $i++ ?>
        @endforeach 
            </tbody>
          </table>
    </div>

    
</div>
          
          
        <div style="text-align: right" >
            <h6>Tổng tiền thanh toán: {{ Cart::subtotal() }} đ </h6>
            <button class="btn" type="submit">Đặt hàng</button>
        </div>
    </form>

        
    </div>
    
</div>

@endsection