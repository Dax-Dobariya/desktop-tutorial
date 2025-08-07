<?php
session_start();

 include 'config.php'; 

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
   require 'PHPMailer/src/Exception.php';
   require 'PHPMailer/src/PHPMailer.php';
   require 'PHPMailer/src/SMTP.php'; ?>
<html>
    <head>
        <title> Student Registration Form</title>
        
 
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
                    <center><h1>Student Registration</h1></center>
                    <hr>
                
                    <div>
                        <?php 
                        $otp_str = str_shuffle("0123456789");
                        $otp = substr($otp_str,0,5);
                        $act_str = rand(100000,100000000);
                        $activation_code = str_shuffle("abcdefghifkf".$act_str);?>
                    <input type="hidden" name="otp" value="<?php echo $otp; ?>">

                    <input type="hidden" name="activation_code" value="<?php echo $activation_code ?>" required>

                        <label>First Name : </label><br>
                        <input type="text" name="firstname" id="firstname" Placeholder="Enter Your First Name"size="15px"  required>
                        <br><br>
                        <label>Last Name : </label><br>
                        <input type="text" name="lastname" size="15px" Placeholder="Enter Your Last Name" required>
                        <br><br>
                    </div>
                    <div>
                        <label> Select Course : </label><br>
                        <select name="course"  required>
                            <option value="">Select Course</option>
                            <option value="Computer Science">Computer Science</option>
                            <option value="Biotechnology">Biotechnology</option>
                            <option value="Environment Science">Environment Science</option>
                            <option value="Chemistry">Chemistry</option> 
                        </select>
                    </div>
                    <div>
                    </select><br>
                        <label> Select Year : </label><br>
                        <select   id="year" name="year" >
                            <option value="">Select year</option>
                            <option value="First year"> First year</option>
                            <option value="Second year">Second year</option>
                            <option value="Third year">Third year</option>
                           
                       
                        </select><br>

                    </div>
                    <div>  
                        <label>   Gender :  </label><br>  
                        <input type="radio" value="Male" name="gender" > Male 
                        <input type="radio" value="Female" name="gender"> Female   
                        <input type="radio" value="Other" name="gender"> Other  
  
                    </div>  <br><br>
                
                    <div>
                         <div id="eno">
                            <label>Enrollment No : </label><br>
                            <input type="text" name="eno" size="15px"Placeholder="Enter Enrollement Number" required>
                            <br><br>
                        </div> 
                        
                        <label>Email-id : </label><br>
                        <input type="email" name="emailid" size="15px"Placeholder="Enter Your Email-id" required>
                        <br><br>
                        <label>Contact No:  </label><br>
                        <input type="tel" name="contactno" maxlength="10" pattern="[0-9]{10}"Placeholder="Enter Your contact number"  required>
                        <br><br>
                        <label>Password:  </label><br>
                        <input type="password" name="password" Placeholder="Enter password" required>
                        <br><br>
                    </div>
                    <div>
                        <button type="submit" class="registerbtn" name="submit" >Register</button>   
                    </div>
                   
                    <h3><label>If you have Account <a href="login.php">Login</a> </label></h3>
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
           
        </form>
    </body>
