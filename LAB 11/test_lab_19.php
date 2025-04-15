<?php
$x = $_GET['x'];
$y = $_GET['y'];
$z = sin($x) + acos($y) - sqrt($x * $y);

// Логування результату в файл
$log = "При x=$x, y=$y, результат = $z\n";
file_put_contents('log.txt', $log, FILE_APPEND);

echo "Результат: $z";
?>
