<?php require_once"resorces.php" ?>
<?php require_once"logs.php" ?>
<?php
function sobre($action){
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
                            $vlAnterior = $_POST['valoranterior'];
                            $vlPosterior = $_POST['valorposterior'];
                            $img = $nomeEncrip;
                            $estado= $_POST['estado'];
                            $sql ="INSERT INTO tbl_ofertas(titulo,descricao,vlAnterior,vlPosterior,img,estado)values
                                    ('$titulo','$conteudo','$vlAnterior','$vlPosterior','$img','$estado')";
                            
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
               /*...*/
               if(!$arquivo = $_FILES['Imagem']){
                    $titulo = $_POST['titulo'];
                            $conteudo = $_POST['conteudo'];
                            $vlAnterior = $_POST['valoranterior'];
                            $vlPosterior = $_POST['valorposterior'];
                            $estado= $_POST['estado'];
                            $idOferta= $_POST['idOferta'];
                            
                            $sql ="UPDATE tbl_ofertas SET titulo='$titulo',descricao='$conteudo',vlAnterior='$vlAnterior',vlPosterior='$vlPosterior',estado='$estado' where id=$idOferta";
                            
                            if(mysqli_query($con,$sql)){
                                echo "true";    
                            }else{
                                echo "Um erro Ocorreu ao gravar no banco!!";
                            }
               }
               

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
                            $vlAnterior = $_POST['valoranterior'];
                            $vlPosterior = $_POST['valorposterior'];
                            $img = $nomeEncrip;
                            $estado= $_POST['estado'];
                            $idOferta= $_POST['idOferta'];
                            
                            $sql ="UPDATE tbl_ofertas SET titulo='$titulo',descricao='$conteudo',vlAnterior='$vlAnterior',vlPosterior='$vlPosterior',img='$img',estado='$estado' where id=$idOferta";
                            
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
        case "deletar":
            $idOferta= $_GET['idOferta'];
            $sql="DELETE FROM tbl_ofertas where id=$idOferta";
            if(mysqli_query($con,$sql)){
                echo "true";
            }else{
                echo "Não foi possivel gravar no banco!:)";
            }

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