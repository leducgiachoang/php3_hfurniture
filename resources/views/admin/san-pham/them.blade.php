

@extends('master.back-endMaster')

 @section('xcontent')
 @section('title')
Thêm mới sản phẩm
@endsection
 @if (session('thongbao'))
 <div class="alert alert-danger">
  {{ session('thongbao') }}
 </div>
 
 @endif
 
 <form method="post" enctype="multipart/form-data">
     @csrf
    <div class="alert alert-primary" role="alert">
        Thêm sản phẩm mới
      </div>

      <div class="row">
        <div class="form-group col-lg-4">
          <label>ID danh mục</label>
          <input type="text" class="form-control input-group-text" placeholder="Tự động.." readonly>
        </div>
   
        <div class="form-group col-lg-4">
           <label>Tên sản phẩm</label>
           <input name="tensp" type="text" class="form-control">
           @error('tensp')
           <div class="alert alert-danger">{{ $message }}</div>
           @enderror
         </div>

         <div class="form-group col-lg-4">
          <label>Ảnh đại diện</label>
          <input name="anhsp" type="file" class="form-control">
          @error('anhsp')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
      </div>

      <div class="row">
        <div class="form-group col-lg-4">
          <label>Giá sản phẩm</label>
          <input name="giasp" type="number" class="form-control">
          @error('giasp')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group col-lg-4">
          <label>Số lượng</label>
          <input name="soluong" type="number" class="form-control">
          @error('soluong')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group col-lg-4">
          <label>Danh mục</label>
          <select class="custom-select" name="id_loai_san_pham" >
            <option value="" selected>Chọn một danh mục...</option>
            @foreach ($db as $item)
            <option value="{{ $item->id }}">{{ $item->TenLoai }}</option>
            @endforeach
            
          </select>
          @error('id_loai_san_pham')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
          </div>
      </div>

      <div class="row">
        <div class="form-group col-lg-12">
          <label>Mô tả</label>
          <textarea class="form-control" name="mota" id="editor1" rows="10" cols="80">
            
          </textarea>
          @error('mota')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
      </div>

      <div class="row">
        <div class="form-group col-lg-4">
          <label>Ảnh 1</label>
          <input name="anh1" type="file" class="form-control">
          @error('anh1')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group col-lg-4">
          <label>Ảnh 2</label>
          <input name="anh2" type="file" class="form-control">
          @error('anh2')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group col-lg-4">
          <label>Ảnh 3</label>
          <input name="anh3" type="file" class="form-control">
          @error('anh3')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
      </div>
      
     
     <button type="submit" class="btn btn-primary">Thêm mới</button>
     <a class="btn btn-primary" href="admin/san-pham/danh-sach">Danh sách</a>
    </form>

 @endsection 

   




