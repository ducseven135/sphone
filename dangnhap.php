
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Đăng nhập</title>
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
   <h2>Thành viên</h2> 
   <hr> 
   <?php 
   if(!isset($_SESSION['usernane'])){
   	?>
   <form class="form-horizontal" method="post" id="login_form" role="form"> 
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
       <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span> 
       	<input name="txtPassword" placeholder="Password" class="form-control" type="password"> 
       </div> 
      </div> 
     </div>
     
     <div class="form-group"> 
      <div class="col-md-12"> 
      	<input type='submit' class="btn btn-md btn-danger" name="dangnhap" value='Đăng nhập' />
            <a href='dangky.php'  class="btn btn-md btn-danger" >Đăng ký</a>
      </div> 
     </div> 
    </fieldset> 
   </form> 
   <?php
}
else{
	header('location:admin/admin.php');
}
?>
  </div> 
 </div>
</div>
<div class="container-fluid"> 
 <div class="row-fluid"> 
  <div class="col-md-offset-4 col-md-4" id="box"><p> 
  <?php
session_start();
include('connect.php');
if (isset($_POST['dangnhap'])) 
{ 
    $username = $_POST['txtUsername'];
    $password =$_POST['txtPassword'];
         if (!$username || !$password) {
        echo  '<div class="alert alert-danger">Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu.
        </div>'; 
        	
        exit;
    }
     
    $sql="SELECT usernane, mat_khau FROM user WHERE usernane='$username'";
    $ret = mysqli_query($conn,$sql);
    if (mysqli_num_rows($ret) == 0) {
        echo '<div class="alert alert-danger">Tên đăng nhập này không tồn tại. Vui lòng kiểm tra lại.
        </div>';
        exit;
        
    }
     
    $row = mysqli_fetch_array($ret);
     
    if ($password != $row['mat_khau']) {
        echo '<div class="alert alert-danger">Mật khẩu không đúng. Vui lòng nhập lại.
        </div>';
        exit;
    }
     
    $_SESSION['usernane'] = $username;
    header('location:admin/admin.php');
    die();
}
?>
</p>
  	</div>
  </div>
</div>

</body>
</html>