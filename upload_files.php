<?php
require_once ("connection.php");
session_start();
if ($_SESSION['USER'] == "") {
    header("location:index.php");
} else {
    $fid = $_SESSION['ID'];
    if (isset ($_POST['action']) && $_POST['action'] == 'delete' && isset ($_POST['filename'])) {
        $filename = $_POST['filename'];
        $path = 'upload/files/' . $filename;

        if (file_exists($path)) {
            unlink($path); // Delete file from storage

            // Delete file entry from database
            $delete_query = "DELETE FROM upload_data WHERE file_name='$filename' AND fid=$fid";
            $con->query($delete_query);
        
            
        } else {
            echo "<script>alert('File not found.');</script>";
        }
        exit;
    }


    if (isset ($_POST['upload'])) {
        if (isset ($_FILES['file'])) {
            $errors = [];
            $uploadedFiles = [];
            // $extension = ['jpeg', 'jpg', 'png', 'gif', 'pdf', 'txt']; // Allowed file types

            $path = 'upload/files/';
            $total = count($_FILES['file']['name']);

            for ($i = 0; $i < $total; $i++) {
                $file_name = $_FILES['file']['name'][$i];
                $file_tmp = $_FILES['file']['tmp_name'][$i];
                      $file_name = str_replace(' ', '_', $file_name);
                // $file_type = $_FILES['file']['type'][$i];
                $file_size = $_FILES['file']['size'][$i];
                // $file_ext = strtolower(end(explode('.', $_FILES['file']['name'][$i])));

                // if (!in_array($file_ext, $extension)) {
                //     $errors[] = "Extension not allowed: $file_name";
                // }

                if ($file_size > 20971520) { // 20MB in bytes
                    $errors[] = "$file_name exceeds the maximum upload size (20MB)";

                }

                if (empty ($errors)) {
                    move_uploaded_file($file_tmp, $path . $file_name);
                    $query = "INSERT INTO upload_data (file_name, fid) VALUES ('$file_name', $fid)";
                    $con->query($query);
                    $uploadedFiles[] = $file_name;
                }
            }

            if ($errors)
                echo "<script>alert('File size must be lessthan or equal to 20 mb')</script>";
        }

    }
    

    ?>
    <!doctype html>
    <html class="no-js " lang="en">

    <!-- Mirrored from thememakker.com/templates/oreo/university/html/students.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Dec 2023 15:37:36 GMT -->

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

        <title>Progress Pilot</title>
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <!-- Favicon-->
        <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
        <link href="assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
        <!-- Custom Css -->
        <link rel="stylesheet" href="assets/css/main.css">
        <link rel="stylesheet" href="assets/css/color_skins.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            #sp1 {
                display: inline-block;
                width: 80%;
                overflow: hidden;
                white-space: nowrap;
                text-overflow: ellipsis;
            }

            .upload-zone {
                border: 2px dashed #c8ced3;
                background-color: #f8f9fa;
                width: 50%;
                padding: 20px;
                cursor: pointer;
                text-align: center;
                border-radius: 10px;
                transition: all 0.3s ease;
            }

            .upload-zone:hover {
                background-color: #e9ecef;
            }

            .upload-zone-icon {
                font-size: 48px;
                color: #adb5bd;
                margin-bottom: 10px;
            }

            .upload-zone-text {
                font-size: 18px;
                color: #495057;
            }

            .file-input {
                display: none;
            }

            .file-container {
                margin-top: 20px;
            }

            .file-item {
                margin-bottom: 10px;
                padding: 10px;
                background-color: #f8f9fa;
                border: 1px solid #ced4da;
                border-radius: 5px;
                position: relative;
            }

            .file-name {
                margin-bottom: 5px;
            }

            .delete-icon {
                position: absolute;
                top: 5px;
                right: 5px;
                cursor: pointer;
            }

            .delete-icon:hover {
                color: red;
            }
        </style>

    </head>

    <body class="theme-blush">
        <!-- Page Loader -->
        <div class="page-loader-wrapper">
            <div class="loader">
                <div class="m-t-30"><img class="zmdi-hc-spin" src="assets/images/logo.svg" width="48" height="48"
                        alt="Oreo"></div>
                <p>Please wait...</p>
            </div>
        </div>
        <!-- Overlay For Sidebars -->
        <div class="overlay"></div>
        <!-- Top Bar -->
        <?php include "navbar.php"; ?>
        <!-- Left Sidebar -->
        <?php
        if ($_SESSION["USER"] == "ADMIN") {

            include "adminsidebar.php";

        } elseif ($_SESSION["USER"] == "HEAD") {

            include "hodsidebar.php";

        } elseif ($_SESSION["USER"] == "FACULTY") {

            include "sidebar.php";

        }
        ?>
        <!-- Chat-launcher -->


        <section class="content profile-page">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12">
                        <h2>Upload Files
                            <small class="text-muted">Welcome to Progress Pilot</small>
                        </h2>
                    </div>
                    <div class="col-lg-5 col-md-6 col-sm-12">


                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <form method="post" enctype="multipart/form-data">

                    <div class="row">
                        <div class="col-md-12 mx-0 ">
                            <div class="card">
                                <div class="card-header">
                                    <h2>Upload Files</h2>
                                </div>
                                <div class="card-body">
                                    <label class="upload-zone" for="fileInput">
                                        <i class="fas fa-cloud-upload-alt upload-zone-icon"></i>
                                        <div class="upload-zone-text" id="fileNames">Click To Select Multiple Files
                                        </div>
                                    </label>
                                    <input type="file" id="fileInput" class="file-input" name="file[]" multiple
                                        onchange="displaySelectedFiles()" >
                             <input type="submit" id="upload" name="upload" class="btn btn-primary float-right" value="Upload" name="upload" disabled>

                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <?php
                    $query = "SELECT * FROM upload_data WHERE fid=$fid";
                    $result = $con->query($query);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="col-md-4">';
                            echo '<div class="card">';
                            echo '<div class="card-body">';
                            echo '<h5 class="card-title" id="sp1">' . $row['file_name'] . '</h5>';
                            echo '<a href="upload/files/' . $row['file_name'] . '" class="btn btn-success" target="_blank">Download</a>';
                            echo '<button class="btn btn-danger delete-file" data-filename="' . $row['file_name'] . '">Delete</button>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }
                    } else { ?>
                        <center>

                            <div class="card">
                                <div class="body">
                                    <?php echo "<h6>No File Uploded Yet By You</h6>"; ?>
                                </div>
                            </div>

                        </center>
                    <?php }
                    ?>
                </div>
            </div>
        </section>
        <!-- Jquery Core Js -->
        <script src="assets/bundles/libscripts.bundle.js"></script> <!-- Bootstrap JS and jQuery v3.2.1 -->
        <script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- slimscroll, waves Scripts Plugin Js -->
        <script src="assets/bundles/datatablescripts.bundle.js"></script>

        <script src="assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
        <script src="assets/js/pages/tables/jquery-datatable.js"></script>
       <script>
    function displaySelectedFiles() {
        const fileInput = document.getElementById('fileInput');
        const fileNamesContainer = document.getElementById('fileNames');
        const uploadButton = document.getElementById('upload');
        let fileNames = '';
        for (let i = 0; i < fileInput.files.length; i++) {
            fileNames += fileInput.files[i].name;
            if (i < fileInput.files.length - 1) {
                fileNames += ', ';
            }
        }
        fileNamesContainer.textContent = fileNames;

        // Enable/disable upload button based on whether files are selected
        if (fileInput.files.length > 0) {
            uploadButton.disabled = false;
         
        } else {
            uploadButton.disabled = true;
         
        }
    }
</script>
        <script>
            $(document).ready(function () {
                $('.delete-file').on('click', function () {
                    var filename = $(this).data('filename');
                    var confirmation = confirm('Are you sure you want to delete ' + filename + '?');
                    if (confirmation) {
                        $.ajax({
                            type: 'POST',
                            url: '',
                            data: { action: 'delete', filename: filename },
                            success: function (response) {
                                alert(response);
                                location.reload();
                            }
                        });
                    }
                });
            });
        </script>
    </body>

    <!-- Mirrored from thememakker.com/templates/oreo/university/html/students.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Dec 2023 15:37:36 GMT -->

    </html>
<?php } ?>