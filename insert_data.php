<?php
require ("core/db_conn.php");

$fname = $_POST["f_name"];
$lname = $_POST["l_name"];
$age = $_POST["age"];


$query = "INSERT INTO `students`(`first_name`, `last_name`, `age`) VALUES ('$fname','$lname','$age')";
$result = mysqli_query($connection, $query);
header("location: index.php");


if (!$result) {
    echo "Query Failed";
} else {
    echo "Success";
}
