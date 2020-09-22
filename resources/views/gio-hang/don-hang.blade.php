@extends('master.font-end-MasterUser')
@section('thongtinnguoidung')


    <h3>Đơn hàng của tôi</h3>
   
    @if ($sodon <= 0)
        <h3>Xin lỗi! Bạn chưa thực hiện giao dịch nào</h3>
    @else

    @foreach ($db as $item)
<div class="list-group-item list-group-item-action active">
    <strong>Chi tiết đơn hàng #{{ $item->id }}</strong>
</div>

<div class="form-group">
    

    <div class="card" style="100%">
        
        <div >
                   
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Họ và tên: {{ $item->nguoidung->HoTen }}</li>
            <li class="list-group-item">Địa chỉ giao hàng: {{ $item->NoiNhan }}</li>
            <li class="list-group-item">Đặt ngày: {{ $item->NgayLap }} </li>
        </ul>
        </div>

        <table class="table table-hover">
            <thead class="thead-dark">
              <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Đơn giá</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Tổng giá</th>
                <th scope="col">Xem</th>
                
              </tr>
            </thead>
            <tbody>
                <?php $a = 1 ?>
                @foreach ($item->sanpham as $i)
                    
               
                  <tr>
                    <th scope="row">{{ $a }}</th>
                    <td>{{ $i->TenSP }}</td>
                    <td><img width="50" src="public/images/sp/{{ $i->AnhSP }}" alt=""></td>
                    <td>{{ number_format($i->pivot->DonGia,2,",",".") }} VND</td>
                    <td>{{ $i->pivot->SoLuongMua }}</td>
                    <td>{{ number_format($i->pivot->DonGia * $i->pivot->SoLuongMua,2,",",".") }} đ</td>
                    <td><a href="san-pham/chi-tiet/{{ $i->id }}"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                  </tr>
                  <?php $a++ ?>
                  @endforeach
         
            </tbody>
          </table>
        <div class="card-body">
            <h5 class="card-title">Tình trạng đơn hàng</h5>
            <div class="row">
                <div class="col-lg-6">
                  <div class="row">
                    <div class="col-lg-6">
                    <h4 class="card-link">{{ $item ->tinhtrang->TinhTrangDonHang }}</h4>
                    </div> 
                    
                    <div class="col-lg6">
                        @if (($item ->tinhtrang->id) ==1)
                        <a href="gio-hang/huydon/{{ $item->id }}">Hủy đơn hàng</a>
                        @endif
                    </div>
                  </div>
                    
                </div>

                <div style="text-align: right" class="col-lg-6">
                   <h4>Tổng tiền: {{ number_format($item ->TongGia,2,",",".") }} VND</h4>
                </div>
            </div>  
        </div>
      </div>
</div>



@endforeach
    
        
@endif       


 
    
@endsection