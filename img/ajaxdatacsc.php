
<?php
include('config.php');

if(!empty($_POST["country_id"])){
   
    $query = $con->query("select * from state_detail WHERE country_id = ".$_POST['country_id']." AND status = 1 ORDER BY state_name ASC");
    
    $rowCount = $query->num_rows;
    
    
    if($rowCount > 0){
        echo '<option value="'.$row['state_name'].'">Select state</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['state_id'].'">'.$row['state_name'].'</option>';
        }
    }else{
        echo '<option value="">State not available</option>';
    }
}elseif(!empty($_POST["state_id"])){
   
    $query = $con->query("select * from city_detail WHERE state_id = ".$_POST['state_id']." AND status = 1 ORDER BY city_name ASC");
   
    $rowCount = $query->num_rows;
   
    if($rowCount > 0){
        echo '<option value="">Select city</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['city_id'].'">'.$row['city_name'].'</option>';
        }
    }else{
        echo '<option value="">City not available</option>';
    }
}
?>