<?php

include 'config.php'; 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


$currentPageUrl = 'http://' . $_SERVER [ "HTTP_HOST" ] . $_SERVER [ "REQUEST_URI" ]; 
$basename= basename($currentPageUrl) ;
$base_replace= str_replace($basename,"reset.php",'http://' . $_SERVER [ "HTTP_HOST" ] . $_SERVER [ "REQUEST_URI" ]);
$str_code = rand(100000,1000000);
$reset_code = str_shuffle("fkijivkmkeddijvnv".$str_code);

 $url = $base_replace."?resetlink=".$reset_code;
if(isset($_POST['submit'])) {
    $email_id = mysqli_real_escape_string($con,$_POST['email']);
   $sql = "select * from registration where email_id='$email_id' and status1   ='active'";
   $res= mysqli_query($con,$sql);

   if(mysqli_num_rows($res) > 0){
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
    $mail->setFrom('daxdobariya6@gmail.com', 'Reset Password');
    $mail->addAddress( $email_id );   

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Reset password Link';
    $message_body = '<p>For Reset Password <b>'.$url.'</b></p>';
    $mail->Body    = $message_body;
    

    if($mail->send()){
       
      $update = "update registration set reset = '$reset_code' where email_id = '$email_id'";
       $resupdate = mysqli_query($con,$update);
        
     } 
    else {  
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
   }else{
    ?>
    <script>alert("No Account Found")</script> <?php
   }
}

?>

<html>
    <head>
        <title> Forgot Password</title>
        
 
        <style>
            body{
                margin:0px;
                padding:0px;
            }
            .container{
                padding: 160px;  
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
                    <center><h1> Forgot Password</h1></center>
                    <hr>
                
                    <div>
                       

                        <label>Enter Email_id: </label><br><br>
                        <input type="email" name="email" id="email" Placeholder="Enter Your Email_id"size="15px" >
                        <br><br>
                        <div>
                        <button type="submit" class="registerbtn" name="submit" >Email Verification</button> 
                        <h3><label>Send OTP<a href="Registration.php">   Registration Form</a> </label></h3>  
                    </div>
                    </form>
    </body>
</html>