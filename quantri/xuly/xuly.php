<?php
session_start();
	include("../../config/connect.php");

				if(isset($_POST['dangnhap'])){
					$sdt = $_POST['sdt'];
					$pass = md5($_POST['pass']);
					$sql = "SELECT * FROM USER WHERE USR_SDT = '$sdt' AND USR_PASS = '$pass' AND Q_ID = 1" ;
					$row = mysqli_fetch_array(mysqli_query($conn,$sql),MYSQLI_ASSOC);
					$kq = mysqli_num_rows(mysqli_query($conn,$sql));
					if($kq  > 0){
						$_SESSION['admin']=$row['HTX_ID'];
					?>

					<script type="text/javascript">
						 window.location.href="index1.php";
					</script>
					<?php
				}else{
					?>
						<script type="text/javascript">
						alert("Đăng nhập thất bại! Vui lòng kiểm tra lại!");
					</script>
					<?php
				}
				} 
?>