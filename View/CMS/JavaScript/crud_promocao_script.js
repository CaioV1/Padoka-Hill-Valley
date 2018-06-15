var modo = "";

function obterTodos(){

    $.post("../../router.php", {

        acao:"obterTodos",
        pagina:"Administração de Promoções"

    }).done(function(dados){

        $("#table").html(dados);

        fecharModal("Promoção", "inicio", ".input_register");

        modo = "";

        $("#slt_produto option[value='0']").prop("selected", true);

    });

}

function inserir(){

    $.post("../../router.php", {

        acao:"inserir",
        pagina:"Administração de Promoções",
        desconto:$("#txt_desconto").val(),
        dataInicio:$("#txt_data_inicio").val(),
        dataFim:$("#txt_data_fim").val(),
        idProduto:$("#slt_produto").val()

    }).done(function(dados){

        //alert(dados);

        obterTodos();

    });

}

function obterProdutos(){

    $.post("../../router.php", {

        acao:"obterProdutos",
        pagina:"Administração de Promoções"

    }).done(function(dados){

        $("#slt_produto").html(dados);

    });

}

function obterUm(idPromocao){

    $.post("../../router.php", {

        acao:"obterUm",
        pagina:"Administração de Promoções",
        id:idPromocao

    }).done(function(dados){

        var promocao = JSON.parse(dados);

        var desconto = promocao["desconto"] * 100;

        $("#txt_desconto").val(desconto + "%");
        $("#txt_data_inicio").val(promocao["data_inicio"]);
        $("#txt_data_fim").val(promocao["data_fim"]);
        $("#slt_produto option[value='"+promocao["id_produto"]+"']").prop("selected", true);

        $("#title_register").html("Atualização de Promoção");
        $("#btn_save").val("Atualizar");

        modo = "atualizar";

        abrirModal("modal");

    });

}

function atualizarSituacao(idUsuario, situacao){

    $.post("../../router.php", {

        acao:"atualizarSituacao",
        pagina:"Administração de Promoções",
        situacao:(situacao ? 0 : 1),
        id:idUsuario

    }).done(function(dados){

        obterTodos();

    });

}

function atualizar(){

    $.post("../../router.php", {

        acao:"atualizar",
        pagina:"Administração de Promoções",
        desconto:$("#txt_desconto").val(),
        dataInicio:$("#txt_data_inicio").val(),
        dataFim:$("#txt_data_fim").val(),
        idProduto:$("#slt_produto").val()

    }).done(function(dados){

//        alert(dados);

        obterTodos();

    });

}

function remover(idUsuario){

    $.post("../../router.php", {

        id:idUsuario,
        acao:"remover",
        pagina:"Administração de Promoções"

    }).done(function(dados){

        obterTodos();

    });

}

$(document).ready(function(){

    obterProdutos();

    obterTodos();

    $("#btn_save").click(function(){

        if(modo == "atualizar"){

            atualizar();

        } else {

            inserir();

        }

    });

});

window.onclick = function(event){

    fecharModal("Promoção", "tela", ".input_register");

    if(event.target == document.getElementById("modal")){

        $("#slt_produto option[value='0']").prop("selected", true);

    }

}
