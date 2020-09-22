<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>H FURNITURE - @yield('title')</title>
        <meta name="description" content="">
        <base href="{{ asset('') }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="manifest" href="site.webmanifest">
		<link rel="shortcut icon" type="image/x-icon" href="resources/assets/img/favicon.ico">

        <!-- CSS here -->
        <link rel="stylesheet" href="public/csscook/style.css">
            <link rel="stylesheet" href="resources/assets/css/bootstrap.min.css">
            <link rel="stylesheet" href="resources/assets/css/owl.carousel.min.css">
            <link rel="stylesheet" href="resources/assets/css/slicknav.css">
            <link rel="stylesheet" href="resources/assets/css/animate.min.css">
            <link rel="stylesheet" href="resources/assets/css/magnific-popup.css">
            <link rel="stylesheet" href="resources/assets/css/fontawesome-all.min.css">
            <link rel="stylesheet" href="resources/assets/css/themify-icons.css">
            <link rel="stylesheet" href="resources/assets/css/slick.css">
            <link rel="stylesheet" href="resources/assets/css/nice-select.css">
            <link rel="stylesheet" href="resources/assets/css/style.css">

            <script type="text/javascript">
                function time() {
                   var today = new Date();
                   var weekday=new Array(7);
                   weekday[0]="Chủ Nhật";
                   weekday[1]="Thứ Hai";
                   weekday[2]="Thứ Ba";
                   weekday[3]="Thứ Tư";
                   weekday[4]="Thứ Năm";
                   weekday[5]="Thứ Sáu";
                   weekday[6]="Thứ Bảy";
                   var day = weekday[today.getDay()];
                   var dd = today.getDate();
                   var mm = today.getMonth()+1; //January is 0!
                   var yyyy = today.getFullYear();
                   var h=today.getHours();
                   var m=today.getMinutes();
                   var s=today.getSeconds();
                   m=checkTime(m);
                   s=checkTime(s);
                   nowTime = h+":"+m+":"+s;
                   if(dd<10){dd='0'+dd} if(mm<10){mm='0'+mm} today = day+', '+ dd+'/'+mm+'/'+yyyy;
                
                   tmp='<span class="date">'+today+' | '+nowTime+'</span>';
                
                   document.getElementById("clock").innerHTML=tmp;
                
                   clocktime=setTimeout("time()","1000","JavaScript");
                   function checkTime(i)
                   {
                      if(i<10){
                     i="0" + i;
                      }
                      return i;
                   }
                }
                </script>
   </head>

   <body onload="time()">
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v7.0&appId=247793369883440&autoLogAppEvents=1" nonce="BkaWa1Kc"></script>
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="resources/assets/img/logo/loder-logo.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    <header>
        <!-- Header Start -->
       <div class="header-area header-transparent">
            <div class="main-header ">
                <div class="header-top d-none d-lg-block">
                   <div class="container-fluid">
                       <div class="col-xl-12">
                            <div class="row d-flex justify-content-between align-items-center">
                                <div class="header-info-left">
                                    <ul>     
                                        <li>+(84) 369-203-989</li>
                                        <li>leducgiachoang@gmail.com</li>
                                        <li><div id="clock"></div></li>
                                    </ul>
                                </div>
                                <div class="header-info-right">
                                    <ul class="header-social">    
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                       <li> <a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                       </div>
                   </div>
                </div>
               <a href="logout"></a>
               <div class="header-bottom  header-sticky">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-2 col-lg-2 col-md-1">
                                <div class="logo">
                                    <!-- logo-1 -->
                                    <a href="" class="big-logo"><img src="resources/assets/img/logo/logo.png" alt=""></a>
                                    <!-- logo-2 -->
                                    <a href="" class="small-logo"><img src="resources/assets/img/logo/loder-logo.png" alt=""></a>
                                </div>
                            </div>
                            <div class="col-xl-7 col-lg-8 col-md-8">
                                <!-- Main-menu -->
                                
                                <div class="main-menu f-right d-none d-lg-block">
                                    <nav> 
                                        <ul id="navigation">                                                                                                                   
                                            <li><a href="#">Trang chủ</a></li>
                                            <li><a href="gioi-thieu">Giới thiệu</a></li>
                                            <li><a href="san-pham">Sản phẩm</a></li>
                                            <li><a href="lien-he">Liên hệ</a></li>
                                            <li><a href="gio-hang/gio-hang"><i class="fas fa-shopping-cart"></i> {{ Cart::count() }}</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>             
                            <div class="col-xl-3 col-lg-2 col-md-3">
                                <div class="header-right-btn f-right d-none d-lg-block">
                                    @if (isset(Auth::user()->email))
                                    <div class="main-menu f-right d-none d-lg-block">
                                        <nav> 
                                            <ul id="navigation">                                                                                                                   
                                                <li><a href=""><img style="width: 30px; height: 30px;border-radius: 50%" src="public/images/users/{{ Auth::user()->AnhDaiDien }}" alt=""> {{ Auth::user()->HoTen }}</a>
                                                    <ul class="submenu">
                                                       
                                                        <li><a href="taikhoan/thong-tin-nguoi-dung"><i class="fas fa-poo"></i> Quản lý tài khoản</a></li>
                                                        <li><a href="gio-hang/don-hang-cua-toi"><i class="far fa-star"></i> Đơn hàng của tôi</a></li>
                                                        <li><a href="nhan-xet-cua-toi"><i class="fab fa-facebook-messenger"></i> Nhận xét của tôi </a></li>
                                                        <li><a href="gio-hang/don-hang-da-huy"><i class="far fa-window-close"></i> Đơn hàng đổi trả</a></li>
                                                        <li><a href="taikhoan/dang-xuat"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                    
                                    @else
                                    <a href="taikhoan/dang-nhap" class="btn">Đăng nhập</a>
                                    @endif
                                    
                                </div>
                            </div>
                            <!-- Mobile Menu -->
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>
               </div>
            </div>
       </div>
        <!-- Header End -->
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        <!-- Footer Start-->
        <div class="footer-main">
                <div class="footer-area footer-padding">
                    <div class="container">
                        <div class="row  justify-content-between">
                            <div class="col-lg-4 col-md-4 col-sm-8">
                                <div class="single-footer-caption mb-30">
                                    <!-- logo -->
                                    <div class="footer-logo">
                                        <a href="#"><img src="resources/assets/img/logo/logo2_footer.png" alt=""></a>
                                    </div>
                                    <div class="footer-tittle">
                                        <div class="footer-pera">
                                            <p class="info1">
                                                H FURNITURE chuyên cung cấp đồ nội thất bền- chất- đẹp. Với trên 1 triệu năm kinh nghiệm chúng tôi tự hào là công ty cung cấp hàng đồ nội thất chất lượng nhất hệ mặt trời. 
                    
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-5">
                                <div class="single-footer-caption mb-50">
                                    <div class="footer-tittle">
                                        <h4>Thông tin</h4>
                                        <ul>
                                            <li><a href="#">Giới thiệu</a></li>
                                            <li><a href="#">Sản phẩm</a></li>
                                            <li><a href="#">Liên hệ</a></li>
                                            <li><a href="#">Facebook</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-7">
                                <div class="single-footer-caption mb-50">
                                    <div class="footer-tittle">
                                        <h4>Liên hệ</h4>
                                        <div class="footer-pera">
                                            <p class="info1">137 Nguyễn Thị Thập, Hòa Minh, Liên Chiểu, Đà Nẵng</p>
                                        </div>
                                        <ul>
                                            <li><a href="#">Phone: +84 (0) 369 203 989</a></li>
                                            <li><a href="#">Cell: +84 (0) 369 203 999</a></li>
                                            <li><div class="fb-like" data-href="http://localhost:8080/hfurniture/" data-width="" data-layout="button_count" data-action="recommend" data-size="large" data-share="true"></div></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-8">
                                <div class="single-footer-caption mb-50">
                                    <!-- Form -->
                                    <div class="footer-form">
                                        <div id="mc_embed_signup">
                                            <form target="_blank" action="" method="get" class="subscribe_form relative mail_part" novalidate="true">
                                                <input type="email" name="EMAIL" id="newsletter-form-email" placeholder=" Nhập Email " class="placeholder hide-on-focus" onfocus="this.placeholder = ''" onblur="this.placeholder = ' Nhập Email '">
                                                <div class="form-icon">
                                                    <button type="submit" name="submit" id="newsletter-submit" class="email_icon newsletter-submit button-contactForm">
                                                        Đăng ký
                                                    </button>
                                                </div>
                                                <div class="mt-10 info"></div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- Map -->
                                    <div class="map-footer">
                                        <img src="resources/assets/img/gallery/map-footer.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Copy-Right -->
                        <div class="row align-items-center">
                            <div class="col-xl-12 ">
                                <div class="footer-copy-right">
                                    <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved - Lê Đức Giác Hoàng
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <!-- Footer End-->
    </footer>
   
	<!-- JS here -->
	
		<!-- All JS Custom Plugins Link Here here -->
        <script src="resources/assets/js/vendor/modernizr-3.5.0.min.js"></script>
		<!-- Jquery, Popper, Bootstrap -->
		<script src="resources/assets/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="resources/assets/js/popper.min.js"></script>
        <script src="resources/assets/js/bootstrap.min.js"></script>
	    <!-- Jquery Mobile Menu -->
        <script src="resources/assets/js/jquery.slicknav.min.js"></script>

		<!-- Jquery Slick , Owl-Carousel Plugins -->
        <script src="resources/assets/js/owl.carousel.min.js"></script>
        <script src="resources/assets/js/slick.min.js"></script>
        <!-- Date Picker -->
        <script src="resources/assets/js/gijgo.min.js"></script>
		<!-- One Page, Animated-HeadLin -->
        <script src="resources/assets/js/wow.min.js"></script>
		<script src="resources/assets/js/animated.headline.js"></script>
        <script src="resources/assets/js/jquery.magnific-popup.js"></script>

		<!-- Scrollup, nice-select, sticky -->
        <script src="resources/assets/js/jquery.scrollUp.min.js"></script>
        <script src="resources/assets/js/jquery.nice-select.min.js"></script>
		<script src="resources/assets/js/jquery.sticky.js"></script>
               
        <!-- counter , waypoint -->
        <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
        <script src="resources/assets/js/jquery.counterup.min.js"></script>

        <!-- contact js -->
        <script src="resources/assets/js/contact.js"></script>
        <script src="resources/assets/js/jquery.form.js"></script>
        <script src="resources/assets/js/jquery.validate.min.js"></script>
        <script src="resources/assets/js/mail-script.js"></script>
        <script src="resources/assets/js/jquery.ajaxchimp.min.js"></script>
        
		<!-- Jquery Plugins, main Jquery -->	
        <script src="resources/assets/js/plugins.js"></script>
        <script src="resources/assets/js/main.js"></script>
        
<!-- Zalo chat -->
        <div class="zalo-chat-widget" data-oaid="3940002654963937037" data-welcome-message="Rất vui khi được hỗ trợ bạn!" data-autopopup="0" data-width="350" data-height="420"></div>

        <script src="https://sp.zalo.me/plugins/sdk.js"></script>
    </body>
</html>