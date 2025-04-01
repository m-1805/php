<!DOCTYPE html>
<html>
<head><title>Rectangle Area Calculator</title></head>
<body>
    <h1>Rectangle Area Calculator</h1>
    <form method="post">
        <input type="number" name="l" placeholder="Length" required>
        <input type="number" name="w" placeholder="Width" required>
        <button type="submit">Calculate</button>
    </form>
    <?php
    if (!empty($_POST['l']) && !empty($_POST['w'])) {
        echo "<h2>Area: " . ($_POST['l'] * $_POST['w']) . "</h2>";
    }
    ?>
</body>
</html>
