<?php
$connection = mysqli_connect("localhost", "root", "", "dbcrud");
if (!$connection) die("Database Connection Failed: " . mysqli_connect_error());

if (isset($_GET['del'])) {
    $id = intval($_GET['del']);
    $stmt = mysqli_prepare($connection, "DELETE FROM student WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}
mysqli_close($connection);
header("Location: index.php");
exit();
?>
