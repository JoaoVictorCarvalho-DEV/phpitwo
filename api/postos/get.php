<?php

if ($action === 'index' && !$param) {

    $postos = new PostoController();
    //o método index retorna todos
    $postos->index();
} elseif ($action === 'show') {
    if ($param != '') {
        $postos = new PostoController();
        //o método index retorna todos
        $postos->show($param);
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
