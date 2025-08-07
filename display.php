<?php
include("page1.php"); 
include("header.php"); 
include('config.php');
?>


<div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">News Detail</h4>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row" style="margin-top:50px;margin-left:10px;margin-right: 10px;">
                    <div class="col-12">
                        <div class="card">
                        <?php
                            $sql = "SELECT * FROM news order by id DESC";
                            $result = mysqli_query($con,$sql);
                            
                        ?>
                            <div class="card-body">
                                <h5 class="card-title m-b-0"><h2>News Details</h2></h5>
                            </div>
                            <table class="table">
                                  <thead>
                                    <tr>
                                     
                                      <th scope="col">News Type</th>
                                      <th scope="col">News Name</th>
                                      <th scope="col">Image</th>
                                      <th scope="col">News Description</th>
                                      <th scope="col">News Date</th>
                                      <th scope="col">Download</th>
                                      

                                      
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                        while($rows=mysqli_fetch_assoc($result))
                                        {   
                                    ?>
                                    <tr>
                                        <td><?php echo $rows['news_type'];?></td>
                                        <td><?php echo $rows['news_name']; ?></td>
                                        <td><img src="uploads/<?php echo $rows['image'];?>" style="width: 50px;height: 50px;"/></td>
                                        <td><?php echo $rows['news_description']; ?></td>
                                        <td><?php echo $rows['News_date']; ?></td>
                                        <td><a id="download" class="fas fa-trash-alt" name="dowwnload" href="download.php?file=<?php echo $rows['id']; ?>">Download
                                        </td>
                                       
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