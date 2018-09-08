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
                        <td>
                            <?php
                                if($loc == 'mua') echo "Người mua";
                                else 
                                    if($loc == 'ban') echo "Người bán";
                                else echo "Người bán/Người mua";
                             ?>
                        </td>

                    </tr>
                    <?php 
                    include('../config/connect.php');
                   $sdt = $_SESSION['sdt'];
                        $sql = "SELECT * FROM KHOPLENH WHERE KL_SDT_BAN = '$sdt' OR KL_SDT_MUA = '$sdt' HAVING KL_SDT_MUA = '$sdt' AND KL_SP_TEN like '%$key%' ";
                    echo $sql;
                    mysqli_set_charset($conn,'UTF8');
                    $rs = mysqli_query($conn,$sql);
                    $i=1;
                    if(mysqli_num_rows($rs)<1){
                        ?>
                        <tr>
                            <td colspan="9"> <i> Bạn chưa đăng tin nào!</i></td>
                        </tr>
                        <?php
                    } else
                    foreach ($rs as $value) {
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>

                            <td ><?php
                            if($value['KL_SDT_MUA'] == $sdt) echo "Mua";
                            else echo "Bán";
                            ?></td>
                            <td><?php echo $value['KL_SP_ID']; ?></td>
                            <td><?php echo $value['KL_SP_TEN']; ?></td>
                            <td><?php echo adddotstring($value['KL_GIA']); ?></td>
                            <td><?php echo $value['KL_SOLUONG']; ?></td>
                            <td><?php echo adddotstring($value['KL_SOLUONG']*$value['KL_GIA']); ?></td>
                            <td>
                                <?php 
                                if($value['KL_TRANGTHAI']==0 && $value['KL_SDT_MUA'] == $sdt){
                                    ?>
                                    <a href="index.php?view=xulydonhang&ma=<?php echo $value['KL_ID'].'&so='.$value['KL_SDT_BAN']; ?>"><span style="color: red;">Người bán chưa xử lý đơn hàng </span></a>
                                    <?php
                                }
                                else{
                                    if($value['KL_TRANGTHAI']==1 && $value['KL_SDT_MUA'] == $sdt){
                                        ?>
                                    <span style="color: blue;">Đang giao hàng! </span>
                                    <?php
                                }                                
                                }
                                
                                ?>

                                <?php
                                if($value['KL_TRANGTHAI']==0 && $value['KL_SDT_BAN'] == $sdt){
                                    ?>
                                    <a href="index.php?view=xulydonhang&ma=<?php echo $value['KL_ID'].'&so='.$value['KL_SDT_BAN']; ?>"><span style="color: red;">Đơn hàng đang chờ xử lý </span></a>
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
                                    <a href="#"><button class="w3-btn w3-red w3-hover-white w3-round">Nhận hàng</button></a>
                                    <?php
                                }
                                if($value['KL_TRANGTHAI'] == 2 && $value['KL_SDT_MUA'] == $sdt){
                                    ?>
                                   <span style="color: red;">Đã nhận hàng!</span>
                                    <?php
                                }
                                if($value['KL_TRANGTHAI']==1 && $value['KL_SDT_BAN'] == $sdt){
                                    ?>
                                   <span style="color: blue;"> Đang giao hàng!</span>
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
                                    <a style="color: white;" href="index.php?view=xulydonhang&ma=<?php echo $value['KL_ID'].'&so='.$value['KL_SDT_BAN']; ?>"><input type="button" class="w3-btn w3-red w3-hover-blue w3-round" value='Chi tiết đơn hàng'/>
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
                                echo $sdt."<br />";
                                echo $rs[0]." ".$rs[1];
                            }
                            else {
                                $sdtm = $value['KL_SDT_MUA'];
                                $rs = mysqli_fetch_row(mysqli_query($conn,"SELECT USR_HO,USR_TEN FROM USER WHERE USR_SDT = '$sdtm'"));
                                echo $sdt."<br />";
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
                        <td>
                            <?php
                                if($loc == 'mua') echo "Người mua";
                                else 
                                    if($loc == 'ban') echo "Người bán";
                                else echo "Người bán/Người mua";
                             ?>
                        </td>

                    </tr>
                    <?php 
                    include('../config/connect.php');
                   $sdt = $_SESSION['sdt'];
                        $sql = "SELECT * FROM KHOPLENH WHERE KL_SDT_BAN = '$sdt' OR KL_SDT_MUA = '$sdt' HAVING KL_SDT_BAN = '$sdt' AND KL_SP_TEN like '%$key%' ";
                    echo $sql;
                    mysqli_set_charset($conn,'UTF8');
                    $rs = mysqli_query($conn,$sql);
                    $i=1;
                    if(mysqli_num_rows($rs)<1){
                        ?>
                        <tr>
                            <td colspan="9"> <i> Bạn chưa đăng tin nào!</i></td>
                        </tr>
                        <?php
                    } else
                    foreach ($rs as $value) {
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>

                            <td ><?php
                            if($value['KL_SDT_MUA'] == $sdt) echo "Mua";
                            else echo "Bán";
                            ?></td>
                            <td><?php echo $value['KL_SP_ID']; ?></td>
                            <td><?php echo $value['KL_SP_TEN']; ?></td>
                            <td><?php echo adddotstring($value['KL_GIA']); ?></td>
                            <td><?php echo $value['KL_SOLUONG']; ?></td>
                            <td><?php echo adddotstring($value['KL_SOLUONG']*$value['KL_GIA']); ?></td>
                            <td>
                                <?php 
                                if($value['KL_TRANGTHAI']==0 && $value['KL_SDT_MUA'] == $sdt){
                                    ?>
                                    <a href="index.php?view=xulydonhang&ma=<?php echo $value['KL_ID'].'&so='.$value['KL_SDT_BAN']; ?>"><span style="color: red;">Người bán chưa xử lý đơn hàng </span></a>
                                    <?php
                                }
                                else{
                                    if($value['KL_TRANGTHAI']==1 && $value['KL_SDT_MUA'] == $sdt){
                                        ?>
                                    <span style="color: blue;">Đang giao hàng! </span>
                                    <?php
                                }                                
                                }
                                
                                ?>

                                <?php
                                if($value['KL_TRANGTHAI']==0 && $value['KL_SDT_BAN'] == $sdt){
                                    ?>
                                    <a href="index.php?view=xulydonhang&ma=<?php echo $value['KL_ID'].'&so='.$value['KL_SDT_BAN']; ?>"><span style="color: red;">Đơn hàng đang chờ xử lý </span></a>
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
                                    <a href="#"><button class="w3-btn w3-red w3-hover-white w3-round">Nhận hàng</button></a>
                                    <?php
                                }
                                if($value['KL_TRANGTHAI'] == 2 && $value['KL_SDT_MUA'] == $sdt){
                                    ?>
                                   <span style="color: red;">Đã nhận hàng!</span>
                                    <?php
                                }
                                if($value['KL_TRANGTHAI']==1 && $value['KL_SDT_BAN'] == $sdt){
                                    ?>
                                   <span style="color: blue;"> Đang giao hàng!</span>
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
                                    <a style="color: white;" href="index.php?view=xulydonhang&ma=<?php echo $value['KL_ID'].'&so='.$value['KL_SDT_BAN']; ?>"><input type="button" class="w3-btn w3-red w3-hover-blue w3-round" value='Chi tiết đơn hàng'/>
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
                                echo $sdt."<br />";
                                echo $rs[0]." ".$rs[1];
                            }
                            else {
                                $sdtm = $value['KL_SDT_MUA'];
                                $rs = mysqli_fetch_row(mysqli_query($conn,"SELECT USR_HO,USR_TEN FROM USER WHERE USR_SDT = '$sdtm'"));
                                echo $sdt."<br />";
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
                ?>
            </table>


        <?php
    }else{
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
                        <td>
                            <?php
                                if($loc == 'mua') echo "Người mua";
                                else 
                                    if($loc == 'ban') echo "Người bán";
                                else echo "Người bán/Người mua";
                             ?>
                        </td>

                    </tr>
                    <?php 
                    include('../config/connect.php');
                   $sdt = $_SESSION['sdt'];
                        $sql = "SELECT * FROM KHOPLENH WHERE KL_SDT_BAN = '$sdt' OR KL_SDT_MUA = '$sdt' HAVING KL_SP_TEN like '%$key%' ";
                    echo $sql;
                    mysqli_set_charset($conn,'UTF8');
                    $rs = mysqli_query($conn,$sql);
                    $i=1;
                    if(mysqli_num_rows($rs)<1){
                        ?>
                        <tr>
                            <td colspan="9"> <i> Bạn chưa đăng tin nào!</i></td>
                        </tr>
                        <?php
                    } else
                    foreach ($rs as $value) {
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>

                            <td ><?php
                            if($value['KL_SDT_MUA'] == $sdt) echo "Mua";
                            else echo "Bán";
                            ?></td>
                            <td><?php echo $value['KL_SP_ID']; ?></td>
                            <td><?php echo $value['KL_SP_TEN']; ?></td>
                            <td><?php echo adddotstring($value['KL_GIA']); ?></td>
                            <td><?php echo $value['KL_SOLUONG']; ?></td>
                            <td><?php echo adddotstring($value['KL_SOLUONG']*$value['KL_GIA']); ?></td>
                            <td>
                                <?php 
                                if($value['KL_TRANGTHAI']==0 && $value['KL_SDT_MUA'] == $sdt){
                                    ?>
                                    <a href="index.php?view=xulydonhang&ma=<?php echo $value['KL_ID'].'&so='.$value['KL_SDT_BAN']; ?>"><span style="color: red;">Người bán chưa xử lý đơn hàng </span></a>
                                    <?php
                                }
                                else{
                                    if($value['KL_TRANGTHAI']==1 && $value['KL_SDT_MUA'] == $sdt){
                                        ?>
                                    <span style="color: blue;">Đang giao hàng! </span>
                                    <?php
                                }                                
                                }
                                
                                ?>

                                <?php
                                if($value['KL_TRANGTHAI']==0 && $value['KL_SDT_BAN'] == $sdt){
                                    ?>
                                    <a href="index.php?view=xulydonhang&ma=<?php echo $value['KL_ID'].'&so='.$value['KL_SDT_BAN']; ?>"><span style="color: red;">Đơn hàng đang chờ xử lý </span></a>
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
                                    <a href="#"><button class="w3-btn w3-red w3-hover-white w3-round">Nhận hàng</button></a>
                                    <?php
                                }
                                if($value['KL_TRANGTHAI'] == 2 && $value['KL_SDT_MUA'] == $sdt){
                                    ?>
                                   <span style="color: red;">Đã nhận hàng!</span>
                                    <?php
                                }
                                if($value['KL_TRANGTHAI']==1 && $value['KL_SDT_BAN'] == $sdt){
                                    ?>
                                   <span style="color: blue;"> Đang giao hàng!</span>
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
                                    <a style="color: white;" href="index.php?view=xulydonhang&ma=<?php echo $value['KL_ID'].'&so='.$value['KL_SDT_BAN']; ?>"><input type="button" class="w3-btn w3-red w3-hover-blue w3-round" value='Chi tiết đơn hàng'/>
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
                                echo $sdt."<br />";
                                echo $rs[0]." ".$rs[1];
                            }
                            else {
                                $sdtm = $value['KL_SDT_MUA'];
                                $rs = mysqli_fetch_row(mysqli_query($conn,"SELECT USR_HO,USR_TEN FROM USER WHERE USR_SDT = '$sdtm'"));
                                echo $sdt."<br />";
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
                ?>
            </table>
        <?php
    }
	}
?>
