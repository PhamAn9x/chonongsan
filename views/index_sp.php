<div class="w3-col s1">
  <img style="border-radius: 7px; margin-top: 15%;" src="upload/52sau_rieng_musang_king_4.jpg" width="150px" height="120px">
  <img style="border-radius: 7px; margin-top: 15%;" src="upload/52sau_rieng_musang_king_4.jpg" width="150px" height="120px">

  <img style="border-radius: 7px; margin-top: 15%;" src="upload/52sau_rieng_musang_king_4.jpg" width="150px" height="120px">

  <img style="border-radius: 7px; margin-top: 15%;" src="upload/52sau_rieng_musang_king_4.jpg" width="150px" height="120px">


</div>
<div class="w3-col s10">
    <link rel="icon" href="http://www.thuthuatweb.net/wp-content/themes/HostingSite/favicon.ico" type="image/x-ico"/>
     <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
	<link href="css/style_sp.css" rel="stylesheet" />



<style type="text/css">
    .pagination {
  list-style: none;
  display: inline-block;
  padding: 0;
  margin-top: 10px;
}
.pagination li {
  display: inline;
  text-align: center;
}
.pagination a {
  float: left;
  display: block;
  font-size: 14px;
  text-decoration: none;
  padding: 5px 12px;
  color: #fff;
  margin-left: -1px;
  border: 1px solid transparent;
  line-height: 1.5;
}
.pagination a.active {
  cursor: default;
}
.pagination a:active {
  outline: none;
}
.modal-1 li:first-child a {
  -moz-border-radius: 6px 0 0 6px;
  -webkit-border-radius: 6px;
  border-radius: 6px 0 0 6px;
}
.modal-1 li:last-child a {
  -moz-border-radius: 0 6px 6px 0;
  -webkit-border-radius: 0;
  border-radius: 0 6px 6px 0;
}
.modal-1 a {
  border-color: #ddd;
  color: #4285F4;
  background: #fff;
}
.modal-1 a:hover {
  background: #eee;
}
.modal-1 a.active, .modal-1 a:active {
  border-color: #4285F4;
  background: #4285F4;
  color: #fff;
}
</style>
<div id="cho_id">
  
  <div class="w3-teal" style=" width: 90%; border-radius:5px 0 0 0; height: 45px;  margin-top: 0px; font-size: 25px;text-align: center; padding-top: 2px; margin-left: 5%; font-family: 'roboto'; font-weight: 700; ">SÀN GIAO DỊCH NÔNG SẢN TRỰC TUYẾN</div>
 <div class="container-item" style="padding-left: 4%;">
<div id="xemthem">

<?php 
    include("config/connect.php");
    mysqli_set_charset($conn, 'UTF8');
    $sql = "SELECT *,(SELECT HA_TEN FROM HINHANH as ha WHERE ha.SP_ID = sp.SP_ID limit 1) as HA_TEN FROM sanpham as sp WHERE SP_TRANGTHAI = 1 LIMIT 0,8";
    $result = mysqli_query($conn,$sql);
    while($rows = mysqli_fetch_array($result,MYSQLI_ASSOC))
    {
?>
                <div class="itemnew" style="width: 225px;height: 225px; margin-left: 1%;">
                    <!-- item image -->
                    <div class="item-img">
                        <img src="upload/<?php echo $rows['HA_TEN']; ?>" width="230px" height="230px" />
                    </div>

                    <div class="item-content">
                        <div class="item-top-content">
                            <div class="item-top-content-inner">
                                <div class="item-product">
                                    <div class="item-top-title">
                                        <h2 style="width: 200px; font-size: 17px; font-weight: 900;text-shadow: currentColor;"><?php echo $rows['SP_TEN']; ?></h2>
                                       
                                    </div>
                                </div>
                                <div class="item-product" style="width: 200px;">
                                    <?php 
                                    $sp_id = $rows['SP_ID'];
                            $sql = "SELECT MIN(L_GIA) AS GIA_M FROM LENH WHERE SP_ID = $sp_id AND L_TEN = 'ban' ";
                            $dong = mysqli_fetch_row(mysqli_query($conn,$sql));
                            if( $dong[0] != null){
                                
                            ?>
                                     <span style="font-weight:600; color: blue;">Bán: </span><span class="price-num" style="color: red; font-size:12px; font-weight: 700"><?php echo adddotstring( $dong[0]); ?>
                                        
                                    </span>
                                     /
                                         <span style="color: black">
                                            <?php echo $rows['SP_DONVITINH']; ?>
                                        </span>
                                        <?php
                                            }else{
                                                ?>
                                                <span style="font-weight:600; color: blue;">Bán: </span><span class="price-num" style="color: red; font-size:11px; font-weight: 700"><?php echo "Đang cập nhật"; ?>
                                        
                                    </span>
                                                <?php
                                            }
                                        ?>
                                         <br /> 
                                   <?php 
                                    $sp_id = $rows['SP_ID'];
                            $sql = "SELECT MAX(L_GIA) AS GIA_M FROM LENH WHERE SP_ID = $sp_id AND L_TEN = 'mua' ";
                            $dong = mysqli_fetch_row(mysqli_query($conn,$sql));
                            if( $dong[0] != null){
                                
                            ?>
                                     <span style="font-weight:600; color: blue;">Mua: </span><span class="price-num" style="color: red; font-size:12px; font-weight: 700"><?php echo adddotstring( $dong[0]); ?>
                                        
                                    </span>
                                     /
                                         <span style="color: black">
                                            <?php echo $rows['SP_DONVITINH']; ?>
                                        </span>
                                        <?php
                                            }else{
                                                ?>
                                                <span style="font-weight:600; color: blue;">Bán: </span><span class="price-num" style="color: red; font-size:11px; font-weight: 700"><?php echo "Đang cập nhật"; ?>
                                        
                                    </span>
                                                <?php
                                            }
                                        ?>
                                </div>
                                <?php
                                if(isset($_SESSION['sdt'])){
                                    // $sp_id = $rows['SP_ID'];
                                    $sdt = $_SESSION['sdt'];
                                    $dathich = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM THICH WHERE USR_SDT = $sdt AND SP_ID = $sp_id"));
                                                            if($dathich < 1){
                                ?>
                              <a href="views/xuly_thich.php?id=<?php echo $sp_id.'&usr='.$sdt; ?>" ><img style="position: absolute; top:40%; left: 80%;" title="Thích" src="logo_image/ictim2.png" width="30px" height="30px"></a>
                              <?php
                                } else{
                            ?>
                                 <a href="views/xuly_bothich.php?id=<?php echo $sp_id.'&usr='.$sdt; ?>" ><img style="position: absolute; top:40%; left: 80%;" src="logo_image/ictim.png" title="Bỏ thích" width="37px" height="37px"></a>
                           <?php 
                                }
                                }
                            ?>
                            </div>  
                        </div>
                        <div class="item-add-content">
                            <div class="item-add-content-inner">
                                <div class="section">
                                    <p>Ngày đăng: <?php echo $rows['SP_NGAYDANG']; ?></p>
                                    <p>Đơn vị: HTX Huyện Long Mỹ</p>
                                </div> 
                                 <div class="section">
                                        <a href="index.php?xem=chitietsanpham&id=<?php echo $rows['SP_ID'];?>" class="btn buy expand">Chi tiết / Đặt hàng</a>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
              
               
<?php
    }
