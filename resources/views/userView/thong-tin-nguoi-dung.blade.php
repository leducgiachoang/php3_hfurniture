@extends('master.font-end-MasterUser')
@section('thongtinnguoidung')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('.nut-edit').click(function(){
            $('.edit-show').slideDown();
            $('.edit-hide').slideUp();
            $('.nut-exit').show();
            $('.nut-edit').hide();
        })

        $('.nut-exit').click(function(){
            $('.edit-show').slideUp();
            $('.edit-hide').slideDown();
            $('.nut-exit').hide();
            $('.nut-edit').show();
        })
    })
</script>
    <h3>Thông tin tài khoản khách hàng 
      <button class="nut-edit"><i class="fas fa-edit"></i></button>
      <button style="display: none" class="nut-exit"><i class="fas fa-times-circle"></i></button>
    </h3>
    @foreach ($dbnguoidung as $e)
        
    <div class="edit-hide">
      <div class="card mb-3">
        <div class="row no-gutters">
          <div style="padding: 7px" class="col-lg-4">
            <img style="width: 100%; height: 260px;text-align: center"  src="public/images/users/{{ $e->AnhDaiDien }}" class="card-img" alt="...">
          </div>
          <div style="padding: 7px" class="col-lg-8">
            <ul class="">
              <li class="list-group-item active">Thông tin</li>
              <li class="list-group-item">Họ tên: {{ $e->HoTen }}</li>
              <li class="list-group-item">Email: {{ $e->email }}</li>
              <li class="list-group-item">Số điện thoại: {{ $e->SoDienThoai }}</li>
            </ul>
          </div>
        </div>
      </div>

    </div>
    

    <div class="edit-show" id="edit-show">
        <form method="post" enctype="multipart/form-data">
            @csrf
           
            <div class="alert alert-primary" role="alert">
                Chỉnh sửa thông tin
            </div>
           <div style="margin: auto" class="row col-lg-12">
            
                <input name="id" value="{{ $e->id }}" type="hidden" class="form-control input-group-text" placeholder="Tự động.." readonly>
                

         
              <div class="form-group col-lg-12">
                 <label>Họ và tên</label>
                 <input value="{{ $e->HoTen }}" name="hoten" type="text" class="form-control">
                 @error('hoten')
                 <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
               </div>
        
               <div class="form-group col-lg-12">
                <label>Tên tài khoản</label>
                <input value="{{ $e->TenTK }}" name="username" type="text" class="form-control">
                @error('username')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
        
              
                <input value="{{ $e->password }}" name="matkhau" type="hidden" class="form-control">
                
        
              <div class="form-group col-lg-12">
                <label>Email</label>
                <input value="{{ $e->email }}" name="email" type="text" class="form-control">
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
        
              <div class="form-group col-lg-12">
                <label>Số điện thoại</label>
                <input value="{{ $e->SoDienThoai }}" name="sodienthoai" type="text" class="form-control">
                @error('sodienthoai')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
        
              
                 <div class="form-group col-lg-3">
                    <label>Ảnh đại diện</label>
                    <input name="anhdaidienx" type="file" class="form-control">
                    <input name="anhdaidien" value="{{ $e->AnhDaiDien }}"  type="hidden">
                    @error('anhdaidienx')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                  </div>
        
                  <div class="form-group col-lg-3">
                   <img width="100%" src="public/images/users/{{ $e->AnhDaiDien }}" alt="">
                  </div>
                <input type="hidden" name="id_vai_tro" value="{{ $e->id_vai_tro }}">
                  <input type="hidden" name="id_trang_thai" value="{{ $e->id_trang_thai  }}"> 
                              
           </div>
           <button type="submit" class="btn btn-primary">Cập nhập</button>
           </form>
    </div>
    @endforeach
@endsection