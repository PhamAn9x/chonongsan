<style type="text/css">
.clearfix:after {
	content: '';
	clear: both;
	display: block;
	height: 0;
	width: 0;
}

/** ---------------------------------------
 * Slider 
 ----------------------------------------*/
.container {
	width: 100%;
	height: 500px;
	margin: 40px auto 0;
}

.slider-wrapper {
	z-index: 0;
	position: relative;
	width: 100%;
	height: 450px;
	background: #FFF;
	border: 5px solid #4b5973;
	overflow: hidden;
}

.slider-wrapper li {
	display: none;
}

.slider-wrapper .current-slide {
	display: block;
}

.slider-shadow {
	width: 100%;
	height: 0px;
	position: relative;
}

.slider-shadow:after, .slider-shadow:before {
	z-index: -1;
	content: '';
	position: absolute;
	background: #171c24;
	height: 100%;
	width: 50%;
	left: 10px;
	top: -20px;
	-webkit-transform: rotate(-4deg);
	-ms-transform: rotate(-4deg);
	-o-transform: rotate(-4deg);
	transform: rotate(-4deg);
	-webkit-box-shadow: 0 0 15px 8px #171c24;
	box-shadow: 0 0 15px 8px #171c24;
}

.slider-shadow:before {
	right: 10px;
	left: auto;
	-webkit-transform: rotate(4deg);
	-ms-transform: rotate(4deg);
	-o-transform: rotate(4deg);
	transform: rotate(4deg);
}

.slider-wrapper img {
	position: absolute;
	max-width: 100%;
	height: auto;
	top: 0;
	left: 0;
}

/**
 * ---[Caption] ---------------------- 
 **/
.slider-wrapper .caption {
	position: absolute;
	bottom: 0;
	left: 0;
	background: rgba(0,0,0,0.65);
	width: 100%;
	padding: 10px;
	color: #FFF;
	-webkit-transform: translateY(100%);
	-ms-transform: translateY(100%);
	-o-transform: translateY(100%);
	transform: translateY(100%);
	opacity: 0;
	-webkit-transition: all 0.4s ease;
	-o-transition: all 0.4s ease;
	transition: all 0.4s ease;
}

.slider-wrapper li:hover .caption {
	-webkit-transform: translateY(0);
	-ms-transform: translateY(0);
	-o-transform: translateY(0);
	transform: translateY(0);
	opacity: 1;
}


.slider-wrapper h2 {
	color: #00c5b9;
	font-size: 2em;
	font-weight: 400;
	margin-bottom: 6px;
}

.slider-wrapper p {
	font-size: 1.6em;
	font-weight: 300;
	line-height: 1.4em;
}

/**
 * ---[Botones-Control] ---------------------- 
 **/
.control-buttons {
	margin-top: 15px;
	text-align: center;
}

.control-buttons li {
	cursor: pointer;
	display: inline-block;
	background: #424f66;
	text-indent: -99999px;
	height: 12px;
	width: 12px;
	margin: 0 6px;
	-webkit-border-radius: 50%;
	-moz-border-radius: 50%;
	border-radius: 50%;
}

.control-buttons li.active {
	background: #00c5b9;
}

.authors {
	text-align: center;
	color: #7a8699;
	display: block;
	font-size: 1.6em;
	font-weight: 300;
	margin-top: 80px;
	font-size: 300;
}

/** ---------------------------------------
 * Responsive 
 ----------------------------------------*/
 @media only screen and (max-width: 825px) {
 	.container {
 		width: 500px;
 	}

 	.slider-wrapper {
 		height: 260px;
 	}
 }

 @media only screen and (max-width: 535px) {
 	.container {
 		padding: 5px;
 		width: 100%;
 		margin: 40px 0 0 0;
 	}

 	.slider-wrapper {
 		height: 200px;
 	}
	
 	.slider-wrapper .caption {
 		display: none;
 	}

 }

 @media only screen and (max-width: 410px) {
 	.slider-wrapper {
 		height: 160px;
 	}
 }
 .hv img:hover{
 	opacity: 0.7;
 	transition-duration: 0.5s;
 }
 .hv img{
 	transition-duration: 1s;
 }
