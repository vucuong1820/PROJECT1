<?php
if (!defined("SECURITY")) {
	die("Hành vi của bạn của bạn không được chấp nhận!!!");
}
$mail = $_SESSION['mail'];
$sql_user = "SELECT * FROM user WHERE user_mail = '$mail'";
$query_user = mysqli_query($connect,$sql_user);
$row = mysqli_fetch_array($query_user);
//ktra quyền quản lí thành viên :
$str_user = '';
if($row['user_level'] == 1){
  if(isset($_GET['page_layout'])){
	  if($_GET["page_layout"] == 'user' || $_GET["page_layout"] == 'add_user' || $_GET["page_layout"] == 'edit_user'){
         $active = 'active';
	  }else{
         $active = '';
	  }
	  $str_user .=  '<li class="'.$active.'"><a href="index.php?page_layout=user"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user" /></svg>Quản lý thành viên</a></li>'; 
	  
  }else{
	$str_user .=  '<li class=""><a href="index.php?page_layout=user"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user" /></svg>Quản lý thành viên</a></li>'; 
  }
}else{
	$str_user = '';
}
//ktra quyền quản lý danh mục 
$str_cat = '';
if($row['user_level'] == 1 || $row['user_level'] == 2){
  if(isset($_GET['page_layout'])){
	  if($_GET["page_layout"] == 'category' || $_GET["page_layout"] == 'add_category' || $_GET["page_layout"] == 'edit_category'){
         $active = 'active';
	  }else{
         $active = '';
	  }
	  $str_cat .=  '<li class="'.$active.'"><a href="index.php?page_layout=category"><svg class="glyph stroked open folder"><use xlink:href="#stroked-open-folder" /></svg>Quản lý danh mục</a></li>'; 
	  
  }else{
	$str_cat .=  '<li class=""><a href="index.php?page_layout=category"><svg class="glyph stroked open folder"><use xlink:href="#stroked-open-folder" /></svg>Quản lý danh mục</a></li>'; 
  }
}else{
	$str_cat = '';
}
//Ktra quản lí bình luận
$str_comm = '';
if($row['user_level'] == 1 || $row['user_level'] == 2){
  if(isset($_GET['page_layout'])){
	  if($_GET["page_layout"] == 'comment'){
         $active = 'active';
	  }else{
         $active = '';
	  }
	  $str_comm .=  '<li class="'.$active.'"><a href="index.php?page_layout=comment"><svg class="glyph stroked two messages"><use xlink:href="#stroked-two-messages" /></svg> Quản lý bình luận</a></li>'; 
	  
  }else{
	$str_comm .=  '<li class=""><a href="index.php?page_layout=comment"><svg class="glyph stroked two messages"><use xlink:href="#stroked-two-messages" /></svg> Quản lý bình luận</a></li>'; 
  }
}else{
	$str_comm = '';
}
//ktra quản lí quảng cáo 
$str_ads = '';
if($row['user_level'] == 1 || $row['user_level'] == 2){
  if(isset($_GET['page_layout'])){
	  if($_GET["page_layout"] == 'ads' || $_GET["page_layout"] == 'edit_ads'){
         $active = 'active';
	  }else{
         $active = '';
	  }
	  $str_ads .=  '<li class="'.$active.'"><a href="index.php?page_layout=ads"><svg class="glyph stroked chain"><use xlink:href="#stroked-chain" /></svg> Quản lý quảng cáo</a></li>'; 
	  
  }else{
	$str_ads .=  '<li class=""><a href="index.php?page_layout=ads"><svg class="glyph stroked chain"><use xlink:href="#stroked-chain" /></svg> Quản lý quảng cáo</a></li>'; 
  }
}else{
	$str_ads = '';
}
//ktra quản lí cấu hình
$str_sett = '';
if($row['user_level'] == 1){
	$str_sett = '<li><a href="setting.html"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear" /></svg> Cấu hình</a></li>';
}else{
	$str_sett = '';
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Manh Cuong Shop - Administrator</title>

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/bootstrap-table.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">

	<!--Icons-->
	<script src="js/lumino.glyphs.js"></script>
	<script src="../ckeditor/ckeditor.js"></script>

	<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->


</head>

<body>

	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span>ManhCuong</span>Shop</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user">
								<use xlink:href="#stroked-male-user"></use>
							</svg> Xin chào <?php
							if($row['user_level'] == 1){ echo 'admin';} 
							if($row['user_level'] == 2){ echo 'quản lí';} 
							if($row['user_level'] == 3){ echo 'thành viên';} 
							?> <?= $_SESSION['mail'] ?> <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#"><svg class="glyph stroked male-user">
										<use xlink:href="#stroked-male-user"></use>
									</svg> Hồ sơ</a></li>
							<li><a href="logout.php"><svg class="glyph stroked cancel">
										<use xlink:href="#stroked-cancel"></use>
									</svg> Đăng xuất</a></li>
						</ul>
					</li>
				</ul>
			</div>

		</div><!-- /.container-fluid -->
	</nav>

	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li class="<?php if (!isset($_GET["page_layout"])) {
							echo 'active';
						} ?>"><a href="index.php"><svg class="glyph stroked dashboard-dial">
						<use xlink:href="#stroked-dashboard-dial"></use>
					</svg> Dashboard</a></li>
			<?=$str_user?>
			<?=$str_cat?>
			<li class="<?php if ($_GET["page_layout"] == 'product' || $_GET["page_layout"] == 'add_product' || $_GET["page_layout"] == 'edit_product') {
							echo 'active';
						} ?>"><a href="index.php?page_layout=product"><svg class="glyph stroked bag">
						<use xlink:href="#stroked-bag"></use>
					</svg>Quản lý sản phẩm</a></li>
			<?=$str_comm?>
			<?=$str_ads?>
			<?=$str_sett?>
		</ul>

	</div>
	<!--/.sidebar-->
	<!--/.Master page layout-->
	<?php
	if (isset($_GET["page_layout"])) {
		switch ($_GET["page_layout"]) {
			case "product":
				include_once("modules/product/product.php");
				break;
			case "add_product":
				include_once("modules/product/add_product.php");
				break;
			case "edit_product":
				include_once("modules/product/edit_product.php");
				break;
			case "category":
				include_once("modules/category/category.php");
				break;
			case "add_category":
				include_once("modules/category/add_category.php");
				break;
			case "edit_category":
				include_once("modules/category/edit_category.php");
				break;
			case "user":
				include_once("modules/user/user.php");
				break;
			case "add_user":
				include_once("modules/user/add_user.php");
				break;
			case "edit_user":
				include_once("modules/user/edit_user.php");
				break;
			case "comment":
				include_once("modules/comment/comment.php");
				break;
			case "ads":
				include_once("modules/ads/ads.php");
				break;
			case "edit_ads":
				include_once("modules/ads/edit_ads.php");
				break;	
		}
	} else {
		include_once("dashboard.php");
	}
	?>



	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-table.js"></script>
</body>

</html>