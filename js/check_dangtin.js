
$(document).ready(function(){
	var check = 0;


var nsp = $("#slnhomsanpham").val();
		var lsp = $("#slloaisanpham").val();
		var tinh = $("#sltinh").val();
		var huyen = $("#slhuyen").val();
		var xa = $("#slxa").val();
			if(nsp == "")
			{
				// document.getElementById("slnhomsanpham").style.borderColor = "red"; 
    //   			document.getElementById("slnhomsanpham").style.borderWidth = "2px";
      			check = 1;
			}
			else
			{
				// document.getElementById("slnhomsanpham").style.borderColor = "blue"; 
    //        		document.getElementById("slnhomsanpham").style.borderWidth = "2px";
           		check = 0;
			}

			if(lsp == "")
			{
				// document.getElementById("slloaisanpham").style.borderColor = "red"; 
    //   			document.getElementById("slloaisanpham").style.borderWidth = "2px";
      			check = 1;
			}
			else
			{
				// document.getElementById("slloaisanpham").style.borderColor = "blue"; 
    //        		document.getElementById("slloaisanpham").style.borderWidth = "2px";
           		check = 0;
			}

			if(tinh == "")
			{
				// document.getElementById("sltinh").style.borderColor = "red"; 
    //   			document.getElementById("sltinh").style.borderWidth = "2px";
      			check = 1;
			}
			else
			{
				// document.getElementById("sltinh").style.borderColor = "blue"; 
    //        		document.getElementById("sltinh").style.borderWidth = "2px";
           		check = 0;
			}

			if(huyen == "")
			{
				// document.getElementById("slhuyen").style.borderColor = "red"; 
    //   			document.getElementById("slhuyen").style.borderWidth = "2px";
      			check = 1;
			}
			else
			{
				// document.getElementById("slhuyen").style.borderColor = "blue"; 
    //        		document.getElementById("slhuyen").style.borderWidth = "2px";
           		check = 0;
			}
			if(xa == "")
			{
				// document.getElementById("slxa").style.borderColor = "red"; 
    //   			document.getElementById("slxa").style.borderWidth = "2px";
      			check = 1;
			}
			else
			{
				// document.getElementById("slxa").style.borderColor = "blue"; 
    //        		document.getElementById("slxa").style.borderWidth = "2px";
           		check = 0;
			}




	$("#tieude").blur(function(){
		var td = $("#tieude").val();
		 if(td == "")
    {
      document.getElementById("tieude").style.borderColor = "red"; 
      document.getElementById("tieude").style.borderWidth = "2px";
      // document.getElementById("alert_tieude").innerHTML="<i>Tiêu đề không được để rổng!</i>";
      check = 1;
    }else
          {
            document.getElementById("tieude").style.borderColor = "blue"; 
            document.getElementById("tieude").style.borderWidth = "2px";
            // document.getElementById("alert_tieude").innerHTML="";
            check = 0;
          }
	});

	$("#masanpham").blur(function(){
		var td = $("#masanpham").val();
		 if(td == "")
    {
      document.getElementById("masanpham").style.borderColor = "red"; 
      document.getElementById("masanpham").style.borderWidth = "2px";
      // document.getElementById("alert_masanpham").innerHTML="<i>Mã sản phẩm không được để rổng!</i>";
      check = 1;
    }else
          {
            document.getElementById("masanpham").style.borderColor = "blue"; 
            document.getElementById("masanpham").style.borderWidth = "2px";
            // document.getElementById("alert_masanpham").innerHTML="";
            check = 0;
          }
	});

	$("#soluong").blur(function(){
		var td = $("#soluong").val();
		 if(td == "" || isNaN(td))
    {
      document.getElementById("soluong").style.borderColor = "red"; 
      document.getElementById("soluong").style.borderWidth = "2px";
      // document.getElementById("alert_soluong").innerHTML="<i>Số lượng không được để rổng và phải là số!</i>";
      check = 1;
    }else
          {
            document.getElementById("soluong").style.borderColor = "blue"; 
            document.getElementById("soluong").style.borderWidth = "2px";
            // document.getElementById("alert_soluong").innerHTML="";
            check = 0;
          }
	});

	$("#gia").blur(function(){
		var td = $("#gia").val();
		 if(td == "" || isNaN(td))
    {
      document.getElementById("gia").style.borderColor = "red"; 
      document.getElementById("gia").style.borderWidth = "2px";
      // document.getElementById("alert_gia").innerHTML="<i> Giá không được để rổng và phải là số!</i>";
      check = 1;
    }else
          {
            document.getElementById("gia").style.borderColor = "blue"; 
            document.getElementById("gia").style.borderWidth = "2px";
            // document.getElementById("alert_gia").innerHTML="";
            check = 0;
          }
	});

	$("#donvitinh").blur(function(){
		var td = $("#donvitinh").val();
		 if(td =blue)
    {
      document.getElementById("donvitinh").style.borderColor = "red"; 
      document.getElementById("donvitinh").style.borderWidth = "2px";
      // document.getElementById("alert_donvitinh").innerHTML="<i> Đơn vị không được để rổng!</i>";
      check = 1;
    }else
          {
            document.getElementById("donvitinh").style.borderColor = "blue"; 
            document.getElementById("donvitinh").style.borderWidth = "2px";
            // document.getElementById("alert_donvitinh").innerHTML="";
            check = 0;
          }
	});

	$("#phi").blur(function(){
		var td = $("#phi").val();
		 if(td == "" || isNaN(td))
    {
      document.getElementById("phi").style.borderColor = "red"; 
      document.getElementById("phi").style.borderWidth = "2px";
      // document.getElementById("alert_phi").innerHTML="<i>Phí không được để rổng và phải là số!</i>";
      check = 1;
    }else
          {
            document.getElementById("phi").style.borderColor = "blue"; 
            document.getElementById("phi").style.borderWidth = "2px";
            // document.getElementById("alert_phi").innerHTML="";
            check = 0;
          }
	});


	$("#mota").blur(function(){
		var td = $("#mota").val();
		 if(td == "")
    {
      document.getElementById("mota").style.borderColor = "red"; 
      document.getElementById("mota").style.borderWidth = "2px";
      // document.getElementById("alert_mota").innerHTML="<i>Mô tả không được để rổng!</i>";
      check = 1;
    }else
          {
            document.getElementById("mota").style.borderColor = "blue"; 
            document.getElementById("mota").style.borderWidth = "2px";
            // document.getElementById("alert_mota").innerHTML="";
            check = 0;
          }
	});

	$("#ho").blur(function(){
		var td = $("#ho").val();
		 if(td == "" )
    {
      document.getElementById("ho").style.borderColor = "red"; 
      document.getElementById("ho").style.borderWidth = "2px";
      // document.getElementById("alert_ho").innerHTML="<i>Họ không được để rổng!</i>";
      check = 1;
    }else
          {
            document.getElementById("ho").style.borderColor = "blue"; 
            document.getElementById("ho").style.borderWidth = "2px";
            // document.getElementById("alert_ho").innerHTML="";
            check = 0;
          }
	});


	$("#ten").blur(function(){
		var td = $("#ten").val();
		 if(td == "" )
    {
      document.getElementById("ten").style.borderColor = "red"; 
      document.getElementById("ten").style.borderWidth = "2px";
      // document.getElementById("alert_ten").innerHTML="<i>Tên không được để rổng!</i>";
      check = 1;
    }else
          {
            document.getElementById("ten").style.borderColor = "blue"; 
            document.getElementById("ten").style.borderWidth = "2px";
            // document.getElementById("alert_ten").innerHTML="";
            check = 0;
          }
	});


	$("#sdt").blur(function(){
		var td = $("#sdt").val();
		 if(td == "" )
    {
      document.getElementById("sdt").style.borderColor = "red"; 
      document.getElementById("sdt").style.borderWidth = "2px";
      // document.getElementById("alert_sdt").innerHTML="<i>Tên không được để rổng!</i>";
      check = 1;
    }else
		if(isNaN(td)){
			alert("Số điện thoại phải là số!");
			check =1;
		} else
          {
            document.getElementById("sdt").style.borderColor = "blue"; 
            document.getElementById("sdt").style.borderWidth = "2px";
            // document.getElementById("alert_sdt").innerHTML="";
            check = 0;
          }
	});
	

	$("#email").blur(function(){
		var td = $("#email").val();
		 if(td == "" )
    {
      document.getElementById("email").style.borderColor = "red"; 
      document.getElementById("email").style.borderWidth = "2px";
      // document.getElementById("alert_sdt").innerHTML="<i>Tên không được để rổng!</i>";
      check = 1;
    }else
          {
            document.getElementById("email").style.borderColor = "grey"; 
            document.getElementById("email").style.borderWidth = "0.2px";
            // document.getElementById("alert_sdt").innerHTML="";
            check = 0;
          }
	});
	
	$("#diachi").blur(function(){
		var td = $("#diachi").val();
		 if(td == "" )
    {
      document.getElementById("diachi").style.borderColor = "red"; 
      document.getElementById("diachi").style.borderWidth = "2px";
      // document.getElementById("alert_sdt").innerHTML="<i>Tên không được để rổng!</i>";
      check = 1;
    }else
          {
            document.getElementById("diachi").style.borderColor = "blue"; 
            document.getElementById("diachi").style.borderWidth = "2px";
            // document.getElementById("alert_sdt").innerHTML="";
            check = 0;
          }
      });
	
		$("#diachi").blur(function(){
		var td = $("#diachi").val();
		 if(td == "" )
    {
      document.getElementById("diachi").style.borderColor = "red"; 
      document.getElementById("diachi").style.borderWidth = "2px";
      // document.getElementById("alert_sdt").innerHTML="<i>Tên không được để rổng!</i>";
      check = 1;
    }else
          {
            document.getElementById("diachi").style.borderColor = "blue"; 
            document.getElementById("diachi").style.borderWidth = "2px";
            // document.getElementById("alert_sdt").innerHTML="";
            check = 0;
          }
      });
		

		$("#ngayhethan").blur(function(){
		var td = $("#ngayhethan").val();
		 if(td == "" )
    {
      document.getElementById("ngayhethan").style.borderColor = "red"; 
      document.getElementById("ngayhethan").style.borderWidth = "2px";
      // document.getElementById("alert_sdt").innerHTML="<i>Tên không được để rổng!</i>";
      check = 1;
    }else
          {
            document.getElementById("ngayhethan").style.borderColor = "blue"; 
            document.getElementById("ngayhethan").style.borderWidth = "2px";
            // document.getElementById("alert_sdt").innerHTML="";
            check = 0;
          }
      });


		$("#xacthuc").blur(function(){
		var td = $("#xacthuc").val();
		 if(td != checkcap )
    {
      document.getElementById("xacthuc").style.borderColor = "red"; 
      document.getElementById("xacthuc").style.borderWidth = "2px";
      // document.getElementById("alert_sdt").innerHTML="<i>Tên không được để rổng!</i>";
      check = 1;
    }else
          {
            document.getElementById("xacthuc").style.borderColor = "blue"; 
            document.getElementById("xacthuc").style.borderWidth = "2px";
            // document.getElementById("alert_sdt").innerHTML="";
            check = 0;
          }
      });

		$( "#btndangtin" ).click(function() {
	if(check == 0)
  		$( "#dangtin" ).submit();
  	else alert("Kiểm tra lại thông tin!");

});


});
	
