<?php
require 'Routing.php';
//echo 'Hi there 👋';
$path = $_SERVER['REQUEST_URI'];
$path = trim($path,'/');
$path = parse_url($path,PHP_URL_PATH);
Router::run($path);