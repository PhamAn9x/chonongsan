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
      <div class="panel-heading" style="text-align: center; font-size: 22px;">DANH SÁCH ĐƠN VỊ VẬN CHUYỂN</div>
      <div class="panel-body">
                
        <div class="row-fluid">
          <div class="col-md-1" style="text-align: left; ">
           <button id="dvvc_xoa_multi" title="Xóa mục đã chọn" type="button" class="btn btn-danger"><i style="font-size: 20px;" class="fa fa-trash-o"></i>
          </div>
          <div class="col-md-10">
            <input type="text" class="form-control page-filter" placeholder="Tìm kiếm.." />
          </div>
         <div class="col-md-1" ><button id="dvvc_them_moi" class="btn btn-success"><i style="font-size: 20px;" class="fa fa-plus-square"></i></button></div>
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
            <th style="width:42px;"><input  type="checkbox" id="check-all" /></th>
            <th>STT</th>
            <th>Mã đơn v</th>
            <th>Tên đơn vị</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
              <th>Độ hài lòng</th>
            <th style="width:20px;">Cập nhật</th>
            <th style="width:20px;">Xóa</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include('../../config/connect.php');
            $sql = "SELECT * FROM DONVIVANCHUYEN";
            mysqli_set_charset($conn,"UTF8");
            $rs = mysqli_query($conn,$sql);
            $i =1;
            while($row = mysqli_fetch_array($rs,MYSQLI_ASSOC)){
          ?>
          <tr>
            <td><input name="checkbox_dvvc" value="<?php echo $row['DVVC_ID']; ?>" type="checkbox" class="row-check" /></td>
            <td><?php echo $i; ?></td>
            <td contenteditable="false"><?php echo $row['DVVC_ID']; ?></td>
            <td contenteditable="false"><?php echo $row['DVVC_TEN']; ?></td>
            <td><?php echo $row['DVVC_DIACHI']; ?> </td>
            <td><?php echo $row['DVVC_SDT']; ?></td>
              <td><?php echo $row['DVVC_MUCDOHAILONG']; ?>/100</td>
              <input style="display: none;" type="text" id="edit<?php echo $row['DVVC_ID']; ?>" value="<?php echo $row['DVVC_ID']; ?>">
             <td><button id="btnedit<?php echo $row['DVVC_ID']; ?>" type="button" class="btn btn-success row-edit"><i style="font-size: 20px;" class="fa fa-edit"></i></button></td>
             <input style="display: none;" type="text" id="xoa<?php echo $row['DVVC_ID']; ?>" value="<?php echo $row['DVVC_ID']; ?>">
            <td><button type="button" id="btnxoa<?php echo $row['DVVC_ID']; ?>" class="btn btn-danger"><i style="font-size: 20px;" class="fa fa-trash-o"></i></button></td>
          </tr>
                <script>
                    $(document).ready(function(){
                        $("#btnedit<?php echo $row['DVVC_ID'];?>").click(function(){
                            var dvvc_id = <?php echo $row['DVVC_ID'];?>;
                           $("#show").load("trang/popup_edit_dvvc.php?id_dvvc="+dvvc_id);
                        })
                        $("#btnxoa<?php echo $row['DVVC_ID'];?>").click(function(){
                            var dvvc_id = <?php echo $row['DVVC_ID'];?>;
                            if(confirm("Bạn có chắc muốn xóa!?")) {
                                $.post("xuly/xuly_xoa.php", {xoa_dvvc: dvvc_id}, function (data) {
                                    $("#cho_id").html(data);
                                });
                            }
                        })
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
<script>
    $(document).ready(function(){
        $("#dvvc_xoa_multi").click(function(){
            var selecteddvvc = new Array();
            $('input[name="checkbox_dvvc"]:checked').each(function() {
                selecteddvvc.push(this.value);
            });
            if(selecteddvvc.length == 0){
                alert("Vui lòng chọn một mục!");
            }else
            if(confirm("Bạn có chắc muốn xóa các đơn vị đã chọn?")){
                $.post("xuly/xuly_xoa.php", {dvvc_xoa_multi: selecteddvvc}, function(data){
                    $("#cho_id").html(data);
                });
            }
        });
        $("#dvvc_them_moi").click(function(){
           $("#show").load("trang/popup_them_donvivanchuyen.php");
        });

    })

</script>

