<?php

    class Subcategoria{

        private $id;
        private $nome;
        private $idCategoria;
        private $categoria;
        private $situacao;

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

        public function setCategoria($categoria){

            $this->categoria = $categoria;

        }

        public function getCategoria(){

            return $this->categoria;

        }

        public function setIdCategoria($idCategoria){

            $this->idCategoria = $idCategoria;

        }

        public function getIdCategoria(){

            return $this->idCategoria;

        }

        public function setSituacao($situacao){

            $this->situacao = $situacao;

        }

        public function getSituacao(){

            return $this->situacao;

        }

    }

?>
