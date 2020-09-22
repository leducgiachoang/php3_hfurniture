@extends('master.font-end-MasterUser')
@section('thongtinnguoidung')


    <h3>Nhận xét của tôi</h3>
        <div>
            <table class="table table-hover">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Nội dung</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Xem</th>
                    <th scope="col">Chức năng</th>

                  </tr>
                </thead>
                <?php $a = 1 ?>
                <tbody>
                    @foreach ($nhanxet as $item)
                  <tr>
                    <th scope="row">{{ $a }}</th>
                    <td><div style="overflow: hidden;
                        width: 500px;
                        height: 50px;">
                        {{ $item->NoiDung }}
                    </div></td>
                    <td>
                        @if (($item->id_tinh_trang_hoi_dap) == 2)
                        <i style="font-size: 25px" class="fas fa-toggle-on"></i>
                        @else
                        <i style="font-size: 25px" class="fas fa-toggle-off"></i>
                        @endif
                    </td>
                    <td>
                        @if (($item->id_tinh_trang_hoi_dap) == 2)
                        <a href="san-pham/chi-tiet/{{ $item->id_san_pham }}"><i class="fas fa-eye"></i></a>
                        @else
                        <i class="fas fa-eye-slash"></i>
                        @endif
                    </td>
                    <th scope="row"><a href="nhan-xet-cua-toi/xoa/{{ $item->id }}">Xóa</a></th>
                  </tr>
                  <?php $a++ ?>
                  @endforeach
                  
                </tbody>
              </table>
        </div>  

 

 
    
@endsection