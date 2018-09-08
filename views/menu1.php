<div class="col-sm-12">
	<ul id="menu">
		<li><a style=" color:yellow; ">MENU SẢN PHẨM</a></li>
	<?php 
      include("config/connect.php");
      mysqli_set_charset($conn, 'UTF8');
      $sql = "SELECT * FROM NHOMSANPHAM";
      $result = mysqli_query($conn,$sql);
      while($rows = mysqli_fetch_array($result,MYSQLI_ASSOC)){
        $nsp = $rows['NSP_ID'];
 	?>
				  <li><a href="?nsp=<?php echo $nsp; ?>"><?php echo $rows['NSP_TEN'];?></a>
				  	<ul>
	<?php
						

	?>
	<?php
        $sql1 = "SELECT * FROM LOAISANPHAM WHERE NSP_ID = '$nsp'";
        $rs = mysqli_query($conn,$sql1);
        while($r = mysqli_fetch_array($rs,MYSQLI_ASSOC)){
    ?>
							<li><a href="?lsp=<?php echo $r['LSP_ID']; ?>"><?php echo $r['LSP_TEN']; ?></a></li>
	<?php
		}
	?>
						</ul>
					</li>
	<?php
		}
	?>			
				</ul>
			</div>