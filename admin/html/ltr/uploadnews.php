<?php
include('header.php');
include('menu.php');
include('config.php');
?>
<div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Add News Details</h4>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <form  method="POST"  enctype="multipart/form-data" autocomplete="off">
                                <div class="card-body">
                                    <h4 class="card-title">News Info</h4>
                                    <div class="form-group row">
                                            <label for="news"class="col-sm-3 text-right control-label col-form-label">Select News</label>
                                            <div class="col-sm-9">
                                            <select name="news" class="form-control" id="news" required >
                                                <option value="">Select News</option>
                                                <option value="Educational News">Educational News</option>
                                                <option value="Sport News">Sport News</option>
                                                <option value="Extra-Curricular News">Extra-Curricular News</option>
                                                             
                                            </select>
                                            </div>
                                            <span id="desigv" style="color:red; font-size: 10px;"></span>
                                        </div>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">News Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="newsname" class="form-control" id="txtnews_name" placeholder="News Name" required>
                                        </div>
                                    </div>
                            
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Upload file</label>
                                        <div class="col-sm-9">
                                            
                                            <input type="file" name="fileToUpload" id="fileToUpload"class="form-control" id="uplode_image" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">News Desc.</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control"  name="newsdescription"id="txtnews_desc" required></textarea>
                                        </div>
                                   
                                    </div>
                                    
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="submit"  name="submit" class="btn btn-primary float-right mb-3" id="btnsubmit">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                       

                    </div>
                    <div class="col-md-6">
                       
                    </div>
                </div>
                
            </div>
            <footer class="footer text-center">
                All Rights Reserved by SRKI Group.
            </footer>
        </div>
    </div>
<script src="../../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../../assets/extra-libs/sparkline/sparkline.js"></script>
    <script src="../../dist/js/waves.js"></script>
    <script src="../../dist/js/sidebarmenu.js"></script>
    <script src="../../dist/js/custom.min.js"></script>
    <script src="../../assets/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    <script src="../../dist/js/pages/mask/mask.init.js"></script>
    <script src="../../assets/libs/select2/dist/js/select2.full.min.js"></script>
    <script src="../../assets/libs/select2/dist/js/select2.min.js"></script>
    <script src="../../assets/libs/jquery-asColor/dist/jquery-asColor.min.js"></script>
    <script src="../../assets/libs/jquery-asGradient/dist/jquery-asGradient.js"></script>
    <script src="../../assets/libs/jquery-asColorPicker/dist/jquery-asColorPicker.min.js"></script>
    <script src="../../assets/libs/jquery-minicolors/jquery.minicolors.min.js"></script>
    <script src="../../assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="../../assets/libs/quill/dist/quill.min.js"></script> 

    <?php
 include 'config.php';

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

}
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "pdf"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
IF(isset($_POST['submit'])){

    $fname=$_POST['news'];
    $lname=$_POST['newsname'];
    $course=$_FILES['fileToUpload']['name'];
    $description=$_POST['newsdescription'];
    $date=date('Y-m-d'); 
      
   $insertquery="insert into news(`news_type`, `news_name`, `image`, `news_description`,`News_date`) values('$fname','$lname','$course','$description','$date')";
  
   $res = mysqli_query($con,$insertquery) ;  
if($res) {
   ?>
   <script>
          
           alert("news Upload successfull")
       </script>
   <?php
}
 }
?>


