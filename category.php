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
</style>
<?php
$cat_id = $_GET['cat_id'];
$cat_name = $_GET['cat_name'];
$sql_page = "SELECT * FROM product WHERE cat_id = $cat_id";
$query_page = mysqli_query($conn,$sql_page);
$total_row = mysqli_num_rows($query_page);
//phan trang
if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = 1;
}
$row_per_page = 10;
$per_row = $page * $row_per_page - $row_per_page;
$total_page = ceil($total_row/$row_per_page);
// prev
$list_page = "";
$prev = $page - 1;
if($prev <= 0){
    $prev = 1;
}
$list_page .= '<li class="page-item"><a class="page-link" href="Trangchu.php?page_layout=category&cat_id='.$cat_id.'&cat_name='.$cat_name.'&page='.$prev.'">Trang trước</a></li>';
//so trang
for($i = 1; $i <= $total_page; $i++ ){
    if($i == $page){
        $active = "active";
    }else{
        $active = '';
    }
    $list_page .= '<li class="page-item '.$active.'"><a class="page-link" href="Trangchu.php?page_layout=category&cat_id='.$cat_id.'&cat_name='.$cat_name.'&page='.$i.'">'.$i.'</a></li>';   
}
//next
$next = $page + 1;
if($next >= $total_page){
    $next = $total_page;
}
$list_page .= '<li class="page-item"><a class="page-link" href="Trangchu.php?page_layout=category&cat_id='.$cat_id.'&cat_name='.$cat_name.'&page='.$next.'">Trang sau</a></li>';
?>

<div class="products">
    
	<h3><?php echo $cat_name; ?> (hiện có <?php echo $total_row; ?> sản phẩm)</h3>
    <div class="product-list row">
        <?php
        $sql = "SELECT * FROM product WHERE cat_id = $cat_id ORDER BY prd_id DESC LIMIT $per_row, $row_per_page";
        $query = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($query)){
        ?>
        <div id="zoom" class="col-lg-2 col-md-4 col-sm-6" style="
		  		box-shadow: 0 0 6px rgba(0, 0, 0, 0.15);   
				border-radius: 10px;
				margin: 5px;">
				<center><a href="product.php?page_layout=detail&prd_id=<?php echo $row['prd_id']; ?>">
				<img src="data_upload/<?php echo $row['prd_image']; ?>" style="width: 160px;height: 160px;margin:30px 0;"></a></center>
				<p><a href="product_detail.php"><b><?php echo $row['prd_name']; ?></b></a></p> 
				<p style="color:#d70018"><b> <?php echo number_format($row['prd_price']), ' VND'; ?></b></p>
			</div>
        <?php
        }
        ?>
    </div>
</div>
<!--	End List Product	-->

<div id="pagination" style="float:right;">
    <ul class="pagination">
        <?php
        echo $list_page;
        ?>
    </ul>
</div>