<?php
session_start();
include 'db.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
$sql = "SELECT * FROM user WHERE username='$username'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);
?>

<h2>Welcome, <?php echo $user['username']; ?>!</h2>
<p><strong>Email:</strong> <?php echo $user['email']; ?></p>

<h3>Edit Profile</h3>
<form method="post" action="update_profile.php">
    <label>New Email:</label><br>
    <input type="email" name="email" value="<?php echo $user['email']; ?>" required><br><br>
    <input type="submit" value="Update Email">
</form>

<br>

