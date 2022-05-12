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
if (isset($_POST['keyword'])) {
    $keyword = $_POST['keyword'];
    $arr = array(); //khai bao mang
    $arr = explode(" ", $keyword); //bien chuoi thanh mang
    $str = "%" . implode("%", $arr) . "%"; //bien mang thanh chuoi
} elseif (isset($_GET['str'])) {
    $str = $_GET['str'];
    $arr = array();
    $arr = explode("%", $str);
    $keyword = implode(" ", $arr);
} else {
    header("location: Trangchu.php");
}
//phan trang
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
$row_per_page = 9;
$per_row = $page * $row_per_page - $row_per_page;
$total_row = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM product WHERE prd_name like '$str'"));
$total_page = ceil($total_row / $row_per_page);
$list_page = "";
//prev
$prev = $page - 1;
if ($prev <= 1) {
    $prev = 1;
}
$list_page .= '<li class="page-item"><a class="page-link" href="Trangchu.php?page_layout=search&page=' . $prev . '&str=' . $str . '">Trang trước</a></li>';
//so trang
for ($i = 1; $i <= $total_page; $i++) {
    if ($i == $page) {
        $active = 'active';
    } else {
        $active = '';
    }
    $list_page .= '<li class="page-item ' . $active . '"><a class="page-link" href="Trangchu.php?page_layout=search&page=' . $i . '&str=' . $str . '">' . $i . '</a></li>';
}
//next
$next = $page + 1;
if ($next >= $total_page) {
    $next = $total_page;
}
$list_page .= '<li class="page-item"><a class="page-link" href="Trangchu.php?page_layout=search&page=' . $next . '&str=' . $str . '">Trang sau</a></li>';
?>
<!--    List Product    -->
<div class="products">
    <div id="search-result">Kết quả tìm kiếm với sản phẩm <span><?php echo $keyword; ?></span></div>
    <div class="product-list row">
        <?php
        $sql = "SELECT * FROM product WHERE prd_name LIKE '$str' ORDER BY prd_id DESC LIMIT $per_row, $row_per_page";
        $query = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($query)) {
        ?>
            <div id="zoom" class="col-lg-2 col-md-4 col-sm-6" style="
		  		box-shadow: 0 0 6px rgba(0, 0, 0, 0.15);   
				border-radius: 10px;
				margin: 5px;">
				<center><a href="product.php?page_layout=detail&prd_id=<?php echo $row['prd_id']; ?>">
				<img src="https://image.cellphones.com.vn/220x/media/catalog/product/i/p/iphone-se-red-select-20220322.jpg" style="width: 160px;height: 160px;margin:30px 0;"></a></center>
				<p><a href="product_detail.php"><b><?php echo $row['prd_name']; ?></b></a></p> 
				<p style="color:#d70018"><b> <?php echo number_format($row['prd_price']), ' VND'; ?></b></p>
			</div>
        <?php
        }
        ?>
    </div>
</div>
<!--    End List Product    -->

<div id="pagination" style="float:right;">
    <ul class="pagination" >
        <?php
        echo $list_page;
        ?>
    </ul>
</div>