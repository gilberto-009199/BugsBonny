<?php
/**
* @author Gilberto Ramos de O. <gilberto.tec@vivaldi.net>
* @version 1.0 
* @copyright  unlicense <http://unlicense.org/>
*/ 

/* lib temporario de funções para o funcionamento interno do sistema CMS */
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
function getLogs(& $conexao){
    $Logs= array();
    $sqlQuery = "select u.nome as usuario,l.action as op, l.dtEmissao as em, l.ip as ip from tbl_token as t, tbl_logs as l ,tbl_usuarios as u where t.idUsuario= u.id and t.id=l.idToken;";
    $query = mysqli_query($conexao, $sqlQuery);
    while ($rsLogs = mysqli_fetch_object($query)) { //rs e uma nomeclatura para uma variavel que contem os registros vindo do bandados ou resultset (rs = record set)
        //exemplo $rsContatos
        $Logs [] = $rsLogs;
    }
    return $Logs;
}
function getUsuarioCargos(& $conexao){
    $Cargos= array();
    $sqlQuery = "select * from tbl_usuario_cargos;";
    $query = mysqli_query($conexao, $sqlQuery);
    while ($rsCargos = mysqli_fetch_object($query)) { //rs e uma nomeclatura para uma variavel que contem os registros vindo do bandados ou resultset (rs = record set)
        //exemplo $rsContatos
        $Cargos [] = $rsCargos;
    }
    return $Cargos;
}
function getUsuarioEstados(& $conexao){
    $Estado= array();
    $sqlQuery = "select * from tbl_usuario_estados;;";
    $query = mysqli_query($conexao, $sqlQuery);
    while ($rsEstados = mysqli_fetch_object($query)) { //rs e uma nomeclatura para uma variavel que contem os registros vindo do bandados ou resultset (rs = record set)
        //exemplo $rsContatos
        $Estado [] = $rsEstados;
    }
    return $Estado;
}
function getUsuario($id,& $conexao){
    $sql="select * from vwUsuarios where id =$id;";
    $rsUsuario = mysqli_fetch_object(mysqli_query($conexao,$sql));
    return $rsUsuario;
} 
?>