<?php
include 'config.php'; 
if(isset($_POST['submit'])){
    $password = mysqli_real_escape_string($con,$_POST['password']);
    $resetpassword = mysqli_real_escape_string($con,$_POST['confirm_password']);
    
    if($password !== $resetpassword) {
        ?>
        <script>alert("Both Password are not matched...")</script> <?php
    }else{
        ?>
        <script>alert($_GET['resetlink'])</script> <?php
         if(isset($_GET['resetlink'])){
            $sql = "select * from registration where reset = '".$_GET['resetlink']."'";
            $res = mysqli_query($con,$sql);
            if(mysqli_num_rows($res) > 0){
                $sql1 = "update registration set password='$password' where reset = '".$_GET['resetlink']."'";
                $update = mysqli_query($con,$sql1);
                if($update){
                    ?>
                    <script>alert(" Password Update Successfully...")</script> <?php
                   // header ('Refresh:1; url=registration.php');
                }else{
                    ?>
                    <script>alert(" Oops Somethimg wrong...")</script> <?php
                }
            }else
            {
                ?>
            <script>alert(" Wrong Url...")</script> <?php

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
            input[type=password],input[type=email]{  
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
        <form  method="POST" action="reset.php?resetlink=<?php echo $_GET['resetlink']; ?>"autocomplete="off" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="container">
                <div class="Register">
                    <center><h1> Reset Password</h1></center>
                    <hr>
                
                    <div>
                       

                        <label>New Password </label><br><br>
                        <input type="password" name="password" id="password" Placeholder="Enter New Password"size="15px" >
                        <br><br>
                        <label>Confirm Password </label><br><br>
                        <input type="password" name="confirm_password" id="password" Placeholder="Enter Confirm Password"size="15px" >
                        <br><br>
                        <div>
                        <button type="submit" class="registerbtn" name="submit" >Change Password</button> 
                        <h3><label>Back To Login<a href="login.php">Login</a> </label></h3>
                    </div>
                    </form>
    </body>
</html>