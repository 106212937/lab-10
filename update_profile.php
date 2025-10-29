<?php
session_start();
include 'db.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
$new_email = $_POST['email'];

$sql = "UPDATE user SET email='$new_email' WHERE username='$username'";
if (mysqli_query($conn, $sql)) {
    header("Location: profile.php");
    exit();
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
?>
