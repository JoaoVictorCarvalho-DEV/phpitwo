<?php

if ($action === 'index' && !$param) {

    $postos = new PostoController();
    //o método index retorna todos
    $postos->index();
} elseif ($action === 'show') {
    if ($param != '') {
        $postos = new PostoController();

        //o método show retorna apenas um
        $postos->show($param);
    } else {
        echo json_encode([
            'msg' => "O parâmetro é necessário para a action $action."
        ]);
    }
}elseif($action === 'loc'){
    if(isset($_GET['lat']) && isset($_GET['long'])){
        $postos = new PostoController();
        $lat = $_GET['lat'];
        $long = $_GET['long'];

        //o método byLatNLong retorna vários postos num raio passado
        $postos->byLatNLong($lat, $long, 2);
    }else{
        echo json_encode([
            'msg' => "Parametros são necessários para a action $action."
        ]);
    }
} else {
    echo json_encode([
        'msg' => 'Action desconhecida'
    ]);
}
