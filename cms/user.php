<?php require_once "app/resorces.php" ?>
<?php require_once "app/autenticacao.php" ?>
<?php require_once "app/user.php" ?>
<?php
$username = "Default";
if(!isset($_SESSION))session_start();
// echo ($_SESSION['token']);
if (autentica('verificar')) {
    //echo "Token Ok!!";
    $token = $_SESSION['token'];
    $sql = "SELECT t.token,u.nome,t.dtEmissao FROM tbl_token as t,tbl_usuarios as u where t.idUsuario= u.id and t.token='$token';";
    $con = conect();
    $query = mysqli_query($con, $sql);

    if ($rsUser = mysqli_fetch_object($query)) {
        $username = $rsUser->nome;
    }
} else {
    echo"Token não existente";
}
$Usuarios = user('listar');
?>

<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
    <head>
        <?php require_once("./head.php") ?>
        <title>Adm. Usuarios</title>
        <link rel="stylesheet" href="css/animate.min.css">
    </head>
    <body>
        <div id="CaixaSite"><!-- Caixa que contem o conteudo do site -->
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
                                <a href="contact.php" style="text-align: center; width: 100%; margin-left: auto; margin-right: auto; display: block;">
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
                            <p>Bem vindo, <?= @$username ?>.</p>
                        </div>
                        <div class="row">
                            <div class="cold7" style="float: left; height: 31px;"><p style="margin-top:-18px;"><?=@$token?></p></div>
                            <div class="cold4" style="float: left;"><a href="./app/null.php" style="font-size: 23px;"><i class="fas fa-sign-out-alt"></i>Logout</a></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="cold2 Esquerda" style="min-height: 500px; background: white;">
                        <span class="btnaction" id="btnlogs"> Logs </span>
                        <style>
                            #btnlogs:before{
                                content: url(./img/logs24x24.png);
                                padding:2px;
                            }
                            #btnadduser:before{
                                content: url(./img/user_add27x27.png);
                                padding:2px;
                            }
                            #btnremoveuser:before{
                                content: url(./img/user_remove24x24.png);
                                padding:2px;
                            }
                            .btnaction{
                                display: block;
                                margin-right: auto;
                                margin-left: 50px;
                                margin-top: 10px;
                                width: 97px;
                                float: left;
                                cursor: pointer;
                            }
                            .btnaction:hover{
                                color: #006D5C;
                            }

                        </style>
                    </div>
                    <div class="cold8 Esquerda" style="min-height: 500px; background:white;">
                        <label style="font-size: 22px; margin: 14px; border-bottom: solid 1px black; display: block; width: 258px; margin-left: 625px;">CMS/ADM. Usuarios</label>
                        <a href="./views/frmUserAdicionar.php">
                        <span style="display:inline-table; display: contents;" id="btnadduser" class="btnaction">Adicionar </span>
                        </a>
                        <table  width="990px" cellspacing="0" cellpadding="0" style="margin-top:64px; border:solid 1px black;border-top-left-radius: 10px; border-top-right-radius: 10px; display:block; margin-bottom: 32px;">
                            <thead style="display:block; border-bottom: solid 1px black;">
                                <tr>
                                    <th style="padding:7px; border-right:solid 1px black; display:inline-block;"><label>id</label></th>
                                    <th style="padding:7px; width:136px; border-right:solid 1px black; display:inline-block;">Nome</th>
                                    <th style="padding:7px; width:156px; border-right:solid 1px black; display:inline-block;">Email</th>
                                    <th style="padding:7px; width:100px; border-right:solid 1px black; display:inline-block;">Cargo</th>
                                    <th style="padding:7px; width:150px; border-right:solid 1px black; display:inline-block;">Desde</th>
                                    <th style="padding:7px; width:65px; border-right:solid 1px black; display:inline-block;">Estado</th>
                                    <th style="padding:7px; display:inline-block;">Opções:</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php for ($i = 1; $i < count($Usuarios); $i++) { ?>
                                    <tr style="border-bottom: solid 1px black; display: inline-flex; width: 100%;">
                                        <td style="padding:2px; display:inline-block; width: 30px; text-align: center;"><?= $Usuarios[$i]->id ?></td>
                                        <td style="padding:2px; width:136px; display:inline-block; text-align: center;"><?= $Usuarios[$i]->nome ?></td>
                                        <td style="padding:2px; width:190px; display:inline-block; text-align: center;"><?= $Usuarios[$i]->email ?></td>
                                        <td style="padding:2px; width:100px; display:inline-block; text-align: center;"><?= $Usuarios[$i]->cargos ?></td>
                                        <td style="padding:2px; width:150px; display:inline-block; text-align: center;"><?= $Usuarios[$i]->desde ?></td>
                                        <td style="padding:2px; width:100px; display:inline-block; text-align: center;"><?= $Usuarios[$i]->estado ?></td>
                                        <td style="border-left:solid 1px black; padding:7px; width:243px; text-align: center; display:inline-block;">
                                            <a class="btnVer" style=" margin-left: 10px; cursor: pointer;" data-user="<?= $Usuarios[$i]->id ?>"><i class="far fa-eye"></i>Ver</a>
                                            <a class="btnDeletar" style=" margin-left: 10px; cursor: pointer;" data-user="<?= $Usuarios[$i]->id ?>"><i class="far fa-trash-alt"></i>Deletar</a>
                                            <a href="views/frmUserEditar.php?idUsuario=<?= $Usuarios[$i]->id ?>" class="btnEditar" style=" margin-left: 10px; cursor: pointer;"><i class="fas fa-edit"></i>Editar</a>
                                        </td>
                                    </tr>
                                <?php } ?>                              
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <footer>
                <p style="display: block; text-align: center; margin-left: auto; margin-right: auto; margin-top: 0px; padding-top: 44px;">Desenvolvido por: <a href="mailto:gilberto.tec@vivaldi.net">Gilberto Ramos de Oliveira</a></p>
            </footer>
            <div id="container" style="position:fixed; display:none; z-index:990; top:0; left:0; width: 100%; height: 100%; background-color: black; opacity:0.4;">
            </div>
            <div id="modal">
                    
            </div>
            <script>
             $('#container').click(function(){
                    $('#container').css('display','none');
                    $('#modal').css('display','none');
                });
                $('.btnVer').click(function () {
                    $('.Alert').remove();
                     $.ajax({
                        method: "GET",
                        url: "./app/user.php",
                        data: {action:'ver',idUser:$(this).attr('data-user')},
                        success: function (msg) {
                            $('#container').css('display','block');
                            $('#modal').css('display','block');
                            $('#modal').load('./elements/AlertaDefault.php', function (sresponseText, statusText, xhr){
                             
                                if (statusText == "success") {
                                    $('.Alert').addClass('animated zoomInUp');
                                    $('.Alert').draggable();
                                    $('.msgConteudo').html(msg);     
                                }
                            });

                            //$('#modal').html(msg);

                        }
                    });
                });
                $('.btnDeletar').click(function () {
                    
                    $('.Alert').remove();
                     $.ajax({
                        method: "GET",
                        url: "./app/user.php",
                        data: {action:'deletar',idUsuario:$(this).attr('data-user')},
                        success: function (msg) {
                            alert(msg);
                            $('#container').css('display','block');
                            $('#modal').css('display','block');
                            $('#modal').load('./elements/AlertaDefault.php', function (sresponseText, statusText, xhr){
                             
                                if (statusText == "success") {
                                    $('.Alert').addClass('animated zoomInUp');
                                    $('.Alert').draggable();
                                    $('.msgConteudo').html(msg);     
                                }
                            });

                            //$('#modal').html(msg);

                        }
                    });
                });
            </script>
        </div>
    </body>
</html>
