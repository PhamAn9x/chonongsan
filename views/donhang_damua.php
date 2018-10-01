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
            <h1>ĐƠN HÀNG ĐÃ ĐẶT MUA</h1>
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
            <div class="w3-col s7 w3-right" style="padding-left: 34%;">
                Sắp xếp theo :
                <select id="sls" class="w3-select" style="width: 50%;">
                    <option value="">Chọn thứ tự sắp xếp</option>
                    <option value="SP_TEN">Tên sản phẩm</option>
                    <option value="SP_TRANGTHAI">Trạng thái hàng hóa</option>
                    <option value="TT_ID">Trang thái tin đăng</option>
                </select>
            </div>
            <div id="output">
                 <table class="w3-table-all w3-hoverable w3-large tb ">
                    <tr style="background-color: green; color: white;">
                        <td>STT</td>
                        <td>Ngày đặt hàng</td>
                        <td>Trạng thái đơn hàng</td>
                        <td>Sản phẩm</td>
                        <td>Tổng tiền</td>
                    </tr>
                <?php
                    mysqli_set_charset($conn,'UTF8');
                    include('config/connect.php');
                    $sdt = $_SESSION['sdt'];
                    $sql ="SELECT * FROM DONHANG WHERE DH_SDT = '$sdt'";
                    $rs = mysqli_query($conn,$sql);
                    $i=1;
                   while($row = mysqli_fetch_array($rs,MYSQLI_ASSOC)){
                    ?>
                    <tr>
                        <td style="vertical-align: middle;"><?php echo $i; ?></td>
                        <td style="vertical-align: middle;" ><?php echo $row['DH_NGAYDAT']; ?></td>
                        <td style="vertical-align: middle;">
                            <?php 
                                  $tt = $row['DH_TRANGTHAI'];
                                  if($tt == 1){
                                    ?>
                                        <span>Đối tác đã nhận<br>được đơn đặt hàng</span>
                                    <?php
                                  }else
                                    if($tt == 2){
                                        ?>
                                         <span>Đối tác đang xử lý</span>
                                    <?php
                                    } else
                                    if($tt==3){
                                        ?>
                                         <span>Đã giao hàng</span>
                                        <?php
                                    }
                            ?>
                                
                            </td>
                        <?php
                            $dh_id  = $row['DH_ID'];
                            $sql = "SELECT * FROM SANPHAMDONHANG WHERE DH_ID = $dh_id";
                            $rs2 = mysqli_query($conn,$sql);
                            $sd = mysqli_num_rows($rs2);
                        ?>
                        <td style="text-align: left;">
                          <?php 
                             while($row2 = mysqli_fetch_array($rs2,MYSQLI_ASSOC)){
                                $sp_id = $row2['SP_ID']; 
                                mysqli_set_charset($conn,'UTF8');
                                $sql = "SELECT * FROM SANPHAM WHERE SP_ID = $sp_id";
                                 $rs3 = mysqli_query($conn,$sql);
                                while($row3 = mysqli_fetch_array($rs3,MYSQLI_ASSOC)){
                                    echo '+ '.$row3['SP_TEN'].'<br>';
                                }
                                
                            }
                          ?>
                        </td>
                        <td style="vertical-align: middle;"><?php echo adddotstring($row['DH_TONGTIEN']).' VNĐ';  ?></td>
                    </tr>
                   
                               <?php
                    $i++;
                        }
                        
                   
                ?>
               
                   
                </table>
    </div>
  <?php 
    } else 
        {
            echo "<script>alert('Vui lòng đăng nhập trước khi kiểm tra đơn hàng!');</script>";
            echo '<meta http-equiv="Refresh" content="0,URL=index.php?view=dangnhap" />';
        }
?>

<!-- 
 <?php
                    // $dh_id  = $row['DH_ID'];
                    // $sql = "SELECT * FROM SANPHAMDONHANG WHERE DH_ID = $dh_id";
                    // $rs2 = mysqli_query($conn,$sql);
                    //     while($row2 = mysqli_fetch_array($rs2,MYSQLI_ASSOC)){
                    //         $sp_id = $row2['SP_ID'];
                    //         $sql = "SELECT * FROM SANPHAM WHERE SP_ID = $sp_id";
                    //           mysqli_set_charset($conn,'UTF8');
                    //         $rs3 = mysqli_query($conn,$sql);
                    //         while($row3 = mysqli_fetch_array($rs3,MYSQLI_ASSOC)){
                    //            ?> -->