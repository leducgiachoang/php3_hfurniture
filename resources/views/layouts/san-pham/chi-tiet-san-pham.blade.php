@extends('master.font-endMaster')

@section('content')
@section('title')
    Chi tiết sản phẩm 
@endsection
<div style="background-color: white;
height: 50px;">
</div>
@foreach ($sanphamby_id as $item)
    

<section class="blog_area single-post-area section-padding">
    <div class="container">
       <div><h1>{{ $item->TenSP }}<hr></h1>
      
   </div>
       
       
       <div class="row">
          <div class="col-lg-8 posts-list">
            <div class="row">
               <div class="col-lg-5">
                 <div class="feature-img">
                    <img class="img-fluid" src="public/images/sp/{{ $item->AnhSP }}" alt="">
                 </div>
               </div>
     
               <div class="col-lg-7">
                  
                    <p class="gia-tien">{{ number_format($item ->GiaSP,0,",",".") }} VNĐ</p>
                    <div class="box-khuyen-mai">
                     <h6 style="font-weight: bold">KHUYẾN MÃI</h6>
                     <p><i style="color: green" class="fas fa-chevron-circle-down"></i> Giảm giá 500.000 (đã trừ vào giá)
                     <hr>
                     <ul style="list-style-type: circle">
                        <li><i style="font-size: 12px;color:green " class="fas fa-bullseye"></i> Chỉ áp dụng giao tận nơi.</li>
                        <li> <i style="font-size: 12px;color:green " class="fas fa-bullseye"></i> Nhận hàng sau 1 ngày</li>
                        <li><i style="font-size: 12px;color:green " class="fas fa-bullseye"></i> Không áp dụng chung với khuyến mãi khác.</li>
                        <li><i style="font-size: 12px;color:green " class="fas fa-bullseye"></i> Không áp dụng trả góp qua công ty tài chính.</li>
                     </ul>
                     </p>
                    </div>
                    <div>
                       @if (($item ->SoLuong)<=0)
                       <div class="col-lg-12 nut-het-hang">Sản phẩm tạm thời hết hàng</div> 
                       @else
                       <a class="nut-mua" href="gio-hang/them/{{ $item->id }}">
                        <b>MUA NGAY</b><br>
                        <span>Giao tận nợi hoặc nhận tại siêu thị</span>
                     </a>
                       @endif
                       
                    </div>
               </div>
            </div>
<hr>
            <div style="margin: 20px auto"><h3>Đặc điểm nổi bật của {{ $item->TenSP }} </h3></div>
             <div class="single-post">
                <div class="feature-img">
                   <img class="img-fluid" src="public/images/sp/{{ $item->Anh1 }}" alt="">
                </div>
                <div class="blog_details">
                   
                   <ul class="blog-info-link mt-3 mb-4">
                      <li><a href="#"><i class="fa fa-user"></i> Travel, Lifestyle</a></li>
                      <li><a href="#"><i class="fa fa-comments"></i> 03 Comments</a></li>
                   </ul>
                   <p class="excert">
                      <?php echo $item->MoTa ?>
                   
                  </p>
                </div>
             </div>
             <div class="navigation-top">
                <div class="d-sm-flex justify-content-between text-center">
                   <ul class="social-icons">
                      <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                      <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                   </ul>
                </div>
             </div>
            
             <div class="comments-area">
               
                <h4>
                   @if (($sobl < 9) and ($sobl > 0))0 @else
                  
                   @endif{{ $sobl }} Bình luận</h4>
               
               
                @foreach ($hoidap as $ihoidap)
                <div class="comment-list">
                   <div class="single-comment justify-content-between d-flex">
                      <div class="user justify-content-between d-flex">
                         <div class="thumb">
                            <img style="width: 50px; height: 50px; border-radius: 50%" src="public/images/users/{{ $ihoidap->nguoidung->AnhDaiDien }}" alt="">
                         </div>
                         <div class="desc">
                           <h5>
                              <a href="#">{{ $ihoidap->nguoidung->HoTen }}</a>
                           </h5>
                            
                            <div class="d-flex justify-content-between">
                               <div class="d-flex align-items-center">
                                 <p class="comment">
                                    {{ $ihoidap->NoiDung }}
                                 </p>
                                  <p class="date"></p>
                               </div>
                               <div class="reply-btn">
                                  <a href="#" class="btn-reply text-uppercase">Trả lời</a>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
                @endforeach
             </div>
             {{ $hoidap->links() }}
             <div class="comment-form">
                <h4>Bình luận</h4>
                @if (session('thongbaobl'))
                <div class="alert alert-success">
                   <input type="hidden" autofocus>
                  {{ session('thongbaobl') }}
                </div>
              @endif
