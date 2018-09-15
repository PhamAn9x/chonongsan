<?php
include('config/connect.php');
include ("PHPMailer/PHPMailer/PHPMailer.php");
include ("PHPMailer/PHPMailer/SMTP.php");
include ("PHPMailer/PHPMailer/Exception.php");
include ("PHPMailer/PHPMailer/OAuth.php");
include ("PHPMailer/PHPMailer/POP3.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
session_start();
$sdt = $_SESSION['dt'];
$sql = "SELECT * FROM USER WHERE USR_SDT= '$sdt'";
mysqli_set_charset($conn,'UTF8');
$rs = mysqli_fetch_array(mysqli_query($conn,$sql),MYSQLI_ASSOC);
function sendMail($title, $content, $nTo, $mTo,$diachicc=''){
    $nFrom = 'Nong San Hau Giang';
    $mFrom = 'sannongsanhaugiang@gmail.com';  //dia chi email cua ban 
    $mPass = 'nongsanhaugiang2018';       //mat khau email cua ban
    $mail             = new PHPMailer();
    $body             = $content;
    $mail->IsSMTP(); 
    $mail->CharSet   = "utf-8";
    $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
    $mail->SMTPAuth   = true;                    // enable SMTP authentication
    $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
    $mail->Host       = "smtp.gmail.com";        
    $mail->Port       = 465;
    $mail->Username   = $mFrom;  // GMAIL username
    $mail->Password   = $mPass;               // GMAIL password
    $mail->SetFrom($mFrom, $nFrom);
    //chuyen chuoi thanh mang
    $ccmail = explode(',', $diachicc);
    $ccmail = array_filter($ccmail);
    if(!empty($ccmail)){
        foreach ($ccmail as $k => $v) {
            $mail->AddCC($v);
        }
    }
    $mail->Subject    = $title;
    $mail->MsgHTML($body);
    $address = $mTo;
    $mail->AddAddress($address, $nTo);
    $mail->AddReplyTo('pntan.ctu@gmail.com', 'Sangiaodichnongsan');
    if(!$mail->Send()) {
        return 0;
    } else {
        return 1;
    }
}

function RandomString()
{
    $characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $randstring = '';
    for ($i = 0; $i <= strlen($characters)-1; $i++) {
        $randstring .=$characters[rand(0, strlen($characters)-1)];
    }
    return  $randstring;
}
?>
<?php
$key = RandomString();
$title = 'XÁC THỰC TÀI KHOẢN';
$content = '<body style="font-size:20px;"> Chào'.'! Bạn đã đăng ký thành công tài khoản tại SÀN GIAO DỊCH NÔNG SẢN TỈNH HẬU GIANG để đang nhập vào hệ thống bạn vui lòng xác thực tài khoản.<br />'.
'<br /><b>THÔNG TIN TÀI KHOẢN</b> <br />'.
'Họ và tên: '.$rs['USR_HO'].' '.$rs['USR_TEN'].'<br />'.
'Ngày sinh: '.$rs['USR_NGAYSINH'].'<br />'.
'Số điện thoại: '.$sdt.'<br />'.
'Nếu thông tin chính xác bạn vui lòng nhấp xác thực để kết thúc đăng ký!'.'<br />'
.
'<a style="text-align:center;" href="http://127.0.0.1/chonongsan/index.php?view=kichhoat&usr='.$sdt.'&key='.$key.'"'.'><button style="width=100px; height="60px;">Xác thực</button></a></body>';
$nTo = 'Huudepzai';
$mTo = $rs['USR_EMAIL'];
echo $rs['USR_EMAIL'];
$diachicc = '';
    //test gui mail
$mail = sendMail($title, $content, $nTo, $mTo,$diachicc='');
if($mail==1){
    $qr=mysqli_query($conn,"UPDATE USER SET USR_KEY = '$key' WHERE USR_SDT = '$sdt'");
    if($qr){
        ?>

        <script type="text/javascript">alert("Bạn đã đăng ký tài khoản thành công! Vui lòng truy cập Email để xác thực tài khoản!");</script>
        <?php
        session_destroy();
    }
}
else{
    ?>
    <script type="text/javascript">alert("Đã xảy ra lỗi!");</script>
    <?php
}
?>