<?php require_once"resorces.php" ?>
<?php require_once"logs.php" ?>
<?php

function celebridades($action){
   $con = conect();
   switch($action){
        case "criar":
               $arquivo = $_FILES['Imagem'];
               /*...*/
               
               

                $arquivosPermitidos=array(".jpg",".png",".jpeg",".svg");
                $nomeArquivo = pathinfo($arquivo['name'], PATHINFO_FILENAME);
                $ext_arquivo= strrchr($arquivo['name'],".");
                if(in_array($ext_arquivo,$arquivosPermitidos)){
                    $tamanho = round(($arquivo['size'])/1024);

                    if($tamanho<=2048){
                        $entropia = rand(1, 9) . "" . rand(1, 9) . "" .rand(1, 9) . "" . date('Y-m-d H:i:s')
                                . "" . rand(1, 9) . "" . rand(1, 9) . "" . rand(1, 9) . "";
                        $nomeEncrip= (md5($entropia.$nomeArquivo))."".$ext_arquivo;

                        $imagem = "../../imgup/".$nomeEncrip;

                        if(move_uploaded_file($arquivo['tmp_name'],$imagem)){
                            
                            $titulo = $_POST['titulo'];
                            $conteudo = $_POST['conteudo'];
                            $celebridade = $_POST['nome'];
                            $url =  $_POST['url'];
                            $img = $nomeEncrip;
                            $dtCriacao= date('Y-m-d');
                            $estado= $_POST['estado'];
                            
                            $sql ="INSERT INTO tbl_entrevistas(titulo,conteudo,celebridade,url,dtCriacao,img,estado)values('$titulo','$conteudo','$celebridade','$url','$dtCriacao','$img','$estado')";

                            if(mysqli_query($con,$sql)){
                                echo "true";    
                            }else{
                                echo "Um erro Ocorreu ao gravar no banco!!";
                            }
                            
                        }else{
                            echo "Algo deu Errado!!Ao mover o Arquivo";
                        }

                    }else{
                        echo "Arquivo Grande Demais!!";    
                    }                    
                }else{
                    echo "Arquivo não permitido!!";
                }


            break;
        case "ver":
            
            break;
        case "editar":
            
            break;
        case "deletar":
            $idCelebridade = $_GET['idCelebridade'];
            $sql="DELETE FROM tbl_entrevistas where id=$idCelebridade";
            $sql2="DELETE FROM tbl_autores_entrevistas where idEntrevista=$idCelebridade";
            if(mysqli_query($con,$sql2)){
                if(mysqli_query($con,$sql)){
                    echo "true";
                }else{
                    echo "Erro ao deletar a entrevista";
                }
            }else{
                echo "Erro ao deletar a entrevista";
            }
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