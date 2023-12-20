<?php

session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
}
elseif ($_SESSION['usertype']=='admin') {
    header("location:login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student home</title>

    <?php
    include'student_css.php';
    ?>

<style>   

#timetable {
    text-align: center;
    background: rgb(255, 205, 205);
    display: inline-block;
    justify-content: center;
}

th {
    background-color: rgb(255, 228, 205);
    border: 2px solid black;
    border-bottom: 8px solid black;
    border-collapse: collapse;
    padding: auto;
    height: 75px;
    font-size: large;
    text-align: center;
    width: 100px;
}

table {
    border: 8px solid black;
    border-collapse: collapse;
    background: rgb(207, 255, 135);
}

tr:nth-child(odd) {
    background-color: #ffa2df;
}

td {
    border: 2px solid black;
    border-collapse: collapse;
    padding: 5px;
}

.lunch {
    border: none;
    text-align: center;
    background: hsl(36, 100%, 73%);
    font-size: 25px;
}

.day {
    font-weight: bold;
    font-size: large;
    border-right: 8px solid black;
}

.free {
    background: rgb(207, 255, 135);
}

tr {
    background-color: hsl(296, 100%, 89%);
}

tr:hover {
    background: #d3aaff;
}

.grp2:hover {
    background: rgb(131, 255, 255);
}

</style>

</head>

<body>

    <?php
    include'<student_sidebar.php';
    ?>

    <div class="content">
        <center>
            <h1>Time Table</h1>

            <div id="timetable">
        <table>
            <tr>
                <th class="day">Day</th>
                <th>9:30 am</th>
                <th>10:20 am</th>
                <th>11:10 am</th>
                <th>12:00 am</th>
                <th>12:50 pm</th>
                <th>1:35 pm</th>
                <th>2:20 pm</th>
                <th>3:05 pm</th>
                <th>3:50 pm</th>
            </tr>
            <tr>
                <td rowspan="2" class="day">Monday</td>
                <td rowspan="2">WD</td>
                <td rowspan="2">DBMS</td>
                <td rowspan="2">OS</td>
                <td rowspan="2">SE</td>
                <td rowspan="10" class="lunch">Lunch Break</td>
                <td rowspan="2">DBMS</td>
                <td rowspan="2" class="free"></td>
                <td colspan="2">DBMS Lab G2</td>
            </tr>
            <tr class="grp2">
                <td colspan="2">SE Lab G1</td>
            </tr>
            <tr>
                <td rowspan="2" class="day">Tuesday</td>
                <td colspan="2">OS Lab G2</td>
                <td rowspan="2">SE</td>
                <td rowspan="2">OS</td>
                <td rowspan="2" class="free"></td>
                <td rowspan="2">DBMS</td>
            </tr>
            <tr class="grp2">
                <td colspan="2">DBMS Lab G1</td>
            </tr>
            <tr>
                <td rowspan="2" class="day">Wednesday</td>
                <td rowspan="2" class="free"></td>
                <td rowspan="2">WD</td>
                <td rowspan="2">SE</td>
                <td rowspan="2">OS</td>
                <td colspan="2">WD Lab G1</td>
            </tr>
            <tr class="grp2">
                <td colspan="2">DBMS Lab G2</td>
            </tr>
            <tr>
                <td rowspan="2" class="day">Thursday</td>
                <td>WD Lab G2</td>
                <td rowspan="2">WD</td>
                <td colspan="2">OS Lab G1</td>
                <td rowspan="2">DBMS</td>
                <td rowspan="2" class="free"></td>
                <td colspan="2">OS Lab G2</td>
            </tr>
            <tr class="grp2">
                <td>SE Lab G1</td>
                <td colspan="2">SE Lab G2</td>
                <td colspan="2">DBMS Lab G1</td>
            </tr>
            <tr>
                <td rowspan="2" class="day">Friday</td>
                <td colspan="2">OS Lab G1</td>
                <td rowspan="2">OS</td>
                <td rowspan="2" class="free"></td>
                <td rowspan="2">SE</td>
                <td rowspan="2" class="free"></td>
                <td> WD Lab G2</td>
            </tr>
            <tr class="grp2">
                <td colspan="2">SE Lab G2</td>
                <td>SE Lab G1</td>
            </tr>
        </table>
    </div>
        </center>



    </div>

</body>

</html>