<?php 

    require_once("Controller/Localidade.php");
    require_once("Model/ConexaoBanco.php");

    class LocalidadeDAO{
        
        public function inserir(Localidade $localidade){
            
            $conexao = ConexaoBanco::obterConexao();
            
            $SQL = "INSERT INTO tbl_loja(logradouro, cep, latitude, longitude, horario_abertura, horario_fechamento, situacao, id_cidade) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
            
            $stm = $conexao->prepare($SQL);
            
            $stm->bindValue(1, $localidade->getLogradouro());
            $stm->bindValue(2, $localidade->getCEP());
            $stm->bindValue(3, $localidade->getLatitude());
            $stm->bindValue(4, $localidade->getLongitude());
            $stm->bindValue(5, $localidade->getHorarioAbertura());
            $stm->bindValue(6, $localidade->getHorarioFechamento());
            $stm->bindValue(7, $localidade->getSituacao());
            $stm->bindValue(8, $localidade->getIdCidade());
            
            $envio = $stm->execute();
            
            $conexao = null;
            
            if($envio){
                
                return true;
                
            } else {
                
                return false;
                
            }
            
        }
        
        public function inserirCidade($idCidade, $nome, $idEstado){
            
            $conexao = ConexaoBanco::obterConexao();
            
            $SQL = "INSERT INTO tbl_cidade(id, nome, id_estado) VALUES(?, ?, ?)";
            
            $stm = $conexao->prepare($SQL);
            
            $stm->bindParam(1, $idCidade);
            $stm->bindParam(2, $nome);
            $stm->bindParam(3, $idEstado);
            
            $stm->execute();
            
            $conexao = null;
            
        }
        
        public function obterEstados(){
            
            $listaEstados = array();
            
            $conexao = ConexaoBanco::obterConexao();
            
            $SQL = "SELECT * FROM tbl_estado";
            
            $stm = $conexao->prepare($SQL);
            
            $stm->execute();
            
            $stm->setFetchMode(PDO::FETCH_ASSOC);
            
            while($resultSet = $stm->fetch()){
                
                $localidade = new Localidade();
                
                $localidade->setIdEstado($resultSet["id"]);
                $localidade->setEstado($resultSet["nome"]."(".$resultSet["sigla"].")");
                
                $listaEstados[] = $localidade;
                
            }
            
            $conexao = null;
            
            return $listaEstados;
            
        }
        
        public function obterUm($id){
            
            $conexao = ConexaoBanco::obterConexao();
            
            $SQL = "SELECT * FROM view_loja_cidade_estado WHERE id = ?";
            
            $stm = $conexao->prepare($SQL);
            
            $stm->bindParam(1, $id);
            
            $stm->execute();
            
            $stm->setFetchMode(PDO::FETCH_ASSOC);
            
            $resultSet = $stm->fetch();
            
            $conexao = null;
            
            return $resultSet;
            
        }
        
        public function obterTodos(){
            
            $listaLocalidades = array();
            
            $conexao = ConexaoBanco::obterConexao();
            
            $SQL = "SELECT * FROM view_loja_cidade_estado ORDER BY id";
            
            $stm = $conexao->prepare($SQL);
            
            $stm->execute();
            
            $stm->setFetchMode(PDO::FETCH_ASSOC);
            
            while($resultSet = $stm->fetch()){
                
                $localidade = new Localidade();
                
                $localidade->setId($resultSet["id"]);
                $localidade->setLogradouro($resultSet["logradouro"]);
                $localidade->setCEP($resultSet["cep"]);
                $localidade->setLatitude($resultSet["latitude"]);
                $localidade->setLongitude($resultSet["longitude"]);
                $localidade->setHorarioAbertura($resultSet["horario_abertura"]);
                $localidade->setHorarioFechamento($resultSet["horario_fechamento"]);
                $localidade->setSituacao($resultSet["situacao"]);
                $localidade->setIdCidade($resultSet["id_cidade"]);
                $localidade->setCidade($resultSet["cidade"]);
                $localidade->setIdEstado($resultSet["id_estado"]);
                $localidade->setEstado($resultSet["estado"]."(".$resultSet["sigla"].")");
                $localidade->setSigla($resultSet["sigla"]);
                
                $listaLocalidades[] = $localidade; 
                
            }
            
            $conexao = null;
            
            return $listaLocalidades;
            
        }
        
        public function obterAtivos(){
            
            $listaLocalidades = array();
            
            $conexao = ConexaoBanco::obterConexao();
            
            $SQL = "SELECT * FROM view_loja_cidade_estado WHERE situacao = 1 ORDER BY id";
            
            $stm = $conexao->prepare($SQL);
            
            $stm->execute();
            
            $stm->setFetchMode(PDO::FETCH_ASSOC);
            
            while($resultSet = $stm->fetch()){
                
                $localidade = new Localidade();
                
                $localidade->setId($resultSet["id"]);
                $localidade->setLogradouro($resultSet["logradouro"]);
                $localidade->setCEP($resultSet["cep"]);
                $localidade->setLatitude($resultSet["latitude"]);
                $localidade->setLongitude($resultSet["longitude"]);
                $localidade->setHorarioAbertura($resultSet["horario_abertura"]);
                $localidade->setHorarioFechamento($resultSet["horario_fechamento"]);
                $localidade->setSituacao($resultSet["situacao"]);
                $localidade->setIdCidade($resultSet["id_cidade"]);
                $localidade->setCidade($resultSet["cidade"]);
                $localidade->setIdEstado($resultSet["id_estado"]);
                $localidade->setEstado($resultSet["estado"]."(".$resultSet["sigla"].")");
                $localidade->setSigla($resultSet["sigla"]);
                
                $listaLocalidades[] = $localidade; 
                
            }
            
            $conexao = null;
            
            return $listaLocalidades;
            
        }
        
        public function atualizar($localidade){
            
            $conexao = ConexaoBanco::obterConexao();
      
            $SQL = "UPDATE tbl_loja SET logradouro = ?, cep = ?, latitude = ?, longitude = ?, horario_abertura = ?, horario_fechamento = ?, id_cidade = ? WHERE id = ?";
            
            $statement = $conexao->prepare($SQL);
            
            $statement->bindValue(1, $localidade->getLogradouro());
            $statement->bindValue(2, $localidade->getCEP());
            $statement->bindValue(3, $localidade->getLatitude());
            $statement->bindValue(4, $localidade->getLongitude());
            $statement->bindValue(5, $localidade->getHorarioAbertura());
            $statement->bindValue(6, $localidade->getHorarioFechamento());
            $statement->bindValue(7, $localidade->getIdCidade());
            $statement->bindValue(8, $localidade->getId());

            $envio = $statement->execute();
            
            $conexao = null;
            
            if($envio){
                
                return true;
                
            } else {
                
                return false;
                
            }
            
        }
        
        public function atualizarSituacao($situacao, $id){
            
            $conexao = ConexaoBanco::obterConexao();
      
            $SQL = "UPDATE tbl_loja SET situacao = ? WHERE id = ?";
            
            $statement = $conexao->prepare($SQL);
            
            $statement->bindParam(1, $situacao);
            $statement->bindParam(2, $id);
            
            $envio = $statement->execute();
            
            $conexao = null;
            
            if($envio){
                
                return true;
                
            } else {
                
                return false;
                
            }
            
        }
        
        public function remover($id){
        
            $conexao = ConexaoBanco::obterConexao();

            $SQL = "DELETE FROM tbl_loja WHERE id = ?";

            $statement = $conexao->prepare($SQL);

            $statement->bindValue(1, $id);

            $envio = $statement->execute();

            $conexao = null;

            if($envio){

                return true;

            } else {

                return false;

            }
            
        }
        
        public function verificarCidade($nome){
            
            $conexao = ConexaoBanco::obterConexao();

            $SQL = "SELECT id FROM tbl_cidade WHERE id = ?";

            $statement = $conexao->prepare($SQL);

            $statement->bindValue(1, $nome);

            $statement->execute();
            
            $statement->setFetchMode(PDO::FETCH_ASSOC);
            
            $listaId = array();
            
            $id = 0;
            
            while($resultSet = $statement->fetch()){
                
                $i = $resultSet["id"];
                
                $listaId[] = $id;
                
            }
            
            if(count($listaId) > 0){
                
                return true;
                
            } else {
                
                return false;
                
            }
 
            
        }
        
    }

?>