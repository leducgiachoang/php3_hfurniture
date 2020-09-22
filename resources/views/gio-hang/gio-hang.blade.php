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
           Giỏ hàng của bạn
          </div>

          @if ((Cart::count())<=0)
              <h1>Giỏ hàng của bạn trống</h1> 
          @else
          <table class="table">
            <thead>
              <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên Sản phẩm</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Giá</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Thành tiền</th>
                <th scope="col"></th>
                <th scope="col">Thao tác</th>
              </tr>
            </thead>
            <tbody>
                <?php $i = 1 ?>
              @foreach ($hang as $prod)
                
              <tr>
                <th scope="row">{{ $i }}</th>
                <td>{{ $prod->name }}</td>
                <td><img width="80" height="70" src="public/images/sp/{{ $prod->options->avatar }}" alt=""></td>
                <td>{{ number_format($prod->price,0,',','.')  }}đ</td>
                <td>
                    <div class="row btn-group" role="group" aria-label="Basic example">
                      <div class="col-lg-4">
                        @if (($prod->qty)<=1)
                        <button  type="button" class="nut-so-luong">-</button>
                        @else
                        <a href="gio-hang/tru/{{ $prod->rowId }}"><div type="button" class="nut-so-luongok">-</div></a>
                        @endif
                      </div>

                      <div class="col-lg-4">
                        <form action="gio-hang/cap-nhap-soluong" method="post">
                          @csrf
                          <input type="hidden" name="rowId" value="{{ $prod->rowId }}">
                          <input min="1" max="{{ $prod->weight }}" style="width: 50px;height: 40px;border-radius: 5px;padding: 5px;border: 1px solid;margin: 4px -8px -8px 0px;" value="{{ $prod->qty }}" type="number" name="soluong">
                        
                      </div>
                        
                     <div class="col-lg-4">
                      @if (($prod->qty)>=($prod->weight))
                        
                      <button  type="button" class="nut-so-luong">+</button> 
                      @else
                      <a href="gio-hang/cong/{{ $prod->rowId }}"><div type="button" class="nut-so-luongok">+</div></a>
                      @endif
                     </div>
                        
                  
                      </div>
                </td>
                <td>{{ number_format($prod->price * $prod->qty,0,',','.') }} đ</td>
                <td>
                  <button class="nut-so-luongok" type="submit">Cập nhập</button>
                </form>
                </td>
                <td>
                    
                    <a href="gio-hang/xoa/{{ $prod->rowId }}"><b> <i class="fas fa-trash-alt"></i> Xóa</b> </a>
                </td>
              </tr>
              <?php $i++ ?>
        @endforeach 
        
        
            </tbody>
          </table>
         
        <div style="text-align: right">
            <h5>Tổng tiền thanh toán: {{ Cart::subtotal() }} đ </h5>
            <a href="gio-hang/thanh-toan" class="btn">Thanh toán</a>
        </div>

        @endif


        
    </div>
    
</div>

@endsection