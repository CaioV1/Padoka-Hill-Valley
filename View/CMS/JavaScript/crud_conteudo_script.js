var modo = "";
            
function obterTodos(){

    $.post("../../router.php", {

        acao:"obterTodos", 
        pagina:"Administração de Conteúdo"

    }).done(function(dados){

        $("#content").html(dados);

        fecharModal("Conteúdo", "inicio", ".input_register");

        $("#txt_texto").val("");
        $("#img_content").html("<img src='Imagens/imagens_gerais/selecione_imagem.png' style='width:300px;height:300px;margin-left:100px;'>");

        modo = "";

    });

}

function inserir(){

    $.post("../../router.php", {

        acao:"inserir", 
        pagina:"Administração de Conteúdo",
        titulo:$("#txt_titulo").val(),
        id_pagina:$("#slt_pagina").val(),
        texto:$("#txt_texto").val(),
        imagem:$("#txt_imagem").val()

    }).done(function(dados){

        //alert(dados);

        obterTodos();

    });

}

function obterUm(idConteudo){

    $.post("../../router.php", {

        acao:"obterUm",     
        pagina:"Administração de Conteúdo",
        id:idConteudo

    }).done(function(dados){

        var conteudo = JSON.parse(dados);

        $("#txt_titulo").val(conteudo["titulo"]);
        $("#slt_pagina option[value='"+conteudo["id_pagina"]+"']").prop("selected", true);
        $("#txt_texto").val(conteudo["texto"]);
        $("#img_content").html("<img src='../" + conteudo["caminho_imagem"] + "'>");
        $("#txt_imagem").val(conteudo["caminho_imagem"]);
        $("#title_register").html("Atualização de Produto");
        $("#btn_save").val("Atualizar");

        modo = "atualizar";

        abrirModal("modal");

    });

}

function atualizarSituacao(idConteudo, situacao){

    $.post("../../router.php", {

        acao:"atualizarSituacao",     
        pagina:"Administração de Conteúdo",
        situacao:(situacao ? 0 : 1),
        id:idConteudo

    }).done(function(dados){

        obterTodos();

    });

}

function obterPaginas(){

    $.post("../../router.php", {

        acao:"obterPaginas",
        pagina:"Administração de Conteúdo"

    }).done(function(dados){

        $("#slt_pagina").html(dados);

    });

}

function atualizar(){

    $.post("../../router.php", {

        acao:"atualizar",
        pagina:"Administração de Conteúdo",
        titulo:$("#txt_titulo").val(),
        id_pagina:$("#slt_pagina").val(),
        texto:$("#txt_texto").val(),
        imagem:$("#txt_imagem").val()

    }).done(function(dados){

        obterTodos();

    });

}

function remover(idConteudo){

    $.post("../../router.php", {

        id:idConteudo,
        acao:"remover",
        pagina:"Administração de Conteúdo"

    }).done(function(dados){

        obterTodos();

    });

}

$(document).ready(function(){

    obterPaginas();

    obterTodos();
    
    $("#btn_save").click(function(){
        
        $("#img_content").html("<img src='Imagens/imagens_gerais/saving.gif' style='width:200px;height:200px;margin-left:150px;margin-top:50px;'>");
    
        setTimeout(function(){

            if(modo == "atualizar"){

                atualizar();

            } else {

                inserir();

            }    

        }, 2000);

    });
    
    $("#fle_image").live("change", function(){
        
        $("#img_content").html("<img src='Imagens/imagens_gerais/loading.gif' style='width:200px;height:200px;margin-left:150px;margin-top:50px;'>");

        setTimeout(function(){

            $("#frm_image").ajaxForm({

                target:"#img_content"

            }).submit();    

        },2000);

    });

});

window.onclick = function(event){

    if(event.target == document.getElementById("modal")){
        
        $("#img_content").html("");
        $("#txt_texto").val("");    
        
    }

    fecharModal("Produto", "tela", ".input_register");

}