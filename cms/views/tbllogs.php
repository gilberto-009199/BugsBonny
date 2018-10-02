<?php require_once "../app/resorces.php" ?>
<?php require_once "../app/autenticacao.php" ?>
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
    $logs= getLogs(conect());
    var_dump($logs);   
    
?>
<table  width="990px" cellspacing="0" cellpadding="0" style="margin-top:22px; border:solid 1px black;border-top-left-radius: 10px; border-top-right-radius: 10px; display:block; margin-bottom: 32px;">
                            <thead style="display:block; border-bottom: solid 1px black;">
                                <tr>
                                    <th style="padding:7px; width:157px; border-right:solid 1px black; display:inline-block;">Usuario</th>
                                    <th style="padding:7px; width:231px; border-right:solid 1px black; display:inline-block;">Ação</th>
                                    <th style="padding:7px; width:202px; border-right:solid 1px black; display:inline-block;">Em</th>
                                    <th style="padding:7px; width:154px; border-right:solid 1px black; display:inline-block;">IP</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php for ($i = 0; $i < count($logs); $i++) { ?>
                                    <tr style="border-bottom: solid 1px black; display: inline-flex; width: 100%;">
                                        <td style="padding:2px; width:166px; display:inline-block; text-align: center;"><?= $logs[$i]->usuario ?></td>
                                        <td style="padding:2px; width:244px; display:inline-block; text-align: center;"><?= $logs[$i]->op ?></td>
                                        <td style="padding:2px; width:202px; display:inline-block; text-align: center;"><?= $logs[$i]->em ?></td>
                                        <td style="padding:2px; width:154px; display:inline-block; text-align: center;"><?= $logs[$i]->ip ?></td>
                                    </tr>
                                <?php } ?>                              
                            </tbody>
                        </table>

