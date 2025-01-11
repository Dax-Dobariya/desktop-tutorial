<?php
include('header.php');
include('menu.php');
include('config.php');
?>

 <div class="page-wrapper"> 
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Add Teacher</h4>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <form class="form-horizontal" method="POST" id="form" autocomplete="off">
                                <div class="card-body">
                                    <h4 class="card-title">Add Teacher</h4>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-sm-6">           
                                             <label for="firstname" >First Name *</label>
                                            <input type="text" class="form-control input-sm" Placeholder="Enter First Name" name="firstname" id="firstname"  required>
                                            
                                        </div>
                                        <div class="form-group col-md-6 col-sm-6">           
                                             <label for="lastname" >Last Name *</label>
                                            <input type="text" class="form-control input-sm" Placeholder="Enter Last Name"name="lastname" id="lastname" required>
                                            
                                        </div>

                                    </div>
                                    <div class="row">

                                        <div class="form-group col-md-12 col-sm-12">
                                            <label for="course">Select course*</label>
                                            <select name="course" class="form-control" id="course" required>
                                                <option value="">Select Course</option>
                                                <option value="Computer Science">Computer Science</option>
                                                <option value="Biotechnology">Biotechnology</option>
                                                <option value="Environment Science">Environment Science</option>
                                                <option value="Chemistry">Chemistry</option>              
                                            </select>
                                            
                                        </div>
                                        
                                    </div>
                                    <div class="row">

                                        <div class="form-group col-md-6 col-sm-6">
                                            <div class="form-check-label">
                                                <label >Gender *</label>
                                                <div><input type="radio" id="male" name="gender"  value="Male" >Male &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio"  id="female" name="gender" value="Female">Female    
                                                </div> 
                                            </div>
                                        </div>   
                                        <div class="form-group col-md-6 col-sm-6">
                                            <label for="email">Email *</label>
                                            <input type="email" class="form-control input-sm" Placeholder="Enter  Email-id"name="emailid" id="email" required>
                                            
                                        </div>
                                    </div>
                                                                                                
                                    <div class="row">

                                        <div class="form-group col-md-6 col-sm-6">
                                             <label for="mobile">Mobile Number *</label> 
                                                <input type="text" class="form-control"Placeholder="Enter  Mobile Name" maxlength="10" name="contactno" id="mobile"   required>
                                             
                                        </div>
                                        <div class="form-group col-md-6 col-sm-6">
                                            <label for="password">Password *</label>
                                             <input type="password" class="form-control input-sm" maxlength="10"  name="password" Placeholder="Enter Password"id="password" required>
                                             
                                        </div>
                                        
                                        </div>
                                    </div>
                               
                                    <div class="border-top">
                                    <div class="card-body">
                                       
                                        <button type="submit" class="btn btn-primary float-right mb-3"  name="submit">Add</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                       

                    </div>
                    
                </div>
                
            </div>
            <footer class="footer text-center">
                All Rights Reserved by SRKI College.
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
    
</body>

</html>

<?php




  if(isset($_POST['submit'])){ 
    
     $fname=trim($_POST['firstname']);
     $lname=trim($_POST['lastname']);
     $course=trim($_POST['course']);
     $occupation=trim($_POST['occupation']);
     $gender=trim($_POST['gender']);
     $email_id=trim($_POST['emailid']);
     $phone=trim($_POST['contactno']);
     $password=trim($_POST['password']);
    
    $insertquery="insert into Registration(`firstname`, `lastname`, `course`, `occupation`, `gender`, `er_no`, `email_id`,`contactno`,`password`) values ('$fname','$lname','$course','faculty','$gender','','$email_id','$phone','$password')";
    $res = mysqli_query($con,$insertquery);  
    if($res) {
       ?>
       <script>
               alert("data inserted successfully")
           </script>
       <?php
    }
   }
  

  

?> 