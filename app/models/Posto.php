<?php
include_once 'Model.php';
class Posto extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function listarTodos()
    {
        $stmt = $this->db->query("SELECT * FROM Postos");

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
