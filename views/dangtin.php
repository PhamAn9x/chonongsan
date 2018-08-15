<div style="margin-left: 20%;">
   <body style="font-family: 'roboto';">
    <link rel="icon" href="http://www.thuthuatweb.net/wp-content/themes/HostingSite/favicon.ico" type="image/x-ico"/>
     <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link href="css/tindang.css" rel="stylesheet" />
    

    <div class="w3-teal w3-round" style=" height: 90px; width:100%; text-align: center; margin-right:40px; padding-top: 10px; font-size: 25px; margin-left: 10%; margin-top: 5%;">     ĐĂNG TIN SẢN PHẨM TRÊN CHỢ NÔNG SẢN HỢP TÁC XÃ<br>
        <i>Những thông tin có dấu (<span style="color: red;">*</span>) là những thông tin bắt buột</i>
    </div>
    <div class="wrapper" style="float: right; background: ; width: 1366px; margin-right: 0px; padding-left: 75%; margin-left: 45%;">
        <form name="fileupload" id="fileupload" method="post">
            <table >
                <tr>
                    <td colspan="2">
                        <div class="w3-green" style="margin-top: 15px; font-size: 19px; font-weight: 700; height: 50px; padding: 10px; border-radius: 5px 5px 0px 0px;">Thông tin về sản phẩm (tin đăng)</div>
                    </td>
                </tr>
            </table>
            <table class="tindang" width="100%"; >
                <tr>
                    <td>Tiêu đề tin (<span>*</span>): </td>
                    <td><input class="w3-input" type="text" name="tieude" id="tieude" placeholder="Nhập tiêu đề tin"></td>
                </tr>
                 <tr>
                    <td>Mã sản phẩm:</td>
                    <td><input class="w3-input" type="text" name="tieude" id="tieude" placeholder="Nhập mã sản phẩm"></td>
                </tr>
                <tr>
                    <td>Loại sản phẩm:</td>
                    <td>
                        <select class="w3-select" name="slloaisanpham" id="slloaisanpham">
                            <option value="0"><b>Chọn loại sản phẩm</b></option>
                        </select>
                    </td>
                <tr>
                    <td>Số lượng cần bán:</td>
                    <td><input class="w3-input" type="text" name="soluong" id="soluong" placeholder="VD : 1000"></td>
                </tr>
                 <tr>
                    <td>Giá bán:</td>
                    <td><input class="w3-input" type="text" name="giale" id="giale" placeholder="VD : 100.000"></td>
                </tr>
                 <tr>
                    <td>Đơn vị tính:</td>
                    <td><input class="w3-input" type="text" name="donvi" id="donvi" placeholder="VD : Con,Kg,..."></td>
                </tr>
                <tr>
                    <td>Phí vận chyển:</td>
                    <td><input class="w3-input" type="text" name="phi" id="phi" placeholder="Phí vận chuyển"></td>
                </tr>
                <tr>
                    <td>Mô tả:</td>
                    <td><textarea id="mota" name="mota"></textarea></td>
                </tr>
            </table >
         <div>
            <?php include("index_upload_img.html"); ?>
            </div>
              <table >
                <tr>
                    <td colspan="2">
                        <div class="w3-green" style="margin-top: 15px; font-size: 19px; font-weight: 700; height: 50px; padding: 10px; border-radius: 5px 5px 0px 0px;">Thông tin về người bán nông sản</div>
                    </td>
                </tr>
            </table>
            <div class="w3-col s7">
            <table class="tindang" width="90%"; >
                <tr>
                    <td>Họ và tên(<span>*</span>): </td>
                    <td><input class="w3-input" type="text" name="hoten" id="hoten" placeholder="Nhập họ và tên"></td>
                </tr>
                 <tr>
                     <td>Số điện thoại(<span>*</span>): </td>
                    <td><input class="w3-input" type="text" name="sodienthoai" id="sodienthoai" placeholder="Nhập số điện thoại"></td>
                </tr>
                <tr>
                    <td>Facebook:</td>
                    <td>
                        <input  class="w3-input" type="text" name="facebook" id="facebook" placeholder="Nhập Facebook">
                    </td>
                </tr>
                <tr>
                    <td>Skype</td>
                    <td><input class="w3-input" type="text" name="skype" id="skype" placeholder="Nhập Skype"></td>
                </tr>
                <tr>
                    <td>Tỉnh/Thành phố <span>*</span>:</td>
                    <td>
                        <select class="w3-select" name="sltinh" id="sltinh">
                            <option value="0"> Chọn tỉnh</option>
                        </select>
                    </td>
                </tr>
                <tr>
                     <td>Quận/Huyện <span>*</span>:</td>
                    <td>
                        <select class="w3-select" name="slhuyen" id="slhuyen">
                            <option value="0"> Chọn huyện</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Phường/Xã <span>*</span>:</td>
                    <td>
                        <select class="w3-select" name="slxa" id="slxa">
                            <option value="0"> Chọn xã</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Địa chỉ chi tiết:</td>
                    <td><input class="w3-input" type="text" name="diachi" id="diachi" placeholder="Nhập địa chỉ chi tiết"></td>
                </tr>
                <tr>
                    <td>Ngày hết hạn:</td>
                    <td><input class="w3-input" type="date" name="ngayhethan" id="ngayhethan" value="2017-06-01"></td>
                </tr>
                <tr>
                    
                    <td>Mã xác thực <span>*</span>:</td>
                    <td>
                        <span id="xacthuc">
                        <script>
                         function getRndInteger(min, max) {
                           return Math.floor(Math.random() * (max - min)) + min;
                                     }
                                 $( document ).ready(function() {
                              document.getElementById('xacthuc').innerHTML = getRndInteger(100000, 999999);
                                    });
       
                             </script>
                         </span>
                         <img src="logo_image/reload.png" width="20px" height="20px" onclick="document.getElementById('xacthuc').innerHTML = getRndInteger(100000, 999999);">
                         <input style="width:190px; " type="text" name="ipxacthuc" id="ipxacthuc" placeholder="Nhập mã xác thực">
                         
                     </td>
                </tr>
                <tr>
                    <td style="text-align: right;"><input type="checkbox" name="dieukhoan" id="dieukhoan"></td>
                    <td style="font-size: 17px;"><i>Tôi đồng ý với tất cả những điều khoản của <a href="#"><b>Chợ nông sản hợp tác xã</b></a></i></td>
                </tr>

            </table >
        </div>
        <div class="w3-col s5">
            <?php include("vendor/maps/index.html"); ?>
        </div>
        <div class="w3-col s12">
            <button class="w3-btn w3-large w3-blue w3-round" style="width: 200px; margin: 30px;">Đăng tin</button>
            <button class="w3-btn w3-large w3-black w3-round" style="width: 200px; margin: 30px;">Xem trước</button>
        </div>
     </form>
    </body>
    </div>