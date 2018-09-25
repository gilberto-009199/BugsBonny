<?php require_once"resorces.php" ?>
<?php
session_start();
function geralog($action){
    $con = conect();
    if (!$con) {
        echo "Erro ao pegar os Tickets!!";
        throw Exception("Um erro Ocorreu ao acessar os Tickets!!" . date('Y-m-d H:i:s'));
        echo '1';
        return false;
    }
    $token = $_SESSION['token'];
    $dtEmissao = date('Y-m-d H:i:s');
    $ip=  $_SERVER["REMOTE_ADDR"];
    /*echo "<p> token: $token, emissao: $dtEmissao, ip: $ip </p>";*/
    $sql = "select *from tbl_token where token= '$token';";
    $query = mysqli_query($con,$sql);
    $idToken= mysqli_fetch_object($query)->id;
    $sql = "insert into tbl_logs(action,idToken,dtEmissao,ip)values('$action',$idToken,'$dtEmissao','$ip');";
    mysqli_query($con,$sql);
}
?>