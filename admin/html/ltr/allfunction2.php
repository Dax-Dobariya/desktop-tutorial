<?php 
session_start();
include("config.php");

if($_GET['call'] == "project_group_chat"){
    project_group_chat();
  }
  elseif($_GET['call'] == "fetch_group_message"){
    fetch_group_message();
  }
  elseif($_GET['call'] == "group_msg_insert"){
    group_msg_insert();
  }
  elseif($_GET['call'] == "project_group_search"){
    project_group_search();
  }
  function project_group_chat(){

    global $con;
    $pr_refer_id=$_POST['pr_refer_id'];
    $data = array();
  
    $query = "select pg_group_name,pg_created_date,count(distinct refer_id) as count from project_group WHERE pr_refer_id = '$pr_refer_id' ";  
  
  
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
  
  function fetch_group_message(){
  
    global $con;
    $pr_refer_id=$_POST['pr_refer_id'];
    $admin_id=$_SESSION['a_id'];
    $data="";
  
  
    $q = $con->query("select distinct(c.message),c.datetime,c.sender_id,c.receiver_id,p.refer_id,concat(p.firstname,' ',p.lastname) as fullname from chat as c JOIN personal_detail as p where c.receiver_id='$pr_refer_id' and (c.sender_id=p.refer_id or c.sender_id='$admin_id') and type='Group' group by datetime");
  
      if(mysqli_num_rows($q)>0)
      {
        while($row = mysqli_fetch_assoc($q))
        {         
    
                $sender_id=$row['sender_id'];
                $fullname=$row['fullname'];
                $member_id=$row['refer_id'];
           
      
            $data .='<ul class="chat-list">';
                if($sender_id==$admin_id){
                  $data .='<li class="odd chat-item">';
                    $data .='<div class="font-small" style="float:right;color:black;"><b>You</b></div>';
                }
                elseif ($sender_id==$member_id){
                  $data .='<li class="chat-item">';
                  $data .='<div class="font-small" style="float:left"><b>'.$fullname.'</b></div>';  
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
  
  function group_msg_insert(){
  
      global $con;
      
      $sender = $_SESSION['a_id']; 
      $pr_refer_id=$_POST['pr_refer_id'];
      $datetime=date("Y-m-d H:i:s"); 
      $message=$_POST['message'];
  
                for($i=0;$i<count($pr_refer_id);$i++){
  
                  $q=$con->query("select pr_refer_id FROM project_group WHERE pr_refer_id IN ('".$pr_refer_id."')"); 
  
                  if(mysqli_num_rows($q)>0){
                  while($row = mysqli_fetch_array($q))
                  {
                      $q=$con->query("insert into chat(sender_id,receiver_id,datetime,message,type) values('$sender','$pr_refer_id','$datetime','$message','Group')");
                  }
                }
    }
  }
  function project_group_search()
  {
  
     global $con;
     $output = '';
  
      if(isset($_POST["query"]))
      {
            $search = mysqli_real_escape_string($con, $_POST["query"]);
          
            $query = "select pr_refer_id,pg_group_name,type,pg_created_date,count(refer_id) as count from project_group WHERE pg_group_name LIKE '%".$search."%' GROUP BY pg_group_name ORDER BY pg_id desc";
      }
      else
      {
          $query = "select pr_refer_id,pg_group_name,type,pg_created_date,count(refer_id) as count from project_group group by pg_group_name order by pg_id desc";
      }
      
        $result = mysqli_query($con, $query);
        if(mysqli_num_rows($result)>0)
        {      
          while($row = mysqli_fetch_array($result))
          {             
            $output .='<div class="col-md-12">';
            $output .='<div id="calendar-events" style="cursor:pointer">';
            $output .= '<a style="color:#00bfff;   border-bottom: 2px solid  #eeeee0; font-size: 12px;font-weight:bold;" onclick="myFunction(';
            $output .="'".$row['pr_refer_id']."'";
            $output .=');fetch_msg(';
            $output .="'".$row['pr_refer_id']."'";
            $output .=');">';
            $output .= $row['pg_group_name']."<br>"; 
            $output .= '<h6 style="color:#6e6e96; font-weight:bold; font-size: 10px;">';
            $output .= '('.$row['type'].')'; 
            $output .= '</h6>';
            $output .= '<h6 style="color:#A9A9A9; font-weight:bold; font-size: 10px;margin-left: 60%; margin-top: -15px;">';
            $output .= $row['pg_created_date'];
            $output .= '</h6>';
            $output .='<h6 style="color:#A9A9A9;font-weight:bold; font-size: 10px;margin-left: 60%; margin-top: -5px;">Member   ';
            $output .= $row['count'];
            $output .= '</h6></a>';
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