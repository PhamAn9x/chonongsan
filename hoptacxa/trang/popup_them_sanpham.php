<style type="text/css">
    .alert {
        padding: 20px;
        background-color: #f44336;
        color: white;
        opacity: 1;
        transition: opacity 0.6s;
        margin-bottom: 15px;
    }

    .alert.success {background-color: #4CAF50;}
    .alert.info {background-color: #2196F3;}
    .alert.warning {background-color: #ff9800;}

    .closebtn {
        margin-left: 15px;
        color: white;
        font-weight: bold;
        float: right;
        font-size: 22px;
        line-height: 20px;
        cursor: pointer;
        transition: 0.3s;
    }

    .closebtn:hover {
        color: black;
    }
</style>
<style type="text/css">
    .instructions {
        text-align: center;
        font-size: 20px;
        margin: 15vh;
    }

    /* //////////////////////////////////////////////////////////////////////////////////////////////
        //   Default Modal Styles   //
        ////////////////////////////////////////////////////////////////////////////////////////////// */
    /*   This is the background overlay   */
    .backgroundOverlay {
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        height: 100%;
        width: 100%;
        margin: 0;
        padding: 0;
        background: #000000;
        opacity: .85;
        filter: alpha(opacity=85);
        -moz-opacity: .85;
        z-index: 101;
        display: none;
    }

    /*   This is the Popup Window   */
    .delayedPopupWindow {
        display: none;
        position: fixed;
        width: auto;
        max-width: 900px;
        height: 560px;
        top: 45%;
        left: 50%;
        margin-left: -350px;
        margin-top: -230px;
        background-color: #efefef;
        border: 2px solid #333;
        z-index: 102;
        padding: 10px 20px;
    }

    /*   This is the closing button  */
    #btnClose {
        width: 100%;
        display: block;
        text-align: right;
        text-decoration: none;
        color: #BCBCBC;
    }

    /*   This is the closing button hover state  */
    #btnClose:hover {
        color: #c90c12;
    }

    /*   This is the description headline and paragraph for the form   */
    #delayedPopup > div.formDescription {
        float: left;
        display: block;
        width: 44%;
        padding: 1% 3%;
        font-size: 18px;
        color: #666;
        clear: left;
    }

    /*   This is the styling for the form's headline   */
    #delayedPopup > div.formDescription h2 {
        color: #444444;
        font-size: 36px;
        line-height: 40px;
    }

    /*
    ////////// MailChimp Signup Form //////////////////////////////
    */
    /*   This is the signup form body  */
    #delayedPopup #mc_embed_signup {
        float: left;
        width: 47%;
        padding: 1%;
        display: block;
        font-size: 16px;
        color: #666;
        margin-left: 1%;
    }

    /*   This is the styling for the signup form inputs  */
    #delayedPopup #mc-embedded-subscribe-form input {
        width: 95%;
        height: 30px;
        font-size: 18px;
        padding: 3px;
        margin-bottom: 5px;
    }

    /*   This is the styling for the signup form inputs when they are being hovered with the mouse  */
    #delayedPopup #mc-embedded-subscribe-form input:hover {
        border: solid 2px #40c348;
        box-shadow: 0 1px 3px #AAAAAA;
    }

    /*   This is the styling for the signup form inputs when they are focused  */
    #delayedPopup #mc-embedded-subscribe-form input:focus {
        border: solid 2px #40c348;
        box-shadow: none;
    }

    /*   This is the styling for the signup form submit button  */
    #delayedPopup #mc-embedded-subscribe {
        width: 100% !important;
        height: 40px !important;
        margin: 10px auto 0 auto;
        background: #5D9E62;
        border: none;
        color: #fff;
    }

    /*   This is the styling for the signup form submit button hover state  */
    #delayedPopup #mc-embedded-subscribe:hover {
        background: #40c348;
        color: #fff;
        box-shadow: none !important;
        cursor: pointer;
    }
<?php
    include('../../config/connect.php');
    session_start();
    $id_htx = $_SESSION['qt_htx'];
?>
</style>
<!DOCTYPE html>
<html lang="en" >
<div id="pop"></div>
<body>
<div id="bkgOverlay" class="backgroundOverlay"></div>

