<!DOCTYPE html>
<?php

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
            CMS | Home
        </title>
        <link type="text/css" rel="stylesheet" href="CSS/style.css">
        <link type="text/css" rel="stylesheet" href="CSS/style_home.css">
        <link rel = "shortcut icon" href = "Imagens/imagens_gerais/icon.png">
        <meta charset="utf-8">
        <script src="JQuery/jquery-3.3.1.js"></script>
        <script src="JavaScript/Chart.min.js"></script>
        <script src="JavaScript/script_graphic.js"></script>    
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
                                <img src="Imagens/imagens_gerais/conteudo.png">
                            </div>
                            <div class = "item_name">
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
                                <img src="Imagens/imagens_gerais/produtos.png">
                            </div>
                            <div class = "item_name">
                                Adiministração<br>
                                Produtos
                            </div>
                        </a>
                    </div>
                    <div class = "nav_item">
                        <a <?=$usuario->getNivel() == "Administrador" || $usuario->getNivel() == "Operador Básico" ? "href='adm_opcoes.php?pagina=usuarios'" : "onclick='alert(".$s.")'"?>>
                            <div class = "item_icon">
                                <img src="Imagens/imagens_gerais/usuarios.png">
                            </div>
                            <div class = "item_name">
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
            <div id = "main_content">
                <div class="content_graphics">
                    <canvas id="graphic"></canvas>   
                </div>    
                <div class="title">
                    Administração de Conteúdo
                </div>
                <div class="content">
                    <div class="sub_menus">
                        <a <?=$usuario->getNivel() == "Administrador" || $usuario->getNivel() == "Operador Básico" ? "href='adm_conteudo.php'" : "onclick='alert(".$s.")'"?>>
                            <div class="menu">
                                <img src="Imagens/imagens_adm_opcoes/content.png">
                            </div>
                        </a>
                        <a <?=$usuario->getNivel() == "Administrador" || $usuario->getNivel() == "Operador Básico" ? "href='adm_localidade.php'" : "onclick='alert(".$s.")'"?>>
                            <div class="menu">
                                <img src="Imagens/imagens_adm_opcoes/location.png">
                            </div>
                        </a>
                    </div>
                </div>
                <div class="title">
                    Administração de Produtos
                </div>
                <div class="content" style="width:1200px;">
                    <div class="sub_menus" style="width:1200px;margin-left:30px;">
                        <a <?=$usuario->getNivel() == "Administrador" || $usuario->getNivel() == "Cataloguista" ? "href='adm_produto.php'" : "onclick='alert(".$s.")'"?>>
                            <div class="menu" style="margin-left:0px;">
                                <img src="Imagens/imagens_adm_opcoes/product.png">
                            </div>
                        </a>
                        <a <?=$usuario->getNivel() == "Administrador" || $usuario->getNivel() == "Cataloguista" ? "href='adm_promocoes.php'" : "onclick='alert(".$s.")'"?>>
                            <div class="menu" style="margin-left:35px;">
                                <img src="Imagens/imagens_adm_opcoes/promotions.png">
                            </div>
                        </a>
                        <a <?=$usuario->getNivel() == "Administrador" || $usuario->getNivel() == "Cataloguista" ? "href='adm_destaques.php'" : "onclick='alert(".$s.")'"?>>
                            <div class="menu" style="margin-left:35px;">
                                <img src="Imagens/imagens_adm_opcoes/featured.png">
                            </div>
                        </a>
                        <a <?=$usuario->getNivel() == "Administrador" || $usuario->getNivel() == "Cataloguista" ? "href='adm_categorias.php'" : "onclick='alert(".$s.")'"?>>
                            <div class="menu" style="margin-left:35px;">
                                <img src="Imagens/imagens_adm_opcoes/category.png">
                            </div>
                        </a>
                        <a <?=$usuario->getNivel() == "Administrador" || $usuario->getNivel() == "Cataloguista" ? "href='adm_subcategorias.php'" : "onclick='alert(".$s.")'"?>>
                            <div class="menu" style="margin-left:35px;">
                                <img src="Imagens/imagens_adm_opcoes/subcategory.png">
                            </div>
                        </a>
                    </div>
                </div>
                <div class="title">
                    Administração de Usuários
                </div>
                <div class="content">
                    <div class="sub_menus">
                        <a <?=$usuario->getNivel() == "Administrador" || $usuario->getNivel() == "Operador Básico" ? "href='adm_niveis.php'" : "onclick='alert(".$s.")'"?>>
                            <div class="menu">
                                <img src="Imagens/imagens_adm_usuario/level_icon.png">
                            </div>
                        </a>
                        <a <?=$usuario->getNivel() == "Administrador" || $usuario->getNivel() == "Operador Básico" ? "href='adm_usuarios.php'" : "onclick='alert(".$s.")'"?>>
                            <div class="menu">
                                <img src="Imagens/imagens_adm_usuario/user_control.png">
                            </div>
                        </a>
                    </div>
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
