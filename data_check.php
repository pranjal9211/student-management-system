<?php

session_start();

$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";
$data = mysqli_connect($host, $user, $password, $db);

if ($data === false) {
    die("Connection error");
}

if (isset($_POST['apply'])) {
    $data_name = $_POST['name'];
    $data_email = $_POST['email'];
    $data_phone = $_POST['phone'];
    $data_message = $_POST['message'];

    // Use prepared statement to prevent SQL injection
    $sql = "INSERT INTO admission (name, email, phone, message) VALUES (?, ?, ?, ?)";
    
    $stmt = mysqli_prepare($data, $sql);

    // Bind parameters
    mysqli_stmt_bind_param($stmt, "ssss", $data_name, $data_email, $data_phone, $data_message);

    // Execute the statement
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        $_SESSION['message'] = "Your application was sent successfully";
        header("location: index.php");
    } else {
        echo "Apply failed";
    }

    // Close the statement
    mysqli_stmt_close($stmt);
}

// Close the connection
mysqli_close($data);

?>
