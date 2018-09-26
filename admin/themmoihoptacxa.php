<link rel="stylesheet" type="text/css" href="../css/main.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="ajax/ajax_xoa_usr.js"></script>
<script type="text/javascript" src="ajax/ajax_capnhat_trangthai.js"></script>
<script type="text/javascript" src="ajax/ajax_timkiemnguoidung.js"></script>
<script type="text/javascript" src="ajax/ajax_chonquyen.js"></script>
<?php 
	include('../config/connect.php');
	include('ajax/xuli_capnhattrangthai.php');
?>
<div class="w3-row w3-center" style="margin-top: 5%;"> 
	<h1 style="font-weight: 700">THÊM MỚI HỢP TÁC XÃ</h1></div>
	<div style="font-size: 20px; color:black; margin-left: 33.5%;margin-bottom: 0%;">.............................*............................</div>
	<form id='frhtx' method="post" action="#">
	<div class="w3-col s12">
		<div style="padding-left: 25%; padding-top: 5%;">
			<input class="w3-input" style="width: 65%;" type="text" name="tenhtx" id="tenhtx" placeholder="Tên hợp tác xã">
		</div>
		<div style="padding-left: 25%;">
			<input type="text" name="ipAp" id="ipAp" placeholder="Nhập số nhà">
			<select>
				
			</select>
			<select>
				
			</select>
			<select>
				
			</select>
		</div>
		<div style="padding-left: 25%;">
			<input class="w3-input" style="width: 65%;" type="text" name="sdthtx" id="sdthtx" placeholder="Số điện thoại hợp tác xã">
		</div>
		<div style="text-align: center; padding-top: 2%;">
			<input class="w3-btn w3-red w3-hover-blue" type="button" name="ntnsubmit" id = "btnsubmit" value="Thêm hợp tác xã">
		</div>
	</form>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
		$("#btnsubmit").click(function(){
		var dc = $("#diachihtx").val();
		alert(dc);
		$.getJSON('http://nominatim.openstreetmap.org/search?format=json&limit=5&q=' + inp.value, function(data) {
			var items = [];
			$.each(data, function(key, val) {

			});
		});
	});
	});
		</script>












