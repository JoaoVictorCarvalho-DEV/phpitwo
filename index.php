<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');
date_default_timezone_set('America/Sao_Paulo');

$path = $_GET['path'] ?? '';

$parts = explode('/', $path);
$method = $_SERVER['REQUEST_METHOD'];
require_once 'api.php';
