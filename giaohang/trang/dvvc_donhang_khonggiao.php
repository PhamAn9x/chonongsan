<style type="text/css">
@import url('https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css');

.tl {text-align:left;}
.tc {text-align:center;}
.tr {text-align:right;}

.wrapper {
  padding: 13px;
}
</style>
<div id="cho_id">
  <div>
    <article style="width: 98%; margin-left: 1%; padding-top: 3%;">
      <main  id="table" class="table-editable">

        <div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading" style="text-align: center; font-size: 22px; text-transform: uppercase;">đơn hàng không thể giao</div>
          <div class="panel-body">

            <div class="row-fluid">
              <div class="col-md-2" style="text-align: left;">
           <!--     <button style="float: lèt; margin-right: 1%;" id="del_ủ" title="Xóa mục đã chọn" type="button" class="btn btn-danger"><i style="font-size: 20px;" class="fa fa-trash-o"></i></button>
                 <button style="float: lèt;margin-right: 1%;" id="btn_block_multi" class="btn btn-danger"><i style="font-size: 20px;" class="fa fa-remove"></i></button>
                  <button style="float: lèt;margin-right: 1%;" id="btn_kichhoat_multi" class="btn btn-success"><i style="font-size: 20px;" class="fa fa-check-circle-o"></i></button>
 -->
               </div>
               <div class="col-md-8">
                <input type="text" class="form-control page-filter" placeholder="Tìm kiếm.." />
              </div>
              <!-- <div style="tẽt-align: center;" title="Thêm người dùng mới" id="add_ủ" class="col-md-2" ><button class="btn btn-success"><i style="font-size: 20px;"  class="fa fa-plus-square"></i></button></div> -->
            </div>
          </div>
        </div>

        <!-- Table -->
        <style type="text/css">
        .table tr th{
          text-align: center;
          background-color: #079992;
          color: white;
          font-size: 17px;
        }
        .table tr td{
          text-align: center;
        }
          #example2 tr td{
    text-align: center;
          vertical-align: middle;
        }
      </style>
      <table id="example2" class="table searchable table-striped table-hover">
        <thead>
          <tr>
            <th style="width:42px;"><input type="checkbox" id="check-all" /></th>
            <th>Mã đơn hàng</th>
            <th>Số điện thoại<br /> nơi giao</th>
            <th>Số điện thoại<br /> nơi nhận</th>
            <th>Địa chỉ <br />Nơi giao</th>
            <th>Địa chỉ <br />Nơi nhận</th>
            <th>Tổng khối lượng</th>
            <th>Lí do</th>
            <th style="width:20px;">Trả đơn hàng</th>
          </tr>
        </thead>
           <?php
    session_start();
    include("../../config/connect.php");
    $dvvc = $_SESSION['giaohang'];
    mysqli_set_charset($conn,"UTF8");
    $sql = "SELECT * FROM DONHANG WHERE DH_DVVC_ID = '$dvvc' AND DH_TRANGTHAI = 5";
    ?>
        <tbody>
          <?php
        $stt=1;
        $c = mysqli_num_rows(mysqli_query($conn,$sql));
        $rs = mysqli_query($conn,$sql);
        while( $row = mysqli_fetch_array($rs,MYSQLI_ASSOC))
        {

            ?>
            <tr>
                  <td><input value="<?php echo $row['DH_ID']; ?>" type="checkbox" class="row-check" name="checkbox_usr" /></td>
                <td><?php echo $row['DH_ID']; ?></td>
                <td>  <?php
                    $sdtban = $row['DH_SDT_NGUOIBAN']; 
                    $nb = mysqli_fetch_row(mysqli_query($conn,"SELECT USR_HO, USR_TEN FROM USER WHERE USR_SDT = '$sdtban'"));
                    echo $nb[0]." ".$nb[1]."<br />";
                    echo "<b>( ".$sdtban." )</b>";
                    ?></td>
                <td> <?php
                    $sdtmua = $row['DH_SDT_NGUOIMUA']; 
                    $nb = mysqli_fetch_row(mysqli_query($conn,"SELECT USR_HO, USR_TEN FROM USER WHERE USR_SDT = '$sdtmua'"));
                    echo $nb[0]." ".$nb[1]."<br />";
                    echo "<b>( ".$sdtmua." )</b>";
                    ?></td>
                <td><?php echo $row['DH_NOIGIAO']; ?></td>
                <td><?php echo $row['DH_NOINHAN']; ?></td>
                <td><?php echo $row['DH_TONGKHOILUONG']." Kg"; ?></td>
              <!-- -->
              <td>
                <?php echo $row['DH_LIDO']; ?>
              </td>
              <input style="display: none;" type="text"  id="iptra<?php echo $row['DH_ID']; ?>" value="<?php echo $row['DH_ID']; ?>" />
                 <td><button id="btntra<?php echo $row['DH_ID']; ?>" type="button" class="btn btn-danger"><i style="font-size: 20px;" class="fa fa-angle-double-left"  "></i></button></td>
            </tr>
            <div id = "cho_id"></div>
            <?php
            $stt++;
            ?>
            <script type="text/javascript">
                $(document).ready(function(){
                    $("#btntra<?php echo $row['DH_ID']; ?>").click(function(){
                        var id = $('#iptra<?php echo $row['DH_ID']; ?>').val();
                        $.post("../process_ajax/ajax_xuly_donhangchonhan.php", {xltrh:1,id: id}, function(data){
                            $("#cho_id").html(data);
                        });

                    });
                });
            </script>
            <?php
        }
        ?>
            </tbody>
          </table>
        </div>
      </div>
    </main>
  </article>
