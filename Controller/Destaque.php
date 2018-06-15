<?php 

    class Destaque{
        
        private $id;
        private $idProduto;
        private $nome;
        private $preco;
        private $info;
        private $situacao;
        
        public function setId($id){
            
            $this->id = $id;
            
        }
        
        public function getId(){
            
            return $this->id;
            
        }
        
        public function setIdProduto($idProduto){
            
            $this->idProduto = $idProduto;
            
        }
        
        public function getIdProduto(){
            
            return $this->idProduto;
            
        }
        
        public function setNome($nome){
            
            $this->nome = $nome;
            
        }
        
        public function getNome(){
            
            return $this->nome;
            
        }
        
        public function setPreco($preco){
            
            $this->preco = $preco;
            
        }
        
        public function getPreco(){
            
            return $this->preco;
            
        }
        
        public function setInfo($info){
            
            $this->info = $info;
            
        }
        
        public function getInfo(){
            
            return $this->info;
            
        }
        
        public function setSituacao($situacao){
            
            $this->situacao = $situacao;
            
        }
        
        public function getSituacao(){
            
            return $this->situacao;
            
        }
        
    }

?>