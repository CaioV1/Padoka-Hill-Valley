var modo = "";

function obterTodos(){

    $.ajax({

        type:"POST",
        url:"../../router.php",
        data:{acao:"obterTodos", pagina:"Administração de Destaques"},
        success:function(dados){

            $("#table").html(dados);

            modo = "";

            fecharModal("Destaque", "inicio", ".input_register");

            $("#txt_info").val("");

            $("#slt_produto option[value='0']").prop("selected", true);

        }

    });

}

function inserir(){

    $.ajax({

        type:"POST",
        url:"../../router.php",
        data:{

            acao:"inserir",
            pagina:"Administração de Destaques",
            info:$("#txt_info").val(),
            produto:$("#slt_produto").val()

        },
        success:function(dados){

            obterTodos();

        }

    });

}

function obterUm(idDestaque){

    $.ajax({

        type:"POST",
        url:"../../router.php",
        data:{

            acao:"obterUm",
            pagina:"Administração de Destaques",
            id:idDestaque

        },
        success:function(dados){

            var destaque = JSON.parse(dados);

            //alert(dados);

            $("#slt_produto option[value='"+destaque["id_produto"]+"']").prop("selected", true);
            $("#txt_info").val(destaque["info_promo"]);

            $("#title_register").html("Atualização de Destaque");

            $("#btn_save").val("Atualizar");

            modo = "atualizar";

            abrirModal("modal");

        }

    });

}

function obterProdutos(){

    $.post("../../router.php", {

        acao:"obterProdutos",
        pagina:"Administração de Destaques"

    }).done(function(dados){

        $("#slt_produto").html(dados);

    });

}

function atualizar(){

    $.ajax({

        type:"POST",
        url:"../../router.php",
        data:{

            acao:"atualizar",
            pagina:"Administração de Destaques",
            info:$("#txt_info").val(),
            produto:$("#slt_produto").val()

        },
        success:function(dados){

            obterTodos();

        }

    });

}

function atualizarSituacao(idNivel, situacao){

    $.post("../../router.php", {

        id:idNivel,
        acao:"atualizarSituacao",
        pagina:"Administração de Destaques",
        situacao: (situacao ? 0 : 1)

    }).done(function(dados){

        obterTodos();

    });

}

function remover(idDestaque){

    $.post("../../router.php", {

        id:idDestaque,
        acao:"remover",
        pagina:"Administração de Destaques"

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

    window.onclick = function(event){

        fecharModal("Destaque", "tela", ".input_register");

        if(event.target == document.getElementById("modal")){

            $("#slt_produto option[value='0']").prop("selected", true);

            $("#txt_info").val("");

        }

    }

});
