<?php
include('header.php');
include('menu.php');
include('config.php');
?>



     <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Contact Us</h4>
                        
                    </div>
                </div>
            </div>
            <div class="container-fluid ">
                <div class="row">

                    <div class="col-md-12 ">
                      <form id="form_data" method="post" enctype="multipart/form-data" autocomplete="off"> 
                        <div class="card" >
                                <div class="card-body">
                                    <div class="row" style="margin-top: 30px;margin-bottom: 30px;">
                                        <label class="col-sm-2 text-right control-label col-form-label">Address 1</label>
                                        <div class="col-sm-9">
                                           <textarea name="address1" class="form-control" id="address1"></textarea>
                                        </div>

                                    </div>
                                    <div class="row" style="margin-top: 30px;margin-bottom: 30px;">
                                        <label class="col-sm-2 text-right control-label col-form-label">Address 2</label>
                                        <div class="col-sm-9">
                                           <textarea name="address2" class="form-control" id="address2"></textarea>
                                        </div>

                                    </div>
                                    
                                    <div class="row" style="margin-top: 12px;">
                                            <input type="hidden" name="a_id" class="form-control" id="a_id" >
                                        <label class="col-sm-2 text-right control-label col-form-label">Contact 1</label>
                                        <div class="col-sm-3">
                                            <input type="text" name="contact1" class="form-control" id="contact1" maxlength="10">
                                        </div>
                                        <label class="col-sm-2 text-right control-label col-form-label">Email-Id</label>
                                        <div class="col-sm-3" style="margin-top: -4px;">
                                        <input type="text" name="email" class="form-control" id="email" >
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <center><input type="submit"  value="Submit" name="submit" id="submit" class="btn btn-primary"></center>
                                    </div>
                                </div>
                        </div>
                      </form>
                    </div>
                  </div>
                     <h4 class="page-title">Records</h4>
                      <div class="card">
                      <?php
                            include("config.php");

                                            

                                                $sql = "SELECT * FROM contact ";
                                                $result = mysqli_query($con,$sql);
                                                
                                            ?>
                         <div class="card-body">

                                <div class="table-responsive" method="post">
                                       
                                            <br>
                                    <table id="zero_config" class="table table-striped table-bordered">
                                      <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                          <div class="dataTables_length" id="zero_config_length">
                                          </div>
                                        </div>
                                           
                                      </div>
                                            
                                        <thead>
                                       

                                            
                                            <tr align="center" align="center">
                                                
                                                <th width="80">id</th>
                                                <th width="350">Address1</th>
                                                <th width="350">Address2</th>
                                                <th width="200">Contact</th>
                                                <th width="200">Email</th>
                                                <th>Action</th>
                                            </tr>
                                           
                                        </thead>
                                        <tbody >
                                           <?php
                                                
                                                while($rows=mysqli_fetch_assoc($result))
                                                {   
                                                ?>
                                                <tr>
                                                <td><?php echo $rows['c_id']; ?></td>
                                                <td><?php echo $rows['c_address1'];?></td>
                                                <td><?php echo $rows['c_address2'];?></td>
                                                <td><?php echo $rows['contact_no1'];?></td>
                                                <td><?php echo $rows['email_id'];?></td>
                                                <td><a id="remove" class="fas fa-trash-alt" name="remove" href="contact_delete.php?id=<?php echo $rows['c_id']; ?>"></a></td>
                                        
                                                
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
        <script src="../../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../../assets/extra-libs/sparkline/sparkline.js"></script>
    <script src="../../dist/js/waves.js"></script>
    <script src="../../dist/js/sidebarmenu.js"></script>
    <script src="../../dist/js/custom.min.js"></script>
    <script src="../../assets/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    <script src="../../dist/js/pages/mask/mask.init.js"></script>
    <script src="../../assets/libs/select2/dist/js/select2.full.min.js"></script>
    <script src="../../assets/libs/select2/dist/js/select2.min.js"></script>
    <script src="../../assets/libs/jquery-asColor/dist/jquery-asColor.min.js"></script>
    <script src="../../assets/libs/jquery-asGradient/dist/jquery-asGradient.js"></script>
    <script src="../../assets/libs/jquery-asColorPicker/dist/jquery-asColorPicker.min.js"></script>
    <script src="../../assets/libs/jquery-minicolors/jquery.minicolors.min.js"></script>
    <script src="../../assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="../../assets/libs/quill/dist/quill.min.js"></script>
    <?php
 include 'config.php';

  IF(isset($_POST['submit'])){

     $add1=$_POST['address1'];
     $add2=$_POST['address2'];
     $contact=$_POST['contact1'];
     $email_id=$_POST['email'];
    
    $insertquery="insert into contact(`c_address1`, `c_address2`, `contact_no1`, `email_id`) values('$add1','$add2','$contact',' $email_id')";
   
    $res = mysqli_query($con,$insertquery) ;  


  

if($res) {
    ?>
    <script>
           
            alert("contact Upload successfully")
        </script>
    <?php
}
  }
   

   ?>  

