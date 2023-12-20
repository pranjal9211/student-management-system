<?php

session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
} elseif ($_SESSION['usertype'] == 'student') {
    header("location:login.php");
}

$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";
$data = mysqli_connect($host, $user, $password, $db);

if (isset($_POST['add_student'])) {
    $username = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $usertype = "student";

    // Validate inputs
    if (empty($username) || empty($email) || empty($phone) || empty($password)) {
        $_SESSION['validation_message'] = 'Please fill in all fields.';
    } else {
        $check = "SELECT * FROM user WHERE username='$username'";
        $check_user = mysqli_query($data, $check);

        $row_count = mysqli_num_rows($check_user);
        if ($row_count == 1) {
            $_SESSION['validation_message'] = 'Username already exists';
        } else {
            $sql = "INSERT INTO user(username, phone, email, usertype, password) VALUES('$username','$phone','$email','$usertype','$password')";

            $result = mysqli_query($data, $sql) or die(mysqli_error());

            if ($result) {
                $_SESSION['success_message'] = 'Student Added Successfully';
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($data);
            }
        }
    }

    // Redirect after processing the form
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
}

// Display validation and success messages
if (isset($_SESSION['validation_message'])) {
    echo "<script>alert('".$_SESSION['validation_message']."');</script>";
    unset($_SESSION['validation_message']); // Clear the session variable
}

if (isset($_SESSION['success_message'])) {
    echo "<script>alert('".$_SESSION['success_message']."');</script>";
    unset($_SESSION['success_message']); // Clear the session variable
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="form.css">

    <?php
    include 'admin_css.php';
    ?>

</head>

<body>

    <?php
    include 'admin_sidebar.php';
    ?>

    <div class="content">
        <center>

            <h1>Add Student</h1>

            <div class="div_deg">
                <form action="#" method="POST" enctype="multipart/form-data">
                    <div>
                        <label for="name">Name : </label>
                        <input type="text" id="name" name="name">
                        </div>
                    <div>
                        <label for="email">Email : </label>
                        <input type="email" id="email" name="email">
                    </div>
                    <div>
                        <label for="phone">Phone : </label>
                        <input type="tel" id="phone" name="phone">
                    </div>
                    <div>
                        <label for="password">Password : </label>
                        <input type="password" id="password" name="password">
                    </div>
                    <div>
                        <input type="submit" value="ADD" class="btn btn-success"name="add_student">
                    </div>
            </div>
            
        </center>
    </div>

</body>

</html>