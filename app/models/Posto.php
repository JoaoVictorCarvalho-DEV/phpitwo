<?php
include_once 'Model.php';
class Posto extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function listarTodos(): array
    {
        $stmt = $this->db->query("SELECT * FROM Postos");

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarUm(int $id) : array {
        $stmt = $this->db->prepare('SELECT * FROM Postos WHERE id= ?');
        $stmt->execute([$id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
