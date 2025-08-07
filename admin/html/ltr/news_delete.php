<?php
 include("config.php");
 

 $id=$_GET['id'];
 $query="delete from news where id ={$id}";
 $data=mysqli_query($con,$query);
 header("location:news.php");
 mysqli_close($con);

?>