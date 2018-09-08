<?php
	include('../config/connect.php');
	if(isset($_POST['key'])){
		$id = $_POST['key'];
		$sdt = $_POST['sdt'];
		?>

		<script type="text/javascript">
		 var sdt = <?php echo $sdt; ?>;
		</script>

		<?php
		if(mysqli_query($conn,"DELETE FROM LENH WHERE SP_ID = $id AND L_SDT='$sdt' AND L_TEN ='mua'")){
?>
		<script type="text/javascript">window.location.href='index.php?view=ql_lenhmua'</script
		<?php
	}
}

?>