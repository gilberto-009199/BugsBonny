<?php require_once"./resorces.php"?>
<?php

function autentica(){
    $con = conect();
    if (!$con) {
        echo "Erro ao gerar token!!";
        throw Exception("Um erro Ocorreu ao gerar o Token de acesso!!".date('Y-m-d H:i:s'));
    }
    $email = $_POST["txtEmail"];
    $sql = "select * from tbl_usuarios where email='$email'";
    $query = mysqli_query($con, $sql);
    if ($rsUser = mysqli_fetch_object($query)) {
        //echo " Usuario =" . $rsUser->nome . ".";
        if(password_verify("12345", $rsUser->senha)) {
            //echo "senha compativel";
            session_destroy();
            //echo"<p>Sessao destruida!!</p>";
            session_start();
            /* entropia = 12 numeros aleatorios + data atual + 12 numeros aleatorios */
            $entropia = "" . rand(1, 9) . "" . rand(1, 9) . "" .
                    rand(1, 9) ."". rand(1, 9) . "" . rand(1, 9) . "" .
                    rand(1, 9) ."". rand(1, 9) . "" . rand(1, 9) . "" .
                    rand(1, 9) ."". rand(1, 9) . "" . rand(1, 9) . "" .
                    rand(1, 9) ."". date('Y-m-d H:i:s') . "" . rand(1, 9)
                    . "" . rand(1, 9) . "" . rand(1, 9) ."". rand(1, 9)
                    . "" . rand(1, 9) . "" . rand(1, 9) ."". rand(1, 9)
                    . "" . rand(1, 9) . "" . rand(1, 9) ."". rand(1, 9)
                    . "" . rand(1, 9) . "" . rand(1, 9) . "";
            //echo "<p>Entropia: $entropia</p>";
            $token = md5($entropia);
            $idUsuario = $rsUser->id;
            $dataAtual = date('Y-m-d H:i:s');
            $sql="insert into tbl_token(token,idUsuario,dtEmissao)values('$token',$idUsuario,'$dataAtual')";
            $_SESSION['token']=$token;
            //echo "<p>  Hash: $hash</p>";
            sleep(4);
            echo"<p>Token ok!</p>";
            //echo"<pre>data depois:" . date('Y-m-d H:i:s') . "</pre>";
        }
    } ELSE {
        echo "Erro usuario ou senha incorreta";
    }
}
?>

