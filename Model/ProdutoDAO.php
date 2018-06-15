<?php

    require_once("Controller/Produto.php");
    require_once("Model/ConexaoBanco.php");

    class ProdutoDAO{

        public function inserir(Produto $produto){

            $conexao = ConexaoBanco::obterConexao();

            $SQL = "INSERT INTO tbl_produto(nome, preco, descricao, quantidade, caminho_imagem, situacao, id_subcategoria) VALUES(?, ?, ?, ?, ?, ?, ?)";

            $stm = $conexao->prepare($SQL);

            $stm->bindValue(1, $produto->getNome());
            $stm->bindValue(2, $produto->getPreco());
            $stm->bindValue(3, $produto->getDescricao());
            $stm->bindValue(4, $produto->getQuantidade());
            $stm->bindValue(5, $produto->getCaminhoImagem());
            $stm->bindValue(6, $produto->getSituacao());
            $stm->bindValue(7, $produto->getIdSubcategoria());

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

            $SQL = "SELECT * FROM view_produto_categoria WHERE id = ?";

            $stm = $conexao->prepare($SQL);

            $stm->bindParam(1, $id);

            $stm->execute();

            $stm->setFetchMode(PDO::FETCH_ASSOC);

            $resultSet = $stm->fetch();
            
            $resultSet["nome"] = utf8_encode($resultSet["nome"]);
            $resultSet["descricao"] = utf8_encode($resultSet["descricao"]);
            $resultSet["caminho_imagem"] = utf8_encode($resultSet["caminho_imagem"]);
            $resultSet["categoria"] = utf8_encode($resultSet["categoria"]);
            $resultSet["subcategoria"] = utf8_encode($resultSet["subcategoria"]);
            

            $conexao = null;

            return $resultSet;

        }

        public function obterTodos(){

            $listaProdutos = array();

            $conexao = ConexaoBanco::obterConexao();

            $SQL = "SELECT * FROM tbl_produto";

            $stm = $conexao->prepare($SQL);

            $stm->execute();

            $stm->setFetchMode(PDO::FETCH_ASSOC);

            while($resultSet = $stm->fetch()){

                $produto = new Produto();

                $produto->setId($resultSet["id"]);
                $produto->setNome($resultSet["nome"]);
                $produto->setPreco($resultSet["preco"]);
                $produto->setDescricao($resultSet["descricao"]);
                $produto->setQuantidade($resultSet["quantidade"]);
                $produto->setCaminhoImagem($resultSet["caminho_imagem"]);
                $produto->setSituacao($resultSet["situacao"]);
                $produto->setIdSubcategoria($resultSet["id_subcategoria"]);

                $listaProdutos[] = $produto;

            }

            $conexao = null;

            return $listaProdutos;

        }

        public function obterAtivos(){

            $listaProdutos = array();

            $conexao = ConexaoBanco::obterConexao();

            $SQL = "SELECT * FROM tbl_produto WHERE situacao = 1";

            $stm = $conexao->prepare($SQL);

            $stm->execute();

            $stm->setFetchMode(PDO::FETCH_ASSOC);

            while($resultSet = $stm->fetch()){

                $produto = new Produto();

                $produto->setId($resultSet["id"]);
                $produto->setNome($resultSet["nome"]);
                $produto->setPreco($resultSet["preco"]);
                $produto->setDescricao($resultSet["descricao"]);
                $produto->setQuantidade($resultSet["quantidade"]);
                $produto->setCaminhoImagem($resultSet["caminho_imagem"]);
                $produto->setSituacao($resultSet["situacao"]);
                $produto->setIdSubcategoria($resultSet["id_subcategoria"]);

                $listaProdutos[] = $produto;

            }

            $conexao = null;

            return $listaProdutos;

        }
        
        public function obterAleatorio(){

            $listaProdutos = array();

            $conexao = ConexaoBanco::obterConexao();

            $SQL = "SELECT * FROM tbl_produto WHERE situacao = 1 ORDER BY RAND() LIMIT 10";

            $stm = $conexao->prepare($SQL);

            $stm->execute();

            $stm->setFetchMode(PDO::FETCH_ASSOC);

            while($resultSet = $stm->fetch()){

                $produto = new Produto();

                $produto->setId($resultSet["id"]);
                $produto->setNome($resultSet["nome"]);
                $produto->setPreco($resultSet["preco"]);
                $produto->setDescricao($resultSet["descricao"]);
                $produto->setQuantidade($resultSet["quantidade"]);
                $produto->setCaminhoImagem($resultSet["caminho_imagem"]);
                $produto->setSituacao($resultSet["situacao"]);
                $produto->setIdSubcategoria($resultSet["id_subcategoria"]);

                $listaProdutos[] = $produto;

            }

            $conexao = null;

            return $listaProdutos;

        }

        public function obterPorSubcategoria($idSubcategoria){

            $listaProdutos = array();

            $conexao = ConexaoBanco::obterConexao();

            $SQL = "SELECT * FROM tbl_produto WHERE situacao = 1 AND id_subcategoria = ?";

            $stm = $conexao->prepare($SQL);

            $stm->bindValue(1, $idSubcategoria);

            $stm->execute();

            $stm->setFetchMode(PDO::FETCH_ASSOC);

            while($resultSet = $stm->fetch()){

                $produto = new Produto();

                $produto->setId($resultSet["id"]);
                $produto->setNome($resultSet["nome"]);
                $produto->setPreco($resultSet["preco"]);
                $produto->setDescricao($resultSet["descricao"]);
                $produto->setQuantidade($resultSet["quantidade"]);
                $produto->setCaminhoImagem($resultSet["caminho_imagem"]);
                $produto->setSituacao($resultSet["situacao"]);
                $produto->setIdSubcategoria($resultSet["id_subcategoria"]);

                $listaProdutos[] = $produto;

            }

            $conexao = null;

            return $listaProdutos;

        }

        public function atualizar(Produto $produto){

            $conexao = ConexaoBanco::obterConexao();

            $SQL = "UPDATE tbl_produto SET nome = ?, preco = ?, descricao = ?, quantidade = ?, caminho_imagem = ?, id_subcategoria = ? WHERE id = ?";

            $stm = $conexao->prepare($SQL);

            $stm->bindValue(1, $produto->getNome());
            $stm->bindValue(2, $produto->getPreco());
            $stm->bindValue(3, $produto->getDescricao());
            $stm->bindValue(4, $produto->getQuantidade());
            $stm->bindValue(5, $produto->getCaminhoImagem());
            $stm->bindValue(6, $produto->getIdSubcategoria());
            $stm->bindValue(7, $produto->getId());

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

            $SQL = "UPDATE tbl_produto SET situacao = ? WHERE id = ?";

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

            $SQL = "DELETE FROM tbl_produto WHERE id = ?";

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
        
        public function clique($id){
            
            $conexao = ConexaoBanco::obterConexao();
            
            $SQL = "CALL sp_clique(?)";
            
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
        
        public function obterCliques(){
            
            $listaCliques = array();

            $conexao = ConexaoBanco::obterConexao();

            $SQL = "CALL sp_porcentagem_cliques";

            $stm = $conexao->prepare($SQL);

            $stm->execute();

            $stm->setFetchMode(PDO::FETCH_ASSOC);

            while($resultSet = $stm->fetch()){

                $resultSet["nome"] = utf8_encode($resultSet["nome"]);
                
                $listaCliques[] = $resultSet;

            }

            $conexao = null;

            return $listaCliques;    
            
        }
        
        public function obterSugestoes($letras){

            $listaProdutos = array();

            $conexao = ConexaoBanco::obterConexao();

            $SQL = "SELECT nome FROM tbl_produto WHERE nome LIKE ?";

            $stm = $conexao->prepare($SQL);
            
            $stm->bindParam(1, $letras);

            $stm->execute();

            $stm->setFetchMode(PDO::FETCH_ASSOC);

            while($resultSet = $stm->fetch()){
                
                $resultSet["nome"] = utf8_encode($resultSet["nome"]);
                
                $listaProdutos[] = $resultSet["nome"];

            }

            $conexao = null;

            return $listaProdutos;

        }
        
        public function obterPesquisa($letras){

            $listaProdutos = array();

            $conexao = ConexaoBanco::obterConexao();

            $SQL = "SELECT * FROM tbl_produto WHERE nome LIKE ?";

            $stm = $conexao->prepare($SQL);
            
            $stm->bindParam(1, $letras);

            $stm->execute();

            $stm->setFetchMode(PDO::FETCH_ASSOC);

            while($resultSet = $stm->fetch()){

                $produto = new Produto();

                $produto->setId($resultSet["id"]);
                $produto->setNome($resultSet["nome"]);
                $produto->setPreco($resultSet["preco"]);
                $produto->setDescricao($resultSet["descricao"]);
                $produto->setQuantidade($resultSet["quantidade"]);
                $produto->setCaminhoImagem($resultSet["caminho_imagem"]);
                $produto->setSituacao($resultSet["situacao"]);
                $produto->setIdSubcategoria($resultSet["id_subcategoria"]);

                $listaProdutos[] = $produto;

            }

            $conexao = null;

            return $listaProdutos;

        }

    }

?>
