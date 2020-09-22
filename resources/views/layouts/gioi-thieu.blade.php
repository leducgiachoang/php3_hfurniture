
    

@extends('master.font-endMaster')

@section('content')
@section('title')
    Giới thiệu
@endsection
<div class="slider-area ">
    <div class="single-slider hero-overly slider-height2 d-flex align-items-center" data-background="https://c.wallhere.com/photos/92/b7/cafe_tables_chairs_design_interior_style-694091.jpg!d">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap pt-100">
                        <h2>Giới thiệu</h2>
                        <nav aria-label="breadcrumb ">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                            <li class="breadcrumb-item"><a href="san-pham">Sản phẩm</a></li> 
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
    <section class="support-company-area fix pt-10">
        <div class="support-wrapper align-items-end">
            <div class="left-content">
                <!-- section tittle -->
                
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
    


@endsection

