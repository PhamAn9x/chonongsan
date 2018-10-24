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
        max-width: 720px;
        height: 400px;
        top: 50%;
        left: 50%;
        margin-left: -260px;
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
      if(isset($_GET['id_dvvc'])){
         $dvvc_id = $_GET['id_dvvc'];
         mysqli_set_charset($conn,"UTF8");
         $dvvc = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM DONVIVANCHUYEN  WHERE DVVC_ID = $dvvc_id"),MYSQLI_ASSOC);
      }
     ?>
</style>
<!DOCTYPE html>
<html lang="en" >
<div id="pop"></div>
<body>
<div id="bkgOverlay" class="backgroundOverlay"></div>

<div id="delayedPopup" class="delayedPopupWindow" style="width: 70%; border-radius: 7px;">
    <!-- This is the close button -->
    <a href="#" id="btnClose" class="btnClose">[ X ]</a>

    <style type="text/css">
        .tb tr td{
            text-align: center;
            vertical-align: middle;
        }
    </style>
    <h1 style="text-align: center;" class="box-title">CẬP NHẬT THÔNG TIN ĐƠN VỊ VẬN CHUYỂN</h1>
    <form role="form">
        <div class="row">
            <div class="col-md-6">
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên đơn vị vận chuyển</label>
                        <input value="<?php echo $dvvc['DVVC_TEN']; ?>" type="email" class="form-control" id="ipdvvc_ten" placeholder="Nhập tên đơn vị">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Địa chỉ đơn vị vận chuyển</label>
                        <input value="<?php echo $dvvc['DVVC_DIACHI']; ?>" type="email" class="form-control" id="ipdvvc_diachi" placeholder="Nhập địa chỉ đơn vị">
                    </div>

                    <div class="form-group">


                    </div>
                    <div class="form-group">

                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Số điện thoại đơn vị vận chuyển</label>
                        <input value="<?php echo $dvvc['DVVC_SDT']; ?>" type="email" class="form-control" id="ipdvvc_sdt" placeholder="Nhập số điện thoại đơn vị">
                    </div>

                    <div class="form-group">

                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12" style="text-align: center;">
            <button style="width: 100px; margin-right: 2%;" id="btncapnhat_dvvc" type="button" class="btn btn-primary">Cập nhật</button>
            <?php
                $rs = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM LOAIHANGVANCHUYEN WHERE DVVC_ID = $dvvc_id"));
                if($rs < 1) {
                    ?>
                    <button style="width: 100px; margin-right: 2%;" id="btnthemgia_dvvc" type="button"
                            class="btn btn-warning">Thêm giá
                    </button>
                    <?php
                }else{
                    ?>
                    <button  style="width: 100px; margin-right: 2%;" id="btncapnhatgia_dvvc" type="button"
                            class="btn btn-success">Cập nhật giá
                    </button>
            <?php
                }
            ?>
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
        $("#show").load("trang/danhsach_donvivanchuyen.php");
    }
</script>
<script>
    $(document).ready(function(){
        $("#btnthemgia_dvvc").click(function(){
            var dvvc_id = <?php echo $dvvc_id; ?>;
           $("#show").load("trang/popup_them_gia.php?dvvc_id="+dvvc_id);
        });
        $("#btncapnhatgia_dvvc").click(function(){
            var dvvc_id = <?php echo $dvvc_id; ?>;
            $("#show").load("trang/popup_capnhat_gia.php?capnhat_dvvc_id="+dvvc_id);
        });
        $("#btncapnhat_dvvc").click(function(){
                var ten = $("#ipdvvc_ten").val();
                var diachi = $("#ipdvvc_diachi").val();
                var sdt = $("#ipdvvc_sdt").val();
                var dvvc_id  = <?php echo $dvvc_id; ?>;
                if(confirm("Bạn có chắc chắn đã điền đầy đủ?")){
                    if(ten=="" || diachi ==""|| sdt=="") alert("Dữ liệu chưa đủ! Vui lòng kiểm tra lại thông tin!");
                    else{
                        $.post("xuly/xuly_update.php", {capnhat_dvvc: dvvc_id ,ten: ten, diachi: diachi, sdthoai: sdt}, function(data){
                            $("#pop").html(data);
                        });
                    };
                };
        });

    });
</script>