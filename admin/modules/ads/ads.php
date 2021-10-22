<?php
if (!defined("SECURITY")) {
    die("Hành vi của bạn của bạn không được chấp nhận!!!");
}
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="index.php"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li class="active">Chỉnh sửa quảng cáo </li>
        </ol>
    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Chỉnh sửa quảng cáo</h1>
        </div>
    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table data-toolbar="#toolbar" data-toggle="table">
                        <h2 class="page-header">Chỉnh sửa slide</h2>
                        <thead>
                            <tr>
                                <th data-field="id" data-sortable="true">ID</th>
                                <th>Ảnh</th>
                                <th>Đơn vị thuê quảng cáo</th>
                                <th>SĐT Liên hệ</th>
                                <th>Giá tiền</th>
                                <th>Tình trạng thanh toán</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM ads ORDER BY ads_id ASC LIMIT 0,6";
                            $query = mysqli_query($connect, $sql);
                            while ($row = mysqli_fetch_array($query)) {
                            ?>
                                <tr>
                                    <td><?= $row['ads_id'] ?></td>
                                    <td style="text-align: center"><img width="150" height="150" src="img/products/<?= $row['ads_image'] ?>" /></td>
                                    <td><?= $row['ads_name'] ?></td>
                                    <td><?= $row['ads_phone'] ?></td>
                                    <td><?= number_format($row['ads_price']) ?>đ</td>
                                    <?php
                                    if ($row['ads_status'] == 1) {
                                        echo '<td><span class="label label-success">Đã thanh toán</span></td>';
                                    } else {
                                        echo '<td><span class="label label-danger">Chưa thanh toán</span></td>';
                                    }
                                    ?>
                                    <td class="form-group">
                                        <a href="index.php?page_layout=edit_ads&ads_id=<?= $row['ads_id'] ?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                    <table data-toolbar="#toolbar" data-toggle="table">
                        <h2 class="page-header">Chỉnh sửa banner</h2>
                        <thead>
                            <tr>
                                <th data-field="id" data-sortable="true">ID</th>
                                <th>Ảnh sản phẩm</th>
                                <th>Đơn vị thuê quảng cáo</th>
                                <th>SĐT Liên hệ</th>
                                <th>Giá tiền</th>
                                <th>Tình trạng thanh toán</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM ads ORDER BY ads_id ASC LIMIT 6,6";
                            $query = mysqli_query($connect, $sql);
                            while ($row = mysqli_fetch_array($query)) {
                            ?>
                                <tr>
                                    <td><?= $row['ads_id'] ?></td>
                                    <td style="text-align: center"><img width="150" height="150" src="img/products/<?= $row['ads_image'] ?>" /></td>
                                    <td><?= $row['ads_name'] ?></td>
                                    <td><?= $row['ads_phone'] ?></td>
                                    <td><?= $row['ads_price'] ?></td>
                                    <?php
                                    if ($row['ads_status'] == 1) {
                                        echo '<td><span class="label label-success">Đã thanh toán</span></td>';
                                    } else {
                                        echo '<td><span class="label label-danger">Chưa thanh toán</span></td>';
                                    }
                                    ?>
                                    <td class="form-group">
                                        <a href="index.php?page_layout=edit_ads&ads_id=<?= $row['ads_id'] ?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--/.row-->
</div>