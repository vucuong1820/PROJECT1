<?php
$cat_id = $_GET['cat_id'];
$cat_name = $_GET['cat_name'];
$sql_page = "SELECT * FROM product WHERE cat_id=$cat_id ORDER BY prd_id DESC";
$query_page = mysqli_query($connect,$sql_page);
//phân trang cho pagination
if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = 1;
}
$row_per_page = 9; //số sp trong 1 trang
$per_rows = ($page * $row_per_page) - $row_per_page; // trang bắt đầu
$total_rows= mysqli_num_rows($query_page);//tổng số sp lấy ra
$total_page = ceil($total_rows/$row_per_page);// tính toán số trang
$list_page = '';
$page_prev = $page - 1 ;//nút preview cho phân trang
if($page_prev <= 1){
   $page_prev = 1;
}
$list_page .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=category&cat_id='.$cat_id.'&cat_name='.$cat_name.'&page='.$page_prev.'">Trang trước</a></li>'; 
// page hiện tại
for($i = 1;$i <= $total_page;$i++){
    if($i == $page){
         $active = 'active';
    }else{
        $active = '';
    }
    $list_page .='<li class="page-item '.$active.'"><a class="page-link" href="index.php?page_layout=category&cat_id='.$cat_id.'&cat_name='.$cat_name.'&page='.$i.'">'.$i.'</a></li>';
}
//nút next cho phân trang
$page_next = $page + 1;
if($page_next > $total_page){
   $page_next = $total_page;
}
$list_page .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=category&cat_id='.$cat_id.'&cat_name='.$cat_name.'&page='.$page_next.'">Trang sau</a></li>';
// in ra các bản ghi 

$sql = "SELECT * FROM product WHERE cat_id = $cat_id ORDER BY prd_id DESC LIMIT $per_rows, $row_per_page";
$query = mysqli_query($connect,$sql);
$num_rows = mysqli_num_rows($query);

?>
<!--	List Product	-->
<div class="products">
    <h3><?=$cat_name?> (hiện có <?=$total_rows?> sản phẩm)</h3>
    <div class="product-list row">
    <?php
    while($row = mysqli_fetch_array($query)){
    ?>
        <div class="col-lg-4 col-md-6 col-sm-12 mx-product">
            <div class="product-item card text-center">
                <a href="index.php?page_layout=product&prd_id=<?=$row['prd_id']?>"><img src="admin/img/products/<?=$row['prd_image']?>"></a>
                <h4><a href="index.php?page_layout=product&prd_id=<?=$row['prd_id']?>"><?=$row['prd_name']?></a></h4>
                <p>Giá Bán: <span><?=number_format($row['prd_price'])?>đ</span></p>
            </div>
            
        </div>
        <?php } ?>
    </div>
</div>
<!--	End List Product	-->

<div id="pagination">
    <ul class="pagination">
    <?=$list_page?>
        <!-- <li class="page-item"><a class="page-link" href="#">Trang trước</a></li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Trang sau</a></li> -->
    </ul>
</div>