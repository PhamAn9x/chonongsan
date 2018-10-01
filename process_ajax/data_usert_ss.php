<?php 
session_start();
	if(isset($_POST['id_sp'])){
		$id_sp = $_POST['id_sp'];
		echo "kkkk";
		unset($_SESSION['giohang'][$id_sp]);
		
	}
?>