@if (Auth::check())
<form class="form-contact comment_form" method="POST" action="san-pham/hoi-dap" id="commentForm">
   @csrf
  <div class="row">
      <div class="col-12">
         <div class="form-group">
            <textarea class="form-control w-100" name="noidung" id="comment" cols="20" rows="9"
               placeholder="Bình luận của bạn về sản phẩm"></textarea>
               @error('noidung')
                <div class="alert alert-danger">{{ $message }}</div>
               @enderror
         </div>
      </div>
      <div class="col-sm-6">
        @foreach ($sanphamby_id as $spne)


        <div class="form-group">
            <input class="form-control" value="{{ Auth::user()->id }}" name="id_nguoi_dung" id="name" type="hidden">
            <input class="form-control" value="{{ $spne->id }}" name="id_san_pham" id="name" type="hidden">
           
        </div>
        @endforeach
     
        <input value="1" class="form-control" name="id_tinh_trang_hoi_dap " id="email" type="hidden" placeholder="Email">
      </div>
   </div>
   <div class="form-group">
      <button type="submit" class="button button-contactForm btn_1 boxed-btn">Gửi</button>
   </div>
</form>
@else
<div class="alert alert-danger" role="alert">
   <h6>Vui lòng đăng nhập để bình luận</h6>
 </div>
   
@endif
                
             </div>
          </div>
          <div class="col-lg-4">
             <div class="blog_right_sidebar">
                
                <aside class="single_sidebar_widget post_category_widget">
                   <h4 class="widget_title">Danh mục sản phẩm</h4>
                   <ul class="list cat-list">
                     @foreach ($loai as $iloai)
                     <li>
                       <a href="san-pham/loai/{{ $iloai->id }}" class="d-flex">
                          <p>{{ $iloai->TenLoai }} </p>
                       </a>
                    </li>
                     @endforeach
                      
                   </ul>
                </aside>
                <aside class="single_sidebar_widget popular_post_widget">
                   <h3 class="widget_title">Sản phẩm cùng loại</h3>
                   @foreach ($spcungloai as $ispcungloai)
                   <div class="media post_item">
                     <img width="45px" height="45px" src="public/images/sp/{{ $ispcungloai->AnhSP }}" alt="post">
                     <div class="media-body">
                        <a href="san-pham/chi-tiet/{{ $ispcungloai->id }}">
                           <h3>{{ $ispcungloai->TenSP }}</h3>
                        </a>
                        <p>Kho: {{ $ispcungloai->SoLuong }}</p>
                     </div>
                  </div>
                   @endforeach
                   
                </aside>
                
                <aside class="single_sidebar_widget instagram_feeds">
                   <h4 class="widget_title">Ảnh sản phẩm</h4>
                   <ul class="instagram_row flex-wrap">
                     @foreach ($sanphamby_id as $ianh)
                     <li>
                           <img class="img-fluid" src="public/images/sp/{{ $ianh->Anh1 }}" alt="">
                     </li>

                     <li>
                           <img class="img-fluid" src="public/images/sp/{{ $ianh->Anh2 }}" alt="">
                     </li>

                     <li>
                           <img class="img-fluid" src="public/images/sp/{{ $ianh->Anh3 }}" alt="">
                     </li>
                      @endforeach
                      
                      
                   </ul>
                </aside>
                <aside class="single_sidebar_widget newsletter_widget">
                   <h4 class="widget_title">Tiện ích</h4>
                   <div class="fb-share-button" data-href="http://localhost:8080/hfurniture/san-pham/chi-tiet/{{ $item->id }}" data-layout="button_count" data-size="large"><a target="_blank" href="san-pham/chi-tiet/{{ $item->id }}" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>
                </aside>
             </div>
          </div>
       </div>
    </div>
 </section>
 @endforeach
@endsection