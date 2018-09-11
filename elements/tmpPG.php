<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Pagina Tmp Para testes</title>
        <script src='../js/lib.js'></script>
        <link rel='stylesheet' href='../css/style.css'>
        <script src='../libs/jquery/jquery-3.3.1.js'></script>
    </head>
    <body>

        <script>
            var success = function () {
                alert('sucess');
            };
            var error = function () {
                alert('erro ');
            };
            var Dialogo = new DialogConfirm(success, error);
            Dialogo.view();
        </script>
    </body>
</html>
