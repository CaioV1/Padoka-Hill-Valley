<?php 

    class Promocao{
        
        private $id;
        private $idProduto;
        private $nomeProduto;
        private $desconto;
        private $dataInicio;
        private $dataFim; 
        private $situacao;
        private $precoOriginal;
        private $precoPromocao;
        private $descricao;
        private $caminhoImagem;
        
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
        
        public function setNomeProduto($nomeProduto){
            
            $this->nomeProduto = $nomeProduto;
            
        }
        
        public function getNomeProduto(){
            
            return $this->nomeProduto;
            
        }
        
        public function setDesconto($desconto){
            
            $this->desconto = $desconto;
            
        }
        
        public function getDesconto(){
            
            return $this->desconto;
            
        }
        
        public function setDataInicio($dataInicio){
            
            $this->dataInicio = $dataInicio;
            
        }
        
        public function getDataInicio(){
            
            return $this->dataInicio;
            
        }
        
        public function setDataFim($dataFim){
            
            $this->dataFim = $dataFim;
            
        }
        
        public function getDataFim(){
            
            return $this->dataFim;
            
        }
        
        public function setSituacao($situacao){
            
            $this->situacao = $situacao;
            
        }
        
        public function getSituacao(){
            
            return $this->situacao;
            
        }
        
        public function setPrecoOriginal($precoOriginal){
            
            $this->precoOriginal = $precoOriginal;
            
        }
        
        public function getPrecoOriginal(){
            
            return $this->precoOriginal;
            
        } 
        
        public function setPrecoPromocao($precoPromocao){
            
            $this->precoPromocao = $precoPromocao;
            
        }
        
        public function getPrecoPromocao(){
            
            return $this->precoPromocao;
            
        }
        
        public function setDescricao($descricao){
            
            $this->descricao = $descricao;
            
        }
        
        public function getDescricao(){
            
            return $this->descricao;
            
        }
        
        public function setCaminhoImagem($caminhoImagem){
            
            $this->caminhoImagem = $caminhoImagem;
            
        }
        
        public function getCaminhoImagem(){
            
            return $this->caminhoImagem;
            
        }
        
    }

?>