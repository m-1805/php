<!DOCTYPE html>
<html>
<head><title>PHP String & Date</title></head>
<body>
    <h1>String & Date Manipulation</h1>
    <h2>String Manipulation</h2>
    <pre>
    <?php
    $str = "Hello, World!";
    echo "Upper: " . strtoupper($str) . "\n";
    echo "Lower: " . strtolower($str) . "\n";
    echo "Trimmed: " . trim($str) . "\n";
    echo "Replaced: " . str_replace("World", "PHP", $str) . "\n";
    ?>
    </pre>
    <hr>
    <h2>Date Manipulation</h2>
    <pre>
    <?php
    echo "Now: " . date("Y-m-d H:i:s") . "\n";
    $date = date_create("2024-12-12");
    echo "Parsed: " . date_format($date, "Y-m-d") . "\n";
    date_add($date, date_interval_create_from_date_string("30 days"));
    echo "Added: " . date_format($date, "Y-m-d") . "\n";
    echo "Formatted: " . date("l, F d, Y", strtotime("2022-07-25")) . "\n";
    ?>
    </pre>
</body>
</html>