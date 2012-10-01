<?php

$dir = scandir(".");

array_shift($dir);
array_shift($dir);

natsort($dir);

foreach ($dir as $file){
echo "<img src=$file><br>";
}