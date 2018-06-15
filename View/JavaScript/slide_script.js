var slideIndex = 1;
            
//mostrarSlidesAutomatico();

mostrarSlides(slideIndex);

//Função para avancar slide;
function proximoSlide(n) {

    mostrarSlides(slideIndex += n);

}

//Função para voltar slide;
function slideAnterior(n){

    mostrarSlides(slideIndex -= n);

}

//Função para mover slides sem sequência;
function escolherSlide(n) {

    mostrarSlides(slideIndex = n);

}

//Método para mostrar slide em si. É necessário um índice para utilizar;
function mostrarSlides(n) {

    var i;
    
    //Pegando os elementos da classe "img_slider";
    var slides = document.getElementsByClassName("img_slider");
    
    //Pegando os elementos da classe "dot";
    var dots = document.getElementsByClassName("dot");

    //Verificando se número recebido é maior que a quantidade de slides.
    //Se for maior, será retornado o índice 1;
    if (n > slides.length){

        slideIndex = 1;

    }   

    //Verificando se número recebido é menor que 1.
    //Se for menor, será retornado o último índice;
    if (n < 1) {

        slideIndex = slides.length;

    }

    //Impossibilitando a vizualização das imagens;
    for (i = 0; i < slides.length; i++) {

        slides[i].style.display = "none";

    }

    //Deixando todos os botões de navegação inativos;
    for (i = 0; i < dots.length; i++) {

        dots[i].className = dots[i].className.replace(" active", "");

    }

    //Mostrando a imagem;
    slides[slideIndex-1].style.display = "block";  

    //Tornando ativo os botões;
    dots[slideIndex-1].className += " active";

}

//function mostrarSlidesAutomatico(){
//    
//    var i;
//    
//    var slides = document.getElementsByClassName("mySlides");
//    
//    var dots = document.getElementsByClassName("dot");
//    
//    for (i = 0; i < slides.length; i++) {
//        
//       slides[i].style.display = "none";
//        
//    }
//    
//    slideIndex++;
//    
//    if (slideIndex > slides.length) {
//        
//        slideIndex = 1
//        
//    }    
//    for (i = 0; i < dots.length; i++) {
//        
//        dots[i].className = dots[i].className.replace(" active", "");
//        
//    }
//    
//    slides[slideIndex-1].style.display = "block";  
//    
//    dots[slideIndex-1].className += " active";
//    
//    setTimeout(showSlides, 2000);
//    
//}