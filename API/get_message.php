<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "project";

$conn = new mysqli($servername, $username, $password, $database);
// Include database connection code

// Check if the required parameters are present
if(isset($_GET['sender_id'], $_GET['receiver_id'])) {
    $sender_id = $_GET['sender_id'];
    $receiver_id = $_GET['receiver_id'];

    // Retrieve messages from the database
    $query = "SELECT * FROM messages WHERE (sender_id = '$sender_id' AND receiver_id = '$receiver_id') OR (sender_id = '$receiver_id' AND receiver_id = '$sender_id')";
    $result = mysqli_query($conn, $query);

    $messages = array();

    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $messages[] = $row;
        }
        echo json_encode(array("status" => "success", "messages" => $messages));
    } else {
        echo json_encode(array("status" => "error", "message" => "No messages found"));
    }
} else {
    echo json_encode(array("status" => "error", "message" => "Required parameters missing"));
}
?>
