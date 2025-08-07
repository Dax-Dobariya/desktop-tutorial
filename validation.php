<?php
 include 'config.php';

 use PHPMailer\PHPMailer\PHPMailer;
 //use PHPMailer\PHPMailer\SMTP;
 use PHPMailer\PHPMailer\Exception;

 require 'vendor/autoload.php';
 function sendmail($email_id)
{
    // require ("PHPMailer/PHPMailer.php");
    // require ("PHPMailer/SMTP.php");
    // require ("PHPMailer/Exception.php");
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.example.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'daxdobariya6@gmail.com';                     //SMTP username
        $mail->Password   = 'lysrabzcrxeafxgu';                               //SMTP password
        $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('daxdobariya6@gmail.com', 'name');
        $mail->addAddress($email_id);     //Add a recipient
        
        
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Email verification frmo D group';
        $mail->Body    = "Thanks for Registration !
        click the below link to verify email address";
        
        
        $mail->send();
        echo 'Send';
        print_r($mail);
      return true;
       
    } catch (Exception $e) {
        echo 'Not Send';
        return false;
    }
}
/*IF($_SERVER['REQUEST_METHOD']=='POST'){
    $fname=$_POST['firstname'];
    if(empty($fname))
    {
        echo "first name is empty";
    }else{
        echo "$fname";
    }
    $lname=$_POST['lastname'];
    if(empty($lname))
    {
        echo "last name is empty";
    }else{
        echo "$lname";
    }
    $course=$_POST['course'];
    if(empty($course))
    {
        echo "Course name is empty";
    }else{
        echo "$course";
    }
    $occupation=$_POST['occupation'];
    if(empty($occupation))
    {
        echo "please select occupation";
    }else{
        echo "$occupation";
    }
    $gender=$_POST['gender'];
    if(empty($gender))
    {
        echo "select gender";
    }else{
        echo "$gender";
    }
    $email_id=$_POST['emailid'];
    if(empty($email_id))
    {
s        echo "select gender";
    }else{
        echo "$email_id";
    }

    $phone=$_POST['contactno'];
    if(empty($phone))
    {
        echo "select gender";
    }else{
        echo "$phone";
    }

}*/



 if(isset($_POST['submit'])){
   
   // $data = sendmail('mudradobariya99@gmail.com');
    // if($data) {
    //     ?>
    //     <script>
    //             alert("data inserted successfully")
    //         </script>
    //     <?php
    // }

     $fname=$_POST['firstname'];
     $lname=$_POST['lastname'];
     $course=$_POST['course'];
     $occupation=$_POST['occupation'];
     $gender=$_POST['gender'];
     $er_no=$_POST['eno'];
     $email_id=$_POST['emailid'];
     $phone=$_POST['contactno'];
     $password=$_POST['password'];
    //$v_code=$_POST['vcode'];

    $insertquery="insert into Registration(`firstname`, `lastname`, `course`, `occupation`, `gender`, `er_no`, `email_id`,`contactno`,`password`) values('$fname','$lname','$course','$occupation','$gender',' $er_no','$email_id','$phone','$password')";
   
    $res = mysqli_query($con,$insertquery) ;//&&  sendmail($_POST['emailid']);
    if($res) {
        ?>
        <script>
                alert("data inserted successfully")
            </script>
        <?php
    }

 }  //$_POST  is supergolbaal variable which is used to collect form data after submitting


 

?>
