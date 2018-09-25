<?php require_once"resorces.php" ?>
<?php
    function tickets($action){
        $con = conect();
        if (!$con) {
            echo "Erro ao pegar os Tickets!!";
            throw Exception("Um erro Ocorreu ao acessar os Tickets!!" . date('Y-m-d H:i:s'));
            echo '1';
            return false;
        }
        switch($action){
            case "deletar":
                break;
            case "ver":
                break;
            case "listar":
               $Tickets[] = array();
                $sqlQuery = "SELECT * FROM tbl_tickets;";
                $query = mysqli_query($con, $sqlQuery);
                while ($rsTicket = mysqli_fetch_object($query)) { //rs e uma nomeclatura para uma variavel que contem os registros vindo do bandados ou resultset (rs = record set)
                    $Tickets [] = $rsTicket;
                }
                return $Tickets;
             
        }

    }
    
    if(isset($_POST['action'])){
    switch($_POST['action']){
        case "deletar":
            break;
        case "ver":
            break;
        case "listar":
            break;
    }
    }
?>

