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
                    <div class="col-lg-3 col-md-6 col-sm-12">

                        <div class="card member-card bg-light">
                            <div class="body">
                                <div class="member-thumb">
                                    <img src="upload\<?php echo $row[4]; ?>" class="img-fluid rounded" style="height:200px;width:200px;" alt="profile-image">
                                </div>
                                <div class="detail">
                                    <h4 class="m-b-0">
                                        <?php echo $row[1]; ?>
                                    </h4>&nbsp;
                                    <p class="text-muted">
                                        <?php echo $row['f_desc']; ?>.
                                    </p>
                                    <p class="text-muted">
                                        <?php echo $row['f_qualif']; ?> .
                                    </p>
                                    <p class="text-muted">
                                        <?php echo $row['f_exp'] . " Years of Experiance"; ?>
                                    </p>

                                    <p class="text-muted">
                                        <?php echo $row[2]; ?>
                                    </p>

                                    <?php if($_SESSION['USER'] == "ADMIN"){ ?>
                                    <ul class="social-links list-inline m-t-20">
                                        <li><a href="del.php?del=<?php echo $row[0]; ?>"
                                                onclick="return confirm('Are you sure you want to delete Record <?php echo $row[1]; ?>' );"><i
                                                    class="zmdi zmdi-delete" style="font-size: 35px;"></i></a></li>&nbsp;&nbsp;
                                        <li><a href="add-faculty.php?upd=<?php echo $row[0]; ?>"><i class="zmdi zmdi-edit"
                                                    style="font-size: 35px;"></i></a></li>
                                    </ul>
<?php }?>
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