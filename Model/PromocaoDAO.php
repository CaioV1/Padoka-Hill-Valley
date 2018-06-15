<?php 

    require_once("Controller/Promocao.php");
    require_once("Util/ConversaoData.php");
    require_once("Model/ConexaoBanco.php");

    class PromocaoDAO{
        
        public function inserir(Promocao $promocao){
            
            $conversao = new ConversaoData();
            
            $conexao = ConexaoBanco::obterConexao();
            
            $dataInicio = $conversao->paraMySQL($promocao->getDataInicio());
            
            $dataFim = $conversao->paraMySQL($promocao->getDataFim());
            
            $SQL = "INSERT INTO tbl_promocao(desconto, data_inicio, data_fim, id_produto, situacao) VALUES(?, ?, ?, ?, ?)";
            
            $stm = $conexao->prepare($SQL);
            
            $stm->bindValue(1, $promocao->getDesconto());
            $stm->bindParam(2, $dataInicio);
            $stm->bindParam(3, $dataFim);
            $stm->bindValue(4, $promocao->getIdProduto());
            $stm->bindValue(5, $promocao->getSituacao());
            
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
            
            $SQL = "SELECT * FROM view_promocao_produto WHERE id = ?";
            
            $stm = $conexao->prepare($SQL);
            
            $stm->bindParam(1, $id);
            
            $stm->execute();
            
            $stm->setFetchMode(PDO::FETCH_ASSOC);
            
            $resultSet = $stm->fetch();
            
            $resultSet["nomeProduto"] = utf8_encode($resultSet["nomeProduto"]);
            $resultSet["descricao"] = utf8_encode($resultSet["descricao"]);
            
            $conexao = null;
            
            return $resultSet;
            
        }
        
        public function obterTodos(){
            
            $conversao = new ConversaoData();
            
            $listaPromocoes = array();
            
            $conexao = ConexaoBanco::obterConexao();
            
            $SQL = "SELECT * FROM view_promocao_produto ORDER BY id";
            
            $stm = $conexao->prepare($SQL);
            
            $stm->execute();
            
            $stm->setFetchMode(PDO::FETCH_ASSOC);
            
            while($resultSet = $stm->fetch()){
                
                $promocao = new Promocao();
                
                $promocao->setId($resultSet["id"]);
                $promocao->setDesconto($resultSet["desconto"]);
                $promocao->setDataInicio($resultSet["data_inicio"]);
                $promocao->setDataFim($resultSet["data_fim"]);
                $promocao->setIdProduto($resultSet["id_produto"]);
                $promocao->setSituacao($resultSet["situacao"]);
                $promocao->setNomeProduto($resultSet["nomeProduto"]);
                $promocao->setPrecoOriginal($resultSet["preco"]);
                
                $listaPromocoes[] = $promocao; 
                
            }
            
            $conexao = null;
            
            return $listaPromocoes;
            
        }
        
        public function obterAtivos(){
            
            $conversao = new ConversaoData();
            
            $listaPromocoes = array();
            
            $conexao = ConexaoBanco::obterConexao();
            
            $SQL = "SELECT * FROM view_promocao_produto WHERE situacao = 1 ORDER BY id";
            
            $stm = $conexao->prepare($SQL);
            
            $stm->execute();
            
            $stm->setFetchMode(PDO::FETCH_ASSOC);
            
            while($resultSet = $stm->fetch()){
                
                $promocao = new Promocao();
                
                $promocao->setId($resultSet["id"]);
                $promocao->setDesconto($resultSet["desconto"]);
                $promocao->setDataInicio($resultSet["data_inicio"]);
                $promocao->setDataFim($resultSet["data_fim"]);
                $promocao->setIdProduto($resultSet["id_produto"]);
                $promocao->setSituacao($resultSet["situacao"]);
                $promocao->setNomeProduto($resultSet["nomeProduto"]);
                $promocao->setPrecoOriginal($resultSet["preco"]);
                $promocao->setDescricao($resultSet["descricao"]);
                $promocao->setCaminhoImagem($resultSet["caminho_imagem"]);
                
                $listaPromocoes[] = $promocao; 
                
            }
            
            $conexao = null;
            
            return $listaPromocoes;
            
        }
        
        public function atualizar(Promocao $promocao){
            
            $conversao = new ConversaoData();
            
            $conexao = ConexaoBanco::obterConexao();
            
            $dataInicio = $conversao->paraMySQL($promocao->getDataInicio());
            
            $dataFim = $conversao->paraMySQL($promocao->getDataFim());
            
            $SQL = "UPDATE tbl_promocao SET desconto = ?, data_inicio = ?, data_fim = ?, id_produto = ? WHERE id = ?";
            
            $stm = $conexao->prepare($SQL);
            
            $stm->bindValue(1, $promocao->getDesconto());
            $stm->bindParam(2, $dataInicio);
            $stm->bindParam(3, $dataFim);
            $stm->bindValue(4, $promocao->getIdProduto());
            $stm->bindValue(5, $promocao->getId());
            
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
            
            $SQL = "UPDATE tbl_promocao SET situacao = ? WHERE id = ?";
            
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
            
            $SQL = "DELETE FROM tbl_promocao WHERE id = ?";
            
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