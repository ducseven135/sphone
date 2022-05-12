<?php
session_start();
ob_start();
include_once("connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

	<title>TGDT</title>
</head>
<style type="text/css">
	
    table{
        border-collapse:collapse;
        width:100%;
        border: 1px solid #E6E6E6;
    }
    td{
        text-align:left;
        padding:10px; 
        border-top:1px solid #E6E6E6;
    }
    #add-cart a:hover{
	}	
	#add-cart a{
		display:inline-table;
		border-radius:10px;
		border:1px solid #EB1F27;
		background:#e11b1e;
		padding:5px 10px;
		color:#FFF;
		width: 100%;
		text-decoration:none;
		text-align: center;
	}
	#zoom{
	display:block;
	transition: all .3s ease;
	background-color: #fff;
	height: 300px;
	}

	#zoom:hover{
		transform: scale(1.02);
	}
	#zoom a{
		text-decoration: none;
		color: #000;
	}
</style>
<body style="background-color: #FAFAFA;">
	<div style="height:60px; background-color:rgb(190, 30, 45);" >
		<div class="container">
			<div class="row" >
				<?php 
				include('Header.php');
				?>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<?php
$sql = "SELECT * FROM category ORDER BY cat_id ASC ";
$query = mysqli_query($conn, $sql);
?>	
<nav style="display: none;">
				<ul id="main-menu">
              <?php
                    while ($row = mysqli_fetch_array($query)) {
                    ?>
              <li>
                <a href="Trangchu.php?page_layout=category&cat_id=<?php echo $row['cat_id']; ?>&cat_name=<?php echo $row['cat_name']; ?>"><?php echo $row['cat_name']; ?></a>
              </li>
              
            <?php
              }
            ?>    
            </ul>
            </nav>
				<br>
</div>
</div>
	<div class="container">
		<div class="row">
			<?php
                    if (isset($_GET['page_layout'])) {
                        switch ($_GET['page_layout']) {
                            case "search":
                                include("search.php");
                                break;
                            case "detail":
                                include("detail.php");
                                break;
                            case "cart":
		                            include("cart.php");
		                            break;
	                        case "thanhtoan":
	                            include("thanhtoan.php");
	                            break;
	                        case "success":
	                            include("thanhcong.php");
	                            break;

                        }
                    } else {
                        include("Trangchu.php"); 
                    }
                    ?>
			<!---->
			</div>
		</div>
<br>
<div class="container">
	<div class="row">
		<div style="border-bottom: 1px solid;color:#D8D8D8;"></div><br>
		<h4><b>CÓ THỂ BẠN SẼ THÍCH</b></h4>
<?php
        $sql = "SELECT * FROM product WHERE prd_featured = 1 ORDER BY prd_id DESC LIMIT 5";
        $query = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($query)) {
        ?>
<div id="zoom" class="col-lg-2 col-md-4 col-sm-6" style="
		  
		box-shadow: 0 0 6px rgba(0, 0, 0, 0.15);   
		border-radius: 10px;
		margin: 5px;">
	<center><a href="product.php?page_layout=detail&prd_id=<?php echo $row['prd_id']; ?>">
	<img src="data_upload/<?php echo $row['prd_image']; ?>" style="width: 130px;height: 160px;margin:30px 0;"></a></center>
	<p><a href="product.php?page_layout=detail&prd_id=<?php echo $row['prd_id']; ?>"><b><?php echo $row['prd_name']; ?></b></a></p> 
	<p style="color:#d70018"><b> <?php echo number_format($row['prd_price']), ' VND'; ?></b></p>
</div>
 <?php
        }
        ?>
</div>
</div>



	<br><br><br>
	<div style="box-shadow: 0 0 6px rgba(0, 0, 0, 0.15); 	background-color:#fff;"><br>
		<div class="container">
			<div class="row" >
				<?php 
				include('footer.php');
				?>
			</div>
		</div>
	</div>
	<center>
		<div style="background-color: #BDBDBD;">  
		   <div class="container">
	            <div class="row">
	                <div class="col-lg-12 col-md-12 col-sm-12">
	                   2018 © Sphone. All rights reserved. Developed by Sphone.
	                </div>
	            </div>
		    </div>
	    </div>
	</center>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/Header.js"></script>
    <script src="js/script.js"></script>
</body>
</html>