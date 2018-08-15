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

	$("#sdt").change(function(){
		var id2 = $("#sdt").val();
		alert(id2);
		// $.post("views/data_tinhthanh.php", {id1: id1}, function(data){
		// 	$(".xa").html(data);
		// })
	})


})