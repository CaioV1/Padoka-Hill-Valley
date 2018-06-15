var modo = "";

function obterTodos(){

    $.post("../../router.php", {

        acao:"obterTodos",
        pagina:"Administração de Produtos"

    }).done(function(dados){

        $("#content_products").html(dados);

        fecharModal("Produto", "inicio", ".input_register");

        $("#txt_descricao").val("");
        $("#img_product").html("<img src='Imagens/imagens_gerais/selecione_imagem.png'>");

        $("#slt_subcategoria option[value='0']").prop("selected", true);

        modo = "";

    });

}

function inserir(){

    $.post("../../router.php", {

        acao:"inserir",
        pagina:"Administração de Produtos",
        nome:$("#txt_nome").val(),
        preco:$("#txt_preco").val(),
        descricao:$("#txt_descricao").val(),
        quantidade:$("#txt_quantidade").val(),
        imagem:$("#txt_imagem").val(),
        id_subcategoria:$("#slt_subcategoria").val()

    }).done(function(dados){

//        alert(dados);

        obterTodos();

    });

}

function obterUm(idProduto){

    $.post("../../router.php", {

        acao:"obterUm",
        pagina:"Administração de Produtos",
        id:idProduto

    }).done(function(dados){

        var produto = JSON.parse(dados);

        $("#txt_nome").val(produto["nome"]);
        $("#txt_preco").val(parseFloat(produto["preco"]).toFixed(2));
        $("#txt_descricao").val(produto["descricao"]);
        $("#txt_quantidade").val(produto["quantidade"]);
        $("#img_product").html("<img src='../" + produto["caminho_imagem"] + "'>");
        $("#txt_imagem").val(produto["caminho_imagem"]);
        $("#title_register").html("Atualização de Produto");
        $("#slt_subcategoria option[value='"+(produto["id_subcategoria"])+"']").prop("selected", true);
        $("#btn_save").val("Atualizar");

        modo = "atualizar";

        abrirModal("modal");

    });

}

function obterSubcategorias(){

    $.post("../../router.php", {

        acao:"obterSubcategorias",
        pagina:"Administração de Produtos"

    }).done(function(dados){

        $("#slt_subcategoria").html(dados);

    });

}

function atualizarSituacao(idProduto, situacao){

    $.post("../../router.php", {

        acao:"atualizarSituacao",
        pagina:"Administração de Produtos",
        situacao:(situacao ? 0 : 1),
        id:idProduto

    }).done(function(dados){

        obterTodos();

    });

}

function atualizar(){

    $.post("../../router.php", {

        acao:"atualizar",
        pagina:"Administração de Produtos",
        nome:$("#txt_nome").val(),
        preco:$("#txt_preco").val(),
        descricao:$("#txt_descricao").val(),
        quantidade:$("#txt_quantidade").val(),
        imagem:$("#txt_imagem").val(),
        id_subcategoria:$("#slt_subcategoria").val()

    }).done(function(dados){

        //alert(dados);

        obterTodos();

    });

}

function remover(idProduto){

    $.post("../../router.php", {

        id:idProduto,
        acao:"remover",
        pagina:"Administração de Produtos"

    }).done(function(dados){

        //alert(dados);

        obterTodos();

    });

}

$(document).ready(function(){

    obterTodos();

    obterSubcategorias();

    $("#btn_save").click(function(){

        $("#img_product").html("<img src='Imagens/imagens_gerais/saving.gif'>");

        setTimeout(function(){

            if(modo == "atualizar"){

                atualizar();

            } else {

                inserir();

            }

        }, 2000);

    });

    $("#fle_product").live("change", function(){

        $("#img_product").html("<img src='Imagens/imagens_gerais/loading.gif'>");

        setTimeout(function(){

            $("#frm_image").ajaxForm({

                target:"#img_product"

            }).submit();

        }, 2000);

    });

});

window.onclick = function(event){

    fecharModal("Produto", "tela", ".input_register");

    if(event.target == document.getElementById("modal")){

        $("#slt_subcategoria option[value='0']").prop("selected", true);
        $("#img_product").html("");
        $("#txt_descricao").val("");

    }

}
