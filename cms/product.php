<?php require_once "app/resorces.php" ?>
<?php require_once "app/autenticacao.php" ?>
<?php
$username = "Default";
if(!isset($_SESSION))session_start();
$con = conect();

if (autentica('verificar')) {
    //echo "Token Ok!!";
    $token = $_SESSION['token'];
    $sql = "SELECT t.token,u.nome,t.dtEmissao FROM tbl_token as t,tbl_usuarios as u where t.idUsuario= u.id and t.token='$token';";
    $query = mysqli_query($con, $sql);

    if ($rsUser = mysqli_fetch_object($query)) {
        $username = $rsUser->nome;
    }
} else {
    echo"Token não existente";
}
$Categorias = getAllCategorias($con);
?>

<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
    <head>
        <?php require_once("./head.php") ?>
        <title>Adm. Usuarios</title>
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
                                <a href="contact.php" style="text-align: center; width: 100%; margin-left: auto; margin-right: auto; display: block;">
                                    <img style="display: block; margin-left: auto; margin-right: auto;" src="img/User-Chat-icon.png" alt="Imagem Contêudo">
                                    Adm. Fale Conosco
                                </a>
                            </div>
                            <div class="cold3 Esquerda" style="height: 85px; background: transparent; outline: #0078A8 solid 1px">
                                <a href="product.php" style="text-align: center; width: 100%; margin-left: auto; margin-right: auto; display: block;">
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
                        <span class="btnaction btnlogs" tbllogs> Logs </span>
                        <a href="./views/frmNiveisAdicionar.php"><span class="btnaction btnlogs">Criar Nivel</span></a>
                        <span class="btnaction btnlogs">Deletar Nivel</span>
                        <a href="./views/frmNiveisEditar.php"><span class="btnaction btnlogs">Editar Nivel</span></a>
                        <style>
                            .btnlogs:before{
                                content: url(./img/logs24x24.png);
                                padding:2px;
                            }
                            #btnadduser:before{
                                content: url(./img/user_add27x27.png);
                                padding:1px;
                            }
                            #btnremoveuser:before{
                                content: url(./img/user_remove24x24.png);
                                padding:2px;
                            }
                            #btnAddCategoria i{
                                font-size: 1.4em;
                                padding-right: 18px;
                            }
                            .btnaction{
                                display: block;
                                margin-right: auto;
                                margin-left: 20px;
                                margin-top: 14px;
                                width: 133px;
                                float: left;
                                cursor: pointer;
                            }
                            .btnaction:hover{
                                color: #006D5C;
                            }

                        </style>
                    </div>
                    <div class="cold8 Esquerda" style="min-height: 500px; background:white;">
                        <label style="font-size: 22px; margin: 14px; border-bottom: solid 1px black; display: block; width: 258px; margin-left: 625px;">CMS/ADM. Produtos</label>
                        <a href="./views/frmUserAdicionar.php">
                        <span style="display:inline-table; display: contents;" id='btnAddCategoria' class="btnaction"><i class="far fa-bookmark"></i>Adicionar Categoria </span>
                        </a>
                        <table  width="590px" cellspacing="0" cellpadding="0" style=" margin-left:auto; margin-right:auto;  margin-top:22px; border:solid 1px black;border-top-left-radius: 10px; border-top-right-radius: 10px; display:block; margin-bottom: 32px;">
                            <thead style="display:block; border-bottom: solid 1px black;">
                                <tr>
                                    <th style="padding:7px; border-right:solid 1px black; display:inline-block;"><label>id</label></th>
                                    <th style="padding:7px; width:136px; border-right:solid 1px black; display:inline-block;">Nome</th>
                                    <th style="padding:7px; width:85px; border-right:solid 1px black; display:inline-block;">Estado</th>
                                    <th style="padding:7px; display:inline-block;">Opções:</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php for ($i = 1; $i < count($Categorias); $i++) { ?>
                                    <tr style="border-bottom: solid 1px black; display: inline-flex; width: 100%;">
                                        <td style="padding:2px; display:inline-block; width: 30px; text-align: center;"><?= $Categorias[$i]->id ?></td>
                                        <td style="padding:2px; width:136px; display:inline-block; text-align: center;"><?= $Categorias[$i]->categoria ?></td>
                                        <td style="padding:2px; width:100px; display:inline-block; text-align: center;">
                                        <?php

                                           echo"<a href='#' class='btnEstado' data-idcategoria='".$Categorias[$i]->id."'>";
                                             if($Categorias[$i]->estado=="V"){
                                                echo "<img data-state='active'  src='./img/Accept-icon.png'>";   
                                             }else{
                                                 echo "<img data-state='disabled' src='./img/disable.png'>";   
                                             }
                                             echo "</a>";
                                          ?>


                                        </td>
                                        <td style="border-left:solid 1px black; padding:7px; width:243px; text-align: center; display:inline-block;">
                                            <a class="btnVer" style=" margin-left: 10px; cursor: pointer;" data-idcategoria="<?= $Categorias[$i]->id ?>"><i class="far fa-eye"></i>Ver</a>
                                            <a class="btnDeletar" style=" margin-left: 10px; cursor: pointer;" data-idcategoria="<?= $Categorias[$i]->id ?>"><i class="far fa-trash-alt"></i>Deletar</a>
                                            <a href="views/frmUserEditar.php?idUsuario=<?= $Categorias[$i]->id ?>" class="btnEditar" style=" margin-left: 10px; cursor: pointer;"><i class="fas fa-edit"></i>Editar</a>
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
        </div>
        <div id="container" style="position:fixed; display:none; z-index:990; top:0; left:0; width: 100%; height: 100%; background-color: black; opacity:0.4;">
            </div>
            <div id="modal">
                    
            </div>
            <script>
            $('span[tbllogs]').click(function(){
                    $('.Alert').remove();
                     $.ajax({
                        method: "GET",
                        url: "./views/tbllogs.php",
                        data: {},
                        success: function (msg) {
                            $('#container').css('display','block');
                            $('#modal').css('display','block');
                            $('#modal').load('./elements/AlertaDefault.php', function (sresponseText, statusText, xhr){
                             
                                if (statusText == "success") {
                                    $('.Alert').addClass('animated zoomInUp');
                                    $('.Alert').draggable();
                                    $('.Alert').css('min-width','804px');
                                    $('.msgConteudo').html(msg);     
                                }
                            });

                            //$('#modal').html(msg);

                        }
                    });
            });
            $('.btnEstado').click(function(){
                
                //alert('IdUser:'+$(this).attr('data-iduser'));
                //alert(" "+$(this).children().first().attr('data-state'));
                var imgEstado = $(this).children().first();
                var estado = $(this).children().first().attr('data-state');
                if(estado=="active"){

                    //alert('esta ativo');
                    $.ajax({
                        method: "POST",
                        url: "./app/categoria.php",
                        data: { action:'AlterarEstado',
                                Estado:'F',
                                idCategoria:$(this).attr('data-idcategoria')
                               },
                        success: function (msg) {
                                
                                    //alert(msg);
                                    imgEstado.attr('src','./img/disable.png');
                                    imgEstado.attr('data-state','disable');
                                
                            //$('#modal').html(msg);

                        }
                    });
                    
                }else{
                    //alert('esta desativado');
                    $.ajax({
                        method: "POST",
                        url: "./app/categoria.php",
                        data: { action:'AlterarEstado',
                                Estado:'V',
                                idCategoria:$(this).attr('data-idcategoria')
                               },
                        success: function (msg) {                                
                                    alert(msg);
                                    imgEstado.attr('src','./img/Accept-icon.png');
                                    imgEstado.attr('data-state','disable');
                                
                            //$('#modal').html(msg);

                        }
                    });
                }
            })

             $('#container').click(function(){
                    $('#container').css('display','none');
                    $('#modal').css('display','none');
                });
             $('.btnVer').click(function () {
                    $('.Alert').remove();
                     $.ajax({
                        method: "GET",
                        url: "./app/categoria.php",
                        data: {action:'ver',idCategoria:$(this).attr('data-idcategoria')},
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
                    var dialogo = new DialogConfirm(function(){
                      
                         $(".ConfirmDialog").remove();
                    },function(){
                         $(".ConfirmDialog").remove();         
                    })
                    dialogo.view('Deseja Mesmo Deletar esse Registro',' Deseja  delletar?');
                    $('.Alert').remove();
                     $.ajax({
                        method: "GET",
                        url: "./app/categoria.php",
                        data: {action:'deletar',idCategoria:$(this).attr('data-idcategoria')},
                        success: function (msg) {
                            alert("Messagem Chegou "+msg);
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
    </body>
</html>
