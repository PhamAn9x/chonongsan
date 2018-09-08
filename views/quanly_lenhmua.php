    <?php 
        if(isset($_SESSION['sdt'])){
    ?>
<!--     <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>-->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="css/tindang.css" rel="stylesheet" />
    <link type="text/css" href="css/css_ck.css"/>
    <script type="text/javascript" src="ajax/ajax_tinhthanh.js"></script>
    <script type="text/javascript" src="ajax/ajax_loaisp.js"></script>
    <script type="text/javascript" src="ajax/ajax_check_sdt.js"></script>
    <script type="text/javascript" src="js/check_dangtin.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<div id = "alert"></div>
    <?php
        include("config/connect.php");
    ?>
    <form name="qldangtin" id="qldangtin" method="post" class="tindang">
        <div class="w3-row khung">
            <div class="w3-row">
            <h1>QUẢN LÝ LỆNH MUA</h1>
             <hr style="border: 2px;">
            </div>
            <style type="text/css">
                .tb tr td{
                    text-align: center;
                }
            </style>
          <div class="w3-col s12 w3-white w3-round">
           <div class="w3-col s5" style="margin-bottom: 2%;">
                <input style="width: 50%; float: left; margin-right: 3%;" class="w3-input" type="text" name="iptimkiem" id="ip" placeholder="Nhập tên sản phẩm để tìm">
                <input type="button" id="timkiem" style="float: left; width: 30%;" class="w3-button w3-green w3-hover-red w3-round" value="Tìm kiếm" />
            </div>
            <div id="output">
                <table class="w3-table-all w3-hoverable w3-large tb">
                    <tr class="w3-green w3-center" style="font-size: 20px;">
                        <td>STT</td>
                        <td>Mã sản phẩm</td>
                        <td>Tên sản phẩm</td>
                        <td>Giá sản phẩm</td>
                        <td>Số lượng còn lại</td>
                        <td>Tổng lô hàng</td>
                        <td>Ngày đăng</td>
                        <td>Xóa lệnh</td>

                    </tr>
                    <?php 
                        include('config/connect.php');
                        mysqli_set_charset($conn,'UTF8');
                        $sdt = $_SESSION['sdt'];
                        $sql = "SELECT * FROM LENH WHERE L_TEN ='mua' AND L_SDT ='$sdt'";
                        $rs = mysqli_query($conn,$sql);
                        $i=1;
                        if(mysqli_num_rows($rs)<1){
                            ?>
                            <tr>
                                <td colspan="9"> <i> Bạn chưa đặt lệnh mua!</i></td>
                            </tr>
                            <?php
                        } else
                        foreach ($rs as $value) {
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $value['SP_ID']; ?></td>
                        <td><?php echo $value['SP_TEN']; ?></td>
                        <td><?php echo adddotstring($value['L_GIA']); ?></td>
                        <td><?php echo $value['L_SOLUONG']; ?></td>        
                        <td><?php echo adddotstring($value['L_GIA']*$value['L_SOLUONG'])." VNĐ"; ?></td>
                        <td><?php echo $value['L_NGAYDAT']; ?></td>
                        
                        <input style="display: none;" type="text" id="<?php echo $value['SP_ID']; ?>">
                        <td><img id="delete<?php echo $value['SP_ID']; ?>" src="logo_image/delete.png" style=" cursor: pointer; width: 30px; height: 30px;"></td>
                    </tr>

                    <script type="text/javascript">
                            $(document).ready(function(){
                                $("#delete<?php echo $value['SP_ID']; ?>").click(function(){
                                    var id = <?php echo $value['SP_ID']; ?>;
                                    var sdt =  "0"+<?php echo $sdt; ?>;
                                    if(confirm('Bạn có chắc muốn xóa lệnh mua?')){
                                   $.post("process_ajax/xoa_lenhmua.php", {key: id, sdt : sdt}, function(data){
                                        $("#alert").html(data);
                                    });
                               }
                                });
                            });
                      </script>

                    <?php
                    $i++;
                }
                ?>
                </table>
            </div>
          </div>
    </form>
    
  <?php 
    } else 
        {
            echo "<script>alert('Vui lòng đăng nhập trước khi kiểm tra sản phẩm!');</script>";
            echo '<meta http-equiv="Refresh" content="0,URL=index.php?view=dangnhap" />';
        }
?>
<script type="text/javascript">
    $(document).ready(function(){
         $("#timkiem").click(function(){
            var key = $("#ip").val();
            $.post("process_ajax/data_xuly_timkiem_lenh.php", {key: key}, function(data){
                $("#output").html(data);
            });
        });
     });
</script>