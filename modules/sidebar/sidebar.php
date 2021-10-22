<div id="sidebar" class="col-lg-4 col-md-12 col-sm-12">
    <div id="banner">
    <?php
        $sql_sidebar = "SELECT * FROM ads ORDER BY ads_id ASC LIMIT 6,6";
        $query_sidebar = mysqli_query($connect,$sql_sidebar);
        while ($row=mysqli_fetch_array($query_sidebar)){
        ?>
        <div class="banner-item">
            <a href="#"><img class="d-block w-100" style="height: 200px;" src="admin/img/products/<?=$row['ads_image']?>"></a>
        </div>
        <?php } ?>
    </div>
</div>