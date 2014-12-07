<?php

$myFile = "projects.txt";
$fh = fopen($myFile, 'a');
$stringData = $_GET['name'];
fwrite($fh, $stringData);
fwrite($fh, "\t");
fwrite($fh, $stringData);
fwrite($fh, "\n");
fclose($fh);

?>