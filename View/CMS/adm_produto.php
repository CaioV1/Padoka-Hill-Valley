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
            CMS | Produto
        </title>
        <link type="text/css" rel="stylesheet" href="CSS/style.css">
        <link type="text/css" rel="stylesheet" href="CSS/style_adm_produto.css">
        <link rel = "shortcut icon" href = "Imagens/imagens_gerais/icon.png">
        <meta charset="utf-8">
        <script src="JQuery/jquery-3.3.1.js"></script>
        <script src="JavaScript/modal_script.js"></script>
        <script src="JQuery/jquery.min.js"></script>
        <script src="JQuery/jquery.form.js"></script>
        <script src="JavaScript/crud_produto_script.js"></script>
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
        <form name="frm_image" method="post" enctype="multipart/form-data" action="upload.php" id="frm_image">
            <input type="file" name="fle_product" id="fle_product" style="display:none;">
        </form>
        <form name="frm_produto" method="get" action="adm_produto.php">
            <div id = "main" style="min-height:850px;height:auto;">
                <div id = "main_content">
                    <a href="adm_opcoes.php?pagina=produtos">
                        <div id="icon_back">
                            <img src="Imagens/imagens_adm_usuario/arrow.png" title="Voltar" alt="Voltar">
                        </div>
                    </a>
                    <div id = "title">Gerenciamento de Produtos</div>
                    <button id = "button_register" type = "button" onclick="abrirModal('modal')">Cadastrar Produto</button>
                    <div id="content_products">
                    </div>
                </div>
            </div>
            <div id = "modal" class = "modal">
                <div class = "modal_content">
                    <div id = "title_register"></div>
                    <div class="close" onclick="obterTodos()">&times;</div>
                    <div id = "img_product">
                    </div>
                    <label for="fle_product" id="button_image">Selecionar</label>
                    <input type="hidden" name="txt_imagem" id="txt_imagem">
                    <div class = "input_content" style="margin-top:5px;">
                        <div class = "input_title">
                            Nome
                        </div>
                        <input type="text" name="txt_nome" id="txt_nome" placeholder="Digite o nome do produto" class="input_register">
                    </div>
                    <div class = "input_content" style="margin-top:5px;">
                        <div class = "input_title">
                            Preço
                        </div>
                        <input type="text" name="txt_preco" id="txt_preco" placeholder="Digite o preço do produto" class="input_register">
                    </div>
                    <div class = "input_content" style="margin-top:5px;">
                        <div class = "input_title">
                            Quantidade
                        </div>
                        <input type="text" name="txt_quantidade" id="txt_quantidade" placeholder="Digite a quantidade desse produto em estoque" class="input_register">
                    </div>
                    <div class = "input_content" style="margin-top:10px;">
                        <div class = "input_title">
                            Subcategoria
                        </div>
                        <select class = "input_register" style="width:300px;" name = "slt_subcategoria" id="slt_subcategoria">
                        </select>
                    </div>
                    <div class = "input_content" style="margin-top:5px;height:210px;">
                        <div class = "input_title" style="width:300px;">
                            Descrição
                        </div>
                        <textarea name="txt_descricao" id="txt_descricao"></textarea>
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
