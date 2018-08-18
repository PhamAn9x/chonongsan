<?php
	if(isset($_POST['usr'])){
		$_SESSION['ma'] = $_POST['masp'];
		echo "ok";
	}
?>