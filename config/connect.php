<?php
if (!defined("SECURITY")) {
	die("Hành vi của bạn của bạn không được chấp nhận!!!");
}

$connect=mysqli_connect("localhost","root","","mcuongshop");
if($connect){
   mysqli_query($connect,"SET NAMEs 'utf-8' ");


}else{
    echo "Kết nối thất bại";
}

?>