</style>
<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,700' rel='stylesheet' type='text/css'>  
      <link rel="stylesheet" href="css/style.css">
</head>

<div style="margin-top: 2%; margin-bottom: 2%;" class="w3-row">
	<div style="text-align: center;" class="w3-col s3">
		<?php
			$count = 3;
			$sql = "SELECT DISTINCT SP_ID,SP_TEN FROM LENH ORDER BY L_NGAYDAT LIMIT 0,3 ";
			mysqli_set_charset($conn,'UTF8');
			$rs = mysqli_query($conn,$sql);
			while($row1 = mysqli_fetch_array($rs,MYSQLI_ASSOC)){
			$idsp = $row1['SP_ID'];
			$rsim = mysqli_fetch_row(mysqli_query($conn,"SELECT HA_TEN FROM HINHANH WHERE SP_ID = $idsp"));
		?>

		<a class="hv" href="index.php?xem=chitietsanpham&id=<?php echo $row1['SP_ID']; ?>" title="<?php echo $row1['SP_TEN']; ?>"><img src="upload/<?php echo $rsim[0]; ?>" style=" margin-left: 2%; border: 1px solid grey; border-radius: 7px; margin-bottom: 2%; width: 200px; height: 148px;" /></a>
<?php
$count--;
	}
	if($count > 0){
	for($i=1;$i<=$count;$i++){
	?>
		<img src="no-product.png" style="border: 1px solid grey; border-radius: 7px; margin-bottom: 2%; width: 200px; height: 148px;" />
	<?php
}
}

?>
	</div>
	<section class="w3-col s6" id="slider" class="container">
		<ul class="slider-wrapper" style="border-radius: 7px;">
			<?php 
				$sql = "SELECT * FROM SANPHAM LIMIT 0,3";
				mysqli_set_charset($conn,'UTF8');
				$rs = mysqli_query($conn,$sql);
				while($row = mysqli_fetch_array($rs,MYSQLI_ASSOC)){
					$id = $row['SP_ID'];
					$rsh = mysqli_fetch_row(mysqli_query($conn,"SELECT HA_TEN FROM HINHANH WHERE SP_ID = $id LIMIT 0,1"));
			?>
		<li class="current-slide">
			<img style="width: 900px; height: 450px;" src="upload/<?php echo $rsh[0];?>" title="" alt="">

			<a href="index.php?xem=chitietsanpham&id=<?php echo $row['SP_ID']; ?>"><div class="caption">
				<h2 class="slider-title"><?php echo $row['SP_TEN']; ?></h2>
				<p><?php echo $row['SP_MOTANGAN']; ?></p>
			</div></a>
		</li>
		<?php 
			}
		?>
		</ul>
		<!-- Sombras -->
		<div class="slider-shadow"></div>
		
		<!-- Controles de Navegacion -->
		<ul id="control-buttons" class="control-buttons"></ul>
	</section>
	<div style="text-align: center;" class="w3-col s3">
		<?php
			$count = 3;
			$sql = "SELECT SP_ID,SP_TEN,COUNT(SP_ID) AS SL FROM LENH GROUP BY SP_ID ORDER BY SL DESC LIMIT 0,3";
			mysqli_set_charset($conn,'UTF8');
			$rs = mysqli_query($conn,$sql);
			while($row1 = mysqli_fetch_array($rs,MYSQLI_ASSOC)){
			$idsp = $row1['SP_ID'];
			$rsim = mysqli_fetch_row(mysqli_query($conn,"SELECT HA_TEN FROM HINHANH WHERE SP_ID = $idsp"));
		?>

		<a class="hv" href="index.php?xem=chitietsanpham&id=<?php echo $row1['SP_ID']; ?>"><img title="<?php echo $row1['SP_TEN']; ?>" src="upload/<?php echo $rsim[0]; ?>" style="border: 1px solid grey; border-radius: 7px; margin-bottom: 2%; width: 200px; height: 148px;" /></a>
<?php
$count--;
	}
	if($count > 0){
	for($i=1;$i<=$count;$i++){
	?>
		<img src="no-product.png" style="border: 1px solid grey; border-radius: 7px; margin-bottom: 2%; width: 200px; height: 148px;" />
	<?php
}
}

