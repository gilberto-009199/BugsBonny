<?php require_once"resorces.php" ?>
<?php require_once"logs.php" ?>
<?php
function bancasDono($action){
   $con = conect();
   switch($action){
        case "criar":
            
            break;
        case "ver":
            
            break;
        case "editar":
            
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
            $sql="select * from tbl_donos";
            $query = mysqli_query($con,$sql);
            $Donos= array();
            while($rsDonos=mysqli_fetch_object($query)){
                $Donos[]=$rsDonos;
            }
            //var_dump($Bancas);
            echo json_encode($Donos);
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
        bancasDono("listar");
        break;
        default:
          bancasDono($action);
    }
}
if(isset($_POST)){
    echo 'ok sadasdasdss';
}
?>