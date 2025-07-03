<?php

if ($action === 'store' && $param === '') {
    try {
        $db = DB::connection();

        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $endereco = $_POST['endereco'];
        $data_nascimento = $_POST['data_nascimento'];

        $sql = 'INSERT INTO usuarios (nome, sobrenome, data_nascimento, endereco) VALUES (?, ?, ?, ?)';
        $stmt = $db->prepare($sql);

        if ($stmt->execute([$nome, $sobrenome, $data_nascimento, $endereco])) {
            http_response_code(201);
            echo json_encode([
                'status' => 'success',
                'msg' => 'Usuário adicionado com sucesso'
            ]);
        }else{
          echo json_encode([
                'status' => 'error',
                'msg' => 'Erro ao adicionar o usuário'
            ]);  
        }
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode([
            'status' => 'error',
            'msg' => 'Erro no banco de dados',
            'error' => $e->getMessage()
        ]);
    }
}
