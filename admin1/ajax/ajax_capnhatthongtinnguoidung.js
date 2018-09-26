$(document).ready(function(){
	$("#slusra").change(function(){
		var key = $("#slusra").val();
		$.post("ajax/ajax_data_thongtinnguoidung.php", {id_nda: key}, function(data){
			$("#ttusr").html(data);
		})
	})


	$("#slusrl").change(function(){
		var key = $("#slusrl").val();
		$.post("ajax/ajax_data_thongtinnguoidung.php", {id_ndl: key}, function(data){
			$("#ttusr").html(data);
		})
	})

	$("#khoataikhoan").click(function(){
		var key = $("#slusrl").val();
		$.post("ajax/ajax_active_lock_user.php", {id_acl: key}, function(data){
			$("#ttusr").html(data);
		})
	})

	$("#kichhoattaikhoan").click(function(){
		var key = $("#slusra").val();
		$.post("ajax/ajax_active_lock_user.php", {id_aca: key}, function(data){
			$("#ttusr").html(data);
		})
	})

})