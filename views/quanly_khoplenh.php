    <?php 
    if(isset($_SESSION['sdt'])){
        ?>
        <!--     <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link href="css/tindang.css" rel="stylesheet" />
        <link type="text/css" href="css/css_ck.css"/>
        <script type="text/javascript" src="ajax/ajax_tinhthanh.js"></script>
        <script type="text/javascript" src="ajax/ajax_loaisp.js"></script>
        <script type="text/javascript" src="ajax/ajax_check_sdt.js"></script>
        <script type="text/javascript" src="js/check_dangtin.js"></script>
        <script src='https://www.google.com/recaptcha/api.js'></script>
        <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
        <div id = "alert"></div>
        <?php
        include("config/connect.php");
        ?>
        <form name="qldangtin" id="qldangtin" method="post" class="tindang">
            <div class="w3-row khung">
                <div class="w3-row">
                    <h1>QUẢN LÝ ĐƠN HÀNG (KHỚP LỆNH)</h1>
                    <hr style="border: 2px;">
                </div>
                <style type="text/css">
                .tb tr td{
                    text-align: center;
                    font-size: 16px;
                    font-family: 'roboto'; 
                    vertical-align: middle;
                }
            </style>
            <div class="w3-col s12 w3-white w3-round">
             <div class="w3-col s5" style="margin-bottom: 2%;">
                <input style="width: 50%; float: left; margin-right: 3%;" class="w3-input" type="text" name="iptimkiem" id="ip" placeholder="Nhập tên sản phẩm để tìm">
                <input type="button" id="timkiem" style="float: left; width: 30%;" class="w3-button w3-green w3-hover-red w3-round" value="Tìm kiếm" />
            </div>
            <div class="w3-col s7 w3-right" style="padding-left: 34%;">
                Sắp xếp theo :
                <select id="sls" class="w3-select" style="width: 50%;">
                    <option value="all">Tất cả</option>
                    <option value="<?php echo '0'.$_SESSION['sdt']; ?>">Mua</option>
                    <option value="<?php echo '1'.$_SESSION['sdt']; ?>">Bán</option>
                </select>
            </div>
            <div id="output">
                <table class="w3-table-all w3-hoverable w3-large tb">
                    <tr class="w3-green w3-center" style="font-size: 20px;">
                        <td>STT</td>
                        <td>Loại khớp lệnh</td>
                        <td>Mã sản phẩm</td>
                        <td>Tên sản phẩm</td>
                        <td>Giá sản phẩm</td>
                        <td>Số lượng</td>
                        <td>Giá trị lô hàng</td>
                        <td>Trạng thái xử lý</td>
                        <td>Trạng thái giao/nhận</td>
                        <td>Người bán/Người mua</td>

                    </tr>
                    <?php 
                    $load = 1;
                    $load1 = 1;
                    $i=0;
                    include('config/connect.php');
                    $sdt = $_SESSION['sdt'];
                    $sql = "SELECT * FROM KHOPLENH WHERE KL_SDT_BAN = '$sdt' AND KL_TRANGTHAI < 2 GROUP BY KL_SDT_MUA";
                    mysqli_set_charset($conn,'UTF8');
                    $rs = mysqli_query($conn,$sql);
                    if(mysqli_num_rows($rs)<1){
                       $load = 0;
                    } else
                    foreach ($rs as $value) {
                        $sdtmua = $value['KL_SDT_MUA'];
                        $i++;
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>

                            <td ><?php
                            if($value['KL_SDT_MUA'] == $sdt) echo "Mua";
                            else echo "Bán";
                            ?></td>
                            <td>
                                 <?php 
                                 mysqli_set_charset($conn,"UTF8");
                                $rs1 = mysqli_query($conn,"SELECT * FROM KHOPLENH WHERE KL_SDT_BAN = '$sdt' AND KL_SDT_MUA = '$sdtmua' AND KL_TRANGTHAI < 2");
                                foreach ($rs1 as $value1) {
                                    ?>
                                <?php echo $value1['KL_SP_ID']."<br />-------<br />"; }?>
                                    
                            </td>
                            <td>
                                <?php 
                                $rs1 = mysqli_query($conn,"SELECT * FROM KHOPLENH WHERE KL_SDT_BAN = '$sdt' AND KL_SDT_MUA = '$sdtmua' AND KL_TRANGTHAI < 2");
                                foreach ($rs1 as $value1) {
                                    ?>
                                <?php echo $value1['KL_SP_TEN']."<br />-------------------------<br />"; }?>
                                    
                            </td>
                            <td>
                                <?php 
                                $rs1 = mysqli_query($conn,"SELECT * FROM KHOPLENH WHERE KL_SDT_BAN = '$sdt' AND KL_SDT_MUA = '$sdtmua' AND KL_TRANGTHAI < 2");
                                foreach ($rs1 as $value1) {
                                    ?>
                                <?php echo adddotstring($value1['KL_GIA'])."<br />-----------<br />"; }?>
                                    
                            </td>
                            <td>
                                <?php 
                                $rs1 = mysqli_query($conn,"SELECT * FROM KHOPLENH WHERE KL_SDT_BAN = '$sdt' AND KL_SDT_MUA = '$sdtmua' AND KL_TRANGTHAI < 2");
                                foreach ($rs1 as $value1) {
                                    ?>
                                <?php echo $value1['KL_SOLUONG']."<br />-------<br />"; }?>
                                    
                            </td>
                            <td>
                                <?php 
                                $rs1 = mysqli_query($conn,"SELECT * FROM KHOPLENH WHERE KL_SDT_BAN = '$sdt' AND KL_SDT_MUA = '$sdtmua' AND KL_TRANGTHAI < 2");
                                $tong =0;
                                foreach ($rs1 as $value1) {
                                    $tong += $value1['KL_GIA']*$value1['KL_SOLUONG'];
                                }
                                    ?>
                                    <?php echo adddotstring($tong)." VNĐ"; ?>
                                
                            </td>

                            <td>


                                <?php 
                                if($value['KL_TRANGTHAI']==0 && $value['KL_SDT_MUA'] == $sdt){
                                    ?>
                                   <span style="color: red;">Người bán <br />chưa xử lý đơn hàng </span>
                                    <?php
                                }
                                else{
                                    if($value['KL_TRANGTHAI']==1 && $value['KL_SDT_MUA'] == $sdt){
                                        ?>
                                    <span class="out" style="color: blue;">Đang giao hàng! </span>
                                    <?php
                                }                                
                                }
                                
                                ?>

                                <?php
                                if($value['KL_TRANGTHAI']==0 && $value['KL_SDT_BAN'] == $sdt){
                                    ?>
                                   <span style="color: red;">Đơn hàng <br />đang chờ xử lý </span>
                                    <?php
                                }
                                 if($value['KL_TRANGTHAI']==1 && $value['KL_SDT_BAN'] == $sdt){
                                    ?>
                                   <span style="color: red;"> Đã xử lý </span>
                                    <?php
                                }
                                if($value['KL_TRANGTHAI']==2 && $value['KL_SDT_BAN'] == $sdt){
                                    ?>
                                   <span style="color: blue;"> Xử lý xong </span>
                                    <?php
                                }
                                if($value['KL_TRANGTHAI']==2 && $value['KL_SDT_MUA'] == $sdt){
                                    ?>
                                   <span style="color: blue;"> Xử lý xong </span>
                                    <?php
                                }
                                ?>


                            </td>
                            <td>
                                <?php
                                if($value['KL_TRANGTHAI'] == 1 && $value['KL_SDT_MUA'] == $sdt){
                                    ?>
                                    <input type="button" id="nhanhang" class="w3-btn w3-red w3-hover-white w3-round" value="Nhận hàng" />
                                    <?php
                                }
                                if($value['KL_TRANGTHAI'] == 2 && $value['KL_SDT_MUA'] == $sdt){
                                    ?>
                                   <span id="output-nhan" style="color: red;">Đã nhận hàng!</span>
                                    <?php
                                }
                                if($value['KL_TRANGTHAI']==1 && $value['KL_SDT_BAN'] == $sdt){
                                    ?>
                                   <span class="out" style="color: blue;"> Đang giao hàng!</span>
                                    <?php
                                }
                                if($value['KL_TRANGTHAI']==2 && $value['KL_SDT_BAN'] == $sdt){
                                    ?>
                                   <span style="color: red;"> Giao hàng thành công!</span>
                                    <?php
                                }
                                ?>
                                <?php
                                if($value['KL_TRANGTHAI']==0 && $value['KL_SDT_BAN'] == $sdt){
                                    ?>
                                    <a style="color: white;" href="index.php?view=xulydonhang&ma=<?php echo $value['KL_ID'].'&so='.$value['KL_SDT_MUA']; ?>"><input type="button" class="w3-btn w3-red w3-hover-blue w3-round" value='Chi tiết đơn hàng'/>
                                        </a>
                                    <?php
                                }
                                ?>
                            </td>
                            <td>
                               <?php

                               if($value['KL_SDT_MUA'] == $sdt)
                               {
                                $sdtb = $value['KL_SDT_BAN'];
                                $rs = mysqli_fetch_row(mysqli_query($conn,"SELECT USR_HO,USR_TEN FROM USER WHERE USR_SDT = '$sdtb'"));
                                echo $sdtb."<br />";
                                 echo "-------------<br />";
                                echo $rs[0]." ".$rs[1];
                            }
                            else {
                                $sdtm = $value['KL_SDT_MUA'];
                                $rs = mysqli_fetch_row(mysqli_query($conn,"SELECT USR_HO,USR_TEN FROM USER WHERE USR_SDT = '$sdtm'"));
                                echo $sdtm."<br />";
                                echo "-------------<br />";
                                echo $rs[0]." ".$rs[1];
                            }
                            ?>
                        </td>
                    </tr>

                    <script type="text/javascript">
                        $(document).ready(function(){
                            $("#delete<?php echo $value['SP_ID']; ?>").click(function(){
                                var id = <?php echo $value['SP_ID']; ?>;
                                if(confirm('Bạn có chắc muốn xóa sản phẩm này?')){
                                 $.post("process_ajax/xoa_sanpham.php", {key: id}, function(data){
                                    $("#alert").html(data);
                                });
                             }
                         });
                        });
                    </script>

                    <?php
                }
                ?>

                    
                 <?php 
                    include('config/connect.php');
                    $sdt = $_SESSION['sdt'];
                    $sql = "SELECT * FROM KHOPLENH WHERE KL_SDT_MUA = '$sdt' AND KL_TRANGTHAI < 2 GROUP BY KL_SDT_BAN";
                    mysqli_set_charset($conn,'UTF8');
                    $rs = mysqli_query($conn,$sql);
                    if(mysqli_num_rows($rs)<1){
                        $load1 = 0;
                    } else
                    foreach ($rs as $value) {
                        $i++;
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>

                            <td ><?php
                            if($value['KL_SDT_MUA'] == $sdt) echo "Mua";
                            else echo "Bán";
                            ?></td>
                             <td>
                                 <?php 
                                $rs1 = mysqli_query($conn,"SELECT * FROM KHOPLENH WHERE KL_SDT_MUA = '$sdt' AND KL_TRANGTHAI < 2");
                                foreach ($rs1 as $value1) {
                                    ?>
                                <?php echo $value1['KL_SP_ID']."<br />-------<br />"; }?>
                                    
                            </td>
                            <td>
                                <?php 
                                mysqli_set_charset($conn,"UTF8");
                                $rs1 = mysqli_query($conn,"SELECT * FROM KHOPLENH WHERE KL_SDT_MUA = '$sdt' AND KL_TRANGTHAI < 2");
                                foreach ($rs1 as $value1) {
                                    ?>
                                <?php echo $value1['KL_SP_TEN']."<br />-------------------------<br />"; }?>
                                    
                            </td>
                            <td>
                                <?php 
                                $rs1 = mysqli_query($conn,"SELECT * FROM KHOPLENH WHERE KL_SDT_MUA = '$sdt' AND KL_TRANGTHAI < 2");
                                foreach ($rs1 as $value1) {
                                    ?>
                                <?php echo adddotstring($value1['KL_GIA'])."<br />-----------<br />"; }?>
                                    
                            </td>
                            <td>
                                <?php 
                                $rs1 = mysqli_query($conn,"SELECT * FROM KHOPLENH WHERE KL_SDT_MUA = '$sdt' AND KL_TRANGTHAI < 2");
                                foreach ($rs1 as $value1) {
                                    ?>
                                <?php echo $value1['KL_SOLUONG']."<br />-------<br />"; }?>
                                    
                            </td>
                            <td>
                                <?php 
                                $rs1 = mysqli_query($conn,"SELECT * FROM KHOPLENH WHERE KL_SDT_MUA = '$sdt' AND KL_TRANGTHAI < 2");
                                $tong =0;
                                foreach ($rs1 as $value1) {
                                    $tong += $value1['KL_GIA']*$value1['KL_SOLUONG'];
                                }
                                    ?>
                                    <?php echo adddotstring($tong)." VNĐ"; ?>
                                
                            </td>
                            <td>
                                <?php 
                                if($value['KL_TRANGTHAI']==0 && $value['KL_SDT_MUA'] == $sdt){
                                    ?>
                                   <span style="color: red;">Người bán <br />chưa xử lý đơn hàng </span>
                                    <?php
                                }
                                else{
                                    if($value['KL_TRANGTHAI']==1 && $value['KL_SDT_MUA'] == $sdt){
                                        ?>
                                    <span class="out" style="color: blue;">Đang giao hàng! </span>
                                    <?php
                                }                                
                                }
                                
                                ?>

                                <?php
                                if($value['KL_TRANGTHAI']==0 && $value['KL_SDT_BAN'] == $sdt){
                                    ?>
                                   <span style="color: red;">Đơn hàng <br />đang chờ xử lý </span>
                                    <?php
                                }
                                 if($value['KL_TRANGTHAI']==1 && $value['KL_SDT_BAN'] == $sdt){
                                    ?>
                                   <span style="color: red;"> Đã xử lý </span>
                                    <?php
                                }
                                if($value['KL_TRANGTHAI']==2 && $value['KL_SDT_BAN'] == $sdt){
                                    ?>
                                   <span style="color: blue;"> Xử lý xong </span>
                                    <?php
                                }
                                if($value['KL_TRANGTHAI']==2 && $value['KL_SDT_MUA'] == $sdt){
                                    ?>
                                   <span style="color: blue;"> Xử lý xong </span>
                                    <?php
                                }
                                ?>


                            </td>
                            <td>
                                <?php
                                if($value['KL_TRANGTHAI'] == 1 && $value['KL_SDT_MUA'] == $sdt){
                                    ?>
                                    <input type="button" id="nhanhang" class="w3-btn w3-red w3-hover-white w3-round" value="Nhận hàng" />
                                    <?php
                                }
                                if($value['KL_TRANGTHAI'] == 2 && $value['KL_SDT_MUA'] == $sdt){
                                    ?>
                                   <span id="output-nhan" style="color: red;">Đã nhận hàng!</span>
                                    <?php
                                }
                                if($value['KL_TRANGTHAI']==1 && $value['KL_SDT_BAN'] == $sdt){
                                    ?>
                                   <span class="out" style="color: blue;"> Đang giao hàng!</span>
                                    <?php
                                }
                                if($value['KL_TRANGTHAI']==2 && $value['KL_SDT_BAN'] == $sdt){
                                    ?>
                                   <span style="color: red;"> Giao hàng thành công!</span>
                                    <?php
                                }
                                ?>
                                <?php
                                if($value['KL_TRANGTHAI']==0 && $value['KL_SDT_BAN'] == $sdt){
                                    ?>
                                    <a style="color: white;" href="index.php?view=xulydonhang&ma=<?php echo $value['KL_ID'].'&so='.$value['KL_SDT_MUA']; ?>"><input type="button" class="w3-btn w3-red w3-hover-blue w3-round" value='Chi tiết đơn hàng'/>
                                        </a>
                                    <?php
                                }
                                ?>
                            </td>
                            <td>
                               <?php

                               if($value['KL_SDT_MUA'] == $sdt)
                               {
                                $sdtb = $value['KL_SDT_BAN'];
                                $rs = mysqli_fetch_row(mysqli_query($conn,"SELECT USR_HO,USR_TEN FROM USER WHERE USR_SDT = '$sdtb'"));
                                echo $sdtb."<br />";
                                 echo "-------------<br />";
                                echo $rs[0]." ".$rs[1];
                            }
                            else {
                                $sdtm = $value['KL_SDT_MUA'];
                                $rs = mysqli_fetch_row(mysqli_query($conn,"SELECT USR_HO,USR_TEN FROM USER WHERE USR_SDT = '$sdtm'"));
                                echo $sdtm."<br />";
                                echo "-------------<br />";
                                echo $rs[0]." ".$rs[1];
                            }
                            ?>
                        </td>
                    </tr>

                    <script type="text/javascript">
                        $(document).ready(function(){
                            $("#delete<?php echo $value['SP_ID']; ?>").click(function(){
                                var id = <?php echo $value['SP_ID']; ?>;
                                if(confirm('Bạn có chắc muốn xóa sản phẩm này?')){
                                 $.post("process_ajax/xoa_sanpham.php", {key: id}, function(data){
                                    $("#alert").html(data);
                                });
                             }
                         });
                        });
                    </script>

                    <?php
                    $i++;
                }
                if($load == 0 && $load1 == 0){
                    ?>
                    <tr>
                            <td colspan="9"> <i> Không có dữ liệu!</i></td>
                        </tr>
                    <?php
                }
                ?>


                
            </table>
        </div>
    </div>
</form>

<?php 
} else 
{
    echo "<script>alert('Vui lòng đăng nhập trước khi kiểm tra sản phẩm!');</script>";
    echo '<meta http-equiv="Refresh" content="0,URL=index.php?view=dangnhap" />';
}
?>
<script type="text/javascript">
    $(document).ready(function(){
       $("#timkiem").click(function(){
        var key = $("#ip").val();
        var keys = $("#sls").val();
        $.post("process_ajax/xuly_timkiem_khoplenh.php", {tukhoa: key, loc: keys}, function(data){
            $("#output").html(data);
        });
    });
       $("#sls").change(function(){
        var keys = $("#sls").val();
        var key = $("#ip").val();
        $.post("process_ajax/xuly_timkiem_khoplenh.php", {loc: keys, tukhoa: key}, function(data){
            $("#output").html(data);
        });
    });


        $("#nhanhang").click(function(){
         var sdtb = '<?php echo $sdtb;?>';
        
        $.post("process_ajax/xuly_nhanhang.php", {key: sdtb}, function(data){
            $(".out").html(data);
        });
        alert('daposst');
    });


   });
</script>