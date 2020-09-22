

@extends('master.back-endMaster')
 @section('xcontent')
@section('title')
    Danh sách loại sản phẩm
@endsection
 @if (session('thongbao'))
 <div class="alert alert-danger">
  {{ session('thongbao') }}
 </div>
 
 @endif
 <div class="list-group-item list-group-item-action active">
  <div class="navbar row">
    <b class="navbar-brand">Danh sách các danh mục sản phẩm</b>
    
    <div style="float: right" class="col-lg-3">
      <form method="POST" action="admin/loai-san-pham/timkiem" class="form-inline">
        @csrf
        <input name="tukhoa" class="form-control col-lg-12" type="search" placeholder='Từ khóa tìm kiếm'>
      </form>
    </div>
  </div>   
</div>
 <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Tên danh mục</th>
        <th scope="col">Hình ảnh</th>
        <th scope="col"></th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
        @foreach ($dbx as $item)
          <tr>
            <th scope="row">{{ $item ->id }}</th>
            <td>{{ $item ->TenLoai }}</td>
            <td><img width="50" src="public/images/anhdanhmuc/{{ $item->AnhDanhMuc }}" alt=""></td>
            <td><a class="btn btn-success" href="admin/loai-san-pham/sua/{{ $item ->id }}">Sửa</a></td>
            <td><a class="btn btn-warning" href="admin/loai-san-pham/xoa/{{ $item ->id }}">Xóa</a></td>
          </tr>
        @endforeach
      
      
    </tbody>
  </table>
  
  <a class="btn btn-primary" href="admin/loai-san-pham/them">Thêm mới</a>
  {{ $dbx->links() }}
  
 @endsection 
