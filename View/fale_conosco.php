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
            Fale Conosco - Padoka Hill Valley
        </title>
        <meta charset="utf-8">
        <link rel = "shortcut icon" href = "Imagens/icone.png">
        <link type="text/css" rel="stylesheet" href="CSS/style.css">
        <link type="text/css" rel="stylesheet" href="CSS/style_fale_conosco.css">
        <script src="JQuery/jquery-3.3.1.js"></script>
        <script src="JavaScript/validation_script.js"></script>
        <script src="CMS/JavaScript/crud_contato_script.js"></script>
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
                    <div class = "item_nav" style = "width:150px;color:#e09900;">
                        Fale Conosco
                    </div>    
                </nav>
                <div id = "login">
                    <button id="btn_login">Entre</button>   
                </div>
            </div>    
        </header>
        <form name="frm_autenticao" method="post" action="fale_conosco.php">
            <div id = "modal" class="modal" style="display:<?=$erro == "" ? "none" : "block"?>">
                <div class="modal_content">
                    <div class="close">&times;</div>
                    <div class = "img_login"><img src="Imagens/imagens_home/user.png" alt="Login"></div>
                    <div id = "message_login">Digite o seu nome de usuário e senha</div>
                    <div style="height:50px;width:640px;margin-top:20px;padding-left:60px;font-size:30px;font-family:Arial;">
                        Usuário:
                    </div>
                    <input type="text" class="text_login" name="txt_login" style="width:600px;margin-left:50px;">
                    <div style="height:50px;width:640px;margin-top:20px;padding-left:60px;font-size:30px;font-family:Arial;">
                        Senha:
                    </div>
                    <input type="password" class="text_login" name="txt_senha" style="width:600px;margin-left:50px;">
                    <div class="erro"><?=$erro?></div>
                    <input type="submit" name="btn_entrar" class="submit" value="Entrar"> 
                </div>    
            </div>
        </form>
        <script src="JavaScript/modal_script.js"></script>
        <main>
            <form name="frm_fale_conosco" method="get" action="fale_conosco.php">
                <div id = "main_container">
                    <div id = "padoka_icon">
                        <img src="Imagens/icone2.png" alt="Ícone da Padoka Hill Valley" title="Ícone da Padoka Hill Valley">
                    </div>    
                    <div id = title>
                        Nos ajude a melhorar nosso serviço
                    </div>    
                    <div id = "form_container">
                        <div class="input_container">
                            <div class="input_title">
                                Nome:
                            </div>
                            <input type="text" name="txt_nome" id="txt_nome" class="text_input" pattern="[a-z A-Z ã Ã õ Õ é É ô Ô ê Ê ç Ç .]*" placeholder="Digite seu nome" title="Digite somente o seu nome" onkeypress="return validacao(event, 'letras', 'alerta_nome', '')">
                            <div class="warning_input" id = "alerta_nome">*</div>
                        </div>    
                        <div class="input_container">
                            <div class="input_title">
                                Telefone:
                            </div>
                            <input type="text" name="txt_telefone" class="text_input" pattern="[0-9]{2} [0-9]{4}-[0-9]{4}" placeholder="Ex: 11 3678-4323" title="Siga o exemplo: 11 3678-4323. E digite o número do seu telefone" id = "telefone" onkeypress="return validacao(event, 'numeros_contato', 'alerta_telefone', 'telefone')">
                        </div>
                        <div class="input_container">
                            <div class="input_title">
                                Celular:
                            </div>
                            <input type="text" name="txt_celular" class="text_input" pattern="[0-9]{2} [0-9]{5}-[0-9]{4}" placeholder="Ex: 11 93678-4323" title="Siga o exemplo: 11 93678-4323. E digite o número do seu celular" id="celular" onkeypress="return validacao(event, 'numeros_contato', 'alerta_celular', 'celular')">
                            <div class="warning_input" id = "alerta_celular">*</div>
                        </div>
                        <div class="input_container">
                            <div class="input_title">
                                E-mail:
                            </div>
                            <input type="text" name="txt_email" id="txt_email" class="text_input" pattern="[a-z A-Z 0-9 _ -]+@+[a-z]+.+[a-z]" placeholder="Ex: exemplo@hotmail.com" title="Siga o exemplo: exemplo@hotmail.com . E digite somente o seu e-mail" onkeypress="return validacao(event, 'email', 'alerta_email', '')">
                            <div class="warning_input" id = "alerta_email">*</div>
                        </div>
                        <div class="input_container">
                            <div class="input_title">
                                Profissão:
                            </div>
                            <input type="text" name="txt_profissao" id="txt_profissao" class="text_input" pattern="[a-z A-Z ã Ã õ Õ é É ô Ô ê Ê ç Ç]*" placeholder="Digite a sua profissão" title="Digite somente a sua profissão" onkeypress="return validacao(event, 'letras', 'alerta_profissao')">
                            <div class="warning_input" id = "alerta_profissao">*</div>
                        </div>
                        <div class="input_container">
                            <div class="input_title">
                                Sexo:
                            </div>
                            <input type="radio" name="rdo_sexo" class="radio_input" value="F"><div style="width:100px;height:50px;float:left;font-family:Arial;color:#000000;font-size:20px;margin-top:24px;">Feminino</div>
                            <input type="radio" name="rdo_sexo" class="radio_input" value="M"><div style="width:100px;height:50px;float:left;font-family:Arial;color:#000000;font-size:20px;margin-top:24px;">Masculino</div>
                            <div class="warning_input">*</div>
                        </div>
                        <div class="input_container" id = "info_promo">
                            <div class="input_title" style="width:250px;">
                                Informações do Produto:
                            </div>
                            <textarea name="txt_info_produto" id="txt_info"></textarea>
                        </div>
                        <div class="input_container" id="sugestao">
                            <div class="input_title" style="width:200px;">
                                Sugestões/Críticas:
                            </div>
                            <textarea name="txt_sugestoes" id="txt_sugestoes"></textarea>
                        </div>
                        <div class="error_message" id="error"></div> 
                        <input type="button" class="button_send" value="Enviar" name="btn_enviar" id="btn_enviar">
                    </div>    
                </div>    
            </form>    
        </main>  
        <footer>
            <?php require_once('footer.php'); ?>
        </footer>    
    </body>    
</html>    