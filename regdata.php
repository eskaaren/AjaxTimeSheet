<?php
$myFile = "hours.txt";
$fh = fopen($myFile, 'a');
$proj = $_GET['project'];
$date = $_GET['date'];
$hours = $_GET['hours'];
fwrite($fh, $proj);
fwrite($fh, "\t");
fwrite($fh, $date);
fwrite($fh, "\t");
fwrite($fh, $hours);
fwrite($fh, "\n");
fclose($fh);
?>