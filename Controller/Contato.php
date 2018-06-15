<?php 

    class Contato{
        
        private $id;
        private $nome;
        private $telefone;
        private $celular;
        private $email;
        private $profissao;
        private $sexo;
        private $infoProduto;
        private $sugestaoCritica;
        
        public function setId($id){
            
            $this->id = $id;
            
        }
        
        public function getId(){
            
            return $this->id;
            
        }
        
        public function setNome($nome){
            
            $this->nome = $nome;
            
        }
        
        public function getNome(){
            
            return $this->nome;
            
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
        
        public function setEmail($email){
            
            $this->email = $email;
            
        }
        
        public function getEmail(){
            
            return $this->email;
            
        }
        
        public function setProfissao($profissao){
            
            $this->profissao = $profissao;
            
        }
        
        public function getProfissao(){
            
            return $this->profissao;
            
        }
        
        public function setSexo($sexo){
            
            $this->sexo = $sexo;
            
        }
        
        public function getSexo(){
            
            return $this->sexo;
            
        }
        
        public function setInfoProduto($infoProduto){
            
            $this->infoProduto = $infoProduto;
            
        }
        
        public function getInfoProduto(){
            
            return $this->infoProduto;
            
        }
        
        public function setSugestaoCritica($sugestaoCritica){
            
            $this->sugestaoCritica = $sugestaoCritica;
            
        }
        
        public function getSugestaoCritica(){
            
            return $this->sugestaoCritica;
            
        }
        
    }

?>