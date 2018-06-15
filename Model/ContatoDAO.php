<?php 

    require_once("Controller/Contato.php");
    require_once("Model/ConexaoBanco.php");   

    class ContatoDAO{
        
        public function inserir(Contato $contato){
            
            //Obtendo a conexão com o banco;
            $conexao = ConexaoBanco::obterConexao();
            
            //Criando o comando para o MySQL;
            $SQL = "INSERT INTO tbl_contato(nome, telefone, celular, email, profissao, sexo, info_produto, sugestao_critica) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
            
            //Preparando o comando para envio;
            $stm = $conexao->prepare($SQL);
            
            //Atribuindo os dados restantes para a execução do comando;
            //bindValue para valores retornados de um método ou strings sem variáveis;
            //bindParam para variáveis e constantes;
            $stm->bindValue(1, $contato->getNome());
            $stm->bindValue(2, $contato->getTelefone());
            $stm->bindValue(3, $contato->getCelular());
            $stm->bindValue(4, $contato->getEmail());
            $stm->bindValue(5, $contato->getProfissao());
            $stm->bindValue(6, $contato->getSexo());
            $stm->bindValue(7, $contato->getInfoProduto());
            $stm->bindValue(8, $contato->getSugestaoCritica());
            
            //Executando o comando e obtendo o retorno booleano;
            $envio = $stm->execute();
            
            //Fechando a conexão;
            $conexao = null;
            
            //Se ocorreu algum erro no envio do comando com as informações o método irá retornar um valor booleano falso;
            if($envio){
                
                return true;
                
            } else {
                
                return false;
                
            }
            
        }
        
        public function obterUm($id){
            
            //Obtendo a conexão com o banco;
            $conexao = ConexaoBanco::obterConexao();
            
            //Criando o comando para o MySQL;
            $SQL = "SELECT * FROM tbl_contato WHERE id = ?";
            
            //Preparando o comando para envio;
            $stm = $conexao->prepare($SQL);
            
            //Atribuindo o id para a execução do comando;
            $stm->bindParam(1, $id);
            
            //Executando o comando;
            $stm->execute();
            
            //Definindo o modo de busca como associação;
            $stm->setFetchMode(PDO::FETCH_ASSOC);
            
            //Se a busca for bem sucedida, irá começar a preencher o objeto; 
            $resultSet = $stm->fetch();
            
            //Codificando os dados para o servidor;
            $resultSet["profissao"] = utf8_encode($resultSet["profissao"]);
            $resultSet["nome"] = utf8_encode($resultSet["nome"]);
            $resultSet["email"] = utf8_encode($resultSet["email"]);
            $resultSet["info_produto"] = utf8_encode($resultSet["info_produto"]);
            $resultSet["sugestao_critica"] = utf8_encode($resultSet["sugestao_critica"]);
            
            //Fechando conexao;
            $conexao = null;
            
            //Retornando o objeto;
            return $resultSet;
            
        }
        
        public function obterTodos(){
            
            $listaContatos = array();
            
            //Obtendo a conexão com o banco;
            $conexao = ConexaoBanco::obterConexao();
            
            //Criando o comando para o MySQL;
            $SQL = "SELECT * FROM tbl_contato";
            
            //Preparando o comando para envio;
            $stm = $conexao->prepare($SQL);
            
            //Executando o comando;
            $stm->execute();
            
            //Definindo o modo de busca como associação;
            $stm->setFetchMode(PDO::FETCH_ASSOC);
            
            //Enquanto houver dados para buscar, vai adicionando a lista;
            while($resultSet = $stm->fetch()){
                
                $contato = new Contato();
                
                $contato->setId($resultSet["id"]);
                $contato->setNome($resultSet["nome"]);
                $contato->setTelefone($resultSet["telefone"]);
                $contato->setCelular($resultSet["celular"]);
                $contato->setEmail($resultSet["email"]);
                $contato->setProfissao($resultSet["profissao"]);
                $contato->setSexo($resultSet["sexo"]);
                $contato->setInfoProduto($resultSet["info_produto"]);
                $contato->setSugestaoCritica($resultSet["sugestao_critica"]);
                
                $listaContatos[] = $contato;
                
            }
            
            //Fechando a conexão;
            $conexao = null;
            
            //Retornando a lista;
            return $listaContatos;
            
        }
        
        public function remover($id){
            
            //Obtendo a conexão com o banco;
            $conexao = ConexaoBanco::obterConexao();
            
            //Criando o comando para o MySQL;
            $SQL = "DELETE FROM tbl_contato WHERE id = ?";
            
            //Preparando o comando para envio;
            $stm = $conexao->prepare($SQL);
            
            //Atribuindo o id para a execução do comando;
            $stm->bindParam(1, $id);
            
            //Executando o comando;
            $envio = $stm->execute();
            
            //Fechando a conexão;
            $conexao = null;
            
            //Se ocorreu algum erro no envio do comando com as informações o método irá retornar um valor booleano falso;
            if($envio){
                
                return true;
                
            } else {
                
                return false;
                
            }
            
        }
        
    }

?>