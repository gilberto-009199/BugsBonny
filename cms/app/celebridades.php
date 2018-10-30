<?php require_once"resorces.php" ?>
<?php require_once"logs.php" ?>
<?php

function celebridades($action){
   $con = conect();
   switch($action){
        case "criar":
            
            break;
        case "ver":
            
            break;
        case "editar":
            
            break;
        case "deletar":
            
            break;
        case "list":
            
            $sql="SELECT * FROM tbl_entrevistas;";
            $query = mysqli_query($con,$sql);
            $Entrevistas= array();
            while($rsEntrevistas=mysqli_fetch_object($query)){
                $Entrevistas[]=$rsEntrevistas;
            }
            //var_dump($Bancas);
            echo json_encode($Entrevistas);
            break;
       case "AlterarEstado":
            $estado = $_GET['Estado'];
            $idCelebridade = $_GET['idCelebridade'];
            $sql="UPDATE tbl_entrevistas SET estado='$estado' where id =$idCelebridade;";
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
        celebridades("list");
        break;
        default:
          celebridades($action);
    }
}
if(isset($_POST['action'])){
    celebridades($_POST['action']);
}

?>