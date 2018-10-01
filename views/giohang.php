<?php
 if(isset($_SESSION['giohang'])){
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js" type="text/javascript"></script>

<div class="w3-col s12 w3-teal" style="font-size: 22px; padding: 1%;"> THÔNG TIN GIỎ HÀNG</div>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>

      <link rel="stylesheet" href="../css/style_giohang.css">

  <style type="text/css">
    table tr td{
      text-align: center;
      vertical-align: middle;
    }
  </style>
</head>

<body>
<span id="alert"></span>
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container" style="width: 96%;">
  <table id="cart" class="table table-hover table-condensed">
    <thead>
      <tr>
        <th style="width:50%">Sản phẩm</th>
        <th style="width:10%">Giá</th>
        <th style="width:9%">Số lượng</th>
        <th style="width:22%" class="text-center">Thành tiền</th>
        <th style="width:10%"></th>
      </tr>
    </thead>
    <tbody>
      <?php
      mysqli_set_charset($conn,"UTF8");
      $i = 1;
        foreach ($_SESSION['giohang'] as $value) {
       ?>
         <input style="opacity: 0" id="id<?php echo $i; ?>" type="" name="" value="<?php echo $value['id']; ?>">
      <tr id="sp<?php echo $i; ?>">
        <td data-th="Product">
          <div class="row">
            <div class="col-sm-4 hidden-xs"><img style="height: 80px; width: 100px; margin-top: 3%;" src="upload/<?php echo $value['hinhanh']; ?>" alt="..." class="img-responsive" /></div>
            <div class="col-sm-8">
              <h4 class="nomargin" style="font-weight: 800; font-family: 'roboto';"><?php echo $value['ten']; ?></h4>
              <p><?php echo $value['mota']; ?></p>
            </div>
          </div>
        </td>
        <input style="opacity: 0; width: 0.5px;" id="gia<?php echo $i; ?>" type="" name="" value="<?php echo $value['gia']; ?>">
        <td data-th="Price"><?php echo adddotstring($value['gia']); ?></td>
        <td data-th="Quantity">
          <input id="soluong<?php echo $i; ?>" style="font-weight: 700; font-size: 18px;" type="number" class="form-control text-center" value="<?php echo $value['soluong']; ?>">
        </td>
        <td style="font-weight: 800;" id ="thanhtien<?php echo $i; ?>" data-th="Subtotal" class="text-center"><?php echo adddotstring($value['gia'] * $value['soluong']).' VNĐ'; ?></td>
        <td class="actions" data-th="">
          <button id="delete<?php echo $i; ?>" class="btn btn-danger btn-sm"><i  class="fa fa-trash-o"></i></button>
        </td>
      </tr>

      <script type="text/javascript">
 
    $("#soluong<?php echo $i; ?>").change(function(){
       var idsp = $("#id<?php echo $i; ?>").val();
        var sl = $("#soluong<?php echo $i; ?>").val();
      $.post("process_ajax/data_update_ss.php", {id_sp: idsp,sl: sl}, function(data){
        $("#alert").html(data);
             })

        if(sl <=0)
        { 
         
         if(confirm('Số sản phẩm đã nhỏ hơn 0 bạn có muốn xóa sản phẩm này ra khỏi giỏ hàng?'))
         {
                  $.post("process_ajax/data_usert_ss.php", {id_sp: idsp}, function(data){
              $("#alert").html(data);
               })
              $("#sp<?php echo $i; ?>").html("");
          }
        }
        var gia = $("#gia<?php echo $i; ?>").val();
        var thanhtien = sl*gia;
        var thanhtiendot = thanhtien.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
        $("#thanhtien<?php echo $i; ?>").html(thanhtiendot+ " VNĐ");
        $.post("process_ajax/data_update_ttt.php", {id_sp: idsp}, function(data){
              $("#tongthanhtoan").html(data);
               })
    });

       $("#delete<?php echo $i; ?>").click(function(){
            var idsp = $("#id<?php echo $i; ?>").val();
           if(confirm('Bạn có chắc muốn xóa sản phẩm này!')){
            $.post("process_ajax/data_usert_ss.php", {id_sp: idsp}, function(data){
              $("#sp<?php echo $i; ?>").html(data);
               })
          }
       });

  
</script>

     <?php
     $i++;
      }
      
     ?>
      
    </tbody>
    <tfoot>
      <tr class="visible-xs">
      </tr>
      <tr>
        <td><a style="text-align: left;" href="index.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Tiếp tục mua hàng
        <td colspan="3" class="hidden-xs text-center" style="width: 300px;"><strong>Tổng thanh toán:</strong><span id="tongthanhtoan" style="font-size: 23px; color: red; font-weight: 600;">
          <?php 
            $tongthanhtoan =0;
            foreach ($_SESSION['giohang'] as $value) {
              $tongthanhtoan += $value['soluong']*$value['gia'];
            }
            echo '&nbsp'.adddotstring($tongthanhtoan).'  VNĐ';
          ?>
        </span></td>
        <td colspan="2"><a href="index.php?view=thanhtoan" class="btn btn-success btn-block">Thanh toán<i class="fa fa-angle-right"></i></a></td>
      </tr>
    </tfoot>
  </table>
</div>
</body>
</html>
