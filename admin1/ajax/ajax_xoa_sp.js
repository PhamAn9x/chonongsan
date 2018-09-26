function xoa(){
	var check = false;
	if(confirm("Bạn có chắc muốn xóa sản phẩm này!")){
		check=true;
	} else check=false;
	return check;
}