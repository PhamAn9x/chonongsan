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
          <div class="panel-heading" style="text-align: center; font-size: 22px;">DANH SÁCH NGƯỜI DÙNG</div>
          <div class="panel-body">

            <div class="row-fluid">
              <div class="col-md-1" style="text-align: left;">
               <button id="del_usr" title="Xóa mục đã chọn" type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i>
               </div>
               <div class="col-md-10">
                <input type="text" class="form-control page-filter" placeholder="Tìm kiếm.." />
              </div>
              <div id="add_usr" class="col-md-1" ><button class="btn btn-success"><i class="fa fa-plus-square"></i></button></div>
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
      </style>
      <table id="example2" class="table searchable table-striped table-hover">
        <thead>
          <tr>
            <th style="width:42px;"><input type="checkbox" id="check-all" /></th>
            <th>STT</th>
            <th>Số điện thoại</th>
            <th>Họ và tên</th>
            <th>Hợp tác xã</th>
            <th>Địa chỉ</th>
            <th>Trạng thái<br /> kích hoạt</th>
            <th> Quyền</th>
            <th style="width:20px;">Cập nhật</th>
            <th style="width:20px;">Xóa</th>

          </tr>
        </thead>
        <tbody>
          <?php
          include('../../config/connect.php');
          $sql = "SELECT * FROM USER";
          mysqli_set_charset($conn,"UTF8");
          $rs = mysqli_query($conn,$sql);
          $i =1;
          while($row = mysqli_fetch_array($rs,MYSQLI_ASSOC)){
            ?>
            <tr>
              <td><input value="<?php echo $row['USR_SDT']; ?>" type="checkbox" class="row-check" name="checkbox_usr" /></td>
              <td><?php echo $i; ?></td>
              <td contenteditable="false"><?php echo $row['USR_SDT']; ?></td>
              <td contenteditable="false"><?php echo $row['USR_HO']." ".$row['USR_TEN']; ?></td>
              <?php 
              $id_htx = $row['HTX_ID'];
              $htx = mysqli_fetch_row(mysqli_query($conn,"SELECT HTX_TEN FROM HOPTACXA WHERE HTX_ID = $id_htx"));
              ?>
              <td><?php echo $htx[0]; ?></td>
              <?php 
              $id_tinh = $row['id_tinh'];
              $id_huyen = $row['id_huyen'];
              $id_xa = $row['id_xa'];
              $dc = mysqli_fetch_row(mysqli_query($conn,"SELECT XA_NAME,HUYEN_NAME,TINH_NAME FROM phuong_xa px,quan_huyen qh,tinh_thanh tt where px.id_xa = $id_xa AND qh.id_huyen = $id_huyen AND tt.id_tinh = $id_tinh"));
              ?>
              <td><?php echo $dc[0]."-".$dc[1]."-".$dc[2];?></td>
              <?php
              if($row['USR_TRANGTHAI'] == 0){
                ?>
                <td>
                  <span style="display: none;">chưa kích hoạt</span>
                  <input style="display: none;" type="text" id="kichhoat<?php echo $row['USR_SDT'];?>" value="<?php echo $row['USR_SDT']; ?>">
                  <button id="btnkichhoat<?php echo $row['USR_SDT'];?>" class="btn btn-danger"><i style="font-size: 20px;" class="fa fa-remove"></i></button></td>

                  <?php
                } else{
                  ?>
                  <td>
                    <span style="display: none;">đã kích hoạt</span>
                    <input style="display: none;" type="text" id="lock<?php echo $row['USR_SDT'];?>" value="<?php echo $row['USR_SDT']; ?>">
                    <button id="btnlock<?php echo $row['USR_SDT'];?>" class="btn btn-success"><i style="font-size: 20px;" class="fa fa-check-circle-o"></i></button></td>
                    <?php
                  }
                  ?>
                  <?php 
                  $quyen = $row['Q_ID'];
                  $quyen = mysqli_fetch_row(mysqli_query($conn,"SELECT Q_TEN FROM QUYEN WHERE Q_ID = $quyen"));
                  ?>
                  <td><?php echo $quyen[0]; ?></td>
                  <input style="display: none;" type="text" id="edit<?php echo $row['USR_SDT']; ?>" value="<?php echo $row['USR_SDT']; ?>" >

                  <td ><button id="btnedit<?php echo $row['USR_SDT']; ?>" class="btn btn-success  row-edit"><i style="font-size: 20px;" class="fa fa-edit"></i></button></td>
                  <input style="display: none;" type="text" id="xoa<?php echo $row['USR_SDT']; ?>" value="<?php echo $row['USR_SDT']; ?>">

                  <td><button id="btnxoa<?php echo $row['USR_SDT']; ?>" type="button" class="btn btn-danger"><i style="font-size: 20px;" class="fa fa-trash-o"></i></button></td>
                </tr>
                <script type="text/javascript">
                  $(document).ready(function(){
                    $("#btnxoa<?php echo $row['USR_SDT']; ?>").click(function(){
                      if(confirm("Bạn có chắc muốn xóa?")){
                        var sdt = $("#xoa<?php echo $row['USR_SDT']; ?>").val();
                        $.post("xuly/xuly_xoa.php", {xoa_usr: sdt}, function(data){
                          $("#cho_id").html(data);
                        });
                      }
                    });
                    $("#btnkichhoat<?php echo $row['USR_SDT']; ?>").click(function(){
                      var sdt = $("#kichhoat<?php echo $row['USR_SDT']; ?>").val();
                      $.post("xuly/xuly_xoa.php", {kichhoat_usr: sdt}, function(data){
                        $("#cho_id").html(data);
                      });
                    });
                    $("#btnlock<?php echo $row['USR_SDT']; ?>").click(function(){
                      var sdt = $("#lock<?php echo $row['USR_SDT']; ?>").val();
                      $.post("xuly/xuly_xoa.php", {lock_usr: sdt}, function(data){
                        $("#cho_id").html(data);
                      });
                    });
                    $("#btnedit<?php echo $row['USR_SDT']; ?>").click(function(){
                      var sdt = $("#edit<?php echo $row['USR_SDT']; ?>").val();
                      $("#cho_id").load("trang/popup_edit_usr.php?sdt="+sdt);
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
    $("#add_usr").click(function(){
      $("#cho_id").load('trang/popup_them_usr.php?sdt=78899');
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
  });
</script>
