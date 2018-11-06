<?php require_once"resorces.php" ?>
<?php require_once"logs.php" ?>
<?php
function sobre($action){
   $con = conect();
   switch($action){
        case "criar":
            $titulo = $_POST['titulo'];
            $estado = $_POST['estado'];
            $conteudo = $_POST['conteudo'];
            $dtCriacao = date('Y-m-d');
            
            $sql= "INSERT INTO tbl_artigos(titulo,conteudo,dtCriacao,estado)values
            ('$titulo','$conteudo','$dtCriacao','$estado')";
            if(mysqli_query($con,$sql)){
                echo "true";
            }else{
                echo "false";
            }

            break;
        case "ver":
            
            break;
        case "editar":
            $idArtigo= $_POST['id'];
            $titulo = $_POST['titulo'];
            $estado = $_POST['estado'];
            $conteudo = $_POST['conteudo'];
            
            $sql="UPDATE tbl_artigos SET titulo='$titulo',conteudo='$conteudo',estado='$estado' where id=$idArtigo";
            
            if(mysqli_query($con,$sql)){
                echo "true";
            }else{
                echo "Ocorreu um erro ao gravar no banco";
            }

            break;
        case "deletar":
             $idArtigo= $_GET['idArtigo'];            
             $sql= "DELETE FROM tbl_artigos where id= $idArtigo";

             if(mysqli_query($con,$sql)){
                echo "true";
             }else{
                 echo $sql;
                 echo "Erro ao deletar do banco";
             }
            break;
        case "listar":
            //echo"Listando!!";
            $sql="SELECT * FROM tbl_artigos;";
            $query = mysqli_query($con,$sql);
            $Celebridades= array();
            while($rscelebridades=mysqli_fetch_object($query)){
                $Celebridades[]=$rscelebridades;
            }
            //var_dump($Bancas);
            echo json_encode($Celebridades);
            break;
       case "AlterarEstado":
            $idArtigo = $_GET['idArtigo'];
            $novoEstado = $_GET['Estado'];

            $sql= "UPDATE tbl_artigos SET estado='$novoEstado' where id= $idArtigo";
            if(mysqli_query($con,$sql)){
                echo "true";
            }else{
                echo "false";
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