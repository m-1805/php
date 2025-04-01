<!DOCTYPE html>
<html>
<head>
    <title>PHP Array Operations</title>
    <style>body { font-family: Arial, sans-serif; text-align: center; background-color: green;}</style>
</head>
<body>
    <h1>PHP Array Operations</h1>
    <?php
    $original_fruits = ["Apple", "Banana", "Cherry", "Date", "Elderberry"];
    $fruits = $original_fruits;
    unset($fruits[1]);
    sort($fruits);
    ?>
    <p><strong>Original Array:</strong> <?= implode(", ", $original_fruits); ?></p>
    <p><strong>Sorted Array:</strong> <?= implode(", ", $fruits); ?></p>
    <p><strong>Array Length:</strong> <?= count($fruits); ?></p>
</body>
</html>