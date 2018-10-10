<?php
	include("../config/connect.php");
	if(isset($_POST['flat_cmt'])){
		$sp_id = $_POST['sp_id'];
		$cmt =$_POST['nd_cmt'];
		$usr = $_POST['usr'];
		mysqli_set_charset($conn,"UTF8");
		$sql = "INSERT INTO BINH_LUAN(SP_ID,ND_BL,USR_BL) VALUES ($sp_id,'$cmt','$usr')";
		if(mysqli_query($conn,$sql)){

		?>
		<script type="text/javascript">
				var sp_id = <?php echo $sp_id; ?>;
			alert(" Bình luận thành công!");
			window.location.href="index.php?xem=chitietsanpham&id="+sp_id;
	</script>

		<?php
	}else{
		?>
				<script type="text/javascript">alert(" Bình luận chưa thành công!");</script>

		<?php
	}
	}
	else
			if(isset($_POST['flat_rep'])){
		$sp_id = $_POST['sp_id'];
		$cmt =$_POST['nd_cmt_rep'];
		$usr = $_POST['usr'];
		$cmt_id = $_POST['cmt_id'];
		mysqli_set_charset($conn,"UTF8");
		$sql = "INSERT INTO BINHLUAN_TRALOI(BL_ID,BLTL_NOIDUNG,BLTL_USR) VALUES ($cmt_id,'$cmt','$usr')";
		echo $sql;
		if(mysqli_query($conn,$sql)){

		?>
		<script type="text/javascript">
				var sp_id = <?php echo $sp_id; ?>;
			alert(" Trả lời bình luận thành công!");
			window.location.href="index.php?xem=chitietsanpham&id="+sp_id;
	</script>

		<?php
	}else{
		?>
				<script type="text/javascript">alert(" Trả lời bình  luận chưa thành công!");</script>

		<?php
	}
	} else 
			if(isset($_POST['flat_del_cmt'])){
				$cmt_id = $_POST['cmt_id'];
				$sp_id = $_POST['sp_id'];
				$sql1 = "DELETE FROM BINH_LUAN WHERE BL_ID = $cmt_id";
				$sql2 = "DELETE FROM BINHLUAN_TRALOI WHERE BL_ID = $cmt_id";
				if( mysqli_query($conn,$sql1) && mysqli_query($conn,$sql2) ){
				?>
					<script type="text/javascript"> 
						var sp_id = <?php  echo $sp_id; ?>;
						alert("Xóa bình luận thành công!");
			window.location.href="index.php?xem=chitietsanpham&id="+sp_id;
				</script>

				<?php
			} else{
				?>
					<script type="text/javascript">alert("Không thể xóa bình luận!");</script>
				<?php
			}
			}else
					if(isset($_POST['flat_del_cmt_rep'])){
						$rep_id = $_POST['cmt_rep_id'];
						$sp_id = $_POST['sp_id'];
						$sql = "DELETE FROM BINHLUAN_TRALOI  WHERE BLTL_ID = $rep_id";
						if(mysqli_query($conn,$sql)){
						?>
							<script type="text/javascript"> 
						var sp_id = <?php  echo $sp_id; ?>;
							alert("Xóa trả lời thành công!");
			window.location.href="index.php?xem=chitietsanpham&id="+sp_id;

						</script>
						<?php
					}else
							{
								?>
								<script type="text/javascript">alert("Không thể xóa!");</script>
								<?php
							}
					}
?>