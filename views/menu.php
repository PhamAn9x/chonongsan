
<style type="text/css">
	ul {
   list-style:none;

}

.effects li {
    position:relative;
    float: left;
    width:150px;
    text-align:center;
    margin-top: -3%;
    padding-top:13px;
    padding-bottom:13px;
    color:black;
    margin-right:20px;
    border-radius:5px;
    background:transparent;
    border-bottom:1px solid #333;
    border-left:1px solid #000;
    border-right:1px solid #333;
    border-top:1px solid #000;
    cursor:pointer;
    border-color: red;
    margin-left: 1%;
    font-weight: 500;
    transition-duration: 0.5s;
}

li a{
	text-decoration: none;
	color: white;
}


.effects li:hover{
	background-color: #009688;
	color: white;
	border-color: #009688;
	transition-duration: 0.5s;
}
</style>

<ul class="effects">
    <?php
        if(isset($_SESSION['htx'])){
    ?>
    <a href="index.php?view=ql_tindang"><li>Quản lý tin đăng</li></a>
    <?php
        }
    ?>
   <a href="index.php?view=dh_dadat"><li>Đơn hàng đã đặt mua</li></a>
    <a href="index.php?view=tt_taikhoan"><li>Thông tin tài khoản</li></a>
    <a href="index.php?view=doimatkhau"><li>Đổi mật khẩu</li></a>
    <a href="?view=dangxuat"><li>Đăng xuất</li></a>
</ul>