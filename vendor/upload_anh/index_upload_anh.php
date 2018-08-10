    <script type="text/javascript" src="vendor/upload_anh/scripts/jquery.min.js"></script>
    <script type="text/javascript" src="vendor/upload_anh/scripts/jquery.form.js"></script>

    <script type="text/javascript" >
        $(document).ready(function () { // Khi nào trang được load thì chạy
            $('#photoimg').live('change', function () { // Khi nào chọn file thì chạy
                $("#preview").html(''); // Xóa hết những cái cũ trong <div id="preview"></div>
                $("#preview").prepend('<img id="loading" src="loader.gif" alt="Uploading...."/>'); // Show loading
                $("#imageform").ajaxForm({
                    success: showResponse // Xử lý trả về từ server bằng funtion showResponse
                }).submit(); // Submit Form

            });
        });
        function showResponse(response) { // Xử lý kết quả trả về với biến response là kết quả trả về từ server
            console.log(response); // Đưa vào console những thông tin trả về
            $('#loading').hide(); // Ẩn loading
            $("#preview").prepend(response); // Đổ vào preview kết quả trả về từ server
            $('#UploadFile').css('float', 'right'); // Float chọn file upload sang phải
        }
    </script>

    <style>

        .preview
        {
            height: 150px;
            width: 140px;
            border: solid 1px #dedede;
            padding: 10px;
            margin-left: 10px;

        }
        #preview
        {
            color:#cc0000;
            font-size:12px
        }
        .fileUpload {
            position: absolute;
            overflow: hidden;
            background-color: #FCFBFB;
            height: 150px;
            width: 140px;
            text-align: center;
        }
        .custom-span {
            font-family: Arial;
            font-weight: bold;
            font-size: 100px;
            color: #FE57A1;
        }
        .custom-para {
            font-family: arial;
            font-weight: bold;
            font-size: 24px;
            color: #585858;
        }
        .photoimg{
            position: absolute;
            top: 0;
            right: 0;
            margin: 0;
            padding: 0;
            font-size: 20px;
            cursor: pointer;
            opacity: 0;
            filter: alpha(opacity=0);
            height: 100%;
            text-align: center;
        }

    </style>
        <div style="width:300px;margin: auto">
            <form id="imageform" method="post" enctype="multipart/form-data" action='doajax.php'>
                <div style="width: 200px">
                    <div id='preview' style="float: left">
                    </div>
                    <div id="UploadFile" style="margin: 10px;">
                        <div class="fileUpload">
                            <span id="c1" class="custom-span" style="margin: 0px -40px;position: absolute;">+</span>
                            <p id="c2" class="custom-para" style="margin-top: 120px;position: absolute;">Thêm ảnh</p>
                            <input id="photoimg" name="photoimg" type="file" class="photoimg">
                        </div>
                </div>
            </form> 
        </div>