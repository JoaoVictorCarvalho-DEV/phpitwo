<?php
class DB
{
    public static function connection()
    {
        try {
            $host = "JARVIS";
            $dbname = "AppostosAPI";
            $user = "JARVIS\joao0";
            $pass = "Victor_@!@6411";

            $dns = "sqlsrv:Server=$host;Database=$dbname;";

            return new PDO($dns, null, null);
        } catch (PDOException $e) {
            echo "Erro na conexão: $e";
            exit;
        }
    }
}
