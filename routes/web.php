<?php

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Layout
Route::get('/', 'layoutController@trangchu');
Route::get('gioi-thieu', 'layoutController@gioithieu');
Route::get('san-pham', 'layoutController@sanpham');
Route::get('lien-he', 'layoutController@lienhe');
Route::group(['prefix' => 'san-pham'], function () {
    Route::get('loai/{id?}', 'layoutController@sanphambyid');
    Route::post('hoi-dap', 'layoutController@PostHoiDap')->middleware('checkdangnhap');
});

//Sản phẩm
Route::group(['prefix' => 'san-pham'], function () {
    Route::get('chi-tiet/{id?}', 'layoutController@chitietsanpham');
    Route::post('tim-kiem', 'layoutController@timkiem');
    Route::get('tim-kiem', 'layoutController@timkiem');
    Route::group(['prefix' => 'gia'], function () {
        Route::get('duoi-2-trieu', 'layoutController@duoi2trieu');
        Route::get('tu-2-7-trieu', 'layoutController@tu2den7trieu');
        Route::get('tu-7-13-trieu', 'layoutController@tu7den13trieu');
        Route::get('tu-13-30-trieu', 'layoutController@tu13den30trieu');
        Route::get('tu-30-50-trieu', 'layoutController@tu30den50trieu');
        Route::get('tren-50-trieu', 'layoutController@tren50trieu');
    });
});


//Tài khoản
Route::group(['prefix' => 'taikhoan'], function () {
    Route::get('dang-nhap', 'UserController@GetDangNhap');
    Route::post('dang-nhap', 'UserController@PostDangNhap');
    Route::get('dang-xuat', 'UserController@GetDangXuat')->middleware('checkdangnhap');
    Route::get('dang-ky', 'UserController@GetDangKy');
    Route::post('dang-ky', 'UserController@PostDangKy');
    Route::get('quen-mat-khau', 'UserController@GetQuenMatKhau');
    Route::post('quen-mat-khau', 'UserController@PostQuenMatKhau');
    Route::get('dat-lai-mat-khau', 'UserController@GetDatLaiMatKhau')->name('get.link.reset.password');
    Route::post('dat-lai-mat-khau', 'UserController@PostDatLaiMatKhau');
    Route::get('thong-bao-chua-kich-hoat', 'UserController@thongbaochuakichhoat');
    Route::get('kich-hoat-tai-khoan', 'UserController@kichhoattaikhoan')->name('post.link.kichhoattaikhoan');
    Route::get('thong-tin-nguoi-dung', 'UserController@thongtinnguoidung')->middleware('checkdangnhap');
    Route::post('thong-tin-nguoi-dung', 'UserController@Editthongtinnguoidung')->middleware('checkdangnhap');
    Route::get('thay-doi-mat-khau', 'UserController@GetThayDoiMatKhau')->middleware('checkdangnhap');
    Route::post('thay-doi-mat-khau', 'UserController@PostThayDoiMatKhau')->middleware('checkdangnhap');
});

//Admin
Route::get('admin', 'layoutController@admin')->middleware('adminlogin');;


