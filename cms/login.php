<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Login</title>
    </head>
    <body style="/*background-image: url(img/gif/45.gif); background-size:256 256 ; background-repeat: no-repeat;*/">
        <img alt="carregando.." src="img/gif/ajax-loader.gif" style="display: block;margin-left: auto;margin-right: auto;height: 21px;margin-top: 14%;">
        <p style="text-align: center; color:black; font-size: 17px; font-weight: bolder;">Gerando Token..</p>
        <?php
        echo"<pre>data atual:" . date('Y-m-d H:i:s') . "</pre>";
        $hostname = "127.0.0.1";
        $user = "userbugbunny";
        $password = "abracadabra127";
        $Db = "bugbunny";
        $con = mysqli_connect($hostname, $user, $password, $Db);
        if (!$con) {
            header("relocation:../index.php");
        }
        $email = $_GET["txtEmail"];
        $sql = "select * from tbl_usuarios where email='$email'";
        $query = mysqli_query($con, $sql);
        if ($rsUser = mysqli_fetch_object($query)) {
            echo " Usuario =" . $rsUser->nome . ".";
            if (password_verify("12345", $rsUser->senha)) {
                echo "senha compativel";
                session_destroy();
                echo"<p>Sessao destruida!!</p>";
                session_start();
                $entropia = "" . rand(1, 9) . "" . rand(1, 9) . "" .
                        rand(1, 9) . rand(1, 9) . "" . rand(1, 9) . "" . rand(1, 9) . "" .
                        rand(1, 9) . "" . rand(1, 9) . "" . rand(1, 9) . "" .
                        rand(1, 9) . "" . rand(1, 9) . "" . rand(1, 9) . "" .
                        date('Y-m-d H:i:s') . "" . rand(1, 9) . "" . rand(1, 9) . "" .
                        rand(1, 9) . rand(1, 9) . "" . rand(1, 9) . "" . rand(1, 9) . "" .
                        "" . rand(1, 9) . "" . rand(1, 9) . "" . rand(1, 9) .
                        rand(1, 9) . "" . rand(1, 9) . "" . rand(1, 9) . "";
                echo "<p>Entropia: $entropia</p>";
                $hash = md5($entropia);
                echo "<p>  Hash: $hash</p>";
                sleep(10);
                echo"<p>Token ok!</p>";
                echo"<pre>data depois:" . date('Y-m-d H:i:s') . "</pre>";
            }
        } else {
            header("relocation:../index.php");
        }
        ?>
    </body>
</html>
