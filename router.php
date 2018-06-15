<?php

    session_start();

    if($_POST["pagina"]){

        switch($_POST["pagina"]){
                
            case "Index":
                
                require_once("Model/ProdutoDAO.php");

                $produtoDAO = new ProdutoDAO();
                
                echo(json_encode($produtoDAO->obterCliques()));

                break;

//################################################################## Administração de Níveis ######################################################################

            case "Administração de Níveis":

                require_once("Controller/Nivel.php");
                require_once("Model/NivelDAO.php");

                $nivelDAO = new NivelDAO();

                if(isset($_POST["acao"])){

                    switch($_POST["acao"]){

                        case "obterTodos":

                            echo("<tr>");
                            echo("<td class = 'columns_title'>");
                            echo("Nome");
                            echo("</td>");
                            echo("<td class = 'columns_title'>");
                            echo("Excluir");
                            echo("</td>");
                            echo("<td class = 'columns_title'>");
                            echo("Editar");
                            echo("</td>");
                            echo("<td class = 'columns_title'>");
                            echo("Situação");
                            echo("</td>");
                            echo("</tr>");

                            $listaNiveis = array();

                            $listaNiveis = $nivelDAO->obterTodos();

                            foreach($listaNiveis as $nivel){

                                echo("<tr>");
                                echo("<td class = 'columns'>");
                                echo(utf8_encode($nivel->getNome()));
                                echo("</td>");
                                echo("<td class = 'columns'>");
                                echo("<img src='Imagens/imagens_gerais/delete.png' onclick='remover(".$nivel->getId().")'>");
                                echo("</td>");
                                echo("<td class = 'columns'>");
                                echo("<img src='Imagens/imagens_gerais/edit.png' onclick='obterUm(".$nivel->getId().")'>");
                                echo("</td>");
                                echo("<td class = 'columns'>");
                                echo("<img src='Imagens/imagens_adm_usuario/check_true.png' style='display:".($nivel->getSituacao() == 1 ? "block" : "none").";margin-left:auto;margin-right:auto;' onclick='atualizarSituacao(".$nivel->getId().", true)'>");
                                echo("<img src='Imagens/imagens_adm_usuario/check_false.png' style='display:".($nivel->getSituacao() == 0 ? "block" : "none").";margin-left:auto;margin-right:auto;' onclick='atualizarSituacao(".$nivel->getId().", false)'>");
                                echo("</td>");
                                echo("</tr>");

                            }

                            break;

                        case "inserir":

                            $nivel = new Nivel();

                            $nivel->setNome(utf8_decode($_POST["nome"]));
                            $nivel->setSituacao(1);

                            if(!$nivelDAO->inserir($nivel)){

                                echo("<font color='red'>Erro ao registrar o nível. Confira os campos preenchidos. Se o erro persistir, contate o suporte.</font>");

                            }

                            break;

                        case "obterUm":

                            $_SESSION["id"] = $_POST["id"];

                            echo(json_encode($nivelDAO->obterUm($_POST["id"])));

                            break;

                        case "atualizar":

                            $nivel = new Nivel();

                            $nivel->setId($_SESSION["id"]);
                            $nivel->setNome(utf8_decode($_POST["nome"]));

                            if(!$nivelDAO->atualizar($nivel)){

                                echo("<font color='red'>Erro ao atualizar o nível. Confira os campos preenchidos. Se o erro persistir, contate o suporte.</font>");

                            }

                            break;

                        case "atualizarSituacao":

                            $situacao = $_POST["situacao"];
                            $id = $_POST["id"];

                            if(!$nivelDAO->atualizarSituacao($situacao, $id)){

                                echo("<font color='red'>Erro ao atualizar a estado do nível. Confira os campos preenchidos. Se o erro persistir, contate o suporte.</font>");

                            }

                            break;

                        case "remover":

                            $id = $_POST["id"];

                            if(!$nivelDAO->remover($id)){

                                echo("<font color='red'>Erro ao remover o nível. Confira os campos preenchidos. Se o erro persistir, contate o suporte.</font>");

                            }

                            break;

                    }

                }

                break;
//################################################################## Administração de Categorias ######################################################################

                case "Administração de Categorias":

                    require_once("Controller/Categoria.php");
                    require_once("Model/CategoriaDAO.php");

                    $categoriaDAO = new CategoriaDAO();

                    if(isset($_POST["acao"])){

                        switch($_POST["acao"]){

                            case "obterTodos":

                                echo("<tr>");
                                echo("<td class = 'columns_title'>");
                                echo("Nome");
                                echo("</td>");
                                echo("<td class = 'columns_title'>");
                                echo("Excluir");
                                echo("</td>");
                                echo("<td class = 'columns_title'>");
                                echo("Editar");
                                echo("</td>");
                                echo("<td class = 'columns_title'>");
                                echo("Situação");
                                echo("</td>");
                                echo("</tr>");

                                $listaCategorias = array();

                                $listaCategorias = $categoriaDAO->obterTodos();

                                foreach($listaCategorias as $categoria){

                                    echo("<tr>");
                                    echo("<td class = 'columns'>");
                                    echo(utf8_encode($categoria->getNome()));
                                    echo("</td>");
                                    echo("<td class = 'columns'>");
                                    echo("<img src='Imagens/imagens_gerais/delete.png' onclick='remover(".$categoria->getId().")'>");
                                    echo("</td>");
                                    echo("<td class = 'columns'>");
                                    echo("<img src='Imagens/imagens_gerais/edit.png' onclick='obterUm(".$categoria->getId().")'>");
                                    echo("</td>");
                                    echo("<td class = 'columns'>");
                                    echo("<img src='Imagens/imagens_adm_usuario/check_true.png' style='display:".($categoria->getSituacao() == 1 ? "block" : "none").";margin-left:auto;margin-right:auto;' onclick='atualizarSituacao(".$categoria->getId().", true)'>");
                                    echo("<img src='Imagens/imagens_adm_usuario/check_false.png' style='display:".($categoria->getSituacao() == 0 ? "block" : "none").";margin-left:auto;margin-right:auto;' onclick='atualizarSituacao(".$categoria->getId().", false)'>");
                                    echo("</td>");
                                    echo("</tr>");

                                }

                                break;

                            case "inserir":

                                $categoria = new Categoria();

                                $categoria->setNome(utf8_decode($_POST["nome"]));
                                $categoria->setSituacao(1);

                                if(!$categoriaDAO->inserir($categoria)){

                                    echo("<font color='red'>Erro ao registrar a categoria. Confira os campos preenchidos. Se o erro persistir, contate o suporte.</font>");

                                }

                                break;

                            case "obterUm":

                                $_SESSION["id"] = $_POST["id"];

                                echo(json_encode($categoriaDAO->obterUm($_POST["id"])));

                                break;

                            case "atualizar":

                                $categoria = new Categoria();

                                $categoria->setId(utf8_decode($_SESSION["id"]));
                                $categoria->setNome($_POST["nome"]);

                                if(!$categoriaDAO->atualizar($categoria)){

                                    echo("<font color='red'>Erro ao atualizar a categoria. Confira os campos preenchidos. Se o erro persistir, contate o suporte.</font>");

                                }

                                break;

                            case "atualizarSituacao":

                                $situacao = $_POST["situacao"];
                                $id = $_POST["id"];

                                if(!$categoriaDAO->atualizarSituacao($situacao, $id)){

                                    echo("<font color='red'>Erro ao atualizar o estado da categoria. Confira os campos preenchidos. Se o erro persistir, contate o suporte.</font>");

                                }

                                break;

                            case "remover":

                                $id = $_POST["id"];

                                if(!$categoriaDAO->remover($id)){

                                    echo("<font color='red'>Erro ao remover a categoria. Confira os campos preenchidos. Se o erro persistir, contate o suporte.</font>");

                                }

                                break;

                        }

                    }

                    break;

//################################################################## Administração de Subcategorias ######################################################################

                case "Administração de Subcategorias":

                    require_once("Controller/Subcategoria.php");
                    require_once("Model/SubcategoriaDAO.php");
                    require_once("Controller/Categoria.php");
                    require_once("Model/CategoriaDAO.php");

                    $subcategoriaDAO = new SubcategoriaDAO();

                    if(isset($_POST["acao"])){

                        switch($_POST["acao"]){

                            case "obterTodos":

                                echo("<tr>");
                                echo("<td class = 'columns_title'>");
                                echo("Nome");
                                echo("</td>");
                                echo("<td class = 'columns_title'>");
                                echo("Categoria");
                                echo("</td>");
                                echo("<td class = 'columns_title'>");
                                echo("Excluir");
                                echo("</td>");
                                echo("<td class = 'columns_title'>");
                                echo("Editar");
                                echo("</td>");
                                echo("<td class = 'columns_title'>");
                                echo("Situação");
                                echo("</td>");
                                echo("</tr>");

                                $listaSubcategorias = array();

                                $listaSubcategorias = $subcategoriaDAO->obterTodos();

                                foreach($listaSubcategorias as $subcategoria){

                                    echo("<tr>");
                                    echo("<td class = 'columns'>");
                                    echo(utf8_encode($subcategoria->getNome()));
                                    echo("</td>");
                                    echo("<td class = 'columns'>");
                                    echo(utf8_encode($subcategoria->getCategoria()));
                                    echo("</td>");
                                    echo("<td class = 'columns'>");
                                    echo("<img src='Imagens/imagens_gerais/delete.png' onclick='remover(".$subcategoria->getId().")'>");
                                    echo("</td>");
                                    echo("<td class = 'columns'>");
                                    echo("<img src='Imagens/imagens_gerais/edit.png' onclick='obterUm(".$subcategoria->getId().")'>");
                                    echo("</td>");
                                    echo("<td class = 'columns'>");
                                    echo("<img src='Imagens/imagens_adm_usuario/check_true.png' style='display:".($subcategoria->getSituacao() == 1 ? "block" : "none").";margin-left:auto;margin-right:auto;' onclick='atualizarSituacao(".$subcategoria->getId().", true)'>");
                                    echo("<img src='Imagens/imagens_adm_usuario/check_false.png' style='display:".($subcategoria->getSituacao() == 0 ? "block" : "none").";margin-left:auto;margin-right:auto;' onclick='atualizarSituacao(".$subcategoria->getId().", false)'>");
                                    echo("</td>");
                                    echo("</tr>");

                                }

                                break;

                            case "inserir":

                                $subcategoria = new Subcategoria();

                                $subcategoria->setNome(utf8_decode($_POST["nome"]));
                                $subcategoria->setIdCategoria($_POST["id_categoria"]);
                                $subcategoria->setSituacao(1);

                                if(!$subcategoriaDAO->inserir($subcategoria)){

                                    echo("<font color='red'>Erro ao registrar a subcategoria. Confira os campos preenchidos. Se o erro persistir, contate o suporte.</font>");

                                }

                                break;

                            case "obterUm":

                                $_SESSION["id"] = $_POST["id"];

                                echo(json_encode($subcategoriaDAO->obterUm($_POST["id"])));

                                break;

                            case "obterCategorias":

                                $categoriaDAO = new CategoriaDAO();

                                $listaCategorias = array();

                                $listaCategorias = $categoriaDAO->obterTodos();

                                echo("<option value='0'>Selecione uma categoria</option>");

                                foreach($listaCategorias as $categoria){

                                    echo("<option value='".$categoria->getId()."'>".utf8_encode($categoria->getNome())."</option>");

                                }

                                break;

                            case "atualizar":

                                $subcategoria = new Subcategoria();

                                $subcategoria->setId(utf8_decode($_SESSION["id"]));
                                $subcategoria->setIdCategoria($_POST["id_categoria"]);
                                $subcategoria->setNome($_POST["nome"]);

                                if(!$subcategoriaDAO->atualizar($subcategoria)){

                                    echo("<font color='red'>Erro ao atualizar a subcategoria. Confira os campos preenchidos. Se o erro persistir, contate o suporte.</font>");

                                }

                                break;

                            case "atualizarSituacao":

                                $situacao = $_POST["situacao"];
                                $id = $_POST["id"];

                                if(!$subcategoriaDAO->atualizarSituacao($situacao, $id)){

                                    echo("<font color='red'>Erro ao atualizar o estado da subcategoria. Confira os campos preenchidos. Se o erro persistir, contate o suporte.</font>");

                                }

                                break;

                            case "remover":

                                $id = $_POST["id"];

                                if(!$subcategoriaDAO->remover($id)){

                                    echo("<font color='red'>Erro ao remover a subcategoria. Confira os campos preenchidos. Se o erro persistir, contate o suporte.</font>");

                                }

                                break;

                        }

                    }

                    break;

//################################################################## Administração de Usuários ######################################################################

                case "Administração de Usuários":

                    $acao = $_POST["acao"];

                    require_once("Controller/Usuario.php");
                    require_once("Model/UsuarioDAO.php");
                    require_once("Model/NivelDAO.php");

                    $usuarioDAO = new UsuarioDAO();

                    if(isset($_POST["acao"])){

                        switch($_POST["acao"]){

                            case "obterTodos":

                                echo("<tr>");
                                echo("<td class = 'columns_title'>");
                                echo("Login");
                                echo("</td>");
                                echo("<td class = 'columns_title'>");
                                echo("Nível");
                                echo("</td>");
                                echo("<td class = 'columns_title'>");
                                echo("E-mail");
                                echo("</td>");
                                echo("<td class = 'columns_title'>");
                                echo("Excluir");
                                echo("</td>");
                                echo("<td class = 'columns_title'>");
                                echo("Editar");
                                echo("</td>");
                                echo("<td class = 'columns_title'>");
                                echo("Situação");
                                echo("</td>");
                                echo("</tr>");

                                $listaUsuarios = array();

                                $listaUsuarios = $usuarioDAO->obterTodos();

                                foreach($listaUsuarios as $usuario){

                                    echo("<tr>");
                                    echo("<td class = 'columns'>");
                                    echo(utf8_encode($usuario->getLogin()));
                                    echo("</td>");
                                    echo("<td class = 'columns'>");
                                    echo(utf8_encode($usuario->getNivel()));
                                    echo("</td>");
                                    echo("<td class = 'columns'>");
                                    echo(utf8_encode($usuario->getEmail()));
                                    echo("</td>");
                                    echo("<td class = 'columns'>");
                                    echo("<img src='Imagens/imagens_adm_usuario/delete.png' onclick='remover(".$usuario->getId().")'>");
                                    echo("</td>");
                                    echo("<td class = 'columns'>");
                                    echo("<img src='Imagens/imagens_adm_usuario/edit.png' onclick='obterUm(".$usuario->getId().")'>");
                                    echo("</td>");
                                    echo("<td class = 'columns'>");
                                    echo("<img src='Imagens/imagens_adm_usuario/check_true.png' style='display:".($usuario->getSituacao() == 1 ? "block" : "none").";margin-left:auto;margin-right:auto;' onclick='atualizarSituacao(".$usuario->getId().", true)'>");
                                    echo("<img src='Imagens/imagens_adm_usuario/check_false.png' style='display:".($usuario->getSituacao() == 0 ? "block" : "none").";margin-left:auto;margin-right:auto;' onclick='atualizarSituacao(".$usuario->getId().", false)'>");
                                    echo("</td>");
                                    echo("</tr>");

                                }

                                break;

                            case "obterNiveis":

                                $nivelDAO = new NivelDAO();

                                $listaNiveis = array();

                                $listaNiveis = $nivelDAO->obterAtivos();

                                echo("<option value='0'>Selecione um nível</option>");

                                foreach($listaNiveis as $nivel){

                                    echo("<option value='".$nivel->getId()."'>".utf8_encode($nivel->getNome())."</option>");

                                }

                                break;

                            case "inserir":

                                $usuario = new Usuario();

                                $usuario->setLogin(utf8_decode($_POST["login"]));
                                $usuario->setSenha(md5($_POST["senha"]));
                                $usuario->setNome(utf8_decode($_POST["nome"]));
                                $usuario->setEmail(utf8_decode($_POST["email"]));
                                $usuario->setTelefone($_POST["telefone"]);
                                $usuario->setCelular($_POST["celular"]);
                                $usuario->setIdNivel($_POST["idNivel"]);
                                $usuario->setSituacao(1);

                                if(!$usuarioDAO->inserir($usuario)){

                                    echo("<font color='red'>Erro ao registrar o usuário. Confira os campos preenchidos. Se o erro persistir, contate o suporte.</font>");

                                }

                                break;

                            case "obterUm":

                                $_SESSION["id"] = $_POST["id"];

                                echo(json_encode($usuarioDAO->obterUm($_POST["id"])));

                                break;

                            case "atualizar":

                                $usuario = new Usuario();

                                $usuario->setId($_SESSION["id"]);
                                $usuario->setLogin(utf8_decode($_POST["login"]));
                                $usuario->setSenha(md5($_POST["senha"]));
                                $usuario->setNome(utf8_decode($_POST["nome"]));
                                $usuario->setEmail(utf8_decode($_POST["email"]));
                                $usuario->setTelefone($_POST["telefone"]);
                                $usuario->setCelular($_POST["celular"]);
                                $usuario->setIdNivel($_POST["idNivel"]);
                                $usuario->setSituacao(1);

                                if(!$usuarioDAO->atualizar($usuario)){

                                    echo("<font color='red'>Erro ao atualizar o usuário. Confira os campos preenchidos. Se o erro persistir, contate o suporte.</font>");

                                }

                                break;

                            case "atualizarSituacao":

                                $situacao = $_POST["situacao"];
                                $id = $_POST["id"];

                                if(!$usuarioDAO->atualizarSituacao($situacao, $id)){

                                    echo("<font color='red'>Erro ao atualizar a estado do usuário. Confira os campos preenchidos. Se o erro persistir, contate o suporte.</font>");

                                }

                                break;

                            case "remover":

                                $id = $_POST["id"];

                                echo($id);

                                if(!$usuarioDAO->remover($id)){

                                    echo("<font color='red'>Erro ao remover o usuário. Confira os campos preenchidos. Se o erro persistir, contate o suporte.</font>");

                                }

                                break;

                        }

                    }

                    break;

//################################################################## Administração Fale Conosco ######################################################################

                case "Administração Fale Conosco":

                    require_once("Controller/Contato.php");
                    require_once("Model/ContatoDAO.php");

                    $contatoDAO = new ContatoDAO();

                    if(isset($_POST["acao"])){

                        switch($_POST["acao"]){

                            case "obterTodos":

                                echo("<tr>");
                                echo("<td class = 'columns_title'>");
                                echo("Nome");
                                echo("</td>");
                                echo("<td class = 'columns_title'>");
                                echo("Celular");
                                echo("</td>");
                                echo("<td class = 'columns_title'>");
                                echo("Excluir");
                                echo("</td>");
                                echo("<td class = 'columns_title'>");
                                echo("Consultar");
                                echo("</td>");
                                echo("</tr>");

                                $listaContatos = array();

                                $listaContatos = $contatoDAO->obterTodos();

                                foreach($listaContatos as $contato){

                                    echo("<tr>");
                                    echo("<td class = 'columns'>");
                                    echo(utf8_encode($contato->getNome()));
                                    echo("</td>");
                                    echo("<td class = 'columns'>");
                                    echo(utf8_encode($contato->getCelular()));
                                    echo("</td>");
                                    echo("<td class = 'columns'>");
                                    echo("<img src='Imagens/imagens_adm_usuario/delete.png' onclick='remover(".$contato->getId().")'>");
                                    echo("</td>");
                                    echo("<td class = 'columns'>");
                                    echo("<img src='Imagens/imagens_adm_fale_conosco/more_information.png' onclick='obterUm(".$contato->getId().")'>");
                                    echo("</td>");
                                    echo("</tr>");

                                }

                                break;

                            case "obterUm":

                                $_SESSION["id"] = $_POST["id"];

                                echo(json_encode($contatoDAO->obterUm($_POST["id"])));

                                break;

                            case "remover":

                                $id = $_POST["id"];

                                echo($id);

                                if(!$contatoDAO->remover($id)){

                                    echo("<font color='red'>Erro ao remover o contato. Confira os campos preenchidos. Se o erro persistir, contate o suporte.</font>");

                                }

                                break;

                        }

                    }

                    break;

//################################################################## Fale Conosco ######################################################################

                case "Fale Conosco":

                    require_once("Controller/Contato.php");
                    require_once("Model/ContatoDAO.php");

                    $contatoDAO = new ContatoDAO();

                    $contato = new Contato();

                    $contato->setNome(utf8_decode($_POST["nome"]));
                    $contato->setTelefone($_POST["telefone"]);
                    $contato->setCelular($_POST["celular"]);
                    $contato->setEmail(utf8_decode($_POST["email"]));
                    $contato->setProfissao(utf8_decode($_POST["profissao"]));
                    $contato->setSexo($_POST["sexo"]);
                    $contato->setInfoProduto(utf8_decode($_POST["info"]));
                    $contato->setSugestaoCritica(utf8_decode($_POST["sugestao"]));

                    if(!$contatoDAO->inserir($contato)){

                        echo("<font color='red'>Erro ao registrar o seu contato. Confira os campos preenchidos. Se o erro persistir, contate o suporte.</font>");

                    }

                    break;

//################################################################## Administração de Produtos ######################################################################

                case "Administração de Produtos":

                    require_once("Controller/Produto.php");
                    require_once("Model/ProdutoDAO.php");
                    require_once("Controller/Subcategoria.php");
                    require_once("Model/SubcategoriaDAO.php");

                    $produtoDAO = new ProdutoDAO();

                    if(isset($_POST["acao"])){

                        switch($_POST["acao"]){

                            case "obterTodos":

                                $listaProdutos = array();

                                $listaProdutos = $produtoDAO->obterTodos();

                                $produto = new Produto();

                                $i = 3;

                                $i2 = 0;

                                foreach($listaProdutos as $produto){

                                    $i2 += 1;

                                    if($i == 3){

                                        echo("<section class = 'promotion_line'>");

                                        $i = 0;

                                    }

                                    $i += 1;

                                    echo("<article class='icon_promotion'>");
                                    echo("<div class='product_title'>".utf8_encode($produto->getNome())."</div>");
                                    echo("<div class='img_promotion'>");
                                    echo(utf8_encode("<img src='../".$produto->getCaminhoImagem()."'>"));
                                    echo("</div>");
                                    echo("<div class='product_details'>");
                                    echo("<br>");
                                    echo("<span style='font-weight:bold;'>Preço:</span>R$ ".utf8_encode(number_format($produto->getPreco(), 2, ",", "")));
                                    echo("<br>");
                                    echo("<span style='font-weight:bold;'>Descrição:</span>".utf8_encode($produto->getDescricao()));
                                    echo("<div class = 'commands'>");
                                    echo("<img src='Imagens/imagens_gerais/delete.png' style='margin-left:0px;' onclick='remover(".$produto->getId().")'>");
                                    echo("<img src='Imagens/imagens_gerais/edit.png' onclick='obterUm(".$produto->getId().")'>");
                                    echo("<img src='Imagens/imagens_adm_usuario/check_true.png' style='display:".($produto->getSituacao() == 1 ? "block" : "none").";' onclick='atualizarSituacao(".$produto->getId().", true)'>");
                                    echo("<img src='Imagens/imagens_adm_usuario/check_false.png' style='display:".($produto->getSituacao() == 0 ? "block" : "none").";' onclick='atualizarSituacao(".$produto->getId().", false)'>");
                                    echo("</div>");
                                    echo("</div>");
                                    echo("</article>");

                                    if($i == 3 || $i2 == count($listaProdutos)){

                                        echo("</section>");

                                    }

                                }

                                break;

                            case "inserir":

                                $produto = new Produto();

                                $produto->setNome(utf8_decode($_POST["nome"]));
                                $produto->setPreco($_POST["preco"]);
                                $produto->setDescricao(utf8_decode($_POST["descricao"]));
                                $produto->setQuantidade($_POST["quantidade"]);
                                $produto->setCaminhoImagem(utf8_decode($_POST["imagem"]));
                                $produto->setSituacao(1);
                                $produto->setIdSubcategoria($_POST["id_subcategoria"]);

                                if(!$produtoDAO->inserir($produto)){

                                    echo("<font color='red'>Erro ao registrar o produto. Confira os campos preenchidos. Se o erro persistir, contate o suporte.</font>");

                                }

                                break;

                            case "obterSubcategorias":

                                $subcategoriaDAO = new SubcategoriaDAO();

                                $listaSubcategorias = array();

                                $listaSubcategorias = $subcategoriaDAO->obterTodos();

                                echo("<option value='0'>Selecione uma subcategoria</option>");

                                foreach($listaSubcategorias as $subcategoria){

                                    echo("<option value='".$subcategoria->getId()."'>".utf8_encode($subcategoria->getNome())."</option>");

                                }

                                break;

                            case "obterUm":

                                $_SESSION["id"] = $_POST["id"];

                                echo(json_encode($produtoDAO->obterUm($_POST["id"])));

                                break;

                            case "atualizar":

                                $produto = new Produto();

                                $produto->setId($_SESSION["id"]);
                                $produto->setNome(utf8_decode($_POST["nome"]));
                                $produto->setPreco($_POST["preco"]);
                                $produto->setDescricao(utf8_decode($_POST["descricao"]));
                                $produto->setQuantidade($_POST["quantidade"]);
                                $produto->setCaminhoImagem(utf8_decode($_POST["imagem"]));
                                $produto->setIdSubcategoria($_POST["id_subcategoria"]);

                                echo($produto->getId());

                                if(!$produtoDAO->atualizar($produto)){

                                    echo("<font color='red'>Erro ao atualizar o produto. Confira os campos preenchidos. Se o erro persistir, contate o suporte.</font>");

                                }

                                break;

                            case "atualizarSituacao":

                                $situacao = $_POST["situacao"];
                                $id = $_POST["id"];

                                if(!$produtoDAO->atualizarSituacao($situacao, $id)){

                                    echo("<font color='red'>Erro ao atualizar a estado do produto. Confira os campos preenchidos. Se o erro persistir, contate o suporte.</font>");

                                }

                                break;

                            case "remover":

                                $id = $_POST["id"];

                                if(!$produtoDAO->remover($id)){

                                    echo("<font color='red'>Erro ao remover o produto. Confira os campos preenchidos. Se o erro persistir, contate o suporte.</font>");

                                }

                                break;

                        }

                    }

                    break;

//################################################################## Home ######################################################################

            case "Home":

                require_once("Controller/Produto.php");
                require_once("Model/ProdutoDAO.php");

                $produtoDAO = new ProdutoDAO();

                $listaProdutos = array();

                $listaProdutos = $produtoDAO->obterAleatorio();
    
                $produto = new Produto();

                $i = 3;

                $i2 = 0;

                $modal = '"modal_details"';
                
                echo("<input type='text' id='search_produ' list='products_suggestions' onkeypress='obterSugestoes(event)'>");
                echo("<datalist id='products_suggestions'></datalist>");
                echo("<img src='View/Imagens/imagens_home/more_information.png' id='search_icon' onclick='obterPesquisa()'>");

                foreach($listaProdutos as $produto){

                    $i2 += 1;

                    if($i == 3){

                        echo("<section class = 'products_line'>");

                        $i = 0;

                    }

                    $i += 1;

                    echo("<article class='icon_product'>");
                    echo(utf8_encode("<div class='product_title'>".$produto->getNome()."</div>"));
                    echo("<div class='img_product'>");
                    echo(utf8_encode("<img src='View/".$produto->getCaminhoImagem()."'>"));
                    echo("</div>");
                    echo("<div class='product_details'>");
                    echo("<br>");
                    echo("<span style='font-weight:bold;'>Preço:</span>R$ ".utf8_encode(number_format($produto->getPreco(), 2, ",", "")));
                    echo("<br><br>");
                    echo("<span style='font-weight:bold;'>Descrição:</span>".utf8_encode($produto->getDescricao()));
                    echo("<input type='button' value='Detalhes' name='btn_detalhe' class='button_details' onclick='obterUm(".$produto->getId().")'>");
                    echo("</div>");
                    echo("</article>");

                    if($i == 3 || $i2 == count($listaProdutos)){

                        echo("</section>");

                    }

                }

                break;
                
            case "obterUm":
                
                require_once("Controller/Produto.php");
                require_once("Model/ProdutoDAO.php");

                $produtoDAO = new ProdutoDAO();

                $produtoDAO->clique($_POST["id"]);
                
                echo(json_encode($produtoDAO->obterUm($_POST["id"])));

                break;

            case "Categoria":

                require_once("Controller/Categoria.php");
                require_once("Model/CategoriaDAO.php");
                require_once("Controller/Subcategoria.php");
                require_once("Model/SubcategoriaDAO.php");

                $categoriaDAO = new CategoriaDAO();

                $listaCategorias = array();

                $listaCategorias = $categoriaDAO->obterAtivos();

                $categoria = new Categoria();

                $SubcategoriaDAO = new SubcategoriaDAO();

                $Subcategoria = new Subcategoria();

                foreach ($listaCategorias as $categoria) {

                    echo("<div class='item'>");
                    echo("<div class='item_list'>");
                    echo(utf8_encode($categoria->getNome()));
                    echo("</div>");

                    $listaSubcategorias = array();

                    $listaSubcategorias = $SubcategoriaDAO->obterAtivos($categoria->getId());

                    foreach ($listaSubcategorias as $subcategoria) {

                        echo("<div class='subitem_list' onclick='obterSubcategoria(".$subcategoria->getId().")'>");
                        echo(utf8_encode($subcategoria->getNome()));
                        echo("</div>");

                    }

                    echo("</div>");

                }

                break;

            case "Subcategoria":

                require_once("Controller/Produto.php");
                require_once("Model/ProdutoDAO.php");

                $produtoDAO = new ProdutoDAO();

                $listaProdutos = array();

                $listaProdutos = $produtoDAO->obterPorSubcategoria($_POST["id_subcategoria"]);

                $produto = new Produto();

                $i = 3;

                $i2 = 0;

                foreach($listaProdutos as $produto){

                    $i2 += 1;

                    if($i == 3){

                        echo("<section class = 'products_line'>");

                        $i = 0;

                    }

                    $i += 1;

                    echo("<article class='icon_product'>");
                    echo(utf8_encode("<div class='product_title'>".$produto->getNome()."</div>"));
                    echo("<div class='img_product'>");
                    echo(utf8_encode("<img src='View/".$produto->getCaminhoImagem()."'>"));
                    echo("</div>");
                    echo("<div class='product_details'>");
                    echo("<br>");
                    echo("<span style='font-weight:bold;'>Preço:</span>R$ ".utf8_encode(number_format($produto->getPreco(), 2, ",", "")));
                    echo("<br><br>");
                    echo("<span style='font-weight:bold;'>Descrição:</span>".utf8_encode($produto->getDescricao()));
                    echo("<br>");
                    echo("<input type='button' value='Detalhes' name='btn_detalhe' class='button_details' onclick='obterUm(".$produto->getId().")'>");
                    echo("</div>");
                    echo("</article>");

                    if($i == 3 || $i2 == count($listaProdutos)){

                        echo("</section>");

                    }

                }

                break;
                
            case "Sugestões":
                
                require_once("Model/ProdutoDAO.php");
                
                $produtoDAO = new ProdutoDAO();
                
                $listaProdutos = $produtoDAO->obterSugestoes("%".utf8_decode($_POST["letras"])."%");
                
                foreach($listaProdutos as $produto){
                    
                    echo("<option value='".$produto."'>");
                    
                }
                
                break;
                
            case "obterPesquisa":

                require_once("Controller/Produto.php");
                require_once("Model/ProdutoDAO.php");

                $produtoDAO = new ProdutoDAO();

                $listaProdutos = array();

                $listaProdutos = $produtoDAO->obterPesquisa("%".utf8_decode($_POST["letras"])."%");

                $produto = new Produto();

                $i = 3;

                $i2 = 0;

                $modal = '"modal_details"';
                
                echo("<input type='text' id='search_produ' list='products_suggestions' onkeypress='obterSugestoes(event)'>");
                echo("<datalist id='products_suggestions'></datalist>");
                echo("<img src='View/Imagens/imagens_home/more_information.png' id='search_icon' onclick='obterPesquisa()'>");

                foreach($listaProdutos as $produto){

                    $i2 += 1;

                    if($i == 3){

                        echo("<section class = 'products_line'>");

                        $i = 0;

                    }

                    $i += 1;

                    echo("<article class='icon_product'>");
                    echo(utf8_encode("<div class='product_title'>".$produto->getNome()."</div>"));
                    echo("<div class='img_product'>");
                    echo(utf8_encode("<img src='View/".$produto->getCaminhoImagem()."'>"));
                    echo("</div>");
                    echo("<div class='product_details'>");
                    echo("<br>");
                    echo("<span style='font-weight:bold;'>Preço:</span>R$ ".utf8_encode(number_format($produto->getPreco(), 2, ",", "")));
                    echo("<br><br>");
                    echo("<span style='font-weight:bold;'>Descrição:</span>".utf8_encode($produto->getDescricao()));
                    echo("<input type='button' value='Detalhes' name='btn_detalhe' class='button_details' onclick='obterUm(".$produto->getId().")'>");
                    echo("</div>");
                    echo("</article>");

                    if($i == 3 || $i2 == count($listaProdutos)){

                        echo("</section>");

                    }

                }

                break;

//################################################################## Produtos ######################################################################

             case "Produtos":

                require_once("Controller/Promocao.php");
                require_once("Model/PromocaoDAO.php");

                $promocaoDAO = new PromocaoDAO();

                $listaPromocoes = array();

                $listaPromocoes = $promocaoDAO->obterAtivos();

                $promocao = new Promocao();
                
                $modal = '"modal_details"';

                $i = 4;

                $i2 = 0;

                echo("<div class = 'title'>Promoções</div>");

                foreach($listaPromocoes as $promocao){

                    $i2 += 1;

                    $desconto = 100 * $promocao->getDesconto();

                    $promocao->setPrecoPromocao($promocao->getPrecoOriginal() - ($promocao->getPrecoOriginal() * $promocao->getDesconto()));

                    if($i == 4){

                        echo("<section class = 'promotion_line'>");

                        $i = 0;

                    }

                    $i += 1;

                    echo("<article class='icon_promotion'>");
                    echo(utf8_encode("<div class='product_title'>".$promocao->getNomeProduto()."</div>"));
                    echo("<div class='img_promotion'>");
                    echo(utf8_encode("<img src='".$promocao->getCaminhoImagem()."'>"));
                    echo("</div>");
                    echo("<div class='product_details'>");
                    echo("<br>");
                    echo("<span style='font-weight:bold;'>Preço:</span><span style='text-decoration:line-through;color:#FF0000;'>R$ ".utf8_encode(number_format($promocao->getPrecoOriginal(), 2, ",", "")."</span> R$".number_format($promocao->getPrecoPromocao(), 2, ",", "")));
                    echo("<br><br>");
                    echo("<span style='font-weight:bold;'>Descrição:</span>".utf8_encode($promocao->getDescricao()));
                    echo("<br>");
                    echo("<input type='submit' value='Detalhes' name='btn_detalhe' class='button_details' onclick='obterUm(".$promocao->getId().", ".$promocao->getIdProduto().")'>");
                    echo("</div>");
                    echo("<div class='promotion_title'>");
                    echo(utf8_encode("Desconto ".$desconto."%"));
                    echo("</div>");
                    echo("</article>");

                    if($i == 4 || $i2 == count($listaPromocoes)){

                        echo("</section>");

                    }

                }

                break;

//################################################################## Destaques ######################################################################

            case "Destaques":

                require_once("Controller/Destaque.php");
                require_once("Model/DestaqueDAO.php");

                $destaqueDAO = new DestaqueDAO();

                $listaDestaques = array();

                $listaDestaques = $destaqueDAO->obterAtivos();

                echo("<div class = 'title' style='padding-top:30px;'>Destaques</div>");

                foreach($listaDestaques as $destaque){

                    echo("<div class='highlight_descrition'>");
                    echo(utf8_encode("<div class='highlight_title'>".$destaque->getNome()."</div>"));
                    echo(utf8_encode("<div class='highlight_extra'>".$destaque->getInfo()."</div>"));
                    echo("<div class='highlight_details'>Preço: R$".utf8_encode($destaque->getPreco()."</div>"));
                    echo("</div>");

                }

                break;

//################################################################## Sobre Nós ######################################################################

            case "Sobre Nós":

                require_once("Controller/Conteudo.php");
                require_once("Model/ConteudoDAO.php");

                $conteudoDAO = new ConteudoDAO();

                $listaConteudos = array();

                $listaConteudos = $conteudoDAO->obterAtivos("Sobre");

                foreach($listaConteudos as $conteudo){

                    echo("<section class='about_us_title'>");
                    echo(utf8_encode($conteudo->getTitulo()));
                    echo("</section>");
                    echo("<section class='about_us_image' style='margin-top:40px;'>");
                    echo(utf8_encode("<img src='".$conteudo->getCaminhoImagem()."'>"));
                    echo("</section>");
                    echo("<section class='about_us_text'>'");
                    echo(utf8_encode($conteudo->getTexto()."<hr>"));
                    echo("</section>");

                }

                break;

//################################################################## Serviços ######################################################################

            case "Serviços":

                require_once("Controller/Conteudo.php");
                require_once("Model/ConteudoDAO.php");

                $conteudoDAO = new ConteudoDAO();

                $listaConteudos = array();

                $listaConteudos = $conteudoDAO->obterAtivos(utf8_decode("Serviços"));

                foreach($listaConteudos as $conteudo){

                    echo("<section class='service_title'>");
                    echo(utf8_encode($conteudo->getTitulo()));
                    echo("</section>");
                    echo("<section class='service_image'>");
                    echo(utf8_encode("<img src='".$conteudo->getCaminhoImagem()."'>"));
                    echo("</section>");
                    echo("<section class='service_description'>");
                    echo(utf8_encode($conteudo->getTexto()." <hr>"));
                    echo("</section>");

                }

                break;

//################################################################## Lojas ######################################################################

            case "Lojas":

                require_once("Controller/Localidade.php");
                require_once("Model/LocalidadeDAO.php");

                $localidadeDAO = new LocalidadeDAO();

                $listaLocalidades = array();

                $listaLocalidades = $localidadeDAO->obterAtivos();

                $i = 0;

                foreach($listaLocalidades as $localidade){

                    echo("<section class='store_info'>");
                    echo("<div class='location_info'>");
                    echo("<div class='info_store'>");
                    echo("Endereço: ".utf8_encode($localidade->getLogradouro()));
                    echo("<br><br>Cidade: ".utf8_encode($localidade->getCidade())." (".$localidade->getSigla().")");
                    echo("<br><br>Horário de funcionamento: ".$localidade->getHorarioAbertura()." às ".$localidade->getHorarioFechamento());
                    echo("</div>");
                    echo("<div class='map_store' id='map_".$i."'></div>");
                    echo("<script>");
                    echo("var longiLati = {lat: ".$localidade->getLatitude().", lng: ".$localidade->getLongitude()."};");
                    echo("myMap(longiLati, 'map_".$i."')");
                    echo("</script>");
                    echo("</div>");
                    echo("</section>");

                    $i += 1;

                }

                break;

//################################################################## Administração de Promoções ######################################################################

                case "Administração de Promoções":

                    require_once("Controller/Promocao.php");
                    require_once("Model/PromocaoDAO.php");
                    require_once("Controller/Produto.php");
                    require_once("Model/ProdutoDAO.php");

                    $produtoDAO = new ProdutoDAO();

                    $promocaoDAO = new PromocaoDAO();

                    if(isset($_POST["acao"])){

                        switch($_POST["acao"]){

                            case "obterTodos":

                                $listaPromocoes = array();

                                $listaPromocoes = $promocaoDAO->obterTodos();

                                $promocao = new Promocao();

                                echo("<tr>");
                                echo("<td class = 'columns_title'>");
                                echo("Nome");
                                echo("</td>");
                                echo("<td class = 'columns_title'>");
                                echo("Desconto");
                                echo("</td>");
                                echo("<td class = 'columns_title'>");
                                echo("Novo Preço");
                                echo("</td>");
                                echo("<td class = 'columns_title'>");
                                echo("Excluir");
                                echo("</td>");
                                echo("<td class = 'columns_title'>");
                                echo("Editar");
                                echo("</td>");
                                echo("<td class = 'columns_title'>");
                                echo("Situação");
                                echo("</td>");
                                echo("</tr>");

                                foreach($listaPromocoes as $promocao){

                                    $desconto = $promocao->getDesconto() * 100;

                                    $valorDesconto = $promocao->getDesconto() * $promocao->getPrecoOriginal();

                                    $novoPreco = $promocao->getPrecoOriginal() - $valorDesconto;

                                    echo("<tr>");
                                    echo("<td class = 'columns'>");
                                    echo(utf8_encode($promocao->getNomeProduto()));
                                    echo("</td>");
                                    echo("<td class = 'columns'>");
                                    echo($desconto."%");
                                    echo("</td>");
                                    echo("<td class = 'columns'>");
                                    echo("R$ ".number_format($novoPreco, 2, ",", ""));
                                    echo("</td>");
                                    echo("<td class = 'columns'>");
                                    echo("<img src='Imagens/imagens_gerais/delete.png' onclick='remover(".$promocao->getId().")'>");
                                    echo("</td>");
                                    echo("<td class = 'columns'>");
                                    echo("<img src='Imagens/imagens_gerais/edit.png' onclick='obterUm(".$promocao->getId().")'>");
                                    echo("</td>");
                                    echo("<td class = 'columns'>");
                                    echo("<img src='Imagens/imagens_adm_usuario/check_true.png' style='display:".($promocao->getSituacao() == 1 ? "block" : "none").";margin-left:auto;margin-right:auto;' onclick='atualizarSituacao(".$promocao->getId().", true)'>");
                                    echo("<img src='Imagens/imagens_adm_usuario/check_false.png' style='display:".($promocao->getSituacao() == 0 ? "block" : "none").";margin-left:auto;margin-right:auto;' onclick='atualizarSituacao(".$promocao->getId().", false)'>");
                                    echo("</td>");
                                    echo("</tr>");

                                }

                                break;

                            case "obterProdutos":

                                $listaProdutos = array();

                                $listaProdutos = $produtoDAO->obterTodos();

                                $produto = new Produto();

                                echo("<option value='0'>*Selecione o produto*</option>");

                                foreach($listaProdutos as $produto){

                                    echo("<option value='".$produto->getId()."'>".utf8_encode($produto->getNome())."</option>");

                                }

                                break;

                            case "inserir":

                                $promocao = new Promocao();

                                $desconto = 0;

                                //Verificando se há o sinal de porcentagem no que o usuário digitou;
                                if(strpos($_POST["desconto"], "%")){

                                    //Se tiver, retira o sinal (o parâmetro booleano é para conservar tudo antes do sinal);
                                    $desconto = strstr($_POST["desconto"], "%", true);

                                } else {

                                    $desconto = $_POST["desconto"];
                                }

                                $promocao->setDesconto($desconto / 100);
                                $promocao->setDataInicio($_POST["dataInicio"]);
                                $promocao->setDataFim($_POST["dataFim"]);
                                $promocao->setIdProduto($_POST["idProduto"]);
                                $promocao->setSituacao(1);

                                if(!$promocaoDAO->inserir($promocao)){

                                    echo("<font color='red'>Erro ao registrar o promoção. Confira os campos preenchidos. Se o erro persistir, contate o suporte.</font>");

                                }

                                break;

                            case "obterUm":

                                $_SESSION["id"] = $_POST["id"];
                                
                                $produtoDAO->clique($_POST["id_produto"]);

                                echo(json_encode($promocaoDAO->obterUm($_POST["id"])));

                                break;

                            case "atualizar":

                                $promocao = new Promocao();

                                $desconto = 0;

                                //Verificando se há o sinal de porcentagem no que o usuário digitou;
                                if(strpos($_POST["desconto"], "%")){

                                    //Se tiver, retira o sinal (o parâmetro booleano é para conservar tudo antes do sinal);
                                    $desconto = strstr($_POST["desconto"], "%", true);

                                } else {

                                    $desconto = $_POST["desconto"];
                                }

                                $promocao->setId($_SESSION["id"]);
                                $promocao->setDesconto($desconto / 100);
                                $promocao->setDataInicio($_POST["dataInicio"]);
                                $promocao->setDataFim($_POST["dataFim"]);
                                $promocao->setIdProduto($_POST["idProduto"]);

                                if(!$promocaoDAO->atualizar($promocao)){

                                    echo("<font color='red'>Erro ao atualizar o promoção. Confira os campos preenchidos. Se o erro persistir, contate o suporte.</font>");

                                }

                                break;

                            case "atualizarSituacao":

                                $situacao = $_POST["situacao"];
                                $id = $_POST["id"];

                                if(!$promocaoDAO->atualizarSituacao($situacao, $id)){

                                    echo("<font color='red'>Erro ao atualizar a estado da promoção. Confira os campos preenchidos. Se o erro persistir, contate o suporte.</font>");

                                }

                                break;

                            case "remover":

                                $id = $_POST["id"];

                                if(!$promocaoDAO->remover($id)){

                                    echo("<font color='red'>Erro ao remover o promoção. Confira os campos preenchidos. Se o erro persistir, contate o suporte.</font>");

                                }

                                break;

                                }

                }

                break;

//################################################################## Administração de Destaques ######################################################################

            case "Administração de Destaques":

                require_once("Controller/Destaque.php");
                require_once("Model/DestaqueDAO.php");
                require_once("Controller/Produto.php");
                require_once("Model/ProdutoDAO.php");

                $destaqueDAO = new DestaqueDAO();
                $produtoDAO = new ProdutoDAO();

                if(isset($_POST["acao"])){

                    switch($_POST["acao"]){

                        case "obterTodos":

                            echo("<tr>");
                            echo("<td class = 'columns_title'>");
                            echo("Nome");
                            echo("</td>");
                            echo("<td class = 'columns_title'>");
                            echo("Excluir");
                            echo("</td>");
                            echo("<td class = 'columns_title'>");
                            echo("Editar");
                            echo("</td>");
                            echo("<td class = 'columns_title'>");
                            echo("Situação");
                            echo("</td>");
                            echo("</tr>");

                            $listaDestaques = array();

                            $listaDestaques = $destaqueDAO->obterTodos();

                            foreach($listaDestaques as $destaque){

                                echo("<tr>");
                                echo("<td class = 'columns'>");
                                echo(utf8_encode($destaque->getNome()));
                                echo("</td>");
                                echo("<td class = 'columns'>");
                                echo("<img src='Imagens/imagens_gerais/delete.png' onclick='remover(".$destaque->getId().")'>");
                                echo("</td>");
                                echo("<td class = 'columns'>");
                                echo("<img src='Imagens/imagens_gerais/edit.png' onclick='obterUm(".$destaque->getId().")'>");
                                echo("</td>");
                                echo("<td class = 'columns'>");
                                echo("<img src='Imagens/imagens_adm_usuario/check_true.png' style='display:".($destaque->getSituacao() == 1 ? "block" : "none").";margin-left:auto;margin-right:auto;' onclick='atualizarSituacao(".$destaque->getId().", true)'>");
                                echo("<img src='Imagens/imagens_adm_usuario/check_false.png' style='display:".($destaque->getSituacao() == 0 ? "block" : "none").";margin-left:auto;margin-right:auto;' onclick='atualizarSituacao(".$destaque->getId().", false)'>");
                                echo("</td>");
                                echo("</tr>");

                            }

                            break;

                        case "obterProdutos":

                            $listaProdutos = array();

                                $listaProdutos = $produtoDAO->obterTodos();

                                $produto = new Produto();

                                echo("<option value='0'>*Selecione o produto*</option>");

                                foreach($listaProdutos as $produto){

                                    echo("<option value='".$produto->getId()."'>".utf8_encode($produto->getNome())."</option>");

                                }

                            break;

                        case "inserir":

                            $destaque = new Destaque();

                            $destaque->setInfo(utf8_decode($_POST["info"]));
                            $destaque->setIdProduto($_POST["produto"]);
                            $destaque->setSituacao(1);

                            if(!$destaqueDAO->inserir($destaque)){

                                echo("<font color='red'>Erro ao registrar o destaque. Confira os campos preenchidos. Se o erro persistir, contate o suporte.</font>");

                            }

                            break;

                        case "obterUm":

                            $_SESSION["id"] = $_POST["id"];

                            echo(json_encode($destaqueDAO->obterUm($_POST["id"])));

                            break;

                        case "atualizar":

                            $destaque = new Destaque();

                            $destaque->setId($_SESSION["id"]);
                            $destaque->setInfo(utf8_decode($_POST["info"]));
                            $destaque->setIdProduto($_POST["produto"]);

                            if(!$destaqueDAO->atualizar($destaque)){

                                echo("<font color='red'>Erro ao atualizar o destaque. Confira os campos preenchidos. Se o erro persistir, contate o suporte.</font>");

                            }

                            break;

                        case "atualizarSituacao":

                            $situacao = $_POST["situacao"];
                            $id = $_POST["id"];

                            if(!$destaqueDAO->atualizarSituacao($situacao, $id)){

                                echo("<font color='red'>Erro ao atualizar a estado do destaque. Confira os campos preenchidos. Se o erro persistir, contate o suporte.</font>");

                            }

                            break;

                        case "remover":

                            $id = $_POST["id"];

                            if(!$destaqueDAO->remover($id)){

                                echo("<font color='red'>Erro ao remover o destaque. Confira os campos preenchidos. Se o erro persistir, contate o suporte.</font>");

                            }

                            break;

                    }

                }

                break;

//################################################################## Administração de Conteúdo ######################################################################

                case "Administração de Conteúdo":

                    require_once("Controller/Conteudo.php");
                    require_once("Model/ConteudoDAO.php");

                    $conteudoDAO = new ConteudoDAO();

                    if(isset($_POST["acao"])){

                        switch($_POST["acao"]){

                            case "obterTodos":

                                $listaConteudos = array();

                                $listaConteudos = $conteudoDAO->obterTodos();

                                $conteudo = new Conteudo();

                                foreach($listaConteudos as $conteudo){

                                    echo("<div class='content_page'>");
                                    echo(utf8_encode("<img src='../".$conteudo->getCaminhoImagem()."'>"));
                                    echo("<div class='content_details'>");
                                    echo(utf8_encode($conteudo->getTitulo()));
                                    echo("<br>");
                                    echo("<br>");
                                    echo(utf8_encode($conteudo->getPagina()));
                                    echo("</div>");
                                    echo("</div>");
                                    echo("<div class='commands'>");
                                    echo("<img src='Imagens/imagens_gerais/delete.png' style='margin-left:50px;' onclick='remover(".$conteudo->getId().")'>");
                                    echo("<img src='Imagens/imagens_gerais/edit.png' onclick='obterUm(".$conteudo->getId().")'>");
                                    echo("<img src='Imagens/imagens_adm_usuario/check_true.png' style='display:".($conteudo->getSituacao() == 1 ? "block" : "none").";' onclick='atualizarSituacao(".$conteudo->getId().", true)'>");
                                    echo("<img src='Imagens/imagens_adm_usuario/check_false.png' style='display:".($conteudo->getSituacao() == 0 ? "block" : "none").";' onclick='atualizarSituacao(".$conteudo->getId().", false)'>");
                                    echo("</div>");

                                }

                                break;

                            case "obterPaginas":

                                $listaPaginas = array();

                                $listaPaginas = $conteudoDAO->obterPaginas();

                                $conteudo = new Conteudo();

                                echo("<option value='0'>*Selecione a página*</option>");

                                foreach($listaPaginas as $conteudo){

                                    echo("<option value='".$conteudo->getIdPagina()."'>".utf8_encode($conteudo->getPagina())."</option>");

                                }

                                break;

                            case "inserir":

                                $conteudo = new Conteudo();

                                $conteudo->setTitulo(utf8_decode($_POST["titulo"]));
                                $conteudo->setIdPagina($_POST["id_pagina"]);
                                $conteudo->setTexto(utf8_decode($_POST["texto"]));
                                $conteudo->setCaminhoImagem(utf8_decode($_POST["imagem"]));
                                $conteudo->setSituacao(1);

                                if(!$conteudoDAO->inserir($conteudo)){

                                    echo("<font color='red'>Erro ao registrar o conteúdo. Confira os campos preenchidos. Se o erro persistir, contate o suporte.</font>");

                                }

                                break;

                            case "obterUm":

                                $_SESSION["id"] = $_POST["id"];

                                echo(json_encode($conteudoDAO->obterUm($_POST["id"])));

                                break;

                            case "atualizar":

                                $conteudo = new Conteudo();

                                $conteudo->setId($_SESSION["id"]);
                                $conteudo->setTitulo(utf8_decode($_POST["titulo"]));
                                $conteudo->setIdPagina($_POST["id_pagina"]);
                                $conteudo->setTexto(utf8_decode($_POST["texto"]));
                                $conteudo->setCaminhoImagem(utf8_decode($_POST["imagem"]));

                                if(!$conteudoDAO->atualizar($conteudo)){

                                    echo("<font color='red'>Erro ao atualizar o conteúdo. Confira os campos preenchidos. Se o erro persistir, contate o suporte.</font>");

                                }

                                break;

                            case "atualizarSituacao":

                                echo($_POST["acao"]);

                                $situacao = $_POST["situacao"];
                                $id = $_POST["id"];

                                if(!$conteudoDAO->atualizarSituacao($situacao, $id)){

                                    echo("<font color='red'>Erro ao atualizar a estado do conteúdo. Confira os campos preenchidos. Se o erro persistir, contate o suporte.</font>");

                                }

                                break;

                            case "remover":

                                $id = $_POST["id"];

                                if(!$conteudoDAO->remover($id)){

                                    echo("<font color='red'>Erro ao remover o conteúdo. Confira os campos preenchidos. Se o erro persistir, contate o suporte.</font>");

                                }

                                break;

                        }

                    }

                    break;

//################################################################## Administração de Localidade ######################################################################

            case "Administração de Localidades":

                require_once("Controller/Localidade.php");
                require_once("Model/LocalidadeDAO.php");

                $localidadeDAO = new LocalidadeDAO();

                if(isset($_POST["acao"])){

                    switch($_POST["acao"]){

                        case "obterTodos":

                            echo("<tr>");
                            echo("<td class = 'columns_title'>");
                            echo("ID");
                            echo("</td>");
                            echo("<td class = 'columns_title'>");
                            echo("CEP");
                            echo("</td>");
                            echo("<td class = 'columns_title'>");
                            echo("Cidade");
                            echo("</td>");
                            echo("<td class = 'columns_title'>");
                            echo("Excluir");
                            echo("</td>");
                            echo("<td class = 'columns_title'>");
                            echo("Editar");
                            echo("</td>");
                            echo("<td class = 'columns_title'>");
                            echo("Situação");
                            echo("</td>");
                            echo("</tr>");

                            $listaLocalidades = array();

                            $listaLocalidades = $localidadeDAO->obterTodos();

                            foreach($listaLocalidades as $localidade){

                                echo("<tr>");
                                echo("<td class = 'columns'>");
                                echo($localidade->getId());
                                echo("</td>");
                                echo("<td class = 'columns'>");
                                echo(utf8_encode($localidade->getCEP()));
                                echo("</td>");
                                echo("<td class = 'columns'>");
                                echo(utf8_encode($localidade->getCidade())."(".$localidade->getSigla().")");
                                echo("</td>");
                                echo("<td class = 'columns'>");
                                echo("<img src='Imagens/imagens_gerais/delete.png' onclick='remover(".$localidade->getId().")'>");
                                echo("</td>");
                                echo("<td class = 'columns'>");
                                echo("<img src='Imagens/imagens_gerais/edit.png' onclick='obterUm(".$localidade->getId().")'>");
                                echo("</td>");
                                echo("<td class = 'columns'>");
                                echo("<img src='Imagens/imagens_adm_usuario/check_true.png' style='display:".($localidade->getSituacao() == 1 ? "block" : "none").";margin-left:auto;margin-right:auto;' onclick='atualizarSituacao(".$localidade->getId().", true)'>");
                                echo("<img src='Imagens/imagens_adm_usuario/check_false.png' style='display:".($localidade->getSituacao() == 0 ? "block" : "none").";margin-left:auto;margin-right:auto;' onclick='atualizarSituacao(".$localidade->getId().", false)'>");
                                echo("</td>");
                                echo("</tr>");

                            }

                            break;

                        case "inserir":

                            $localidade = new Localidade();

                            $localidade->setLogradouro(utf8_decode($_POST["logradouro"]));
                            $localidade->setCEP($_POST["CEP"]);
                            $localidade->setLatitude($_POST["latitude"]);
                            $localidade->setLongitude($_POST["longitude"]);
                            $localidade->setHorarioAbertura($_POST["horario_abertura"]);
                            $localidade->setHorarioFechamento($_POST["horario_fechamento"]);
                            $localidade->setIdEstado($_POST["id_estado"]);

                            if(!$localidadeDAO->verificarCidade($_POST["id_cidade"])){

                                if($_POST["id_cidade"] != "0"){

                                    $localidadeDAO->inserirCidade($_POST["id_cidade"], $_POST["cidade"], $_POST["id_estado"]);

                                }

                            }

                            $localidade->setIdCidade($_POST["id_cidade"]);
                            $localidade->setSituacao(1);

                            if(!$localidadeDAO->inserir($localidade)){

                                echo("<font color='red'>Erro ao registrar a localidade. Confira os campos preenchidos. Se o erro persistir, contate o suporte.</font>");

                            }

                            break;

                        case "obterUm":

                            $_SESSION["id"] = $_POST["id"];

                            echo(json_encode($localidadeDAO->obterUm($_POST["id"])));

                            break;

                        case "obterEstados":

                            $listaEstados = array();

                            $listaEstados = $localidadeDAO->obterEstados();

                            echo("<option value='0'>*Selecionar a UF*</option>");

                            foreach($listaEstados as $localidade){

                                echo("<option value='".$localidade->getIdEstado()."'>".utf8_encode($localidade->getEstado())."</option>");

                            }

                            break;

                        case "atualizar":

                            $localidade = new Localidade();

                            $localidade->setId($_SESSION["id"]);
                            $localidade->setLogradouro(utf8_decode($_POST["logradouro"]));
                            $localidade->setCEP($_POST["CEP"]);
                            $localidade->setLatitude($_POST["latitude"]);
                            $localidade->setLongitude($_POST["longitude"]);
                            $localidade->setHorarioAbertura($_POST["horario_abertura"]);
                            $localidade->setHorarioFechamento($_POST["horario_fechamento"]);
                            $localidade->setIdEstado($_POST["id_estado"]);
                            $localidade->setIdCidade($_POST["id_cidade"]);

                            if(!$localidadeDAO->atualizar($localidade)){

                                echo("<font color='red'>Erro ao atualizar a localidade. Confira os campos preenchidos. Se o erro persistir, contate o suporte.</font>");

                            }

                            break;

                        case "atualizarSituacao":

                            $situacao = $_POST["situacao"];
                            $id = $_POST["id"];

                            if(!$localidadeDAO->atualizarSituacao($situacao, $id)){

                                echo("<font color='red'>Erro ao atualizar a estado da localidade. Confira os campos preenchidos. Se o erro persistir, contate o suporte.</font>");

                            }

                            break;

                        case "remover":

                            $id = $_POST["id"];

                            if(!$localidadeDAO->remover($id)){

                                echo("<font color='red'>Erro ao remover a localidade. Confira os campos preenchidos. Se o erro persistir, contate o suporte.</font>");

                            }

                            break;


                    }

                }

                break;

        }

    }

?>
