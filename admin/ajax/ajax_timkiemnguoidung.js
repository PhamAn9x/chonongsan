// JavaScript Document
$(document).ready(function(){
	$("#btn_timkiem").click(function(){
		var key = $("#sltimkiemusr").val();
		if(key != ""){ 
		$.post("ajax/ajax_xulitimkiem.php", {key: key}, function(data){
			$("#kqtim").html(data);
		});
		}
		else alert('Vui lòng nhập người dùng cần tìm!');
	});
});