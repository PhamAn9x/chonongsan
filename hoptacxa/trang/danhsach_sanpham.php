<?php
session_start();
  if(isset($_SESSION['qt_htx'])){
  $htx_id = $_SESSION['qt_htx'] ;
?>
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
      <div class="panel-heading" style="text-align: center; font-size: 22px;">DANH SÁCH SẢN PHẨM</div>
      <div class="panel-body">
                
        <div class="row-fluid">
          <div style="text-align: center;" class="col-md-2" style="text-align: left;">
           <button id="sp_xoa_multi" title="Xóa mục đã chọn" type="button" class="btn btn-danger"><i style="font-size: 20px;" class="fa fa-trash-o"></i></button>
            <button id="btn_khoa_multi" title="Khóa sản phẩm" class="btn btn-danger"><i style="font-size: 20px;" class="fa fa-remove"></i></button>
            <button id="btn_duyet_multi" title="Duyệt sản phẩm" class="btn btn-success"><i style="font-size: 20px;" class="fa fa-check-circle-o"></i></button>
          </div>
          <div class="col-md-8">
            <input type="text" class="form-control page-filter" placeholder="Tìm kiếm.." />
          </div>
            <div style="text-align: center;" title="Thêm sản phẩm mới" id="add_sp" class="col-md-2" ><button class="btn btn-success"><i style="font-size: 20px;"  class="fa fa-plus-square"></i></button></div>

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
      </style>
      <table id="example2" class="table searchable table-striped table-hover">
        <thead>
          <tr>
            <th style="width:42px;"><input type="checkbox" id="check-all" /></th>
            <th>STT</th>
            <th>Mã sản phẩm</th>
            <th>Tên sản phẩm</th>
            <th>Hợp tác xã</th>
            <th>Xuất xứ</th>
            <th>Số lệnh đặt<br /> mua - bán</th>
            <th>Chi tiết</th>
            <th>Trạng thái<br /> duyệt</th>
            <th style="width:20px;">Xóa</th>

          </tr>
        </thead>
        <tbody>
          <?php
          include('../../config/connect.php');
            $sql = "SELECT * FROM SANPHAM WHERE SP_HTX_ID = $htx_id";
            mysqli_set_charset($conn,"UTF8");
            $rs = mysqli_query($conn,$sql);
            $i =1;
            while($row = mysqli_fetch_array($rs,MYSQLI_ASSOC)){
          ?>
          <tr>
            <td><input name="checkbox_sp" value="<?php echo $row['SP_ID']; ?>" type="checkbox" class="row-check" /></td>
            <td><?php echo $i; ?></td>
            <td contenteditable="false"><?php echo $row['SP_ID']; ?></td>
            <td contenteditable="false"><?php echo $row['SP_TEN']; ?></td>
            <?php 
              $id_htx = $row['SP_HTX_ID'];
              $htx = mysqli_fetch_row(mysqli_query($conn,"SELECT HTX_TEN FROM HOPTACXA WHERE HTX_ID = $id_htx"));
            ?>
            <td><?php echo $htx[0]; ?></td>
            <td><?php echo $row['SP_DIACHI'];?></td>
            
             <?php
            $id_sp = $row['SP_ID'];
              $sl_dat = mysqli_fetch_row(mysqli_query($conn,"SELECT COUNT(SP_ID) FROM LENH WHERE SP_ID = $id_sp"));
            ?>
            <td><?php echo $sl_dat[0]; ?></td>
            <td>
              <input style="display: none;" type="text" id="chitiet<?php echo $row['SP_ID']; ?>" value="<?php echo $row['SP_ID']; ?>">
              <button id="btn_chitiet<?php echo $row['SP_ID']; ?>" class="btn btn-info" ><i style="font-size: 20px;" class="fa fa-question-circle-o"></i></button>
            </td>
            <?php
              if($row['SP_TRANGTHAI'] == 0){
            ?>
              
            <td>
              <span style="display: none;">chưa duyệt</span>
              <input style="display: none;" type="text" id="duyet<?php echo $row['SP_ID']; ?>" value="<?php echo $row['SP_ID']; ?>">
              <button id="btn_duyet<?php echo $row['SP_ID']; ?>" title="Duyệt sản phẩm" class="btn btn-danger"><i style="font-size: 20px;" class="fa fa-remove"></i></button></td>
            
            <?php
              } else if($row['SP_TRANGTHAI'] == 1){
              ?>
            <td>
                <span style="display: none;">đã duyệt</span>
                  <input style="display: none;" type="text" id="khoa<?php echo $row['SP_ID']; ?>" value="<?php echo $row['SP_ID']; ?>">
              <button id="btn_khoa<?php echo $row['SP_ID']; ?>" title="Khóa sản phẩm" class="btn btn-success"><i style="font-size: 20px;" class="fa fa-check-circle-o"></i></button></td>
              <?php
            }else {
              ?>
                  
                  <td>
                <span style="display: none;">Không chấp nhận</span>
                  <input style="display: none;" type="text" id="khongchapnhan<?php echo $row['SP_ID']; ?>" value="<?php echo $row['SP_ID']; ?>">
              <button id="btn_khongchapnhan<?php echo $row['SP_ID']; ?>" title="Khóa sản phẩm" class="btn btn-warning"><i style="font-size: 20px;" class="fa fa-remove"></i></button></td>

              <?php
            }
            ?>
            <input style="display: none;" type="text" id="sp_xoa<?php echo $row['SP_ID']; ?>" value="<?php echo $row['SP_ID']; ?>">
            <td><button id="btn_sp_xoa<?php echo $row['SP_ID']; ?>" type="button" class="btn btn-danger"><i style="font-size: 20px;" class="fa fa-trash-o"></i></button></td>
          </tr>
          <script type="text/javascript">
            $(document).ready(function(){
                $("#btn_duyet<?php echo $row['SP_ID']; ?>").click(function(){
                    var sp_id = $("#duyet<?php echo $row['SP_ID']; ?>").val();
                           $.post("xuly/xuly_update.php", {duyet_sp: sp_id}, function(data){
                            $("#cho_id").html(data);
                          });
                });
                $("#btn_khoa<?php echo $row['SP_ID']; ?>").click(function(){
                    var sp_id = $("#khoa<?php echo $row['SP_ID']; ?>").val();
                     $.post("xuly/xuly_update.php", {khoa_sp: sp_id}, function(data){
                            $("#cho_id").html(data);
                          });
                });
                 $("#btn_sp_xoa<?php echo $row['SP_ID']; ?>").click(function(){
                    var sp_id = $("#sp_xoa<?php echo $row['SP_ID']; ?>").val();
                    if(confirm("Bạn có chắc muốn xóa?")){
                    $.post("xuly/xuly_xoa.php", {xoa_sp: sp_id}, function(data){
                            $("#cho_id").html(data);
                          });
                  }
                });
                 $("#btn_chitiet<?php echo $row['SP_ID']; ?>").click(function(){
                    var sp_id = $("#chitiet<?php echo $row['SP_ID']; ?>").val();
                    $("#show").load("trang/popup_chitiet_sp.php?sp_id="+sp_id);
                });
            });
          </script>
          <?php
          $i++;
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
    $("#sp_xoa_multi").click(function(){
         var selectedsp = new Array();
     $('input[name="checkbox_sp"]:checked').each(function() {
      selectedsp.push(this.value);
    });
     if(selectedsp.length == 0){
      alert("Vui lòng chọn một mục!");
      }else
      if(confirm("Bạn có chắc muốn xóa các sản phẩm đã chọn?")){
     $.post("xuly/xuly_xoa.php", {sp_xoa_multi: selectedsp}, function(data){
      $("#cho_id").html(data);
    });
   }
    });


    $("#btn_khoa_multi").click(function(){
         var selectedsp = new Array();
     $('input[name="checkbox_sp"]:checked').each(function() {
      selectedsp.push(this.value);
    });
     if(selectedsp.length == 0){
      alert("Vui lòng chọn một mục!");
      }else
      if(confirm("Bạn có chắc muốn khóa các sản phẩm đã chọn?")){
     $.post("xuly/xuly_xoa.php", {sp_khoa_multi: selectedsp}, function(data){
      $("#cho_id").html(data);
    });
   }
    });


    $("#btn_duyet_multi").click(function(){
         var selectedsp = new Array();
     $('input[name="checkbox_sp"]:checked').each(function() {
      selectedsp.push(this.value);
    });
     if(selectedsp.length == 0){
      alert("Vui lòng chọn một mục!");
      }else
      if(confirm("Bạn có chắc muốn duyệt các sản phẩm đã chọn?")){
     $.post("xuly/xuly_xoa.php", {sp_duyet_multi: selectedsp}, function(data){
      $("#cho_id").html(data);
    });
   }
    });
  });
</script>
<script>
    $(document).ready(function(){
       $("#add_sp").click(function(){
           $("#show").load("trang/popup_them_sanpham.php");
       }) ;
    });
</script>
<?php
  }else{
    ?>
            <script type="text/javascript">
    alert("Bạn chưa đăng nhập! Vui lòng đăng nhập hệ thống để tiếp tục!");
    window.location.href="index.php";
  </script>
    <?php
  }
?>