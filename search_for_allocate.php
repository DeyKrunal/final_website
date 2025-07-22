<?php
require_once("connection.php");
session_start();

// Initialize $search variable
$search = "";

// Check if search query is set
if(isset($_GET['search'])) {
    $search = $_GET['search'];
}

// Build the query
$query = "SELECT * FROM `group_stud_tbl`";
if (!empty($search)) {
    $query .= " where name1 LIKE '%$search%' OR name2 LIKE '%$search%' OR name3 LIKE '%$search%' OR name4 LIKE '%$search%' OR gsid LIKE '%$search%' OR div1 LIKE '%$search%' OR div2 LIKE '%$search%' OR div3 LIKE '%$search%' OR div4 LIKE '%$search%' OR rn1 LIKE '%$search%' OR rn2 LIKE '%$search%' OR rn3 LIKE '%$search%' OR rn4 LIKE '%$search%'";
}else
{
    $query .= "where faculty_id=0";
}

// Execute the query
$res1 = mysqli_query($con, $query);

// Check if there are any results
 ?>
        
        <div class="container-fluid mt-4" id="studentContainer">
                        <div class="row clearfix">
        
                                    <?php
                                    //  $res = mysqli_query($con, "SELECT * FROM `group_stud_tbl` where faculty_id = 0");
                                    if(mysqli_num_rows($res1) > 0) {
                                    $i = 1;
                                    while ($row = mysqli_fetch_array($res1)) {

                                        if ($i == 1) {
                                            ?>
                                            <div class="col-sm-12 col-md-6 col-lg-3">
                                                <div class="card social_widget2">
                                                    <div class="body data text-center">
                                                        <ul class="list-unstyled m-b-0">
                                                            <li class="m-b-20">
                                                                <!-- <i class="zmdi zmdi-thumb-up col-blue"></i> -->
                                                                <h4 class="m-t-0 m-b-0"><img src="upload/<?php echo $row['image'];?>" alt="grp img"
                                                                                    height="150px" width="150px"></h4>
                                                                <!-- <span>Post View</span> -->
                                                            </li>
                                                            <li>
                                                            <h6><i class="zmdi zmdi-graduation-cap"></i><span><?php echo "&nbsp;&nbsp;&nbsp;GROUP ".$row['gsid'] ?></span></h6>

                                                            </li>

                                                        </ul>
                                                        
                                                    </div>

                                                    <div class="name facebook">
                                                        <ul class="list-unstyled m-b-30">
                                                            <li class="m-b-20">
                                                                <div class="progress-container">
                                                                    <span id="sp1" class="progress-badge">
                                                                        <?php if ($row['name1'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['name1'];
                                                                        } ?>
                                                                    </span>

                                                                    <span class="progress-badge" style="float:right;">
                                                                        <?php echo $row['div1']; ?>
                                                                    </span><br>
                                                                    <span class="progress-badge" style="float:right;">
                                                                        <?php if ($row['rn1'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['rn1'];
                                                                        } ?>
                                                                    </span>

                                                                </div>
                                                            </li>
                                                            <li class="m-b-20">
                                                                <div class="progress-container">
                                                                    <span class="progress-badge" id="sp1">
                                                                        <?php if ($row['name2'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['name2'];
                                                                        } ?>
                                                                    </span>

                                                                    <span class="progress-badge" style="float:right;">
                                                                        <?php echo $row['div2']; ?>
                                                                    </span><br>
                                                                    <span class="progress-badge" style="float:right;">
                                                                        <?php if ($row['rn2'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['rn2'];
                                                                        } ?>
                                                                    </span>
                                                                </div>
                                                            </li>
                                                            <li class="m-b-20">
                                                                <div class="progress-container">
                                                                    <span class="progress-badge" id="sp1">
                                                                        <?php if ($row['name3'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['name3'];
                                                                        } ?>
                                                                    </span>

                                                                    <span class="progress-badge" style="float:right;">
                                                                        <?php echo $row['div3']; ?>
                                                                    </span><br>
                                                                    <span class="progress-badge" style="float:right;">
                                                                        <?php if ($row['rn3'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['rn3'];
                                                                        } ?>
                                                                    </span>

                                                                </div>
                                                            </li>
                                                            <li class="m-b-20">
                                                                <div class="progress-container">
                                                                    <span class="progress-badge" id="sp1">
                                                                        <?php echo $row['name4']; ?>
                                                                        <?php if ($row['name4'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['name4'];
                                                                        } ?>
                                                                    </span>

                                                                    <span class="progress-badge" style="float:right;">
                                                                        <?php echo $row['div4']; ?>
                                                                    </span><br>
                                                                    <span class="progress-badge" style="float:right;">
                                                                        <?php if ($row['rn4'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['rn4'];
                                                                        } ?>
                                                                    </span>

                                                                </div>
                                                            </li>
                                                        </ul>
                                                        <?php if($row['faculty_id'] == 0){?>
                                                            <h5><input id="adelete_2" type="checkbox" id="myCheckbox" onchange="toggleButton()" name="grpname[]" value="<?php echo $row[0];?>" style="height:1.2rem;width:2rem;">
                                                            <span>select group</span>
                                                        </h5>
                                                        <?php }else{?>
                                                            <span style="color:white;font-weight:600;">Already Assign</span>
                                                        <?php }?>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php $i++;
                                        } else if ($i == 2) { ?>
                                                <div class="col-sm-12 col-md-6 col-lg-3">
                                                    <div class="card social_widget2">
                                                        <div class="body data text-center">
                                                            <ul class="list-unstyled m-b-0">
                                                                <li class="m-b-20">
                                                                    <!-- <i class="zmdi zmdi-thumb-up col-blue"></i> -->
                                                                    <h4 class="m-t-0 m-b-0"><img src="upload/<?php echo $row['image'];?>" alt="grp img"
                                                                                    height="150px" width="150px"></h4>
                                                                    <!-- <span>Post View</span> -->
                                                                </li>
                                                                <li>
                                                                <h6><i class="zmdi zmdi-graduation-cap"></i><span><?php echo "&nbsp;&nbsp;&nbsp;GROUP ".$row['gsid'] ?></span></h6>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="name dribbble">
                                                            <ul class="list-unstyled m-b-30">
                                                                <li class="m-b-20">
                                                                    <div class="progress-container">
                                                                        <span id="sp1" class="progress-badge">
                                                                        <?php if ($row['name1'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['name1'];
                                                                        } ?>
                                                                        </span>

                                                                        <span class="progress-badge" style="float:right;">
                                                                        <?php echo $row['div1']; ?>
                                                                        </span><br>
                                                                        <span class="progress-badge" style="float:right;">
                                                                        <?php if ($row['rn1'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['rn1'];
                                                                        } ?>
                                                                        </span>

                                                                    </div>
                                                                </li>
                                                                <li class="m-b-20">
                                                                    <div class="progress-container">
                                                                        <span class="progress-badge" id="sp1">
                                                                        <?php if ($row['name2'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['name2'];
                                                                        } ?>
                                                                        </span>

                                                                        <span class="progress-badge" style="float:right;">
                                                                        <?php echo $row['div2']; ?>
                                                                        </span><br>
                                                                        <span class="progress-badge" style="float:right;">
                                                                        <?php if ($row['rn2'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['rn2'];
                                                                        } ?>
                                                                        </span>
                                                                    </div>
                                                                </li>
                                                                <li class="m-b-20">
                                                                    <div class="progress-container">
                                                                        <span class="progress-badge" id="sp1">
                                                                        <?php if ($row['name3'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['name3'];
                                                                        } ?>
                                                                        </span>

                                                                        <span class="progress-badge" style="float:right;">
                                                                        <?php echo $row['div3']; ?>
                                                                        </span><br>
                                                                        <span class="progress-badge" style="float:right;">
                                                                        <?php if ($row['rn3'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['rn3'];
                                                                        } ?>
                                                                        </span>

                                                                    </div>
                                                                </li>
                                                                <li class="m-b-20">
                                                                    <div class="progress-container">
                                                                        <span class="progress-badge" id="sp1">
                                                                        <?php echo $row['name4']; ?>
                                                                        <?php if ($row['name4'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['name4'];
                                                                        } ?>
                                                                        </span>

                                                                        <span class="progress-badge" style="float:right;">
                                                                        <?php echo $row['div4']; ?>
                                                                        </span><br>
                                                                        <span class="progress-badge" style="float:right;">
                                                                        <?php if ($row['rn4'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['rn4'];
                                                                        } ?>
                                                                        </span>

                                                                    </div>
                                                                </li>
                                                            </ul>

                                                            <?php if($row['faculty_id'] == 0){?>
                                                            <h5><input id="adelete_2" type="checkbox" id="myCheckbox" onchange="toggleButton()" name="grpname[]" value="<?php echo $row[0];?>" style="height:1.2rem;width:2rem;">
                                                            <span>select group</span>
                                                        </h5>
                                                        <?php }else{?>
                                                            <span style="color:white;font-weight:600;">Already Assign</span>
                                                        <?php }?>
                                                            </h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php $i++;
                                        } else if ($i == 3) { ?>
                                                    <div class="col-sm-12 col-md-6 col-lg-3">
                                                        <div class="card social_widget2">
                                                            <div class="body data text-center">
                                                                <ul class="list-unstyled m-b-0">
                                                                    <li class="m-b-20">
                                                                        <!-- <i class="zmdi zmdi-thumb-up col-blue"></i> -->
                                                                        <h4 class="m-t-0 m-b-0"><img src="upload/<?php echo $row['image'];?>" alt="grp img"
                                                                                    height="150px" width="150px"></h4>
                                                                        <!-- <span>Post View</span> -->
                                                                    </li>
                                                                    <li>
                                                                    <h6><i class="zmdi zmdi-graduation-cap"></i><span><?php echo "&nbsp;&nbsp;&nbsp;GROUP ".$row['gsid'] ?></span></h6>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="name twitter">
                                                                <ul class="list-unstyled m-b-30">
                                                                    <li class="m-b-20">
                                                                        <div class="progress-container">
                                                                            <span id="sp1" class="progress-badge">
                                                                        <?php if ($row['name1'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['name1'];
                                                                        } ?>
                                                                            </span>

                                                                            <span class="progress-badge" style="float:right;">
                                                                        <?php echo $row['div1']; ?>
                                                                            </span><br>
                                                                            <span class="progress-badge" style="float:right;">
                                                                        <?php if ($row['rn1'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['rn1'];
                                                                        } ?>
                                                                            </span>

                                                                        </div>
                                                                    </li>
                                                                    <li class="m-b-20">
                                                                        <div class="progress-container">
                                                                            <span class="progress-badge" id="sp1">
                                                                        <?php if ($row['name2'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['name2'];
                                                                        } ?>
                                                                            </span>

                                                                            <span class="progress-badge" style="float:right;">
                                                                        <?php echo $row['div2']; ?>
                                                                            </span><br>
                                                                            <span class="progress-badge" style="float:right;">
                                                                        <?php if ($row['rn2'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['rn2'];
                                                                        } ?>
                                                                            </span>
                                                                        </div>
                                                                    </li>
                                                                    <li class="m-b-20">
                                                                        <div class="progress-container">
                                                                            <span class="progress-badge" id="sp1">
                                                                        <?php if ($row['name3'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['name3'];
                                                                        } ?>
                                                                            </span>

                                                                            <span class="progress-badge" style="float:right;">
                                                                        <?php echo $row['div3']; ?>
                                                                            </span><br>
                                                                            <span class="progress-badge" style="float:right;">
                                                                        <?php if ($row['rn3'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['rn3'];
                                                                        } ?>
                                                                            </span>

                                                                        </div>
                                                                    </li>
                                                                    <li class="m-b-20">
                                                                        <div class="progress-container">
                                                                            <span class="progress-badge" id="sp1">
                                                                        <?php echo $row['name4']; ?>
                                                                        <?php if ($row['name4'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['name4'];
                                                                        } ?>
                                                                            </span>

                                                                            <span class="progress-badge" style="float:right;">
                                                                        <?php echo $row['div4']; ?>
                                                                            </span><br>
                                                                            <span class="progress-badge" style="float:right;">
                                                                        <?php if ($row['rn4'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['rn4'];
                                                                        } ?>
                                                                            </span>

                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                                <?php if($row['faculty_id'] == 0){?>
                                                            <h5><input id="adelete_2" type="checkbox" id="myCheckbox" onchange="toggleButton()" name="grpname[]" value="<?php echo $row[0];?>" style="height:1.2rem;width:2rem;">
                                                            <span>select group</span>
                                                        </h5>
                                                        <?php }else{?>
                                                            <span style="color:white;font-weight:600;">Already Assign</span>
                                                        <?php }?>
                                                                </h5>
                                                            </div>
                                                        </div>
                                                    </div>

                                            <?php $i++;
                                        } else if ($i == 4) { ?>
                                                        <div class="col-sm-12 col-md-6 col-lg-3">
                                                            <div class="card social_widget2">
                                                                <div class="body data text-center">
                                                                    <ul class="list-unstyled m-b-0">
                                                                        <li class="m-b-20">
                                                                            <!-- <i class="zmdi zmdi-thumb-up col-blue"></i> -->
                                                                            <h4 class="m-t-0 m-b-0"><img src="upload/<?php echo $row['image'];?>" alt="grp img"
                                                                                    height="150px" width="150px"></h4>
                                                                            <!-- <span>Post View</span> -->
                                                                        </li>
                                                                        <li>
                                                                        <h6><i class="zmdi zmdi-graduation-cap"></i><span><?php echo "&nbsp;&nbsp;&nbsp;GROUP ".$row['gsid'] ?></span></h6>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="name youtube">
                                                                    <ul class="list-unstyled m-b-30">
                                                                        <li class="m-b-20">
                                                                            <div class="progress-container">
                                                                                <span id="sp1" class="progress-badge">
                                                                        <?php if ($row['name1'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['name1'];
                                                                        } ?>
                                                                                </span>

                                                                                <span class="progress-badge" style="float:right;">
                                                                        <?php echo $row['div1']; ?>
                                                                                </span><br>
                                                                                <span class="progress-badge" style="float:right;">
                                                                        <?php if ($row['rn1'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['rn1'];
                                                                        } ?>
                                                                                </span>

                                                                            </div>
                                                                        </li>
                                                                        <li class="m-b-20">
                                                                            <div class="progress-container">
                                                                                <span class="progress-badge" id="sp1">
                                                                        <?php if ($row['name2'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['name2'];
                                                                        } ?>
                                                                                </span>

                                                                                <span class="progress-badge" style="float:right;">
                                                                        <?php echo $row['div2']; ?>
                                                                                </span><br>
                                                                                <span class="progress-badge" style="float:right;">
                                                                        <?php if ($row['rn2'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['rn2'];
                                                                        } ?>
                                                                                </span>
                                                                            </div>
                                                                        </li>
                                                                        <li class="m-b-20">
                                                                            <div class="progress-container">
                                                                                <span class="progress-badge" id="sp1">
                                                                        <?php if ($row['name3'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['name3'];
                                                                        } ?>
                                                                                </span>

                                                                                <span class="progress-badge" style="float:right;">
                                                                        <?php echo $row['div3']; ?>
                                                                                </span><br>
                                                                                <span class="progress-badge" style="float:right;">
                                                                        <?php if ($row['rn3'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['rn3'];
                                                                        } ?>
                                                                                </span>

                                                                            </div>
                                                                        </li>
                                                                        <li class="m-b-20">
                                                                            <div class="progress-container">
                                                                                <span class="progress-badge" id="sp1">
                                                                        <?php echo $row['name4']; ?>
                                                                        <?php if ($row['name4'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['name4'];
                                                                        } ?>
                                                                                </span>

                                                                                <span class="progress-badge" style="float:right;">
                                                                        <?php echo $row['div4']; ?>
                                                                                </span><br>
                                                                                <span class="progress-badge" style="float:right;">
                                                                        <?php if ($row['rn4'] == "") {
                                                                            echo "&nbsp";
                                                                        } else {
                                                                            echo $row['rn4'];
                                                                        } ?>
                                                                                </span>

                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                    <?php if($row['faculty_id'] == 0){?>
                                                            <h5><input id="adelete_2" type="checkbox" id="myCheckbox" onchange="toggleButton()" name="grpname[]" value="<?php echo $row[0];?>" style="height:1.2rem;width:2rem;">
                                                            <span>select group</span>
                                                        </h5>
                                                        <?php }else{?>
                                                            <span style="color:white;font-weight:600;">Already Assign</span>
                                                        <?php }?>
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                        </div>

                                            <?php $i = 1;
                                        }
                                    } ?>
        </div>
        </div>
    
        <?php
    
                                }else {
    echo "No results found.";
}
?>
