<!DOCTYPE html>

<?php

    $acao = "";

    require_once("Model/UsuarioDAO.php");

    $usuarioDAO = new UsuarioDAO();

    session_start();

    $erro = "";

    if(isset($_POST["txt_login"])){

        if($usuarioDAO->obterAutenticacao($_POST["txt_login"], md5($_POST["txt_senha"])) != ""){

            //echo($usuarioDAO->obterAutenticacao($_POST["txt_login"], md5($_POST["txt_senha"])));

            $_SESSION["login"] = $_POST["txt_login"];
            $_SESSION["senha"] = md5($_POST["txt_senha"]);

            header("location:View/CMS/index.php");

        } else {
            
//            echo("!!!!!!!!!!!!!!!!!!!!!\n!!!!!!!!!!!!!!!!!!!!!!!!!!\n!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!");

            $erro = "Digite o nome de usuário e senha corretamente para entrar no CMS";

        }

    }

?>

<html>
    <head>
        <title>
            Padoka Hill Valley
        </title>
        <meta charset="utf-8">
        <link type="text/css" rel="stylesheet" href="View/CSS/style.css">
        <link type="text/css" rel="stylesheet" href="View/CSS/style_index.css">
        <link rel="shortcut icon" href="View/Imagens/icone.png">
        <script src="View/JQuery/jquery-3.3.1.js"></script>
        <script src="View/JavaScript/slide_script.js"></script>
        <script src="View/JavaScript/modal2_script.js"></script>
        <script src="View/JavaScript/index_script.js"></script>
    </head>
    <body>
        <header>
            <div id = "header_holder">
                <div id = "icon">
                   <img src="View/Imagens/icone2.png" alt="Ícone da Padoka Hill Valley" title="Ícone da Padoka Hill Valley">
                </div>
                <nav>
                    <img src="View/Imagens/menu.png">
                    <div class = "item_nav" id = "home">
                        Home
                    </div>
                    <a href="View/produtos.php">
                        <div class = "item_nav">
                            Produtos
                        </div>
                    </a>
                    <a href="View/sobre_nos.php">
                        <div class = "item_nav">
                            Sobre
                        </div>
                    </a>
                    <a href="View/servicos.php">
                        <div class = "item_nav" style = "width:125px;">
                            Serviços
                        </div>
                    </a>
                    <a href="View/lojas.php">
                        <div class = "item_nav">
                            Lojas
                        </div>
                    </a>
                    <a href="View/fale_conosco.php">
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
                        Quantidade
                    </div> 
                    <div class="query" id="quantidade">
                        20 unidades
                    </div>
                    <div class="query_title">
                        Categoria
                    </div> 
                    <div class="query" id="categoria">
                        Pão
                    </div>
                    <div class="query_title">
                        Subcategoria
                    </div> 
                    <div class="query" id="subcategoria">
                        Massa de Polvilho
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
        <form name="frm_autenticao" method="post" action="index.php">
            <div id = "modal" class="modal" style="display:<?=$erro == "" ? "none" : "block"?>">
                <div class="modal_content">
                    <div class="close">&times;</div>
                    <div class = "img_login"><img src="View/Imagens/imagens_home/user.png" alt="Login"></div>
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
        <script src="View/JavaScript/modal_script.js"></script>
        <main>
            <div id = "main_store">
                <section id = "slider">
                    <div class = "nav_slider" style="margin-left:10px;padding-bottom:20px;" onclick="slideAnterior(1)">
                        &#10094;
                    </div>
                    <div class = "nav_slider" style="margin-left:1210px;padding-bottom:20px;" onclick="proximoSlide(1)">
                        &#10095;
                    </div>
                    <div id="img_1" class="img_slider">
                        <img src="View/Imagens/imagens_home/AB-lifestyle-4-1300x500.jpg" alt="Imagem exemplo 1">
                    </div>
                    <div id="img_2" class="img_slider" style="display:none;">
                        <img src="View/Imagens/imagens_home/about1-1300x500.jpg" alt="Imagem exemplo 2">
                    </div>
                    <div id="img_3" class="img_slider" style="display:none;">
                        <img src="View/Imagens/imagens_home/brdjms-1300x500.png" alt="Imagem exemplo 3">
                    </div>
                    <div id="slider_dots">
                        <div class="dot active" onclick="escolherSlide(1)">
                        </div>
                        <div class="dot" onclick="escolherSlide(2)">
                        </div>
                        <div class="dot" onclick="escolherSlide(3)">
                        </div>
                    </div>
                </section>
                <section id = "products">
                    <div id = "products_list">
                    </div>
                    <div id = "products_icons"></div>
                    <div id = "social_medias">
<!--                        R<br>E<br>D<br>E<br>S<br><br>S<br>O<br>C<br>I<br>A<br>I<br>S<br>-->
                        <div class = "social_medias_logos">
                            <img src="View/Imagens/imagens_home/twitter.png" alt="Rede Social Twitter" title="Rede Social Twitter">
                        </div>
                        <div class = "social_medias_logos">
                            <img src="View/Imagens/imagens_home/facebook.png" alt="Rede Social Facebook" title="Rede Social Facebook">
                        </div>
                        <div class = "social_medias_logos" style = "margin-top:5px;">
                            <img src="View/Imagens/imagens_home/instagram.png" alt="Rede Social Instagram" title="Rede Social Instagram">
                        </div>
                    </div>
                </section>
            </div>
        </main>
        <footer>
            <div id = "footer_container">
                <div id ="footer_content">
                    <div id = "footer_title">
                        Padoka Hill Valley
                    </div> 
                    <div id="footer_link">
                        |<a href="../index.php">Home </a><br> |
                        <a href="produtos.php">Produtos </a><br>  |
                        <a href="sobre_nos.php">Sobre </a><br> | 
                        <a href="servicos.php">Serviços </a><br> | 
                        <a href="lojas.php">Lojas </a><br> |
                        <a href="fale_conosco.php">Fale Conosco</a>
                    </div>    
                </div>
                <div id="footer_copyright"> 
                    © 2018 |<br><img src="View/Imagens/icone3.png" alt="Icone da Padoka Hill Valley">
                    <br>
                    Desenvolvido por Caio Victor
                    <br>
                    Versão 1.0 
                </div>
            </div>  
        </footer>
    </body>
</html>
