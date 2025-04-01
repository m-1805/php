<?php
$connection = mysqli_connect("localhost", "root", "", "dbcrud");
if (!$connection) die("Database Connection Failed: " . mysqli_connect_error());

if (isset($_GET['edit'])) {
    $id = intval($_GET['edit']);
    $result = mysqli_query($connection, "SELECT * FROM student WHERE id = $id");
    if ($row = mysqli_fetch_assoc($result)) {
        $name = $row['name'];
        $address = $row['address'];
        $mobile = $row['mobile'];
    } else {
        echo "Record not found!";
        exit;
    }
}

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $address = mysqli_real_escape_string($connection, $_POST['address']);
    $mobile = mysqli_real_escape_string($connection, $_POST['mobile']);

    $stmt = mysqli_prepare($connection, "UPDATE student SET name=?, address=?, mobile=? WHERE id=?");
    mysqli_stmt_bind_param($stmt, "sssi", $name, $address, $mobile, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("Location: index.php");
    exit();
}
mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Edit Student</h2>
    <form action="" method="post">
        Name: <input type="text" name="name" value="<?= htmlspecialchars($name) ?>" required><br>
        Address: <input type="text" name="address" value="<?= htmlspecialchars($address) ?>" required><br>
        Mobile: <input type="text" name="mobile" value="<?= htmlspecialchars($mobile) ?>" required><br>
        <button type="submit" name="submit">Update</button>
    </form>
    <a href="index.php">Back</a>
</div>
</body>
</html>
