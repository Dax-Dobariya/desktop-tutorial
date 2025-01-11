<?php
 include("config.php");
 error_reporting(0);

 $id=$_GET['id'];
 $query="select * from registration where id ={$id}";
 $data=mysqli_query($con,$query);
 if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result))
{
?>
<form class="form-horizontal" method="POST" id="form">
                                <div class="card-body">
                                    <h4 class="card-title">Add Teacher</h4>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-sm-6">           
                                             <label for="firstname" >First Name *</label>
                                            <input type="text" class="form-control input-sm" name="firstname" id="firstname" onkeypress="return onlyAlphabets(event,this);" onsubmit="validation()">
                                            <span id="firstnamev" style="color:red; font-size: 12px;"></span>
                                        </div>
                                        <div class="form-group col-md-6 col-sm-6">           
                                             <label for="lastname" >Last Name *</label>
                                            <input type="text" class="form-control input-sm" name="lastname" id="lastname" onkeypress="return onlyAlphabets(event,this);" onsubmit="validation()">
                                            <span id="lastnamev" style="color:red; font-size: 12px;"></span>
                                        </div>

                                    </div>
                                    <div class="row">

                                        <div class="form-group col-md-6 col-sm-6">
                                            <label for="course">Select course*</label>
                                            <select name="course" class="form-control" id="course" onsubmit="validation()">
                                                <option value="">Select Course</option>
                                                <option value="Computer Science">Computer Science</option>
                                                <option value="Biotechnology">Biotechnology</option>
                                                <option value="Environment Science">Environment Science</option>
                                                <option value="Chemistry">Chemistry</option>              
                                            </select>
                                            <span id="desigv" style="color:red; font-size: 10px;"></span>
                                        </div>
                                        <div class="form-group col-md-6 col-sm-6">
                                            <label for="occupation">Select Occupation*</label>
                                            <select name="occupation" class="form-control" id="course" onsubmit="validation()">
                                                <option value="">Select Occupation</option>
                                                <option value="Teacher">Teacher</option>
                                            </select>
                                            <span id="desigv" style="color:red; font-size: 12px;"></span>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="form-group col-md-6 col-sm-6">
                                            <div class="form-check-label">
                                                <label >Gender *</label>
                                                <div><input type="radio" id="male" name="gender" checked="checked" value=" value="Male <?php if ($rows['gender'] == 'Male') {echo "checked";}?>" onsubmit="validation()">Male &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio"  id="female" name="gender" value="Female value="Male <?php if ($rows['gender'] == 'Male') {echo "checked";}?>>Female &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      
                                                </div> 
                                            </div>
                                        </div>   
                                        <div class="form-group col-md-6 col-sm-6">
                                            <label for="email">Email *</label>
                                            <input type="text" class="form-control input-sm" name="emailid" id="email" onsubmit="validation()">
                                            <span id="emailv" style="color:red; font-size: 12px;"></span>
                                        </div>
                                    </div>
                                                                                                
                                    <div class="row">

                                        <div class="form-group col-md-6 col-sm-6">
                                             <label for="mobile">Mobile Number *</label> 
                                                <input type="text" class="form-control" maxlength="10" name="contactno" id="mobile"  onkeypress="return isNumber(event)" onsubmit="validation()">
                                             <span id="mobilev" style="color:red; font-size: 12px;"></span>
                                        </div>
                                        <div class="form-group col-md-6 col-sm-6">
                                            <label for="password">Password *</label>
                                             <input type="password" class="form-control input-sm" minlength="8" maxlength="16" name="password" id="password" onsubmit="validation()">
                                             <span id="passwordv" style="color:red; font-size: 12px;"></span>
                                        </div>
                                        
                                        </div>
                                    </div>
                               
                                    <div class="border-top">
                                    <div class="card-body">
                                        <!-- <input type="submit" class="btn btn-primary float-right mb-3" value="Submit" name="submit"> -->
                                        <button type="button" class="btn btn-primary float-right mb-3"  name="submit">Add</button>
                                    </div>
                                </div>
                            </form>
    <?php
}
}

 //header("location:add_teacher.php");
// mysqli_close($con);
//  if($data)
//  {
//     echo "record delete from database";
//  }
//  else{
//     echo "fail";
//  }
?>