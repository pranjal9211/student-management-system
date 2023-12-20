<?php

session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
}
elseif ($_SESSION['usertype']=='admin') {
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
    include 'student_sidebar.php';
    ?>

    <div class="content">
        <center>
            <h1>View teacher</h1>

            <table>
                <tr>
                    <th>Teacher</th>
                    <th>About</th>
                    <th>Image</th>
                </tr>
            
        

       
            <?php
            while($info=mysqli_fetch_assoc($result)){
                $name = $info["name"];
                $about = $info["description"];
                $image = $info["image"];
            
                echo "<tr>";
                echo '<td>' . $name . '</td>';
                echo '<td>' . $about . '</td>';
                echo '<td><img src='.$image.' alt="course_image" width="250px"></td>';                
                echo "<tr>";            
            ?>

            <?php
            }
            ?>
            </table>
        </center>
    </div>



</body>

</html>