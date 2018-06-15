function validacao(caracter, tipoEntrada, idAlerta, idElemento){
    
    //Verificando se caixa contém o asterisco de alerta;
    if(document.getElementById(idAlerta) != null){
        
        //Se tiver, ele mantêm a cor dourada;
        document.getElementById(idAlerta).style="color:#E09900;";
        
    }
    
    //Verificando qual tipo de navegador o usuário está utilizando e obtendo o código da tabela ASCII daquele caracter;
    if(window.event){
        
        var codAscii = caracter.charCode;
        
    } else {
        
        var codAscii = caracter.which;
        
    }
    
    //Verificando se o tipo de entrada.
    if(tipoEntrada == "numeros_contato"){
        
        //Verificando se o código obtido está entre os números;
        if(codAscii >= 48 && codAscii <= 57 || codAscii == 45){
   
            //Se o código estiver entre os números, obtem o elemento que contém o número;
            var textoCaixa = document.getElementById(idElemento).value;
            
            //Verificando se o id do elemento é igual à telefone;
            if(idElemento == "telefone"){
            
                //Se o id for do telefone não pode ter mais do que 13 caracteres no texto;
                if(textoCaixa.length > 13){

                    //Se tiver mais que 13, bloqueia o teclado;
                    return false;

                } 
                
            //Já que não é o telefone, é o celular; 
            } else {
                
                if(textoCaixa.length > 14){

                    return false;

                } 
                
            }    

            if(document.getElementById(idAlerta) != null){

                document.getElementById(idAlerta).style="color:#E09900;";

                return true;
                
            }    
            
        } else {
            
            if(codAscii != 8 && codAscii != 32){
                
                if(document.getElementById(idAlerta) != null){
        
                    document.getElementById(idAlerta).style="color:#FF0019;"; 
        
                }
                
                return false;
               
            }
            
        }
        
    } else if(tipoEntrada == "letras"){
        
        if(codAscii >= 65 && codAscii <= 90){
            
            if(document.getElementById(idAlerta) != null){
        
                document.getElementById(idAlerta).style="color:#E09900;";
        
            }
                
            return true;
            
        } else if(codAscii >= 97 && codAscii <= 122){
            
           if(document.getElementById(idAlerta) != null){
        
                document.getElementById(idAlerta).style="color:#E09900;";
        
            }
                
            return true; 
            
        } else {
            
           if(codAscii != 8 && codAscii != 32){
               
                if(document.getElementById(idAlerta) != null){
        
                    document.getElementById(idAlerta).style="color:#FF0019;"; 
        
                } 
                
                return false;
               
            } 
            
        }
        
    } else if(tipoEntrada == "email"){
        
        if(codAscii >= 45 && codAscii <= 57){
            
            if(document.getElementById(idAlerta) != null){
        
                document.getElementById(idAlerta).style="color:#E09900;";
        
            }
                
            return true;
            
        } else if(codAscii >= 64 && codAscii <= 90){
            
           if(document.getElementById(idAlerta) != null){
        
                document.getElementById(idAlerta).style="color:#E09900;";
        
            }
                
            return true; 
            
        } else if(codAscii >= 97 && codAscii <= 122){
            
           if(document.getElementById(idAlerta) != null){
        
                document.getElementById(idAlerta).style="color:#E09900;";
        
            }
                
            return true; 
            
        } else {
            
           if(codAscii != 8 && codAscii != 95){
               
                if(document.getElementById(idAlerta) != null){
        
                    document.getElementById(idAlerta).style="color:#FF0019;"; 
        
                } 
                
                return false;
               
            } 
            
        }
        
    }
    
}