<?php require_once "app/resorces.php" ?>
<?php require_once "app/autenticacao.php" ?>
<?php require_once "app/tickets.php" ?>
<?php
$TicketsRecebidos;
$username="Default";
session_start();
   // echo ($_SESSION['token']);
if(autentica('verificar')){
    //echo "Token Ok!!";
    $token =$_SESSION['token'];
    $sql="SELECT t.token,u.nome,t.dtEmissao FROM tbl_token as t,tbl_usuarios as u where t.idUsuario= u.id and t.token='$token';";
    $con = conect();
    $query = mysqli_query($con,$sql);
    
    if($rsUser= mysqli_fetch_object($query)){
        $username=$rsUser->nome;
        $TicketsRecebidos=tickets("listar");
    }

}

    
?>

<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
    <head>
        <?php require_once("./head.php") ?>
        <title>Adm. Fale Conosco</title>
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
                                <a href="" style="text-align: center; width: 100%; margin-left: auto; margin-right: auto; display: block;">
                                    <img style="display: block; margin-left: auto; margin-right: auto;" src="img/content-icon.png" alt="Imagem Contêudo">
                                    Adm. Conteúdo
                                </a>
                            </div>
                            <div class="cold3 Esquerda" style="height: 85px; background: transparent; outline: #0078A8 solid 1px">
                                <a href="" style="text-align: center; width: 100%; margin-left: auto; margin-right: auto; display: block;">
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
                                <a href="" style="text-align: center; width: 100%; margin-left: auto; margin-right: auto; display: block;">
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
                            <div class="cold4" style="float: left;"><a style="font-size: 23px;"><i class="fas fa-sign-out-alt"></i>Logout</a></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="cold3 Esquerda" style="min-height: 500px; background: #5bc0de;"></div>
                    <div class="cold8 Esquerda" style="min-height: 500px; background:white;">
                        <label style="font-size: 22px; margin: 14px; border-bottom: solid 1px black; display: block; width: 258px; margin-left: 625px;">CMS/ADM. Fale Conosco</label>
                        <table  width="890px" cellspacing="0" cellpadding="0" style="margin-top:64px; border:solid 1px black;border-top-left-radius: 10px; border-top-right-radius: 10px;display:block;">
                            <thead style="display:block; border-bottom: solid 1px black;">
                                <tr>
                                    <th style="padding:7px; border-right:solid 1px black; display:inline-block;"><label>id</label></th>
                                    <th style="padding:7px; width:232px; border-right:solid 1px black; display:inline-block;">Nome</th>
                                    <th style="padding:7px; width:46px; border-right:solid 1px black; display:inline-block;">Sexo</th>
                                    <th style="padding:7px; width:157px; border-right:solid 1px black; display:inline-block;">data </th>
                                    <th style="padding:7px; width:90px; border-right:solid 1px black; display:inline-block;">Profissão</th>
                                    <th style="padding:7px; display:inline-block;">Opções:</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php for($i=1; $i<count($TicketsRecebidos);$i++){?>
                                    <tr style="border-bottom: solid 1px black; display: inline-flex; width: 100%;">
                                    <td style="padding:7px; display:inline-block; width: 30px; text-align: center;"><?=$TicketsRecebidos[$i]->id?></td>
                                    <td style="padding:7px; width:232px; display:inline-block; text-align: center;"><?=$TicketsRecebidos[$i]->nome?></td>
                                    <td style="padding:7px; width:46px; display:inline-block; text-align: center;"><?=$TicketsRecebidos[$i]->sexo?></td>
                                    <td style="padding:7px; width:157px; display:inline-block; text-align: center;"><?=$TicketsRecebidos[$i]->dataCriacao?></td>
                                    <td style="padding:7px; width:90px; display:inline-block; text-align: center;"><?=$TicketsRecebidos[$i]->profissao?></td>
                                    <td style="margin-left:16px; padding:7px; width:232px; text-align: center; display:inline-block;"><i class="far fa-eye"></i>Ver <i class="far fa-trash-alt"></i>Deletar </td>
                                </tr>
                                <?php }?>                              
                            </tbody>
                        </table>

                    </div>
                </div>
             </div>
            <footer>
                <p style="display: block; text-align: center; margin-left: auto; margin-right: auto; margin-top: 0px; padding-top: 44px;">Desenvolvido por: <a href="mailto:gilberto.tec@vivaldi.net">Gilberto Ramos de Oliveira</a></p>
            </footer>
        </div>
    </body>
</html>
