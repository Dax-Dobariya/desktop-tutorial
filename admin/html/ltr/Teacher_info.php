<?php
include('header.php');
include('menu.php');
include('config.php');
?>


<div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Teacher Detail</h4>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                        <?php
                            include("config.php");

                           

                            $sql = "SELECT * FROM registration where Occupation='faculty'";
                            $result = mysqli_query($con,$sql);
                            
                        ?>
                            <div class="card-body">
                                <h5 class="card-title m-b-0">Teacher Details</h5>
                            </div>
                            <table class="table">
                                  <thead>
                                    <tr>
                                      <th scope="col">Sr No.</th>
                                      <th scope="col">First Name</th>
                                      <th scope="col">Last Name</th>
                                      <th scope="col">Course</th>
                                      
                                      <th scope="col">Gender</th>
                                      <th scope="col">Email-id</th>
                                      <th scope="col">Contact No</th>
                                      <th scope="col">Password</th>
                                      <th scope="col">Update</th>
                                      <th scope="col">Delete</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                
                                      <?php

                                        while($rows=mysqli_fetch_assoc($result))
                                        {   
                                    ?>
                                    <tr>
                                        <td><?php echo $rows['id']; ?></td>
                                        <td><?php echo $rows['firstname'];?></td>
                                        <td><?php echo $rows['lastname']; ?></td>
                                        <td><?php echo $rows['course'];?></td>
                                        
                                         <td><?php echo $rows['gender'];?></td>
                                        <td><?php echo $rows['email_id'];?></td>
                                        <td><?php echo $rows['contactno']; ?></td>
                                        <td><?php echo $rows['password'];?></td>
                                        <td><a href="Teacher_update.php?id=<?php echo $rows['id']; ?>">Update</td>
                                        <td><a id="remove" class="fas fa-trash-alt" name="remove" href="delete.php?id=<?php echo $rows['id']; ?>"></td>
                                    </tr>
                                            <?php
                                        }
                                      ?>
                                    
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
  

</body>

</html>