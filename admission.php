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

$sql = "SELECT * FROM admission";
$result = mysqli_query($data, $sql) or die(mysqli_error());
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission</title>

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

            <h1>Admission Forms</h1>

            <?php
            // Check if 'message' is set in $_SESSION
            if (isset($_SESSION['message'])) {
                echo '<p style="color: red;">' . $_SESSION['message'] . '</p>';
                unset($_SESSION['message']);
            }
            ?>

            <!-- Button container for Print and Delete buttons -->
            <div class="button-container">
                <!-- Add a print button -->
                <button id="printButton" class="btn btn-success" onclick="printTable()">Print</button>

                <!-- Add a delete button -->
                <form action="delete.php" method="GET" onsubmit="return confirmDelete()">
                    <button type="submit" name="admission_delete" class="btn btn-danger">Delete All Admission Data</button>
                </form>
            </div>

            <div id="printContent">
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Message</th>
                    </tr>

                    <?php
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo '<td>' . $row['name'] . "</td>";
                        echo '<td>' . $row['email'] . "</td>";
                        echo '<td>' . $row['phone'] . "</td>";
                        echo '<td>' . $row['message'] . "</td>";
                        echo " </tr>";
                    }
                    ?>

                </table>
            </div>
        </center>
    </div>

    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete all admission data?");
        }

        function printTable() {
            var printContent = document.getElementById("printContent");

            // Create a new window for printing
            var printWindow = window.open('', '_blank');
            
            // Write the content of the printContent div to the new window
            printWindow.document.write('<html><head><title>Print</title>');
            printWindow.document.write('</head><body>');
            printWindow.document.write(printContent.innerHTML);
            printWindow.document.write('</body></html>');

            // Close the document to ensure the content is fully loaded
            printWindow.document.close();

            // Wait for a short delay before printing
            setTimeout(function() {
                // Print and close the new window
                printWindow.print();
                printWindow.close();
            }, 1000); // You can adjust the delay time (in milliseconds) as needed
        }
    </script>

</body>

</html>
