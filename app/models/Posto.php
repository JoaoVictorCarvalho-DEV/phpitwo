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

    public function buscarUm(int $id): array
    {
        $stmt = $this->db->prepare('SELECT * FROM Postos WHERE id= ?');
        $stmt->execute([$id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorLocalizacao($lat, $lng, $raio)
    {
        $stmt = $this->db->prepare("
        SELECT id, fantasia AS nome, bandeira, endereco, latitude, longitude,
               (6371 * ACOS(
                   SIN(RADIANS(?)) * SIN(RADIANS(latitude)) +
                   COS(RADIANS(?)) * COS(RADIANS(latitude)) * 
                   COS(RADIANS(longitude) - RADIANS(?))
               )) AS distancia
        FROM [AppostosAPI].[dbo].[Postos]
        WHERE (6371 * ACOS(
                   SIN(RADIANS(?)) * SIN(RADIANS(latitude)) +
                   COS(RADIANS(?)) * COS(RADIANS(latitude)) * 
                   COS(RADIANS(longitude) - RADIANS(?))
               )) < ?
        ORDER BY distancia
    ");
        $stmt->execute([$lat, $lat, $lng, $lat, $lat, $lng, $raio]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
