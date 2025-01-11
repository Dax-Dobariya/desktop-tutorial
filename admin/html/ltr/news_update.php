<?php
include('header.php');
include('menu.php');
include('config.php');

$id=$_GET["id"];

$query="select * from news where id = $id ";
$data=mysqli_query($con,$query);

if (isset($_POST['submit'])){
$fname=$_POST['news'];
$lname=$_POST['news_name'];
$img=$_FILES['image']['name'];
$temp_img=$_FILES['image']['name'];
$description=$_POST['newsdescription'];  
move_uploaded_file($temp_img,"image/$img");
    
   $sql = "UPDATE news SET news_type='$fname',news_name='$lname', image='$img',news_description='$description' WHERE id='$id'";
   
   $result=mysqli_query($con,$sql);
    
   if($result) {
    ?>
    <script>
           
            alert("news update successfull")
        </script>
    <?php
}
}
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
                            <form  method="POST">
                                <div class="card-body">
                                    <?php
                                    while($rows=mysqli_fetch_assoc($data)){  
                                    ?>
                                    <h4 class="card-title">News Info</h4>
                                    <div class="form-group row">
                                            <label for="news"class="col-sm-3 text-right control-label col-form-label">Select News</label>
                                            <div class="col-sm-9">
                                             <select name="news" class="form-control" id="news"  >
                                                <option value="">Select News</option>
                                                <option value="Educational News" <?php if ($rows['news_type'] == 'Educational News') {echo "selected";}?>>Educational News</option>
                                                <option value="Sport News"<?php if ($rows['news_type'] == 'Sport News') {echo "selected";}?>>Sport News</option>
                                                <option value="Extra-Curricular News"<?php if ($rows['news_type'] == 'Extra-Curricular News') {echo "selected";}?>>Extra-Curricular News</option>
                                            </select>
                                            </div>
                                            
                                        </div>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">News Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="news_name" class="form-control" id="txtnews_name" value="<?php echo $rows['news_name']; ?>" placeholder="News Name">
                                        </div>
                                    </div>
                            
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Upload Image</label>
                                        <div class="col-sm-9">
                                            <input type="file" name="image"class="form-control" id="uplode_image" value="<?php echo $rows['image'];?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">News Desc.</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="newsdescription" id="txtnews_desc" onfocus='this.select()'><?php if (isset($rows['news_description'])){echo htmlspecialchars($rows['news_description']);}?></textarea>
                                        </div>
                                    </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="submit"  name="submit" class="btn btn-primary float-right mb-3" id="btnsubmit">Update</button>
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

     
  
  


  
   

  


