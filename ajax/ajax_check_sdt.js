// JavaScript Document
$(document).ready(function(){
	//$("#sdt").change(function(){
		var sdt = $("#sdt").val();
		$.post("process_ajax/data_check_sdt.php", {sdt: sdt}, function(data){
			$("#data_sdt").html(data);
		});
	});
//});