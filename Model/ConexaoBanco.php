<?php

    //Criando constantes para conectar ao banco;
//     define("host", "192.168.0.2");
//     define("usuario", "pc2920181");
//     define("senha", "senai127");
//     define("nomeBanco", "dbpc2920181");

    define("host", "localhost");
    define("usuario", "root");
    define("senha", "bcd127");
    define("nomeBanco", "db_padaria");

    class ConexaoBanco{

        public static function obterConexao(){

            //Verificando se a conexão irá gerar erros;
            try{

                //Criando a conexão;
                $conexao = new PDO("mysql:host=".host.";dbname=".nomeBanco, usuario, senha);

                //Gerando um relatório de erros caso ocorra;
                $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //Se gerar o erro, o armazena na variável "$e" e mostra na tela;
            } catch(PDOException $e){

                //Mensagem de erro para o usuário concatenada com o erro em si;
                echo("<font color = 'red'>Erro ao conectar com banco. Contate o administrador.</font>".$e->getMessage());

            }

            //Retornando a váriavel de conexão para realizar os métodos da biblioteca PDO;
            return $conexao;

        }

    }

?>
