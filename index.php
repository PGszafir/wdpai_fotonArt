<?php
require 'Routing.php';
#echo 'Hi there 👋';

$path = trim($_SERVER['REQUEST_URI'],'/');
$path = parse_url($path,PHP_URL_PATH);

Routing::get('index','DefaultController');
Routing::get('projects','ProjectController');
Routing::get('profile','DefaultController');
Routing::post('register','DefaultController');
Routing::post('login','SecurityController');
Routing::post('addProject','ProjectController');

Routing::run($path);