?>
	</div>
	<!-- Imagenes Copyright -->
	<p class="authors">
		<a href="https://www.flickr.com/photos/flickr/galleries/72157645330786244/"></a>
	</p>
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>
    <script  src="js/index.js"></script>
</div>
<script type="text/javascript">
	/**
 * @Titulo: Slider Responsivo
 * @Autor: Creaticode
 * @URL: http://creaticode.com 
 */
$(function() {
	/** -----------------------------------------
	 * Modulo del Slider 
	 -------------------------------------------*/
	 var SliderModule = (function() {
	 	var pb = {};
	 	pb.el = $('#slider');
	 	pb.items = {
	 		panels: pb.el.find('.slider-wrapper > li'),
	 	}

	 	// Interval del Slider
	 	var SliderInterval,
	 		currentSlider = 0,
	 		nextSlider = 1,
	 		lengthSlider = pb.items.panels.length;

	 	// Constructor del Slider
	 	pb.init = function(settings) {
	 		this.settings = settings || {duration: 8000};
	 		var items = this.items,
	 			lengthPanels = items.panels.length,
	 			output = '';

	 		// Insertamos nuestros botones
	 		for(var i = 0; i < lengthPanels; i++) {
	 			if(i == 0) {
	 				output += '<li class="active"></li>';
	 			} else {
	 				output += '<li></li>';
	 			}
	 		}

	 		$('#control-buttons').html(output);

	 		// Activamos nuestro Slider
	 		activateSlider();
	 		// Eventos para los controles
	 		$('#control-buttons').on('click', 'li', function(e) {
	 			var $this = $(this);
	 			if(!(currentSlider === $this.index())) {
	 				changePanel($this.index());
	 			}
	 		});

	 	}

	 	// Funcion para activar el Slider
	 	var activateSlider = function() {
	 		SliderInterval = setInterval(pb.startSlider, pb.settings.duration);
	 	}

	 	// Funcion para la Animacion
	 	pb.startSlider = function() {
	 		var items = pb.items,
	 			controls = $('#control-buttons li');
	 		// Comprobamos si es el ultimo panel para reiniciar el conteo
	 		if(nextSlider >= lengthSlider) {
	 			nextSlider = 0;
	 			currentSlider = lengthSlider-1;
	 		}

	 		controls.removeClass('active').eq(nextSlider).addClass('active');
	 		items.panels.eq(currentSlider).fadeOut('slow');
	 		items.panels.eq(nextSlider).fadeIn('slow');

	 		// Actualizamos los datos del slider
	 		currentSlider = nextSlider;
	 		nextSlider += 1;
	 	}

	 	// Funcion para Cambiar de Panel con Los Controles
	 	var changePanel = function(id) {
	 		clearInterval(SliderInterval);
	 		var items = pb.items,
	 			controls = $('#control-buttons li');
	 		// Comprobamos si el ID esta disponible entre los paneles
	 		if(id >= lengthSlider) {
	 			id = 0;
	 		} else if(id < 0) {
	 			id = lengthSlider-1;
	 		}

	 		controls.removeClass('active').eq(id).addClass('active');
	 		items.panels.eq(currentSlider).fadeOut('slow');
	 		items.panels.eq(id).fadeIn('slow');

	 		// Volvemos a actualizar los datos del slider
	 		currentSlider = id;
	 		nextSlider = id+1;
	 		// Reactivamos nuestro slider
	 		activateSlider();
	 	}

		return pb;
	 }());

	 SliderModule.init({duration: 4000});

});
</script>