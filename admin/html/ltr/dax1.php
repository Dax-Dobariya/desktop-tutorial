<?php       
include('config.php');
$id=$_GET['id'];
$sql1 = "SELECT *,(SELECT firstname FROM registration WHERE id=sender_id) AS register_name,(SELECT firstname FROM registration WHERE id=receiver_id) as receiver_name FROM chat LEFT JOIN registration ON id=sender_id WHERE sender_id=$id OR receiver_id=$id order by datetime DESC";
    $result1 = mysqli_query($con,$sql1);  
    $row= mysqli_num_rows($result1);
    if($row){

        $html='<table class="table" border="1" width="100%" cellpadding="10">
        <thead>
          <tr>
            <th>DATE/TIME</th>
            <th>SENDER</th>
            <th>RECEIVER</th>
            <th>CHAT</th>
            </tr>
        </thead>
        <tbody>';
        while($row=mysqli_fetch_assoc($result1))
        {  
            
            $html.='<tr>
            <td >'.$row['datetime'].'</td>
            <td>'.$row['firstname'].'</td>
            <td>'.$row['receiver_name'].'</td>
           
            <td>'.$row['message'].'</td>
            
        </tr>';
    }        $html.='</tbody></table>';

    ob_start();
    require_once __DIR__ .'/vendor/autoload.php';
    $mpdf=new \Mpdf\Mpdf();
    $mpdf->WriteHTML(($html));
    $mpdf->Output();
    }
    
?>

