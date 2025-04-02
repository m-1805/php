<?php
session_start();
// Check if the user is logged in
if (!isset($_SESSION['username'])) {
 header('Location: login.php'); // Redirect to login page if not logged in
 exit();
}
$username = $_SESSION['username']; // Get logged-in username
?>
<!DOCTYPE html>
<html>
<head>
 <title>Dashboard</title>
</head>
<body>
 <h2>Welcome, <?php echo htmlspecialchars($username); ?>! </h2>
 <p>You have successfully logged in.</p>

 <!-- Logout Button -->
 <form action="logout.php" method="post">
 <input type="submit" name="logout" value="Logout">
 </form>
</body>
</html>
logout.php
<?php
session_start();
session_destroy(); // Destroy all session data
header('Location: username.php'); // Redirect to login page
exit();
?>
