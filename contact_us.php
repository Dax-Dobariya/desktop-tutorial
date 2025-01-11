<?php
	include("page1.php");
	include("header.php");
?>
		<main class="site-content" role="main">
	
			<!-- end Social section -->
			
			<!-- Contact section -->
			<section id="contact" >
				<div class="container">
					<div class="row"style="margin-top:50px;">
						
						<div class="sec-title text-center wow animated fadeInDown">
							<h2>Contact</h2>
							<!-- <p>Leave a Message</p> -->
						</div>
												
						<div class="col-md-7 contact-form wow animated fadeInLeft">
							<form  method="POST">
								<div class="input-field">
									<input type="text" name="name" id="name" class="form-control" placeholder="Your Name...">
								</div>
								<div class="input-field">
									<input type="email" name="email" id="email" class="form-control" placeholder="Your Email...">
								</div>
								<div class="input-field">
									<input type="text" name="subject" id="subject" class="form-control" placeholder="Subject...">
								</div>
								<div class="input-field">
									<textarea name="message" id="message" class="form-control" placeholder="Messages..."></textarea>
								</div>
						       	<button type="submit" name="submit" class="btn btn-blue btn-effect">Send</button>
							</form>
						</div>
						
						 <div class="col-md-5 wow animated fadeInRight">
							<address class="contact-details">
								<h3>Contact Us</h3>			

                             <?php
                            include("config.php");

                           

                            $sql = "SELECT * FROM contact";
                            $result = mysqli_query($con,$sql);
                            
                        ?>
                                 <?php

                                while($rows=mysqli_fetch_assoc($result))
                                {   
                                ?>

								<p><i class="fa fa-pencil"></i>SHREE RAMKRISHNA INSTITUTE OF COMPUTER EDUCATION & APPLIED SCIENCES<span><?php echo $rows['c_address1']; ?></span></p><span>Gujarat 395004</span><br>
								<p><i class="fa fa-phone"></i>Phone:  <?php echo $rows['contact_no1']; ?></p>

								<p><i class="fa fa-envelope"></i><?php echo $rows['email_id']; ?></p>
								<?php 
                                }		
    
								?>
							</address>
						</div>  
			
					</div>
				</div>
			</section>
		</main>
        <?php
 include 'config.php';

  if(isset($_POST['submit'])){
   

     $name=$_POST['name'];
     $email_id=$_POST['email'];
     $sub=$_POST['subject'];
     $msg=$_POST['message'];
     
    $insertquery="insert into contact_us( `name`, `emailid`, `subject`, `description`) values('$name','$email_id','$sub','$msg')";
   $res = mysqli_query($con,$insertquery); 
   if($res) {
    ?>
    <script>
            alert(" Your contact information inserted successfully")
        </script>
    <?php
}

  }
  ?> 
<?php
	include("footer.php");
	
?>
  