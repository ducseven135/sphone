<style type="text/css">
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
	.product{
		display: flex;
		flex-wrap: wrap;
	}
</style>

<h4><b>ĐIỆN THOẠI MỚI NHẤT</b></h4><div class="product">
 <?php
        $sql = "SELECT * FROM product ORDER BY prd_id DESC LIMIT 10";
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