?>
</div>
</div>
 <div class="w3-col s12" style="text-align: center;">
    <?php
        $sql_trang = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM SANPHAM"));
        $phan_trang = ceil(($sql_trang-8)/8);
     ?>
     <div id="nut">
      <input class="w3-button w3-red w3-hover-green w3-round" type="button" name="btxemthem" id="btxemthem" value="Xem thêm">
  </div>
    <script type="text/javascript">
        $(document).ready(function(){  
            var id_trang =<?php echo $phan_trang;?>;
            var trang_id =<?php echo $phan_trang;?>;
            $("#btxemthem").click(function(){
              
                if(id_trang > 0){
                 $.get("process_ajax/xuly_phantrang.php", {trang: trang_id}, function(data){
                            $(data).appendTo("#xemthem").hide().fadeIn(1500);  
                        });
                 id_trang = id_trang-1;
                 if(id_trang==0){
                    $("#nut").html('<input disabled class="w3-button w3-red w3-hover-green w3-round" type="button" name="btxemthem" id="btxemthem" value="Không còn sản phẩm">');
                 }
                }
            });
            if(id_trang==0){
                    $("#nut").html('<input disabled class="w3-button w3-red w3-hover-green w3-round" type="button" name="btxemthem" id="btxemthem" value="Không còn sản phẩm">');
                 }
        });
    </script>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" charset="utf-8"></script>
    
<script type="text/javascript">
   $(document).ready(function() {

        $(".share-btn").mouseenter(function() {

            // find the closest class .item-menu
            
            $(this).closest("div.container-item").find(".item-menu").addClass("visible")
        });
        $(".share-btn").mouseleave(function() {
            setTimeout(function() {
            $(".item-menu").removeClass("visible")
            }, 500);
        });

        

        $(".container-item").hover(function() {
            setTimeout(function() {
            $(".container-item").css("z-index","1000")
            }, 500);
        });


});

</script>   
</div>
 </div>
 <div class="w3-col s1" style="padding-left: 0%;">
    <img style="border-radius: 7px; margin-left: -40px; margin-top: 15%;" src="upload/52sau_rieng_musang_king_4.jpg" width="150px" height="120px">
  <img style="border-radius: 7px; margin-left: -40px; margin-top: 15%;" src="upload/52sau_rieng_musang_king_4.jpg" width="150px" height="120px">

  <img style="border-radius: 7px; margin-left: -40px; margin-top: 15%;" src="upload/52sau_rieng_musang_king_4.jpg" width="150px" height="120px">

  <img style="border-radius: 7px; margin-left: -40px; margin-top: 15%;" src="upload/52sau_rieng_musang_king_4.jpg" width="150px" height="120px">

 </div>