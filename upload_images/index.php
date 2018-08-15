<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Vue JS upload multi images</title>
      <link rel="stylesheet" href="upload_images/css/style.css">
</head>

<body>

  <div id="app">
  <div v-if="image.length === 0">
    <input type="file" multiple  @change="onFileChange">
  </div>
  <div v-else>
    <div v-for="(img, $index) in image">
      <div class="img">
        <img class="image" @click="removeImage($index)" :src="img" />
      </div>
      
    </div>
  </div>
</div>
  <script src='https://rawgit.com/vuejs/vue/master/dist/vue.js'></script>

  

    <script  src="upload_images/js/index.js"></script>




</body>

</html>
