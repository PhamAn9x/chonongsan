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
	if(isset($_POST['key'])){
		$key = $_POST['key'];
		?>
			<table class="w3-table-all w3-hoverable w3-large tb">
                    <tr class="w3-green w3-center" style="font-size: 20px;">
                        <td>STT</td>
                        <td>Mã sản phẩm</td>
                        <td>Tên sản phẩm</td>
                        <td>Giá sản phẩm</td>
                        <td>Số lượng còn lại</td>
                        <td>Tổng lô hàng</td>
                        <td>Ngày đăng</td>
                        <td>Xóa lệnh</td>

                    </tr>
                    <?php 
                        include('../config/connect.php');
                        mysqli_set_charset($conn,'UTF8');
                        $sdt = $_SESSION['sdt'];
                        $sql = "SELECT * FROM LENH WHERE L_TEN ='mua' AND L_SDT ='$sdt' AND SP_TEN like '%$key%'";
                        echo $sql;
                        $rs = mysqli_query($conn,$sql);
                        $i=1;
                        if(mysqli_num_rows($rs)<1){
                            ?>
                            <script type="text/javascript">
                                alert("Không tìm thấy sản phẩm!");  
                                window.location.href='index.php?view=ql_lenhmua'   </script>

                            <?php
                        } else
                        foreach ($rs as $value) {
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $value['SP_ID']; ?></td>
                        <td><?php echo $value['SP_TEN']; ?></td>
                        <td><?php echo adddotstring($value['L_GIA']); ?></td>
                        <td><?php echo $value['L_SOLUONG']; ?></td>        
                        <td><?php echo adddotstring($value['L_GIA']*$value['L_SOLUONG'])." VNĐ"; ?></td>
                        <td><?php echo $value['L_NGAYDAT']; ?></td>
                        
                        <input style="display: none;" type="text" id="<?php echo $value['SP_ID']; ?>">
                        <td><img id="delete<?php echo $value['SP_ID']; ?>" src="logo_image/delete.png" style=" cursor: pointer; width: 30px; height: 30px;"></td>
                    </tr>

                    <script type="text/javascript">
                            $(document).ready(function(){
                                $("#delete<?php echo $value['SP_ID']; ?>").click(function(){
                                    var id = <?php echo $value['SP_ID']; ?>;
                                    var sdt =  "0"+<?php echo $sdt; ?>;
                                    alert(sdt) ;
                                    if(confirm('Bạn có chắc muốn xóa sản phẩm này?')){
                                   $.post("process_ajax/xoa_lenhmua.php", {key: id, sdt : sdt}, function(data){
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
?>

<?php 
if(isset($_POST['keys'])){
		$key = $_POST['keys'];
		?>		 
			 <table class="w3-table-all w3-hoverable w3-large tb">
                    <tr class="w3-green w3-center" style="font-size: 20px;">
                        <td>STT</td>
                        <td>Mã sản phẩm</td>
                        <td>Tên sản phẩm</td>
                        <td>Giá sản phẩm</td>
                        <td>Số lượng còn lại</td>
                        <td>Tổng lô hàng</td>
                        <td>Ngày đăng</td>
                        <td>Xóa lệnh</td>

                    </tr>
                    <?php 
                        include('../config/connect.php');
                        mysqli_set_charset($conn,'UTF8');
                        $sdt = $_SESSION['sdt'];
                        $sql = "SELECT * FROM LENH WHERE L_TEN ='ban' AND L_SDT ='$sdt'  AND SP_TEN like '%$key%'";
                        $rs = mysqli_query($conn,$sql);
                        $i=1;
                        if(mysqli_num_rows($rs)<1){
                            ?>
                            <script type="text/javascript">
                                alert("Không tìm thấy sản phẩm!");  
                                window.location.href='index.php?view=ql_lenhban'   </script>
                            <?php
                        } else
                        foreach ($rs as $value) {
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $value['SP_ID']; ?></td>
                        <td><?php echo $value['SP_TEN']; ?></td>
                        <td><?php echo adddotstring($value['L_GIA']); ?></td>
                        <td><?php echo $value['L_SOLUONG']; ?></td>        
                        <td><?php echo adddotstring($value['L_GIA']*$value['L_SOLUONG'])." VNĐ"; ?></td>
                        <td><?php echo $value['L_NGAYDAT']; ?></td>
                        
                        <input style="display: none;" type="text" id="<?php echo $value['SP_ID']; ?>">
                        <td><img id="delete<?php echo $value['SP_ID']; ?>" src="logo_image/delete.png" style=" cursor: pointer; width: 30px; height: 30px;"></td>
                    </tr>

                    <script type="text/javascript">
                            $(document).ready(function(){
                                $("#delete<?php echo $value['SP_ID']; ?>").click(function(){
                                    var id = <?php echo $value['SP_ID']; ?>;
                                    var sdt =  "0"+<?php echo $sdt; ?>;
                                    alert(sdt) ;
                                    if(confirm('Bạn có chắc muốn xóa sản phẩm này?')){
                                   $.post("process_ajax/xoa_lenhmua.php", {key: id, sdt : sdt}, function(data){
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
?>