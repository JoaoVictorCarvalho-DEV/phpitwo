<?php
require_once 'Controller.php';
require_once __DIR__ . '../../models/Posto.php';

class PostoController extends Controller
{
    private $model;
    public function __construct()
    {
        $this->model = new Posto;
    }
    public function index()
    {
        try {
            $postos = $this->model->listarTodos();
            echo json_encode([
                'status' => 'success',
                'data' => $postos,
                'meta' => [
                    'total' => count($postos),
                    'atualizado_em' => date('Y-m-d H:i:s')
                ]
            ]);
        } catch (PDOException $e) {
            http_response_code(500);
            echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
    public function show(int $id)
    {
        try {
            $postos = $this->model->buscarUm($id);
            echo json_encode([
                'status' => 'success',
                'data' => $postos ? $postos : 'Nenhum posto foi encontrado',
                'meta' => [
                    'total' => count($postos),
                    'atualizado_em' => date('Y-m-d H:i:s')
                ]
            ]);
        } catch (PDOException $e) {
            http_response_code(500);
            echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function byLatNLong($lat, $long, $rad)
    {
        try {
            $postos = $this->model->buscarPorLocalizacao($lat, $long, $rad);
            echo json_encode([
                'status' => 'success',
                'data' => $postos ? $postos : 'Nenhum posto foi encontrado',
                'meta' => [
                    'total' => count($postos),
                    'atualizado_em' => date('Y-m-d H:i:s')
                ]
            ]);
        } catch (PDOException $e) {
            http_response_code(500);
            echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
    public function store(Posto $posto) {}
    public function update(int $id) {}
    public function delete(int $id) {}
}
