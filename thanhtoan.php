<?php
include("PHPMailer-master/src/Exception.php");
include("PHPMailer-master/src/OAuth.php");
include("PHPMailer-master/src/PHPMailer.php");
include("PHPMailer-master/src/POP3.php");
include("PHPMailer-master/src/SMTP.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
?>

<?php
if(isset($_SESSION['cart'])){
    $arr = array();
    foreach ($_SESSION['cart'] as $prd_id => $qtt) {
        $arr[] = $prd_id;
    }
    $total_price_all = 0;
    $str_id = "(" . implode(",", $arr) . ")";
    $sql = "SELECT * FROM product WHERE prd_id IN $str_id";
    $query = mysqli_query($conn, $sql);
}
?>

<div class="col-sm-12">
    <center><h3><b>Xác nhận đơn hàng</b></h3></center><br>
    <div class="table-responsive">
         <form id="cart" method="post">
        <table class="table table-bordered">
            <tr>
                <th>Hình</th>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Thành tiền</th>
            </tr>
            <?php
                while ($row = mysqli_fetch_array($query)) {
                    $total_price = ($_SESSION['cart'][$row['prd_id']] * $row['prd_price']);
                    $total_price_all += $total_price;

            ?>
            <tr>
                <td class="text-center"><img src="data_upload/<?php echo $row['prd_image']; ?>" width="70" height="70" /> </td>
                <td><a target="_blank" href="product.php?page_layout=detail&prd_id=<?php echo $row['prd_id']; ?>" style="font-size:medium;"><?php echo $row['prd_name']; ?> </a> </td>
                <td>
                    <?php echo $_SESSION['cart'][$row['prd_id']]; ?>
                </td>
                <td> <?php echo number_format($row['prd_price']); ?> VNĐ </td>
                <td><?php echo number_format($total_price) ?> VNĐ </td>
            </tr><?php
                        }
                        ?>
                        <tr>
                        <td></td>
                        <td class="text-center"></td>
                        <td></td>
                        <td class="text-right">Tổng thành tiền:</td>
                        <td style="font-size:large;"><?php echo number_format($total_price_all) ?> VNĐ </td>
                        
                    </tr>
        </table>
    </form>
    </div>  
</div>
                        

<?php
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $add = $_POST['add'];
        if (isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['add'])) {
            if(isset($_SESSION['cart'])){
                $arr = array();
                foreach ($_SESSION['cart'] as $prd_id => $qtt) {
                    $arr[] = $prd_id;
                }
                $total_price_all = 0;
                $str_id = "(" . implode(",", $arr) . ")";
                $sql = "SELECT * FROM product WHERE prd_id IN $str_id";
                $query = mysqli_query($conn, $sql);
            }
        $str_body = '';
        $str_body .= '
            <p>
                <b>Khách hàng:</b> ' . $name . '<br>
                <b>Điện thoại:</b> ' . $phone . '<br>
                <b>Địa chỉ:</b> ' . $add . '<br>
            </p>    
        ';
        $str_body .= '
            <table border="1" cellspacing="0" cellpadding="10" bordercolor="#305eb3" width="100%">
                <tr bgcolor="#305eb3">
                <td width="70%"><b><font color="#FFFFFF">Sản phẩm</font></b></td>
                <td width="10%"><b><font color="#FFFFFF">Số lượng</font></b></td>
                <td width="20%"><b><font color="#FFFFFF">Tổng tiền</font></b></td>
            </tr>
        ';
        $sql = "SELECT * FROM product WHERE prd_id IN $str_id";
        $query = mysqli_query($conn, $sql);
        $total_price_all = 0;
        while ($row = mysqli_fetch_array($query)) {
            $total_price = ($_SESSION['cart'][$row['prd_id']] * $row['prd_price']);
            $total_price_all += $total_price;
            $str_body .= '
                <tr>
                    <td width="70%">' . $row['prd_name'] . '</td>
                    <td width="10%">' . $_SESSION['cart'][$row['prd_id']] . '</td>
                    <td width="20%">' . number_format($total_price) . ' đ</td>
                </tr>
            ';
        }
        $str_body .= '
                <tr>
                    <td colspan="2" width="70%"></td>
                    <td width="20%"><b><font color="#FF0000">' . number_format($total_price_all) . ' đ</font></b></td>
                </tr>
            </table>
        ';
        $str_body .= '
            <p>
                Cám ơn quý khách đã mua hàng tại Shop của chúng tôi, bộ phận giao hàng sẽ liên hệ với quý khách để xác nhận sau 5 phút kể từ khi đặt hàng thành công và chuyển hàng đến quý khách chậm nhất sau 24 tiếng.
            </p>
        ';
        $mail = new PHPMailer(true);                            
        try {
            $mail->SMTPDebug = 2;
            $mail->isSMTP();                      
            $mail->Host = 'smtp.gmail.com';  
            $mail->SMTPAuth = true;        
            $mail->Username = 'ducseven.hd@gmail.com';       
            $mail->Password = 'ducdaica138';
            $mail->SMTPSecure = 'tls';     
            $mail->Port = 587;
            $mail->CharSet = 'UTF-8';
            $mail->setFrom('ducseven.hd@gmail.com', 'Sphone');         
            $mail->addAddress($email);               // Gửi mail tới mail người nhận
            //$mail->addReplyTo('ceo.vietpro@gmail.com', 'Information');
            $mail->addCC('ducseven.hd@gmail.com');
            //$mail->addBCC('bcc@example.com');

            //Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Xác nhận đơn hàng từ Sphone';
            $mail->Body    = $str_body;
            $mail->AltBody = 'Mô tả đơn hàng';

            $mail->send();
            header('location:product.php?page_layout=success');
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }
}
?>

<div class="container">
<div class="row">
    <form class="form-horizontal" id="frm" method="post">
        <div class="col-sm-12 col-md-12">
            <legend>Thông tin liên hệ</legend>
            <div class="form-group">
                <label class="col-lg-4">Họ và tên *</label>
                <div class="col-lg-8">
                    <input type="text" required name="name" class="form-control" style="width:300px;" value="">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-4">Email</label>
                <div class="col-lg-8">
                    <input type="mail" required placeholder="Bắt buộc" class="form-control" name="email" style="width:300px;" value="">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-4">Số điện thoại *</label>
                <div class="col-lg-8">
                    <input type="text" required class="form-control" name="phone" style="width:300px;" value="">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-4">Địa chỉ giao hàng</label>
                <div class="col-lg-8">
                    <textarea required class="form-control" placeholder="Vui lòng ghi địa chỉ chi tiết..." name="add" rows="5" style="height:50px;"></textarea>
                </div>
            </div>
        </div> 
        <button class="btn btn-primary" name="submit">Gửi đơn hàng</button> 

    </form>
        
</div>           
</div>