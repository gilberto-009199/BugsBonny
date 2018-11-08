<?php require_once"resorces.php" ?>
<?php require_once"logs.php" ?>
<?php
function sobre($action){
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
        case "listar":
            //echo"Listando!!";
            $sql="SELECT * FROM tbl_ofertas;";
            $query = mysqli_query($con,$sql);
            $Ofertas= array();
            while($rsOferta=mysqli_fetch_object($query)){
                $Ofertas[]=$rsOferta;
            }
            //var_dump($Bancas);
            echo json_encode($Ofertas);
            break;
       case "AlterarEstado":
            $estado = $_GET['Estado'];
            $idOferta = $_GET['idOferta'];
            $sql="UPDATE tbl_ofertas SET estado='$estado' where id =$idOferta;";
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
        sobre("listar");
        break;
        default:
          sobre($action);
    }
}
if(isset($_POST['action'])){
    sobre($_POST['action']);
}


?>