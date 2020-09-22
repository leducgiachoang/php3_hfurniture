

@extends('master.back-endMaster')

 @section('xcontent')
 @section('title')
 Sửa loại sản phẩm
@endsection
 @if (session('thongbao'))
 <div class="alert alert-danger">
  {{ session('thongbao') }}
 </div>
 
 @endif
 <form method="post" enctype="multipart/form-data">
     @csrf
    <div class="alert alert-primary" role="alert">
        Sửa sản phẩm
      </div>

      @foreach ($db as $item)
      <div class="form-group">
        <label>ID danh mục</label>
        <input name="id" value="{{ $item->id }}"  type="text" class="form-control input-group-text" placeholder="Tự động.." readonly>
      </div>
 
      <div class="form-group">
        <label>Tên danh mục</label>
        <input value="{{ $item->TenLoai }}" name="tenloai" type="text" class="form-control">
        @error('tenloai')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
       </div> 
       
       <div class="form-group">
         <div class="row">
           <div class="col-lg-6">
            <label>Ảnh danh mục</label>
            <input name="anhdanhmucx" type="file" class="form-control">
            <input name="anhdanhmuc" value="{{ $item->AnhDanhMuc }}"  type="hidden">
            @error('anhdanhmucx')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
           </div>
           <div class="col-lg-6">
             <img width="100%" src="public/images/anhdanhmuc/{{ $item->AnhDanhMuc }}" alt="">
           </div>
         </div>
        
       </div>
      @endforeach
     
     
     <button type="submit" class="btn btn-primary">Cập nhập</button>
     <a class="btn btn-primary" href="admin/loai-san-pham/them">Thêm mới</a>
     <a class="btn btn-primary" href="admin/loai-san-pham/danh-sach">Danh sách</a>
   </form>
 @endsection 

   




