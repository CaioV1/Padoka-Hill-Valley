<?php

    require_once("Controller/Categoria.php");
    require_once("Model/ConexaoBanco.php");

    class CategoriaDAO{

        public function inserir(Categoria $categoria){

            $conexao = ConexaoBanco::obterConexao();

            $SQL = "INSERT INTO tbl_categoria(nome, situacao) VALUES(?, ?)";

            $stm = $conexao->prepare($SQL);

            $stm->bindValue(1, $categoria->getNome());
            $stm->bindValue(2, $categoria->getSituacao());

            $envio = $stm->execute();

            $conexao = null;

            if($envio){

                return true;

            } else {

                return false;

            }

        }

        public function obterUm($id){

            $conexao = ConexaoBanco::obterConexao();

            $SQL = "SELECT * FROM tbl_categoria WHERE  id = ?";

            $stm = $conexao->prepare($SQL);

            $stm->bindParam(1, $id);

            $stm->execute();

            $stm->setFetchMode(PDO::FETCH_ASSOC);

            $resultSet = $stm->fetch();

            $resultSet["nome"] = utf8_encode($resultSet["nome"]);

            $conexao = null;

            return $resultSet;

        }

        public function obterTodos(){

            $listaCategorias = array();

            $conexao = ConexaoBanco::obterConexao();

            $SQL = "SELECT * FROM tbl_categoria";

            $stm = $conexao->prepare($SQL);

            $stm->execute();

            $stm->setFetchMode(PDO::FETCH_ASSOC);

            while($resultSet = $stm->fetch()){

                $categoria = new Categoria();

                $categoria->setId($resultSet["id"]);
                $categoria->setNome($resultSet["nome"]);
                $categoria->setSituacao($resultSet["situacao"]);

                $listaCategorias[] = $categoria;

            }

            $conexao = null;

            return $listaCategorias;

        }

        public function obterAtivos(){

            $listaCategorias = array();

            $conexao = ConexaoBanco::obterConexao();

            $SQL = "SELECT * FROM tbl_categoria WHERE situacao = 1";

            $stm = $conexao->prepare($SQL);

            $stm->execute();

            $stm->setFetchMode(PDO::FETCH_ASSOC);

            while($resultSet = $stm->fetch()){

                $categoria = new Categoria();

                $categoria->setId($resultSet["id"]);
                $categoria->setNome($resultSet["nome"]);
                $categoria->setSituacao($resultSet["situacao"]);

                $listaCategorias[] = $categoria;

            }

            $conexao = null;

            return $listaCategorias;

        }

        public function atualizar(Categoria $categoria){

            $conexao = ConexaoBanco::obterConexao();

            $SQL = "UPDATE tbl_categoria SET nome = ? WHERE id = ? ";

            $stm = $conexao->prepare($SQL);

            $stm->bindValue(1, $categoria->getNome());
            $stm->bindValue(2, $categoria->getId());

            $envio = $stm->execute();

            $conexao = null;

            if($envio){

                return true;

            } else {

                return false;

            }

        }

        public function atualizarSituacao($situacao, $id){

            $conexao = ConexaoBanco::obterConexao();

            $SQL = "UPDATE tbl_categoria SET situacao = ? WHERE id = ? ";

            $stm = $conexao->prepare($SQL);

            $stm->bindParam(1, $situacao);
            $stm->bindParam(2, $id);

            $envio = $stm->execute();

            $conexao = null;

            if($envio){

                return true;

            } else {

                return false;

            }

        }

        public function remover($id){

            $conexao = ConexaoBanco::obterConexao();

            $SQL = "DELETE FROM tbl_categoria WHERE id = ?";

            $stm = $conexao->prepare($SQL);

            $stm->bindParam(1, $id);

            $envio = $stm->execute();

            $conexao = null;

            if($envio){

                return true;

            } else {

                return false;

            }

        }

    }

?>
