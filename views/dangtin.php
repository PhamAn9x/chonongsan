
    <link rel="icon" href="http://www.thuthuatweb.net/wp-content/themes/HostingSite/favicon.ico" type="image/x-ico"/>
     <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link href="css/tindang.css" rel="stylesheet" />
    <div class="w3-teal w3-round" style=" height: 90px; margin-right:55px; padding-top: 10px; font-size: 25px">     ĐĂNG TIN SẢN PHẨM TRÊN HỢP TÁC XÃ<br>
        <i>Những thông tin có dấu (<span style="color: red;">*</span>) là những thông tin bắt buột</i>
    </div>
    <div class="wrapper" style="float: right; background: ; width: 884px; margin-right: 55px;">
        <form name="frdangtin" id="frdangtin" method="post">
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
            <table width="100%" class="row tindang" style="border: dotted 2px white; margin-top: 5px;">
                <tr>
                    <td  style="text-align: center; font-size: 20px; font-family: 'roboto'; color: green; font-weight: 600;">Tải lên hình ảnh sản phẩm</td>
                </tr>
            </table>
        </form>
    </div>