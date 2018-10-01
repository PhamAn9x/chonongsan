<?php
	include('config/connect.php');
	if(isset($_SESSION['sdt'])){
		$sdt = $_SESSION['sdt'];
	$slthich = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM THICH WHERE USR_SDT = $sdt"));
	} else $slthich = 0;
?>
<style type="text/css">
	#frtimkiem table tr td{
		font-size: 15px;
	}
</style>

<div style=" margin-top:0.5%; margin-bottom: 2px;">
<link rel="stylesheet" href="css/style_hover.css">
<div class="w3-col s2 "><a href="index.php"><img src="logo_image/logo.png"></a></div>
		<div class="w3-col s10 ">
			<form name="frtimkiem" id="frtimkiem" method="get">
				<table>
					<tr>
						<td>
							<div style="float: left;">
								<select id="slnsp" class="w3-input w3-border" style="width: 250px;">
									<option value="">Chọn danh mục</option>
									<?php 
									mysqli_set_charset($conn,"UTF8");
										$nsp = mysqli_query($conn,"SELECT * FROM NHOMSANPHAM ");
										while ($row = mysqli_fetch_array($nsp,MYSQLI_ASSOC)){
											?>
												<option value="<?php echo $row['NSP_ID']; ?>"><?php echo $row['NSP_TEN']; ?></option>
											<?php
										}
									?>
								</select>
							</div>
							<div style="float: left; padding-left: 10px;">
								<input class="w3-input w3-border" type="text" name="iptimkiem" id="iptimkiem" placeholder="Nhập từ khóa cần tìm">
							</div>	
							<div style="float: left; margin-left:5px; width: 150px;">
								<input type="button" class="w3-btn w3-round w3-green" name="btntimkiem" id="btntimkiem" value="Tìm kiếm" style=" width: 125px;margin-left: 5px;" />
							</div>						
						</td>
							<?php 
								if(!isset($_SESSION['user'])){
							?>
								<td class="w3-border-left w3-border-right" style="font-weight: 600; padding-top: 3px; padding-left: 3px; font-size: 16px;">
									<img style="margin-left:7px;" src="logo_image/icondn.png" width="25px" height="25px"><span style="padding-left: 7px;"><a href="?view=dangnhap" style=" text-decoration: none; color: black;"> Đăng nhập </a></span>  
									<span style="font-size: 17px;">/</span>
									<span style="padding-right:7px;"><a href="?view=dangky" style=" text-decoration: none;color: black;">Đăng ký</a></span>  
								</td>
									<?php 
								}else{
									?>
										<td class="w3-border-left w3-border-right">
								<a href="?view=dangxuat" class="w3-btn w3-round w3-red w3-hover-white" style="margin-top: 0px; margin-left: 35%; width: 125px;";><span style="font-weight: 700">Đăng Xuất</span></a>
							</td>
									<?php
							}
							?>
							<?php
								if(isset($_SESSION['htx'])){
							?>
							<td class="w3-border-left">
								<a href="?view=dangtin" class="w3-btn w3-round w3-border-left w3-green w3-hover-white" style="margin-top: 4px; margin-left: 90%; width: 125px;";><span style="font-weight: 700">Đăng tin</span></a>
							</td>
							<?php
								}else{
							?>
								
							<?php
						}
							?>

						</tr>
					</table>
				</form>
			</div>
		</div>
		<script type="text/javascript">
			$(document).ready(function(){
				$("#btntimkiem").click(function(){
					var nsp = $("#slnsp").val();
					var key = $("#iptimkiem").val();
					$.post("process_ajax/xuly_timkiem.php",{key: key,nsp: nsp}, function(data){
                            $("#cho_id").html(data);
					//alert(nsp+" "+ key);
				});
			});
			});
		</script>