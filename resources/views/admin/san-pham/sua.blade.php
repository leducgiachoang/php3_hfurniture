

@extends('master.back-endMaster')

@section('xcontent')
@section('title')
    Chỉnh sửa sản phẩm
@endsection
@if (session('thongbao'))
<div class="alert alert-danger">
 {{ session('thongbao') }}
</div>

@endif

@foreach ($db as $itemsp)
    

<form method="post" enctype="multipart/form-data">
    @csrf
   <div class="alert alert-primary" role="alert">
       Sủa sản phẩm <strong>{{ $itemsp ->TenSP  }}</strong>
     </div>

     <div class="row">
       <div class="form-group col-lg-4">
         <label>ID danh mục</label>
         <input name="id" value="{{ $itemsp ->id  }}" type="text" class="form-control input-group-text" placeholder="Tự động.." readonly>
       </div>
       <input name="soluotxem" value="{{ $itemsp ->SoLuotXem  }}" type="hidden" class="form-control input-group-text" placeholder="" readonly>

  
       <div class="form-group col-lg-4">
          <label>Tên sản phẩm</label>
          <input value="{{ $itemsp->TenSP }}" name="tensp" type="text" class="form-control">
          @error('tensp')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group col-lg-4">
         <label>Ảnh đại diện</label>
         <div class="row">
            <input name="anhspx" type="file" class="form-control col-lg-6">
            <input type="hidden" name="anhsp" value="{{ $itemsp->AnhSP }}">
            <img class="col-lg-6" src="public/images/sp/{{ $itemsp ->AnhSP }}" alt="">
            @error('anhspx')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
         </div>
         
       </div>
     </div>

     <div class="row">
       <div class="form-group col-lg-4">
         <label>Giá sản phẩm</label>
         <input value="{{ $itemsp ->GiaSP }}" name="giasp" type="number" class="form-control">
         @error('giasp')
         <div class="alert alert-danger">{{ $message }}</div>
         @enderror
       </div>

       <div class="form-group col-lg-4">
         <label>Số lượng</label>
         <input value="{{ $itemsp ->SoLuong }}" name="soluong" type="number" class="form-control">
         @error('soluong')
         <div class="alert alert-danger">{{ $message }}</div>
         @enderror
       </div>

       <div class="form-group col-lg-4">
         <label>Danh mục</label>
         <select class="custom-select" name="id_loai_san_pham" >
           <option value="{{ $itemsp->id_loai_san_pham  }}" selected>{{ $itemsp->loai->TenLoai }}</option>
           @foreach ($dbloai as $item)
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
            {{ $itemsp->MoTa  }}
         </textarea>
         @error('mota')
         <div class="alert alert-danger">{{ $message }}</div>
         @enderror
       </div>
     </div>

     <div class="row">
        <div class="form-group col-lg-4">
            <label>Ảnh 1</label>
            <div class="row">
               <input name="anh1x" type="file" class="form-control col-lg-6">
               <img class="col-lg-6" src="public/images/sp/{{ $itemsp ->Anh1 }}" alt="">
               <input type="hidden" name="anh1" value="{{ $itemsp->Anh1 }}">
            </div>
            
            @error('anh1x')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>

       <div class="form-group col-lg-4">
        <label>Ảnh 2</label>
        <div class="row">
           <input name="anh2x" type="file" class="form-control col-lg-6">
           <img class="col-lg-6" src="public/images/sp/{{ $itemsp ->Anh2 }}" alt="">
           <input type="hidden" name="anh2" value="{{ $itemsp->Anh2 }}">
        </div>
        
        @error('anh2x')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>

       <div class="form-group col-lg-4">
        <label>Ảnh 3</label>
        <div class="row">
           <input name="anh3x" type="file" class="form-control col-lg-6">
           <img class="col-lg-6" src="public/images/sp/{{ $itemsp ->Anh3 }}" alt="">
           <input type="hidden" name="anh3" value="{{ $itemsp->Anh3 }}">
        </div>
        
        @error('anh3x')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
     </div>
     
    
    <button type="submit" class="btn btn-primary">Cập nhập</button>
    <a class="btn btn-primary" href="admin/san-pham/danh-sach">Danh sách</a>
   </form>
   @endforeach
@endsection 

  




