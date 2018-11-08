<?php require_once "../app/resorces.php" ?>
<?php require_once "../app/autenticacao.php" ?>
<?php
$con = conect();
$username = "Default";
session_start();
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
if (isset($_GET['idUsuario'])) {
    $id = $_GET['idUsuario'];
    $Usuario = getUsuario($id, $con);
}

$UsuarioEstados = getUsuarioEstados($con);
$UsuarioCargos = getUsuarioCargos($con);
?>

<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
    <head>
        <link rel="stylesheet" href="../css/estruturadefault.css">
        <link rel="stylesheet" href="../css/style.css">
        <title>Adm. Fale Conosco</title>
        <script src="../libs/jquery/jquery-3.3.1.js"></script>
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
                    <img alt="Logo" class="Direita" src="../img/tool-box-icon.png" width="64" height="64">
                </div>
            </header>
            <div id="main" role="main">
                <div class="row" style="overflow: hidden; margin-bottom: 1px; border-bottom: solid 1px #0078A8;">
                    <nav class="cold8 Esquerda" style="min-height: 85px; background: rgb(255,255,255); background: linear-gradient(265deg, rgba(255,255,255,1) 38%, rgba(231,227,227,1) 67%);">
                        <div class="row">
                            <div class="cold3 Esquerda" style="height: 85px; background: transparent; outline: #0078A8 solid 1px">
                                <a href="../index.php" style="text-align: center; width: 100%; margin-left: auto; margin-right: auto; display: block;">
                                    <img style="display: block; margin-left: auto; margin-right: auto;" src="../img/content-icon.png" alt="Imagem Contêudo">
                                    Adm. Conteúdo
                                </a>
                            </div>
                            <div class="cold3 Esquerda" style="height: 85px; background: transparent; outline: #0078A8 solid 1px">
                                <a href="../contact.php" style="text-align: center; width: 100%; margin-left: auto; margin-right: auto; display: block;">
                                    <img style="display: block; margin-left: auto; margin-right: auto;" src="../img/User-Chat-icon.png" alt="Imagem Contêudo">
                                    Adm. Fale Conosco
                                </a>
                            </div>
                            <div class="cold3 Esquerda" style="height: 85px; background: transparent; outline: #0078A8 solid 1px">
                                <a href="" style="text-align: center; width: 100%; margin-left: auto; margin-right: auto; display: block;">
                                    <img style="display: block; margin-left: auto; margin-right: auto;" src="../img/Emails-Folder-icon.png" alt="Imagem Contêudo">
                                    Adm. Produtos
                                </a>
                            </div>
                            <div class="cold3 Esquerda" style="height: 85px; background: transparent; outline: #0078A8 solid 1px">
                                <a href="../user.php" style="text-align: center; width: 100%; margin-left: auto; margin-right: auto; display: block;">
                                    <img style="display: block; margin-left: auto; margin-right: auto;" src="../img/Windows-Messenger-icon.png" alt="Imagem Contêudo">
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
                            <div class="cold7" style="float: left; height: 31px;"><p style="margin-top:-18px;"><?= @$token ?></p></div>
                            <div class="cold4" style="float: left;"><a href="../app/null.php" style="font-size: 23px;"><i class="fas fa-sign-out-alt"></i>Logout</a></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="cold2 Esquerda" style="min-height: 500px; background: white;">
                        <span class="btnaction" id="btnlogs"> Logs </span>
                        <style>
                            #btnlogs:before{
                                content: url(../img/logs24x24.png);
                                padding:2px;
                            }
                            #btnedituser:before{
                                content: url(../img/user_edit24x24.png);
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
                        <span id="btnedituser" class="btnaction">Editar </span>
                        <div class="row cold9" style="margin-top: 18px;">
                            <form method="get" action="../app/user.php">
                                <div class="row">
                                    <div class="cold2"><label for="txtNome">Nome:</label></div>
                                    <div class="cold8"><input required maxlength="40" value="<?= $Usuario->nome ?>" type="text" id="txtNome" name="txtNome" style="border: solid 1px; padding: 4px; margin-bottom: 4px;" class="row"/></div>
                                </div>
                                <div class="row">
                                    <div class="cold2"><label for="txtEmail">E-mail:</label></div>
                                    <div class="cold8"><input required maxlength="120" value="<?= $Usuario->email ?>" type="text" id="txtEmail" name="txtEmail" style="border: solid 1px; padding: 4px; margin-bottom: 4px;" class="row"/></div>
                                </div>
                                <div class="row">
                                    <div class="cold2"><label for="txtPassword">Senha:</label></div>
                                    <div class="cold8"><input required maxlength="22" type="password" id="txtPassword" name="txtPassword" style="border: solid 1px; padding: 4px; margin-bottom: 4px;" class="row"/></div>
                                </div>
                                <div class="row">
                                    <div class="cold2"><label for="txtTelefone">Telefone:</label></div>
                                    <div class="cold8"><input required maxlength="13" value="<?= $Usuario->telefone ?>" type="text" id="txtTelefone" name="txtTelefone" style="border: solid 1px; padding: 4px; margin-bottom: 4px;" class="row"/></div>
                                </div>
                                <div class="row">
                                    <div class="cold2"><label>Cargo:</label></div>
                                    <div class="cold8"><select name="slcCargo" required>
                                            <?php
                                            for ($i = 0; $i < count($UsuarioCargos); $i++) {
                                                if ($UsuarioCargos[$i]->id == $Usuario->idCargo) {
                                                    ?>
                                                    <option value="<?= $UsuarioCargos[$i]->id ?>" selected><?= $UsuarioCargos[$i]->nome ?></option>
                                                <?php } else { ?>
                                                    <option value="<?= $UsuarioCargos[$i]->id ?>"><?= $UsuarioCargos[$i]->nome ?></option>
                                                <?php }
                                            }
                                            ?>
                                        </select></div>
                                </div>
                                <div class="row">
                                    <div class="cold2"><label>Estado:</label></div>
                                    <div class="cold8"><select name="slcEstado" required>
                                            <?php
                                            for ($i = 0; $i < count($UsuarioEstados); $i++) {
                                                if ($UsuarioEstados[$i]->id == $Usuario->idEstado) {
                                                    ?>
                                                    <option value="<?= $UsuarioEstados[$i]->id ?>" selected><?= $UsuarioEstados[$i]->nome ?></option>
                                                <?php } else { ?>
                                                    <option value="<?= $UsuarioEstados[$i]->id ?>"><?= $UsuarioEstados[$i]->nome ?></option>
                                                <?php }
                                            }
                                            ?>    
                                        </select></div>
                                </div>
                                <div class="row">
                                    <input type="text" class="hidden" name="idUsuario" value="<?= $Usuario->id ?>">
                                    <input class="hidden" name="action" value="editar">
                                    <button class="btn Direita" type="submit">Salvar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <footer>
                <p style="display: block; text-align: center; margin-left: auto; margin-right: auto; margin-top: 0px; padding-top: 44px;">Desenvolvido por: <a href="mailto:gilberto.tec@vivaldi.net">Gilberto Ramos de Oliveira</a></p>
            </footer>
        </div>
    </body>
</html>
