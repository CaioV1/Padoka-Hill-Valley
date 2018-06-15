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
            CMS | Localidade
        </title>
        <link type="text/css" rel="stylesheet" href="CSS/style.css">
        <link type="text/css" rel="stylesheet" href="CSS/style_adm_localidade.css">
        <link rel = "shortcut icon" href = "Imagens/imagens_gerais/icon.png">
        <meta charset="utf-8">
        <script src="JavaScript/modal_script.js"></script>
        <script src="JQuery/jquery-3.3.1.js"></script>
        <script src="JavaScript/crud_localidade_script.js"></script>
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
                        <div class = "item_icon">
                            <img src="Imagens/imagens_gerais/conteudo_clicado.png">
                        </div>
                        <div class = "item_name" style="color:#E09900;">
                            Adiministração<br>
                            Conteúdo
                        </div>
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
        <form name="frm_niveis" method="get" action="adm_niveis.php">
            <div id = "main">
                <div id = "main_content">
                    <a href="adm_opcoes.php?pagina=conteúdo">
                        <div id="icon_back">
                            <img src="Imagens/imagens_adm_usuario/arrow.png" title="Voltar" alt="Voltar">
                        </div>
                    </a>
                    <div id = "title">Gerenciamento de Localidades</div>
                    <button id = "button_register" type = "button" onclick="abrirModal('modal')">Cadastrar Localidade</button>
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
                            Logradouro
                        </div>
                        <input type="text" name="txt_logradouro" id="txt_logradouro" class="input_register" placeholder="Digite o logradouro(Ex: Av. Exemplo, 30)">
                    </div>
                    <div class = "input_content" style="margin-top:5px;">
                        <div class = "input_title">
                            CEP
                        </div>
                        <input type="text" name="txt_cep" id="txt_cep" class="input_register" placeholder="Digite o CEP">
                    </div>
                    <div class = "input_content" style="margin-top:5px;">
                        <div class = "input_title">
                            Latitude
                        </div>
                        <input type="text" name="txt_latitude" id="txt_latitude" class="input_register" placeholder="Digite a latitude">
                    </div>
                    <div class = "input_content" style="margin-top:5px;">
                        <div class = "input_title">
                            Longitude
                        </div>
                        <input type="text" name="txt_longitude" id="txt_longitude" class="input_register" placeholder="Digite a longitude">
                    </div>
                    <div class = "input_content" style="margin-top:5px;">
                        <div class = "input_title">
                            Horario Abertura
                        </div>
                        <input type="text" name="txt_abertura" id="txt_abertura" class="input_register" placeholder="Digite o horário de abertura">
                    </div>
                    <div class = "input_content" style="margin-top:5px;">
                        <div class = "input_title">
                            Horario Fechamento
                        </div>
                        <input type="text" name="txt_fechamento" id="txt_fechamento" class="input_register" placeholder="Digite o horário de fechamento">
                    </div>
                    <div class = "input_content" style="margin-top:5px;">
                        <div class = "input_title">
                            UF
                        </div>
                        <select name="slt_estado" class="input_register" id="slt_estado">
                        </select>
                    </div>
                    <div class = "input_content" style="margin-top:5px;">
                        <div class = "input_title">
                            Cidade
                        </div>
                        <select name="slt_cidade" class="input_register" id="slt_cidade">
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
