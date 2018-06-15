var modo = "";

function obterTodos(){

    $.ajax({

        type:"POST",
        url:"../../router.php",
        data:{acao:"obterTodos", pagina:"Administração de Categorias"},
        dataType:"html",
        success:function(dados){

            $("#table").html(dados);

            modo = "";

            fecharModal("Categoria", "inicio", ".input_register");

        }

    });

}

function inserir(){

    $.ajax({

        type:"POST",
        url:"../../router.php",
        data:{

            acao:"inserir",
            pagina:"Administração de Categorias",
            nome:$("#txt_nome").val()

        },
        success:function(dados){

            //alert(dados);

            obterTodos();

        }

    });

}

function obterUm(idNivel){

    $.ajax({

        type:"POST",
        url:"../../router.php",
        data:{

            acao:"obterUm",
            pagina:"Administração de Categorias",
            id:idNivel

        },
        success:function(dados){

            var categoria = JSON.parse(dados);

            $("#txt_nome").val(categoria["nome"]);

            $("#title_register").html("Atualização de Categoria");

            $("#btn_save").val("Atualizar");

            modo = "atualizar";

            abrirModal("modal");

        }

    });

}

function atualizar(){

    $.ajax({

        type:"POST",
        url:"../../router.php",
        data:{

            acao:"atualizar",
            pagina:"Administração de Categorias",
            nome:$("#txt_nome").val()

        },
        success:function(dados){

            obterTodos();

        }

    });

}

function atualizarSituacao(idCategoria, situacao){

    $.post("../../router.php", {

        id:idCategoria,
        acao:"atualizarSituacao",
        pagina:"Administração de Categorias",
        situacao: (situacao ? 0 : 1)

    }).done(function(dados){

        obterTodos();

    });

}

function remover(idCategoria){

//    alert(idCategoria);

    $.post("../../router.php", {

        id:idCategoria,
        acao:"remover",
        pagina:"Administração de Categorias"

    }).done(function(dados){

//        alert(dados);

        obterTodos();

    });

}

$(document).ready(function(){

    obterTodos();

    $("#btn_save").click(function(){

        if(modo == "atualizar"){

            atualizar();

        } else {

            inserir();

        }

    });

});
