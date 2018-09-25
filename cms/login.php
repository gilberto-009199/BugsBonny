<?php
session_start();
if(!isset($_GET['txtEmail']) && !isset($_GET['txtPassword'])){
    header("relocation:index.php?msg=falha ao logar senha e email não preenchidos");
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
                url:"app/autenticacao.php",
                data:{txtEmail:'<?=$_GET['txtEmail']?>',txtPassword:'<?=$_GET['txtPassword']?>'},
                success:function(msg){
                    alert(msg);
                   /*window.location.replace("index.php");
                   window.location.href ="index.php";*/
              }
            });
        });
        
        </script>
    </body>
</html>
