<!DOCTYPE html>
<html>
<head>
    <title>Simple Leaflet Map</title>
    <meta charset="utf-8" />
    <link 
        rel="stylesheet" 
        href="http://cdn.leafletjs.com/leaflet-0.7/leaflet.css"
    />
</head>
<body>
	<div class="w3-col s2"></div>
	<div class="w3-teal w3-col s8" style=" width: 79.5%; border-radius:5px 0 0 0; height: 45px;  margin-top: 2%; font-size: 25px;text-align: center;margin-top: 10px; margin-left: 8%; font-family: 'roboto'; font-weight: 700; ">VỊ TRÍ CÁC HỢP TÁC XÃ</div>
	<div class="w3-col s2"></div>

    <div id="map" style="box-shadow: -1px 1px 1px 2px #01a3a4; width: 79%; margin-left: 8.3%; margin-top: 5%; height: 500px"></div>

    <script
        src="http://cdn.leafletjs.com/leaflet-0.7/leaflet.js">
    </script>

    <script>

	var planes = [
		<?php
	$sql="SELECT * FROM HOPTACXA";
	$rs= mysqli_query($conn,$sql);
	while($row = mysqli_fetch_array($rs,MYSQLI_ASSOC)){
		echo '["'.$row['HTX_TEN'].'",'.$row["HTX_KINHDO"].",".$row["HTX_VIDO"].'],';
		
			}
		?>
		];
        var map = L.map('map').setView([9.681007, 105.614058], 9);
        mapLink = 
            '<a href="http://openstreetmap.org">OpenStreetMap</a>';
        L.tileLayer(
            'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; ' + mapLink + ' Contributors',
            maxZoom: 18,
            }).addTo(map);
        	map.scrollWheelZoom.disable();
        	var latlngs = [
            [9.882790, 105.526323],
            [9.701826, 105.329560],
            [9.588626, 105.381896],

            [9.637391, 105.664551],
            [9.743779, 105.836624],
            [9.924953, 105.881336],
            [9.969675, 105.822477],
            [9.962996, 105.670315],

         ];
         // Creating a polygon
         var polygon = L.polygon(latlngs, {color: 'green'}).addTo(map);

		for (var i = 0; i < planes.length; i++) {
			marker = new L.marker([planes[i][1],planes[i][2]])
				.bindPopup(planes[i][0])
				.addTo(map);
		}
               
    </script>
</body>
</html>