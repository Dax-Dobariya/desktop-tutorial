<?php
 include("config.php");
 error_reporting(0);

 $id=$_GET['id'];
 $query="delete from registration where id ={$id}";
 $data=mysqli_query($con,$query);
 header("location:Teacher_info.php");
 mysqli_close($con);

?>