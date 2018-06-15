function limparModal(classeInput, titulo){

    $("#title_register").html("Cadastro de " + titulo);

    $("#btn_save").val("Cadastrar");

    if(classeInput == ".input_register"){
        
        $(classeInput).val("");    
        
    } else {
        
        $(classeInput).html("");
        
    }

}

function abrirModal(idModal){
    
    var modal = document.getElementById(idModal); 

    modal.style.display = "block";

}

function fecharModal(titulo, clique, classeInput){ 

    var modal = document.getElementById("modal");
    
    if(clique == "tela"){
    
        if(event.target == modal){

            modal.style.display = "none";

            limparModal(classeInput, titulo);

        }
        
    } else {
        
        modal.style.display = "none";

        limparModal(classeInput, titulo);
        
    }

}