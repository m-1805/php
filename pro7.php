<!DOCTYPE html>
<html>
<head><title>PHP File Operations</title></head>
<body>
    <h1>File Operations</h1>
    <form method="POST">
        <select name="operation" required>
            <option value="write">Write</option>
            <option value="append">Append</option>
            <option value="read">Read</option>
            <option value="delete">Delete</option>
        </select>
        <br><br>
        <textarea name="content" rows="4" cols="40" placeholder="Enter content"></textarea>
        <br><br>
        <button type="submit">Perform</button>
    </form>

    <?php
    $file = "example.txt";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $op = $_POST['operation'];
        $content = $_POST['content'] ?? '';

        if ($op == "write" && !empty($content)) file_put_contents($file, $content);
        elseif ($op == "append" && !empty($content)) file_put_contents($file, $content, FILE_APPEND);
        elseif ($op == "read" && file_exists($file)) echo "<pre>" . file_get_contents($file) . "</pre>";
        elseif ($op == "delete" && file_exists($file)) unlink($file);
        else echo "<p>Invalid operation or missing content.</p>";
    }
    ?>
</body>
</html>
