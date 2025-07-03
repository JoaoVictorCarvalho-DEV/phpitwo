<?php

if ($action === 'index' && !$param) {
    $postos = new PostoController();
    $postos->index();
} elseif ($action === 'show') {
    if ($param != '') {
        echo json_encode([
            'msg' => "Action show. Parâmetro: $param."
        ]);
    } else {
        echo json_encode([
            'msg' => "O parâmetro é necessário para o método $method."
        ]);
    }
} else {
    echo json_encode([
        'msg' => 'Action desconhecida'
    ]);
}
