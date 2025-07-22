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

<div class="container-fluid" id="studentContainer">
    <div class="row clearfix">
        <?php
        if (mysqli_num_rows($res) > 0) {
            // Loop through results and display them
            while ($row = mysqli_fetch_array($res)) {
                ?>
                <div class="col-md-5 col-lg-3">
                    <!-- <div class="card" style="width: 19rem;"> -->
                    <div class="body bg-light mb-4 mt-4">
                        <img src="upload\<?php echo $row[4]; ?>" alt="img" style="height:200px; width:250px;"
                            class="img-fluid rounded m-b-20">
                        <center>
                            <h6>
                                <?php echo $row[1]; ?>
                            </h6>
                        </center>
                        <!-- <div class="table-responsive"> -->

                        <table class="table table-hover js-basic-examples #00ced1 m-b-0">
                            <tbody>
                                <tr>
                                    <td>Qualification: </td>
                                    <td>
                                        <?php echo $row[6]; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Designation: </td>
                                    <td>
                                        <?php echo $row[5]; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Experience: </td>
                                    <td>
                                        <?php echo $row[7] . " Years"; ?>
                                    </td>
                                </tr>


                            </tbody>
                        </table>
                        <!-- </div> -->
                        <a href="change_hod.php?id=<?php echo $row[0]; ?>"
                            class="btn btn-block btn-raised btn-default btn-simple btn-round waves-effect" role="button"
                            onclick="return confirm('Are you sure you want to set  <?php echo $row[1]; ?> as HOD..?' );">
                            <i class="fa fa-graduation-cap" aria-hidden="true"></i>&nbsp;&nbsp;Set As HOD</a>

                    </div>

                </div>

            <?php } ?>

            <?php

        } else {
            echo "No results found.";
        }
        ?>
    </div>

</div>