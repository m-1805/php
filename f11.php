<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'FruitsDb');
if ($conn->connect_error) die('Connection Failed: ' . $conn->connect_error);
if (isset($_POST['submit'])) {
 $item = $_POST['item'];
 setcookie('selected_item', $item, time() + (86400 * 30), '/'); // Cookie valid for 30 days
 header('Location: display.php');
 exit();
}
?>
<!DOCTYPE html>
<html>
<head><title>Fruits and Vegetables</title></head>
<body>
<h2>Select a Fruit or Vegetable</h2>
<form method="post">
 <select name="item" required>
 <option value="Apple">Apple</option>
 <option value="Banana">Banana</option>
 <option value="Carrot">Carrot</option>
 <option value="Spinach">Spinach</option>
 </select><br>
 <input type="submit" name="submit" value="Submit">
</form>
</body>
</html>

