<div style="position: relative; left: 16%; top:10%">
    <link rel="icon" href="http://www.thuthuatweb.net/wp-content/themes/HostingSite/favicon.ico" type="image/x-ico"/>
     <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
	<link href="vendor/pd_item/style.css" rel="stylesheet" />
   <div class="w3-teal w3-round" style=" width: 60%; height: 50px;  margin-top: 10px; font-size: 25px;text-align: center; padding-top: 10px;">SẢN PHẨM TRƯNG BÀY</div>
</div>

<?php 
    include("config/connect.php");
    mysqli_set_charset($conn, 'UTF8');
    $sql = "SELECT * FROM SANPHAM AS SP LEFT JOIN HINHANH AS HA ON SP.SP_ID = HA.SP_ID";
    $result = mysqli_query($conn,$sql);
    while($rows = mysqli_fetch_array($result,MYSQLI_ASSOC))
    {
?>
            <div class="container-item">
                <div class="item">
                    <!-- item image -->
                    <div class="item-img">
                        <img src="server/php/files/<?php echo $rows['HA_TEN']; ?>" width="260" height="260" />
                    </div>

                    <div class="item-content">
                        <div class="item-top-content">
                            <div class="item-top-content-inner">
                                <div class="item-product">

                                    <div class="item-top-title">
                                        <h2 style="font-size: 19px; font-weight: 500"><?php echo $rows['SP_TEN']; ?></h2>
                                       
                                    </div>
                                </div>
                                <div class="item-product-price">
                                    <span class="price-num" style="color: red; font-size:16px;"><?php echo $rows['SP_GIA']; ?>/<?php echo $rows['SP_DONVITINH']; ?></span>
                                
                                </div>
                            </div>  
                        </div>
                        <div class="item-add-content">
                            <div class="item-add-content-inner">
                                <div class="section">
                                    <p>Ngày đăng: <?php echo $rows['SP_NGAYDANG']; ?></p>
                                    <p>Đơn vị: HTX Huyện Long Mỹ</p>
                                </div> 
                                <div class="section">
                                    <a href="#" class="btn buy expand">Chi tiết / Đặt hàng</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
<?php
    }
?>
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
