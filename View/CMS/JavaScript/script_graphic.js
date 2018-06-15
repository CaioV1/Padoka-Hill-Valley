var produtos = new Array(9);

var cliques = new Array(9);

$(document).ready(function(){

    $.post("../../router.php", {

        pagina:"Index"

    }).done(function(dados){

//        alert(dados);

        var json = JSON.parse(dados);

        for(var i = 0; i < json.length; i++){

            produtos[i] = json[i]["nome"];

            cliques[i] = json[i]["clique"];

        }

        cliques[12] = 100;

        var context = document.getElementById("graphic");

        var graphicManager = new Chart(context, {

            type: "bar",
            data:{

                labels: produtos,
                datasets:[{

                    label: "Porcentagem de Cliques de Produtos pelo Total",
                    data: cliques,
                    backgroundColor: "rgba(255, 174, 0, 0.5)"

                }]

            }

        });

//                    alert(produtos + "\n" + cliques);

    });    

});