
<?php
session_start();
include_once'../config.php';
session_destroy();
echo "<script>window.location='index.php'</script>";
?>