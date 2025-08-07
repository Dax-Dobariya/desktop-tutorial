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
                background-color: lightblue; 
            }
            div.login{  
                width:400px;
                margin:100px auto 0px auto;
                background-color:white;
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
        <form  method="POST">
            <div class="container">
                <div class="login">
                    <div>
                        <center><h1> Admin/Teacher Login </h1></center>
                    </div>
                        <label>Email-id : </label><br>
                        <input type="text" name="emailid" Placeholder="Enter Your Email-id"size="15px" required>
                        <br><br>
                        <label>Password : </label><br>
                        <input type="password" name="password" size="15px" Placeholder="Enter Password" required>
                        <br><br>
                        <div>
                            <button type="submit" name="submit" class="registerbtn">Login</button>   
                        </div>
                        <h3><label>New User <a href="Registration.php">Registration</a> </label></h3>
                        
                </div>
            </div>
        </form>
    </body>
</html>
<?php
 include("config.php");
session_start();
 unset( $_SESSION["email_id"]);
 unset( $_SESSION["occupation"]);
 unset( $_SESSION["sender_id"]);
 


 if(isset($_POST['submit'])){
    $email_id=$_POST['emailid'];
    $password=$_POST['password'];

    $selsql="select id,email_id,password,occupation from registration where email_id='$email_id' and password='$password'";

    $res=mysqli_query($con,$selsql);

    if (mysqli_num_rows($res) >0){
        
        ?>
        <?php
        
        $row=mysqli_fetch_assoc($res);
        
        $_SESSION["email_id"]=$row['email_id'];
        $_SESSION["occupation"]=$row['occupation'];
        $_SESSION["sender_id"]=$row['id'];
        if($row['occupation'] != 'Student')
        {
            header('location:dashboard.php');
        }
        else{
            ?>
            <script>
                alert ("You are not authorized for login.");
                
            </script>
            <?php 
        }
       ?>
       <?php
    }else{
        ?>
        <script>
            alert ("Your Email-id and Password Invalid.");
            
        </script>
        <?php
    }
 }
 ?>