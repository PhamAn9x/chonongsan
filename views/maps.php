<?php
  /**
  * @author Tấn Việt
  * @copyright 2012
  * @website https://tanvietblog.com
  */
  function get_infor_from_address($address = null) {
    $prepAddr = str_replace(' ', '+', stripUnicode($address));
    $geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false');
    $output = json_decode($geocode);
    return $output;
  }
 
  // Loại bỏ dấu tiếng Việt để cho kết quả chính xác hơn
  function stripUnicode($str){
    if (!$str) return false;
    $unicode = array(
      'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
      'd'=>'đ|Đ',
      'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
      'i'=>'í|ì|ỉ|ĩ|ị|Í|Ì|Ỉ|Ĩ|Ị',
      'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
      'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
      'y'=>'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ'
    );
    foreach($unicode as $nonUnicode=>$uni) $str = preg_replace("/($uni)/i",$nonUnicode,$str);
    return $str;
  }
 
 $address = get_infor_from_address($_SESSION['diachi']);
 $vido = $address->results[0]->geometry->location->lat;
 $kinhdo =$address->results[0]->geometry->location->lng;
?>


<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
  alert('$vido');
var gmap = new google.maps.LatLng(<?php echo $vido; ?>,<?php echo $kinhdo;?>);
var marker;
function initialize()
{
    var mapProp = {
         center:new google.maps.LatLng(<?php echo $vido; ?>,<?php echo $kinhdo;?>),
         zoom:14,
        mapTypeId:google.maps.MapTypeId.ROADMAP
    };
 
    var map=new google.maps.Map(document.getElementById("googleMap")
    ,mapProp);
 
  var styles = [
    {
      featureType: 'road.arterial',
      elementType: 'all',
      stylers: [
        { hue: '#fff' },
        { saturation: 100 },
        { lightness: 48 },
        { visibility: 'on' }
      ]
    },{
      featureType: 'road',
      elementType: 'all',
      stylers: [
 
      ]
    },
    {
        featureType: 'water',
        elementType: 'geometry.fill',
        stylers: [
            { color: '#adc9b8' }
        ]
    },{
        featureType: 'landscape.natural',
        elementType: 'all',
        stylers: [
            { hue: '#809f80' },
            { lightness: 35 }
        ]
    }
  ];



   var contentString = "<?php echo $_SESSION['diachi']; ?>";

        var infowindow = new google.maps.InfoWindow({
          content: contentString
        });

 
  var styledMapType = new google.maps.StyledMapType(styles);
  map.mapTypes.set('Styled', styledMapType);
 
  marker = new google.maps.Marker({
    map:map,
    draggable:true,
    animation: google.maps.Animation.DROP,
    position: gmap,
    title: 'Hello World!',
    

  });
  google.maps.event.addListener(marker, 'click', toggleBounce);
   marker.addListener('click', function() {
          infowindow.open(map, marker);
        });



   // var triangleCoords = [
   //        {lat: 25.774, lng: -80.190},
   //        {lat: 18.466, lng: -66.118},
   //        {lat: 32.321, lng: -64.757}
   //      ];

   //      var bermudaTriangle = new google.maps.Polygon({
   //        paths: triangleCoords,
   //        strokeColor: '#FF0000',
   //        strokeOpacity: 0.8,
   //        strokeWeight: 3,
   //        fillColor: '#FF0000',
   //        fillOpacity: 0.35
   //      });
   //      bermudaTriangle.setMap(map);




}
 



function toggleBounce() {
 
  if (marker.getAnimation() !== null) {
    marker.setAnimation(null);
  } else {
    marker.setAnimation(google.maps.Animation.BOUNCE);
  }
}
 
google.maps.event.addDomListener(window, 'load', initialize);
</script>

<div id="googleMap" style=" border-top: none; margin-top: -9%; margin-right: 2%;width:99%; height:490px;">Google Map</div>