<?php

    if($acao == "Autenticação"){
        
        require_once("../../Controller/Usuario.php");
        require_once("../../Model/ConexaoBanco.php");    
        
    } else  if($acao == "Realizar Autenticação"){
        
        require_once("../Controller/Usuario.php");
        require_once("../Model/ConexaoBanco.php");
        
    } else {
        
        require_once("Controller/Usuario.php");
        require_once("Model/ConexaoBanco.php");    
        
    }

    class UsuarioDAO{
        
        public function inserir(Usuario $usuario){
            
            $conexao = ConexaoBanco::obterConexao();
            
            $SQL = "INSERT INTO tbl_usuario(login, senha, nome, email, telefone, celular, situacao, id_nivel) VALUES(?, ?, ?, ?, ?, ?, ?, ?)"; 
            
            $stm = $conexao->prepare($SQL);
            
            $stm->bindValue(1, $usuario->getLogin());
            $stm->bindValue(2, $usuario->getSenha());
            $stm->bindValue(3, $usuario->getNome());
            $stm->bindValue(4, $usuario->getEmail());
            $stm->bindValue(5, $usuario->getTelefone());
            $stm->bindValue(6, $usuario->getCelular());
            $stm->bindValue(7, $usuario->getSituacao());
            $stm->bindValue(8, $usuario->getIdNivel());
            
            $envio = $stm->execute();
            
            $conexao = null;
            
            if($envio){
                
                return true;
                
            } else {
                
                return false;
                
            }
            
        }
        
        public function obterTodos(){
            
            $listaUsuario = array();
            
            $conexao = ConexaoBanco::obterConexao();
            
            $SQL = "SELECT * FROM view_usuario_nivel";
            
            $stm = $conexao->prepare($SQL);
            
            $stm->execute();
            
            $stm->setFetchMode(PDO::FETCH_ASSOC);
            
            while($resultSet = $stm->fetch()){
                
                $usuario = new Usuario();
                
                $usuario->setId($resultSet['id']);
                $usuario->setLogin($resultSet['login']);
                $usuario->setSenha($resultSet['senha']);
                $usuario->setNome($resultSet['nome']);
                $usuario->setEmail($resultSet['email']);
                $usuario->setTelefone($resultSet['telefone']);
                $usuario->setCelular($resultSet['celular']);
                $usuario->setSituacao($resultSet['situacao']);
                $usuario->setIdNivel($resultSet['id_nivel']);
                $usuario->setNivel($resultSet['nivel']);
                
                $listaUsuario[] = $usuario;
                
            }
            
            $conexao = null;
            
            return $listaUsuario;
            
        }
        
        public function obterUm($id){
            
            $conexao = ConexaoBanco::obterConexao();
            
            $SQL = "SELECT * FROM view_usuario_nivel WHERE id = ?";
            
            $stm = $conexao->prepare($SQL);
            
            $stm->bindParam(1, $id);
            
            $stm->execute();
            
            $stm->setFetchMode(PDO::FETCH_ASSOC);
            
            $resultSet = $stm->fetch();
            
            $resultSet["login"] = utf8_encode($resultSet["login"]);
            $resultSet["nome"] = utf8_encode($resultSet["nome"]);
            $resultSet["email"] = utf8_encode($resultSet["email"]);
            $resultSet["nivel"] = utf8_encode($resultSet["nivel"]);
            
            $conexao = null;
            
            return $resultSet;
            
        }
        
        public function atualizar(Usuario $usuario){
            
            $conexao = ConexaoBanco::obterConexao();
            
            $SQL = "UPDATE tbl_usuario SET login = ?, senha = ?, nome = ?, email = ?, telefone = ?, celular = ?, id_nivel = ? WHERE id = ?";
            
            $stm = $conexao->prepare($SQL);
            
            $stm->bindValue(1, $usuario->getLogin());
            $stm->bindValue(2, $usuario->getSenha());
            $stm->bindValue(3, $usuario->getNome());
            $stm->bindValue(4, $usuario->getEmail());
            $stm->bindValue(5, $usuario->getTelefone());
            $stm->bindValue(6, $usuario->getCelular());
            $stm->bindValue(7, $usuario->getIdNivel());
            $stm->bindValue(8, $usuario->getId());
            
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
            
            $SQL = "UPDATE tbl_usuario SET situacao = ? WHERE id = ?";
            
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
            
            $SQL = "DELETE FROM tbl_usuario WHERE id = ?";
            
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
        
        public function obterAutenticacao($usuario, $senha){
            
            $conexao = ConexaoBanco::obterConexao();
            
            $SQL = "SELECT nome, nivel FROM view_usuario_nivel WHERE situacao = 1 AND login = ? AND senha = ?";
            
            $stm = $conexao->prepare($SQL);
            
            $stm->bindParam(1, $usuario);
            $stm->bindParam(2, $senha);
            
            $stm->execute();
            
            $stm->setFetchMode(PDO::FETCH_ASSOC);
            
            $resultSet = $stm->fetch();
            
            $usuario = new Usuario();
            
            $usuario->setNome(utf8_encode($resultSet["nome"]));
            $usuario->setNivel(utf8_encode($resultSet["nivel"]));
            
            $conexao = null;
            
            return $usuario;
            
        }
        
    }

?>