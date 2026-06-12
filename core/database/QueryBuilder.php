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

    public function selecionarTodos($table)
    {

        //* Seleciona todos os elementos da tabela

        $sql = "select * from {$table}";

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_CLASS);

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function selecionarTodosOsPosts($tabela, $textoDeBusca, $colunaDeBusca, $filtro){

        $sql = "SELECT COUNT(*) AS total FROM {$tabela}";

        $parametros = [];

        $whereClauses = [];

        //* Parâmetros de filtro e de texto de busca sendo adicionados

        if ($textoDeBusca && $colunaDeBusca){
            $whereClauses[] .= "($colunaDeBusca[0] LIKE :textoDeBusca OR $colunaDeBusca[1] LIKE :textoDeBusca)";
            $parametros['textoDeBusca'] = '%' . $textoDeBusca . '%';
        }

        if ($filtro){
            $whereClauses[] = "(genero = :filtro)";
            $parametros['filtro'] = $filtro;
        }

        if (!empty($whereClauses)){
            $sql .= " WHERE " . implode(' and ', $whereClauses);
        }

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($parametros);

            return $stmt->fetch(PDO::FETCH_ASSOC)['total'];

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
            $whereClauses = "($colunaDeBusca[0] LIKE :textoDeBusca OR $colunaDeBusca[1] LIKE :textoDeBusca)";
            $parametros['textoDeBusca'] = '%' . $textoDeBusca . '%';
        }

        if ($filtro){
            $whereClauses[] = "(genero = :filtro)";
            $parametros['filtro'] = $filtro;
        }

        if (!empty($whereClauses)){
            $whereSql .= " WHERE " . implode(' and ', $whereClauses);
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

}