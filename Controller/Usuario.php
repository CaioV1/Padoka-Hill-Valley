<?php 

    class Usuario{
        
        private $id;
        private $login;
        private $senha;
        private $nome;
        private $email;
        private $telefone;
        private $celular;
        private $situacao;
        private $idNivel;
        private $nivel;
        
        public function setId($id){
            
            $this->id = $id;
            
        }
        
        public function getId(){
            
            return $this->id;
            
        }
        
        public function setLogin($login){
            
            $this->login = $login;
            
        }
        
        public function getLogin(){
            
            return $this->login;
            
        }
        
        public function setSenha($senha){
            
            $this->senha = $senha;
            
        }
        
        public function getSenha(){
            
            return $this->senha;
            
        }
        
        public function setNome($nome){
            
            $this->nome = $nome;
            
        }
        
        public function getNome(){
            
            return $this->nome;
            
        }
        
        public function setEmail($email){
            
            $this->email = $email;
            
        }
        
        public function getEmail(){
            
            return $this->email;
            
        }
        
        public function setTelefone($telefone){
            
            $this->telefone = $telefone;
            
        }
        
        public function getTelefone(){
            
            return $this->telefone;
            
        }
        
        public function setCelular($celular){
            
            $this->celular = $celular;
            
        }
        
        public function getCelular(){
            
            return $this->celular;
            
        }
        
        public function setSituacao($situacao){
            
            $this->situacao = $situacao;
            
        }
        
        public function getSituacao(){
            
            return $this->situacao;
            
        }
        
        public function setIdNivel($idNivel){
            
            $this->idNivel = $idNivel; 
            
        }
        
        public function getIdNivel(){
            
            return $this->idNivel;
            
        }
        
        public function setNivel($nivel){
            
            $this->nivel = $nivel; 
            
        }
        
        public function getNivel(){
            
            return $this->nivel;
            
        }
            
    }

?>