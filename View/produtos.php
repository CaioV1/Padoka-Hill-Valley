<!DOCTYPE html> 
<?php

    $acao = "Realizar Autenticação";

    require_once("../Model/UsuarioDAO.php");
    
    $usuarioDAO = new UsuarioDAO();

    session_start();

    $erro = "";

    if(isset($_POST["txt_login"])){
        
        if($usuarioDAO->obterAutenticacao($_POST["txt_login"], md5($_POST["txt_senha"])) != ""){
        
        //echo($usuarioDAO->obterAutenticacao($_POST["txt_login"], md5($_POST["txt_senha"])));
        
        $_SESSION["login"] = $_POST["txt_login"];
        $_SESSION["senha"] = md5($_POST["txt_senha"]);
        
        header("location:CMS/index.php");
        
        } else {

            $erro = "Digite o nome de usuário e  senha corretamente para entrar no CMS";

        }    
        
    }
        
?>
<html>
    <head>
        <title>
            Produtos - Padoka Hill Valley
        </title>
        <meta charset="utf-8">
        <link rel = "shortcut icon" href = "Imagens/icone.png">
        <link type="text/css" rel="stylesheet" href="CSS/style.css">
        <link type="text/css" rel="stylesheet" href="CSS/style_produtos.css">
        <script src="JQuery/jquery-3.3.1.js"></script> 
        <script src="JavaScript/modal2_script.js"></script>
        <script src="JavaScript/produtos_script.js"></script>
    </head>
    <body>   
        <header>
            <div id = "header_holder">
                <div id = "icon">
                   <img src="Imagens/icone2.png" alt="Ícone da Padoka Hill Valley" title="Ícone da Padoka Hill Valley"> 
                </div>    
                <nav>
                    <img src="Imagens/menu.png">
                    <a href="../index.php">
                        <div class = "item_nav">
                            Home
                        </div>
                    </a>    
                    <div class = "item_nav" style = "color:#e09900;">
                        Produtos
                    </div>
                    <a href="sobre_nos.php">
                        <div class = "item_nav">
                            Sobre
                        </div>
                    </a>    
                    <a href="servicos.php">
                        <div class = "item_nav" style = "width:125px;">
                            Serviços
                        </div>
                    </a>
                    <a href="lojas.php">
                        <div class = "item_nav">
                            Lojas
                        </div>
                    </a>
                    <a href="fale_conosco.php">
                        <div class = "item_nav" style = "width:150px;">
                            Fale Conosco
                        </div>
                    </a>    
                </nav>
                <div id = "login">
                    <button id="btn_login">Entre</button>   
                </div>
            </div>    
        </header>
        <div id = "modal_details" class="modal_details">
            <div class="modal_content_details">
                <div class="query_title" style="width:400px;margin-left:100px;margin-top:20px;margin-bottom:20px;color:#E09900;float:left;font-size:30px;" id="produto">
                    Pão de Queijo
                </div>
                <div class="close_details" onclick="fecharModal('modal_details')">&times;</div>
                <div id="modal_image">
                    <img src="Imagens/imagens_produtos/074723041b0a7af8260cb128f90532a4.jpg">    
                </div>
                <div id="modal_information"> 
                    <div class="query_title">
                        Preço
                    </div> 
                    <div class="query" id="preco">
                        R$ 0,25
                    </div>
                    <div class="query_title">
                        Desconto
                    </div> 
                    <div class="query" id="desconto">
                        50%
                    </div>
                    <div class="query_title">
                        Quantidade
                    </div> 
                    <div class="query" id="quantidade">
                        20 unidades
                    </div>
                    <div class="query_title">
                        Data do Início
                    </div> 
                    <div class="query" id="data_inicio">
                        05/06/2018
                    </div>
                    <div class="query_title">
                        Data do Fim
                    </div> 
                    <div class="query" id="data_fim">
                        05/06/2018
                    </div>
                    <div class="query_title">
                        Descrição
                    </div> 
                    <div class="query" id="descricao" style="min-height:50px;height:auto;">
                        Biscoito com cobertura de chocolate e feito de amido de milho.
                    </div>
                </div>    
            </div>
        </div>
        <form name="frm_autenticao" method="post" action="produtos.php">
            <div id = "modal" class="modal" style="display:<?=$erro == "" ? "none" : "block"?>">
                <div class="modal_content">
                    <div class="close">&times;</div>
                    <div class = "img_login"><img src="Imagens/imagens_home/user.png" alt="Login"></div>
                    <div id = "message_login">Digite o seu nome de usuário e senha</div>
                    <div style="height:50px;width:640px;margin-top:20px;padding-left:60px;font-size:30px;font-family:Arial;">
                        Usuário:
                    </div>
                    <input type="text" class="text_input" name="txt_login" style="width:600px;margin-left:50px;">
                    <div style="height:50px;width:640px;margin-top:20px;padding-left:60px;font-size:30px;font-family:Arial;">
                        Senha:
                    </div>
                    <input type="password" class="text_input" name="txt_senha" style="width:600px;margin-left:50px;">
                    <div class="erro"><?=$erro?></div>
                    <input type="submit" name="btn_entrar" class="submit" value="Entrar"> 
                </div>    
            </div>
        </form>   
        <script src="JavaScript/modal_script.js"></script>
        <main>
            <div id = "main_store">
                <section id = "promotion">
                </section>
                <section id="highlight">
                </section>    
            </div>    
        </main>  
        <footer> 
            <?php require_once('footer.php'); ?>
        </footer>    
    </body>    
</html>    