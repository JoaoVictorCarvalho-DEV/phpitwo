<?php

/* api/action/param */

if (isset($parts[0])) {
    $api = $parts[0];
} else {
    echo "Caminho vazio";
    exit;
}

$action = isset($parts[1]) ? $parts[1] : "";
$param = isset($parts[2]) ? $parts[2] : "";



require_once 'config/Database.php';

/* ROTA DE POSTOS */
require_once 'api/postos/postos.php';
