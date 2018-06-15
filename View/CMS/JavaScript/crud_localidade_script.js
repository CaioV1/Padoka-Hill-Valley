function obterCidades(idEstado){

    $.getJSON("https://servicodados.ibge.gov.br/api/v1/localidades/estados/"+idEstado+"/municipios", function(dados){

        if(idEstado == 0){

            $("#slt_cidade").html("<option value='0'>*Selecione a UF primeiro*</option>");     

        } else {

            var option = "<option value='0'>*Selecione a cidade*</option>";

            for(var i = 0; i < dados.length; i++){

                option += "<option value='"+dados[i].id+"'>"+dados[i].nome+"</option>";

            }

        }

        $("#slt_cidade").html(option);

    });    

}

var modo = "";

function obterTodos(){

    $.post("../../router.php", {

        acao:"obterTodos", 
        pagina:"Administração de Localidades"

    }).done(function(dados){

        $("#table").html(dados);

        //alert(dados);

        fecharModal("Localidade", "inicio", ".input_register");

        $("#slt_cidade").html("<option>*Selecione a UF primeiro*</option>");

        $("#slt_estado option[value='0']").prop("selected", true);

        modo = "";

    });

}

function inserir(){

    var elemento = document.getElementById("slt_cidade");

    var cidade = elemento.options[elemento.selectedIndex].text;

    $.post("../../router.php", {

        acao:"inserir",
        pagina:"Administração de Localidades",
        logradouro:$("#txt_logradouro").val(),
        CEP:$("#txt_cep").val(),
        latitude:$("#txt_latitude").val(),
        longitude:$("#txt_longitude").val(),
        horario_abertura:$("#txt_abertura").val(),
        horario_fechamento:$("#txt_fechamento").val(),
        cidade:cidade,
        id_estado:$("#slt_estado").val(),
        id_cidade:$("#slt_cidade").val()

    }).done(function(dados){

        //alert(dados);

        obterTodos();

    });

}

function obterUm(idLocalidade){

    $.post("../../router.php", {

        acao:"obterUm",     
        pagina:"Administração de Localidades",
        id:idLocalidade

    }).done(function(dados){

        var localidade = JSON.parse(dados);

        //alert(dados);

        obterCidades(localidade["id_estado"]);

        $("#txt_logradouro").val(localidade["logradouro"]);
        $("#txt_cep").val(localidade["cep"]);
        $("#txt_latitude").val(localidade["latitude"]);
        $("#txt_longitude").val(localidade["longitude"]);
        $("#txt_abertura").val(localidade["horario_abertura"]);
        $("#txt_fechamento").val(localidade["horario_fechamento"]);
        $("#slt_estado option[value='"+localidade["id_estado"]+"']").prop("selected", true);
        $("#slt_cidade option[value='"+localidade["id_cidade"]+"']").prop("selected", true);

        $("#slt_cidade").val(localidade["id_cidade"]);

        $("#title_register").html("Atualização de Localidade");
        $("#btn_save").val("Atualizar");

        modo = "atualizar";

        abrirModal("modal");

    });

}

function obterEstados(){

    $.post("../../router.php", {

        acao:"obterEstados",
        pagina:"Administração de Localidades"

    }).done(function(dados){

        $("#slt_estado").html(dados);

    });

}

function atualizarSituacao(idLocalidade, situacao){

    $.post("../../router.php", {

        acao:"atualizarSituacao",     
        pagina:"Administração de Localidades",
        situacao:(situacao ? 0 : 1),
        id:idLocalidade

    }).done(function(dados){

        obterTodos();

    });

}

function atualizar(){

    var elemento = document.getElementById("slt_cidade");

    var cidade = elemento.options[elemento.selectedIndex].text;

    $.post("../../router.php", {

        acao:"atualizar",
        pagina:"Administração de Localidades",
        logradouro:$("#txt_logradouro").val(),
        CEP:$("#txt_cep").val(),
        latitude:$("#txt_latitude").val(),
        longitude:$("#txt_longitude").val(),
        horario_abertura:$("#txt_abertura").val(),
        horario_fechamento:$("#txt_fechamento").val(),
        cidade:cidade,
        id_estado:$("#slt_estado").val(),
        id_cidade:$("#slt_cidade").val()

    }).done(function(dados){

        //alert(dados);

        obterTodos();

    });

}

function remover(idLocalidade){

    $.post("../../router.php", {

        id:idLocalidade,
        acao:"remover",
        pagina:"Administração de Localidades"

    }).done(function(dados){

        obterTodos();

    });

}

$(document).ready(function(){

    obterEstados();

    obterTodos();

    obterCidades(0);

    $("#btn_save").click(function(){

        if(modo == "atualizar"){

            atualizar();

        } else {

            inserir();

        }

    });

    $("#slt_estado").click(function(){

        obterCidades($("#slt_estado").val());

    });

    window.onclick = function(){

        fecharModal("Localidade", "tela", ".input_register");

        if(event.target == document.getElementById("modal")){

            $("#slt_estado option[value='0']").prop("selected", true);
            obterCidades(0);

        }

    }

});