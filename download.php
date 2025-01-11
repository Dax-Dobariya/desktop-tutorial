<?php
include('config.php');

if (isset($_GET['file'])) {
    $id = $_GET['file'];

    $sql = "SELECT * FROM news WHERE id=$id";
    $result = mysqli_query($con, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = 'uploads/' . $file['image'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('uploads/' . $file['image']));
        readfile('uploads/' . $file['image']);

        $newCount = $file['downloads'] + 1;
        exit;
    }

}
?>