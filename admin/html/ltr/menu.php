<?php

$occ = $_SESSION['occupation'];

?>
<aside class="left-sidebar" data-sidebarbg="skin5">
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                <ul id="sidebarnav" class="p-t-30">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="dashboard.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-border-inside"></i><span class="hide-menu">Students </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="Student_info.php" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Student info </span></a></li>
                                
                               
                            </ul>
                        </li> 
                        <?php  if($occ == 'admin'){
                            ?>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Teachers </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="Teacher_info.php" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Teacher info </span></a></li>
                                <li class="sidebar-item"><a href="add_teacher.php" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Add Teacher </span></a></li>
                            </ul></li>
                            <?php  }?>
                            <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Forum </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="uploadnews.php" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Upload News </span></a></li>
                                <li class="sidebar-item"><a href="news.php" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> News Info </span></a></li>
                                <li class="sidebar-item"><a href="personal_chat1.php" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Students Personal chat </span></a></li>
                                <?php  if($occ == 'faculty'){ 
                                ?>
                                <li class="sidebar-item"><a href="admin_chat.php" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Chat with Admin</span></a></li>
                                <?php } ?>
                                <?php  if($occ == 'admin'){ ?>
                                <li class="sidebar-item"><a href="groupchat.php" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Teacher Personal chat </span></a></li> <?php  }?>
                                <li class="sidebar-item"><a href="group_chat.php" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Group  chat </span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">contact_us </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="contactus.php" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> contact_us </span></a></li>
                               
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-border-inside"></i><span class="hide-menu">Report </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="Student_report.php" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Student Chat Report </span></a></li>
                            </ul>
                        </li>
                    </ul>

                </nav>
            </div>
        </aside>