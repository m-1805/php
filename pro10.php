<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'employee');

if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
}

// Function to sanitize input data
function clean_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Handle form submission
if (isset($_POST['submit'])) {
    $name = clean_input($_POST['name']);
    $email = clean_input($_POST['email']);
    $phone = clean_input($_POST['phone']);
    $address = clean_input($_POST['address']);
    $position = clean_input($_POST['position']);

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format!";
        exit();
    }

    // Validate phone number (10-15 digits)
    if (!preg_match('/^\d{10,15}$/', $phone)) {
        echo "Invalid phone number! It must be 10-15 digits.";
        exit();
    }

    // Prepare the SQL statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO users (name, email, phone, address, position) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $phone, $address, $position);

    if ($stmt->execute()) {
        echo 'Employee information saved successfully!';
    } else {
        echo 'Error: ' . $stmt->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Information</title>
</head>
<body>
    <h2>Employee Personal Information</h2>
    <form method="post">
        <input type="text" name="name" placeholder="Full Name" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="text" name="phone" placeholder="Phone Number" required><br>
        <input type="text" name="address" placeholder="Address" required><br>
        <input type="text" name="position" placeholder="Position" required><br>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>
