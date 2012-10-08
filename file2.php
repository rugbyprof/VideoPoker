<?php
session_start();

echo"<pre>";
print_r($_SESSION);
$_SESSION['bet'] *= 2;