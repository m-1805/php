<?php

echo "Uasge of if statment <br>";
$temperature = 30;
if ($temperature > 25) {
echo "It's a hot day! Stay hydrated.<br>";
}

echo"<br><br>";


echo"usage of if else statment<br>";
$hour = date("H");
if ($hour < 12) {
echo "Good morning!<br>";
} else {
echo "Good afternoon!<br>";
}
echo"<br><br>";

echo "Uasge of For Loop <br>";
$sum = 0;
for ($i = 1; $i <= 5; $i++) {
$sum += $i; 
}
echo "Sum: $sum<br>";
echo "<br><br>";


echo "Useage of While Loop <br>";
$count = 5;
while ($count > 0) {
echo $count . "<br>";
$count--;
}

?>

