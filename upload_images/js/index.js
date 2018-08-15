new Vue({
  el: '#app',
  data: {
    image: [] },

  methods: {
    onFileChange: function onFileChange(e) {
      var files = e.target.files || e.dataTransfer.files;
      var self = this;
      if (!files.length)
      return;
      Object.keys(files).map(function (k) {
        self.createImage(files[k]);
      });

      //this.createImage(files[0]);
    },
    createImage: function createImage(file) {
      var image = new Image();
      var reader = new FileReader();
      var vm = this;

      reader.onloadend = function (e) {
        console.log(vm.image);
        vm.image.push(e.target.result);
      };

      reader.readAsDataURL(file);
    },
    removeImage: function removeImage(i) {
      this.image.splice(i, 1);
    } } });