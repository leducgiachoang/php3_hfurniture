<?php

namespace App\Http\Controllers;
use App\Http\Requests\ThayDoiMatKhauRequest;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\DangKyRequest;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use App\NguoiDungModel;
use App\Http\Requests\DangNhapRequest;
use Illuminate\Support\Facades\Auth;
use App\VaiTro_Model;
use App\TinhTrang_Model;
use App\Http\Requests\Check_Sua_nguoi_dung;
use App\User;
use Carbon\Carbon;

class UserController extends Controller
{
    //FRONT-END nè
    public function GetDangNhap()
    {
        return view('userView.dang-nhap');
    }

    public function PostDangNhap(DangNhapRequest $request)
    {


        $email = $request->email;
        $password = $request->mat_khau;
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $nd = NguoiDungModel::where('email', $email)->get();
            foreach ($nd as $mm) {
                $tt = $mm->id_trang_thai;
            }
            if (($tt) != 1) {
                return view('userView.thong-bao-chua-kich-hoat');
            } else {
                if (isset($request->nho)) {
                    Auth::attempt(['email' => $email, 'password' => $password], $request->nho);
                } else {
                    Auth::attempt(['email' => $email, 'password' => $password]);
                }
                return redirect('/')->with('thongbao', 'Đăng nhập thành công');
            }
        } else {
            return redirect()->back()->with('thongbao', 'Vui lòng điền đúng Email và mật khẩu');
        }
    }

    public function GetDangXuat()
    {
        Auth::logout();
        return redirect('taikhoan/dang-nhap')->with('thongbao', 'Đăng xuất thành công !');
    }

    public function GetDangKy()
    {
        return view('userView.dang-ky');
    }
    public function PostDangKy(DangKyRequest $request)
    {
        $anhdaidien = $request->file('anhdaidien')->getClientOriginalName();
        $request->file('anhdaidien')->move('public/images/users/', $anhdaidien);
        $user = new NguoiDungModel;
        $user->HoTen = $request->hoten;
        $user->TenTK = $request->username;
        $user->password = bcrypt($request->matkhau);
        $user->email = $request->email;
        $user->SoDienThoai = $request->sodienthoai;
        $user->AnhDaiDien = $anhdaidien;
        $user->id_trang_thai = 2;
        $user->remember_token = $request->_token;
        $user->id_vai_tro = 2;
        $code = bcrypt(md5(time() . $request->email));
        $user->code = $code;
        $user->time_code = Carbon::now();

        $user->save();

        $url = route('post.link.kichhoattaikhoan', ['code' => $user->code, 'email' => $request->email]);
        $email = $request->email;
        $data = [
            'link' => $url
        ];
        Mail::send('mail.kich-hoat-nguoi-dung', $data, function ($message) use ($email) {
            $message->to($email, 'Kích hoạt tài khoản')->subject('Kích hoạt tài khoản');
        });

        return redirect('taikhoan/dang-nhap')->with('thongbao', 'Chúc mừng ! bạn đã đăng ký tài khoản thành công. Vui lòng kiểm tra Email để kích hoạt tài khoản của bạn !');
    }

    public function kichhoattaikhoan(Request $request)
    {
        $code = $request->code;
        $email = $request->email;
        $CheckNguoiDung =  NguoiDungModel::where([
            'code' => $code,
            'email' => $email
        ])->first();

        if (!$CheckNguoiDung) {
            return redirect('/')->with('thongbao', 'Xin lỗi ! Đường dẫn không đúng. Bạn vui lòng thử lại sau !');
        } else {
            $db = NguoiDungModel::where([
                'code' => $code,
                'email' => $email
            ])->get();
            foreach ($db as $dl) {
                $id = $dl->id;
                $hoten = $dl->HoTen;
                $tentk = $dl->TenTK;
                $password = $dl->password;
                $emailx = $dl->email;
                $sodienthoai = $dl->SoDienThoai;
                $anhdaidien = $dl->AnhDaiDien;
                $id_trang_thai = $dl->id_trang_thai;
                $remember_token = $dl->remember_token;
                $id_vai_tro  = $dl->id_vai_tro;
                $codex  = $dl->code;
                $time_code = $dl->time_code;
            }

            $nguoi = NguoiDungModel::where([
                'code' => $code,
                'email' => $email
            ])->update([
                'id' => $id,
                'HoTen' => $hoten,
                'TenTK' => $tentk,
                'password' => $password,
                'email' => $emailx,
                'SoDienThoai' => $sodienthoai,
                'AnhDaiDien' => $anhdaidien,
                'id_trang_thai' => 1,
                'remember_token' => $remember_token,
                'id_vai_tro' => $id_vai_tro,
                'code' => $codex,
                'time_code' => $time_code,
            ]);
            return redirect('taikhoan/dang-nhap')->with('thongbao', 'Chúc mừng tài khoản của bạn đã kích hoạt thành công! Mời bạn đăng nhập');
        }
    }

    public function GetQuenMatKhau()
    {
        return view('userView.quen-mat-khau');
    }

    public function PostQuenMatKhau(Request $request)
    {
        $email = $request->email;
        $CheckUser = NguoiDungModel::where('email', $email)->first();

        if (!$CheckUser) {
            return redirect()->back()->with('thongbao', 'Email này không tồn tại');
        }
        $code = bcrypt(md5(time() . $email));

        $CheckUser->code = $code;
        $CheckUser->time_code = Carbon::now();
        $CheckUser->save();

        $url = route('get.link.reset.password', ['code' => $CheckUser->code, 'email' => $email]);
        $data = [
            'route' => $url
        ];
        Mail::send('mail.dat-lai-mat-khau', $data, function ($message) use ($email) {
            $message->to($email, 'Reset Password')->subject(' Lấy lại mật khẩu');
        });

        return redirect()->back()->with('thongbaook', 'Link lấy lại mật khẩu được gửi vào email của bạn !');
    }

    public function GetDatLaiMatKhau(Request $request)
    {
        $code = $request->code;
        $email = $request->email;
        $CheckNguoiDung =  NguoiDungModel::where([
            'code' => $code,
            'email' => $email
        ])->first();

        if (!$CheckNguoiDung) {
            return redirect('/')->with('thongbao', 'Xin lỗi ! Đường dẫn lấy lại mật khẩu không đúng. Bạn vui lòng thử lại sau !');
        } else {
            return view('userView.lay-lai-mat-khau');
        }
    }

    public function PostDatLaiMatKhau(Request $request)
    {
        if ($request->matkhau) {
            $code = $request->code;
            $email = $request->email;

            $CheckNguoiDung =  NguoiDungModel::where([
                'code' => $code,
                'email' => $email
            ])->first();

            if (!$CheckNguoiDung) {
                return redirect('/')->with('thongbao', 'Xin lỗi ! Đường dẫn lấy lại mật khẩu không đúng. Bạn vui lòng thử lại sau !');
            } else {
                $CheckNguoiDung->password = bcrypt($request->matkhau);
                $CheckNguoiDung->save();
                return redirect('taikhoan/dang-nhap')->with('thongbao', 'Mật khẩu đổi thành công ! Mời bạn đăng nhập');
            }
        }
    }

    //Admin 

    public function GetThem()
    {
        $vaitro = VaiTro_Model::all();
        return view('admin.nguoi-dung.them', ['vaitro' => $vaitro]);
    }

    public function PostThem(DangKyRequest $request)
    {
        $anhdaidien = $request->file('anhdaidien')->getClientOriginalName();
        $token = $request->_token;
        $request->file('anhdaidien')->move('public/images/users/', $anhdaidien);
        $user = new  NguoiDungModel;
        $user->HoTen = $request->hoten;
        $user->TenTK = $request->username;
        $user->password = encrypt($request->matkhau);
        $user->email = $request->email;
        $user->SoDienThoai = $request->sodienthoai;
        $user->AnhDaiDien = $anhdaidien;
        $user->id_trang_thai = 1;
        $user->remember_token = $token;
        $user->id_vai_tro = $request->id_vai_tro;
        $user->save();

        return redirect('admin/nguoi-dung/danh-sach')->with('thongbao', 'Thêm người dùng thành công');
    }

    public function DanhSach()
    {
        $db = NguoiDungModel::Paginate(10);

        return view('admin.nguoi-dung.danh-sach', ['db' => $db]);
    }

    public function timkiem(Request $request)
    {
        $tukhoa = $request->tukhoa;
        $db = NguoiDungModel::where('HoTen','like',"%$tukhoa%")->orWhere('TenTK','like',"%$tukhoa%")->orWhere('email','like',"%$tukhoa%")->orWhere('SoDienThoai','like',"%$tukhoa%")->Paginate(10);
        return view('admin.nguoi-dung.danh-sach', ['db' => $db]);
    }

    public function xoa($id)
    {
        $db = NguoiDungModel::where('id', $id)->first();
        $id_vai_tro = $db->id_vai_tro;
        if($id_vai_tro == 1){
            return redirect()->back()->with('thongbao', 'Xóa Thất bại! Bạn không thể xóa Admin !');
        }else{
            NguoiDungModel::where('id', $id)->delete();
            return redirect()->back()->with('thongbao', 'Xóa người dùng thành công');
        }
        
    }

    public function GetSua($id)
    {
        $vaitro = VaiTro_Model::all();
        $db = NguoiDungModel::where('id', $id)->get();
        $trangthai = TinhTrang_Model::all();
        return view('admin.nguoi-dung.sua', ['db' => $db, 'vaitro' => $vaitro, 'trangthai' => $trangthai]);
    }

    public function PostSua(Check_Sua_nguoi_dung $request)
    {
        $anhdaidien = $request->anhdaidien;
        if (($request->file('anhdaidienx')) != '') {
            $anhdaidien = $request->file('anhdaidienx')->getClientOriginalName();
            $request->file('anhdaidienx')->move('public/images/users/', $anhdaidien);
        }


        NguoiDungModel::where('id', $request->id)->update([
            'HoTen' => $request->hoten,
            'TenTK' => $request->username,
            'password' => $request->matkhau,
            'email' => $request->email,
            'SoDienThoai' => $request->sodienthoai,
            'AnhDaiDien' => $anhdaidien,
            'id_trang_thai' => $request->id_trang_thai,
            'remember_token' => '',
            'id_vai_tro' => $request->id_vai_tro
        ]);

        return redirect()->back()->with('thongbao', 'Sửa người dùng ' . $request->hoten . ' Thành công');
    }

    public function PostOn(Request $request)
    {
        NguoiDungModel::where('id', $request->id)->update([
            'HoTen' => $request->hoten,
            'TenTK' => $request->username,
            'password' => $request->matkhau,
            'email' => $request->email,
            'SoDienThoai' => $request->sodienthoai,
            'AnhDaiDien' => $request->anhdaidien,
            'id_trang_thai' => $request->id_trang_thai,
            'remember_token' => '',
            'id_vai_tro' => $request->id_vai_tro
        ]);
        return redirect()->back();
    }

    public function thongbaochuakichhoat()
    {
        return view('userView.thong-bao-chua-kich-hoat');
    }

    public function thongtinnguoidung()
    {
        $id = Auth::user()->id;
        $dbNguoiDung = NguoiDungModel::where('id', $id)->get();
        return view('userView.thong-tin-nguoi-dung', ['dbnguoidung' => $dbNguoiDung]);
    }

    public function Editthongtinnguoidung(Request $request)
    {
        $id = $request->id;
        $hoten = $request->hoten;
        $tentk = $request->username;
        $matkhau = $request->matkhau;
        $email = $request->email;
        $sodiendien = $request->sodienthoai;
        $anhdaidien = $request->anhdaidien;
        if (($request->file('anhdaidienx')) != '') {
            $anhdaidien = $request->file('anhdaidienx')->getClientOriginalName();
            $request->file('anhdaidienx')->move('public/images/users/', $anhdaidien);
        }
        $id_trang_thai = $request->id_trang_thai;
        $id_vai_tro = $request->id_vai_tro;


        NguoiDungModel::where('id', $id)->update([
            'Hoten' => $hoten,
            'TenTK' => $tentk,
            'password' => $matkhau,
            'email' => $email,
            'SoDienThoai' => $sodiendien,
            'AnhDaiDien' => $anhdaidien,
            'id_trang_thai' => $id_trang_thai,
            'remember_token' => $request->_token,
            'id_vai_tro' => $id_vai_tro
        ]);

        return redirect()->back()->with('thongbao', 'Cập nhập tài khoản thành công');
    }

    public function GetThayDoiMatKhau()
    {
        $id = Auth::user()->id;
        $dbNguoiDung = NguoiDungModel::where('id', $id)->get();
        return view('userView.thay-doi-mat-khau', ['dbnguoidung' => $dbNguoiDung]);
    }

    public function PostThayDoiMatKhau(ThayDoiMatKhauRequest $request)
    {
        $email = $request->email;
        $matkhaucu = $request->matkhaucu;
        if (Auth::attempt(['email' => $email, 'password' => $matkhaucu])) {
            $id = $request->id;
            $hoten = $request->hoten;
            $tentk = $request->username;
            $matkhau = bcrypt( $request->matkhaumoi);
            $sodiendien = $request->sodienthoai;
            $anhdaidien = $request->anhdaidien;
            $id_trang_thai = $request->id_trang_thai;
            $id_vai_tro = $request->id_vai_tro;


            NguoiDungModel::where('id', $id)->update([
                'Hoten' => $hoten,
                'TenTK' => $tentk,
                'password' => $matkhau,
                'email' => $email,
                'SoDienThoai' => $sodiendien,
                'AnhDaiDien' => $anhdaidien,
                'id_trang_thai' => $id_trang_thai,
                'remember_token' => $request->_token,
                'id_vai_tro' => $id_vai_tro
            ]);

            return redirect()->back()->with('thongbao', 'Thay đổi mật khẩu thành công');
        } else {
            return redirect()->back()->with('thongbao', 'Mật khẩu cũ của bạn không đúng vui lòng nhập lại !');
        }
    }
}
