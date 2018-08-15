    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
      <link rel="stylesheet" href="vendor/menu/css/style.css">
<!-- <div style="margin-top: 7px;">
      <div class="w3-col" style="  margin-left: 5px; text-align: center;border-radius: 5px;">
      <div class="w3-col s3" style="margin-top: 62px;">
        <panel style=" height: 100px; margin-bottom: 20px; font-size: 23px;font-family: 'roboto'; font-weight: 700; color: white; " ><img src="logo_image/logo_dm.png"></panel>
 <div> -->

  <?php 
      include("config/connect.php");
      mysqli_set_charset($conn, 'UTF8');
      $sql = "SELECT * FROM NHOMSANPHAM";
      $result = mysqli_query($conn,$sql);
      while($rows = mysqli_fetch_array($result,MYSQLI_ASSOC)){
        $nsp = $rows['NSP_ID'];
  ?>
  <ul style="width: 100%;">
    <li class="dropdown">
      <a href="#" data-toggle="dropdown"><?php echo $rows['NSP_TEN']; ?><i class="icon-arrow"></i></a>
      <ul class="dropdown-menu">
      <?php 
        $sql1 = "SELECT * FROM LOAISANPHAM WHERE NSP_ID = '$nsp'";
        $rs = mysqli_query($conn,$sql1);
        while($r = mysqli_fetch_array($rs,MYSQLI_ASSOC)){
      ?>
      <li><a href="#"><?php echo $r['LSP_TEN']; ?></a></li>
  <?php
}
?>
</ul>
<?php
    }
  ?>
 
    <script  src="vendor/menu/js/index.js"></script>