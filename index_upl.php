 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <div align="left">
    <input style="position: relative;" type="file" name="multiple_files" id="multiple_files" multiple />
    <span id="error_multiple_files"></span>
  <style type="text/css">
    #im:hover{
      opacity: 0.5;
    }
  </style>
  <span id="alert"></span>
</div>
   <span id="image_table"></span>
<script>
var len = 0;
$(document).ready(function(){
// load_image_data();
 function load_image_data()
 {
  len =  $('#multiple_files')[0].files.length;
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{d: len},
   success:function(data)
   {
    $('#image_table').html(data);
   }
  });
 } 
 function load_image_data_delete()
 {
  $.ajax({
   url:"delete.php",
   method:"POST",
   data:{check:len-1},
   success:function(data)
   {
    len--;
    $('#image_table').html(data);
   }
  });
 } 

 $('#multiple_files').change(function(){
  var masp = $('#masanpham').val();
  var nsp = $('#slnhomsanpham').val();
  var lsp = $('#slloaisanpham').val();
  //alert(nsp);
  var error_images = '';
  var form_data = new FormData();
  var files = $('#multiple_files')[0].files;
  if(files.length > 10)
  {
   error_images += 'You can not select more than 10 files';
  }
  else
  {
   for(var i=0; i<files.length; i++)
   {
    var name = document.getElementById("multiple_files").files[i].name;
    var ext = name.split('.').pop().toLowerCase();
    if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
    {
     error_images += '<p>Invalid '+i+' File</p>';
    }
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("multiple_files").files[i]);
    var f = document.getElementById("multiple_files").files[i];
    var fsize = f.size||f.fileSize;
    if(fsize > 2000000)
    {
     error_images += '<p>' + i + ' File Size is very big</p>';
    }
    else
    {
     form_data.append("file[]", document.getElementById('multiple_files').files[i]);
    }
   }
  }
  if(error_images == '')
  {
   $.ajax({
    url:"upload.php",
    method:"POST",
    data: form_data,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend:function(){
     $('#error_multiple_files').html('<label class="text-primary">Đang Upload...</label>');
    },   
    success:function(data)
    {
     $('#error_multiple_files').html('');
     load_image_data();

    }
   });
  }
  else
  {
   $('#multiple_files').val('');
   $('#error_multiple_files').html("<span class='text-danger'>"+error_images+"</span>");
   return false;
  }
 });  



 $(document).on('click', '.delete', function(){
  var image_id = $(this).attr("id");
  var image_name = $(this).data("image_name");
  // var len =  $('#multiple_files')[0].files.length - 1;
  if(confirm("Bạn có muốn xóa bỏ hinh ảnh này!?"))
  {
   $.ajax({
    url:"delete.php",
    method:"POST",
    data:{image_id:image_id, image_name:image_name},
    success:function(data)
    {
     load_image_data_delete();
     //alert("Image removed");
      
    }
   });
  }
 }); 

});
</script>



