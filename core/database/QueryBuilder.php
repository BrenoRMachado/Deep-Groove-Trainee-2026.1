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

    public function selectSearch($tabela, $campo, $valor) {
        $sql = sprintf('SELECT * FROM %s WHERE %s = %s', $tabela, $campo, $valor);

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_CLASS);

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function selectLast($tabela) {
        $sql = sprintf('SELECT * FROM %s ORDER BY id DESC LIMIT 1', $tabela);

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
    public function countAll($tabela, $textoBusca=null, $colunaBusca=null){
        $sql = "SELECT COUNT(*) AS total FROM {$tabela}";
        $parameters = [];
        
        if($textoBusca && $colunaBusca){

            $condicoes = []; // um array separado APENAS para os textos do SQL
        
            foreach ($colunaBusca as $index => $coluna) {
                $token = "textoBusca_" . $index;
                $condicoes[] = "$coluna like :$token"; // Guarda o texto do SQL aqui
            
                $parameters[$token] = '%' . $textoBusca . '%';
            }
            // Junta as condições com OR no SQL
            $sql .= " where " . implode(' OR ', $condicoes);
        }

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($parameters);

            return $stmt->fetch(PDO::FETCH_ASSOC)['total'];

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function paginate($tabela, $limite, $salto, $textoBusca=null, $colunaBusca=null){
        $parameters = [];
        $wheresql = '';

        if($textoBusca && $colunaBusca){
           $condicoes = [];
        
            foreach ($colunaBusca as $index => $coluna){
                $token = "textoBusca_" . $index;
                $condicoes[] = "$coluna like :$token";
            
                $parameters[$token] = '%' . $textoBusca . '%'; 
            }

            $wheresql = " where " . implode(' OR ', $condicoes);
        }

        $sql = "SELECT * FROM {$tabela}{$wheresql} LIMIT {$limite} OFFSET {$salto} ";

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($parameters);

            return $stmt->fetchAll(PDO::FETCH_CLASS);

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }



    public function paginatePosts($tabela, $limite, $offset, $textoDeBusca, $colunaDeBusca, $filtro) {

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

    public function selectAllPosts($tabela, $textoDeBusca, $colunaDeBusca, $filtro){

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

    public function selecionaUltimas3Publicacoes(){

        $sql = "SELECT * FROM publicacoes
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

    public function selecionaUltimos3UsuariosAtivos(){
        $sql = "SELECT * FROM usuarios
            ORDER BY data_ultima_acao DESC
            LIMIT 3";
        
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function verificaLogin($email, $senha)
    {
        $sql = sprintf('SELECT * FROM usuarios WHERE email = :email AND senha = :senha');

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                'email' => $email,
                'senha' => $senha
            ]);
            
            $user = $stmt->fetch(PDO::FETCH_OBJ);

            return $user;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function verificaEmail($email){
        $sql = sprintf('SELECT * FROM usuarios WHERE email = :email');
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                'email' => $email,
            ]);
            
            $user = $stmt->fetch(PDO::FETCH_OBJ);

            return $user;
        } catch (Exception $e) {
            die($e->getMessage());
        }

    }

    // PARA O MOSAICO DA LANDING PAGE
    public function selecionaUltimas4publicacoes(){
        $sql = "SELECT * FROM publicacoes
            ORDER BY id DESC
            LIMIT 4";
        
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_CLASS);

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function emailJaExiste(string $email): bool {
        $sql = "SELECT COUNT(*) FROM usuarios WHERE email = :email";

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([':email' => $email]);  // passa o parâmetro aqui
            return $stmt->fetchColumn() > 0;       // pega só o COUNT(*)

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function senhaJaExiste(string $senha): bool {
        $sql = "SELECT COUNT(*) FROM usuarios WHERE senha = :senha";

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([':senha' => $senha]);  // passa o parâmetro aqui
            return $stmt->fetchColumn() > 0;       // pega só o COUNT(*)

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    private function verifyavaliacao(int $id_usuario, int $id_publicacao){
        $sql="SELECT EXISTS(SELECT 1 FROM avaliacoes WHERE id_usuario = :id_usuario AND id_publicacao = :id_publicacao)";
        
        try{
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([":id_usuario"=>$id_usuario, ":id_publicacao"=>$id_publicacao]); 
            return (bool) $stmt->fetchColumn();       

        } 
        catch (Exception $e){
            return false;
        }
    }

    public function avaliar(int $id_usuario, int $id_publicacao, int $nota){
        $parameters = [
            'valor'=> $nota, 
            'id_publicacao'=>$id_publicacao,
            'id_usuario'=>$id_usuario
        ];
        if($this->verifyavaliacao($id_usuario, $id_publicacao)){
            $sql = sprintf(
                'UPDATE avaliacoes SET valor = %s WHERE id_usuario = %s AND id_publicacao = %s',
                $nota, $id_usuario, $id_publicacao
            );
        
            try {
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_CLASS);

            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        return $this->insert("avaliacoes", $parameters);
    } 

    public function mediaAvaliacoes(int $id){
        $sql = "SELECT AVG(valor) FROM avaliacoes WHERE id_publicacao = :id";

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([':id' => $id]);  
            return $stmt->fetchColumn();       

        } 
        catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function agrupaGeneros(){
        $sql = "SELECT genero FROM `publicacoes` GROUP BY genero;";

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();  
            return $stmt->fetchAll(PDO::FETCH_CLASS);      

        } 
        catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
}