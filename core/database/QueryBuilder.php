<?php

namespace App\Core\Database;

use PDO, Exception;

class QueryBuilder
{
    protected $pdo;


    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectAll($table)
    {
        $sql = "select * from {$table}";

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_CLASS);

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function countAllPosts($tabela, $textoDeBusca, $colunaDeBusca){

        $sql = "SELECT COUNT(*) AS total FROM {$tabela}";

        $parametros = [];

        if ($textoDeBusca && $colunaDeBusca){
            $sql .= " WHERE $colunaDeBusca[0] LIKE :textoDeBusca OR $colunaDeBusca[1] LIKE :textoDeBusca";
            $parametros['textoDeBusca'] = '%' . $textoDeBusca . '%';
        }

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($parametros);

            return $stmt->fetch(PDO::FETCH_ASSOC)['total'];

        } catch (Exception $e) {
            die($e->getMessage());
        }

    }

    public function paginatePosts($tabela, $limite, $offset, $textoDeBusca, $colunaDeBusca) {

    $parametros = [];
    $whereSql = '';

        if ($textoDeBusca && $colunaDeBusca){
            $whereSql = "WHERE $colunaDeBusca[0] LIKE :textoDeBusca OR $colunaDeBusca[1] LIKE :textoDeBusca";
            $parametros['textoDeBusca'] = '%' . $textoDeBusca . '%';
        }

        $sql = "SELECT publicacoes.*, usuarios.nome AS autor_nome
            FROM {$tabela}
            JOIN usuarios ON publicacoes.id_usuario = usuarios.id
            {$whereSql}
            LIMIT {$limite} OFFSET {$offset}";

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($parametros);

            return $stmt->fetchAll(PDO::FETCH_CLASS);

        } catch (Exception $e) {
            die($e->getMessage());
        }

    }

}