</html>
<?php
unset($_SESSION["code"]);
  if(isset($_POST['submit'])){
    $otp = $_POST['otp'];
    $activation_code = $_POST['activation_code'];
    $_SESSION["activation_code"]=$activation_code;
     $fname=$_POST['firstname'];
     $lname=$_POST['lastname'];
     $course=$_POST['course'];
     $year=$_POST['year'];
    $gender=$_POST['gender'];
     $er_no= trim($_POST['eno']);
     $email_id=$_POST['emailid'];
     $phone=$_POST['contactno'];
     $password=$_POST['password'];
     $sel=mysqli_query($con,"select * from  registration where email_id='$email_id' ");

     if(mysqli_num_rows($sel)>0){
        
            $row=mysqli_fetch_array($sel);
            if($row['status1'] == 'active')
             {
        // $selectrow = mysqli_fetch_assoc($sel);
        //  $status = $selectrow['status'];
        // if($status == 'active') {
        ?>
        <script>
            alert ("This Email-ID is Already Exist");
            </script>
        <?php 
     }else{
    //  $sel="select * from  registration where email_id='".$email_id."'";
    //  $res = mysqli_query($con ,$sel);
    //  if(mysqli_num_rows($res)>1) {
    //     $selectrow = mysqli_fetch_assoc($res);
    //     $status = $selectrow['status'];
    //     if($status == 'active') {
    //         echo "<script>alert(Email already registered)</script>";
    //     }
    //         $update = "UPDATE `registration` SET firstname=' $fname',lastname='$lname',course='$course',year='$year',gender=' $gender',er_no=' $er_no',email_id=' $email_id',contactno='$phone',
    //         password='$password',otp='$otp', activation_code='$activation_code' WHERE id='$id'";
    //         $upres = mysqli_query($con ,$update);
    //         if($upres){
    //             $mail = new PHPMailer(true);

    
    
    //               //  $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    //                 $mail->isSMTP();                                            //Send using SMTP
    //                 $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    //                 $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    //                 $mail->Username   = 'daxdobariya6@gmail.com';                     //SMTP username
    //                 $mail->Password   = 'grudytslczcdfgum';                               //SMTP password
    //                 $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    //                 $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                
    //                 //Recipients
    //                 $mail->setFrom('daxdobariya6@gmail.com', 'Mailer');
    //                 $mail->addAddress( $email_id );   
                
    //                 //Content
    //                 $mail->isHTML(true);                                  //Set email format to HTML
    //                 $mail->Subject = 'verification code for verify your email address';
    //                 $message_body = '<p>verify your email address, enter this verification code when prompted : <b>'.$otp.'</b></p>';
    //                 $mail->Body    = $message_body;
                    
                
    //                 if($mail->send()){
    //                    header('location:email_verify.php');
    //                 } 
    //                 else {  
    //                 echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    //                 }
    //         }
        
    //    }

    //  }else{
        $mail = new PHPMailer(true);

    
    
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'daxdobariya6@gmail.com';                     //SMTP username
        $mail->Password   = 'grudytslczcdfgum';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('daxdobariya6@gmail.com', 'Mailer');
        $mail->addAddress( $email_id );   
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'verification code for verify your email address';
        $message_body = '<p>verify your email address, enter this verification code when prompted : <b>'.$otp.'</b></p>';
        $mail->Body    = $message_body;
        
    
        if($mail->send()){
            $insertquery="insert into registration(firstname,lastname,course,occupation,year,gender,er_no,email_id,contactno,password,otp,activation_code) values('$fname','$lname','$course','Student','$year','$gender',' $er_no','$email_id','$phone','$password','$otp','$activation_code')";
            $res1 = mysqli_query($con,$insertquery) ;
          ?>
            <script>alert("OTP has been sent to your Email-ID")</script> 
            
             
            <script>
            window.location.href="http://localhost/E_forum/email_verify.php"</script>
            <?php
            
        } 
        else {  
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        } }  }
    
        else{
            $mail = new PHPMailer(true);

    
    
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'daxdobariya6@gmail.com';                     //SMTP username
            $mail->Password   = 'grudytslczcdfgum';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
            //Recipients
            $mail->setFrom('daxdobariya6@gmail.com', 'Mailer');
            $mail->addAddress( $email_id );   
        
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'verification code for verify your email address';
            $message_body = '<p>verify your email address, enter this verification code when prompted : <b>'.$otp.'</b></p>';
            $mail->Body    = $message_body;
            
        
            if($mail->send()){
                $insertquery="insert into registration(firstname,lastname,course,occupation,year,gender,er_no,email_id,contactno,password,otp,activation_code) values('$fname','$lname','$course','Student','$year','$gender',' $er_no','$email_id','$phone','$password','$otp','$activation_code')";
                $res1 = mysqli_query($con,$insertquery) ;
              ?>
                <script>alert("OTP has been sent to your Email-ID")</script>
                
                <script>
                window.location.href='http://localhost/E_forum/email_verify.php'</script>
               <?php
                
             } 
            else {  
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
    }

  }
     ?>