$(document).ready(function(){
	$(".tinh").change(function(){
		var id = $(".tinh").val();
		// alert("ti day");
		$.post("views/data_tinhthanh.php", {id: id}, function(data){
			$(".huyen").html(data);
		})
	})
	$(".huyen").change(function(){
		var id1 = $(".huyen").val();
		$.post("views/data_tinhthanh.php", {id1: id1}, function(data){
			$(".xa").html(data);
		})
	})

	$("#sdt").blur(function(){
		var id2 = $("#sdt").val();
		$.post("process_ajax/data_tinhthanh.php", {id2: id2}, function(data){
			$("#alert_sdt").html(data);
		})
	})


})