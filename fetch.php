<div>
     <div><img id="logo" class="img-polaroid" alt="Logo" src="' . $row['logo'] . '" title="Click to change the logo" width="128">
     <input style="visibility:hidden;" id="logoupload" type="file" accept="image/* ">
</div>


<script>
  $('img#logo').click(function(){
    $('#logoupload').trigger('click');
    $('#logoupload').change(function(e){

      var reader = new FileReader(),
           files = e.dataTransfer ? e.dataTransfer.files : e.target.files,
            i = 0;

            reader.onload = onFileLoad;

             while (files[i]) reader.readAsDataURL(files[i++]);

              });

                function onFileLoad(e) {
                        var data = e.target.result;
                          $('img#logo').attr("src",data);
                          //Upload the image to the database
                           //Save data on keydown
                            $.post('test.php',{data:$('img#logo').attr("src")},function(){

                            });
                            }

                        });
                        </script>
