<?php 
	include('config/connect.php');
	if(isset($_GET['usr'])){
		$usr = $_GET['usr'];
		$key = $_GET['key'];
		$sql = "SELECT * FROM USER WHERE USR_SDT = '$usr' AND USR_KEY = '$key'";
		if(mysqli_num_rows(mysqli_query($conn,$sql)) > 0 ){
			if(mysqli_query($conn,"UPDATE USER SET USR_TRANGTHAI = 1 WHERE USR_SDT = '$usr'")){
				?>
				<script type="text/javascript">
					if(confirm("Kích hoạt tài khoản thành công! Bạn có muốn đăng nhập?")){
						 window.location.href = "index.php?view=dangnhap";
					}else{
						 window.location.href = "index.php";
					}

				</script>
				<?php
			}
		}
		else
		{
			?>
			<script type="text/javascript">
				alert("Kích hoạt thất bại! Vui lòng liên hệ quản trị viên!");
				 window.location.href = "index.php"
			</script>
			<?php
		}
	}
?>