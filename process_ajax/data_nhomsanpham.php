<?php
	include("../config/connect.php");
	if(isset($_POST['idnsp'])){
	$keynsp = $_POST['idnsp'];
	mysqli_set_charset($conn, 'UTF8');
	$sql = "select * from LOAISANPHAM where NSP_ID = $keynsp";
               $result = mysqli_query($conn,$sql);
               ?>
    	<?php
              while($rows = mysqli_fetch_array($result,MYSQLI_ASSOC)){

		
?>

	<option value="<?php echo $rows['LSP_ID']?>"><?php echo $rows['LSP_TEN']?></option>

<?php
		}
	}
?>