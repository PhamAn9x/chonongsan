<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>dataTables percentage bar renderer plugin v1.1</title>
  <title>demo percentbar</title>
  
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css'>
<link rel='stylesheet' href='https://cdn.datatables.net/buttons/1.2.2/css/buttons.bootstrap.min.css'>

      <link rel="stylesheet" href="css/style.css">

  
</head>

<div style="width: 90%; margin-left: 4%;">
	<h1 style="font-size: 35px; font-weight: 700; text-align: center; color: red;">QUẢN LÝ LỊCH SỬ MUA / BÁN</h1>
	<hr />
<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
	<style type="text/css">
		th{
			text-align: center;
			vertical-align: middle;
			font-weight: 700;
			background-color: #27ae60;
			color: white;
		}
	</style>
	<thead>
		<tr>
			<th>Số<br /> thứ tự</th>
			<th>Loại<br /> đơn hàng</th>
			<th>Mã<br /> đơn hàng</th>
			<th>Người<br /> Bán/Mua</th>
			<th>Trạng thái giao</th>
			<th>Đơn vị giao</th>
			<th>Đã giao/Đã nhận</th>
			<th>Chi tiết</th>
			<th>Xóa</th>
		</tr>
	</thead>
	<tbody>
		<?php
		
			$sdt = $_SESSION['sdt'];
			$sql = "SELECT * FROM DONHANG WHERE DH_SDT_NGUOIBAN = '$sdt' AND DH_TRANGTHAI = 4";
			$result = mysqli_query($conn,$sql);
			$i = 1;
			while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
		?>
		<tr>
			<td><?php echo $i;?></td>
			<td>Bán</td>
			<td><?php echo $row['DH_ID']; ?></td>
				<?php 
					$sdtm = $row['DH_SDT_NGUOIMUA'];
					$sql = "SELECT USR_HO,USR_TEN FROM USER WHERE USR_SDT = '$sdtm'";
					$rs = mysqli_fetch_row(mysqli_query($conn,$sql));
				 ?>
			<td><?php echo $rs[0].' '.$rs[1]; ?></td>
				 <td>
				 	<?php
				 		if($row['DH_TRANGTHAI'] == 0){
				 			echo "0%";
				 		}else
				 		if($row['DH_TRANGTHAI']==1) echo "50%";
				 		else echo "100%";
				 	?>
				 </td>

      		<?php 
					$dvvc = $row['DH_DVVC_ID'];
					$sql = "SELECT DVVC_TEN FROM DONVIVANCHUYEN WHERE DVVC_SDT = '$dvvc'";
					$rs = mysqli_fetch_row(mysqli_query($conn,$sql));
				 ?>
			<td>
				<?php echo $rs[0]; ?>
			</td>
			
			<td>
				<?php 
				if($row['DH_TRANGTHAI'] == 0){
					echo "<span style='color:red;font-weight:800'>Chưa giao hàng</span>";
				}else
				if($row['DH_TRANGTHAI'] == 1){
					echo "<span style='color:blue; font-weight:800'>Đang giao hàng</span>";
				}
				?>
			</td>
			<td><a href="index.php?view=ql_dh_ct&ma=<?php echo $row['DH_ID']; ?>&so=<?php echo $row['DH_SDT_NGUOIMUA'] ?>">Chi tiết</a></td>
			<td>Xóa</td>
		</tr>
		<?php 
		$i++;
	}
		?>

		<?php
		error_reporting(0);
			$sdt = $_SESSION['sdt'];
			$sql = "SELECT * FROM DONHANG WHERE DH_SDT_NGUOIMUA = '$sdt' AND DH_TRANGTHAI = 4";
			$rs = mysqli_query($conn,$sql);
			while($row = mysqli_fetch_array($rs,MYSQLI_ASSOC)){
		?>
		<tr>
			<td><?php echo $i;?></td>
			<td>Mua</td>
			<td><?php echo $row['DH_ID']; ?></td>
				<?php 
					$sdtm = $row['DH_SDT_NGUOIBAN'];
					$sql = "SELECT USR_HO,USR_TEN FROM USER WHERE USR_SDT = '$sdtm'";
					$rs = mysqli_fetch_row(mysqli_query($conn,$sql));
				 ?>
			<td><?php echo $rs[0].' '.$rs[1]; ?></td>
				 <td>
				 	<?php
				 		if($row['DH_TRANGTHAI'] == 0){
				 			echo "0%";
				 		}else
				 		if($row['DH_TRANGTHAI']==1) echo "50%";
				 		else echo "100%";
				 	?>
				 </td>

      		<?php 
					$dvvc = $row['DH_DVVC_ID'];
					$sql = "SELECT DVVC_TEN FROM DONVIVANCHUYEN WHERE DVVC_SDT = '$dvvc'";
					$rs = mysqli_fetch_row(mysqli_query($conn,$sql));
				 ?>
			<td>
				<?php echo $rs[0]; ?>
			</td>
			<td>
			<?php 
				if($row['DH_TRANGTHAI'] == 0){
					echo "<span style='color:red;font-weight:800'>Chưa giao hàng</span>";
				}else
				if($row['DH_TRANGTHAI'] == 1){
					echo "<span style='color:blue; font-weight:800'>Đang giao hàng</span>";
				}else
				if($row['DH_TRANGTHAI'] == 1){
			?>
			<input class="w3-input w3-hover-white w3-blue w3-round" type="button" name="nhan" id="nhan" value="Đã nhận hàng">
			<?php
				} else{
					echo "<span style='color:green; font-weight:800'>Đã nhận hàng thành công</span>";
				}
			?>
		</td>
		<td>
			<a href="index.php?view=ql_dh_ct&ma=<?php echo $row['DH_ID']; ?>&so=<?php echo $row['DH_SDT_NGUOIBAN'] ?>">Chi tiết</a>
		</td>
		<td><a href="index.php?view=ql_lichsu&dh_id=<?php echo $row['DH_ID']; ?>"><button class="w3-button w3-red w3-hover-white w3-round">Xóa</button></a></td>
		</tr>
		<?php 
		$i++;
	}
		?>


	</tbody>
