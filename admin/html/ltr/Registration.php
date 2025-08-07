<?php
 include 'config.php';


    ?>
<html>
    <head>
        <title>Registration Form</title>
         
        <style>
            body{
                margin:0px;
                padding:0px;
            }
            .container{
                padding: 50px;  
                background-color: lightblue; 
            }
            input[type=text],input[type=email]{  
                width: 100%;  
                 padding: 15px;  
                 margin: 5px 0 22px 0;  
                 display: inline-block;  
                 border: none;  
                 background: #f1f1f1;  
            }  
            input[type=password],input[type=tel]{  
                width: 100%;  
                 padding: 15px;  
                 margin: 5px 0 22px 0;  
                 display: inline-block;  
                 border: none;  
                 background: #f1f1f1; 
            }
            div.Register{
                width:500px;
                margin:10px auto 0px auto;
                background-color:white;
                padding:20px;

            }
        
            select{  
                 width: 100%;  
                 padding: 15px;  
                 margin: 5px 0 22px 0;  
                 display: inline-block;
                 border: none;  
                 background: #f1f1f1;  
            } 
            .registerbtn {  
                        background-color:white;  
                         color: black;  
                         padding: 16px 20px;  
                         margin: 8px 0;  
                         cursor: pointer;  
                        width: 100%;    
            }  
        </style>
    </head>
    <body>
        <form  method="POST" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="container">
           
                <div class="Register">
                    <center><h1>Admin/Teacher Registration</h1></center>
                    <hr>
                
                    <div>
                        <label>First Name : </label><br>
                        <input type="text" name="firstname" id="firstname" Placeholder="Enter Your First Name"size="15px" >
                      
                        <br><br>
                        <label>Last Name : </label><br>
                        <input type="text" name="lastname" size="15px" Placeholder="Enter Your Last Name"required>
                        
                        <br><br>
                    </div>
                    <div>
                        <label> Select Course : </label><br>
                        <select name="course" required>
                            <option value="">Select Course</option>
                            <option value="Computer Science">Computer Science</option>
                            <option value="Biotechnology">Biotechnology</option>
                            <option value="Environment Science">Environment Science</option>
                            <option value="Chemistry">Chemistry</option> 
                        </select><br>
                       
                    </div><br>

                    <div>
                        <label> Select Occupation : </label><br>
                        <select   id="occupation" name="occupation" required>
                            <option value="">Select Occupation</option>
                            <option value="admin"> Admin</option>
                            <option value="faculty">faculty</option>
                        </select>      
                       
                    </div>

                    <div>  
                        <label>   Gender :  </label><br>  
                        <input type="radio" value="Male" name="gender" > Male 
                        <input type="radio" value="Female" name="gender"> Female   
                        <input type="radio" value="Other" name="gender"> Other  
                        
                    </div>  <br><br>
                
                    <div> 
                        
                        <label>Email-id : </label><br>
                        <input type="email" name="emailid" size="15px"Placeholder="Enter Your Email-id"required>
                        
                        <br><br>
                        <label>Contact No:  </label><br>
                        <input type="tel" name="contactno" maxlength="10"  pattern="[0-9]{10}"Placeholder="Enter Your contact number" required>
                      
                        <label>Password:  </label><br>
                        <input type="password" name="password" Placeholder="Enter password"required>
                       
                        <br><br>
                    </div>
                    <div>
                        <button type="submit" class="registerbtn" name="submit" onclick="send()">Register</button>   
                    </div>
                   
                    <h3><label>If you have Account <a href="index.php">Login</a> </label></h3>
                </div>
                <sctipt>
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
            </script>
            </div>           
        </form>
    </body>
</html>
<?php
include 'config.php';
?>
<script>
function send()
{
  
      var message = document.getElementById('firstname').value;
      
      
      if(message == ""){
        document.getElementById('firstname').innerHTML = "Please write something in message box";
        return false;
      }
      else
      {
        document.getElementById('firstname').innerHTML = "";
      }
    }
      </script>
<?php
  if(isset($_POST['submit'])){
     $fname=$_POST['firstname'];
     $lname=$_POST['lastname'];
     $course=$_POST['course'];
     $occupation=$_POST['occupation'];
     $gender=$_POST['gender'];
    $email_id=$_POST['emailid'];
     $phone=$_POST['contactno'];
     $password=$_POST['password'];

     $sel=mysqli_query($con,"select * from  registration where email_id='$email_id' ");
     if(mysqli_num_rows($sel)){
        ?>
        <script>
            alert ("This Email is already  exist");
            </script>
        <?php 
     }else{
    $insertquery="insert into Registration(firstname,lastname,course,occupation,year,gender,er_no,email_id,contactno,password) values('$fname','$lname','$course','$occupation','','$gender','','$email_id','$phone','$password')";
    $res = mysqli_query($con,$insertquery) ;  
if($res) {
    ?>
    <script>
        alert ("data inserted successfully");
        </script>
    <?php
}
else{
    ?>
    <script>
        alert ("data not inserted ");
        </script>
        <?php
}
     }
}
        ?>