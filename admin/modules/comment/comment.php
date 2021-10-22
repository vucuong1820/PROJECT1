<?php
if (!defined("SECURITY")) {
    die("Hành vi của bạn của bạn không được chấp nhận!!!");
}
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
$row_per_page = 5; //  số sp trong 1 trang
$per_rows = ($page * $row_per_page) - $row_per_page; // vị trí bắt đầu lấy bản ghi ( sản phẩm )
echo $total_rows = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM comment")); // lấy ra tổng số sản phẩm từ csdl
$total_page = ceil($total_rows / $row_per_page); // ceil hàm làm tròn lên , tính tổng số trang cho pagination
$list_page = '';
$page_prev = $page - 1; //nút preview cho phân trang
if ($page_prev <= 0) {
    $page_prev = 1;
}
$list_page .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=comment&page=' . $page_prev . '">&laquo;</a></li>';

//Tinh toan so trang
for ($i = 1; $i <= $total_page; $i++) {
    if ($i == $page) {
        $active = 'active';
    } else {
        $active = '';
    }
    $list_page .= '<li class="page-item ' . $active . '"><a class="page-link" href="index.php?page_layout=comment&page=' . $i . '">' . $i . '</a></li>';
}

$page_next = $page + 1; //nút next cho phân trang
if ($page_next > $total_page) {
    $page_next = $total_page;
}
$list_page .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=comment&page=' . $page_next . '">&raquo;</a></li>';
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="index.php"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li class="active">Danh sách bình luận</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách bình luận</h1>
        </div>
    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table data-toolbar="#toolbar" data-toggle="table">

                        <thead>
                            <tr>
                                <th data-field="id" data-sortable="true">ID</th>
                                <th data-field="id-product" data-sortable="true">ID sản phẩm</th>
                                <th>Ảnh sản phẩm</th>
                                <th data-field="name" data-sortable="true">Họ & Tên</th>
                                <th data-field="price" data-sortable="true">Email</th>
                                <th>Bình luận</th>
                                <th>Thời gian bình luận</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM comment INNER JOIN product ON comment.prd_id=product.prd_id ORDER BY comm_id DESC LIMIT $per_rows,$row_per_page";
                            $query = mysqli_query($connect, $sql);
                            while ($row = mysqli_fetch_array($query)) {
                            ?>
                                <tr>
                                    <td><?= $row['comm_id'] ?></td>
                                    <td style="text-align: center"><?= $row['prd_id'] ?></td>
                                    <td><img width="130" height="180" src="img/products/<?= $row['prd_image'] ?>" /></td>
                                    <td><?= $row['comm_name'] ?></td>
                                    <td><?= $row['comm_mail'] ?> </td>
                                    <td><?= $row['comm_details'] ?></td>
                                    <td><?= $row['comm_date'] ?></td>
                                    <td class="form-group">
                                        <a href="modules/comment/del_comment.php?comm_id=<?= $row['comm_id'] ?>" class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa bình luận này không ?');"><i class="glyphicon glyphicon-remove"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="panel-footer">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <?= $list_page ?>
                            <!-- <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li> -->
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!--/.row-->
</div>
<!--/.main-->