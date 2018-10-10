<?php
  include('config/connect.php'); 
?>
<div id="alert"></div>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<?php
  $sdt = $_SESSION['sdt'];
    $sql = "SELECT * FROM USER WHERE USR_SDT = '$sdt'";
    mysqli_set_charset($conn,"UTF8");
    $rs = mysqli_query($conn,$sql);
    $usr = mysqli_fetch_array($rs,MYSQLI_ASSOC);
?>
<h1 style="text-align:center;text-transform: uppercase; font-size: 35px; font-weight: 700; text-align: center; color: red;">thông tin người dùng</h1>
<hr>
<div class="container bootstrap snippet">
    <div class="row">
      <div style="margin-left: 10%;" class="col-sm-10"><h1><?php echo $usr['USR_TEN']; ?></h1></div>
      <div class="col-sm-2"></div>
    </div>
    <div class="row">
      <div class="col-sm-3"><!--left col-->
              

      <div class="text-center">
       <?php
        include("views/upload_img_avt/index.php");
       ?>
      </div></hr><br>
         
          
          <!-- <ul class="list-group">
            <li class="list-group-item text-muted">Hoạt động <i class="fa fa-dashboard fa-1x"></i></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Lệnh đã đặt</strong></span> 125</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Số sản phẩm đã thích</strong></span> 13</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Số đơn hàng khớp lệnh</strong></span> 37</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Số lưọt đăng nhập</strong></span> 78</li>
          </ul>  -->
               
        
          
        </div><!--/col-3-->
      <div class="col-sm-9">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Thông tin</a></li>
                <li><a data-toggle="tab" href="#messages">Chỉnh sửa thông tin</a></li>
                <li><a data-toggle="tab" href="#settings">Đổi mật khẩu</a></li>
              </ul>

              
          <div class="tab-content">
            <div class="tab-pane active" id="home">
                <hr>
                  <form class="form" action="##" method="post" id="registrationForm">
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="first_name"><h4>Họ</h4></label>
                              <input disabled type="text" class="form-control" name="first_name" placeholder="Họ" value="<?php echo $usr['USR_HO']; ?>" />
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="last_name"><h4>Tên</h4></label>
                              <input type="text" class="form-control" name="last_name" disabled  placeholder="Tên" value="<?php echo $usr['USR_TEN']; ?>" > 
                          </div>
                      </div>
          
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="phone"><h4>Số điện thoại</h4></label>
                              <input disabled type="text" class="form-control" name="" disabled placeholder="Số điện thoại"value="<?php echo $usr['USR_SDT']; ?>" />
                          </div>
                      </div>
          
                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="mobile"><h4>Hợp tác xã</h4></label>
                             <?php
                              $id = $usr['HTX_ID'];
                                $sql = "SELECT HTX_ID,HTX_TEN FROM HOPTACXA WHERE HTX_ID=$id";
                                $sql2 = "SELECT HTX_ID,HTX_TEN FROM HOPTACXA WHERE HTX_ID NOT IN (SELECT HTX_ID FROM HOPTACXA WHERE HTX_ID=$id)";
                              
                                $htx2 = mysqli_query($conn,$sql2);
                                   $htx = mysqli_fetch_row(mysqli_query($conn,$sql));
                             ?>
                            <select disabled id="sl_htx" style="height: 35px;" class="form-control">
                              <option value="<?php echo $htx[0]; ?>"><?php echo $htx[1]; ?></option>
                              <?php
                                while($row = mysqli_fetch_array($htx2,MYSQLI_ASSOC)){
                                  ?>
                                     <option value="<?php echo $row['HTX_ID']; ?>"><?php echo $row['HTX_TEN']; ?></option>
                                  <?php
                                }
                              ?>
                            </select>
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Email</h4></label>
                              <input type="email" class="form-control" name="email" disabled placeholder="you@email.com" value="<?php echo $usr['USR_EMAIL']; ?>" />
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Địa chỉ</h4></label>
                              <?php
                                $sql = "SELECT TINH_NAME,HUYEN_NAME,XA_NAME FROM USER usr, tinh_thanh tt, quan_huyen qh, phuong_xa px WHERE 
                                usr.id_tinh = tt.id_tinh AND usr.id_huyen = qh.id_huyen AND usr.id_xa = px.id_xa AND USR_SDT = '$sdt'";
                                $dc = mysqli_fetch_row(mysqli_query($conn,$sql));
                                $stdiachi = $dc[2]." - ".$dc[1]." - ".$dc[0];
                              ?>
                              <input disabled type="email" class="form-control" disabled placeholder="Địa chỉ" value="<?php echo $stdiachi; ?>" >
                          </div>
                      </div>
                       <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Ngày sinh</h4></label>
                              <input  type="date" class="form-control" disabled value="<?php echo $usr['USR_NGAYSINH']; ?>" placeholder="Ngày sinh" >
                          </div>
                      </div>
                       <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Giới tính</h4></label>
                          <select  disabled id="gioitinh" class="form-control" style="height: 35px;">
                              <?php
                                if($usr['USR_GIOITINH'] == "Nam"){
                                  ?>
                                  <option value="Nam"> Nam</option>
                                  <option value="Nữ">Nữ</option>
                                  <option value="Không xác định">Không xác định</option>
                                  <?php
                                } else
                                if($usr['USR_GIOITINH'] == "Nữ"){
                                  ?>
                                  <option value="Nữ">Nữ</option>
                                    <option value="Nam"> Nam</option>
                                  <option value="Không xác định">Không xác định</option>
                                  <?php
                                } else{
                                  ?>
                                       <option value="Không xác định">Không xác định</option>
                                         <option value="Nữ">Nữ</option>
                                    <option value="Nam"> Nam</option>
                                 
                                  <?php
                                }
                              ?>
                          </select>
                          </div>
                      </div>
                      <div class="form-group">
                           <div class="col-xs-12" style="text-align: center;">
                                <br>
                                
                                <button class="trolai btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Trở lại</button>
                            </div>
                      </div>
                </form>
              
              <hr>
              
             </div><!--/tab-pane-->
             <div class="tab-pane" id="messages">
                <hr>
                  <form class="form" action="##" method="post" id="registrationForm">
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="first_name"><h4>Họ</h4></label>
                              <input type="text" class="form-control" name="first_name" id="ho" placeholder="Họ" value="<?php echo $usr['USR_HO']; ?>" />
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="last_name"><h4>Tên</h4></label>
                              <input type="text" class="form-control" name="last_name" id="ten" placeholder="Tên" value="<?php echo $usr['USR_TEN']; ?>" > 
                          </div>
                      </div>
          
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="phone"><h4>Số điện thoại</h4></label>
                              <input disabled type="text" class="form-control" name="" id="sdt" placeholder="Số điện thoại"value="<?php echo $usr['USR_SDT']; ?>" />
                          </div>
                      </div>
          
                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="mobile"><h4>Hợp tác xã</h4></label>
                             <?php
                              $id = $usr['HTX_ID'];
                                $sql = "SELECT HTX_ID,HTX_TEN FROM HOPTACXA WHERE HTX_ID=$id";
                                $sql2 = "SELECT HTX_ID,HTX_TEN FROM HOPTACXA WHERE HTX_ID NOT IN (SELECT HTX_ID FROM HOPTACXA WHERE HTX_ID=$id)";
                              
                                $htx2 = mysqli_query($conn,$sql2);
                                   $htx = mysqli_fetch_row(mysqli_query($conn,$sql));
                             ?>
                            <select id="sl_htx" style="height: 35px;" class="form-control">
                              <option value="<?php echo $htx[0]; ?>"><?php echo $htx[1]; ?></option>
                              <?php
                                while($row = mysqli_fetch_array($htx2,MYSQLI_ASSOC)){
                                  ?>
                                     <option value="<?php echo $row['HTX_ID']; ?>"><?php echo $row['HTX_TEN']; ?></option>
                                  <?php
                                }
                              ?>
                            </select>
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Email</h4></label>
                              <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" value="<?php echo $usr['USR_EMAIL']; ?>" />
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Địa chỉ</h4></label>
                              <?php
                                $sql = "SELECT TINH_NAME,HUYEN_NAME,XA_NAME FROM USER usr, tinh_thanh tt, quan_huyen qh, phuong_xa px WHERE 
                                usr.id_tinh = tt.id_tinh AND usr.id_huyen = qh.id_huyen AND usr.id_xa = px.id_xa AND USR_SDT = '$sdt'";
                                $dc = mysqli_fetch_row(mysqli_query($conn,$sql));
                                $stdiachi = $dc[2]." - ".$dc[1]." - ".$dc[0];
                              ?>
                              <input disabled type="email" class="form-control" id="location" placeholder="Địa chỉ" value="<?php echo $stdiachi; ?>" >
                          </div>
                      </div>
                       <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Ngày sinh</h4></label>
                              <input  type="date" class="form-control" id="ngaysinh" placeholder="Ngày sinh"  value="<?php echo $usr['USR_NGAYSINH']; ?>">
                          </div>
                      </div>
                       <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Giới tính</h4></label>
                          <select  id="gioitinh" class="form-control" style="height: 35px;">
                              <?php
                                if($usr['USR_GIOITINH'] == "Nam"){
                                  ?>
                                  <option value="Nam"> Nam</option>
                                  <option value="Nữ">Nữ</option>
                                  <option value="Không xác định">Không xác định</option>
                                  <?php
                                } else
                                if($usr['USR_GIOITINH'] == "Nữ"){
                                  ?>
                                  <option value="Nữ">Nữ</option>
                                    <option value="Nam"> Nam</option>
                                  <option value="Không xác định">Không xác định</option>
                                  <?php
                                } else{
                                  ?>
                                       <option value="Không xác định">Không xác định</option>
                                         <option value="Nữ">Nữ</option>
                                    <option value="Nam"> Nam</option>
                                 
                                  <?php
                                }
                              ?>
                          </select>
                          </div>
                      </div>
                      <div class="form-group">
                           <div class="col-xs-12" style="text-align: center;">
                                <br>
                                <button id="btn_luu" class="btn btn-lg btn-success" type="button"><i class="glyphicon glyphicon-ok-sign"></i> Lưu</button>
                                <button class="trolai btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Trở lại</button>
                            </div>
                      </div>
                </form>
              
              <hr>
              
             </div><!--/tab-pane-->
             <div class="tab-pane" id="settings">
                
                
                  <hr>
                  <form class="form" action="##" method="post" id="registrationForm">
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="first_name"><h4>Số điện thoại đã  đăng ký</h4></label>
                              <input type="text" class="form-control" name="first_name" id="ch_sdt" placeholder="Số điện thoại" title="enter your first name if any.">
                          </div>
                      </div>
                     
          
                 
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Mật khẩu cũ</h4></label>
                              <input type="password" class="form-control" id="ch_mk_cu" placeholder="Mật khẩu cũ" >
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="password"><h4>Mật khẩu mới</h4></label>
                              <input type="password" class="form-control" name="password" id="ch_mk_moi" placeholder="Mật khẩu mới">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="password2"><h4>Nhập lại mật khẩu mới</h4></label>
                              <input type="password" class="form-control" name="password2" id="ch_re_mk_moi" placeholder="Nhập lại mật khẩu mới" >
                          </div>
                      </div>
                      <div class="form-group">
                           <div class="col-xs-12" style="text-align: center;">
                                <br>
                                <button id="btn-doimk" class="btn btn-lg btn-success " type="button"><i class="glyphicon glyphicon-ok-sign"></i> Thay đổi</button>
                                <button class="trolai btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Trở lại</button>
                            </div>
                      </div>
                </form>
              </div>
               
              </div><!--/tab-pane-->
          </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->
                                                      
                                                      <script type="text/javascript">
                                                        $(document).ready(function() {

    
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.avatar').attr('src', e.target.result);
            }
    
            reader.readAsDataURL(input.files[0]);
        }
    }
    

    $(".file-upload").on('change', function(){
        readURL(this);
    });
    $("#upload_img").change(function(){
      var file = $("#upload_img").val();
          alert(file['name']);
    });
    $("#btn_luu").click(function(){
      var sdt = $("#sdt").val();
          var ho = $("#ho").val();
          var ten = $("#ten").val();
          var htx = $("#sl_htx").val();
          var email = $("#email").val();
          var ngaysinh = $("#ngaysinh").val();
          var gioitinh = $("#gioitinh").val();
if( ho =="" || ten =="" || htx=="" || email==""||ngaysinh==""||gioitinh=="")     {
            alert("Bạn chưa nhập đủ thông tin!");
}else{       
            $.post("views/profile/xuly.php", {flat_update_usr: 0,sdt: sdt,ten: ten, ho: ho, htx: htx,email: email,ngaysinh: ngaysinh, gioitinh: gioitinh}, function(data){
                  $("#alert").html(data);
                });
}


    });

    $("#btn-doimk").click(function(){
      var sdt = $("#ch_sdt").val();
      var mkc = $("#ch_mk_cu").val();
      var mkm = $("#ch_mk_moi").val();
      var mkm_re = $("#ch_re_mk_moi").val();
      if(sdt ==""||mkc==""||mkm==""||mkm_re==""){
        alert("Vui lòng nhập đầy đủ thông tin!");
      } else if(mkm != mkm_re){
        alert("Mật khẩu mới chưa trùng khớp!");
      } else
      if(mkm.length < 8){
          alert("Mật khẩu phải từ 8 ký tự!")
      }
      else
      {
        $.post("views/profile/xuly.php", {flat_update_pass: 0,sdt: sdt,mkc: mkc, mkm: mkm}, function(data){
                  $("#alert").html(data);
                });
      }
     
    })
    $(".trolai").click(function(){
      window.history.back();
    })
});
</script>