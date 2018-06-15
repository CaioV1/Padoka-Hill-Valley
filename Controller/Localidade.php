<?php 

    class Localidade{
        
        private $id;
        private $idCidade;
        private $idEstado;
        private $cidade;
        private $estado;
        private $sigla;
        private $logradouro;
        private $cep;
        private $latitude;
        private $longitude;
        private $horarioAbertura;
        private $horarioFechamento;
        private $situacao;
        
        public function setId($id){
            
            $this->id = $id;
            
        }
        
        public function getId(){
            
            return $this->id;
            
        }
        
        public function setIdCidade($idCidade){
            
            $this->idCidade = $idCidade;
            
        }
        
        public function getIdCidade(){
            
            return $this->idCidade;
            
        }
        
        public function setIdEstado($idEstado){
            
            $this->idEstado = $idEstado;
            
        }
        
        public function getIdEstado(){
            
            return $this->idEstado;
            
        }
        
        public function setCidade($cidade){
            
            $this->cidade = $cidade;
            
        }
        
        public function getCidade(){
            
            return $this->cidade;
            
        }
        
        public function setEstado($estado){
            
            $this->estado = $estado;
            
        }
        
        public function getEstado(){
            
            return $this->estado;
            
        }
        
        public function setSigla($sigla){
            
            $this->sigla = $sigla;
            
        }
        
        public function getSigla(){
            
            return $this->sigla;
            
        }
        
        public function setLogradouro($logradouro){
            
            $this->logradouro = $logradouro;
            
        }
        
        public function getLogradouro(){
            
            return $this->logradouro;
            
        }
        
        public function setCEP($cep){
            
            $this->cep = $cep;
            
        }
        
        public function getCEP(){
            
            return $this->cep;
            
        }
        
        public function setLatitude($latitude){
            
            $this->latitude = $latitude;
            
        }
        
        public function getLatitude(){
            
            return $this->latitude;
            
        }
        
        public function setLongitude($longitude){
            
            $this->longitude = $longitude;
            
        }
        
        public function getLongitude(){
            
            return $this->longitude;
            
        }
        
        public function setHorarioAbertura($horarioAbertura){
            
            $this->horarioAbertura = $horarioAbertura;
            
        }
        
        public function getHorarioAbertura(){
            
            return $this->horarioAbertura;
            
        }
        
        public function setHorarioFechamento($horarioFechamento){
            
            $this->horarioFechamento = $horarioFechamento;
            
        }
        
        public function getHorarioFechamento(){
            
            return $this->horarioFechamento;
            
        }
        
        public function setSituacao($situacao){
            
            $this->situacao = $situacao;
            
        }
        
        public function getSituacao(){
            
            return $this->situacao;
            
        }
        
    }

?>