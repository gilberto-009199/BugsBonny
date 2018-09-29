<?php require_once"resorces.php" ?>
<?php require_once"logs.php" ?>
<?php

if(!isset($_SESSION))session_start();
function user($action){
    $con = conect();
    switch($action){
        case "criar":
            echo "criar usuario";
            $nome=$_GET['txtNome'];
            $email=$_GET['txtEmail'];
            $senha = password_hash($_GET['txtPassword'],CRYPT_BLOWFISH,['cost'=>12]);
            $dataEmissao=date('Y-m-d H:i:s');
            $telefone=$_GET['txtTelefone'];
            $sql="insert into tbl_usuarios(nome,email,senha,dataEmissao,telefone)values('$nome','$email','$senha','$dataEmissao','$telefone');";
            echo '<p>'.$sql.'</p>';
            mysqli_query($con,$sql);
            geralog("Criando usuario: $nome,$email");
            $sql="select u.id from tbl_usuarios as u order by id desc limit 1;";
            $Userid = mysqli_fetch_object(mysqli_query($con,$sql))->id;
            //echo "<p>Novo Usuario: id= $Userid </p>";            
            if(isset($_GET['slcEstado'])){
                $idEstado=$_GET['slcEstado'];
            }else{
                $idEstado=1;
            }
            $sql="insert into tbl_estados_usuarios(idUsuario,idEstado,dataEmissao)values($Userid,$idEstado,'$dataEmissao');";
            //echo '<p>'.$sql.'</p>';
            mysqli_query($con,$sql);
            geralog("Criando user > estado: $nome,$idEstado ");
            if(isset($_GET['slcCargo'])){
                $idCargo= $_GET['slcCargo'];
            }else{
                $idCargo=3;
            }
            $sql="insert into tbl_cargos_usuarios(idUsuario,idCargo,dataEmissao)values($Userid,$idCargo,'$dataEmissao');";
            //echo '<p>'.$sql.'</p>';
            mysqli_query($con,$sql);
            geralog("Criando user > cargo: $nome,$idCargo");
            //echo "<p> COMPLETO!! </p>";
            
            /*insert into tbl_estados_usuarios(idUsuario,idEstado,dataEmissao)values(999,999,'dataemissao');
            insert into tbl_cargos_usuarios(idUsuario,idCargo,dataEmissao)values(999,999,'dataemissao');*/
            header("location:../user.php");
            
            break;
        case "ver":
            $idUsuario = $_GET['idUser'];
            $sql="select * from vwUsuarios where id =$idUsuario;";
            $rsUsuario = mysqli_fetch_object(mysqli_query($con,$sql));
            return $rsUsuario;
            break;
        case "editar":
            $nome = $_GET['txtNome'];
            $email= $_GET['txtEmail'];
            $senha = password_hash($_GET['txtPassword'],CRYPT_BLOWFISH,['cost'=>12]);
            $telefone= $_GET['txtTelefone'];
            $idUsuario= $_GET['idUsuario'];
            $dataEmissao= date('Y-m-d H:i:s');
            $sql="UPDATE tbl_usuarios SET nome='$nome', email='$email',"
                . "senha='$senha',telefone='$telefone' where id = $idUsuario;";
            echo " SQL: $sql <p>";
            mysqli_query($con,$sql);
            geralog("Alterando user : $nome, $idUsuario");
            $idCargo = $_GET['slcCargo'];
            $sql = "insert into tbl_cargos_usuarios(idUsuario,idCargo,dataEmissao)values"
                    . "($idUsuario,$idCargo,'$dataEmissao');";
            echo " SQL: $sql<p>";
            mysqli_query($con,$sql);
            geralog("Alterando user > cargo : $nome, $idCargo");
            $idEstado=$_GET['slcEstado'];
            $sql = "insert into tbl_estados_usuarios(idUsuario,idEstado,dataEmissao)values"
                    . "($idUsuario,$idEstado,'$dataEmissao');";
            echo " SQL: $sql <p>";
            mysqli_query($con,$sql);
            geralog("Alterando user > estado  : $nome, $idEstado");
            header("location:../user.php");
            break;
        case "deletar":
            $idUsuario= $_GET['idUsuario'];
            $sql="select * from tbl_token where idUsuario=$idUsuario;";
            echo " SQL: $sql <p>";
            $Tokens = array();
            $Tokens []= mysqli_fetch_object(mysqli_query($con,$sql));
            var_dump($Tokens);
            for($i=1; $i <= count($Tokens) ;$i++){
                $idToken =$Tokens[$i]->id;
                $sql="delete  from tbl_logs where idToken=$idToken;";
                mysqli_query($con,$sql);
                //echo"<p> Apagado o log $i</p>";
            }
            $sql="delete  from tbl_token where idUsuario=$idUsuario;";
            mysqli_query($con,$sql);
            
            $sql="delete  from tbl_estados_usuarios where idUsuario=$idUsuario;";
            mysqli_query($con,$sql);
            $sql="delete  from tbl_cargos_usuarios where idUsuario=$idUsuario;";
            mysqli_query($con,$sql);
            
            $sql="delete from tbl_usuarios where id=$idUsuario;";
            mysqli_query($con,$sql);
            
            
            //header("location:../user.php");
            break;
        case "listar":
            $Usuarios[] = array();
            $sqlQuery = "select * from vwUsuarios limit 100;";
            $query = mysqli_query($con, $sqlQuery);
            while ($rsUsuario = mysqli_fetch_object($query)) { //rs e uma nomeclatura para uma variavel que contem os registros vindo do bandados ou resultset (rs = record set)
                $Usuarios [] = $rsUsuario;
            }
            return $Usuarios;
    }
    
}
if(isset($_GET['action'])){
    if($_GET['action']=="ver"){
       $Usuario =user($_GET['action']);
?>      <table>
                <tr>
                    <td><label  class="Obrigatorio" for="txtNome">Nome:*</label></td>
                    <td> <input value="<?=$Usuario->nome?>" disabled/> </td>
                </tr>
                <tr>
                    <td><label  for="txtTelefone">Telefone:</label></td>
                    <td> <input value="<?=$Usuario->telefone?>" disabled/> </td>
                </tr>
                <tr>
                    <td><label  class="Obrigatorio" for="txtEmail">E-mail:*</label></td>
                    <td> <input value="<?=$Usuario->email?>" disabled/> </td>
                </tr>
                <tr>
                    <td><label class="Obrigatorio" for="slcProfissao">Cargo:</label></td>
                    <td><input disabled value="<?=$Usuario->cargos?>"/> </td>
                </tr>
            </table>
       
       
<?php
    }else{
        user($_GET['action']); 
    }

}

?>

