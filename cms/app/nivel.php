<?php require_once "../app/resorces.php" ?>
<?php require_once "../app/logs.php" ?>
<?php
function nivel($action) {
    $con = conect();
    if (!$con) {
        echo "Erro ao editar cargos!!";
        throw Exception("Um erro Ocorreu ao acessar os Cargos!!" . date('Y-m-d H:i:s'));
        echo '1';
        return false;
    }
    switch ($action) {
        case "criar":
            $Nome = $_POST['txtNome'];
            $sql = "insert into tbl_usuario_cargos(nome)values('$Nome');";
            if (mysqli_query($con, $sql)) {
                echo '0';
                geralog(" Criando nivel de usuario : $Nome");
                return true;
            }
            echo '1';
            return false;
            
        case "editar":
            $Nome = $_POST['txtNome'];
            $idCargo = $_POST['slcCargo'];
            $sql = "UPDATE tbl_usuario_cargos SET nome='$Nome' where id=$idCargo;";
            if (mysqli_query($con, $sql)) {
                echo '0';
                geralog(" Editando nivel ID>NOME : $idCargo,$Nome");
                return true;
            }
            echo '1';
            return false;
            
      
    }
}
if(isset($_POST['action'])){
    $resultado=nivel($_POST['action']);
    if($resultado){
        header('location:../user.php?msgsucess=Novo Nivel gravado');
    }else{
        header('location:../user.php?msgerror=Novo Nivel não gravado');
    }
}else{
    echo "Acão indefinida";
}