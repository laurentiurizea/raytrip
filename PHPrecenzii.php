<?php
    $name = $_POST['name'];
    $rating = $_POST['rating'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'test');
    if ($conn->connect_error) {
        echo "$conn->connect_error";
        die("Connection Failed: " . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO registration(name, rating) VALUES (?, ?)");
        $stmt->bind_param("sd", $name, $rating);
        $execval = $stmt->execute();

        if ($execval) {
            echo "Registration successfully...";
        } else {
            echo "Error in registration: " . $conn->error;
        }

        $stmt->close();
        $conn->close();
    }
?>
