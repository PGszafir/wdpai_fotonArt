<?php
require 'Routing.php';
#echo 'Hi there 👋';

$path = trim($_SERVER['REQUEST_URI'],'/');
$path = parse_url($path,PHP_URL_PATH);

Routing::get('index','DefaultController');
Routing::get('projects','DefaultController');
Routing::run($path);