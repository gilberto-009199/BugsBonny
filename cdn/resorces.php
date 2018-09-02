<?php
function conect() {
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
    $Profissoes [] = array();
    $sqlQuery = "SELECT * FROM tbl_Profissao order by profissao asc";
    $query = mysqli_query($conexao, $sqlQuery);
    while ($rsProfissao = mysqli_fetch_object($query)) { //rs e uma nomeclatura para uma variavel que contem os registros vindo do bandados ou resultset (rs = record set)
        //exemplo $rsContatos
        $Profissoes [] = $rsProfissao;
    }
    return $Profissoes;
}

function getTickets($conexao) {
    $Tickets[] = array();
    $sqlQuery = "SELECT * FROM tbl_tipos_tickets order by tipo asc";
    $query = mysqli_query($conexao, $sqlQuery);
    while ($rsTicket = mysqli_fetch_object($query)) { //rs e uma nomeclatura para uma variavel que contem os registros vindo do bandados ou resultset (rs = record set)
        //exemplo $rsContatos
        $Tickets [] = $rsTicket;
    }
    return $Tickets;
}
?>