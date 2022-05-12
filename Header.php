<div style="display: flex; color:#fff; font-size:17px;padding:0;">
    <div class="box1" style="font-size: 25px;"><a style="text-decoration: none; color:white;" href="Trangchu.php" ><img style="width:35px; height:40px" src="https://livestream.vn/wp-content/uploads/2018/10/d1-kinh-doanh-dien-thoai-va-phu-kien-2.jpg" />
        <style type="text/css">
            @media screen and (max-width: 500px) {
        #logo {
            display: none;
        }}
        </style>
        <span id="logo"><b>Sphone</b></span></a>
    </div>
    <div class="box2">
    <form method="post" class="search-form" action="Trangchu.php?page_layout=search">
            <input type="search" placeholder="Search" class="search-input" name="keyword"/>
            <button type="submit" class="search-button">
            <i style="color:#848484;" class="fas fa-search"></i>
            </button>
          </form>
    </div>
    <div class="box3"><i class="fas fa-phone"></i><b><span> Hotline: </span></b>
    0342947
    </div>
    <div class="box4"><a style="text-decoration: none; color:white;" href="dangnhap.php"><i class="fas fa-user"></i><b><span> Thành viên</span></b></a></div>
    <div class="box5">
        <?php
        if (isset($_SESSION['cart'])) {
            if(isset($_POST['qtt'])){
                $cart = $_POST['qtt'];
            }else{
                $cart = $_SESSION['cart'];
            }
            $total = 0;
            foreach ($cart as $prd_id => $qtt) {
                $total += $qtt;
            }
            
        } else {
            $total = 0;
        }
        ?>
        <a style="text-decoration: none; color:white;" href="product.php?page_layout=cart">
            
        <i class="fas fa-shopping-cart"></i>
        <b><span> Giỏ hàng</span><sup>(<?php echo $total ?>)</sup></b></a>
            
    </div>
    <style type="text/css">
        #a{
            display: none;
            margin-top:15px;
            margin-right: 10px;
        }
                @media screen and (max-width: 768px) {
                    #a {
                        display: block;
                    }
                }
            </style>
        <div id="a">
            <a style="text-decoration: none; color:white;" href="product.php?page_layout=cart">
            <i class="fas fa-shopping-cart"><sup>(<?php echo $total ?>)</sup></i></a>
        </div>
    <div id="toggle">
        <i class="fas fa-bars"></i>
    </div>
</div>
