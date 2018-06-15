var modo = "";

function obterTodos(){

    $.ajax({

        type:"POST",
        url:"../../router.php",
        data:{acao:"obterTodos", pagina:"Administração de Subcategorias"},
        dataType:"html",
        success:function(dados){

            $("#table").html(dados);

            fecharModal("Subcategoria", "inicio", ".input_register");

            $("#slt_categoria option[value='0']").prop("selected", true);

            modo = "";

        }

    });

}

function inserir(){

    $.ajax({

        type:"POST",
        url:"../../router.php",
        data:{

            acao:"inserir",
            pagina:"Administração de Subcategorias",
            nome:$("#txt_nome").val(),
            id_categoria:$("#slt_categoria").val()

        },
        success:function(dados){

            //alert(dados);

            obterTodos();

        }

    });

}

function obterUm(idSubcategoria){

    $.ajax({

        type:"POST",
        url:"../../router.php",
        data:{

            acao:"obterUm",
            pagina:"Administração de Subcategorias",
            id:idSubcategoria

        },
        success:function(dados){

            var subcategoria = JSON.parse(dados);

            $("#txt_nome").val(subcategoria["nome"]);
            $("#slt_categoria option[value='"+(subcategoria["id_categoria"])+"']").prop("selected", true);

            $("#title_register").html("Atualização de Subcategoria");

            $("#btn_save").val("Atualizar");

            modo = "atualizar";

            abrirModal("modal");

        }

    });

}

function obterCategorias(){

    $.post("../../router.php", {

        acao:"obterCategorias",
        pagina:"Administração de Subcategorias"

    }).done(function(dados){

        $("#slt_categoria").html(dados);

    });

}

function atualizar(){

    $.ajax({

        type:"POST",
        url:"../../router.php",
        data:{

            acao:"atualizar",
            pagina:"Administração de Subcategorias",
            nome:$("#txt_nome").val(),
            id_categoria:$("#slt_categoria").val()

        },
        success:function(dados){

            //alert(dados);

            obterTodos();

        }

    });

}

function atualizarSituacao(idSubcategoria, situacao){

    $.post("../../router.php", {

        id:idSubcategoria,
        acao:"atualizarSituacao",
        pagina:"Administração de Subcategorias",
        situacao: (situacao ? 0 : 1)

    }).done(function(dados){

        obterTodos();

    });

}

function remover(idSubcategoria){

    $.post("../../router.php", {

        id:idSubcategoria,
        acao:"remover",
        pagina:"Administração de Subcategorias"

    }).done(function(dados){

        obterTodos();

    });

}

$(document).ready(function(){

    obterTodos();

    obterCategorias();

    $("#btn_save").click(function(){

        if(modo == "atualizar"){

            atualizar();

        } else {

            inserir();

        }

    });

    window.onclick = function(event){

        fecharModal("Subcategoria", "tela", ".input_register");

        if(event.target == document.getElementById("modal")){

            $("#slt_categoria option[value='0']").prop("selected", true);

        }

    }

});
