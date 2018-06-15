var modo = "";

function obterTodos(){

    $.post("../../router.php", {

        acao:"obterTodos",
        pagina:"Administração de Usuários"

    }).done(function(dados){

        $("#table").html(dados);

        fecharModal("Usuário", "inicio", ".input_register");

        $("#slt_nivel option[value='0']").prop("selected", true);

        modo = "";

    });

}

function inserir(){

    if($("#slt_nivel").val() == "0"){

        alert("Selecione o nível");

    } else {

        $.post("../../router.php", {

            acao:"inserir",
            pagina:"Administração de Usuários",
            login:$("#txt_login").val(),
            senha:$("#txt_senha").val(),
            nome:$("#txt_nome").val(),
            email:$("#txt_email").val(),
            telefone:$("#txt_telefone").val(),
            celular:$("#txt_celular").val(),
            idNivel:$("#slt_nivel").val()

        }).done(function(dados){

            //alert(dados);

            obterTodos();

        });

    }

}

function obterUm(idUsuario){

    $.post("../../router.php", {

        acao:"obterUm",
        pagina:"Administração de Usuários",
        id:idUsuario

    }).done(function(dados){

        var usuario = JSON.parse(dados);

        $("#txt_login").val(usuario["login"]);
        $("#txt_nome").val(usuario["nome"]);
        $("#txt_email").val(usuario["email"]);
        $("#txt_telefone").val(usuario["telefone"]);
        $("#txt_celular").val(usuario["celular"]);
        $("#slt_nivel option[value='"+(usuario["id_nivel"])+"']").prop("selected", true);

        $("#title_register").html("Atualização de Usuário");
        $("#btn_save").val("Atualizar");

        modo = "atualizar";

        abrirModal("modal");

    });

}

function obterNiveis(){

    $.post("../../router.php", {

        acao:"obterNiveis",
        pagina:"Administração de Usuários"

    }).done(function(dados){

        $("#slt_nivel").html(dados);

    });

}

function atualizarSituacao(idUsuario, situacao){

    $.post("../../router.php", {

        acao:"atualizarSituacao",
        pagina:"Administração de Usuários",
        situacao:(situacao ? 0 : 1),
        id:idUsuario

    }).done(function(dados){

        obterTodos();

    });

}

function atualizar(){

    if($("#slt_nivel").val() == "0"){

        alert("Selecione um nível");

    } else {

        $.post("../../router.php", {

            acao:"atualizar",
            pagina:"Administração de Usuários",
            login:$("#txt_login").val(),
            senha:$("#txt_senha").val(),
            nome:$("#txt_nome").val(),
            email:$("#txt_email").val(),
            telefone:$("#txt_telefone").val(),
            celular:$("#txt_celular").val(),
            idNivel:$("#slt_nivel").val()

        }).done(function(dados){

            obterTodos();

        });

    }

}

function remover(idUsuario){

    $.post("../../router.php", {

        id:idUsuario,
        acao:"remover",
        pagina:"Administração de Usuários"

    }).done(function(dados){

        obterTodos();

    });

}

$(document).ready(function(){

    obterNiveis();

    obterTodos();

    $("#btn_save").click(function(){

        if(modo == "atualizar"){

            atualizar();

        } else {

            inserir();

        }

    });

    window.onclick = function(){

        fecharModal("Usuário", "tela", ".input_register");

        if(event.target == document.getElementById("modal")){

            $("#slt_nivel option[value='0']").prop("selected", true);

        }

    }

});
