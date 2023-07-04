<?php
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'test');
    if ($conn->connect_error) {
        echo "$conn->connect_error";
        die("Conexiune esuată: " . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO registration(username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $password);
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
