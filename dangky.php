
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css" rel="stylesheet"> <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    
</head>
<style type="text/css">
    body {  
background-image: linear-gradient(#6A181E,#6A181D);
}
 
#box {  
border: 1px solid rgb(200, 200, 200);   
box-shadow: rgba(0, 0, 0, 0.1) 0px 5px 5px 2px; 
background: rgba(200, 200, 200, 0.1);   
border-radius: 4px; top:50px;
}
 
h2 {    
text-align:center;  
color:#fff;
}
</style>
<body>
    <div class="container-fluid"> 
 <div class="row-fluid"> 
  <div class="col-md-offset-4 col-md-4" id="box"> 
   <h2>Đăng ký thành viên</h2> 
   <hr> 
   <form class="form-horizontal" method="POST" role="form"> 
    <fieldset> 
     <div class="form-group"> 
      <div class="col-md-12"> 
       <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span> 
        <input name="txtUsername" placeholder="Username" class="form-control" type="text"> 
       </div> 
      </div> 
     </div> 
     <div class="form-group"> 
      <div class="col-md-12"> 
        <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i>
        </span>
        <input name="txtEmail" placeholder="Email" class="form-control" type="text"> 
       </div> 
      </div> 
     </div>
     <div class="form-group"> 
      <div class="col-md-12"> 
       <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span> 
        <input name="txtPassword" placeholder="Password" class="form-control" type="password"> 
       </div> 
      </div> 
     </div> 
     <div class="form-group"> 
      <div class="col-md-12"> 
       <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span> 
        <input name="txtPassword1" placeholder="Nhập lại password" class="form-control" type="password"> 
       </div> 
      </div> 
     </div> 
     <div class="form-group"> 
      <div class="col-md-12"> 
         <input type='submit' name="dangky" class="btn btn-md btn-danger"  value='Đăng ký' />
            <input type="reset" class="btn btn-md btn-danger" value="Nhập lại" />
      

      </div> 
     </div> 
    </fieldset> 
   </form> 
  </div> 
 </div>
</div>

  <div class="container-fluid"> 
 <div class="row-fluid"> 
  <div class="col-md-offset-4 col-md-4" id="box"> <p>
<?php
 
    if (!isset($_POST['txtUsername'])){
        die('');
    }
    include('connection.php');
    header('Content-Type: text/html; charset=UTF-8');
    if (isset($_POST['dangky'])) 
{       
    $username   = $_POST['txtUsername'];
    $password   = $_POST['txtPassword'];
    $email      = $_POST['txtEmail'];
    $password1  = $_POST['txtPassword1'];
    
    if (!$username || !$password || !$email || !$password1 )
    {
        echo '<div class="alert alert-danger">Vui lòng nhập đầy đủ thông tin. </div>';
        exit;
    }

  $sql2="SELECT usernane FROM thanhvien WHERE usernane='$username'";
  $ret2=mysqli_query($conn,$sql2);     
    if (mysqli_num_rows($ret2)> 0){
        echo '<div class="alert alert-danger">Tên đăng nhập này đã có người dùng. Vui lòng chọn tên đăng nhập khác. </div>';
        exit;
    }
    if ($password1!=$password){
        echo '<div class="alert alert-danger">Mật khẩu không trùng khớp.</div>';
        exit;
    }
  $sql="SELECT email FROM thanhvien WHERE email='$email'";
  $ret1=mysqli_query($conn,$sql);
    if (mysqli_num_rows($ret1) > 0)
    {
        echo '<div class="alert alert-danger">Email này đã có người dùng. Vui lòng chọn Email khác. </div>';
        exit;
    }
  
    $sql1="INSERT INTO thanhvien ( usernane, mat_khau, email)VALUES ('$username','$password','$email')";
    $ret3=mysqli_query($conn,$sql1);
                          
    //Thông báo quá trình lưu
    if (!$ret3)
       echo '<div class="alert alert-danger">Có lỗi xảy ra trong quá trình đăng ký.</div>';
    else
       echo "<font color='white'>Quá trình đăng ký thành công.</font> <a href='quanly.php'>Về trang quản trị</a>";
   }
?></p>
</div>
</div>
</div>
</body>
</html>