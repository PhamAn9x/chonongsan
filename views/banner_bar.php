<link rel="stylesheet" href="css/style_hover.css">
<div class="w3-col s2 "><a href="index.php"><img src="logo_image/logo.png"></a></div>
		<div class="w3-col s10 ">
			<form name="frtimkiem" id="frtimkiem" method="get">
				<table>
					<tr>
						<td>
							<div style="float: left;">
								<select class="w3-input w3-border" style="width: 250px;">
									<option>Chọn danh mục</option>
								</select>
							</div>
							<div style="float: left; padding-left: 10px;">
								<input class="w3-input w3-border" type="tetx" name="iptimkiem" id="iptimkiem" placeholder="Nhập từ khóa cần tìm">
							</div>	
							<div style="float: left; margin-left:5px; width: 150px;">
								<button class="w3-btn w3-round w3-green" name="btntimkiem" id="btntimkiem" style=" width: 125px;margin-left: 5px;" ><span style="font-weight: 700;">Tìm kiếm</span></button>
							</div>						
						</td>
							<td
								style=" font-size: 16px; font-weight: 800; float:left; margin-top:10px; margin-right: 7px;"><img src="logo_image/ictim.png" width="30px" height="30px"><a href="" style=" text-decoration: none; color: black"> Thích(0)</a>
							</td>
							<?php
								if(isset($_SESSION['user'])){
							?>
								<td class="w3-border-left w3-border-right" style="font-weight: 600; padding-top: 3px; padding-left: 3px; font-size: 16px;">
									<div class="menu">
										<p style="font-size: 18px; font-family: 'roboro'; margin-bottom: 2%;">
											Xin chào <span style="color: red; font-size: 23px;"><?php echo $_SESSION['user']; ?></span></p>
											    <ul>
											     <a href="#"><li>Quản lí tin đăng</li></a>
											     <a href="#"><li>Đơn hàng đặt mua</li></a>
											      <li>Tạo gian hàng</li>
											      <li>Thông tin tài khoản</li>
											      <li>Đổi mật khẩu</li>
											      <a href="?view=dangxuat"><li>Đăng xuất</li></a>
											    </ul>
											</div>
									<!-- <img style="margin-left:7px;" src="logo_image/icondn.png" width="25px" height="25px"><span style="padding-left: 7px;"><a href="?view=dangnhap" style=" text-decoration: none; color: black;"> Xin chào <?php echo $_SESSION['user']; ?> </a></span>  
									<span style="font-size: 17px;">/</span>
									<span style="padding-right:7px;"><a href="?view=dangxuat" style=" text-decoration: none;color: black;">Đăng xuất</a></span>   -->
								</td>
							<?php	
								}else{
							?>
								<td class="w3-border-left w3-border-right" style="font-weight: 600; padding-top: 3px; padding-left: 3px; font-size: 16px;">
									<img style="margin-left:7px;" src="logo_image/icondn.png" width="25px" height="25px"><span style="padding-left: 7px;"><a href="?view=dangnhap" style=" text-decoration: none; color: black;"> Đăng nhập </a></span>  
									<span style="font-size: 17px;">/</span>
									<span style="padding-right:7px;"><a href="?view=dangky" style=" text-decoration: none;color: black;">Đăng ký</a></span>  
								</td>

							<?php
								}
							?>
							
							<td>
								<a href="?view=dangtin" class="w3-btn w3-round w3-red" style="margin-top: 4px; margin-left: 30%; width: 125px;";><span style="font-weight: 700">Đăng tin</span></a>
							</td>

						</tr>
					</table>
				</form>
			</div>
		</div>