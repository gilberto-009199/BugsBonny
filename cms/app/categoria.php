<?php require_once"resorces.php" ?>
<?php require_once"logs.php" ?>
<?php
function categoria($action){
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
            $idCategoria = $_GET['idCategoria'];
            $sql="Select * from tbl_categoria where id = $idCategoria";
            $query = mysqli_query($con,$sql);
            if($rsCategoria = mysqli_fetch_object($query)){
                return  $rsCategoria;
            }
            break;

       case "deletar":
            $idCategoria = $_GET['idCategoria'];
            $sql = "DELETE FROM tbl_categoria where id = $idCategoria";
            if(mysqli_query($con,$sql)){
                echo "Categoria Deletada com  sucesso!!";
            }else{
                echo "Um erro ocorreu ao deletar a categoria";
            }
            break;
       case "AlterarEstado":
            echo "Chegou em min";
            $estado = $_POST['Estado'];
            $idCategoria = $_POST['idCategoria'];
            $sql="UPDATE tbl_categoria SET estado='$estado' where id =$idCategoria;";
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
            categoria("listar");
            break;
        case 'ver':
               $Categoria = categoria('ver');
            ?>
               <table>
                    <tr>
                        <td><label  class="Obrigatorio" for="txtNome">Nome:*</label></td>
                        <td> <input value="<?=$Categoria->categoria?>" disabled/> </td>
                    </tr>
                </table>
            <?php
            break;
        default:
          categoria($action);
    }
}
if(isset($_POST['action'])){
    categoria($_POST['action']);
}


?>