<style type="text/css">
	/**
 * Oscuro: #283035
 * Azul: #03658c
 * Detalle: #c7cacb
 * Fondo: #dee1e3
 ----------------------------------*/
 * {
 	margin: 0;
 	padding: 0;
 	-webkit-box-sizing: border-box;
 	-moz-box-sizing: border-box;
 	box-sizing: border-box;
 }

 a {
 	color: #03658c;
 	text-decoration: none;
 }

ul {
	list-style-type: none;
}

body {
	font-family: 'Roboto', Arial, Helvetica, Sans-serif, Verdana;
	background: #dee1e3;
}

/** ====================
 * Lista de Comentarios
 =======================*/
.comments-container {
	margin: 10px;
	width: 600px;
}

.comments-container h1 {
	font-size: 20px;
	color: #283035;
	font-weight: 400;
}

.comments-container h1 a {
	font-size: 14px;
	font-weight: 700;
}

.comments-list {
	margin-top: 30px;
	position: relative;
}

/**
 * Lineas / Detalles
 -----------------------*/
.comments-list:before {
	content: '';
	width: 2px;
	height: 100%;
	background: #c7cacb;
	position: absolute;
	left: 32px;
	top: 0;
}

.comments-list:after {
	content: '';
	position: absolute;
	background: #c7cacb;
	bottom: 0;
	left: 27px;
	width: 7px;
	height: 7px;
	border: 3px solid #dee1e3;
	-webkit-border-radius: 50%;
	-moz-border-radius: 50%;
	border-radius: 50%;
}

.reply-list:before, .reply-list:after {display: none;}
.reply-list li:before {
	content: '';
	width: 60px;
	height: 2px;
	background: #c7cacb;
	position: absolute;
	top: 25px;
	left: -55px;
}


.comments-list li {
	margin-bottom: 10px;
	display: block;
	position: relative;
}

.comments-list li:after {
	content: '';
	display: block;
	clear: both;
	height: 0;
	width: 0;
}

.reply-list {
	padding-left: 99px;
	clear: both;
	margin-top: 10px;
}
/**
 * Avatar
 ---------------------------*/
.comments-list .comment-avatar {
	width: 65px;
	height: 65px;
	position: relative;
	z-index: 99;
	float: left;
	border: 3px solid #FFF;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius: 4px;
	-webkit-box-shadow: 0 1px 2px rgba(0,0,0,0.2);
	-moz-box-shadow: 0 1px 2px rgba(0,0,0,0.2);
	box-shadow: 0 1px 2px rgba(0,0,0,0.2);
	overflow: hidden;
}

.comments-list .comment-avatar img {
	width: 100%;
	height: 100%;
}

.reply-list .comment-avatar {
	width: 50px;
	height: 50px;
	margin-left: -30px;
}

.comment-main-level:after {
	content: '';
	width: 0;
	height: 0;
	display: block;
	clear: both;
}
/**
 * Caja del Comentario
 ---------------------------*/
.comments-list .comment-box {
	width: 500px;
	margin-left: -10px;
	float: right;
	position: relative;
	-webkit-box-shadow: 0 1px 1px rgba(0,0,0,0.15);
	-moz-box-shadow: 0 1px 1px rgba(0,0,0,0.15);
	box-shadow: 0 1px 1px rgba(0,0,0,0.15);
}

.comments-list .comment-box:before, .comments-list .comment-box:after {
	content: '';
	height: 0;
	width: 0;
	position: absolute;
	display: block;
	border-width: 10px 12px 10px 0;
	border-style: solid;
	border-color: transparent #FCFCFC;
	top: 8px;
	left: -11px;
}

.comments-list .comment-box:before {
	border-width: 11px 13px 11px 0;
	border-color: transparent rgba(0,0,0,0.05);
	left: -12px;
}

.reply-list .comment-box {
	width: 450px;
}
.comment-box .comment-head {
	background: #FCFCFC;
	padding: 10px 12px;
	border-bottom: 1px solid #E5E5E5;
	overflow: hidden;
	-webkit-border-radius: 4px 4px 0 0;
	-moz-border-radius: 4px 4px 0 0;
	border-radius: 4px 4px 0 0;
}

.comment-box .comment-head i {
	float: right;
	margin-left: 5px;
	position: relative;
	top: 2px;
	color: #A6A6A6;
	cursor: pointer;
	-webkit-transition: color 0.3s ease;
	-o-transition: color 0.3s ease;
	transition: color 0.3s ease;
}

