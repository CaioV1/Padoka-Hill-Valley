<?php

    require_once("Controller/Destaque.php");
    require_once("Model/ConexaoBanco.php");

    class DestaqueDAO{

        public function inserir(Destaque $destaque){

            $conexao = ConexaoBanco::obterConexao();

            $SQL = "INSERT INTO tbl_destaque(info_promo, situacao, id_produto) VALUES(?, ?, ?)";

            $stm = $conexao->prepare($SQL);

            $stm->bindValue(1, $destaque->getInfo());
            $stm->bindValue(2, $destaque->getSituacao());
            $stm->bindValue(3, $destaque->getIdProduto());

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

            $SQL = "SELECT * FROM view_destaque_produto WHERE id = ?";

            $stm = $conexao->prepare($SQL);

            $stm->bindParam(1, $id);

            $stm->execute();

            $stm->setFetchMode(PDO::FETCH_ASSOC);

            $resultSet = $stm->fetch();

            $resultSet["info_promo"] = utf8_encode($resultSet["info_promo"]);

            $conexao = null;

            return $resultSet;

        }

        public function obterTodos(){

            $listaDestaques = array();

            $conexao = ConexaoBanco::obterConexao();

            $SQL = "SELECT * FROM view_destaque_produto";

            $stm = $conexao->prepare($SQL);

            $stm->execute();

            $stm->setFetchMode(PDO::FETCH_ASSOC);

            while($resultSet = $stm->fetch()){

                $destaque = new Destaque();

                $destaque->setId($resultSet["id"]);
                $destaque->setNome($resultSet["nome"]);
                $destaque->setPreco($resultSet["preco"]);
                $destaque->setInfo($resultSet["info_promo"]);
                $destaque->setSituacao($resultSet["situacao"]);
                $destaque->setIdProduto($resultSet["id_produto"]);

                $listaDestaques[] = $destaque;

            }

            $conexao = null;

            return $listaDestaques;

        }

        public function obterAtivos(){

            $listaDestaques = array();

            $conexao = ConexaoBanco::obterConexao();

            $SQL = "SELECT * FROM view_destaque_produto WHERE situacao = 1";

            $stm = $conexao->prepare($SQL);

            $stm->execute();

            $stm->setFetchMode(PDO::FETCH_ASSOC);

            while($resultSet = $stm->fetch()){

                $destaque = new Destaque();

                $destaque->setId($resultSet["id"]);
                $destaque->setNome($resultSet["nome"]);
                $destaque->setPreco($resultSet["preco"]);
                $destaque->setInfo($resultSet["info_promo"]);
                $destaque->setSituacao($resultSet["situacao"]);
                $destaque->setIdProduto($resultSet["id_produto"]);

                $listaDestaques[] = $destaque;

            }

            $conexao = null;

            return $listaDestaques;

        }

        public function atualizar(Destaque $destaque){

            $conexao = ConexaoBanco::obterConexao();

            $SQL = "UPDATE tbl_destaque SET info_promo = ?, id_produto = ? WHERE id = ?";

            $stm = $conexao->prepare($SQL);

            $stm->bindValue(1, $destaque->getInfo());
            $stm->bindValue(2, $destaque->getIdProduto());
            $stm->bindValue(3, $destaque->getId());

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

            $SQL = "UPDATE tbl_destaque SET situacao = ? WHERE id = ?";

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

            $SQL = "DELETE FROM tbl_destaque WHERE id = ?";

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
