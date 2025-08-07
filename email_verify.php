<?php
 include 'config.php'; 
session_start();
 if(isset($_POST['submit'])){
    if($_SESSION['activation_code'] != ''){
       
        $otp = $_POST['otp'];
        
        $activation_code = $_SESSION['activation_code'];
      
        $sel=mysqli_query($con,"select * from  registration where activation_code='$activation_code' ");
       
        if(mysqli_num_rows($sel) > 0){
            $rowselect = mysqli_fetch_assoc($sel);
            $rotp = $rowselect['otp'];
            
            if($rotp !== $otp){
                ?> <script>alert("Please Enter Correct OTP")</script><?php
            }else{
                $sql = "UPDATE `registration` SET  status1 ='active' where otp='$otp' and activation_code='$activation_code'";
                
                $update = (mysqli_query($con,$sql));
                if($update){
                    ?> <script>alert("Your account successfully activate")</script><?php
                    // header("Refresh:1; url=Registration.php");
                   ?> <script>
                    window.location.href='http://localhost/E_forum/login.php'</script>
                   <?php
                }else{
                    ?> <script>alert("account not")</script><?php
                }
                

            }
        }
    }
 }
 ?>
<html>
    <head>
        <title> Email Verification</title>
        
 
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
                    <center><h1>Email Verification</h1></center>
                    <hr>
                
                    <div>
                       

                        <label>Enter OTP : </label><br><br>
                        <input type="text" name="otp" id="firstname" Placeholder="Enter Your otp"size="15px" >
                        <br><br>
                        <div>
                        <button type="submit" class="registerbtn" name="submit" >Email Verification</button> 
                        <h3><label>Send OTP<a href="Registration.php">   Registration Form</a> </label></h3>  
                    </div>
                    </form>
    </body>
</html>