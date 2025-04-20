<?php
/**
* @author Gilberto Ramos de O. <gilberto.tec@vivaldi.net>
* @version 1.0 
* @copyright  unlicense <http://unlicense.org/>
*/ 

/* lib temporario de funções para o funcionamento interno do sistema CMS */
function conect() {
    if (getenv('JAWSDB_URL')) {
        $url = parse_url(getenv('JAWSDB_URL'));
        putenv('DB_HOST=' . $url['host']);
        putenv('DB_USER=' . $url['user']);
        putenv('DB_PASSWORD=' . $url['pass']);
        putenv('DB_NAME=' . ltrim($url['path'], '/'));
    }
    // Database Config
    $_ENV['DB_HOST']        =   (getenv('DB_HOST')     ? getenv('DB_HOST')            : '127.0.0.1');
    $_ENV['DB_NAME']        =   (getenv('DB_NAME')     ? getenv('DB_NAME')            : 'bugbunny');
    $_ENV['DB_USER']        =   (getenv('DB_USER')     ? getenv('DB_USER')            : 'bugbunny');
    $_ENV['DB_PASSWORD']    =   (getenv('DB_PASSWORD') ? getenv('DB_PASSWORD')        : 'senha@3214451');

    /* Função responsavel por fornecer a conecxão com o banco de dados  */
    $hostname   = $_ENV['DB_HOST'];
    $db         = $_ENV['DB_NAME'];
    $user       = $_ENV['DB_USER'];
    $password   = $_ENV['DB_PASSWORD'];
    
    $con = mysqli_connect($hostname, $user, $password, $db);
    if (!$con) {
        echo "Algo De errado ocorreu ao conectar ao banco!";
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
function getAllCategorias(& $conexao){
    $Categorias [] = array();
    $sqlQuery = "SELECT * FROM tbl_categoria ";
    $query = mysqli_query($conexao, $sqlQuery);
    while ($rsCategorias = mysqli_fetch_object($query)) { //rs e uma nomeclatura para uma variavel que contem os registros vindo do bandados ou resultset (rs = record set)
        //exemplo $rsContatos
        $Categorias [] = $rsCategorias;
    }
    return $Categorias;
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