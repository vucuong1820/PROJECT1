<div id="slide" class="carousel slide" data-ride="carousel">

    <!-- Indicators -->
    <ul class="carousel-indicators">
        <li data-target="#slide" data-slide-to="0" class="active"></li>
        <li data-target="#slide" data-slide-to="1"></li>
        <li data-target="#slide" data-slide-to="2"></li>
        <li data-target="#slide" data-slide-to="3"></li>
        <li data-target="#slide" data-slide-to="4"></li>
        <li data-target="#slide" data-slide-to="5"></li>
    </ul>

    <!-- The slideshow -->
    <div class="carousel-inner">
        <?php
        $sql_slide = "SELECT * FROM ads ORDER BY ads_id ASC LIMIT 0,6";
        $query_slide = mysqli_query($connect,$sql_slide);
        while ($row=mysqli_fetch_array($query_slide)){
        ?>
        <div class="carousel-item <?php if($row['ads_id'] == 1){echo 'active';} ?>">
            <img class="d-block w-100" style="height: 380px;" src="admin/img/products/<?=$row['ads_image']?>" alt="Vietpro Academy">
        </div>
        <?php } ?>
    </div>

    <!-- Left and right controls -->
    <a class="carousel-control-prev" href="#slide" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#slide" data-slide="next">
        <span class="carousel-control-next-icon"></span>
    </a>

</div>