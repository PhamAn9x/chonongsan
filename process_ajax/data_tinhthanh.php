<?php
	include("../config/connect.php");
	if(isset($_POST['id'])){
	$key = $_POST['id'];
	mysqli_set_charset($conn, 'UTF8');
	$sql = "select * from quan_huyen where id_tinh = $key";
               $result = mysqli_query($conn,$sql);
               ?>
    	<!-- <option value="">Chọn huyện</option>"; -->
    	<?php
              while($rows = mysqli_fetch_array($result,MYSQLI_ASSOC)){

		
?>

	<option value="<?php echo $rows['ID_HUYEN']?>"><?php echo $rows['HUYEN_NAME']?></option>

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
                <!-- echo "<option value="">Chọn xã</option>"; -->
                <?php
              while($rows = mysqli_fetch_array($result,MYSQLI_ASSOC)){

		
?>

	<option value="<?php echo $rows['id_xa']?>"><?php echo $rows['XA_NAME']?></option>

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
	$sql = "SELECT * FROM USER WHERE USR_SDT = $key2";
               $result = mysqli_query($conn,$sql);
               $rowcount=mysqli_num_rows($result);
               if($rowcount > 0){

		
?>

	Số điện thoại đã được đăng ký!
	<script type="text/javascript">
		$(document).ready(function(){
			document.getElementById('ten').style.visibility = 'hidden'; 
			document.getElementById('ho').style.visibility = 'hidden'; 
			document.getElementById('matkhau').style.visibility = 'hidden'; 
			document.getElementById('rematkhau').style.visibility = 'hidden'; 
			document.getElementById('sltinh').style.visibility = 'hidden'; 
			document.getElementById('slhuyen').style.visibility = 'hidden'; 
			document.getElementById('slxa').style.visibility = 'hidden'; 
			document.getElementById('email').style.visibility = 'hidden';
			document.getElementById('slgioitinh').style.visibility = 'hidden';
			document.getElementById('slhxa').style.visibility = 'hidden';
			document.getElementById('dk').style.visibility = 'hidden';
			document.getElementById('capchar').style.visibility = 'hidden';
            document.getElementById('slngaysinh').style.visibility = 'hidden';
            document.getElementById('slthangsinh').style.visibility = 'hidden';
            document.getElementById('slnamsinh').style.visibility = 'hidden';
            document.getElementById('alert_ho_ten').style.visibility = 'hidden';





        })
	</script>
<?php
		}
		else {
			if(strlen($key2) <10 || strlen($key2) >11){
			?>
			<script type="text/javascript">
				$(document).ready(function(){
			document.getElementById('ten').style.visibility = 'hidden'; 
			document.getElementById('ho').style.visibility = 'hidden';
			document.getElementById('matkhau').style.visibility = 'hidden'; 
			document.getElementById('rematkhau').style.visibility = 'hidden'; 
			document.getElementById('sltinh').style.visibility = 'hidden'; 
			document.getElementById('slhuyen').style.visibility = 'hidden'; 
			document.getElementById('slxa').style.visibility = 'hidden'; 
			document.getElementById('email').style.visibility = 'hidden';
			document.getElementById('slgioitinh').style.visibility = 'hidden';
			document.getElementById('slhxa').style.visibility = 'hidden';
			document.getElementById('dk').style.visibility = 'hidden';
			document.getElementById('capchar').style.visibility = 'hidden';
            document.getElementById('slngaysinh').style.visibility = 'hidden';
            document.getElementById('slthangsinh').style.visibility = 'hidden';
            document.getElementById('slnamsinh').style.visibility = 'hidden';
			document.getElementById("alert_sdt").innerHTML="Số điện thoại không đúng định dạng!"

		})
			</script>
			
			<?php 
		}else
			if(substr($key2,0,1) != "0" ){
				?>
					<script type="text/javascript">
				$(document).ready(function(){
			document.getElementById('ten').style.visibility = 'hidden'; 
			document.getElementById('ho').style.visibility = 'hidden';
			document.getElementById('matkhau').style.visibility = 'hidden'; 
			document.getElementById('rematkhau').style.visibility = 'hidden'; 
			document.getElementById('sltinh').style.visibility = 'hidden'; 
			document.getElementById('slhuyen').style.visibility = 'hidden'; 
			document.getElementById('slxa').style.visibility = 'hidden'; 
			document.getElementById('email').style.visibility = 'hidden';
			document.getElementById('slgioitinh').style.visibility = 'hidden';
			document.getElementById('slhxa').style.visibility = 'hidden';
			document.getElementById('dk').style.visibility = 'hidden';
			document.getElementById('capchar').style.visibility = 'hidden';
            document.getElementById('slngaysinh').style.visibility = 'hidden';
            document.getElementById('slthangsinh').style.visibility = 'hidden';
            document.getElementById('slnamsinh').style.visibility = 'hidden';
			document.getElementById("alert_sdt").innerHTML="Số điện phải bắt đầu bằng số 0!"

		})
			</script>	
				<?php
			}else {
			?>
			<script type="text/javascript">
				$(document).ready(function(){
				document.getElementById('ten').style.visibility = 'visible';; 
				document.getElementById('ho').style.visibility = 'visible';;
				document.getElementById('matkhau').style.visibility = 'visible';; 
				document.getElementById('rematkhau').style.visibility = 'visible';; 
				document.getElementById('sltinh').style.visibility = 'visible';; 
				document.getElementById('slhuyen').style.visibility = 'visible';; 
				document.getElementById('slxa').style.visibility = 'visible';; 
				document.getElementById('email').style.visibility = 'visible';;
				document.getElementById('slgioitinh').style.visibility = 'visible';;
				document.getElementById('slhxa').style.visibility = 'visible';;
				document.getElementById('dk').style.visibility = 'visible';
				document.getElementById('capchar').style.visibility = 'visible';
                document.getElementById('slngaysinh').style.visibility = 'visible';
                document.getElementById('slthangsinh').style.visibility = 'visible';
                document.getElementById('slnamsinh').style.visibility = 'visible';

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