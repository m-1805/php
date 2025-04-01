<?php
$connection = mysqli_connect("localhost", "root", "", "dbcrud");
if (!$connection) die("Database Connection Failed: " . mysqli_connect_error());

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $address = mysqli_real_escape_string($connection, $_POST['address']);
    $mobile = mysqli_real_escape_string($connection, $_POST['mobile']);

    if (!empty($name) && !empty($address) && !empty($mobile)) {
        $stmt = mysqli_prepare($connection, "INSERT INTO student (name, address, mobile) VALUES (?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "sss", $name, $address, $mobile);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("Location: index.php");
        exit();
    } else {
        echo "All fields are required.";
    }
}
mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Add Student</h2>
    <form action="" method="post">
        Name: <input type="text" name="name" required><br>
        Address: <input type="text" name="address" required><br>
        Mobile: <input type="text" name="mobile" required><br>
        <button type="submit" name="submit">Add</button>
    </form>
    <a href="index.php">Back</a>
</div>
</body>
</html>
