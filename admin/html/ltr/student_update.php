<?php
include('header.php');
include('menu.php');
include('config.php');

$id=$_GET["id"];

$query="select * from Registration where id = $id ";
$data=mysqli_query($con,$query);

?>
 <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Update Student Details</h4>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <d class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <form  method="POST">
                                <div class="card-body">
                                    <?php
                                    while($rows=mysqli_fetch_assoc($data)){  
                                    ?>
                                    <h4 class="card-title">Update Student Details</h4>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-sm-6">           
                                             <label for="firstname" >First Name *</label>
                                            <input type="text" class="form-control input-sm" Placeholder="Enter First Name" name="firstname" id="firstname" value="<?php echo $rows['firstname']; ?>"  required>
                                            
                                        </div>
                                        <div class="form-group col-md-6 col-sm-6">           
                                             <label for="lastname" >Last Name *</label>
                                            <input type="text" class="form-control input-sm" Placeholder="Enter Last Name"name="lastname" id="lastname"value="<?php echo $rows['lastname']; ?>"  required>
                                            
                                        </div>

                                    </div>
                                    <div class="row">

                                        <div class="form-group col-md-6 col-sm-6">
                                            <label for="course">Select course</label>
                                            <select name="course" class="form-control" id="course" required>
                                                <option value="">Select Course</option>
                                                <option value="Computer Science"<?php if ($rows['course'] == 'Computer Science') {echo "selected";}?>>Computer Science</option>
                                                <option value="Biotechnology" <?php if ($rows['course'] == 'Biotechnology') {echo "selected";}?>>Biotechnology</option>
                                                <option value="Environment Science" <?php if ($rows['course'] == 'Environment Science') {echo "selected";}?>>Environment Science</option>
                                                <option value="Chemistry" <?php if ($rows['course'] == 'Chemistry') {echo "selected";}?>>Chemistry</option>              
                                            </select>
                                            
                                        </div>
                                        
                                        
                                        <div class="form-group col-md-6 col-sm-6">
                                            <label for="year">Select years</label>
                                            <select name="years" class="form-control" id="years" required>
                                                <option value="">Select year</option>
                                                <option value="First year" <?php if ($rows['year'] == 'First year') {echo "selected";}?>>First year</option>
                                                <option value="Second year" <?php if ($rows['year'] == 'Second year') {echo "selected";}?>>Second year</option>
                                                <option value="Third year" <?php if ($rows['year'] == 'Third year') {echo "selected";}?>>Third year</option>
                                                
                                            
                                            </select>
                                            
                                        </div> 
                                    </div>
                                    
                                    <div class="row">
                                    
                                        <div class="form-group col-md-6 col-sm-6">
                                            <div class="form-check-label">
                                                <label >Gender </label>
                                                <div><input type="radio" id="male" name="gender"  value="Male" <?php if ($rows['gender'] == 'Male') {echo "checked";}?>>Male &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio"  id="female" name="gender" value="Female" <?php if ($rows['gender'] == 'Female') {echo "checked";}?>>Female    
                                                </div> 
                                            </div>
                                        </div>   
                                        <div class="form-group col-md-6 col-sm-6">
                                            <label for="er no">Enrollement No:</label>
                                            <input type="text" class="form-control input-sm" Placeholder="Enter  Enrollement no"name="erno" id="erno" value="<?php echo $rows['er_no']; ?>" required>
                                            
                                        </div>
                                    </div>
                                                                                                
                                    <div class="row">
                                    <div class="form-group col-md-6 col-sm-6">
                                            <label for="email">Email *</label>
                                            <input type="email" class="form-control input-sm" Placeholder="Enter  Email-id"name="emailid" id="email" value="<?php echo $rows['email_id']; ?>" required>
                                            
                                        </div>
                                        <div class="form-group col-md-6 col-sm-6">
                                             <label for="mobile">Mobile Number *</label> 
                                                <input type="text" class="form-control"Placeholder="Enter  Mobile Name" maxlength="10" name="contactno" id="mobile"value="<?php echo $rows['contactno']; ?>"    required>
                                             
                                        </div>
                                    </div>
                                    
                                        <div class="form-group col-md-6 col-sm-6">
                                            <label for="password">Password *</label>
                                             <input type="password" class="form-control input-sm" minlength="8" maxlength="16" name="password" Placeholder="Enter Password"id="password"value="<?php echo $rows['password']; ?>"  required>
                                             
                                        </div>
                                        <?php
                                    }
                                    ?>
                                        
                                    
                               
                                            <div class="border-top">
                                            <div class="card-body">
                                       
                                        <button type="submit" class="btn btn-primary float-right mb-3"  name="submit">Update</button>
                                    </div>
                                    </div>
                                    
                                    </div>
                                    
                                
                                
                                
                            </form>
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
if (isset($_POST['submit'])){
    $fname=$_POST['firstname'];
    $lname=$_POST['lastname'];
    $course=$_POST['course'];
    $year=$_POST['years'];
    $gender=$_POST['gender'];
    $er_no=$_POST['erno'];
    $email_id=$_POST['emailid'];
    $phone=$_POST['contactno'];
    $password=$_POST['password'];  
    
   $sql = "UPDATE `registration` SET firstname=' $fname',lastname='$lname',course='$course',year='$year',gender=' $gender',er_no=' $er_no',email_id=' $email_id',contactno='$phone',
   password='$password' WHERE id='$id'";
   
   $result=mysqli_query($con,$sql);
    
   if($result) {
    ?>
    <script>
           
            alert("Student Data update successfull")
        </script>
    <?php
}
}
?>
     
  
  


  
   

  


