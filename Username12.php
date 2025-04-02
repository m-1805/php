<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'userDb');
if ($conn->connect_error) die('Connection Failed: ' . $conn->connect_error);
if (isset($_POST['login'])) {
 $username = $_POST['username'];
 $password = $_POST['password'];
 $result = $conn->query("SELECT * FROM users WHERE username='$username' AND
password='$password'");
 if ($result->num_rows > 0) {
 $_SESSION['username'] = $username;
 header('Location: dashboard.php');
 exit();
 } else {
 echo 'Invalid username or password!';
 }}
?>
<!DOCTYPE html>
<html>
<head><title>Login Page</title></head>
<body>
<h2>Login</h2>
<form method="post">
 <input type="text" name="username" placeholder="Username" required><br>
 <input type="password" name="password" placeholder="Password" required><br>
 <input type="submit" name="login" value="Login">
</form>
</body>
</html>
