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
            CMS | Promoções
        </title>
        <link type="text/css" rel="stylesheet" href="CSS/style.css">
        <link type="text/css" rel="stylesheet" href="CSS/style_adm_promocoes.css">
        <link rel = "shortcut icon" href = "Imagens/imagens_gerais/icon.png">
        <meta charset="utf-8">
        <script src="JQuery/jquery-3.3.1.js"></script>
        <script src="JavaScript/modal_script.js"></script>
        <script src="JavaScript/crud_promocao_script.js"></script>
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
                        <div class = "item_icon">
                            <img src="Imagens/imagens_gerais/produtos_clicado.png">
                        </div>
                        <div class = "item_name" style="color:#E09900;">
                            Adiministração<br>
                            Produtos
                        </div>
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
        <form name="frm_promocoes" method="get" action="adm_promocoes.php">
            <div id = "main">
                <div id = "main_content">
                    <a href="adm_opcoes.php?pagina=produtos">
                        <div id="icon_back">
                            <img src="Imagens/imagens_adm_usuario/arrow.png" title="Voltar" alt="Voltar">
                        </div>
                    </a>
                    <div id = "title">Gerenciamento de Promoções</div>
                    <button id = "button_register" type = "button" onclick="abrirModal('modal')">Cadastrar Promoção</button>
                    <div id = "table_content">
                        <table style="margin-left:auto;margin-right:auto;" id="table">
                        </table>
                    </div>
                </div>
            </div>
            <div id = "modal" class = "modal">
                <div class = "modal_content">
                    <div class="close" onclick="obterTodos()">&times;</div>
                    <div id = "title_register"></div>
                    <div class = "input_content" style="margin-top:5px;">
                        <div class = "input_title">
                            Desconto
                        </div>
                        <input type="text" name="txt_desconto" id="txt_desconto" placeholder="Digite a porcentagem do desconto" class="input_register">
                    </div>
                    <div class = "input_content" style="margin-top:5px;">
                        <div class = "input_title">
                            Data do Início
                        </div>
                        <input type="text" name="txt_data_inicio" id="txt_data_inicio" placeholder="Digite a data de início da promoção" class="input_register">
                    </div>
                    <div class = "input_content" style="margin-top:5px;">
                        <div class = "input_title">
                            Data do Fim
                        </div>
                        <input type="text" name="txt_data_fim" id="txt_data_fim" placeholder="Digite a data de término da promoção" class="input_register">
                    </div>
                    <div class = "input_content" style="margin-top:5px;">
                        <div class = "input_title">
                            Produtos
                        </div>
                        <select class = "input_register" name="slt_produto" id="slt_produto">
                        </select>
                    </div>
                    <div id = "button_save">
                        <input type="button" name="btn_save" id="btn_save" class="button_commands">
                    </div>
                    <div id = "button_cancel">
                        <button name="btn_cancel" type="button" class="button_commands" onclick="obterTodos()">Cancelar</button>
                    </div>
                </div>
            </div>
        </form>
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
