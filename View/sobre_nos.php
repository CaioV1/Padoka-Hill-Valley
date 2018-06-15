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
            Sobre Nós - Padoka Hill Valley
        </title>
        <meta charset="utf-8">
        <link rel = "shortcut icon" href = "Imagens/icone.png">
        <link type="text/css" rel="stylesheet" href="CSS/style.css">
        <link type="text/css" rel="stylesheet" href="CSS/style_sobre_nos.css">
        <script src="JQuery/jquery-3.3.1.js"></script> 
        <script>
        
                $(document).ready(function(){
                    
                    $.post("../router.php", {pagina:"Sobre Nós"}).done(function(dados){
                        
                        $("#main_store").html(dados);
                        
                    });
                    
                });
        
        </script>
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
                    <a href="produtos.php">
                        <div class = "item_nav">
                            Produtos
                        </div>
                    </a>
                    <div class = "item_nav" style = "color:#e09900;">
                        Sobre
                    </div>
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
        <form name="frm_autenticao" method="post" action="sobre_nos.php">
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
            </div>    
        </main>  
        <footer> 
            <?php require_once('footer.php'); ?>
        </footer>    
    </body>    
</html>    