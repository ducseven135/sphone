<?php
$prd_id = $_GET['prd_id'];
$sql = "SELECT * FROM product WHERE prd_id = $prd_id ";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);
?>

<h4><b><?php echo $row['prd_name']; ?></b></h4>
			<div style="border-bottom: 1px solid;color:#D8D8D8;"></div>
			<br>
			<div class="col-lg-4 col-md-6 col-sm-12">
            	<center><img src="data_upload/<?php echo $row['prd_image']; ?>" style="margin:30px 0;"></center>
	        </div>
	        <div  class="col-lg-4 col-md-6 col-sm-12">
	            <h2 style="color:#d70018"><b><?php echo number_format($row['prd_price']), '₫'; ?></b></h2>
	            <div style="border-radius: 10px;border: 1px solid #E6E6E6;padding: 10px;">
		            <h4><b>KHUYẾN MÃI</b></h4>
		            <span>Khách hàng có thể mua trả góp sản phẩm với lãi suất 0% với thời hạn 6 tháng kể từ khi mua hàng.</span>
	        	</div> 
	        	<br>
	            <div style="border-radius: 10px;border: 1px solid #E6E6E6;">
		                <div style="border-bottom: 1px solid #E6E6E6; padding: 10px;"><span><b>Bảo hành:</b></span> <?php echo $row['prd_warranty']; ?> </div>
		                <div style="border-bottom: 1px solid #E6E6E6;padding: 10px;"><span><b>Đi kèm:</b></span> <?php echo $row['prd_accessories']; ?></div>
		                <div style="padding: 10px;"><span><b>Tình trạng:</b> </span><?php echo $row['prd_new']; ?></div>               
	        	</div> 
	        	<br>
	            <div id="add-cart"><a href="add_cart.php?prd_id=<?php echo $prd_id; ?>">Mua ngay<p>(Giao tận nơi hoặc nhận tại cửa hàng)</p></a></div><br>
	        </div>
	        
	        <div class="col-lg-4 col-sm-12">
	        	<table>
					<tr><th colspan="2" style="text-align: center;"><h4>THÔNG SỐ KỸ THUẬT</h4></th>
					</tr>
	        		<tr>
	        			<td>Màn hình</td>
	        			<td><?php echo $row['manhinh']; ?></td>
	        		</tr>
	        		<tr>
	        			<td>Camera trước</td>
	        			<td><?php echo $row['camt']; ?> MP</td>
	        		</tr>
	        		<tr>
	        			<td>Camera sau</td>
	        			<td><?php echo $row['cams']; ?> MP</td>
	        		</tr>
	        		<tr>
	        			<td>CPU</td>
	        			<td><?php echo $row['cpu']; ?></td>
	        		</tr>
	        		<tr>
	        			<td>RAM</td>
	        			<td><?php echo $row['ram']; ?> GB</td>
	        		</tr>
	        		<tr>
	        			<td>Bộ nhớ trong</td>
	        			<td><?php echo $row['rom']; ?> GB</td>
	        		</tr>
	        		<tr>
	        			<td>Dung lượng pin</td>
	        			<td><?php echo $row['pin']; ?> mAh</td>
	        		</tr>
	        	</table>
	        </div>
	        <br>
	        </div>
	        <div class="row">
		        <br><div style="border-bottom: 1px solid;color:#D8D8D8;"></div>
		        <div class="col-lg-12 col-md-12 col-sm-12">
		            <h4><b>Đánh giá về iPhone SE 2022</b></h4>
		            <p>
		                Màn hình OLED có hỗ trợ HDR là một sự nâng cấp mới của Apple thay vì màn hình LCD với IPS được tìm thấy trên iPhone 8 và iPhone 8 Plus đem đến tỉ lệ tương phản cao hơn đáng kể là 1.000.000: 1, so với 1.300: 1 ( iPhone 8 Plus ) và 1.400: 1 ( iPhone 8 ).
		            </p>
		            <p>
		                Màn hình OLED mà Apple đang gọi màn hình Super Retina HD có thể hiển thị tông màu đen sâu hơn. Điều này được thực hiện bằng cách tắt các điểm ảnh được hiển thị màu đen còn màn hình LCD thông thường, những điểm ảnh đó được giữ lại. Không những thế, màn hình OLED có thể tiết kiệm pin đáng kể.
		            </p>
		            <p>
		                Cả ba mẫu iPhone mới đều có camera sau 12MP và 7MP cho camera trước, nhưng chỉ iPhone X và iPhone 8 Plus có thêm một cảm biến cho camera sau. Camera kép trên máy như thường lệ: một góc rộng và một tele. Vậy Apple đã tích hợp những gì vào camera của iPhone X?
		            </p>
		            <p>
		                Chống rung quang học (OIS) là một trong những tính năng được nhiều hãng điện thoại trên thế giới áp dụng. Đối với iPhone X, hãng tích hợp chống rung này cho cả hai camera, không như IPhone 8 Plus chỉ có OIS trên camera góc rộng nên camera tele vẫn rung và chất lượng bức hình không đảm bảo.
		            </p>
		            <p>
		                Thứ hai, ống kính tele của iPhone 8 Plus có khẩu độ f / 2.8, trong khi iPhone X có ống kính tele f / 2.2, tạo ra một đường cong nhẹ và có thể chụp thiếu sáng tốt hơn với ống kính tele trên iPhone X.
		            </p>
		            <p>
		                Portrait Mode là tính năng chụp ảnh xóa phông trước đây chỉ có với camera sau của iPhone 7 Plus, hiện được tích hợp trên cả iPhone 8 Plus và iPhone X. Tuy nhiên, nhờ sức mạnh của cảm biến trên mặt trước của iPhone X, Camera TrueDepth cũng có thể chụp với Potrait mode.
		            </p>
	        	</div>