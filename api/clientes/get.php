<?php

if ($action === 'index' && $param === '') {
    try {

        $db = DB::connection();
        $sql = 'SELECT * FROM usuarios';

        $stmt = $db->prepare($sql);
        $stmt->execute();

        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $response = json_encode(
            [
                'status' => 'success',
                'data' => $rows,
                'timestamp' => date('Y-m-d H:i:s')
            ]
        );

        echo $response;
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode([
            'status' => 'error',
            'msg' => 'Erro no banco de dados',
            'error' => $e->getMessage()
        ], JSON_PRETTY_PRINT);
    }
} elseif ($action === 'show' && $param !== '') {
    try {

        $id = $param;

        $db = DB::connection();

        $sql = 'SELECT * FROM usuarios
                WHERE id = ?';

        $stmt = $db->prepare($sql);

        $stmt->execute([$id]);

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            $row = 'Sem dados para o id passado';
        }

        $response = json_encode(
            [
                'status' => 'success',
                'data' => $row,
                'timestamp' => date('Y-m-d H:i:s')
            ],
            JSON_PRETTY_PRINT
        );

        echo $response;
    } catch (PDOException $e) {

        http_response_code(500);
        echo json_encode([
            'status' => 'error',
            'msg' => 'Erro no banco de dados',
            'error' => $e->getMessage()
        ]);
    }
} else {
    http_response_code(400);
    echo json_encode([
        'status' => 'error',
        'msg' => "Acao desconhecida para o método $method"
    ]);
}
