<?php
$connection = mysqli_connect("localhost", "root", "", "dbcrud");
if (!$connection) {
    die("Database Connection Failed: " . mysqli_connect_error());
}

$result = mysqli_query($connection, "SELECT * FROM student");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student CRUD Application</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Student CRUD Application</h2>
    <a href="add.php" class="add-btn">Add New</a>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Address</th>
                <th>Mobile</th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td><?= htmlspecialchars($row['name']); ?></td>
                    <td><?= htmlspecialchars($row['address']); ?></td>
                    <td><?= htmlspecialchars($row['mobile']); ?></td>
                    <td>
                        <a href="edit.php?edit=<?= $row['id']; ?>" class="edit-btn">Edit</a>
                        <a href="delete.php?del=<?= $row['id']; ?>" class="delete-btn" onclick="return confirm('Are you sure?');">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>

<?php mysqli_close($connection); ?>
