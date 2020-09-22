

@extends('master.back-endMaster')

 @section('xcontent')
 @section('title')
 Thêm loại sản phẩm
@endsection
 @if (session('thongbao'))
 <div class="alert alert-danger">
  {{ session('thongbao') }}
 </div>
 
 @endif
 <form method="post" enctype="multipart/form-data">
     @csrf
    <div class="alert alert-primary" role="alert">
        Thêm danh mục sản phẩm mới
      </div>
     <div class="form-group">
       <label>ID danh mục</label>
       <input type="text" class="form-control input-group-text" placeholder="Tự động.." readonly>
     </div>

     <div class="form-group">
       <label>Tên danh mục</label>
       <input name="tenloai" type="text" class="form-control">
       @error('tenloai')
       <div class="alert alert-danger">{{ $message }}</div>
       @enderror
      </div>

      <div class="form-group">
        <label>Ảnh danh mục</label>
        <input name="anhdanhmuc" type="file" class="form-control">
        @error('anhdanhmuc')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
       </div>
     
     <button type="submit" class="btn btn-primary">Thêm mới</button>
     <a class="btn btn-primary" href="admin/loai-san-pham/danh-sach">Danh sách</a>
    </form>

 @endsection 

   




