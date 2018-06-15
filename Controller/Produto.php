<?php

    class Produto{

        private $id;
        private $nome;
        private $preco;
        private $descricao;
        private $quantidade;
        private $caminhoImagem;
        private $situacao;
        private $idSubcategoria;
        private $subcategoria;

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

        public function setPreco($preco){

            $this->preco = $preco;

        }

        public function getPreco(){

            return $this->preco;

        }

        public function setDescricao($descricao){

            $this->descricao = $descricao;

        }

        public function getDescricao(){

            return $this->descricao;

        }

        public function setQuantidade($quantidade){

            $this->quantidade = $quantidade;

        }

        public function getQuantidade(){

            return $this->quantidade;

        }

        public function setCaminhoImagem($caminhoImagem){

            $this->caminhoImagem = $caminhoImagem;

        }

        public function getCaminhoImagem(){

            return $this->caminhoImagem;

        }

        public function setSituacao($situacao){

            $this->situacao = $situacao;

        }

        public function getSituacao(){

            return $this->situacao;

        }

        public function setSubcategoria($subcategoria){

            $this->subcategoria = $subcategoria;

        }

        public function getSubcategoria(){

            return $this->subcategoria;

        }

        public function setIdSubcategoria($idSubcategoria){

            $this->idSubcategoria = $idSubcategoria;

        }

        public function getIdSubcategoria(){

            return $this->idSubcategoria;

        }

    }

?>
