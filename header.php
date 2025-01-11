<?php
    include("config.php");
    session_start();
    $email_id =$_SESSION["user_email_id"];


?>
 
     <header class="navbar-inverse navbar-fixed-top animated-header">
            <div class="container" height="250">
                <div class="navbar-header">
                    <h1><img src="logo.png"></h1>
                </div>
                <div style="color:white;font-size:50px;margin-top:50px;">
                    <span style="margin-left:86px;">SRKI College</span>
                </div>
                <nav class="collapse navbar-collapse navbar-right">
                        <ul class="nav navbar-nav">
                        <li><a href="index.php">Home</a></li>
                        <?php  if($email_id == ''){
                            ?>
                        <li><a href="login.php">forum</a></li>
                        <?php }
                        ?>
                        <li><a href="contact_us.php">Contact Us</a></li>
                        <?php  if($email_id != ''){
                            ?>
                        <li><a href="logout.php">Logout</a></li>
                        &nbsp;&nbsp;&nbsp;
                        <li><a href="chat.php">Chat</a></li> 
                        <li><a href="forum.php">forum</a></li>
                        <li><a href="group.php">group_chat</a></li> <?php } ?>
                        
                </nav>
                
                
            </div>
        </header>