<div id="delayedPopup" class="delayedPopupWindow" style="width: 70%; border-radius: 7px;">
    <!-- This is the close button -->
    <a style="width:30px; margin-left:97%; cursor: pointer; " id="btnClose" class="btnClose">[ X ]</a>

    <style type="text/css">
        .tb tr td{
            text-align: center;
            vertical-align: middle;
        }
    </style>
    <h1 style="text-align: center; text-transform: uppercase;" class="box-title">thêm sản phẩm mới</h1>
    <div id="canhbao"></div>
    <form role="form">
        <div class="row">
            <div class="col-md-6">
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên sản phẩm</label>
                        <span id="alert_sdt"></span>
                        <input type="text" class="form-control" id="ipspTen" placeholder="Nhập tên sản phẩm" value="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nhóm sản phẩm</label>
                        <select id="slnhomSp"  class="form-control" >
                            <option value="">Chọn nhóm sản phẩm</option>
                            <?php 
                            mysqli_set_charset($conn,"UTF8");
                            $rs = mysqli_query($conn,"SELECT * FROM NHOMSANPHAM");
                            while($row = mysqli_fetch_array($rs,MYSQLI_ASSOC)){
                                ?>
                                    <option value="<?php echo $row['NSP_ID']; ?>"><?php echo $row['NSP_TEN']; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                     <div class="form-group">
                        <label for="exampleInputEmail1">Loại sản phẩm</label>
                        <select id="slloaiSp" class="form-control" >
                            <option value="">Chọn loại sản phẩm</option>
                        </select>
                      
                    </div>
                   
                    <div class="form-group">
                        <label for="exampleInputFile">Đơn vị tính</label>
                       <input class="form-control" type="text" id="ipdvtinh" placeholder="Nhập đơn vị tính">
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nơi sản xuất</label>
                        <select class="form-control" id="sltennguoisanxuat">
                            <?php
                            mysqli_set_charset($conn,"UTF8");
                            $htx = mysqli_query($conn,"SELECT * FROM USER WHERE HTX_ID = $id_htx");
                            echo "SELECT USR_SDT,USR_HO,USR_TEN FROM USER WHERE HTX_ID = $id_htx";
                            while($row = mysqli_fetch_array($htx,MYSQLI_ASSOC)){
                                ?>
                                <option value="<?php echo $row['USR_SDT']; ?>"><?php echo $row['USR_SDT']." - ".$row['USR_HO']." ".$row['USR_TEN']; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
<div id="tt_nsx">

                    <label for="exampleInputPassword1">Địa chỉ - Số điện thoại</label>
                    <div class="form-group">
                        <input  style="width: 50%; float: left;" type="text" class="form-control" id="ipdiachi" value="">
                         <input style="width: 50%;float: left;" type="text" class="form-control" id="ípdt" value="">
                    </div>
                
</div>

             <div class="form-group">
                    <label for="exampleInputPassword1">Mô tả ngắn</label>
                        <input   type="text" class="form-control" id="ipmotangan" value="">
                    </div>
                    <div class="form-group">
                    <label for="exampleInputPassword1">Mô tả chi tiết</label>
                        <textarea class="form-control" id="ipmotachitiet" value=""></textarea> 
                    </div>


                </div>
            </div>
        </div>

        <div class="col-md-12" style="text-align: center;">
            <button style="width: 100px; margin-right: 2%;" id="btnthem" type="button" class="btn btn-primary">Thêm</button>
            <button  style="width: 100px; margin-left: 2%;" class="btn btn-danger btnClose">Trở lại</button>
        </div>


    </form>
</div>



</div>

</div>



<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>



<script  src="js/index.js"></script>




</body>

</html>
<script type="text/javascript">
    $(document).ready(function ()
    {
        //Fade in delay for the background overlay (control timing here)
        $("#bkgOverlay").delay(200).fadeIn(200);
        //Fade in delay for the popup (control timing here)
        $("#delayedPopup").delay(200).fadeIn(200);

        //Hide dialouge and background when the user clicks the close button
        $(".btnClose").click(function (e)
        {
            HideDialog();
            e.preventDefault();
        });

    });
    //Controls how the modal popup is closed with the close button
    function HideDialog()
    {
        $("#bkgOverlay").fadeOut(200);
        $("#delayedPopup").fadeOut(100);
        $("#show").load("trang/danhsach_sanpham.php");
    }
</script>
<script>
    $(document).ready(function(){

        $("#slnhomSp").change(function(){
                var id_nsp = $("#slnhomSp").val();
                  $.post("xuly/xuly.php", {ck_nsp: id_nsp}, function(data){
                        $("#slloaiSp").html(data);
                    });
        });

         $("#sltennguoisanxuat").blur(function(){
                var sdt = $("#sltennguoisanxuat").val();
                  $.post("xuly/xuly.php", {sdt: sdt}, function(data){
                        $("#tt_nsx").html(data);
                    });
        });
          $("#btnthem").click(function(){
               var sdt = $("#sltennguoisanxuat").val();
               var tensp = $("#ipspTen").val();
               var nsp = $("#slnhomSp").val();
               var lsp = $("#slloaiSp").val();
               var dvtinh = $("#ipdvtinh").val();
               var motangan = $("#ipmotangan").val();
               var motachitiet =$("#ipmotachitiet").val();
               var htx = <?php echo $id_htx; ?>;
               var diachi =$("#ipdiachi").val();
               if(sdt == "" || tensp ==""||nsp==""||lsp==""||dvtinh==""||motangan==""||motachitiet==""||diachi==""){
                        alert("Chưa nhập đầy đủ dữ liệu! Vui lòng kiểm tra lại!")
               }else{
                  $.post("xuly/xuly.php", {themsp: sdt, tensp: tensp, nsp: nsp,  lsp: lsp,  dvtinh: dvtinh, motangan: motangan, motachitiet: motachitiet,htx: htx, diachi: diachi}, function(data){
                        $("#show").html(data);
                    });
              }
        });
       
        });

</script>