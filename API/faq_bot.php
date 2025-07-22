<?php

// Check if the 'question' parameter exists
if(isset($_POST['question'])) {
    // Establish connection to your database
   include("connection.php");
    // Check connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    // Sanitize the input
    $question = $con->real_escape_string($_POST['question']);

    // Query to get the answer from the database based on the question
    $sql = "SELECT answer FROM faqs WHERE question = '$question'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // If the question is found, return the answer
        $row = $result->fetch_assoc();
        $answer = $row['answer'];
        echo json_encode(['answer' => $answer]);
    } else {
        // If the question is not found, return an error message
        echo json_encode(['error' => 'Question not found']);
    }

    // Close connection
    $conn->close();
} else {
    // If the 'question' parameter is not provided, return an error message
    echo json_encode(['error' => 'Question parameter is missing']);
}

?>
