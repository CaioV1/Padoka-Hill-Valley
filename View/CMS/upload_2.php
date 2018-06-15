<?php 

    if(isset($_POST)){
        
        $imagem = basename($_FILES["fle_image"]["name"]);
        
        $extensao = strrchr($imagem, ".");
        
        $nomeImagem = pathinfo($imagem, PATHINFO_FILENAME);
        
        $imagem = md5(uniqid(time().$nomeImagem)).$extensao;
        
        $tamanhoImagem = round((($_FILES["fle_image"]["size"]) / 1024));
        
        $uploadDir = "../Imagens/imagens_conteudo/";
        
        $listaExtensoes = array(".jpg", ".png", ".jpeg", ".gif", ".svg");
        
        $caminhoImagem = $uploadDir.$imagem;
        
        if(in_array($extensao, $listaExtensoes)){

            if($tamanhoImagem <= 5120){

                $arquivo_tmp = $_FILES["fle_image"]["tmp_name"];

                if(move_uploaded_file($arquivo_tmp, $caminhoImagem)){
                    
                    echo("<img src = '".$caminhoImagem."'>");
                    echo("<script>frm_conteudo.txt_imagem.value = '".strstr($caminhoImagem, "I")."'</script>");

                } else {

                    echo("Erro. Ao enviar o arquivo para o servidor.");

                }

            } else {

                echo("<br> Erro. Tamanho maior que o limite.");

            }

        } else {

            echo("<br> Erro. Arquivo não permitido.");

        }
        
    }

?>