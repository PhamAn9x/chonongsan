<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css"
integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
crossorigin=""/>
<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"
integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA=="
crossorigin=""></script> 
<style type="text/css">
#mapid { height:500px; width: 97.5%; margin-left: 1%; }
</style>
<div style="box-shadow: -1px 1px 1px 2px #01a3a4"" id="mapid"></div>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">

var geocoder = new google.maps.Geocoder();
var address = "<?php echo $_SESSION['diachi']; ?>";

geocoder.geocode( { 'address': address}, function(results, status) {

if (status == google.maps.GeocoderStatus.OK) {
    var latitude = results[0].geometry.location.lat();
    var longitude = results[0].geometry.location.lng();
    
 var map = L.map('mapid').setView([latitude, longitude], 9);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

L.marker([latitude, longitude]).addTo(map)
    .bindPopup(
      '<img src="upload/58hat-giong-dau-tay-do-1.5_.jpg" width="50px" height="50px"/><br /><a href="#"><?php echo $_SESSION['diachi']; ?></a> <br /> Hợp tác xã <br /> '
      )
    .openPopup();


  } 
}); 
</script>


