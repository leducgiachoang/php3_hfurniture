

@extends('master.back-endMaster')
@section('xcontent')
@section('title')
    Danh sách Bình luận
@endsection
@if (session('thongbao'))
<div class="alert alert-danger">
 {{ session('thongbao') }}
</div>

@endif
<div style="text-align: right"> {{ $db->links() }}</div>
<div class="list-group-item list-group-item-action alert alert-primary">
  <div class="navbar row">
    <b class="navbar-brand">Danh sách góp ý</b>
    
    <div style="float: right" class="col-lg-3">
      <form method="POST" action="admin/binh-luan/timkiem" class="form-inline">
        @csrf
        <input name="tukhoa" class="form-control col-lg-12" type="search" placeholder='Từ khóa tìm kiếm'>
      </form>
    </div>
  </div>   
</div>

    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<table class="table table-hover">
   <thead>
     <tr>
       <th scope="col">ID</th>
       <th scope="col">Tên người dùng</th>
       <th scope="col">Email</th>
       <th scope="col">Nội dung</th>
       <th scope="col">Tình trạng</th>
       <th scope="col"></th>
       <th scope="col"></th>
       <th scope="col"></th>
 
       
     </tr>
   </thead>
   <tbody>
       @foreach ($db as $item)
         <tr>
           <th scope="row">{{ $item ->id }}</th>
           <td>
             <img style="width: 25px; height: 25px; border-radius: 10px" src="public/images/users/{{ $item->nguoidung->AnhDaiDien }}" alt="">
             {{ $item->nguoidung->HoTen }}</td>
           <td>{{ $item->nguoidung->email }}</td>
           <script>
             $(document).ready(function(){
               $('.xem').click(function(){
                  $(this).siblings('.xem-show').show();
               })

               $('.nut-exit').click(function(){
                $('.xem-show').hide();
               })

               $('.tra-loi').click(function(){
                $(this).siblings('.traloi-show').show();
                })

                $('.nut-tra-loi-exit').click(function(){
                  $('.traloi-show').hide();
                 })


             })
           </script>
           <td>
             <button class="btn btn-secondary btn-sm xem">Xem</button>
             <dialog class="xem-show" open>
              
              <div class="alert alert-success" role="alert">
                Chi tiết nội dung bình luận/ góp ý #{{ $item ->id }}
                <button class="btn btn-primary btn-sm nut-exit">X</button>
              </div>
               <div class="row">
                 <div class="col-lg-3">
                   <img width="100%" src="public/images/users/{{ $item->nguoidung->AnhDaiDien }}" alt="">
                 </div>
                 <div class="col-lg-9">
                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <td scope="col">Họ và tên: {{ $item->nguoidung->HoTen }}</td>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td scope="row">Số điện thoai: {{ $item->nguoidung->SoDienThoai }}</td>
                      </tr>
                      <tr>
                        <td scope="row">Email: {{ $item->nguoidung->email }}</td>
                      </tr>
                      <tr>
                        <td scope="row">Nội dung: <p>{{ $item->NoiDung  }}</p></td>
                      </tr>

                      <tr>
                        <th scope="row">Sản phẩm</th>
                      </tr>
                      <tr>
                        <td scope="row">Tên sản phẩm: {{ $item->sanpham->TenSP  }}</td>
                      </tr>
                      <tr>
                        
                        <td scope="row">Giá: {{number_format($item->sanpham->GiaSP,2,",",".") }} đ</td>
                      </tr>
                      <tr>
                        <td scope="row">Số lượng trong kho: {{ $item->sanpham->SoLuong  }}</td>
                      </tr>
                    </tbody>
                  </table>
                 </div>
                 
               </div>
               
              
            </dialog>
           </td>
           <td>
             @if (($item->id_tinh_trang_hoi_dap) == 2)
             <form method="POST">
               @csrf
               <input type="hidden" value="{{ $item->id }}" name="id">
               <input type="hidden" value="{{ $item->id_san_pham }}" name="id_san_pham">
               <input type="hidden" value="{{ $item->id_nguoi_dung }}" name="id_nguoi_dung">
               <input type="hidden" value="{{ $item->NoiDung }}" name="NoiDung">
               <input type="hidden" value="1" name="id_tinh_trang_hoi_dap">
               <button class="nutbat" type="submit"><i style="font-size: 30px;color: green" class="fa fa-toggle-on" aria-hidden="true"></i></button>
             </form>
             
             @else
             <form method="POST">
              @csrf
              <input type="hidden" value="{{ $item->id }}" name="id">
              <input type="hidden" value="{{ $item->id_san_pham }}" name="id_san_pham">
              <input type="hidden" value="{{ $item->id_nguoi_dung }}" name="id_nguoi_dung">
              <input type="hidden" value="{{ $item->NoiDung }}" name="NoiDung">
              <input type="hidden" value="2" name="id_tinh_trang_hoi_dap">
              
              <button class="nutbat" type="submit"><i style="font-size: 30px" class="fa fa-toggle-off" aria-hidden="true"></i></button>
            </form>
             
             @endif
           </td>
           
           <td>
             <button class="btn btn-success tra-loi">Trả lời</button>
             <dialog class="traloi-show" open>
              
              <div class="alert alert-success" role="alert">
                Trả lời nội dung bình luận #{{ $item ->id }}
                <button class="btn btn-primary btn-sm nut-tra-loi-exit">X</button>
              </div>
                <h6>Nội dung bình luận: {{ $item->NoiDung  }}</h6>       
              
                <form method="POST" action="admin/binh-luan/tra-loi">
                  @csrf
                  <div class="form-group">
                    <label>Email</label>
                    <input readonly type="email" name="email" class="form-control" value="{{ $item->nguoidung->email }}">
                  </div>
                 
                 
                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">Nội dung trả lời</label>
                    <textarea class="form-control" name="noidung" rows="3"></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary">Gửi </button>
                </form>
            </dialog>
          </td>
           <td><a class="btn btn-warning" href="admin/binh-luan/xoa/{{ $item ->id }}">Xóa</a></td>
           
         </tr>
       @endforeach
     
     
   </tbody>
 </table>

 
@endsection 
