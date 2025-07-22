<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "project";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the required parameters are present
if(isset($_POST['sender_id'], $_POST['receiver_id'], $_POST['message_content'])) {
    $sender_id = $_POST['sender_id'];
    $receiver_id = $_POST['receiver_id'];
    $message_content = $_POST['message_content'];

    // Insert message into the database
    $sql = "INSERT INTO messages (sender_id, receiver_id, message_content) VALUES ('$sender_id', '$receiver_id', '$message_content')";
    if ($conn->query($sql) === TRUE) {
        echo "Message sent successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Required parameters missing";
}

$conn->close();
?>
