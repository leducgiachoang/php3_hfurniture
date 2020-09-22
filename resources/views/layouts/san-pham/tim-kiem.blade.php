
    

@extends('master.font-endMaster')

@section('content')
@section('title')
    Sản phẩm nổi bật
@endsection

<?php 
function doimau($str, $tukhoa){
    return  str_replace($tukhoa,"<span style='color:red;'>$tukhoa</span>",$str);
   
}
?>
<div class="slider-area ">
    <div class="single-slider hero-overly slider-height2 d-flex align-items-center" data-background="https://c.wallhere.com/photos/92/b7/cafe_tables_chairs_design_interior_style-694091.jpg!d">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap pt-100">
                        <h2>Sản phẩm</h2>
                        <nav aria-label="breadcrumb ">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="gioi-thieu">Giới thiệu</a></li>
                            <li class="breadcrumb-item"><a href="lien-he">Liên hệ</a></li> 
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Services Area End -->
    <!-- About Area Start -->
    <div class="services-area1 section-padding20">
        <div class="row">
<div class="col-lg-9">
    <div style="margin: 10px auto" class="row">
        <a href="san-pham">
            <div class="col-mg-1">
                <div style="padding: 5px 15px;background-color: rgb(0, 65, 187);border-radius: 7px">
                    <div  style="font-size: 14px;color: white" class="alert-link">Từ khóa tìm kiếm: " {{ $tukhoa }} "
                         <i class="far fa-times-circle"></i>
                    </div>
                  </div>  
            </div>
        </a>
    </div>

    <div class="row">
        @foreach ($sanpham as $item)
        <div class="col-xl-3 col-lg-4 col-md-6">
            
            <div class="single-service-cap mb-30">
                <div class="service-img">
                    <a href="san-pham/chi-tiet/{{ $item->id }}"><img style="height: 250px" src="public/images/sp/{{ $item->AnhSP }}" alt=""></a>
                </div>
                <div class="service-cap">
                    <h5><a href="san-pham/chi-tiet/{{ $item->id }}">{!! doimau($item->TenSP,$tukhoa)  !!}</a></h5>
                    <h6 style="color: brown">{{ number_format($item ->GiaSP,0,",",".") }} VND</h6>
                    <div class="row">
                        @if (($item->SoLuong)<=0)
                        <div class="col-lg-12 nut-het-hang">Sản phẩm hết hàng</div> 
                        @else
                        <a href="gio-hang/them/{{ $item->id }}" class=""><div class="col-lg-12 nut-them">Thêm vào giỏ hàng <i class="fas fa-cart-plus"></i></div></a> 
                        @endif
                        
                    </div>
                    </div>
                <div class="service-icon">
                    <img src="resources/assets/img/icon/services_icon1.png" alt="">
                </div>
            </div>
        </div>
        @endforeach
        <div class="col-lg-12">
            {{ $sanpham->links() }}
        </div>
        
    </div>

    
</div>

<div class="col-lg-3">
    <aside class="single_sidebar_widget post_category_widget">
        <ul class="list cat-list">
           
            <li>
                <ul class="list-group">
                    <li style="border: none;background: none;" class="list-group-item">
                        <form style="margin: 0px -5px auto;" action="san-pham/tim-kiem" method="POST">
                            @csrf
                                <div class="row">
                                    <input class="col-lg-10 form-tim" type="search" placeholder="Tìm kiếm sản phẩm..." name="tukhoa">
                                    <input class="col-lg-2 dorm-nut" type="submit" value="Tìm">
                                </div>
                            
                        </form>
                    </li>
                  </ul>
           
           </li>

           <li class="list-group-item active widget_title">
              Tìm kiếm theo giá
           </li>
           <li>
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="san-pham/gia/duoi-2-trieu">Dưới 2 triệu</a>
                  <span class="badge badge-primary badge-pill">{{ $so1 }}</span>
                </li>

                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="san-pham/gia/tu-2-7-trieu">Từ 2- 7 triệu</a>
                  <span class="badge badge-primary badge-pill">{{ $so2 }}</span>
                </li>

                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="san-pham/gia/tu-7-13-trieu">Từ 7- 13 triệu</a>
                  <span class="badge badge-primary badge-pill">{{ $so3 }}</span>
                </li>

                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="san-pham/gia/tu-13-30-trieu">Từ 13- 30 triệu</a>
                    <span class="badge badge-primary badge-pill">{{ $so4 }}</span>
                  </li>

                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="san-pham/gia/tu-30-50-trieu">Từ 30- 50 triệu</a>
                    <span class="badge badge-primary badge-pill">{{ $so5 }}</span>
                  </li>

                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="san-pham/gia/tren-50-trieu">trên 30 triệu</a>
                    <span class="badge badge-primary badge-pill">{{ $so6 }}</span>
                  </li>

              </ul>
           </li>
            
           
        </ul>
     </aside>
   

    <aside style="margin: 7px auto" class="single_sidebar_widget post_category_widget">
        <ul class="list-group">
            <li class="list-group-item active widget_title">
                Danh mục sản phẩm
             </li>
            @foreach ($loai as $iloai)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="san-pham/loai/{{ $iloai->id }}" class="d-flex">
                    {{ $iloai->TenLoai }}
                 </a>
            </li>
            @endforeach
          </ul>
     </aside>
</div>
            
        </div>
    </div>


@endsection

