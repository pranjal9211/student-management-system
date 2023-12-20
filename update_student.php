<?php

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

$id=$_GET['student_id'];
$sql="SELECT * FROM user WHERE id='$id' ";

$result=mysqli_query($data,$sql);

while($row=mysqli_fetch_assoc($result)){
    $name = $row["username"];
    $email = $row["email"];
    $phone = $row["phone"];
    $course = $row["course"];
    $password = $row["password"];
}

if (isset($_POST['update'])) {
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $course=$_POST['course'];
    $password=$_POST['password'];
    
  // Validate inputs
  if (empty($name) || empty($email) || empty($phone) || empty($password) || empty($course)) {
    echo "<script>alert('Please fill in all fields.');</script>";
} elseif (!is_numeric($phone)) {
    echo "<script>alert('Please enter a valid phone number (numeric characters only).');</script>";
} else {
    // Check if the username already exists
    $checkUsernameQuery = "SELECT id FROM user WHERE username='$name' AND id != '$id'";
    $result = mysqli_query($data, $checkUsernameQuery);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Username already exists. Please choose another username.');</script>";
    } else {
        // Update the data
        $query = "UPDATE user SET username='$name', email='$email', phone='$phone', course='$course', password='$password' WHERE id='$id'";

        $result2 = mysqli_query($data, $query);

        if (!$result2) {
            echo "Error in updating data: " . mysqli_error($data);
        } else {
            echo "<script>alert('Data updated successfully');</script>";
            echo '<script>window.location.href = "view_student.php";</script>'; // Redirect using JavaScript
            echo '<meta http-equiv="refresh" content="0">'; // Refresh the page after 1 second.
        }
    }
}

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student update</title>

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
            <h1>Update Student</h1>

            <div class="div_deg"> 
                <form action="#" method="POST">

                <div>
                    <label for="name">Name : </label>
                    <input type="text" id="name" name="name" placeholder="Enter Your Name" value="<?php echo $name; ?>" required/>
                </div>
                <div>
                    <label for="email">Email : </label>
                    <input type="email" id="email" name="email" placeholder="Enter Your E-mail" 
                    value="<?php echo $email;?>" required />
                </div>
                <div>
                    <label for="phone">Phone : </label>
                    <input type="tel" id="phone" name="phone" title="Enter in the format 123-45678" placeholder="Enter Phone Number" value="<?php echo $phone;?>" required/>
                </div>
                <div>
                    <label for="course">Course : </label>
                    <input type="text" id="course" name="course" placeholder="Enter Your Course" value="<?php echo $course;?>" required/>
                </div>
                <div>
                    <label for="password">Password :</label>
                    <input type="text" id="password" name="password" placeholder="Enter password"  
                    value="<?php echo $password;?>" required/>
                </div>
                <div>
                    <input type="submit" name="update" value="UPDATE STUDENT" class="btn btn-success">
                </div>
            </div>

        </center>
    </div>

</body>

</html>