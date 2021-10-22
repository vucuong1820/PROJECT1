<?php
$comm_id = $_GET['comm_id'];
session_start();
define("SECURITY",true);
include_once("../../../config/connect.php");
if(isset($_SESSION['mail']) && isset($_SESSION['pass'])){
    mysqli_query($connect, "DELETE FROM comment WHERE comm_id = $comm_id");
    header("location: ../../index.php?page_layout=comment");
}else{
    header("location: ../../index.php");
}

?>