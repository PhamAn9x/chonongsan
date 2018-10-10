<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<?php
    include("config/connect.php");
    if(isset($_GET['id'])){
        $htx_id = $_GET['id'];
        $sql = "SELECT * FROM HOPTACXA WHERE HTX_ID = $htx_id";
        mysqli_set_charset($conn,"UTF8");
        $htx = mysqli_fetch_array(mysqli_query($conn,$sql));
    }
?>
<h1 style="font-size: 35px; text-transform: uppercase; font-weight: 700; text-align: center; color: red;">chi tiết hợp tác xã</h1>
<hr class="">
<div class="container target" style="height: 80%;">
    <div class="row">
        <div class="col-sm-10">
             <h1 style="text-transform: uppercase;" class=""><?php echo $htx['HTX_TEN']; ?></h1>
        </div>
      <div class="col-sm-2">

        </div>
    </div>
  <br>
    <div class="row" style="font-size: 16px;">
        <div class="col-sm-3">
            <!--left col-->
            <ul class="list-group">
                <li class="list-group-item text-muted" contenteditable="false">Người đại diện</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong class="">Họ và tên</strong></span> <?php echo $htx['NDD_TEN']; ?></li>
                <?php
                    $date=date_create($htx['NDD_NGAYSINH']);
                ?>
                <li class="list-group-item text-right"><span class="pull-left"><strong class="">Ngày sinh</strong></span> <?php echo date_format($date,"d/m/Y");?></li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong class="">Địa chỉ</strong></span> <?php echo $htx['NDD_DIACHI']; ?></li>
              <li class="list-group-item text-right"><span class="pull-left"><strong class="">Số điện thoại: </strong></span> <?php echo $htx['NDD_SDT']; ?>
               
                      </li>
            </ul>
         
            <div class="panel panel-default">

                
            </div>
          
            <ul class="list-group">
                <li class="list-group-item text-muted">Hoạt động <i class="fa fa-dashboard fa-1x"></i>
                    <?php
                        $tv = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM USER WHERE HTX_ID = $htx_id"));
                        $sp = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM SANPHAM WHERE SP_HTX_ID = $htx_id"));
                        $l = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM LENH WHERE SP_ID IN (SELECT SP_ID FROM SANPHAM WHERE SP_HTX_ID = $htx_id)"));

                    ?>

                </li>
                <li class="list-group-item text-right"><span class="pull-left"><strong class="">Số thành viên</strong></span> <?php echo $tv; ?></li>
                <li class="list-group-item text-right"><span class="pull-left"><strong class="">Sản phẩm</strong></span> <?php echo $sp; ?></li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong class="">Lệnh đặt</strong></span><?php echo $l; ?></li>
                        <!-- <li class="list-group-item text-right"><span class="pull-left"><strong class="">Followers</strong></span> 78</li> -->
            </ul>
          
        </div>
        <!--/col-3-->
        <div class="col-sm-9" style="" contenteditable="false">
            <div class="panel panel-default">
                <div class="panel-heading">Thông tin hợp tác xã</div>
                <div class="panel-body"> 
                    <style type="text/css">
                        .w tr td{
                            font-weight: 900;
                        }
                    </style>
                    <table class="w3-table w3-border w" style="font-style: 20px;">
                        <tr>
                            <th>Tên hợp tác xã</th>
                            <td><?php echo $htx['HTX_TEN']; ?></td>
                        </tr>
                        <tr>
                            <th>Địa chỉ hợp tác xã</th>
                            <td><?php echo $htx['HTX_DIACHI']; ?></td>
                        </tr>
                        <tr>
                            <th> Số điện thoại hợp tác xã</th>
                            <td><?php echo $htx['HTX_SDT']; ?></td>
                        </tr>
                        <tr>
                            <th>Tọa độ Y</th>
                            <td><?php echo $htx['HTX_VIDO']; ?></td>
                        </tr>
                        <tr>
                            <th>Tọa độ X</th>
                            <td><?php echo $htx['HTX_KINHDO']; ?></td>
                        </tr>
                       
                    </table>
                </div>
            </div>
           
         
</div>

         
        </div>
        <div class="w3-col s12">
            <br />
<h1 style="font-size: 35px; text-transform: uppercase; font-weight: 700; text-align: center; color: red;">sản phẩm hợp tác xã</h1>
       </div>
        
        </div>

