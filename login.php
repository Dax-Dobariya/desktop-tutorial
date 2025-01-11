
<html>
    <head>
        <title>
            Login Form
        </title>
        <Style>
             body{
                margin:0px;
                padding:0px;
            }
            .container{
                padding: 50px;  
                background-color:lightblue; 
            }
            div.login{  
                width:400px;
                margin:100px auto 0px auto;
                background-color:whitesmoke;
                padding:20px;

            }
            input[type=text],input[type=password]{  
                width: 100%;  
                 padding: 15px;  
                 margin: 5px 0 22px 0;  
                 display: inline-block;  
                 border: none;  
                 background: #f1f1f1; 
            }
            .registerbtn {  
                        background-color: white; 
                         color: black;  
                         padding: 16px 20px;  
                         margin: 8px 0;  
                         cursor: pointer;  
                        width: 100%;    
            } 
        </Style>
    </head>
    <body>
        <form   method="POST" >
            <div class="container">
                <div class="login">
                    <div>
                        <center><h1> Student Login </h1></center>
                    </div>
                        <label>Email-id : </label><br>
                        <input type="text" name="emailid" Placeholder="Enter Your Email-id"size="15px" required>
                       
                        <br><br>
                        <label>Password : </label><br>
                        <input type="password" name="password" size="15px" Placeholder="Enter Password" required>
                        
                        <br><h3 style="float: right;"> <a href="forgot.php">Forgot Password</a> </bel></h3><br>
                        <div>
                            <button type="submit" class="registerbtn">Login</button>   
                        </div>
                        <h3><label>New User <a href="Registration.php">Create Account</a> </label></h3>
                </div>
            </div>
        </form>
    </body>
</html>
<?php 
include 'config.php';
session_start();
unset($_SESSION["user_email_id"]);
unset( $_SESSION["occupation"]);
 //unset( $_SESSION["email_id"]);

 
IF($_SERVER['REQUEST_METHOD']=="POST"){

    $email_id=$_POST['emailid'];
    $password=$_POST['password'];
    $selsql="select id,email_id,password,occupation,status1 from Registration where email_id='$email_id' and password='$password'";
    
    $res=mysqli_query($con,$selsql);

         if (mysqli_num_rows($res) > 0){
             $row=mysqli_fetch_assoc($res);
             $_SESSION["user_email_id"]=$row['email_id'];
             $_SESSION["occupation"]=$row['occupation'];
             $_SESSION["status1"]=$row['status1'];
             $_SESSION["user_sender_id"]=$row['id'];
             if($row['occupation'] == 'Student' and $row['status1']=='active')
             {
              header('location:forum.php');
             }
             else{
                ?>
            <script>
                alert ("You are not authorized for login.");
                
            </script>
            <?php
             }
        }
        
      
    else{
        ?>
        <script>
            alert ("Your Email-id and Password Invalid.");
            
        </script>
        <?php
    }
 }
?>
