<?php 
include('header.php');
include('menu.php');
include('config.php');
?>
   <!-- <style>
.vertical-menu {
  width: 100%;
  height: 475px;
  overflow-y: auto;
 
}
.vertical-menu a {
  background-color: white;
  color: black;
  display: block;
  padding: 5px;
  text-decoration: none;
}
#panel {
  display: none;
}
.vertical-menu a:hover {
  background-color: #F8F8FF;
  
}
.vertical-menu a.active {
  background-color: #F8F8FF;
  color: white;
}
</style> -->
<div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Group Chat</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
             <input type="hidden" name="refer_id" id="refer_id">          
             <div class="container-fluid">
                    <div class="col-md-12">
                        <div class="card">
                          <div class="card-body"> 
                            
                                <!-- <div class="row">
                                    <div class="col-lg-3">
                                        <div   style="background: #87cefa;   color:black; padding: 2px; margin-top: -20px; width: 250px; margin-left: -20px;">
                                            <h6 class="card-title m-t-5" style="text-align: center;"><strong  class="fab fa-rocketchat"> Group</strong></h6>
                                        </div>
                                        <div style="border-left: 2px solid #dee2e6;padding: 2px; width: 250px;margin-left: -20px; border-right: 2px solid #dee2e6;" >
                                           <input type="text" name="search_text" id="search_text" placeholder="Search or start new chat" class="form-control">
                                        </div>
                                        <div class="vertical-menu" style="border-left: 2px solid #dee2e6; border-right: 2px solid #dee2e6;width: 250px; margin-left: -20px; border-bottom: 2px solid #dee2e6; padding: 1px; margin-bottom: -20px;"  id="result">
                              
                                        </div>
                                    </div>  -->
                                   
                                    <div id="panel-hide"  >
                                      <h2 style="margin-left:320px; ">Welcome To Group Chat</h2>
                                      <!-- <img src="./../../assets/images/chatimage.jpg" style="margin-left: 50px; width: 1000px;height: 350px; "> -->
                                    </div>
                <!--Chat Model Open -->  
                <div class="col-12" id="panel">
                  <div class="card-body"> 
                  
                     <!-- <div class="form-group col-sm-6">
                        <label style="font-size: 15px;"><b>Name : </b></label>
                        <span id="member_name" style="font-size:15px;"></span>
                      </div>   -->

                            <div class="chat-box scrollable" id="chat_box"style="height:350px;">
                                  
                            </div>
                        </div>
                            <div method="post" name="myform" class="form-horizontal" enctype="multipart/form-data">
                                <div class="card-body border-top" >
                                  <div class="row">
                                    <div class="col-11">
                                        <div class="input-field m-t-0 m-b-0">
                                          
                                           <input type="text" id="message_send" placeholder="Type message..."class="form-control border-5" style="width: 855px"name="message" rows="2" cols="50">
                                           
                                           <span id="message_sendv" style="color:red; font-size: 12px;"></span>
                                        </div>
                                    </div>
                                    <div class="col-1">
                                      <input type="submit" name="message" id="messagesend" class=" btn btn-primary" value="Send" onclick="send();">
                                    </div>
                                  </div>
                                </div>
                            </div>
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
    <script>
$(document).ready(function(){

//Press Enter Key to send message
// Get the input field
var message_send = document.getElementById("message_send");

// Execute a function when the user releases a key on the keyboard
message_send.addEventListener("keyup", function(event) {
  // Number 13 is the "Enter" key on the keyboard
  if (event.keyCode === 13) {
    // Cancel the default action, if needed
    event.preventDefault();
    // Trigger the button element with a click
    document.getElementById("messagesend").click();
  }
});

  load_data();
  function load_data(query){
  
  var refer_id = document.getElementById('refer_id').value;

    $.ajax({
      url:"allfunction3.php?call=project_personal_search",
      method:"post",
      data:{query:query,refer_id:refer_id},
      success:function(data)
      {
        $('#result').html(data);
      }
    });
  }
  
  $('#search_text').keyup(function(){
    var search = $(this).val();
    if(search != '')
    {
      load_data(search);
    }
    else
    {
      load_data();      
    }
  });
});

//Send msg inserting 
function send()
{

      var refer_id = document.getElementById('refer_id').value;
      var message = document.getElementById('message_send').value;
      var message_send =document.getElementById('message_send').value;
      
      if(message_send == ""){
        document.getElementById('message_sendv').innerHTML = "Please write something in message box";
        return false;
      }
      else
      {
        document.getElementById('message_sendv').innerHTML = "";
      }
      $.ajax({
        type: 'POST',
        data: "refer_id="+refer_id+"&message="+message,
        url: 'allfunction3.php?call=personal_msg_insert',
  
        success: function(data)
        {         
           setInterval(fetch_msg(refer_id),1000); 
           document.getElementById('message_send').value ="";
        }
      });
}
fetch_msg('')
//fetch group message
function fetch_msg(refer_id){

  document.getElementById('refer_id').value=refer_id;

  $.ajax({
      url:"allfunction3.php?call=fetch_personal_message",
      method:"post",
      data:{refer_id:refer_id},
      success:function(data){
        
        $("#chat_box").html(data);
      }
    });
} 

// //Show project name and member in chat module
// function showdata(refer_id){

//     // var refer = $_GET['refer_id'];
//     document.getElementById("panel").style.display = "block";
//     document.getElementById("panel-hide").style.display="none";
//     document.getElementById('refer_id').value=refer_id;
//     document.getElementById("chat_box").value;

//     $.ajax({
//       url:"allfunction3.php?call=project_personal_chat",
//       method:"post",
//       data:{refer_id:refer_id},
//       success:function(data){
//         console.log(data);
//         var obj = JSON.parse(data);
//         if(obj.data1){

//            document.getElementById("member_name").innerHTML = obj.data.fullname;

//         }else{
//           alert(obj.msg);
//         }
//       }
//     });

</script>

