<?php
$ads_id = $_GET['ads_id'];
$sql = "SELECT * FROM ads WHERE ads_id = '$ads_id'";
$query = mysqli_query($connect, $sql);
$row = mysqli_fetch_array($query);
if (isset($_POST['sbm'])) {
    $ads_name = $_POST['ads_name'];
    $ads_phone = $_POST['ads_phone'];
    $ads_price = $_POST['ads_price'];
    $ads_status = $_POST['ads_status'];
    if ($_FILES['ads_image']['name'] == "") {
        $ads_image = $row['ads_image'];
    } else {
        $ads_image = $_FILES['ads_image']['name'];
        $ads_image_tmp = $_FILES['ads_image']['tmp_name'];
        move_uploaded_file($ads_image_tmp, "img/products/" . $ads_image);
    }
    $sql = "UPDATE ads SET ads_name = '$ads_name',ads_phone = '$ads_phone',ads_price = '$ads_price',ads_image = '$ads_image',ads_status = $ads_status WHERE ads_id = $ads_id   ";
    mysqli_query($connect, $sql);
    header("location: index.php?page_layout=ads");
}
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li><a href="">Quản lý quảng cáo</a></li>
            <li class="active">Quảng cáo của <?=$row['ads_name']?></li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Quảng cáo của <?=$row['ads_name']?></h1>
        </div>
    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-6">
                        <form role="form" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Đơn vị thuê quảng cáo</label>
                                <input type="text" name="ads_name" required class="form-control" value="<?= $row['ads_name'] ?>" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>SĐT Liên hệ</label>
                                <input type="number" name="ads_phone" required value="<?=$row['ads_phone'] ?>" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Giá tiền</label>
                                <input type="number" name="ads_price" required value="<?= $row['ads_price'] ?>" class="form-control">
                            </div>


                            <div class="form-group">
                                <label>Tình trạng thanh toán</label>
                                <select name="ads_status" class="form-control">
                                    <option <?php if ($row['ads_status'] == 1) {
                                                echo "selected";
                                            } ?> value=1>Đã thanh toán</option>
                                    <option <?php if ($row['ads_status'] == 0) {
                                                echo "selected";
                                            } ?> value=0>Chưa thanh toán</option>
                                </select>
                            </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Ảnh</label>
                            <input type="file" name="ads_image" onchange="loadFile(event)">
                            <br>
                            <div>
                                <img style="height:180px;width:130px;" id="output"/>
                            </div>
                        </div>
                        <button type="submit" name="sbm" class="btn btn-primary">Cập nhật</button>
                        <button type="reset" class="btn btn-default">Làm mới</button>
                    </div>
                    </form>
                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row -->

</div>
<script>
    var loadFile = function(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('output');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    };
</script>