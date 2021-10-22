<?php
$user_id = $_GET['user_id'];
$sql = "SELECT * FROM user WHERE user_id = $user_id";
$query = mysqli_query($connect,$sql);
$row = mysqli_fetch_array($query);
    
if(isset($_POST['sbm'])){
  $user_full = $_POST['user_full'];
  $user_mail = $_POST['user_mail'];
  $user_pass = $_POST['user_pass'];
  $user_re_pass = $_POST['user_re_pass'];
  $user_level = $_POST['user_level'];
  $sql_checkmail = "SELECT * FROM user WHERE user_mail = '$user_mail'";
  $query_checkmail = mysqli_query($connect,$sql_checkmail);
  if(mysqli_num_rows($query_checkmail)>0){
    $user_mail = $_POST['user_mail']; 
    $error_mail = '<div class="alert alert-danger">Email đã tồn tại !</div>';

  }else{
      if($user_pass === $user_re_pass){
        $sql_user = "UPDATE user SET user_full='$user_full',user_mail='$user_mail',user_pass='$user_pass',user_level=$user_level WHERE user_id = $user_id";
        mysqli_query($connect,$sql_user);
        header("location: index.php?page_layout=user"); 

      }else{
          $error_pass ='<div class="alert alert-danger">Mật khẩu nhập lại không chính xác !</div>';
      }
  }
}
?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="">Quản lý thành viên</a></li>
				<li class="active"><?=$row['user_full']?></li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Thành viên: <?=$row['user_full']?></h1>
			</div>
        </div><!--/.row-->
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-8">
                                <?php
                                if(isset($error_mail)){
                                    echo $error_mail;
                                }
                                if(isset($error_pass)){
                                    echo $error_pass;
                                }
                                
                                ?>
                            <form role="form" method="post">
                                <div class="form-group">
                                    <label>Họ & Tên</label>
                                    <input type="text" name="user_full" required class="form-control" value="<?=$row['user_full']?>" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="user_mail" required value="<?=$row['user_mail']?>" class="form-control">
                                </div>                       
                                <div class="form-group">
                                    <label>Mật khẩu</label>
                                    <input type="password" name="user_pass" required  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Nhập lại mật khẩu</label>
                                    <input type="password" name="user_re_pass" required  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Quyền</label>
                                    <select name="user_level" class="form-control">
                                        <option <?php if($row['user_level'] == 1){echo "selected";}?> value=1>Admin</option>
                                        <option <?php if($row['user_level'] == 2){echo "selected";}?> value=2 >Quản lí</option>
                                        <option <?php if($row['user_level'] == 3){echo "selected";}?> value=3 >Thành viên</option>
                                    </select>
                                </div>
                                <button type="submit" name="sbm" class="btn btn-primary">Cập nhật</button>
                                <button type="reset" name="rs" class="btn btn-default">Làm mới</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div><!-- /.col-->
            </div><!-- /.row -->
		
	</div>	<!--/.main-->	

