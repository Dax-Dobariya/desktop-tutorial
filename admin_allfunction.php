<?php 
session_start();
include("config.php");

if($_GET['call'] == "project_personal_chat"){
  project_personal_chat();
}
elseif($_GET['call'] == "fetch_personal_message"){
  fetch_personal_message();
}
elseif($_GET['call'] == "personal_msg_insert"){
  personal_msg_insert();
}
elseif($_GET['call'] == "project_personal_search"){
  project_personal_search();
}

function project_personal_chat(){

  global $con;
  $refer_id=$_POST['refer_id'];
  $data = array();

  $query = "select GROUP_CONCAT(firstname,' ',lastname) as fullname from registration WHERE id = '$refer_id' ";  
  
  $result = mysqli_query($con, $query); 
  if(mysqli_num_rows($result)>0){
     
      $row = mysqli_fetch_array($result);
      $data['data1']=true;
      $data['msg']="User found.";
      $data['data']=$row;
      
  }
  else{
      $data['data1']=false;
      $data['msg']="User not found.";
  }
    echo json_encode($data);
}

function fetch_personal_message(){

  global $con;
  $refer_id=$_POST['refer_id'];
  $self_id=$_SESSION['user_sender_id'];
  $data="";


    $q = $con->query("select distinct(message),datetime,sender_id from chat  where receiver_id='$refer_id' and sender_id='$self_id' or receiver_id='$self_id' and sender_id='$refer_id' and type='Personal'");


    if(mysqli_num_rows($q)>0)
    {
      while($row = mysqli_fetch_array($q))
      {            
        $sender_id=$row['sender_id'];

        $data .='<ul class="chat-list">';

        if($sender_id==$self_id){
        $data .='<li class="odd chat-item">';
        }
        else{
        $data .='<li class="chat-item">';
        }
        $data .='<div class="chat-content">';
        $data .='<div class="box bg-light-inverse">';            
        $data .= $row['message'];              
        $data .='</div>';
        $data .='<div class="chat-time" style="margin-left:0px;">'; 
        $data .= date('d-m-Y G:i:s',strtotime($row['datetime'])).'<br>';            
        $data .='</div>'; 
        $data .='</div>'; 
        $data .='</li>'; 
        $data .='</ul>';                                                              
        $data .='</div>';
      }
    }
    echo $data;
}

function personal_msg_insert(){

    global $con;
    
    $sender = $_SESSION['user_sender_id']; 
    $refer_id=$_POST['refer_id'];
    $datetime=date("Y-m-d H:i:s"); 
    $message=$_POST['message'];
    $receiver_id=$_POST['refer_id'];
    $q=$con->query("insert into chat(sender_id,receiver_id,datetime,message,type) values('$sender','$receiver_id','$datetime','$message','Personal')");
}

function project_personal_search(){
 
  global $con;
  $output = '';
  $self_id=$_SESSION['user_sender_id'];

 $sql = "SELECT * FROM registration where occupation!='Student'  GROUP BY firstname";
 $result = mysqli_query($con,$sql);
      
      if(mysqli_num_rows($result)>0)
      {
        while($row = mysqli_fetch_assoc($result))
        
        {             
          $output .='<div class="col-md-12">';
          $output .='<div id="calendar-events" style="cursor:pointer">';
          $output .= '<a style="color:#00bfff; border-bottom: 2px solid  #eeeee0; font-size: 12px;font-weight:bold;" onclick=showdata(';
          $output .="'".$row['id']."'";
          $output .=');fetch_msg(';
          $output .="'".$row['id']."'";
          $output .=');';
          $output .='>';
          $output .='<img width="40px" height="40px" src="../E_forum/admin/assets/images/logo.png"';
         
          $output .='style="border-radius:60px;" id="img"/>  ';
          
          $output .= $row['firstname'].' '.$row['lastname']."<br><br>";         
          $output .= '</a>';
          $output .= '</div>';
          $output .= '</div>';
          $output .='<div class="col-lg-3">';
          $output .='<div id="calendar"></div>';
          $output .='</div>';
        }
       
      }
      else
      {
         $output .='Data Not Found';
      }
 
      echo "$output";
}

?>