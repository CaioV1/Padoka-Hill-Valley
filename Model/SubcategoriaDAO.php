<?php

    require_once("Controller/Subcategoria.php");
    require_once("Model/ConexaoBanco.php");

    class SubcategoriaDAO{

        public function inserir(Subcategoria $subcategoria){

            $conexao = ConexaoBanco::obterConexao();

            $SQL = "INSERT INTO tbl_subcategoria(nome, id_categoria, situacao) VALUES(?, ?, ?)";

            $stm = $conexao->prepare($SQL);

            $stm->bindValue(1, $subcategoria->getNome());
            $stm->bindValue(2, $subcategoria->getIdCategoria());
            $stm->bindValue(3, $subcategoria->getSituacao());

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

            $SQL = "SELECT * FROM view_categoria WHERE  id = ?";

            $stm = $conexao->prepare($SQL);

            $stm->bindParam(1, $id);

            $stm->execute();

            $stm->setFetchMode(PDO::FETCH_ASSOC);

            $resultSet = $stm->fetch();
            
            $resultSet["nome"] = utf8_encode($resultSet["nome"]);
            $resultSet["categoria"] = utf8_encode($resultSet["categoria"]);

            $conexao = null;

            return $resultSet;

        }

        public function obterTodos(){

            $listaSubcategorias = array();

            $conexao = ConexaoBanco::obterConexao();

            $SQL = "SELECT * FROM view_categoria ORDER BY id";

            $stm = $conexao->prepare($SQL);

            $stm->execute();

            $stm->setFetchMode(PDO::FETCH_ASSOC);

            while($resultSet = $stm->fetch()){

                $subcategoria = new Subcategoria();

                $subcategoria->setId($resultSet["id"]);
                $subcategoria->setNome($resultSet["nome"]);
                $subcategoria->setCategoria($resultSet["categoria"]);
                $subcategoria->setSituacao($resultSet["situacao"]);

                $listaSubcategorias[] = $subcategoria;

            }

            $conexao = null;

            return $listaSubcategorias;

        }

        public function obterAtivos($idCategoria){

            $listaSubcategorias = array();

            $conexao = ConexaoBanco::obterConexao();

            $SQL = "SELECT * FROM view_categoria WHERE situacao = 1 AND id_categoria = ?";

            $stm = $conexao->prepare($SQL);

            $stm->bindValue(1, $idCategoria);

            $stm->execute();

            $stm->setFetchMode(PDO::FETCH_ASSOC);

            while($resultSet = $stm->fetch()){

                $subcategoria = new Subcategoria();

                $subcategoria->setId($resultSet["id"]);
                $subcategoria->setNome($resultSet["nome"]);
                $subcategoria->setCategoria($resultSet["categoria"]);
                $subcategoria->setSituacao($resultSet["situacao"]);

                $listaSubcategorias[] = $subcategoria;

            }

            $conexao = null;

            return $listaSubcategorias;

        }

        public function atualizar(Subcategoria $subcategoria){

            $conexao = ConexaoBanco::obterConexao();

            $SQL = "UPDATE tbl_subcategoria SET nome = ?, id_categoria = ? WHERE id = ? ";

            $stm = $conexao->prepare($SQL);

            $stm->bindValue(1, $subcategoria->getNome());
            $stm->bindValue(2, $subcategoria->getIdCategoria());
            $stm->bindValue(3, $subcategoria->getId());

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

            $SQL = "UPDATE tbl_subcategoria SET situacao = ? WHERE id = ? ";

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

            $SQL = "DELETE FROM tbl_subcategoria WHERE id = ?";

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
