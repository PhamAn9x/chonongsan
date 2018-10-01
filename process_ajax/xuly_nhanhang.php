 <?php 
 session_start();
 include('../config/connect.php');
    if(isset($_POST['key'])) {
      $dtb = $_POST['key'];
      $dtm = $_SESSION['sdt'];
         $rs1 = mysqli_query($conn,"UPDATE KHOPLENH SET KL_TRANGTHAI = 2 WHERE KL_SDT_BAN = '$dtb' AND KL_SDT_MUA = '$dtm' AND KL_TRANGTHAI = 1");
         if($rs1) {
          ?>
          <meta http-equiv="Refresh" content="0,URL=index.php?view=ql_khoplenh" />
            <script type="text/javascript">alert('Xác nhận! Nhận hàng thành công!');</script>
          <?php
         }
    }                      
?>
      