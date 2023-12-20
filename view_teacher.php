<?php

error_reporting(0);
session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
}
elseif ($_SESSION['usertype']=='student') {
    header("location:login.php");
}

$host="localhost";
$user="root";
$password="";
$db="schoolproject";
$data=mysqli_connect($host,$user,$password,$db);

$sql="SELECT * from teacher";
$result = mysqli_query($data, $sql) or die(mysqli_error()); 

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
        <center>
            <h1>View Teacher</h1>

            <?php
            if ( $_SESSION['message']) {
                echo '<p style="color: red;">' . $_SESSION['message'] . '</p>';
            }
            unset( $_SESSION['message']);
            ?>

            <table>
                <tr>
                    <th>Teacher name</th>
                    <th>About</th>
                    <th>Image</th>
                    <th>Delete teacher</th>
                    <th>Update teacher</th>
                </tr>
            
        

       
            <?php
            while($info=mysqli_fetch_assoc($result)){
                $name = $info["name"];
                $description = $info["description"];
                $image = $info["image"];
            
                echo "<tr>";
                echo '<td>' . $name . '</td>';
                echo '<td>' . $description . '</td>';
                echo '<td><img src='.$image.' alt="teacher_image" width="250px"></td>';

                echo '<td>';
                echo '<form action="delete.php" method="GET" onsubmit="return confirmDelete(\'' . $name . '\');">';
                echo '<input type="hidden" name="teacher_id" value="' . $info['id'] . '">';
                echo '<button type="submit" class="btn btn-danger" name="delete_teacher">DELETE</button>';
                echo '</form>';
                echo '</td>';


                echo '<td>';
                echo "<form action='update_teacher.php?teacher_id={$info['id']}' method='GET'>";
                echo '<input type="hidden" name="teacher_id" value="' . $info['id'] . '">';
                echo '<button type="submit" class="btn btn-success" >UPDATE</button>';
                echo '</form>';
                echo '</td>';
                
                echo "<tr>";

            
            ?>

            <?php
            }
            ?>
            </table>
        </center>
    </div>

    <script src="scripts.js"></script>


</body>

</html>