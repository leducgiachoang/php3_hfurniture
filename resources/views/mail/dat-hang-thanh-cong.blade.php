<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .content {
            background-color: rgb(255, 255, 255);
            padding: 20px;
            color: black;
        }

        .text {
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            color: rgb(0, 0, 0);
        }

        .nut {
            text-decoration: none;
            color: white;
            background-color: rgb(248, 79, 18);
            padding: 15px 17px;
            border-radius: 7px;
            font-size: 20px;
        }
        a{
            text-decoration: none;
            font-weight: bold;
            color: blanchedalmond;
        }

    </style>
</head>

<body style="width: 800px;margin: -8px auto;border: 2px solid black;">
    <header style="background-color: black;padding: 15px;">
        <p style="text-align: center;"><img src="https://lh3.googleusercontent.com/BzZJ0eZ5OIDlPIPhgPn_9soqXYymq6qk8f3EViaYUf5-r8IogDqRIqeSwn9wfQ-U9K8QqVQh0gRMdgDOhVdChVtDPkdJ5goL7FC-8PSN4G9AxgrdNULJv_jfyJ1hJWAH-vW0Nomy9kEjuvuiWmgVPmDITJkG69MwIAVU5MQwYRcO3WodvnqgTlVkeSWLTagY24liNMSCmACLr8-OO4QDeD9rY9TvtDGS_SMIR8Nts_iyDN3iJsEn1fg6Rpppy23pVQS7OWFA_4WY20fyMiFvQkvT8npgJcW06zDjKT-2zdqDTKDpexzFE4XdAmAEvVwxKdMDszKl2ZJj8lHarJNKBhUrT7nOn5rCIZrf5fRDnS0mnQrV0dn-1eS8iI2w8odytNMOLXmGizyYFRMabao4L-b6pK6eJgxtrYQIeCRsK6_EvsfrXviS4eQdQ8ji3F0B3syaweEUIet8nxXA39HeuYC7HVu0E-OlTQIWDNOE5XbTdsb5VCbvUTxHdGPuTSqzmtBVh0Gj68KGk_19gdSZ8zY6h03QHG-p6BdnQvKD1VIU6ls340JO9qf7jJRo9R_cUaM0DV_H8GbrQQzkltIv9C4xorxY1KdbUWggfZTJCA_hDo6u88nNM90bXYqL7G-2yrmbRmRRUlDuQfMWM4_AxAFlx0ARx8-QN5dSvELPDbU99FUrlFBr4TrKY7yAAw=w246-h52-no?authuser=0" alt=""></p>
    </header>
    <div class="content">
        
        <div class="text">
            <h2 style="text-align: center;margin: 40px;">Cám ơn bạn đã đặt hàng tại H FURNITURE!</h2>
            <p style="font-size: 20px;">Xin chào {{ $hoten }}</p>
            <p style="font-size: 16px;">Cám ơn bạn đã tin tưởng H.Furiture!! <br><br>
                H.Furiture đã nhận được yêu cầu đặt hàng của bạn và đang xử lý nhé. Bạn sẽ nhận được thông báo tiếp theo
                khi đơn hàng đã sẵn sàng được giao.
            </p>
            <h2 style="text-align: center;margin: 40px;"><a class="nut" href="#">TÌNH TRẠNG ĐƠN HÀNG</a></h2>
            <p style="font-weight: bold;">**Một vài lưu nhỏ cho bạn:</p>
            <ul style="font-size: 16px;text-align: justify;">
                <li>Nếu đơn hàng của bạn được thực hiện theo hình thức "Mua theo nhóm", thì đơn hàng này chỉ có giá trị
                    khi tất cả các đơn đặt hàng trong nhóm của bạn đã được đặt thành công.</li>
                <li>Để đảm bảo bạn sẽ nhận đúng hàng, hãy chỉ nhận hàng khi đơn hàng được cập nhật trạng thái là Đang
                    giao hàng” nhé!</li>
                <li>Để đảm bảo an toàn và thuận tiện cho bạn trong mùa dịch, Lazada thực hiện giao hàng không tiếp xúc
                    bằng cách đặt kiện hàng ở vị trí thuận tiện đồng thời bạn có thể ký xác nhận để nhân viên chụp lại
                    từ khoảng cách an toàn. Nếu thanh toán bằng tiền mặt, bạn vui lòng chuẩn bị tiền đúng như giá trị
                    đơn hàng và gián tiếp đưa cho nhân viên như cách bạn nhận kiện hàng.</li>
                <li>Bạn nhớ mang khẩu trang khi nhận hàng và rửa tay sạch sau khi nhận hàng để giữ an toàn!</li>
            </ul>
            <hr style="border: 7px solid rgb(201, 2, 2);background-color: rgb(201, 2, 2)">

            <p style="font-size: 30px;"><i class="fa fa-map-marker" aria-hidden="true"></i> Đơn hàng được giao đến</p>
            <table style="margin: 20px;padding: 20px;font-size: 16px;">

                <tr>
                    <th style="padding: 5px;text-align: left;">Tên: </th>
                    <td style="padding: 5px;">{{ $hoten }}</td>
                </tr>

                <tr>
                    <th style="padding: 5px;text-align: left;">Địa chỉ nhà: </th>
                    <td style="padding: 5px;">{{ $noinhan }}</td>
                </tr>
                <tr>
                    <th style="padding: 5px;text-align: left;">Số điện thoại: </th>
                    <td style="padding: 5px;">{{ $sodienthoai }}</td>
                </tr>
                <tr>
                    <th style="padding: 5px;text-align: left;">Email: </th>
                    <td style="padding: 5px;">{{ $email }}</td>
                </tr>
            </table>

            <hr style="border: 7px solid rgb(201, 2, 2);background-color: rgb(201, 2, 2)">

            <table style="margin: 20px auto;border: 1px solid white;padding: 20px;border-radius: 7px;">
                <p style="font-size: 30px;"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Kiện hàng</p>
                @foreach ($product as $i)
                <tr>
                    <td style="padding: 5px;">
                    <img width="160px" src="public/images/sp/{{ $i->options->avatar }}" alt="">
                    </td>
                    <td style="padding: 5px;">
                        <p>{{ $i->name }}<br>
                            <strong style="color: red;">VND {{ number_format($i->price,0,',','.') }}</strong> <br>
                            Số lượng: {{ $i->qty }}
                        </p>
                    </td>
                </tr>
               @endforeach
            </table>

            <hr style="border: 7px solid rgb(201, 2, 2);background-color: rgb(201, 2, 2)">

            <table style="width: 100%;">
                <tr>
                    <th style="text-align: left;">Hình thức thanh toán:</th>
                    <th style="text-align: right;">Thanh toán khi nhận hàng</th>
                </tr>

                <tr>
                    <th style="text-align: left;">Tổng cộng:</th>
                    
                    <th style="text-align: right;">{{ $tonggia }} VND</th>
                </tr>
            </table>
        </div>
    </div>
    <header style="color: white;padding: 20px ;background-color: rgb(0, 0, 0);text-align: center;font-family: sans-serif;text-decoration: none;font-size: 16px;">
        <p>
            <strong>
                <a href="">Trung tâm hỗ trợ</a> |
                <a href="">Liên hệ</a>
            </strong> <br> <br>
            Công ty TNHH H.FURNITURE - Tầng 19, Tòa nhà Saigon Centre – Tháp 2, Số 67 Lê Lợi, Phường Bến Nghé,Quận 1,
            Tp. Hồ Chí Minh <br><br>
            <img src="https://lh3.googleusercontent.com/BzZJ0eZ5OIDlPIPhgPn_9soqXYymq6qk8f3EViaYUf5-r8IogDqRIqeSwn9wfQ-U9K8QqVQh0gRMdgDOhVdChVtDPkdJ5goL7FC-8PSN4G9AxgrdNULJv_jfyJ1hJWAH-vW0Nomy9kEjuvuiWmgVPmDITJkG69MwIAVU5MQwYRcO3WodvnqgTlVkeSWLTagY24liNMSCmACLr8-OO4QDeD9rY9TvtDGS_SMIR8Nts_iyDN3iJsEn1fg6Rpppy23pVQS7OWFA_4WY20fyMiFvQkvT8npgJcW06zDjKT-2zdqDTKDpexzFE4XdAmAEvVwxKdMDszKl2ZJj8lHarJNKBhUrT7nOn5rCIZrf5fRDnS0mnQrV0dn-1eS8iI2w8odytNMOLXmGizyYFRMabao4L-b6pK6eJgxtrYQIeCRsK6_EvsfrXviS4eQdQ8ji3F0B3syaweEUIet8nxXA39HeuYC7HVu0E-OlTQIWDNOE5XbTdsb5VCbvUTxHdGPuTSqzmtBVh0Gj68KGk_19gdSZ8zY6h03QHG-p6BdnQvKD1VIU6ls340JO9qf7jJRo9R_cUaM0DV_H8GbrQQzkltIv9C4xorxY1KdbUWggfZTJCA_hDo6u88nNM90bXYqL7G-2yrmbRmRRUlDuQfMWM4_AxAFlx0ARx8-QN5dSvELPDbU99FUrlFBr4TrKY7yAAw=w246-h52-no?authuser=0" alt=""> <br><br>
            Đây là thư tự động được tạo từ danh sách đăng ký của chúng tôi. Do đó, xin đừng trả lời thư này.

        </p>
    </header>
</body>

</html>


