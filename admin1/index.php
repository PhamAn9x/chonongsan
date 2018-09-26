<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Analytics Dashboard</title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  
      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>

  <aside class="user-dashboard">
   <div class="user-details-container">
      <a href="#" class="avatar user-profile">
         <img src=""/>
      </a>
      <a href="#" class="user-settings">
         <i class="stroke-config"></i>
      </a>
   </div>
   <nav class="main">
      <h5>Danh mục</h5>
      <ul class="nav-container">
         <li class="nav-item">
            <span>Quản lý người dùng</span>
            <ul class="subnav">
               <li><a href="?view=danhsachnguoidung">Danh sách người dùng</a></li>
               <li><a href="?view=capnhatthongtinnguoidung">Cập nhật thông tin người dùng</a></li>
               <li><a href="#">Quản lý quyền truy cập</a></li>
            </ul>
         </li>
         <li class="nav-item">
            <span>Quản lý hợp tác xã</span>
            <ul class="subnav">
               <li><a href="?view=danhsachhoptacxa">Danh sách hợp tác xã</a></li>
               <li><a href="?view=themmoihoptacxa">Thêm mới hợp tác xã</a></li>
               <li><a href="#">Thống kê sản phẩm của hợp tác xã</a></li>
            </ul class="subnav">
         </li>
         <li class="nav-item">
            <span>Quản lý sản phẩm</span>
            <ul class="subnav">
               <li><a href="?view=danhsachsanpham">Danh sách sản phẩm</a></li>
               <li><a href="?view=themmoinhomsanpham">Thêm mới nhóm sản phẩm</a></li>
               <li><a href="?view=themmoiloaisanpham">Thêm mới loại sản phẩm</a></li>
               <li><a href="#">Thống kê các loại sản phẩm</a></li>
            </ul>
         </li>
      </ul>
   </nav>
</aside>
<main class="main">
  
   <div class="scroll-container">
      <div class="content-container">
         <?php
            if(isset($_GET['view']))
            {
              $view=$_GET['view'];
              if($view == 'danhsachnguoidung') include('ad_danhsachnguoidung.php');
                else
                  if($view == 'capnhatthongtinnguoidung')include('ad_capnhatthongtinnguoidung.php');
                  else
                    if($view == 'danhsachhoptacxa') include('danhsachhoptacxa.php');
                    else
                      if($view == 'themmoihoptacxa') include('themmoihoptacxa.php');
                      else
                        if($view == 'danhsachsanpham') include('ad_danhsachsanpham.php');
                        else
                          if($view == 'themmoinhomsanpham') include('themmoinhomsanpham.php');
            }
         ?>
      </div>
   </div>
</main>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>

  

    <script  src="js/index.js"></script>




</body>

</html>
