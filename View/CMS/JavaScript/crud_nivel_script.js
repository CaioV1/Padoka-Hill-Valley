var modo = "";
            
function obterTodos(){

    $.ajax({

        type:"POST",
        url:"../../router.php",
        data:{acao:"obterTodos", pagina:"Administração de Níveis"},
        dataType:"html",
        success:function(dados){

            $("#table").html(dados);

            modo = "";

            fecharModal("Nível", "inicio", ".input_register");

        }

    });

}

function inserir(){

    $.ajax({

        type:"POST",
        url:"../../router.php",
        data:{

            acao:"inserir", 
            pagina:"Administração de Níveis", 
            nome:$("#txt_nome").val()

        },
        success:function(dados){

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
            pagina:"Administração de Níveis", 
            id:idNivel

        },
        success:function(dados){

            var nivel = JSON.parse(dados);

            $("#txt_nome").val(nivel["nome"]);

            $("#title_register").html("Atualização de Nível");

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
            pagina:"Administração de Níveis", 
            nome:$("#txt_nome").val()

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
        pagina:"Administração de Níveis",
        situacao: (situacao ? 0 : 1)

    }).done(function(dados){

        obterTodos();

    });  

}

function remover(idNivel){

    $.post("../../router.php", {

        id:idNivel,
        acao:"remover",
        pagina:"Administração de Níveis"

    }).done(function(dados){

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