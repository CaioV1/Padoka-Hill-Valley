//Obtendo o elemento do id "btn_login";
var botao = document.getElementById("btn_login");

//Obtendo o elemento do id "modal";
var modal = document.getElementById("modal");

//Obtendo o elemento da classe "close";
var closeButton = document.getElementsByClassName("close")[0];

//Se o botão de login for clicado o modal é mostrado;
botao.onclick = function() {

    modal.style.display = "block";

}

//Se o botão de fechar for clicado o modal é ocultado;
closeButton.onclick = function() {

    modal.style.display = "none";

}

//Se clicar na área escura da tela, o modal é ocultado;
window.onclick = function(event) {

    if(event.target == modal){

        modal.style.display = "none";

    }

}