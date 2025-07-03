<?php

if ($action === 'store' && !$param) {
    http_response_code(201);
    echo json_encode([
        'msg' => 'Action store'
    ]);
} else {
    http_response_code(404);
    echo json_encode([
        'msg' => 'Action desconhecida'
    ]);
}
