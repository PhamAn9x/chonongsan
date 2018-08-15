<?php
	include("../config/connect.php");
	if(isset($_POST['id'])){
	$key = $_POST['id'];
	mysqli_set_charset($conn, 'UTF8');
	$sql = "select * from quan_huyen where id_tinh = $key";
               $result = mysqli_query($conn,$sql);
               ?>
    	<option value="">Chọn huyện</option>";
    	<?php
              while($rows = mysqli_fetch_array($result,MYSQLI_ASSOC)){

		
?>

	<option value="<?php echo $rows['ID_HUYEN']?>"><?php echo $rows['name']?></option>

<?php
		}
	}
?>

<?php
	// include("../config/connect.php");
	if(isset($_POST['id1'])){
	$key1 = $_POST['id1'];
	mysqli_set_charset($conn, 'UTF8');
	$sql = "select * from phuong_xa where id_huyen = $key1";
               $result = mysqli_query($conn,$sql);
               ?>
                echo "<option value="">Chọn xã</option>";
                <?php
              while($rows = mysqli_fetch_array($result,MYSQLI_ASSOC)){

		
?>

	<option value="<?php echo $rows['id_xa']?>"><?php echo $rows['name']?></option>

<?php
		}
	}
?>


<?php
	// include("../config/connect.php");
	if(isset($_POST['id2'])){
	$key2 = $_POST['id2'];
	mysqli_set_charset($conn, 'UTF8');
	if($key2 != ""){
	$sql = "select * from user where usr_sdt = $key2";
               $result = mysqli_query($conn,$sql);
               $rowcount=mysqli_num_rows($result);
               if($rowcount > 0){

		
?>

	Số điện thoại đã được đăng ký!
	<script type="text/javascript">
		$(document).ready(function(){
			document.getElementById('ten').disabled = true; 
			document.getElementById('ho').disabled = true; 
			document.getElementById('matkhau').disabled = true; 
			document.getElementById('rematkhau').disabled = true; 
			document.getElementById('sltinh').disabled = true; 
			document.getElementById('slhuyen').disabled = true; 
			document.getElementById('slxa').disabled = true; 
			document.getElementById('email').disabled = true;
			document.getElementById('dk').style.visibility = 'hidden';
			document.getElementById('capchar').style.visibility = 'hidden';

		})
	</script>
<?php
		}
		else {
			if(strlen($key2) <10 || strlen($key2) >11){
			?>
			<script type="text/javascript">
				$(document).ready(function(){
			document.getElementById('ten').disabled = true; 
			document.getElementById('ho').disabled = true;
			document.getElementById('matkhau').disabled = true; 
			document.getElementById('rematkhau').disabled = true; 
			document.getElementById('sltinh').disabled = true; 
			document.getElementById('slhuyen').disabled = true; 
			document.getElementById('slxa').disabled = true; 
			document.getElementById('email').disabled = true;
			document.getElementById('dk').style.visibility = 'hidden';
			document.getElementById('capchar').style.visibility = 'hidden';
			document.getElementById("alert_sdt").innerHTML="Số điện thoại không đúng định dạng!"

		})
			</script>
			
			<?php 
		}else
			if(substr($key2,0,1) != "0" ){
				?>
					<script type="text/javascript">
				$(document).ready(function(){
			document.getElementById('ten').disabled = true; 
			document.getElementById('ho').disabled = true;
			document.getElementById('matkhau').disabled = true; 
			document.getElementById('rematkhau').disabled = true; 
			document.getElementById('sltinh').disabled = true; 
			document.getElementById('slhuyen').disabled = true; 
			document.getElementById('slxa').disabled = true; 
			document.getElementById('email').disabled = true;
			document.getElementById('dk').style.visibility = 'hidden';
			document.getElementById('capchar').style.visibility = 'hidden';
			document.getElementById("alert_sdt").innerHTML="Số điện phải bắt đầu bằng số 0!"

		})
			</script>	
				<?php
			}else {
			?>
			<script type="text/javascript">
				$(document).ready(function(){
				document.getElementById('ten').disabled = false; 
				document.getElementById('ho').disabled = false;
				document.getElementById('matkhau').disabled = false; 
				document.getElementById('rematkhau').disabled = false; 
				document.getElementById('sltinh').disabled = false; 
				document.getElementById('slhuyen').disabled = false; 
				document.getElementById('slxa').disabled = false; 
				document.getElementById('email').disabled = false;
				document.getElementById('dk').style.visibility = 'visible';
				document.getElementById('capchar').style.visibility = 'visible';

		})
				</script>
			<?php
		}
		}
	}
	else {
		?>
		Số điện thoại không được rỗng!
		<?php 
	}
}
?>