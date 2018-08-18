$(document).ready(function(){
	$("#slnhomsanpham").change(function(){
		var id = $("#slnhomsanpham").val();
		// alert("ti day");
		$.post("process_ajax/data_nhomsanpham.php", {idnsp: id}, function(data){
			$("#slloaisanpham").html(data);
		})
	})
});