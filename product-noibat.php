<h4><b>ĐIỆN THOẠI NỔI BẬT NHẤT</b></h4><br>
<div class="product">

<?php
        $sql = "SELECT * FROM product WHERE prd_featured = 1 ORDER BY prd_id DESC LIMIT 10";
        $query = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($query)) {
        ?>
<div id="zoom" class="col-lg-2 col-md-3 col-sm-5 col-xs-5" style="
		  
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
<br><br>