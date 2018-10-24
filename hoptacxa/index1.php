<?php
session_start();
if(isset($_SESSION['qt_htx'])){
  $htx_id = $_SESSION['qt_htx'];
  ?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Quản trị hợp tác xã</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="">

  <header class="main-header">

    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-lg">Quản trị hợp tác xã</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
            <br />
                <div class="pull-right">
                  <a href="#" class="btn btn-danger btn-flat">Đăng xuất</a>
                </div>
                <br />


    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <div class="main-sidebar" style="height: auto;">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
    
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Main Menu </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Quản lý người dùng</span>
            <span class="pull-right-container">
                <?php
                include("../config/connect.php");
                // $htx_id = $_SESSION['htx_id'];

                $sql = "SELECT COUNT(*) as KQ FROM USER WHERE HTX_ID = $htx_id";
                $kq = mysqli_fetch_row(mysqli_query($conn,$sql));
                ?>
              <span class="label label-primary pull-right"><?php echo $kq[0]; ?></span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li style="cursor: pointer;" id="dsnd"><a><i class="fa fa-circle-o"></i> Danh sách người dùng</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Quản lý sản phẩm</span>
            <span class="pull-right-container">
                <?php
                $sql = "SELECT COUNT(*) as KQ FROM SANPHAM WHERE SP_HTX_ID = $htx_id";
                $kq = mysqli_fetch_row(mysqli_query($conn,$sql));
                ?>
               <span class="label label-primary pull-right"><?php echo $kq[0]; ?></span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li style="cursor: pointer;"><a id="dssp"><i class="fa fa-circle-o"></i> Danh sách sản phẩm</a></li>
          </ul>
        </li>
       </ul>
    </section>
    <!-- /.sidebar -->
  </div>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color:white;">
    <!-- Content Header (Page header) -->
    <div id="show" >
 <?php 
  include('trang/content.php');
 ?>
</div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<script src="bower_components/chart.js/Chart.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
<script type="text/javascript">
  $(document).ready(function(){
      $("#dsnd").click(function(){
          $("#show").load('trang/danhsach_nguoidung.php');
      });
      $("#dsnsp").click(function(){
          $("#show").load('trang/danhsach_nhomsanpham.php');
      });
      $("#dslsp").click(function(){
          $("#show").load('trang/danhsach_loaisanpham.php');
      });
       $("#dssp").click(function(){
          $("#show").load('trang/danhsach_sanpham.php');
      });
        $("#dshtx").click(function(){
          $("#show").load('trang/danhsach_hoptacxa.php');
      });
         $("#dsdvvc").click(function(){
          $("#show").load('trang/danhsach_donvivanchuyen.php');
      });
  });
</script>
<?php
} else{
  ?>
  <script type="text/javascript">
    alert("Bạn chưa đăng nhập! Vui lòng đăng nhập hệ thống để tiếp tục!");
    window.location.href="index.php";
  </script>
  <?php
}
?>