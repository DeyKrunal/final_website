<?php
require_once("connection.php");
session_start();

// Initialize $search variable
$search = "";

// Check if search query is set
if (isset($_GET['search'])) {
    $search = $_GET['search'];
}

// Build the query
$query = "SELECT * FROM faculty_tbl";
if (!empty($search)) {
    $query .= " WHERE f_name LIKE '%$search%' ";
}

// Execute the query
$res = mysqli_query($con, $query);

// Check if there are any results
?>

<div class="tab-content m-t-10" id="studentContainer">
    <div class="tab-pane active" id="Permanent">
        <div class="row clearfix">
            <?php
            if (mysqli_num_rows($res) > 0) {
                // Loop through results and display them
                while ($row = mysqli_fetch_array($res)) {
                    ?>
                    <div class="col-lg-2 col-md-6 col-sm-12">

<div class="card member-card bg-light">
    <div class="body">
        <div class="member-thumb">
 <img src="upload\<?php echo $row[4]; ?>" style="height: 180px; width:150px;" class="img-fluid rounded"
                                                                alt="profile-image">
        </div>
        <div class="detail">
            <h4 id="sp1"  class="m-b-0" style="font-size:12.5px;margin-top :1rem;">
                <?php echo $row[1]; ?>
            </h4>
            <a href="faculty_group_view.php?ffid=<?php echo $row[0]; ?>"><button
                    class="btn btn-primary faculty"
                    onclick="toggleDiv(<?php echo $row[0]; ?>)">View
                    Group</button></a>

            <!-- <input type="hidden" id="val" value="<?php //echo $row[1];     ?>" /> -->
        </div>
    </div>
</div>
</div>
                <?php } ?>
            </div>
        </div>
    </div>


    <?php

            } else {
                echo "No results found.";
            }
            ?>