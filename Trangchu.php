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
<!-- <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">-->
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<title>TGDT</title>
</head>
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
		<div class="row" >
			<?php
				$sql = "SELECT * FROM category ORDER BY cat_id ASC ";
				$query = mysqli_query($conn, $sql);
			?>	
			<style type="text/css">@media screen and (min-width: 768px) {
        nav{
            display: none;
        } 
      </style>
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
			<?php 
				include('nav.php');
			?>
			
			<br>
			<?php
        if (isset($_GET['page_layout'])) {
          switch ($_GET['page_layout']) {
            case "search":
              include("search.php");
              break;
            case "category":
              include("category.php");
              break;
            case "product":
              include("product.php");
              break;
            }
        }else {
          include("product-noibat.php"); 
          include("product_new.php");
        }
      ?>
		</div>
	</div>
	<br><br><br>
	<!--footer-->
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
              2022 © Sphone. All rights reserved. Developed by Sphone.
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