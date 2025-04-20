<?php require_once "resorces.php" ?>
<?php

function autentica($action) {
    $con = conect();
    if (!$con) {
        echo "Erro ao gerar token ou verificar token!!";
        throw Exception("Um erro Ocorreu ao gerar ou acessar Token de acesso!!" . date('Y-m-d H:i:s'));
        return false;
    }
    switch($action){
        case "gerar":
                $email = $_POST["txtEmail"];
                $sql = "select * from tbl_usuarios where email='$email'";
                $query = mysqli_query($con, $sql);
                if ($rsUser = mysqli_fetch_object($query)) {
                //echo " Usuario =" . $rsUser->nome . ".";
                if (password_verify($_POST["txtPassword"], $rsUser->senha)) {
                    //echo "senha compativel";
                    if(isset($_SESSION))session_destroy();
                    //echo"<p>Sessao destruida!!</p>";
                    if(!isset($_SESSION))session_start();
                    /* entropia = 12 numeros aleatorios + data atual + 12 numeros aleatorios */
                    $entropia = "" . rand(1, 9) . "" . rand(1, 9) . "" .
                            rand(1, 9) . "" . rand(1, 9) . "" . rand(1, 9) . "" .
                            rand(1, 9) . "" . rand(1, 9) . "" . rand(1, 9) . "" .
                            rand(1, 9) . "" . rand(1, 9) . "" . rand(1, 9) . "" .
                            rand(1, 9) . "" . date('Y-m-d H:i:s') . "" . rand(1, 9)
                            . "" . rand(1, 9) . "" . rand(1, 9) . "" . rand(1, 9)
                            . "" . rand(1, 9) . "" . rand(1, 9) . "" . rand(1, 9)
                            . "" . rand(1, 9) . "" . rand(1, 9) . "" . rand(1, 9)
                            . "" . rand(1, 9) . "" . rand(1, 9) . "";
                    //echo "<p>Entropia: $entropia</p>";
                    $token = md5($entropia);
                    $idUsuario = $rsUser->id;
                    $dataAtual = date('Y-m-d H:i:s');
                    $sql = "insert into tbl_token(token,idUsuario,dtEmissao)values('$token',$idUsuario,'$dataAtual')";
                    //echo "SQL: $sql";
                    mysqli_query($con, $sql);
                    $_SESSION['token'] = $token;
                    sleep(3);
                    echo '0';
                }else{
                    echo '1';
                }
            } else {
                echo '2';
            }
            break;
        case "verificar":
            $token = $_SESSION['token'];
            $sql = "SELECT t.token,u.nome,t.dtEmissao FROM tbl_token as t,tbl_usuarios as u where t.idUsuario= u.id and t.token='$token';";
            $query = mysqli_query($con, $sql);
             if ($rsUser = mysqli_fetch_object($query)) {
                //echo "<p>(Data de Criação :$rsUser->dtEmissao)</p>";
                /*echo '('.($rsUser->dtEmissao+0000-00-01:00:00).')';*/
                $Expiracao = date('Y-m-d H:i:s', strtotime("$rsUser->dtEmissao +4 hour"));
                //echo '<p>(Data de Expiracao :'.$Expiracao.")</p>";
                $dtAtual 	= strtotime(date("Y-m-d"));//Criando um objeto timestanp 
                if($Expiracao>$dtAtual){
                    echo " Data de expiração Alcançada";
                    return false;
                }else{
                    return true;                    
                }
              return false;
             }
            break;
        default:
            throw Exception("Uma solicitação fantasma(vazia) ocorreu ".date('Y-m-d H:i:s'));
    }
    
}

if (isset($_POST['txtEmail']) && isset($_POST['txtPassword']) && isset($_POST['action'])) {
    session_start();
    switch($_POST['action']){
        case "gerar":
            autentica('gerar');
            break;
        case "verificar":
            //echo 'Verificar';
            break;
        default:
            //echo 'ação indefinida!!';
            throw Exception("Uma solicitação fantasma(vazia) ocorreu ".date('Y-m-d H:i:s'));
           
    }

}


?>