Route::group(['prefix' => 'admin', 'middleware' => 'adminlogin'], function () {

    //Loại sản phẩm
    Route::group(['prefix' => 'loai-san-pham'], function () {
        Route::get('them', 'loai_san_pham@them');
        Route::post('them', 'loai_san_pham@clickthem');
        Route::post('timkiem', 'loai_san_pham@timkiem');
        Route::get('danh-sach', 'loai_san_pham@danhsach');
        Route::get('xoa/{id?}', 'loai_san_pham@xoa');
        Route::get('sua/{id?}', 'loai_san_pham@sua');
        Route::post('sua/{id?}', 'loai_san_pham@clicksua');
    });

    // Sản phẩm
    Route::group(['prefix' => 'san-pham'], function () {
        Route::get('them', 'sanpham@them');
        Route::post('them', 'sanpham@clickthem');
        Route::get('danh-sach', 'sanpham@danhsach');
        Route::get('xoa/{id?}', 'sanpham@xoa');
        Route::get('sua/{id?}', 'sanpham@sua');
        Route::post('sua/{id?}', 'sanpham@clicksua');
        Route::post('timkiem', 'sanpham@timkiem');
    });

    //Người dùng
    Route::group(['prefix' => 'nguoi-dung'], function () {

        Route::get('them', 'UserController@GetThem');
        Route::post('them', 'UserController@PostThem');
        Route::get('danh-sach', 'UserController@DanhSach');
        Route::get('xoa/{id?}', 'UserController@xoa');
        Route::get('sua/{id?}', 'UserController@GetSua');
        Route::post('sua/{id?}', 'UserController@PostSua');
        Route::post('timkiem', 'UserController@timkiem');
        Route::post('danh-sach', 'UserController@PostOn');
    });

    //Ảnh bìa

    Route::group(['prefix' => 'anh-bia'], function () {
        Route::get('sua', 'Anh_Bia_Controller@GetAnhBia');
        Route::post('sua', 'Anh_Bia_Controller@PostAnhBia');
    });

    //Hóa đơn

    Route::group(['prefix' => 'hoa-don'], function () {
        Route::get('danh-sach', 'HoaDonController@danhsach');
        Route::get('xoa/{id?}', 'HoaDonController@xoa');
        route::get('chi-tiet/{id?}', 'HoaDonController@chitiet');
        Route::post('timkiem', 'HoaDonController@timkiem');
        Route::get('tinh-trang/cho-xu-ly', 'HoaDonController@choxuly'); // 1
        Route::get('tinh-trang/dang-giao-hang', 'HoaDonController@danggiaohang'); // 2
        Route::get('tinh-trang/da-giao', 'HoaDonController@dagiao'); //3
        Route::get('tinh-trang/da-huy', 'HoaDonController@dahuy'); //4

    });

    //Binh luận
    Route::group(['prefix' => 'binh-luan'], function () {
        Route::get('danh-sach', 'BinhLuan_Controller@danhsach');
        Route::post('danh-sach', 'BinhLuan_Controller@PostCapNhap');
        Route::get('xoa/{id?}', 'BinhLuan_Controller@xoa');
        Route::post('timkiem', 'BinhLuan_Controller@timkiem');
        Route::post('tra-loi', 'BinhLuan_Controller@traloi');
    });

    Route::group(['prefix' => 'bieu-do'], function () {
        Route::get('pie', 'BieuDoController@pie');
        Route::get('bar', 'BieuDoController@bar');
        Route::get('line', 'BieuDoController@line');
    });
});

//Shopphing cart 

Route::group(['prefix' => 'gio-hang'], function () {
    Route::get('them/{id?}', 'ShopphingCartController@AddProduct');
    Route::get('gio-hang', 'ShopphingCartController@ListCart');
    Route::get('xoa/{rowId?}', 'ShopphingCartController@XoaCart');
    Route::get('tru/{rowId?}', 'ShopphingCartController@Tru_qty');
    Route::get('cong/{rowId?}', 'ShopphingCartController@Cong_qty');
    Route::get('thanh-toan', 'ShopphingCartController@ThanhToan')->middleware('checkdangnhap');
    Route::post('thanh-toan', 'ShopphingCartController@PostThanhToan')->middleware('checkdangnhap');
    Route::post('xac-nhan-tinh-trang', 'ShopphingCartController@xacnhantinhtrang')->middleware('checkdangnhap');
    Route::get('don-hang-cua-toi', 'HoaDonController@donhangcuatoi')->middleware('checkdangnhap');
    Route::get('don-hang-da-huy', 'HoaDonController@donhangdahuy')->middleware('checkdangnhap');
Route::post('cap-nhap-soluong', 'ShopphingCartController@capnhapsoluong');
    Route::get('huydon/{id?}', 'HoaDonController@huydon')->middleware('checkdangnhap');
});

Route::get('nhan-xet-cua-toi', 'BinhLuan_Controller@nhanxetcuatoi')->middleware('checkdangnhap');

Route::get('nhan-xet-cua-toi/xoa/{id?}', 'BinhLuan_Controller@xoa')->middleware('checkdangnhap');




Route::get('/home', 'HomeController@index')->name('home');
