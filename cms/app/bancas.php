<?php require_once"resorces.php" ?>
<?php require_once"logs.php" ?>
<?php
function bancas($action){
   $con = conect();
   switch($action){
        case "criar":
            $nome = $_POST['nome'];
            $uf = $_POST['uf'];
            $cidade = $_POST['cidade'];
            $bairro = $_POST['bairro'];
            $logradouro = $_POST['endereco'];
            $telefone = $_POST['telefone'];
            $dono = $_POST['dono'];
            $horario = $_POST['horario'];
            $estado = $_POST['estado'];
            $descrisao = $_POST['descrisao'];
            $localizacao = $_POST['location'];
            $sql = "insert into tbl_bancas(estado,nome,uf,cidade,bairro,logradouro,descrisao,horario,location,telefone,idDono)
                    values('$estado','$nome','$uf','$cidade','$bairro','$logradouro','$descrisao','$horario','$localizacao','$telefone',$dono);";
            if(mysqli_query($con,$sql)){
                echo 'true';
            }else{
                echo 'false';
            }
            break;
        case "ver":
            
            break;
        case "editar":
            $id=$_POST['id'];
            $nome = $_POST['nome'];
            $uf = $_POST['uf'];
            $cidade = $_POST['cidade'];
            $bairro = $_POST['bairro'];
            $logradouro = $_POST['logradouro'];
            $telefone = $_POST['telefone'];
            $dono = $_POST['idDono'];
            $horario = $_POST['horario'];
            $estado = $_POST['estado'];
            $descrisao = $_POST['descrisao'];
            $localizacao = $_POST['location'];
            $sql = "UPDATE tbl_bancas SET location= '$localizacao', nome = '$nome', uf='$uf', cidade= '$cidade', bairro = '$bairro',logradouro= '$logradouro',telefone='$telefone',idDono= $dono, estado='$estado' where id=$id";
            if(mysqli_query($con,$sql)){
                echo "true";
            }else{
                echo "false";
            }
            break;
        case "deletar":
            $idBanca = $_GET['idBanca'];
            $sql="Delete from tbl_bancas where id =$idBanca";
            if(mysqli_query($con,$sql)){
               echo 'true'; 
            }else{
                echo 'false';
            }
            break;
        case "listar":
            //echo"Listando!!";
            $sql="Select b.*,d.nome as dono from tbl_bancas as b, tbl_donos as d where b.idDono=d.id;";
            $query = mysqli_query($con,$sql);
            $Bancas= array();
            while($rsbancas=mysqli_fetch_object($query)){
                $Bancas[]=$rsbancas;
            }
            //var_dump($Bancas);
            echo json_encode($Bancas);
            break;
       case "AlterarEstado":
            $estado = $_GET['Estado'];
            $idBanca = $_GET['idBanca'];
            $sql="UPDATE tbl_bancas SET estado='$estado' where id =$idBanca;";
            if(mysqli_query($con,$sql)){
               echo 'true';
            }else{
                echo 'false';
            }
            break;
    }

}

if(isset($_GET['action'])){
    $action=$_GET['action'];
    switch($action){
        case "list":
        //echo"Quer listar";
        bancas("listar");
        break;
        default:
          bancas($action);
    }
}
if(isset($_POST['action'])){
    bancas($_POST['action']);
}


?>