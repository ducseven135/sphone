
	<?php

if (isset($_SESSION['cart'])) {
    if (isset($_POST['sbm'])) {
        foreach ($_POST['qtt'] as $id => $val) {
            $_SESSION['cart'][$id] = $val;
        }
    }
    $arr = array();
    foreach ($_SESSION['cart'] as $prd_id => $qtt) {
        $arr[] = $prd_id;
    }
    $total_price_all = 0;
    $str_id = "(" . implode(",", $arr) . ")";
    $sql = "SELECT * FROM product WHERE prd_id IN $str_id";
    $query = mysqli_query($conn, $sql);
?>

	<!--giỏ hàng-->
<div class="container" style="min-height: 45%;">
	<div class="row">
        <div class="col-sm-12">
        	<h3><b>Giỏ hàng của bạn</b></h3><br>
            <div class="table-responsive">
            	 <form id="cart" method="post">
                <table class="table table-bordered">
                    <tr>
                        <th>Hình</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Thành tiền</th>
                        <th></th>
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
	                        <input class="col-lg-4" style="height:30px;" type="number" min="1" name="qtt[<?php echo $row['prd_id']; ?>]" value="<?php echo $_SESSION['cart'][$row['prd_id']]; ?>" />
                        </td>
                        <td> <?php echo number_format($row['prd_price']); ?> VNĐ </td>
                        <td><?php echo number_format($total_price) ?> VNĐ </td>
                        <td><a href="cart_del.php?prd_id=<?php echo $row['prd_id']; ?>" onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?');" class="btn btn-danger btn-sm">Xóa</a></td>
                    </tr>       
                    <?php
			        	}
			        ?>
                    <tr>
                        <td></td>
                        <td class="text-center"><button onclick="document.getElementById('cart').submit();" class="btn btn-success" type="submit" name="sbm">Cập nhật giỏ hàng</button></td>
                        <td></td>
                        <td class="text-right">Tổng thành tiền:</td>
                        <td style="font-size:large;"><?php echo number_format($total_price_all) ?> VNĐ </td>
                        <td><a href="product.php?page_layout=thanhtoan" role="button" class="btn btn-success">Thanh toán</a></td>
                    </tr>
             
                </table>
                </form>
            </div>
		</div>
    </div>
</div>



<?php
} else {
    echo '<div class="alert text-danger alert-danger mt-3">Giỏ hàng của bạn hiện tại không có sản phẩm nào !</div>';
}
?>
