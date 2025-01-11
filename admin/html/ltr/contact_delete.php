<?php
 include("config.php");
 $id=$_GET['id'];
 $query="delete from contact where c_id ={$id}";
 $data=mysqli_query($con,$query);
 header("location:contactus.php");
 mysqli_close($con);
?>