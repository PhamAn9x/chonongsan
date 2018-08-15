<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Upload nhiều ảnh xem trước và thanh tiến trình</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="box-upload">
		<h2>Upload hình ảnh</h2>
		<form action="upload.php" method="POST" enctype="multipart/form-data" id="formUpload" onsubmit="return false;">
			<div class="progress">
				<div class="progress-bar">0%</div>
			</div>
			<input type="file" name="img_file[]" multiple="true" onchange="previewImg(event);" id="img_file" accept="image/*">
			<div class="box-preview-img"></div>
			<button type="reset" class="btn-reset">Làm mới</button>
			<button type="submit" class="btn-submit">Upload</button>
			<div class="output"></div>
		</form>
	</div>
	<script src="js/jquery.js"></script>
	<script src="js/jquery.form.js"></script>
	<script src="js/main.js"></script>
</body>
</html>