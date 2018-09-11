<?php
/**
* @author Gilberto Ramos de O. <gilberto.tec@vivaldi.net>
* @version 1.0 
* @copyright  unlicense <http://unlicense.org/>
*/ 

function conect() {
    /* Função responsavel por fornecer a conecxão com o banco de dados  */
    $hostname = "127.0.0.1";
    $user = "userbugbunny";
    $password = "abracadabra127";
    $Db = "bugbunny";
    $con = mysqli_connect($hostname, $user, $password, $Db);
    if (!$con) {
        return false;
    }
    return $con;
}

function getProfissoes($conexao) {
    /* Função responsavel por fornecer uma array contendo as profissoes existentes no banco de dados*/
    $Profissoes [] = array();
    $sqlQuery = "SELECT * FROM tbl_profissao order by profissao asc;";
    $query = mysqli_query($conexao, $sqlQuery);
    while ($rsProfissao = mysqli_fetch_object($query)) { //rs e uma nomeclatura para uma variavel que contem os registros vindo do bandados ou resultset (rs = record set)
        //exemplo $rsContatos
        $Profissoes [] = $rsProfissao;
    }
    return $Profissoes;
}

function getTickets($conexao) {
    $Tickets[] = array();
    $sqlQuery = "SELECT * FROM tbl_tipos_tickets order by tipo asc;";
    $query = mysqli_query($conexao, $sqlQuery);
    while ($rsTicket = mysqli_fetch_object($query)) { //rs e uma nomeclatura para uma variavel que contem os registros vindo do bandados ou resultset (rs = record set)
        //exemplo $rsContatos
        $Tickets [] = $rsTicket;
    }
    return $Tickets;
}
function getBancas($conexao){
    $bancas[] = array();
    $sqlQuery = "Select b.*,d.nome as dono from tbl_bancas as b, tbl_donos as d where b.idDono = d.id;";
    $query = mysqli_query($conexao, $sqlQuery);
    while($rsBancas= mysqli_fetch_object($query)){
        $bancas []= $rsBancas;
    }
    return $bancas;
}

function gravarPedido($frmPedidoTmp) {

    $sql = "INSERT INTO tbl_tickets(idTipo,nome,telefone,celular,email,website,facebook,critica,infoPedido,sexo,idProfissao,dataCriacao)VALUES($frmPedidoTmp->tipo,'$frmPedidoTmp->nome','$frmPedidoTmp->telefone','$frmPedidoTmp->celular','$frmPedidoTmp->email','$frmPedidoTmp->website','$frmPedidoTmp->facebook','$frmPedidoTmp->critica','$frmPedidoTmp->produto','$frmPedidoTmp->sexo','$frmPedidoTmp->profissao','$frmPedidoTmp->dataCriacao');";

    $con = conect();
    if(!$con){
        return false;
    }else{
        if(!mysqli_query($con, $sql)){
            return false;
        }
        return true;
    }
    
}

?>