</table>
<?php
	if(isset($_GET['dh_id'])){
		$id = $_GET['dh_id'];
		echo $id;
		$sql = "DELETE FROM DONHANG WHERE DH_ID=$id";
		?>
		<script type="text/javascript">
			if(confirm("Bạn có chắc muốn xóa!")){
				<?php
					if(mysqli_query($conn,$sql)){
						echo "<script>alert('Thành công');</script>";
					}
				?>
			}
		</script>
		<?php
	}
?>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
<script src='https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.2.2/js/buttons.colVis.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js'></script>
<script src='https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.2.2/js/buttons.bootstrap.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js'></script>
<script src='https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js'></script>
<script src='https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js'></script>
<script src='https://cdn.datatables.net/plug-ins/1.10.15/dataRender/percentageBars.js'></script>

  

    <script  src="js/index.js"></script>




</div>

</html>
<script type="text/javascript">
	/* Parameters for percentageBars renderer:
1.string: square as default or round for a rounded bar.
2.string: A hex color for the text.
3.string: A hex color for the bar.
5.string: A hex color for the background.
6.integer: A number used to round the value.
7.string: A border style, default=ridge (solid, outset, groove, ridge)
*/

$(document).ready(function() {
  // DataTable initialisation
  $('#example').DataTable({
    "dom": '<"dt-buttons"Bf><"clear">lirtp',
    "paging": true,
    "autoWidth": true,
    "columnDefs": [{
      targets: 4,
    //   render: $.fn.dataTable.render.percentBar('round','#fff', '#FF9CAB', '#FF0033', '#FF9CAB', 0, 'solid')
    // 
}],
    "buttons": [
				
			]
  });
});
</script>
<div id="cho_id"></div>
 <script type="text/javascript">
        $(document).ready(function(){
             $(".dataTables_empty").html('Không có dữ liệu');
             $(".dataTables_length").html('<label>Hiển thị <select name="example_length" aria-controls="example" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> dòng dữ liệu</label>');
             $(".dataTables_info").html('');
             $(".dataTables_filter").html('<label>Tìm kiếm:<input class="form-control input-sm" placeholder="" aria-controls="example" type="search"></label>');
             $("#example_previous").html('<a href="#" aria-controls="example" data-dt-idx="0" tabindex="0">Trở lại</a>');
             $("#example_next").html('<a href="#" aria-controls="example" data-dt-idx="2" tabindex="0">Tiếp theo</a>');
    </script>
     <script type="text/javascript">
        $(document).ready(function(){
             $(".dataTables_empty").html('Không có dữ liệu');
             $(".dataTables_length").html('<label>Hiển thị <select name="example_length" aria-controls="example" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> dòng dữ liệu</label>');
             $(".dataTables_info").html('');
             $(".dataTables_filter").html('<label>Tìm kiếm:<input class="form-control input-sm" placeholder="" aria-controls="example" type="search"></label>');
             $("#example_previous").html('<a href="#" aria-controls="example" data-dt-idx="0" tabindex="0">Trở lại</a>');
             $("#example_next").html('<a href="#" aria-controls="example" data-dt-idx="2" tabindex="0">Tiếp theo</a>');

        });
    </script>
<style type="text/css">
	.dt-buttons{
		width: 50%;
		float: right;
		

	}
	.dataTables_length lable{
		width: 40%;
		float: right;
		margin-left: 0%;
		padding-left: 0%;margin-left: 0%;
	}
	.dataTables_info{
		display: none;
	}
</style>