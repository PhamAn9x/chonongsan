<?php
	session_start();
	if(isset($_POST['sl'])){
		$sl = $_POST['sl'];
		$id = $_POST['id_sp'];
		$slht = $_SESSION['giohang'][$id]['soluong'];
		if($slht > $sl) 
		{
			$_SESSION['giohang'][$id]['soluong'] = $_SESSION['giohang'][$id]['soluong'] - ($_SESSION['giohang'][$id]['soluong'] - $sl);
		} 
		else 
		{
			$_SESSION['giohang'][$id]['soluong'] += ($sl - $_SESSION['giohang'][$id]['soluong'] );
		}
	}
?>