</div>
<script type="text/javascript">
  var $TABLE = $('#table');
  var $BTN = $('.export');
  var $EXPORT = $('#export');

  $('.add-new').click(function () {
    var $clone = $TABLE.find('tr.hide').clone(true).removeClass('hide table-line');
    $TABLE.find('table').append($clone);
  });

  $('.row-del').click(function () {
    $(this).parents('tr').detach();
  });


// THIS IS FOR EXPORT ONLY
// THIS IS FOR EXPORT ONLY
// THIS IS FOR EXPORT ONLY
jQuery.fn.pop = [].pop;
jQuery.fn.shift = [].shift;

$BTN.click(function () {
  var $rows = $TABLE.find('tr:not(:hidden)');
  var headers = [];
  var data = [];
  
  // Get the headers (add special header logic here)
  $($rows.shift()).find('th:not(:empty)').each(function () {
    headers.push($(this).text().toLowerCase());
  });
  
  // Turn all existing rows into a loopable array
  $rows.each(function () {
    var $td = $(this).find('td');
    var h = {};
    
    // Use the headers from earlier to name our hash keys
    headers.forEach(function (header, i) {
      h[header] = $td.eq(i).text();   
    });
    
    data.push(h);
  });
  
  // Output the result
  $EXPORT.text(JSON.stringify(data));
});


// THIS IS FOR FILTERING ONLY
// THIS IS FOR FILTERING ONLY
// THIS IS FOR FILTERING ONLY
var activeSystemClass = $('.list-group-item.active');
$('.page-filter').keyup( function() {
  var that = this;
  // affect all table rows on in systems table
  var tableBody = $('.searchable tbody');
  var tableRowsClass = $('.searchable tbody tr');
  $('.search-sf').remove();
  tableRowsClass.each( function(i, val) {
    //Lower text for case insensitive
    var rowText = $(val).text().toLowerCase();
    var inputText = $(that).val().toLowerCase();
    if(inputText != '') {
      $('.search-query-sf').remove();
      tableBody.prepend('<tr class="search-query-sf"><td colspan="10"><strong>Tìm kiếm với: "'
        + $(that).val()
        + '"</strong></td></tr>');
    } else {
      $('.search-query-sf').remove();
    }
    if( rowText.indexOf( inputText ) == -1 ) {
      //hide rows
      tableRowsClass.eq(i).hide();
    } else {
      $('.search-sf').remove();
      tableRowsClass.eq(i).show();
    }
  });
  //all tr elements are hidden
  if(tableRowsClass.children(':visible').length == 0) {
    tableBody.append('<tr class="search-sf"><td class="text-muted" colspan="10">Không có dữ liệu.</td></tr>');
  }
});

// THIS ADD CHECKBOX ALL TO TABLE
// THIS ADD CHECKBOX ALL TO TABLE
// THIS ADD CHECKBOX ALL TO TABLE
$(document).on('change', 'table thead [type="checkbox"]', function(e){
  e && e.preventDefault();
  var $table = $(e.target).closest('table'), $checked = $(e.target).is(':checked');
  $('tbody [type="checkbox"]',$table).prop('checked', $checked);
  $("#btn-del-reports").toggle();
});
</script>
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example2').DataTable({
      'paging'      : false,
      'pageLength'  : 5,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : false,
      'info'        : false,
      'autoWidth'   : true
    })
  })
</script>
<style type="text/css">
.pagination{
  text-align: center;
}
</style>
<script type="text/javascript">
  $(function(){
    $("#example2_previous").html('<a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0">Trở lại</a>');
    $("#example2_next").html('<a href="#" aria-controls="example2" data-dt-idx="4" tabindex="0">Tiếp theo</a>');
    $(".dataTables_info").html('');
  });
</script>

<script type="text/javascript">
  $(document).ready(function(){

    $("#add_usr").click(function(){
       $("#cho_id").load("trang/popup_them_usr.php");
    });


    $("#del_usr").click(function(){
     var selectedLanguage = new Array();
     $('input[name="checkbox_usr"]:checked').each(function() {
      selectedLanguage.push(this.value);
    });
     if(selectedLanguage.length == 0){
      alert("Vui lòng chọn một mục!");
      }else
      if(confirm("Bạn có chắc muốn xóa các mục đã chọn?")){
     $.post("xuly/xuly_xoa.php", {xoa_multi: selectedLanguage}, function(data){
      $("#cho_id").html(data);
    });
   }

   });

    $("#btn_kichhoat_multi").click(function(){
     var selectedLanguage = new Array();
     $('input[name="checkbox_usr"]:checked').each(function() {
      selectedLanguage.push(this.value);
    });
     if(selectedLanguage.length == 0){
      alert("Vui lòng chọn một mục!");
      }else
      if(confirm("Bạn có chắc muốn kích hoạt các tài khoản đã chọn?")){
     $.post("xuly/xuly_xoa.php", {kichhoat_multi: selectedLanguage}, function(data){
      $("#cho_id").html(data);
    });
   }

   });

    $("#btn_block_multi").click(function(){
     var selectedLanguage = new Array();
     $('input[name="checkbox_usr"]:checked').each(function() {
      selectedLanguage.push(this.value);
    });
     if(selectedLanguage.length == 0){
      alert("Vui lòng chọn một mục!");
      }else
      if(confirm("Bạn có chắc muốn khóa các tài khoản đã chọn?")){
     $.post("xuly/xuly_xoa.php", {block_multi: selectedLanguage}, function(data){
      $("#cho_id").html(data);
    });
   }

   });

  });
</script>
