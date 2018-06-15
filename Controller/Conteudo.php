<?php 

    class Conteudo{
        
        private $id;
        private $idPagina;
        private $titulo;
        private $caminhoImagem;
        private $texto;
        private $pagina;
        private $situacao;
        
        public function setId($id){
            
            $this->id = $id;
            
        }
        
        public function getId(){
            
            return $this->id;
            
        }
        
        public function setIdPagina($idPagina){
            
            $this->idPagina = $idPagina;
            
        }
        
        public function getIdPagina(){
            
            return $this->idPagina;
            
        }
        
        public function setTitulo($titulo){
            
            $this->titulo = $titulo;
            
        }
        
        public function getTitulo(){
            
            return $this->titulo;
            
        }
        
        public function setCaminhoImagem($caminhoImagem){
            
            $this->caminhoImagem = $caminhoImagem;
            
        }
        
        public function getCaminhoImagem(){
            
            return $this->caminhoImagem;
            
        }
        
        public function setTexto($texto){
            
            $this->texto = $texto;
            
        }
        
        public function getTexto(){
            
            return $this->texto;
            
        }
        
        public function setPagina($pagina){
            
            $this->pagina = $pagina;
            
        }
        
        public function getPagina(){
            
            return $this->pagina;
            
        }
        
        public function setSituacao($situacao){
            
            $this->situacao = $situacao;
            
        }
        
        public function getSituacao(){
            
            return $this->situacao;
            
        }
        
    }

?>