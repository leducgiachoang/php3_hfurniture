@extends('master.font-end-MasterUser')
@section('thongtinnguoidung')


    <h3>Thay đổi mật khẩu</h3>
    @foreach ($dbnguoidung as $e)
           

    <div bosxt col-lg-8>
        <form method="post" enctype="multipart/form-data">
            @csrf
           
            <div class="alert alert-primary" role="alert">
                Chỉnh sửa thông tin  <div class="nut-exit" style="text-align: right;float: right;font-weight: 900">X</div>
            </div>
           <div style="margin: auto" class="row col-lg-12">
            
                <input name="id" value="{{ $e->id }}" type="hidden" class="form-control input-group-text" placeholder="Tự động.." readonly>
                <input value="{{ $e->HoTen }}" name="hoten" type="hidden" class="form-control">
                <input value="{{ $e->TenTK }}" name="username" type="hidden" class="form-control">
                <div class="form-group col-lg-12">
                    <label>Mật khẩu cũ</label>
                    <input name="matkhaucu" type="password" class="form-control">
                        @error('matkhaucu')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                </div>

                <div class="form-group col-lg-12">
                    <label>Mật khẩu mới</label>
                    <input name="matkhaumoi" type="password" class="form-control">
                        @error('matkhaumoi')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                </div>

                <div class="form-group col-lg-12">
                    <label>Xác nhân mật khẩu</label>
                    <input name="matkhaumoi2" type="password" class="form-control">
                        @error('matkhaumoi2')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                </div>
           
                 
                <input value="{{ $e->email }}" name="email" type="hidden" class="form-control">
                <input value="{{ $e->SoDienThoai }}" name="sodienthoai" type="hidden" class="form-control">
                <input name="anhdaidien" value="{{ $e->AnhDaiDien }}"  type="hidden">
                <input type="hidden" value="{{ $e->AnhDaiDien }} }}">
                <input type="hidden" name="id_vai_tro" value="{{ $e->id_vai_tro }}">
                <input type="hidden" name="id_trang_thai" value="{{ $e->id_trang_thai  }}"> 
                              
           </div>
           <button type="submit" class="btn btn-primary">Cập nhập</button>
           </form>
    </div>
    @endforeach
@endsection