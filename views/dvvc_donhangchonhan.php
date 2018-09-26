<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
<script src='https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.2.2/js/buttons.colVis.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js'></script>
<script src='https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.2.2/js/buttons.bootstrap.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js'></script>
<script src='https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js'></script>
<script src='https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js'></script>



<script  src="js/index.js"></script>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Đơn hàng chờ giao</title>
  
  
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
  <link rel='stylesheet' href='https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css'>
  <link rel='stylesheet' href='https://cdn.datatables.net/buttons/1.2.2/css/buttons.bootstrap.min.css'>

  <link rel="stylesheet" href="css/style.css">

  
</head>
<!-- <link rel="stylesheet" type="text/css" href="css/tindang.css"> -->
<div class="tindang" style="width: 90%; margin-left: 5%;">
   <h1 style="text-align: center; font-weight: 700; color: red;">ĐƠN HÀNG CHỜ GIAO</h1>
   <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Số thứ tự</th>
            <th>Mã đơn hàng</th>
            <th>Số điện thoại<br /> nơi giao</th>
            <th>Số điện thoại<br /> nơi nhận</th>
            <th>Địa chỉ <br />Nơi giao</th>
            <th>Địa chỉ <br />Nơi nhận</th>
            <th>Tổng khối lượng</th>
            <th>Nhận</th>
            <th>Ghi chú</th>
        </tr>
    </thead>
    <?php
    $dvvc = $_SESSION['sdt'];
    $sql = "SELECT * FROM DONHANG WHERE DH_DVVC_ID = '$sdt' AND DH_TRANGTHAI = 0";
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
                <td><?php echo $stt; ?></td>
                <td><?php echo $row['DH_ID']; ?></td>
                <td><?php echo $row['DH_SDT_NGUOIBAN']; ?></td>
                <td><?php echo $row['DH_SDT_NGUOIMUA']; ?></td>
                <td><?php echo $row['DH_NOIGIAO']; ?></td>
                <td><?php echo $row['DH_NOINHAN']; ?></td>
                <td><?php echo $row['DH_TONGKHOILUONG']." Kg"; ?></td>
                <td>
                    <input style="display: none;" type="text" name="id<?php echo $row['DH_ID']; ?>" id="id<?php echo $row['DH_ID']; ?>" value="<?php echo $row['DH_ID']; ?>"/>
                    <input class="w3-green w3-input w3-hover-red" type="button" name="nhandh" id="nhandh<?php echo $row['DH_ID']; ?>" value="Nhận đơn hàng">
                </td>
                <td></td>
            </tr>
            <div id = "cho_id"></div>
            <?php
            $stt++;
            ?>
            <script type="text/javascript">
                $(document).ready(function(){
                    $("#nhandh<?php echo $row['DH_ID']; ?>").click(function(){
                        var id = $('#id<?php echo $row['DH_ID']; ?>').val();
                        $.post("process_ajax/ajax_xuly_donhangchonhan.php", {id: id}, function(data){
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

</html>
<script type="text/javascript">
    $(document).ready(function() {
            //Only needed for the filename of export files.
            //Normally set in the title tag of your page.document.title = 'Simple DataTable';
            //Define hidden columns
            var hCols = [8,8];
            // DataTable initialisation
            $('#example').DataTable({
                "dom": "<'row'<'col-sm-4'B><'col-sm-2'l><'col-sm-6'p<br/>i>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-12'p<br/>i>>",
                "paging": true,
                "autoWidth": true,
                "columnDefs": [{
                    "visible": false,
                    "targets": hCols
                }],
                "buttons": [{
                    extend: 'colvis',
                    collectionLayout: 'three-column',
                    text: function() {
                        var totCols = $('#example thead th').length;
                        var hiddenCols = hCols.length;
                        var shownCols = totCols - hiddenCols+1;
                        return 'Hiển thị (' + shownCols + ' của ' + totCols + ') cột';
                    },
                    prefixButtons: [{
                        extend: 'colvisGroup',
                        text: 'Hiện tất cả',
                        show: ':hidden'
                    }, {
                        extend: 'colvisRestore',
                        text: 'Khôi phục'
                    }]
                }, {
                    extend: 'collection',
                    text: 'Xuất',
                    buttons: [{
                        text: 'Excel',
                        extend: 'excelHtml5',
                        footer: false,
                        exportOptions: {
                            columns: ':visible'
                        }
                    }, {
                        text: 'CSV',
                        extend: 'csvHtml5',
                        fieldSeparator: ';',
                        exportOptions: {
                            columns: ':visible'
                        }
                    }, {
                        text: 'PDF Portrait',
                        extend: 'pdfHtml5',
                        message: '',
                        exportOptions: {
                            columns: ':visible'
                        }
                    }, {
                        text: 'PDF Landscape',
                        extend: 'pdfHtml5',
                        message: '',
                        orientation: 'landscape',
                        exportOptions: {
                            columns: ':visible'
                        }
                    }]
                }]
                ,oLanguage: {
                    oPaginate: {
                        sNext: '<span class="pagination-default">&#x276f;</span>',
                        sPrevious: '<span class="pagination-default">&#x276e;</span>'
                    }
                }
                ,"initComplete": function(settings, json) {
                        // Adjust hidden columns counter text in button -->
                        $('#example').on('column-visibility.dt', function(e, settings, column, state) {
                            var visCols = $('#example thead tr:first th').length;
                            //Below: The minus 2 because of the 2 extra buttons Show all and Restore
                            var tblCols = $('.dt-button-collection li[aria-controls=example] a').length - 2;
                            $('.buttons-colvis[aria-controls=example] span').html('Cột (' + visCols + ' của ' + tblCols + ')');
                            e.stopPropagation();
                        });
                    }
                });
        });
    </script>
    <style type="text/css">
    th{
        text-align: center;
        font-weight: 700;
        background-color: #27ae60;
        color: white;
    }
    td{
        text-align: center;
    }
    ul.dt-button-collection{
        background-color: #e5e5e5;
        border: 1px solid #c0c0c0;
    }
    li.dt-button a:hover{
        background-color: transparent;
        color: #115094;
        font-weight: bold;
    }
    li.dt-button.active a,
    li.dt-button.active a:hover,
    li.dt-button.active a:focus{
        color: #337ab6;
        background-color: transparent;
        font-weight: bold;
    }
    li.dt-button.active a::before{
        content: '✔ ';
    }
    .dataTables_info {
        font-size: 0.8em;
        margin-top: -12px;
        text-align: right;
    }
    .previous a,
    .next a
    {
        font-weight: bold;
    }
</style>