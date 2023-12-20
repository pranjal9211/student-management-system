<?php

session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
}
elseif ($_SESSION['usertype']=='student') {
    header("location:login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <?php
    include 'admin_css.php';
    ?>

</head>

<body>

    <?php
    include 'admin_sidebar.php';
    ?>

<div class="content">   
    <div class="container-fluid">
        <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>

        <div class="default-admin-photo"></div>
        
        <!-- Add your admin dashboard content here -->
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Your Admin Dashboard
                    </div>
                    <div class="card-body">
                        <!-- Add your content here -->
                        <p>This is the admin dashboard content.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>