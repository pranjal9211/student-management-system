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

$name=$_SESSION['username'];
$sql="SELECT * FROM user WHERE username ='$name' ";

$result=mysqli_query($data,$sql);

while($row=mysqli_fetch_assoc($result)){
    $name = $row["username"];
    $email = $row["email"];
    $phone = $row["phone"];
    $password = $row["password"];
}

if (isset($_POST['update'])) {
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $password=$_POST['password'];
    
  // Validate inputs
  if (empty($email) || empty($phone) || empty($password)) {
    echo "<script>alert('Please fill in all fields.');</script>";
} elseif (!is_numeric($phone)) {
    echo "<script>alert('Please enter a valid phone number (numeric characters only).');</script>";
} else {
    $query = "UPDATE user SET email='$email', phone='$phone', password='$password' WHERE username ='$name'";

    $result2 = mysqli_query($data, $query);
        if (!$result2) {
            echo "Error in updating data: " . mysqli_error($data);
        } else {
            echo "<script>alert('Data updated successfully');</script>";
            echo '<script>window.location.href = "student_profile.php";</script>'; // Redirect using JavaScript
            echo '<meta http-equiv="refresh" content="0">'; // refresh the page after 1 second.
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student profile</title>
    <link rel="stylesheet" href="form.css">


    <?php
    include'student_css.php';
    ?>

<style>
  .greeting {
    padding-bottom: 28px;
    color: #2c3e50;
    font-size: 28px;
    font-weight: bolder; /* Adding font-weight for emphasis */
  }
</style>


</head>

<body>

    <?php
    include'student_sidebar.php';
    ?>

    <div class="content">

    <center>
            <h1>Student Profile</h1>

            <div class="div_deg"> 
                <form action="#" method="POST">

                <?php
                echo "<p class='greeting'> Hi! " . $name . "</p>";
                ?>
                

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