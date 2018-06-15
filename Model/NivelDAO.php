<?php 

    require_once("Controller/Nivel.php");
    require_once("Model/ConexaoBanco.php");

    class NivelDAO{
        
        public function inserir(Nivel $nivel){
            
            $conexao = ConexaoBanco::obterConexao();
            
            $SQL = "INSERT INTO tbl_nivel(nome, situacao) VALUES(?, ?)";
            
            $stm = $conexao->prepare($SQL);
            
            $stm->bindValue(1, $nivel->getNome());
            $stm->bindValue(2, $nivel->getSituacao());
            
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
            
            $SQL = "SELECT * FROM tbl_nivel WHERE  id = ?";
            
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
            
            $listaNiveis = array();
            
            $conexao = ConexaoBanco::obterConexao();
            
            $SQL = "SELECT * FROM tbl_nivel";
            
            $stm = $conexao->prepare($SQL);
            
            $stm->execute();
            
            $stm->setFetchMode(PDO::FETCH_ASSOC);
            
            while($resultSet = $stm->fetch()){
                
                $nivel = new Nivel();
                
                $nivel->setId($resultSet["id"]);
                $nivel->setNome($resultSet["nome"]);
                $nivel->setSituacao($resultSet["situacao"]);
                
                $listaNiveis[] = $nivel; 
                
            }
            
            $conexao = null;
            
            return $listaNiveis;
            
        }
        
        public function obterAtivos(){
            
            $listaNiveis = array();
            
            $conexao = ConexaoBanco::obterConexao();
            
            $SQL = "SELECT * FROM tbl_nivel WHERE situacao = 1";
            
            $stm = $conexao->prepare($SQL);
            
            $stm->execute();
            
            $stm->setFetchMode(PDO::FETCH_ASSOC);
            
            while($resultSet = $stm->fetch()){
                
                $nivel = new Nivel();
                
                $nivel->setId($resultSet["id"]);
                $nivel->setNome($resultSet["nome"]);
                $nivel->setSituacao($resultSet["situacao"]);
                
                $listaNiveis[] = $nivel; 
                
            }
            
            $conexao = null;
            
            return $listaNiveis;
            
        }
        
        public function atualizar(Nivel $nivel){
            
            $conexao = ConexaoBanco::obterConexao();
            
            $SQL = "UPDATE tbl_nivel SET nome = ? WHERE id = ? ";
            
            $stm = $conexao->prepare($SQL);
            
            $stm->bindValue(1, $nivel->getNome());
            $stm->bindValue(2, $nivel->getId());
            
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
            
            $SQL = "UPDATE tbl_nivel SET situacao = ? WHERE id = ? ";
            
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
            
            $SQL = "DELETE FROM tbl_nivel WHERE id = ?";
            
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