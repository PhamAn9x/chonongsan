
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js"></script>


  <style type="text/css">
    input[type=file]{
      display: inline;
    }
    #image_preview{
      border: 1px solid black;
      padding: 10px;
    }
    #image_preview img{
      width: 200px;
      padding: 5px;
    }
  </style>
<?php 
  if(isset($_GET['sp_id'])){
  $sp_id = $_GET['sp_id'];
  $htx = $_GET['htx'];
  echo $sp_id;
  echo $htx;
}
?>

<h1 style="text-transform: uppercase; text-align: center;"> thêm hình ảnh sản phẩm</h1>
  <form  action="upload/uploadFile.php" method="post" enctype="multipart/form-data">
      <input style="display: none;" type="text" name="sp_id" value="<?php echo $sp_id; ?>">
      <div class="col-md-12" style="text-align: center;">
        <input style="display: none;" type="text" name="htx_id" value="<?php echo $htx; ?>">
        <input style="text-align: center;" type="file" id="uploadFile" name="uploadFile[]" multiple/>
        <input type="submit" class="btn btn-success" name='submitImage' value="Thêm Hình"/>
      </div>
  </form>

  <br/>
  <div style="border: none;" id="image_preview"></div>
</div>


</body>


<script type="text/javascript">
  
$(document).ready(function(){


  $("#uploadFile").change(function(){
     $('#image_preview').html("");
     var total_file=document.getElementById("uploadFile").files.length;


     for(var i=0;i<total_file;i++)
     {
      $('#image_preview').append("<img style='border-radius:5px;' width='150px'; height='150px' src='"+URL.createObjectURL(event.target.files[i])+"'>");
     }


  });
});
</script>