.comment-box .comment-head i:hover {
	color: #03658c;
}

.comment-box .comment-name {
	color: #283035;
	font-size: 14px;
	font-weight: 700;
	float: left;
	margin-right: 10px;
}

.comment-box .comment-name a {
	color: #283035;
}

.comment-box .comment-head span {
	float: left;
	color: #999;
	font-size: 13px;
	position: relative;
	top: 1px;
}

.comment-box .comment-content {
	background: #FFF;
	padding: 12px;
	font-size: 15px;
	color: #595959;
	-webkit-border-radius: 0 0 4px 4px;
	-moz-border-radius: 0 0 4px 4px;
	border-radius: 0 0 4px 4px;
}

.comment-box .comment-name.by-author, .comment-box .comment-name.by-author a {color: #03658c;}
.comment-box .comment-name.by-author:after {
	content: 'autor';
	background: #03658c;
	color: #FFF;
	font-size: 12px;
	padding: 3px 5px;
	font-weight: 700;
	margin-left: 10px;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	border-radius: 3px;
}

/** =====================
 * Responsive
 ========================*/
@media only screen and (max-width: 766px) {
	.comments-container {
		width: 300px;
	}

	.comments-list .comment-box {
		width: 300px;
	}

	.reply-list .comment-box {
		width: 300px;
	}
}
</style>
<!-- Contenedor Principal -->
<div id="show">
		
	<div class="comments-container">

		<ul id="comments-list" class="comments-list">
			<li>
				<div class="comment-main-level">
					<!-- Avatar -->
					<?php
						if(isset($_SESSION['sdt'])){
							$sdt = $_SESSION['sdt'];
							mysqli_set_charset($conn,"UTF8");
							$ha = mysqli_fetch_row(mysqli_query($conn,"SELECT HA_TEN FROM HINHANH WHERE USR_SDT = '$sdt'"));
							$ha_ten= "upload/".$ha[0];
							

						}else{
							$ha_ten = "logo_image/guest.png";
							
						}
					?>
					<div class="comment-avatar"><img src="<?php echo $ha_ten; ?>" alt=""></div>
					<!-- Contenedor del Comentario -->
					<div class="comment-box">
						<div class="comment-head">
						
							<h6 class="comment-name "></h6>
							
										

							<span>Bình luận mới</span>
							<i class="fa ">	<input id="btn_cmt" class="w3-input w3-green w3-round" style="width: 90px; margin-top: 2%;" type="button" value="Bình luận"></i>
						</div>
						<div class="comment-content">
						<input id="ip_cmt" placeholder="Nhập bình luận" class="w3-input" style="margin-left: 3%; width: 97%; border-radius: 7px; height: 10px; margin-top: 5%; "/>
						</div>
					</div>
				</div>
			</li>

<?php 
		include("config/connect.php");
		$sp_id = $_SESSION['sp_bl'];
		mysqli_set_charset($conn,"UTF8");
		$sql = "SELECT * FROM BINH_LUAN WHERE SP_ID = $sp_id ORDER BY BL_THOIGIAN DESC ";
		$rs= mysqli_query($conn,$sql);
		while($cmt = mysqli_fetch_array($rs,MYSQLI_ASSOC)){
?>
			<li>
				<div class="comment-main-level">
					<!-- Avatar -->
					<?php
						if(isset($cmt['USR_BL']) && $cmt['USR_BL'] != "Guest"){
							$sdt = $cmt['USR_BL'] ;
							mysqli_set_charset($conn,"UTF8");
							$ha = mysqli_fetch_row(mysqli_query($conn,"SELECT HA_TEN FROM HINHANH WHERE USR_SDT = '$sdt'"));
							$ha_ten= "upload/".$ha[0];
					
						}else{
							$ha_ten = "logo_image/guest.png";
							
						}
					?>
					<div class="comment-avatar"><img src="<?php echo $ha_ten; ?>" alt=""></div>
					<!-- Contenedor del Comentario -->
					<div class="comment-box">
						<div class="comment-head">
							<?php
								$sdt = $cmt['USR_BL'];
								mysqli_set_charset($conn,"UTF8");
							$sql = "SELECT USR_HO, USR_TEN FROM USER WHERE USR_SDT= '$sdt'";
							$res = mysqli_query($conn,$sql);
							$count =mysqli_num_rows($res) ;
							if($count > 0){
									$ur_bl = mysqli_fetch_row($res);
							?>
							<h6 class="comment-name "><a href=""><?php echo $ur_bl[0]." ".$ur_bl[1]; ?></a></h6>
							<?php 
						} else{
							?>
														<h6 class="comment-name "><a href="http://creaticode.com/blog"><?php echo $sdt; ?></a></h6>

							<?php
						}
									$tg = date( "m/d/Y", strtotime($cmt['BL_THOIGIAN']))." - " .date("H:i:s", strtotime($cmt['BL_THOIGIAN']));
									//$cachday = date("Y-m-d", $tg);
							?>
							<span>Bình luận lúc <?php echo $tg; ?></span>
							<?php
								if( isset($_SESSION['sdt']) && $_SESSION['sdt'] == $cmt['USR_BL']){
							?>
							<input style="display: none;" type="text" id="del_<?php echo $cmt['BL_ID']; ?>" value="<?php echo $cmt['BL_ID']; ?>">
							<i id="btn_del<?php echo $cmt['BL_ID']; ?>" style="color: red;"  class="fa fa-trash"></i>
					
						<script type="text/javascript">
							$("#btn_del<?php echo $cmt['BL_ID']; ?>").click(function(){
							var sp = <?php echo $row['SP_ID']; ?>;
									var del_cmt = $("#del_<?php echo $cmt['BL_ID']; ?>").val();
									if(confirm("Bạn có chắc muốn xóa bình luận này?")){
									$.post("process_ajax/xuly_binhluan.php", {flat_del_cmt: 0,cmt_id: del_cmt, sp_id: sp}, function(data){
									$("#alert").html(data);
								});
								}
							});
						</script>
						<?php
					}
						?>
							</div>
						<div class="comment-content">
							<?php echo $cmt['ND_BL']; ?>
						</div>
					</div>
				</div>
				<!-- Respuestas de los comentarios -->


				<ul class="comments-list reply-list">
					<?php
						$cmt_id = $cmt['BL_ID'];
						mysqli_set_charset($conn,"UTF8");
						$sql1 = "SELECT * FROM BINHLUAN_TRALOI WHERE BL_ID = $cmt_id ORDER BY BLTL_THOIGIAN DESC LIMIT 0,5";
						$result_rl = mysqli_query($conn,$sql1);
					while($cmt_rl = mysqli_fetch_array($result_rl,MYSQLI_ASSOC)){
					?>
					<li>
						<!-- Avatar -->
						<?php
						if(isset($cmt_rl['BLTL_USR']) && $cmt_rl['BLTL_USR'] != "Guest"){
							$sdt = $cmt_rl['BLTL_USR'] ;
							mysqli_set_charset($conn,"UTF8");
							$ha = mysqli_fetch_row(mysqli_query($conn,"SELECT HA_TEN FROM HINHANH WHERE USR_SDT = '$sdt'"));
							$ha_ten= "upload/".$ha[0];
						
						}else{
							$ha_ten = "logo_image/guest.png";
						
						
						}
					?>
						<div class="comment-avatar"><img src="<?php echo $ha_ten; ?>" alt=""></div>
						<!-- Contenedor del Comentario -->
						<div class="comment-box">
							<div class="comment-head">
								<?php
								$sdt = $cmt_rl['BLTL_USR'];
							$sql1= "SELECT USR_HO, USR_TEN FROM USER WHERE USR_SDT= '$sdt'";
							$res1=mysqli_query($conn,$sql1);
							$count =mysqli_num_rows($res1) ;
							if($count > 0){
									$ur_bl = mysqli_fetch_row($res1);
							?>
							<h6 class="comment-name "><a href="http://creaticode.com/blog"><?php echo $ur_bl[0]." ".$ur_bl[1]; ?></a></h6>
							<?php 
						} else{
							?>
														<h6 class="comment-name "><a href="http://creaticode.com/blog"><?php echo $sdt; ?></a></h6>

							<?php
						}
									$tg_rl = date( "m/d/Y", strtotime($cmt_rl['BLTL_THOIGIAN']))." - " .date("H:i:s", strtotime($cmt['BL_THOIGIAN']));
									//$cachday = date("Y-m-d", $tg);
							?>
								<span>Bình luận lúc <?php echo $tg_rl; ?></span>
								<?php
								if( isset($_SESSION['sdt']) && $_SESSION['sdt'] == $cmt['USR_BL']){
?>
								<input style="display: none;" type="text" id="del_rep_<?php echo $cmt_rl['BLTL_ID']; ?>" value="<?php echo $cmt_rl['BLTL_ID']; ?>">
							<i id="btn_del_rep<?php echo $cmt_rl['BLTL_ID']; ?>" style="color: red;"  class="fa fa-trash"></i>
							<?php
						}
							?>
							</div>
							<script type="text/javascript">
						$("#btn_del_rep<?php echo $cmt_rl['BLTL_ID']; ?>").click(function(){
							var sp = <?php echo $row['SP_ID']; ?>;
								var cmt_rep = $("#del_rep_<?php echo $cmt_rl['BLTL_ID']; ?>").val();
								if(confirm("Bạn có chắc muốn xóa bình luận này?")){
								$.post("process_ajax/xuly_binhluan.php", {flat_del_cmt_rep: 0,cmt_rep_id: cmt_rep,sp_id: sp}, function(data){
									$("#alert").html(data);
								});
							}
						});
					</script>
							<div class="comment-content">
								<?php  echo $cmt_rl['BLTL_NOIDUNG']; ?>
							</div>
						</div>
					</li>
					
					<?php
				}
					?>
					<li>
						<!-- Avatar -->
						<?php
						if(isset($_SESSION['sdt'])){
							$sdt = $_SESSION['sdt'];
							mysqli_set_charset($conn,"UTF8");
							$ha = mysqli_fetch_row(mysqli_query($conn,"SELECT HA_TEN FROM HINHANH WHERE USR_SDT = '$sdt'"));
							$ha_ten= "upload/".$ha[0];
						
						}else{
							$ha_ten = "logo_image/guest.png";
						
						}
					?>
						<div class="comment-avatar"><img src="<?php echo $ha_ten; ?>" alt=""></div>
						<!-- Contenedor del Comentario -->
						<div class="comment-box">
							<div class="comment-head">
								<h6 class="comment-name"><a href="http://creaticode.com/blog"></a></h6>
								
								<span>Trả lời bình luận</span>
								<i class="fa ">	<input id="btn_cmt_rep<?php echo $cmt['BL_ID']; ?>" class="w3-input w3-green w3-round" style=" font-size: 11px; width: 50px; margin-top: 2%;" type="button" value="Trả lời"></i>
							</div>
							<div class="comment-content">
							<input id="ip_cmt_rep<?php echo $cmt['BL_ID']; ?>" placeholder="Nhập trả lời bình luận" class="w3-input" />
							</div>
						</div>
					</li>
					<script type="text/javascript">
						$("#btn_cmt_rep<?php echo $cmt['BL_ID']; ?>").click(function(){
						var cmt_rep = $("#ip_cmt_rep<?php echo $cmt['BL_ID']; ?>").val();
						var sp = <?php echo $row['SP_ID']; ?>;
						var cmt_id = <?php echo $cmt['BL_ID']; ?>;
						<?php  if(isset($_SESSION['sdt']))
						{
							?>
							var  usr = <?php echo $_SESSION['sdt'] ?>;
							<?php
						} else{

							?>
							var usr ="Guest";
							<?php
						}
						?>
						if(cmt_rep==""){
							alert("Bạn chưa nhập trả lời bình luận!")
						}else{
							
								$.post("process_ajax/xuly_binhluan.php", {flat_rep: 0,sp_id: sp, nd_cmt_rep: cmt_rep, usr: usr,cmt_id: cmt_id}, function(data){
									$("#alert").html(data);
								});

						}
						});
					</script>
				</ul>
			</li>
			<?php
				}
			?>
		</ul>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
			$("#btn_traloi").click(function(){
					$("#show").load('views/popup_traloi.php');
			});
			$("#btn_cmt").click(function(){
						var cmt = $("#ip_cmt").val();
						var sp = <?php echo $row['SP_ID']; ?>;
						<?php  if(isset($_SESSION['sdt']))
						{
							?>
							var  usr = "<?php echo $_SESSION['sdt'] ?>";
							<?php
						} else{

							?>
							var usr ="Guest";
							<?php
						}
						?>
					
						
						if(cmt==""){
							alert("Bạn chưa nhập bình luận!")
						}else{
							
								$.post("process_ajax/xuly_binhluan.php", {flat_cmt:0,sp_id: sp, nd_cmt: cmt, usr: usr}, function(data){
									$("#alert").html(data);
								});

						}
						
			});
	});
</script>
