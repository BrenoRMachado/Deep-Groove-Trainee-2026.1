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

    public function selectAll($tabela)
    {
        $sql = "select * from {$tabela}";

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_CLASS);

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function insert($tabela, $parametros) {
        $sql = sprintf('INSERT INTO %s (%s) VALUES(:%s)', 
        $tabela, 
        implode(', ', array_keys($parametros)), 
        implode(', :', array_keys($parametros)),
        );

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($parametros);

            return $stmt->fetchAll(PDO::FETCH_CLASS);

        } catch (Exception $e) {
            die($e->getMessage());
        }

    }

    public function update($tabela, $id, $parametros) {

        $sql = sprintf('UPDATE %s SET %s WHERE id = %s', 
        $tabela, 
        implode(', ', array_map(function($parametro) {
            return $parametro . ' = :' .$parametro;
        }, array_keys($parametros))), 
        $id
        );

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($parametros);

            return $stmt->fetchAll(PDO::FETCH_CLASS);

        } catch (Exception $e) {
            die($e->getMessage());
        }

    }

    // DELETE FROM `usuarios` WHERE 0
    public function delete($tabela, $id){
        $sql = sprintf('DELETE FROM %s WHERE %s',
        $tabela,
        'id = :id'
        );

        
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(compact('id'));

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

}