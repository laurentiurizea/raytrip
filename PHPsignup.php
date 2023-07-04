<?php
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $country = $_POST['country'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'test');
    if ($conn->connect_error) {
        echo "$conn->connect_error";
        die("Connection Failed: " . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO registration(username, email, password, gender, phone, country) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $username, $email, $password, $confirm_password, $gender, $phone, $country);
        $execval = $stmt->execute();

        if ($execval) {
            echo "Înregistrare reușită.";
        } else {
            echo "Eroare la înregistrare: " . $conn->error;
        }

        $stmt->close();
        $conn->close();
    }
?>
