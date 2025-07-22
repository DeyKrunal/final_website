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
$query = "SELECT * FROM group_stud_tbl";
if (!empty($search)) {
    $query .= " WHERE name1 LIKE '%$search%' OR name2 LIKE '%$search%' OR name3 LIKE '%$search%' OR name4 LIKE '%$search%' OR gsid LIKE '%$search%' OR div1 LIKE '%$search%' OR div2 LIKE '%$search%' OR div3 LIKE '%$search%' OR div4 LIKE '%$search%' OR rn1 LIKE '%$search%' OR rn2 LIKE '%$search%' OR rn3 LIKE '%$search%' OR rn4 LIKE '%$search%'";
}


// Execute the query
$res = mysqli_query($con, $query);

// Check if there are any results
 ?>
         <style>
            #sp1 {
                display: inline-block;
                width: 150px;
                overflow: hidden;
                white-space: nowrap;
                text-overflow: ellipsis;
            }
        </style>
        <div class="container-fluid mt-3" id="studentContainer">
                            <div class="row clearfix">
                          <?php
                          if(mysqli_num_rows($res) > 0) {
                            // Loop through results and display them
                            while ($row = mysqli_fetch_array($res)) {
                          ?>
                                <div class="col-md-5 col-lg-3" >
                                    <div class="card bg-light">
                                        <div class="body" >
                                            <img src="upload/<?php echo $row['image'];?>" alt="grp image" style="height:150px;width:200px;" class="img-fluid rounded m-b-20">
                                                 
                                            <center>   <h6><?php echo "GROUP ".$row['gsid']; ?></h6></center>
                                            <!-- <div class="table-responsive"> -->

                                            <table class="table table-hover js-basic-examples #00ced1 m-b-0">
                                            <tbody>
                                                <tr>
                                                    <td>1st name:</td>
                                                    <td id="sp1">
                                                        <?php echo $row['name1'] ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2nd name:</td>
                                                    <td id="sp1">
                                                        <?php echo $row['name2'] ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>3th name:</td>
                                                    <td id="sp1">
                                                        <?php echo $row['name3'] ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>4th name:</td>
                                                    <td id="sp1">
                                                        <?php echo $row['name4'] ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            </table>
                                            <!-- </div> -->
                                            <a href="update_group.php?gid=<?php echo $row['gsid'];?>"
                                                    class="btn btn-block btn-raised btn-default btn-simple btn-round waves-effect"
                                                    role="button">Manage Group Details</a>
                                        </div>
                                    </div>
                                </div>
                           <?php }?>
                        </div>
                    
        </div>
        <?php
    
} else {
    echo "No results found.";
}
?>
