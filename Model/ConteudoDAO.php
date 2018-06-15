<?php

    require_once("Controller/Conteudo.php");
    require_once("Model/ConexaoBanco.php");

    class ConteudoDAO{

        public function inserir(Conteudo $conteudo){

            $conexao = ConexaoBanco::obterConexao();

            $SQL = "INSERT INTO tbl_conteudo(titulo, caminho_imagem, texto, situacao, id_pagina) VALUES(?, ?, ?, ?, ?)";

            $stm = $conexao->prepare($SQL);

            $stm->bindValue(1, $conteudo->getTitulo());
            $stm->bindValue(2, $conteudo->getCaminhoImagem());
            $stm->bindValue(3, $conteudo->getTexto());
            $stm->bindValue(4, $conteudo->getSituacao());
            $stm->bindValue(5, $conteudo->getIdPagina());

            $envio = $stm->execute();

            if($envio){

                return true;

            } else {

                return false;

            }

        }

        public function obterPaginas(){

            $listaPaginas = array();

            $conexao = ConexaoBanco::obterConexao();

            $SQL = "SELECT * FROM tbl_pagina";

            $stm = $conexao->prepare($SQL);

            $stm->execute();

            $stm->setFetchMode(PDO::FETCH_ASSOC);

            while($resultSet = $stm->fetch()){

                $conteudo = new Conteudo();

                $conteudo->setIdPagina($resultSet["id"]);
                $conteudo->setPagina($resultSet["nome"]);

                $listaPaginas[] = $conteudo;

            }

            return $listaPaginas;

        }

        public function obterUm($id){

            $conexao = ConexaoBanco::obterConexao();

            $SQL = "SELECT * FROM view_conteudo_pagina WHERE id = ?";

            $stm = $conexao->prepare($SQL);

            $stm->bindParam(1, $id);

            $stm->execute();

            $stm->setFetchMode(PDO::FETCH_ASSOC);

            $resultSet = $stm->fetch();
            
            $resultSet["titulo"] = utf8_encode($resultSet["titulo"]);
            $resultSet["caminho_imagem"] = utf8_encode($resultSet["caminho_imagem"]);
            $resultSet["texto"] = utf8_encode($resultSet["texto"]);
            $resultSet["nome"] = utf8_encode($resultSet["nome"]);

            return $resultSet;

        }

        public function obterTodos(){

            $listaConteudos = array();

            $conexao = ConexaoBanco::obterConexao();

            $SQL = "SELECT * FROM view_conteudo_pagina";

            $stm = $conexao->prepare($SQL);

            $stm->execute();

            $stm->setFetchMode(PDO::FETCH_ASSOC);

            while($resultSet = $stm->fetch()){

                $conteudo = new Conteudo();

                $conteudo->setId($resultSet["id"]);
                $conteudo->setTitulo($resultSet["titulo"]);
                $conteudo->setCaminhoImagem($resultSet["caminho_imagem"]);
                $conteudo->setTexto($resultSet["texto"]);
                $conteudo->setSituacao($resultSet["situacao"]);
                $conteudo->setIdPagina($resultSet["id_pagina"]);
                $conteudo->setPagina($resultSet["nome"]);

                $listaConteudos[] = $conteudo;

            }

            return $listaConteudos;

        }

        public function obterAtivos($pagina){

            $listaConteudos = array();

            $conexao = ConexaoBanco::obterConexao();

            $SQL = "SELECT * FROM view_conteudo_pagina WHERE situacao = 1 AND nome = ?";

            $stm = $conexao->prepare($SQL);
            
//            $pagina = utf8_decode($pagina);

            $stm->bindParam(1, $pagina);

            $envio = $stm->execute();

            $stm->setFetchMode(PDO::FETCH_ASSOC);

            while($resultSet = $stm->fetch()){

                $conteudo = new Conteudo();

                $conteudo->setId($resultSet["id"]);
                $conteudo->setTitulo($resultSet["titulo"]);
                $conteudo->setCaminhoImagem($resultSet["caminho_imagem"]);
                $conteudo->setTexto($resultSet["texto"]);
                $conteudo->setSituacao($resultSet["situacao"]);
                $conteudo->setIdPagina($resultSet["id_pagina"]);
                $conteudo->setPagina($resultSet["nome"]);

                $listaConteudos[] = $conteudo;

            }

            return $listaConteudos;

        }

        public function atualizar(Conteudo $conteudo){

            $conexao = ConexaoBanco::obterConexao();

            $SQL = "UPDATE tbl_conteudo SET titulo = ?, caminho_imagem = ?, texto = ?, id_pagina = ? WHERE id = ?";

            $stm = $conexao->prepare($SQL);

            $stm->bindValue(1, $conteudo->getTitulo());
            $stm->bindValue(2, $conteudo->getCaminhoImagem());
            $stm->bindValue(3, $conteudo->getTexto());
            $stm->bindValue(4, $conteudo->getIdPagina());
            $stm->bindValue(5, $conteudo->getId());

            $envio = $stm->execute();

            if($envio){

                return true;

            } else {

                return false;

            }

        }

        public function atualizarSituacao($situacao, $id){

            $conexao = ConexaoBanco::obterConexao();

            $SQL = "UPDATE tbl_conteudo SET situacao = ? WHERE id = ?";

            $stm = $conexao->prepare($SQL);

            $stm->bindParam(1, $situacao);
            $stm->bindParam(2, $id);

            $envio = $stm->execute();

            if($envio){

                return true;

            } else {

                return false;

            }

        }

        public function remover($id){

            $conexao = ConexaoBanco::obterConexao();

            $SQL = "DELETE FROM tbl_conteudo WHERE id = ?";

            $stm = $conexao->prepare($SQL);

            $stm->bindParam(1, $id);

            $envio = $stm->execute();

            if($envio){

                return true;

            } else {

                return false;

            }

        }

    }

?>
