<?php
if(!isset($_SESSION))session_start();
if(!isset($_POST['txtEmail']) || !isset($_POST['txtPassword'])){
    header("location:../index.php?msg=falha senha ou usuario incorreto");
    echo"Redirecionador";
}
?>
<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
    <head>
        <meta charset="utf-8">
        <script src="libs/jquery/jquery-3.3.1.js"></script>
        <title>Login</title>
    </head>
    <body style="/*background-image: url(img/gif/45.gif); background-size:256 256 ; background-repeat: no-repeat;*/">
        <img alt="carregando.." src="img/gif/ajax-loader.gif" style="display: block;margin-left: auto;margin-right: auto;height: 21px;margin-top: 14%;">
        <p id="msg" style="text-align: center; color:black; font-size: 17px; font-weight: bolder;">Gerando Token..</p>
        <script>
        $(function(){
            
            $.ajax({
                method:"POST",
                url:"./app/autenticacao.php",
                data:{txtEmail:'<?=$_POST['txtEmail']?>',txtPassword:'<?=$_POST['txtPassword']?>',action:'gerar'},
                success:function(msg){
                    switch(msg*1){
                        case 0:
                            /*alert('token gerado com sucesso!!');*/
                            window.location.href ="./index.php";
                            break;
                        case 1:
                            alert('Senha ou Usuario incorreto!!');
                            window.location.href ="../index.php";
                            break;
                        case 2:
                            alert('Usuario não existe!!');
                            window.location.href ="../index.php";
                            break;
                            

                    }
                   /*window.location.replace("index.php");
                   window.location.href ="./index.php";*/
              }
            });

        });
        
        </script>
    </body>
</html>
