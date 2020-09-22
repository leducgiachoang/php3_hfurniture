
    

@extends('master.font-endMaster')

@section('content')
@section('title')
    Trang chủ
@endsection

    <!-- slider Area Start-->
    <div class="slider-area ">
        <div class="slider-active">
            @foreach ($anhne as $anhbia)
             <div class="single-slider  hero-overly slider-height d-flex align-items-center" data-background="public/images/anhbia/{{ $anhbia->AnhBia }}">
            @endforeach
                <div class="container">
                    <div class="row">
                        <div class="col-lg-11">
                            <div class="hero__caption">
                                <div class="hero-text1">
                                    <span style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif" data-animation="fadeInUp" data-delay=".3s">Sản phẩm độc đáo</span>
                                </div>
                                <h1 data-animation="fadeInUp" data-delay=".5s">Lê Đức</h1>
                                <div class="stock-text" data-animation="fadeInUp" data-delay=".8s">
                                    <h2>Giác Hoàng</h2>
                                    <h2>Giác Hoàng</h2>
                                </div>
                                <div class="hero-text2 mt-110" data-animation="fadeInUp" data-delay=".9s">
                                   <span><a style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif" href="services.html">Dịch vụ của chúng tôi</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-slider  hero-overly slider-height d-flex align-items-center" data-background="public/images/anhbia/h1_hero.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-11">
                            <div class="hero__caption">
                                <div class="hero-text1">
                                    <span data-animation="fadeInUp" data-delay=".3s">hand car wash and detailing service</span>
                                </div>
                                <h1 data-animation="fadeInUp" data-delay=".5s">Lê Đức</h1>
                                <div class="stock-text" data-animation="fadeInUp" data-delay=".8s">
                                    <h2>Giác Hoàng</h2>
                                    <h2>Giác Hoàng</h2>
                                </div>
                                <div class="hero-text2 mt-110" data-animation="fadeInUp" data-delay=".9s">
                                    <span><a href="services.html">Our Services</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->
    <!-- Services Area Start -->
    <div class="services-area1 section-padding30">
        <div class="container">
            <!-- section tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle mb-55">
                        <div class="front-text">
                            <h2 style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;font-size: 50px">Sản phẩm của chúng tôi</h2>
                        </div>
                        <span class="back-text">Sản Phẩm</span>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($sanpham as $item)
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="single-service-cap mb-30">
                        <div class="service-img">
                            <a href="san-pham/chi-tiet/{{ $item->id }}"><img style="height: 250px" src="public/images/sp/{{ $item->AnhSP }}" alt=""></a>
                        </div>
                        <div class="service-cap">
                            <h5><a href="san-pham/chi-tiet/{{ $item->id }}">{{ $item->TenSP }}</a></h5>
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
               
            </div>
        </div>
    </div>
    <!-- Services Area End -->
    <!-- About Area Start -->
    <section class="support-company-area fix pt-10">
        <div class="support-wrapper align-items-end">
            <div class="left-content">
                <!-- section tittle -->
                <div class="section-tittle section-tittle2 mb-55">
                    <div class="front-text">
                        <h2 style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif" class="">GIỚI THIỆU</h2>
                    </div>
                    <span class="back-text">GIỚI THIỆU</span>
                </div>
                <div class="support-caption">
                    <p class="pera-top">H FURNITURE chuyên cung cấp đồ nội thất bền- chất- đẹp. Với trên 1 triệu năm kinh nghiệm chúng tôi tự hào là công ty cung cấp hàng đồ nội thất chất lượng nhất hệ mặt trời.</p>
                    <p>Công ty TNHH H FURNITURE được thành lập vào năm 8534 TCN được Chủ tịch Lê Đức Giác Hoàng sáng lập. Những sản phẩm đầu tiên của chúng tôi làm bằng các nguyên liệu như: đá, cây và lá nhằm tạo ra các sản phẩm trang trí và phục vụ cho nhu cầu săn bắt hái lượm của con người thời ấy...</p>
                    <a href="about.html" class="btn red-btn2">XEM THÊM</a>
                </div>
            </div>
            <div class="right-content">
                <!-- img -->
                <div class="right-img">
                    <img src="https://c.wallhere.com/photos/69/fa/1920x1200_px_Chile_Easter_Island_landscape_Moai_Monuments_nature_Starry_Night-791102.jpg!d" alt="">
                </div>
                <div class="support-img-cap text-center">
                    <span>8534</span>
                    <p>TCN</p>
                </div>
            </div>
        </div>
    </section>
    <!-- About Area End -->
    <!-- Project Area Start -->
    <section class="project-area  section-padding30">
        <div class="container">
           <div class="project-heading mb-35">
                <div class="row align-items-end">
                    <div class="col-lg-6">
                        <!-- Section Tittle -->
                        <div class="section-tittle section-tittle3">
                            <div class="front-text">
                                <h2 style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif" class="">DANH MỤC</h2>
                            </div>
                            <span  class="back-text">DANH MỤC</span>
                        </div>
                    </div>
                   
                </div>
           </div>
            <div class="row">
                <div class="col-12">
                    <!-- Nav Card -->
                    <div class="tab-content active" id="nav-tabContent">
                        <!-- card ONE -->
                        <div class="tab-pane fade active show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">           
                            <div class="project-caption">
                                <div class="row">
                                    @foreach ($loai as $iloai)
                                    <div class="col-lg-4 col-md-6">
                                        <div class="single-project mb-30">
                                            <div class="project-img">
                                                <img height="250px" src="public/images/anhdanhmuc/{{ $iloai->AnhDanhMuc }}" alt="">
                                            </div>
                                            <div class="project-cap">
                                                <a href="san-pham/loai/{{ $iloai->id }}" class="plus-btn"><i class="ti-plus"></i></a>
                                                <h4><a href="project_details.html">{{ $iloai->TenLoai }}</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach 
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Project Area End -->
    <!-- contact with us Start -->
    <section class="contact-with-area" data-background="resources/assets/img/gallery/section-bg2.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-9 offset-xl-1 offset-lg-1">
                    <div class="contact-us-caption">
                        <div class="team-info mb-30 pt-45">
                            <!-- Section Tittle -->
                            <div class="section-tittle section-tittle4">
                                <div class="front-text">
                                    <h2 style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif" class="">PHƯƠNG CHÂM PHÁT TRIỂN</h2>
                                </div>
                                <span class="back-text">PHÁT TRIỂN</span>
                            </div>
                            <p>Công ty TNHH H.FURNITURE phát triển dựa trên chất lượng sản phẩm và niềm tin khách hàng. Chúng tôi luông cố gắng tạo ra những sản phẩm có chất lượng tuyệt vời, bền bỉ theo thời gian... Chúng tôi luôn luôn lắng nghe, luôn luôn thấu hiểu những tâm tư tình cảm của khách hàng và lấy đó để làm động lực tiếp tục phát triển.</p>
                            <a href="#" class="white-btn">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact with us End-->
    <!-- CountDown Area Start -->
    <div class="count-area">
        <div class="container">
            <div class="count-wrapper count-bg" data-background="resources/assets/img/gallery/section-bg3.jpg">
                <div class="row justify-content-center" >
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="count-clients">
                            <div class="single-counter">
                                <div class="count-number">
                                    <span class="counter">1000,000</span>
                                </div>
                                <div class="count-text">
                                    <p>SẢN PHẨM</p>
                                    <h6>TUYỆT VỜI</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="count-clients">
                            <div class="single-counter">
                                <div class="count-number">
                                    <span class="counter">4000,000</span>
                                </div>
                                <div class="count-text">
                                    <p>KHÁCH HÀNG</p>
                                    <h6>TIN TƯỞNG</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="count-clients">
                            <div class="single-counter">
                                <div class="count-number">
                                    <span class="counter">37,000</span>
                                </div>
                                <div class="count-text">
                                    <p>ĐƠN HÀNG</p>
                                    <h6>HẰNG THÁNG</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CountDown Area End -->

        <!--latest Nnews Area start -->
    <div class="latest-news-area section-padding30">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <!-- Section Tittle -->
                    <div class="section-tittle section-tittle7 mb-50">
                        <div class="front-text">
                            <h2 class="">latest news</h2>
                        </div>
                        <span class="back-text">Our Blog</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <!-- single-news -->
                    <div class="single-news mb-30">
                        <div class="news-img">
                            <img src="resources/assets/img/david/david_1.png" alt="">
                            <div class="news-date text-center">
                                <span>24</span>
                                <p>Now</p>
                            </div>
                        </div>
                        <div class="news-caption">
                            <ul class="david-info">
                                <li> | &nbsp; &nbsp;  Porperties</li>
                            </ul>
                            <h2><a href="single-blog.html">Footprints in Time is perfect
                                House in Kurashiki</a></h2>
                            <a href="single-blog.html" class="d-btn">Read more »</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <!-- single-news -->
                    <div class="single-news mb-30">
                        <div class="news-img">
                            <img src="resources/assets/img/david/david_2.png" alt="">
                            <div class="news-date text-center">
                                <span>24</span>
                                <p>Now</p>
                            </div>
                        </div>
                        <div class="news-caption">
                            <ul class="david-info">
                                <li> | &nbsp; &nbsp;  Porperties</li>
                            </ul>
                            <h2><a href="single-blog.html">Footprints in Time is perfect
                                House in Kurashiki</a></h2>
                            <a href="single-blog.html" class="d-btn">Read more » </a>
                        </div>
                    </div>
                </div>
           </div>
        </div>
    </div>
    <!--latest News Area End -->


@endsection