<style type="text/css">
    body {
    margin:0;
    padding:0;
    font-family:sans-serif;
}
.container {
    position:relative;
    width:1200px;
    height:600px;
    margin:80px auto 0;
}
.container .box {
    position:relative;
    width:calc(400px - 60px);
    height:calc(300px - 30px);
    background:#000;
    float:left;
    margin:15px;
    box-sizing:border-box;
    overflow:hidden;
    box-shadow:0 5px 10px rgba(0,0,0,.8);
}
.container .box:before {
    content:'';
    position:absolute;
    top:10px;
    left:10px;
    right:10px;
    bottom:10px;
    border-top:1px solid #fff;
    border-bottom:1px solid #fff;
    box-sizing:border-box;
    transition:0.5s;
    transform: scaleX(0);
    opacity:0;
}
.container .box:hover:before {
    transform:scaleX(1);
    opacity:1;
}
.container .box:after {
    content:'';
    position:absolute;
    top:10px;
    left:10px;
    right:10px;
    bottom:10px;
    border-left:1px solid #fff;
    border-right:1px solid #fff;
    box-sizing:border-box;
    transition:0.5s;
    transform: scaleY(0);
    opacity:0;
}
.container .box:hover:after {
    transform:scaleY(1);
    opacity:1;
}
.container .box .imgBox {
    position:relative;
}
.container .box .imgBox img {
    width:100%;
    transition:0.5s;
}
.container .box:hover .imgBox img {
    opacity:.2;
    transform:scale(1.2);
}
.container .box .content {
    position:absolute;
    width:100%;
    top:50%;
    transform:translateY(-50%);
    z-index:2;
    padding:20px;
    box-sizing:border-box;
    text-align:center;
}
.container .box .content h2 {
    margin: 0 0 10px;
    padding:0;
    color:#fff;
    transition:0.5s;
    transform:translateY(-50px);
    opacity:0;
    visibility:hidden;
}
.container .box .content p {
    margin:0;
    padding:0;
    color:#fff;
    transform:translateY(50px);
    opacity:0;
    visibility:hidden;
}
.container .box:hover .content h2,
.container .box:hover .content P {
    opacity:1;
    visibility:visible;
    transform:translateY(0px);
}
</style>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container" style="width: 120%;">

<?php
        $sql = "SELECT * ,(SELECT HA_TEN FROM HINHANH WHERE SP_ID = sp.SP_ID LIMIT 0,1 ) as HA_TEN FROM SANPHAM sp WHERE SP_HTX_ID = $htx_id";
        $rs = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($rs,MYSQLI_ASSOC)){
?>

    <a href="index.php?xem=chitietsanpham&id=<?php echo $row['SP_ID']; ?>"><div class="box" style="width: 200px; height: 200px; margin-right: 15px; margin-left: 5px;">
        <div class="imgBox">
            <img style="width: 200px; height: 200px;" src="upload/<?php echo $row['HA_TEN']; ?>">
        </div>
        <div class="content">
            <h2><?php echo $row['SP_TEN'] ?></h2>
            <p><?php echo $row['SP_MOTANGAN'] ?></p>
        </div>
    </div></a>
    <?php
}
    ?>

<div class="w3-col s12">
            <br />
<h1 style=" margin-top: 10%; font-size: 35px; text-transform: uppercase; font-weight: 700; text-align: center; color: red;">Thành viên hợp tác xã</h1>
                

            <?php
        $sql = "SELECT *,(SELECT HA_TEN FROM HINHANH WHERE USR_SDT = usr.USR_SDT) as HA_TEN  FROM USER usr, tinh_thanh tt, quan_huyen qh, phuong_xa px  WHERE usr.id_tinh = tt.id_tinh AND usr.id_huyen = qh.id_huyen AND usr.id_xa = px.id_xa AND HTX_ID = $htx_id";
        $rs = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($rs,MYSQLI_ASSOC)){
            $dc = $row['XA_NAME']." - ".$row['HUYEN_NAME']." - ".$row['TINH_NAME']
?>

    <a href="index.php?xem=chitietsanpham&id=<?php echo $row['SP_ID']; ?>"><div class="box" style="width: 200px; height: 200px; margin-right: 15px; margin-left: 5px;">
        <div class="imgBox">
            <img style="width: 200px; height: 200px;" src="upload/<?php echo $row['HA_TEN']; ?>">
        </div>
        <div class="content">
            <h2><?php echo $row['USR_HO']." ".$row['USR_TEN']; ?></h2>
            <p><?php echo $dc; ?></p>
            <p><?php echo $row['USR_SDT'] ;?></p>
        </div>
    </div></a>
    <?php
}
    ?>




       </div>
    </div>
</div>



