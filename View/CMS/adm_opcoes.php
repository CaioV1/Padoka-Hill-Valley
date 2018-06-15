<!DOCTYPE html>

<?php

    $pagina = "";

   if(isset($_GET["pagina"])){

       $pagina = $_GET["pagina"];

   }

    $acao = "Autenticação";

    require_once("../../Model/UsuarioDAO.php");

    $usuario = new Usuario();

    session_start();

    $usuarioDAO = new UsuarioDAO();

    $usuario = $usuarioDAO->obterAutenticacao($_SESSION["login"], $_SESSION["senha"]);

    if(!isset($_SESSION["login"]) || $usuario->getNome() == ""){

        header("location:../../index.php");

    }

    if(isset($_POST["btn_login"])){

        session_destroy();

        header("location:../../index.php");

    }

    $s = '"Sem Permissão"';

?>

<html>
    <head>
        <title>
            CMS | Opções
        </title>
        <link type="text/css" rel="stylesheet" href="CSS/style.css">
        <link type="text/css" rel="stylesheet" href="CSS/style_adm_opcoes.css">
        <link rel = "shortcut icon" href = "Imagens/imagens_gerais/icon.png">
        <meta charset="utf-8">
    </head>
    <body>
        <header>
            <div id = "header_content">
                <a href="index.php">
                    <div id = "header_title">
                        CMS
                    </div>
                    <div id = "header_icon">
                        <img src="Imagens/imagens_gerais/icone3.png">
                    </div>
                </a>
                <nav>
                    <div class = "nav_item">
                        <a <?=$usuario->getNivel() == "Administrador" || $usuario->getNivel() == "Operador Básico" ? "href='adm_opcoes.php?pagina=conteúdo'" : "onclick='alert(".$s.")'"?>>
                            <div class = "item_icon">
                                <img src="Imagens/imagens_gerais/<?php echo($pagina == "conteúdo" ? "conteudo_clicado.png" : "conteudo.png"); ?>">
                            </div>
                            <div class = "item_name" style="color:<?php echo($pagina == "conteúdo" ? "#E09900" : "#F5F5DC"); ?>;">
                                Adiministração<br>
                                Conteúdo
                            </div>
                        </a>
                    </div>
                    <div class = "nav_item">
                        <a <?=$usuario->getNivel() == "Administrador" || $usuario->getNivel() == "Operador Básico" ? "href='adm_fale_conosco.php'" : "onclick='alert(".$s.")'"?>>
                            <div class = "item_icon">
                                <img src="Imagens/imagens_gerais/fale_conosco.png">
                            </div>
                            <div class = "item_name">
                                Adiministração<br>
                                Fale Conosco
                            </div>
                        </a>
                    </div>
                    <div class = "nav_item">
                        <a <?=$usuario->getNivel() == "Administrador" || $usuario->getNivel() == "Cataloguista" ? "href='adm_opcoes.php?pagina=produtos'" : "onclick='alert(".$s.")'"?>>
                            <div class = "item_icon">
                                <img src="Imagens/imagens_gerais/<?php echo($pagina == "produtos" ? "produtos_clicado.png" : "produtos.png"); ?>">
                            </div>
                            <div class = "item_name" style="color:<?php echo($pagina == "produtos" ? "#E09900" : "#F5F5DC"); ?>;">
                                Adiministração<br>
                                Produtos
                            </div>
                        </a>
                    </div>
                    <div class = "nav_item">
                        <a <?=$usuario->getNivel() == "Administrador" || $usuario->getNivel() == "Operador Básico" ? "href='adm_opcoes.php?pagina=usuarios'" : "onclick='alert(".$s.")'"?>>
                            <div class = "item_icon">
                                <img src="Imagens/imagens_gerais/<?php echo($pagina == "usuarios" ? "usuarios_clicado.png" : "usuarios.png"); ?>">
                            </div>
                            <div class = "item_name" style="color:<?php echo($pagina == "usuarios" ? "#E09900" : "#F5F5DC"); ?>;">
                                Adiministração<br>
                                Usuários
                            </div> 
                        </a>    
                    </div>    
                </nav>
                <form name="frm_login" method="post" action="index.php">
                <div id = "login">
                    Bem vindo<br>
                    <?=$usuario->getNome()?><br>
                    <input type="submit" id = "button_login" name="btn_login" value="Sair">
                </div>
                </form>
            </div>
        </header>
        <div id = "main">
            <div id = "main_content" <?=$pagina == "produtos" ? "style='padding-top:100px;height:1200px;'" : "" ?>>
                <div class="content_option" style = "display:<?php echo($pagina == "usuarios" ? "block" : "none"); ?>;">
                    <a href="adm_niveis.php">
                        <div class="icon_option">
                            <img src="Imagens/imagens_adm_opcoes/level_icon.png">
                        </div>
                        <div class="title_option">
                            Controle de Níveis
                        </div>
                    </a>
                </div>
                <div class="content_option" style="margin-top:200px;display:<?php echo($pagina == "usuarios" ? "block" : "none"); ?>;">
                    <a href="adm_usuarios.php">
                        <div class="icon_option">
                            <img src="Imagens/imagens_adm_opcoes/user_control.png" style="width:120px;height:120px;margin-top:10px;margin-left:30px;">
                        </div>
                        <div class="title_option">
                            Controle de Usuários
                        </div>
                     </a>
                </div>
                <div class="content_option" style="display:<?php echo($pagina == "produtos" ? "block" : "none"); ?>;">
                    <a href="adm_produto.php">
                        <div class="icon_option">
                            <img src="Imagens/imagens_adm_opcoes/product.png" style="width:120px;height:120px;margin-top:10px;margin-left:30px;">
                        </div>
                        <div class="title_option">
                            Controle de Produtos
                        </div>
                     </a>
                </div>
                <div class="content_option" style="margin-top:100px;display:<?php echo($pagina == "produtos" ? "block" : "none"); ?>;">
                    <a href="adm_promocoes.php">
                        <div class="icon_option">
                            <img src="Imagens/imagens_adm_opcoes/promotions.png" style="width:120px;height:120px;margin-top:10px;margin-left:30px;">
                        </div>
                        <div class="title_option">
                            Controle de Promoções
                        </div>
                     </a>
                </div>
                <div class="content_option" style="margin-top:100px;display:<?php echo($pagina == "produtos" ? "block" : "none"); ?>;">
                    <a href="adm_destaques.php">
                        <div class="icon_option">
                            <img src="Imagens/imagens_adm_opcoes/featured.png" style="width:120px;height:120px;margin-top:10px;margin-left:30px;">
                        </div>
                        <div class="title_option">
                            Controle de Destaques
                        </div>
                     </a>
                </div>
                <div class="content_option" style="margin-top:100px;display:<?php echo($pagina == "produtos" ? "block" : "none"); ?>;">
                    <a href="adm_categorias.php">
                        <div class="icon_option">
                            <img src="Imagens/imagens_adm_opcoes/category.png" style="width:120px;height:120px;margin-top:10px;margin-left:30px;">
                        </div>
                        <div class="title_option">
                            Controle de Categorias
                        </div>
                     </a>
                </div>
                <div class="content_option" style="margin-top:100px;display:<?php echo($pagina == "produtos" ? "block" : "none"); ?>;">
                    <a href="adm_subcategorias.php">
                        <div class="icon_option">
                            <img src="Imagens/imagens_adm_opcoes/subcategory.png" style="width:120px;height:120px;margin-top:10px;margin-left:30px;">
                        </div>
                        <div class="title_option">
                            Controle de Subcategorias
                        </div>
                     </a>
                </div>
                <div class="content_option" style="display:<?php echo($pagina == "conteúdo" ? "block" : "none"); ?>;">
                    <a href="adm_conteudo.php">
                        <div class="icon_option">
                            <img src="Imagens/imagens_adm_opcoes/content.png" style="width:120px;height:120px;margin-top:10px;margin-left:30px;">
                        </div>
                        <div class="title_option">
                            Controle de Conteúdo
                        </div>
                     </a>
                </div>
                <div class="content_option" style="margin-top:200px;display:<?php echo($pagina == "conteúdo" ? "block" : "none"); ?>;">
                    <a href="adm_localidade.php">
                        <div class="icon_option">
                            <img src="Imagens/imagens_adm_opcoes/location.png" style="width:120px;height:120px;margin-top:10px;margin-left:30px;">
                        </div>
                        <div class="title_option">
                            Controle de Localização
                        </div>
                     </a>
                </div>
            </div>
        </div>
        <footer>
            <div id = "footer_content">
                <div id = "footer_copyright">
                    © 2018 Padoka Hill Valley | Desenvolvido por Caio Victor
<!--                    <img src = "Imagens/imagens_gerais/icone3.png">-->
                </div>
            </div>
        </footer>
    </body>
</html>
