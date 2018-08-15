    <link rel="icon" href="http://www.thuthuatweb.net/wp-content/themes/HostingSite/favicon.ico" type="image/x-ico"/>
     <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link href="css/tindang.css" rel="stylesheet" />
    

   
    <form name="fileupload" id="fileupload" method="post" class="tindang">
        <div class="w3-row">
            <h1>ĐĂNG TIN SẢN PHẨM TRÊN CHỢ NÔNG SẢN HỢP TÁC XÃ</h1>
        </div>
        <div class="w3-row khung">
            <div class="w3-row w3-col s6" style="border-right: 1px solid blue; padding-right: 2%;">
                <h2>Thông tin sản phẩm</h2>
                <div class="w3-row">
                    <input class="w3-input" type="text" name="tieude" id="tieude" placeholder="Nhập tiêu đề tin">
                </div>
                 <div class="w3-row">
                     <input class="w3-input" type="text" name="tieude" id="tieude" placeholder="Nhập mã sản phẩm">
                </div>
                <div class="w3-row">
                    <select class="w3-select" name="slloaisanpham" id="slloaisanpham">
                        <option value="0"><b>Chọn loại sản phẩm</b></option>
                    </select>
                </div>
                <div class="w3-row">
                    <input class="w3-input" type="text" name="soluong" id="soluong" placeholder="Số lượng cần bán">
                </div>
                <div class="w3-row">
                    <input class="w3-input" type="text" name="giale" id="giale" placeholder="Giá bán">
                </div>
                <div class="w3-row">
                    <input class="w3-input" type="text" name="donvi" id="donvi" placeholder="Đơn vị tính">
                </div>
                <div class="w3-row">
                    <input class="w3-input" type="text" name="phi" id="phi" placeholder="Phí vận chuyển">
                </div>
                <div class="w3-row">
                    <textarea class="w3-input" id="mota" name="mota" placeholder="Mô tả sản phẩm"></textarea>
                </div>
                <div class="w3-row">
                    <i>Chọn ảnh cho sản phẩm!</i>
                     <?php include("index_upl.php"); ?>
                </div>
            </div>
            <div class="w3-row w3-col s6" style="padding-left: 2%;">
                <h2>Thông tin người đăng</h2>
            </div>

         </div>
    </form>