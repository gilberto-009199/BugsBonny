<?php require_once"resorces.php" ?>
<?php require_once"logs.php" ?>
<?php
if(!isset($_SESSION))session_start(); 



function tickets($action) {
    $con = conect();
    if (!$con) {
        echo "Erro ao pegar os Tickets!!";
        throw Exception("Um erro Ocorreu ao acessar os Tickets!!" . date('Y-m-d H:i:s'));
        echo '1';
        return false;
    }
    switch ($action) {
        case "deletar":
            $idTicket = $_POST['idTicket'];
            $sql = "delete from tbl_tickets where id =$idTicket";
            if (mysqli_query($con, $sql)) {
                echo '0';
                geralog($sql);
                return true;
            }
            echo '1';
            return false;
            break;
        case "ver":
            $idTicket = $_POST['idTicket'];
            $sql = "select t.*, p.profissao from tbl_tickets as t,tbl_profissao as p where t.id =$idTicket and t.idProfissao = p.id";
            $query = mysqli_query($con, $sql);
            if ($rsTicket = mysqli_fetch_object($query)) {
                return $rsTicket;
            }
            return false;
            break;
        case "listar":
            $Tickets[] = array();
            $sqlQuery = "SELECT t.nome,t.id,t.sexo,t.dataCriacao,p.profissao FROM tbl_tickets as t, tbl_profissao as p where t.idProfissao= p.id;";
            $query = mysqli_query($con, $sqlQuery);
            while ($rsTicket = mysqli_fetch_object($query)) { //rs e uma nomeclatura para uma variavel que contem os registros vindo do bandados ou resultset (rs = record set)
                $Tickets [] = $rsTicket;
            }
            return $Tickets;
    }
}

if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case "deletar":
            tickets('deletar');
            break;
        case "ver":
            $ticket = tickets('ver');
            ?>
            <div class="row">
                <div class="row">
                    <div class="3"><label  class="Obrigatorio" for="txtNome">Nome:*</label></div>
                    <div class="3"><input  class="row" value="<?=$ticket->nome?>" disabled/> </div>
                </div>
                <div class="row">
                    <div class="3"><label  for="txtTelefone">Telefone:</label></div>
                    <div class="3"><input value="<?=$ticket->telefone?>" disabled/> </div>
                </div>
                <div class="row">
                    <div class="3"><label class="Obrigatorio" for="txtCelular"> Celular:*</label> </div>
                    <div class="3"> <input value="<?=$ticket->celular?>" disabled/> </div>
                </div>
                <div class="row">
                    <td><label  class="Obrigatorio" for="txtEmail">E-mail:*</label></td>
                    <td> <input value="<?=$ticket->email?>" disabled/> </td>
                </div>
                <div class="row">
                    <td><label for="txtHomePage">Home Page:</label></td>
                    <td><input  value="<?=$ticket->website?>" disabled/> </td>
                </div>
                <div class="row">
                    <td><label for="txtFcebook"> Link no Facebook:</label></td>
                    <td> <input value="<?=$ticket->facebook?>" disabled/> </td>
                </div>
                <div class="row">
                    <td colspan="2">
                        <table>
                            <tr>
                                <td><label for="areaCritica">Sugestão/Critica:</label></td>
                            </tr>
                            <tr>
                                <td> 
                                    <textarea disabled style="width: 356px; border: 1px solid black; height: 113px; resize: none;" id="areaCritica" name="ariaCritica" rows="6" ><?=$ticket->critica?></textarea>
                                </td>
                            </tr>
                        </table>
                    </td>                               
                </div>
                <div class="row">
                    <td><label for="txtProduto">Informações de Produto </label></td>
                    <td><input value="<?=$ticket->infoPedido?>" disabled/> </td>
                </div>
                <div class="row">
                    <td><label class="Obrigatorio" for="slcSexo">Sexo:*</label></td>
                    <td><input value="<?=$ticket->sexo?>" disabled/> </td>
                </div>
                <div class="row">
                    <td><label class="Obrigatorio" for="slcProfissao">Profissão:*</label></td>
                    <td><input disabled value="<?=$ticket->profissao?>"/> </td>
                </div>
            </div>

            <?php
            break;
        case "listar":
            break;
    }
}
?>

