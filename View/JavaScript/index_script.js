function obterPesquisa(){

    $.post("router.php", {pagina:"obterPesquisa", letras:$("#search_produ").val()}).done(function(dados){

        $("#products_icons").html(dados);

    });

}

function obterSugestoes(caracter){
    
    var codAscii = caracter.charCode;
    
    if(codAscii == 13){
        
        obterPesquisa();
        
    } else {
        
        $.post("router.php", {pagina:"Sugestões", letras:$("#search_produ").val()}).done(function(dados){

            $("#products_suggestions").html(dados);

        });    
        
    }

}

function obterSubcategoria(idSubcategoria){

    $.post("router.php", {pagina:"Subcategoria", id_subcategoria:idSubcategoria}).done(function(dados){

        //alert(dados);

        if(dados == ""){

            $("#products_icons").html("<input type='text' id='search_produ' list='products_suggestions' onkeypress='obterSugestoes(event)'><datalist id='products_suggestions'></datalist><img src='View/Imagens/imagens_home/more_information.png' id='search_icon' onclick='obterPesquisa()'><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Não há produtos dessa subcategoria.");
        } else {

            $("#products_icons").html("<input type='text' id='search_produ' list='products_suggestions' onkeypress='obterSugestoes(event)'><datalist id='products_suggestions'></datalist><img src='View/Imagens/imagens_home/more_information.png' id='search_icon' onclick='obterPesquisa()'>" + dados);

        }

    });

}

function obterUm(idProduto){

    $.post("router.php", {

        pagina:"obterUm",
        id:idProduto

    }).done(function(dados){

//                    alert(dados);

        var produto = JSON.parse(dados);

        $("#produto").html(produto["nome"]);
        $("#preco").html("R$ " + parseFloat(produto["preco"]).toFixed(2));
        $("#descricao").html(produto["descricao"]);
        $("#quantidade").html(produto["quantidade"] + " unidades");
        $("#modal_image").html("<img src='View/" + produto["caminho_imagem"] + "'>");
        $("#categoria").html(produto["categoria"]);
        $("#subcategoria").html(produto["subcategoria"]);

        abrirModal("modal_details");

    });

}

$(document).ready(function(){

    $.post("router.php", {pagina:"Home"}).done(function(dados){

        $("#products_icons").html(dados);

    });

    $.post("router.php", {pagina:"Categoria"}).done(function(dados){

        $("#products_list").html(dados);

    });

    $("#search_produ").on('keyup', function (e) {

        if (e.keyCode == 13) {

            obterPesquisa();

        }

    });

});