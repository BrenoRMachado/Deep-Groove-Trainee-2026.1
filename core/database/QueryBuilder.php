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

    // Função para inserir os dados na tabela

    public function insert($table, $parameters)
    {
        $sql = sprintf('INSERT INTO %s (%s) VALUES (:%s)',
        $table, 
        implode(', ', array_keys($parameters)),
        implode(', :', array_keys($parameters)),
        );

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($parameters);

            return $stmt->fetchAll(PDO::FETCH_CLASS);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function selectById($tabela, $id) {
        $sql = sprintf('SELECT * FROM %s WHERE id = %s', $tabela, $id);

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            return $stmt->fetchObject();

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function update($table, $id, $parameters){
        $sql = sprintf(
            'UPDATE %s SET %s WHERE id = %s',
            $table,
            implode(', ', array_map(function($param){
                return $param . ' = :' .$param;
            },  array_keys($parameters))),
            $id
        );
    
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($parameters);

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

    //paginação
    //usa pra ver o total de elementos da tabela
    public function countAll($tabela){
        $sql = "SELECT COUNT(*) AS total FROM {$tabela}";

         try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC)['total'];

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function paginate($tabela, $limite, $salto){
        $sql = "SELECT * FROM {$tabela} LIMIT {$limite} OFFSET {$salto}";

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_CLASS);

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }



    public function paginacaoPosts($tabela, $limite, $offset, $textoDeBusca, $colunaDeBusca, $filtro) {

        $parametros = [];

        $whereClauses = [];

        $whereSql = '';

        //* Parâmetros de filtro e de texto de busca sendo adicionados

        if ($textoDeBusca && $colunaDeBusca){
            $whereClauses[] = "($colunaDeBusca[0] LIKE :textoDeBusca OR $colunaDeBusca[1] LIKE :textoDeBusca OR $colunaDeBusca[2] LIKE :textoDeBusca)";
            $parametros['textoDeBusca'] = '%' . $textoDeBusca . '%';
        }

        if ($filtro){
            $whereClauses[] = "(genero = :filtro)";
            $parametros['filtro'] = $filtro;
        }

        if (!empty($whereClauses)){
            $whereSql .= " WHERE " . implode(' AND ', $whereClauses);
        }

        //* Une tabela de usuários a tabela de posts, adicionando o nome do autor na tabela de posts a partir do id do usuário da tabela de posts que seja igual ao da tabela de usuários

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
    //FIM paginação

    public function selecionarTodosOsPosts($tabela, $textoDeBusca, $colunaDeBusca, $filtro){

        //* Conta total de posts e une tabela de usuários a tabela de posts

        $sql = "SELECT COUNT(*) AS total
        FROM {$tabela}
        JOIN usuarios ON publicacoes.id_usuario = usuarios.id";

        $parametros = [];

        $whereClauses = [];

        // Parâmetros de filtro e de texto de busca sendo adicionados

        if ($textoDeBusca && $colunaDeBusca){
            $whereClauses[] = "($colunaDeBusca[0] LIKE :textoDeBusca OR $colunaDeBusca[1] LIKE :textoDeBusca OR $colunaDeBusca[2] LIKE :textoDeBusca)";
            $parametros['textoDeBusca'] = '%' . $textoDeBusca . '%';
        }

        if ($filtro){
            $whereClauses[] = "(genero = :filtro)";
            $parametros['filtro'] = $filtro;
        }

        if (!empty($whereClauses)){
            $sql .= " WHERE " . implode(' AND ', $whereClauses);
        }

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($parametros);

            return $stmt->fetch(PDO::FETCH_ASSOC)['total'];

        } catch (Exception $e) {
            die($e->getMessage());
        }

    }

    public function selecionaUltimas3LinhasDaTabela($tabela){

        $sql = "SELECT * FROM {$tabela}
            ORDER BY id DESC
            LIMIT 3";
        
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_CLASS);

        } catch (Exception $e) {
            die($e->getMessage());
        }

    }

}