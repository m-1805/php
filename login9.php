<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'login');

if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
}

// Signup logic
if (isset($_POST['signup'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Hash the password for security
    $hashed_pass = password_hash($pass, PASSWORD_BCRYPT);

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $user, $hashed_pass);

    if ($stmt->execute()) {
        echo 'Signup successful!';
    } else {
        echo 'Error: Username already exists!';
    }

    $stmt->close();
}

// Login logic
if (isset($_POST['login'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Fetch user data securely
    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($hashed_pass);
    $stmt->fetch();

    if ($stmt->num_rows > 0 && password_verify($pass, $hashed_pass)) {
        $_SESSION['username'] = $user;
        header('Location: login_success.html');
        exit();
    } else {
        echo 'Invalid login!';
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup & Login</title>
</head>
<body>
    <h2>Signup</h2>
    <form method="post">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <input type="submit" name="signup" value="Signup">
    </form>

    <h2>Login</h2>
    <form method="post">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <input type="submit" name="login" value="Login">
    </form>
</body>
</html>
