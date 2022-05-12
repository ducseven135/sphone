<?php
$sql = "SELECT * FROM category ORDER BY cat_id ASC ";
$query = mysqli_query($conn, $sql);
?>

<div>
      <div id="header" style="background-color: #fff">
          <div id="content">
            <div class="content-left">
              <ul id="main-menu">
                <?php
                    while ($row = mysqli_fetch_array($query)) {
                    ?>
              <li>
                <a href="Trangchu.php?page_layout=category&cat_id=<?php echo $row['cat_id']; ?>&cat_name=<?php echo $row['cat_name']; ?>"><?php echo $row['cat_name']; ?></a>
              </li>
              
            <?php
              }
            ?></ul>
          </div>

      <div class="main-content">
        <img class="slide" src="data_upload/S22_ultra.png" style="margin-top: 30px;"  idx="0" alt="">
        <img class="slide" src="data_upload/iPhone_11.png" style="margin-top: 30px;"  idx="1" alt="">
        <img class="slide" src="data_upload/mI_12.png" style="margin-top: 30px;"  idx="2" alt="">

        <img class="btn-change" id="next">
        <img class="btn-change" id="prev">
  
        <div class="change-img">
            <button class="active" idx="0"></button>
            <button idx="1"></button>
            <button idx="2"></button>
        </div>
      </div>
      <div class="content-right">
          <div class="first">
            <img src="data_upload/Right_banner_AW.png" style="width: 265px; height: 115px;border-radius: 10px;" />
          </div>
          <div class="second">
            <img src="data_upload/690-300-_FLIP.png" style="width: 265px; height: 115px;border-radius: 10px;"/>
          </div>
          <div class="third">
          <img src="data_upload/Asus_Desktop.png" style="width: 265px; height: 115px;border-radius: 10px;"/>
        </div>
      </div>
    </div>
  <img style="width: 100%" src="data_upload/1200-75-max.png" />

  </div>
</div>
</div>