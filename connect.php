<?php
    $Username = $_POST['Username'];
    $password = $_POST['Password'];

    // Database connection
    $conn = new mysqli('localhost', 'u115385445_root', 'o!:wRNK7E6', 'login');
    if ($conn->connect_error) {
        echo "$conn->connect_error";
        die("Connection Failed : " . $conn->connect_error);
    } else {
        // Prepare and bind the statement
        $stmt = $conn->prepare("INSERT INTO Contact(Username,Password,Date) VALUES (?, ?, ?, ?, ?,current_timestamp())");
        $stmt->bind_param("ss", $Username, $Password);

        // Execute the statement
        $execval = $stmt->execute();

        // Check for errors
        if ($stmt->error) {
            die("Execute failed: " . $stmt->error);
        }

        // Making alert
        echo '<script>alert("Thanks")</script>'; 

        // Close the statement and connection
        $stmt->close();
        $conn->close();

        // include "index.html";
    }
?>