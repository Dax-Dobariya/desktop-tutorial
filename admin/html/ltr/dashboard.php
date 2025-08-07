<?php
   include('header.php');
   include ('menu.php');
   include('config.php');
   
if($_SESSION['email_id'] != ''){
   include('config.php');
   
?>

         
        <div class="page-wrapper">
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-cyan text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                                <?php 
                                    $query = "select count(id) as id from registration WHERE occupation = 'Student' ";  

                                    $result = mysqli_query($con, $query); 
                                    if(mysqli_num_rows($result)>0){
                                       
                                        $row = mysqli_fetch_array($result);
                                        ?>
                                        <h6 class="text-white"><?php echo $row['id']; ?></h6>
                                        <?php
                                    }
                                ?>
                                <h6 class="text-white">Students</h6>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-warning text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-collage"></i></h1>
                                <?php 
                                    $query = "select count(id) as id from registration WHERE occupation = 'faculty' ";  

                                    $result = mysqli_query($con, $query); 
                                    if(mysqli_num_rows($result)>0){
                                       
                                        $row = mysqli_fetch_array($result);
                                        ?>
                                        <h6 class="text-white"><?php echo $row['id']; ?></h6>
                                        <?php
                                    }
                                ?>
                                <h6 class="text-white">Teachers</h6>
                            </div>
                        </div>
                            </div> 
                              
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer text-center">
                All Rights Reserved by SRKI College.
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
    <script src="../../assets/libs/flot/excanvas.js"></script>
    <script src="../../assets/libs/flot/jquery.flot.js"></script>
    <script src="../../assets/libs/flot/jquery.flot.pie.js"></script>
    <script src="../../assets/libs/flot/jquery.flot.time.js"></script>
    <script src="../../assets/libs/flot/jquery.flot.stack.js"></script>
    <script src="../../assets/libs/flot/jquery.flot.crosshair.js"></script>
    <script src="../../assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="../../dist/js/pages/chart/chart-page-init.js"></script>
</body>
</html> 

<?php }
else{
    header('location:index.php');
} ?>