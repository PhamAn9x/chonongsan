function xoa(){
	var check = false;
	if(confirm("Bạn có chắc muốn xóa người dùng này!")){
		check=true;
	} else check=false;
	return check;
}