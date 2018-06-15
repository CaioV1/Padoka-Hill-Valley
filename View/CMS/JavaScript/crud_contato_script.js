function limparCaixas(){
                
    $("#txt_nome").val("");
    $("#telefone").val("");
    $("#celular").val("");
    $("#txt_email").val("");
    $("#txt_profissao").val("");
    $("#txt_info").val("");
    $("#txt_sugestoes").val("");

}

function obterTodos(){

    $.ajax({

        type:"POST",
        url:"../../router.php",
        data:{acao:"obterTodos", pagina:"Administração Fale Conosco"},
        dataType:"html",
        success:function(dados){

            $("#table").html(dados);

            modo = "";

            fecharModal("Contato", "inicio", ".query");

        }

    });

}

function inserir(){

    $.post("../router.php", {

        pagina:"Fale Conosco",
        nome:$("#txt_nome").val(),
        telefone:$("#telefone").val(),
        celular:$("#celular").val(),
        email:$("#txt_email").val(),
        profissao:$("#txt_profissao").val(),
        sexo:$("input[name=rdo_sexo]:checked").val(),
        info:$("#txt_info").val(),
        sugestao:$("#txt_sugestoes").val()

    }).done(function(dados){
            
        limparCaixas();    
            

    });
    
}

function obterUm(idNivel){

    $.ajax({

        type:"POST",
        url:"../../router.php",
        data:{

            acao:"obterUm", 
            pagina:"Administração Fale Conosco", 
            id:idNivel

        },
        success:function(dados){

            var contato = JSON.parse(dados);

            $("#txt_nome").html("<span style='font-weight:bold;'>Nome</span><br>" + contato["nome"]);
            $("#txt_telefone").html("<span style='font-weight:bold;'>Telefone</span><br>" + contato["telefone"]);
            $("#txt_celular").html("<span style='font-weight:bold;'>Celular</span><br>" + contato["celular"]);
            $("#txt_email").html("<span style='font-weight:bold;'>E-mail</span><br>" + contato["email"]);
            $("#txt_profissao").html("<span style='font-weight:bold;'>Profissao</span><br>" + contato["profissao"]);
            $("#txt_sexo").html("<span style='font-weight:bold;'>Sexo</span><br>" + contato["sexo"]);
            $("#txt_info").html("<span style='font-weight:bold;'>Informações do Produto</span><br>" + contato["info_produto"]);
            $("#txt_sugestao").html("<span style='font-weight:bold;'>Sugestão ou Crítica</span><br>" + contato["sugestao_critica"]);

            $("#title_register").html("Consulta de Contato");

            abrirModal("modal");

        }   

    });

}

function remover(idNivel){
    
    $.post("../../router.php", {

        id:idNivel,
        acao:"remover",
        pagina:"Administração Fale Conosco"

    }).done(function(dados){
        
        obterTodos(); 

    });

}

$(document).ready(function(){

    var pagina = $(this).attr("title");
    
    if(pagina == "Fale Conosco - Padoka Hill Valley"){
        
        $("#btn_enviar").click(function(){
            
            if($("#txt_nome").val() == "" || $("#celular").val() == "" || $("#txt_email").val() == "" ||  $("#txt_profissao").val() == "" || $("input[name=rdo_sexo]:checked").val() == null){
                    
                $("#error").html("Preencha os campos obrigatórios");
                $(".warning_input").css("color", "#FF0019");
                
            } else {
                    
                $("#error").html("");
                $(".warning_input").css("color", "#E09900");
                
                inserir();    
                
            }
            
            
        });
        
    } else if(pagina == "CMS | Fale Conosco"){
        
        obterTodos();    
        
    }

});