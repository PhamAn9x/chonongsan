<?php
    function adddotstring($strNum) {

        $len = strlen($strNum);
        $counter = 3;
        $result = "";
        while ($len - $counter >= 0)
        {
            $con = substr($strNum, $len - $counter , 3);
            $result = '.'.$con.$result;
            $counter+= 3;
        }
        $con = substr($strNum, 0 , 3 - ($counter - $len) );
        $result = $con.$result;
        if(substr($result,0,1)=='.'){
            $result=substr($result,1,$len+1);   
        }
        return $result;
}
?>

<?php
	include("../config/connect.php");
	session_start();
	if(isset($_POST['tukhoa'])){
        $load = 1;
        $load1 = 1;
		$key = $_POST['tukhoa'];
        $loc = $_POST['loc'];
        if($loc == "0".$_SESSION['sdt']){
		?>
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
                    $sdt = $_SESSION['sdt'];
                    $sql = "SELECT * FROM KHOPLENH WHERE KL_SDT_MUA = '$sdt' GROUP BY KL_SDT_BAN";
                    mysqli_set_charset($conn,'UTF8');
                    $rs = mysqli_query($conn,$sql);
                    if(mysqli_num_rows($rs)<1){
                       $load = 0;
                    } else
                    foreach ($rs as $value) {
                        $sdtban = $value['KL_SDT_BAN'];
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
                                $rs1 = mysqli_query($conn,"SELECT * FROM KHOPLENH WHERE KL_SDT_BAN = '$sdtban' AND KL_SDT_MUA = '$sdt' AND KL_TRANGTHAI < 2");
                                foreach ($rs1 as $value1) {
                                    ?>
                                <?php echo $value1['KL_SP_ID']."<br />-------<br />"; }?>
                                    
                            </td>
                            <td>
                                <?php 
                                $rs1 = mysqli_query($conn,"SELECT * FROM KHOPLENH WHERE KL_SDT_BAN = '$sdtban' AND KL_SDT_MUA = '$sdt' AND KL_TRANGTHAI < 2");
                                foreach ($rs1 as $value1) {
                                    ?>
                                <?php echo $value1['KL_SP_TEN']."<br />-------------------------<br />"; }?>
                                    
                            </td>
                            <td>
                                <?php 
                                $rs1 = mysqli_query($conn,"SELECT * FROM KHOPLENH WHERE KL_SDT_BAN = '$sdtban' AND KL_SDT_MUA = '$sdt' AND KL_TRANGTHAI < 2");
                                foreach ($rs1 as $value1) {
                                    ?>
                                <?php echo adddotstring($value1['KL_GIA'])."<br />-----------<br />"; }?>
                                    
                            </td>
                            <td>
                                <?php 
                                $rs1 = mysqli_query($conn,"SELECT * FROM KHOPLENH WHERE KL_SDT_BAN = '$sdtban' AND KL_SDT_MUA = '$sdt' AND KL_TRANGTHAI < 2");
                                foreach ($rs1 as $value1) {
                                    ?>
                                <?php echo $value1['KL_SOLUONG']."<br />-------<br />"; }?>
                                    
                            </td>
                            <td>
                                <?php 
                                $rs1 = mysqli_query($conn,"SELECT * FROM KHOPLENH WHERE KL_SDT_BAN = '$sdtban' AND KL_SDT_MUA = '$sdt' AND KL_TRANGTHAI < 2");
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
                                   <span style="color: red;">Đang chờ  <br />chốt đơn hàng </span>
                                    <?php
                                }
                                else{
                                    if($value['KL_TRANGTHAI']==1 && $value['KL_SDT_MUA'] == $sdt){
                                        ?>
                                    <span class="out" style="color: blue;">Chờ người bán  </span>
                                    <?php
                                }                                
                                }
                                
                                ?>

                                <?php
                                if($value['KL_TRANGTHAI']==0 && $value['KL_SDT_BAN'] == $sdt){
                                    ?>
                                   <span style="color: red;">Đơn hàng <br />đang chờ người mua xử lý </span>
                                    <?php
                                }
                                 if($value['KL_TRANGTHAI']==1 && $value['KL_SDT_BAN'] == $sdt){
                                    ?>
                                   <span style="color: red;"> Người mua dã xử lý </span>
                                    <?php
                                }
                                ?>


                            </td>
                            <td>
                                <?php
                                if($value['KL_TRANGTHAI']==0 && $value['KL_SDT_MUA'] == $sdt){
                                    ?>
                                    <a style="color: white;" href="index.php?view=xulydonhang&ma=<?php echo $value['KL_ID'].'&so='.$value['KL_SDT_BAN']; ?>"><input type="button" class="w3-btn w3-red w3-hover-blue w3-round" value='Chốt đơn hàng'/>
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
</table>


		<?php
    } else 
        if($loc == "1".$_SESSION['sdt']){
        ?>

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
                    $sdt = $_SESSION['sdt'];
                    $sql = "SELECT * FROM KHOPLENH WHERE KL_SDT_BAN = '$sdt' GROUP BY KL_SDT_MUA";
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
                                   <span style="color: red;">Đang chờ  <br />chốt đơn hàng </span>
                                    <?php
                                }
                                else{
                                    if($value['KL_TRANGTHAI']==1 && $value['KL_SDT_MUA'] == $sdt){
                                        ?>
                                    <span class="out" style="color: blue;">Chờ người bán  </span>
                                    <?php
                                }                                
                                }
                                
                                ?>

                                <?php
                                if($value['KL_TRANGTHAI']==0 && $value['KL_SDT_BAN'] == $sdt){
                                    ?>
                                   <span style="color: red;">Đơn hàng <br />đang chờ người mua xử lý </span>
                                    <?php
                                }
                                 if($value['KL_TRANGTHAI']==1 && $value['KL_SDT_BAN'] == $sdt){
                                    ?>
                                   <span style="color: red;"> Người mua dã xử lý </span>
                                    <?php
                                }
                                ?>


                            </td>
                            <td>
                                <?php
                                if($value['KL_TRANGTHAI']==0 && $value['KL_SDT_MUA'] == $sdt){
                                    ?>
                                    <a style="color: white;" href="index.php?view=xulydonhang&ma=<?php echo $value['KL_ID'].'&so='.$value['KL_SDT_BAN']; ?>"><input type="button" class="w3-btn w3-red w3-hover-blue w3-round" value='Chốt đơn hàng'/>
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
</table>
            
        <?php
    }
    else{
?>
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
                    include('../config/connect.php');
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
                                   <span style="color: red;">Đang chờ  <br />chốt đơn hàng </span>
                                    <?php
                                }
                                else{
                                    if($value['KL_TRANGTHAI']==1 && $value['KL_SDT_MUA'] == $sdt){
                                        ?>
                                    <span class="out" style="color: blue;">Chờ người bán  </span>
                                    <?php
                                }                                
                                }
                                
                                ?>

                                <?php
                                if($value['KL_TRANGTHAI']==0 && $value['KL_SDT_BAN'] == $sdt){
                                    ?>
                                   <span style="color: red;">Đơn hàng <br />đang chờ người mua xử lý </span>
                                    <?php
                                }
                                 if($value['KL_TRANGTHAI']==1 && $value['KL_SDT_BAN'] == $sdt){
                                    ?>
                                   <span style="color: red;"> Người mua dã xử lý </span>
                                    <?php
                                }
                                ?>


                            </td>
                            <td>
                                <?php
                                if($value['KL_TRANGTHAI']==0 && $value['KL_SDT_MUA'] == $sdt){
                                    ?>
                                    <a style="color: white;" href="index.php?view=xulydonhang&ma=<?php echo $value['KL_ID'].'&so='.$value['KL_SDT_BAN']; ?>"><input type="button" class="w3-btn w3-red w3-hover-blue w3-round" value='Chốt đơn hàng'/>
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
                                   <span style="color: red;">Đang chờ  <br />chốt đơn hàng </span>
                                    <?php
                                }
                                else{
                                    if($value['KL_TRANGTHAI']==1 && $value['KL_SDT_MUA'] == $sdt){
                                        ?>
                                    <span class="out" style="color: blue;">Chờ người bán <br /> chuyển đơn hàng đến hệ thống giao hàng!  </span>
                                    <?php
                                }                                
                                }
                                
                                ?>

                                <?php
                                if($value['KL_TRANGTHAI']==0 && $value['KL_SDT_BAN'] == $sdt){
                                    ?>
                                   <span style="color: red;">Đơn hàng <br />đang chờ người mua xử lý </span>
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
                                if($value['KL_TRANGTHAI'] == 2 && $value['KL_SDT_MUA'] == $sdt){
                                    ?>
                                   <span id="output-nhan" style="color: red;">Đã nhận hàng!</span>
                                    <?php
                                }
                                if($value['KL_TRANGTHAI']==1 && $value['KL_SDT_BAN'] == $sdt){
                                    ?>
                                   <span class="out" style="color: blue;"> Chờ người bán <br /> chuyển đơn hàng đến hệ thống giao hàng! </span>
                                    <?php
                                }
                                if($value['KL_TRANGTHAI']==2 && $value['KL_SDT_BAN'] == $sdt){
                                    ?>
                                   <span style="color: red;"> Giao hàng thành công!</span>
                                    <?php
                                }
                                ?>
                                <?php
                                if($value['KL_TRANGTHAI']==0 && $value['KL_SDT_MUA'] == $sdt){
                                    ?>
                                    <a style="color: white;" href="index.php?view=xulydonhang&ma=<?php echo $value['KL_ID'].'&so='.$value['KL_SDT_BAN']; ?>"><input type="button" class="w3-btn w3-red w3-hover-blue w3-round" value='Chốt đơn hàng'/>
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
            <?php
    }
}
?>