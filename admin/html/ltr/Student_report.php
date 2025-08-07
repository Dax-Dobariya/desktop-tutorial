<?php

// use Mpdf\Mpdf;

include('header.php');
include('menu.php');
include('config.php');
?>


<div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Student Report</h4>
                        
                       
                                       
                                                                                 
                    </div>
                </div>
            </div>
           
          
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                        <?php
                        
                            $sql = "SELECT * FROM registration where Occupation='Student'";
                             $result = mysqli_query($con,$sql);
                            
                        ?>
                            <div class="card-body">
                                <h5 class="card-title m-b-0">Students Details</h5>
                            </div>
                            <table class="table">
                                  <thead>
                                    <tr>
                                      <th scope="col">Sr No.</th>
                                      <th scope="col">First Name</th>
                                      <th scope="col">Last Name</th>
                                      <th scope="col">Course</th>
                                      <th scope="col">year</th>
                                      
                                      
                                      <th scope="col">Edit</th>
                                      
                                    </tr>
                                  </thead>
                                  <tbody>
                                  <form  method="POST" autocomplete="off">
                                      <?php
                        
                                        while($rows=mysqli_fetch_assoc($result))
                                        {   
                                    ?>
                                    <tr>
                                        <td><?php echo $rows['id']; ?></td>
                                        <td><?php echo $rows['firstname'];?></td>
                                        <td><?php echo $rows['lastname']; ?></td>
                                        <td><?php echo $rows['course'];?></td>
                                        <td><?php echo $rows['year'];?></td>
                                        
                                        <td><button type="submit" value="<?php echo $rows['id']; ?>" name="submit">Report</button>
                                        
                                    </tr>
                                            <?php
                                        } 
                                      ?>
                                    </form>
                                  </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer text-center">
                All Rights Reserved by SRKI Group.
            </footer>
        </div>
    </div>
    <script src="../../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../../assets/extra-libs/sparkline/sparkline.js"></script>
    <script src="../../dist/js/waves.js"></script>
    <script src="../../dist/js/sidebarmenu.js"></script>
    <script src="../../dist/js/custom.min.js"></script>
    <script src="../../assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
    <script src="../../assets/extra-libs/multicheck/jquery.multicheck.js"></script>
    <script src="../../assets/extra-libs/DataTables/datatables.min.js"></script>
   
<?php
include("config.php");
if (isset($_POST['submit'])) {
    // echo $_POST['submit'];
    $id = $_POST['submit'];
    
    $url="dax1.php?id=$id";
    // header('location:dax1.php?id='.$id);
    echo "<script>window.open('$url')</script>"; 

    ?> 
    <script>
    // window.open('dax1.php?sea_task_name='+sea_task_name+'&sea_project='+sea_project+'&sea_status='+sea_status);
    // echo "<script>window.open('$url')</script>"; window.open($url);
    </script>
    <?php
    
   
    // $sql1 = "SELECT * FROM chat";
    // $result1 = mysqli_query($con,$sql1);  
    // $row= mysqli_num_rows($result1);
    // if($row){

    //     $html='<table class="table">
    //     <thead>
    //       <tr>
    //         <th scope="col">Sr No.</th>
    //         <th scope="col">First Name</th>
    //         <th scope="col">Last Name</th>
    //         <th scope="col">Course</th>
    //         <th scope="col">year</th>
            
            
    //         <th scope="col">Edit</th>
            
    //       </tr>
    //     </thead>
    //     <tbody>';
    //     while($row=mysqli_fetch_assoc($result1))
    //     {  
    //         $html.='<tr>
    //         <td>'.$row['chat_id'].'</td>
    //         <td>'.$row['sender_id'].'</td>
    //         <td>'.$row['receiver_id'].'</td>
    //         <td>'.$row['datetime'].'</td>
    //         <td>'.$row['message'].'</td>
            
    //     </tr>';
    // }        $html.='</tbody></table>'; 
    // ob_start();
    // require_once __DIR__ .'/vendor/autoload.php';
    // $mpdf=new \Mpdf\Mpdf();
    // $mpdf->WriteHTML(('Hellooooooo'));
    // // ob_end_clean();
    // $file="report.pdf";
    // $mpdf->Output();
}
    // }
?>

