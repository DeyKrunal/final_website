<?php
//session_start();

$name=$_SESSION['NAME'];
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<aside id="leftsidebar" class="sidebar">
    <ul class="nav nav-tabs">
        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#dashboard"><i class="zmdi zmdi-home"></i></a></li>
        <li class="nav-item"><a class="nav-link" data-toggle="tab"></a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane stretchRight active" id="dashboard">
            <div class="menu">
                <ul class="list">
                    <li>
                        <div class="user-info">
                            <div><img src="assets/images/pro_logo.jpg" class="p-1"  alt="LOGO" style="border: 0px solid pink;width:120px"></div>
                            <div class="detail">
                                <h4><?php echo $name;?></h4>
                              
                                  
                                <small>ADMIN</small>
                             
                            </div>
                        </div>
                    </li>
                    <li class="header">Admin Menu</li>
                    <li><a href="admin_dash.php"><i class="fa fa-institution"></i><span>Dashboard</span></a></li>
                   
                    
                    <li><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-user-circle-o"></i><span>Faculty</span> </a>
                        <ul class="ml-menu">
                            <li><a href="faculty.php">View Faculty</a></li>
                            <li><a href="add-faculty.php">Add Faculty</a></li>
                            <!-- <li><a href="profile.html">Profile</a></li> -->
                        </ul>
                    </li>
                    <li><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-mortar-board" ></i><span>Head Faculty</span> </a>
                        <ul class="ml-menu">
                            <li><a href="view_head_faculty.php">View Head Faculty</a></li>
                            <li><a href="head_faculty.php">Manage Head Faculty</a></li>
                            <!-- <li><a href="profile.html">Profile</a></li> -->
                        </ul>
                    </li>
                    <li><a href="students.php"><i class="fa fa-user"></i><span>Students</span></a></li>
                    <!-- <li><a href="groups.php"><i class="fa fa-group"></i><span>Groups</span></a></li> -->
                    <li><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-group"></i><span>Group</span> </a>
                        <ul class="ml-menu">
                            <li><a href="groups.php">All Groups</a></li>
                            <li><a href="allocated_group.php">View Faculty wise Groups</a></li>
                            <!-- <li><a href="profile.html">Profile</a></li> -->
                        </ul>
                    </li>
                    <!-- <li><a href="javascript:void(0);" class="menu-toggle"><i class="fa fa-file-text"></i><span>Generate Report</span> </a>
                        <ul class="ml-menu">
                            <li><a href="bar4.php?name=<?php echo 'admin_dash.php';?>">Preview Report</a></li>
                            <li><a href="report.php?name=<?php echo 'admin_dash.php';?>">Save As PDF</a></li> -->
                            <!-- <li><a href="profile.html">Profile</a></li> -->
                        <!-- </ul>
                    </li> -->
                    <li><a href="bar4.php?name=<?php echo 'admin_dash.php';?>"> <i class="fa fa-file-text"></i><span>Generate Report</span></a></li>
                  
                   
                  
                  
    </div>    
</aside>