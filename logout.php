<?php
session_start();
include 'config.php';
session_destroy();
echo "<script>window.location='index.php'</script>";
?>
 