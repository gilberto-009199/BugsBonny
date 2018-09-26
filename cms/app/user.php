<?php require_once"resorces.php" ?>
<?php require_once"logs.php" ?>
<?php
session_start();
function user($action){
    $con = conect();
    switch($action){
        case "criar":
            echo "criar usuario";
            $nome=$_GET['nome'];
            $email=$_GET['email'];
            $senha = password_hash($_GET['senha'],CRYPT_BLOWFISH,['cost'=>12]);
            $dataEmissao=date('Y-m-d H:i:s');
            $telefone=$_GET['telefone'];
            $sql="insert into tbl_usuarios(nome,email,senha,dataEmissao,telefone)values('$nome','$email','$senha','$dataEmissao','$telefone');";
            //echo '<p>'.$sql.'</p>';
            mysqli_query($con,$sql);
            geralog("Criando usuario: $nome,$email");
            $sql="select u.id from tbl_usuarios as u order by id desc limit 1;";
            $Userid = mysqli_fetch_object(mysqli_query($con,$sql))->id;
            //echo "<p>Novo Usuario: id= $Userid </p>";            
            if(isset($_GET['idEstado'])){
                $idEstado=$_GET['idEstado'];
            }else{
                $idEstado=1;
            }
            $sql="insert into tbl_estados_usuarios(idUsuario,idEstado,dataEmissao)values($Userid,$idEstado,'$dataEmissao');";
            //echo '<p>'.$sql.'</p>';
            mysqli_query($con,$sql);
            geralog("Criando user > estado: $nome,$idEstado ");
            if(isset($_GET['idCargo'])){
                $idCargo= $_GET['idCargo'];
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
            
            
            break;
        case "editar":
            echo "editar usuario";
            break;
        case "deletar":
            echo "deletar usuario";
            break;
    }
    
}
if(isset($_GET['action'])){
    user($_GET['action']);
}

?>

