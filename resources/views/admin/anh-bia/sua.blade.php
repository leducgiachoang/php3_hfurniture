

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
@foreach ($anh as $anh)
    

<form method="post" enctype="multipart/form-data">
    @csrf
   <div class="alert alert-primary" role="alert">
       Chỉnh sửa ảnh bìa
     </div>
    <input name="id" type="hidden" value="{{ $anh->id }}">
     <div class="form-group">
      <label>Hình ảnh</label>
      <input name="anhbiax" type="file" class="form-control">
      <input type="hidden" name="anhbia" value="{{ $anh->AnhBia }}" >
      @error('anhbiax')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
     </div>

     <div class="form-group">
      <label>Ảnh hiện tại</label>
      <img width="100%" src="public/images/anhbia/{{ $anh->AnhBia }}" alt="">
     </div>
    
    <button type="submit" class="btn btn-primary">Cập nhập</button>
    </form>
   @endforeach
@endsection 

  




