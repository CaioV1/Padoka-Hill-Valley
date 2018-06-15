function obterUm(idPromocao, idProduto){

    $.post("../router.php", {

        acao:"obterUm",
        pagina:"Administração de Promoções",
        id:idPromocao,
        id_produto:idProduto

    }).done(function(dados){

        var promocao = JSON.parse(dados);

        var desconto = promocao["desconto"] * 100;

        var precoNovo = promocao["preco"] - (promocao["preco"] * promocao["desconto"]);

        $("#produto").html(promocao["nomeProduto"]);
        $("#preco").html("<span style='text-decoration:line-through;color:#FF0000;'>R$ "+parseFloat(promocao["preco"]).toFixed(2)+"</span> R$"+ parseFloat(precoNovo).toFixed(2));
        $("#descricao").html(promocao["descricao"]);
        $("#quantidade").html(promocao["quantidade"] + " unidades");
        $("#modal_image").html("<img src='" + promocao["caminho_imagem"] + "'>");
        $("#desconto").html(desconto + "%");
        $("#data_inicio").html(promocao["data_inicio"]);
        $("#data_fim").html(promocao["data_fim"]);

        abrirModal("modal_details");

    });

}

$(document).ready(function(){

    $.post("../router.php", {pagina:"Produtos"}).done(function(dados){

        $("#promotion").html(dados);

    });

    $.post("../router.php", {pagina:"Destaques"}).done(function(dados){

        $("#highlight").html(dados);

    });

});