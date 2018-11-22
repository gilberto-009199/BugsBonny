<?php require_once "app/resorces.php" ?>
<?php require_once "app/autenticacao.php" ?>
<?php
$username="Default";
if(!isset($_SESSION))session_start();
   // echo ($_SESSION['token']);
if(autentica('verificar')){
    //echo "Token Ok!!";
    $token =$_SESSION['token'];
    $sql="SELECT t.token,u.nome,t.dtEmissao FROM tbl_token as t,tbl_usuarios as u where t.idUsuario= u.id and t.token='$token';";
    $con = conect();
    $query = mysqli_query($con,$sql);
    
    if($rsUser= mysqli_fetch_object($query)){
        $username=$rsUser->nome;
    }

}

    
?>

<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
    <head>
        <?php require_once("./head.php") ?>
        <title>CMS</title>
        <link rel="stylesheet" href="css/animate.min.css">
    </head>
    <body>
        <div id="CaixaSite" class=" animated fadeInLeft"><!-- Caixa que contem o conteudo do site -->
            <header>
                <div style="width:7%; display:inline-block;">
                    <h1 style="text-shadow: -3px 1px 1px #000000;">CMS</h1>
                </div>
                <div class="cold5">
                     <p style="font-size: 23px; text-shadow: -3px 1px 1px #000000;">- Sistema de Gerenciamento do Site</p>
                </div>
                <div class="cold4 Direita" style="background: transparent; height: 77px; width: 231px; margin-top: 13px; margin-right: 78px;">
                    <img alt="Logo" class="Direita" src="./img/tool-box-icon.png" width="64" height="64">
                </div>
            </header>
            <div id="main" role="main">
                <div class="row" style="overflow: hidden; margin-bottom: 1px; border-bottom: solid 1px #0078A8;">
                    <nav class="cold8 Esquerda" style="min-height: 85px; background: rgb(255,255,255); background: linear-gradient(265deg, rgba(255,255,255,1) 38%, rgba(231,227,227,1) 67%);">
                        <div class="row">
                            <div class="cold3 Esquerda" style="height: 85px; background: transparent; outline: #0078A8 solid 1px">
                                <a href="index.php" style="text-align: center; width: 100%; margin-left: auto; margin-right: auto; display: block;">
                                    <img style="display: block; margin-left: auto; margin-right: auto;" src="img/content-icon.png" alt="Imagem Contêudo">
                                    Adm. Conteúdo
                                </a>
                            </div>
                            <div class="cold3 Esquerda" style="height: 85px; background: transparent; outline: #0078A8 solid 1px">
                                <a href="./contact.php" style="text-align: center; width: 100%; margin-left: auto; margin-right: auto; display: block;">
                                    <img style="display: block; margin-left: auto; margin-right: auto;" src="img/User-Chat-icon.png" alt="Imagem Contêudo">
                                    Adm. Fale Conosco
                                </a>
                            </div>
                            <div class="cold3 Esquerda" style="height: 85px; background: transparent; outline: #0078A8 solid 1px">
                                <a href="" style="text-align: center; width: 100%; margin-left: auto; margin-right: auto; display: block;">
                                    <img style="display: block; margin-left: auto; margin-right: auto;" src="img/Emails-Folder-icon.png" alt="Imagem Contêudo">
                                    Adm. Produtos
                                </a>
                            </div>
                            <div class="cold3 Esquerda" style="height: 85px; background: transparent; outline: #0078A8 solid 1px">
                                <a href="user.php" style="text-align: center; width: 100%; margin-left: auto; margin-right: auto; display: block;">
                                    <img style="display: block; margin-left: auto; margin-right: auto;" src="img/Windows-Messenger-icon.png" alt="Imagem Contêudo">
                                    Adm. Usuarios
                                </a>
                            </div>
                        </div>
                     </nav>
                    <div class="cold3 Esquerda" style="height: 85px; outline: #0078A8 solid 1px">
                        <div class="row" style="padding-left: 27px; font-weight: bolder;">
                            <p>Bem vindo, <?=@$username?>.</p>
                        </div>
                        <div class="row">
                            <div class="cold7" style="float: left; height: 31px;"></div>
                            <div class="cold4" style="float: left;"><a href="./app/null.php" style="font-size: 23px;"><i class="fas fa-sign-out-alt"></i>Logout</a></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                <style>
                    ul li:hover>ul{
                        display: block;
                    }
                    ul li ul{
                        display: none;
                    }
                    ul li:before{
                        position: absolute;
                        margin-left: -27px;
                        margin-right: 10px;
                        content: url('./img/scroll-down-icon.png');
                    }

                    ul li.scrollUp:before{
                        margin-right: 10px;
                        content: url('./img/scroll-up-icon.png');
                    }
                    ul li.scrollDown:before{
                        margin-right: 10px;
                        content: url('./img/scroll-down-icon.png');
                    }
                    ul li.add:before{
                        margin-right: 10px;
                        content: url('./img/Accept-icon.png');
                    }
                    ul li.info:before{
                        margin-right: 10px;
                        content: url('./img/Info-icon.png');
                    }
                    ul li.remove:before{
                        margin-right: 10px;
                        content: url('./img/remove-icon.png');
                    }
                    ul li{
                        margin-top:10px;
                        list-style-type:none;
                        font-size: 21px;
                    }
                </style>
                    <div class="Esquerda" style="width: 21%; min-height: 500px; background: #eee;">
                        <ul class="listPg">
                            <li class="scrollDown" data-compoment="./views/tblSobre.vue.php">Sobre</li>
                            <li class="scrollDown" data-compoment="./views/tblCelebridades.vue.php">Celebridades</li>
                            <li class="scrollDown">Noticias</li>
                            <li class="scrollDown" data-compoment="./views/tblOfertas.vue.php">Ofertas</li>
                            <li class="scrollUp" data-compoment="./views/tblBancas.vue.php">Bancas
                                <ul>
                                    <li class="add">Add. Donos</li>
                                    <li class="remove">Del. Donos</li>
                                    <li class="add">Add. Banca</li>
                                    <li class="remove">Del. Banca</li>
                                    <li class="info">Ver Bancas</li>
                                </ul>
                            </li>
                        </ul>
                    
                    </div>
                    <div class="cold8 Esquerda" id="conteudo" style="min-height: 500px; background:white;"></div>
                </div>
             </div>
            <footer>
                <p style="display: block; text-align: center; margin-left: auto; margin-right: auto; margin-top: 0px; padding-top: 44px;">Desenvolvido por: <a href="mailto:gilberto.tec@vivaldi.net">Gilberto Ramos de Oliveira</a></p>
            </footer>
            <script>
                //Chama a pagina baseada no elmento clicado pelo usuario
                $('li[class*=scroll]').click(function(){
                    var compoment = $(this).attr('data-compoment');
                    $('#conteudo').children().remove();
                    $.ajax({
                        method: "GET",
                        url: compoment,
                        data: {},
                        success: function (msg) {
                            $('#conteudo').html(msg);
                        }
                    });
                });
                //chama a pagia de bancas por padrão
                $('#conteudo').children().remove();
                    $.ajax({
                        method: "GET",
                        url: './views/tblBancas.vue.php',
                        data: {},
                        success: function (msg) {
                            $('#conteudo').html(msg);
                        }
                    });
                /*$('.listPg li[class*="scroll"]').click(function(){
                    alert('oi');
                    if($(this).hasClass('scrollDown')){
                        $(this).removeClass('scrollDown');
                        $(this).addClass('scrollUp');
                        $(this).children("ul li").css('display','block');
                    }else if($(this).hasClass('scrollUp')){
                        $(this).removeClass('scrollUp');
                        $(this).addClass('scrollDown');
                        $(this).children("li").css('display','none');
                    }
                })*/
                

            </script>
        </div>
    </body>
</html>
