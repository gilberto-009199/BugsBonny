<?php
/**
* @author Gilberto Ramos de O. <gilberto.tec@vivaldi.net>
* @version 1.0 
* @copyright  unlicense <http://unlicense.org/>
*/ 

/* lib temporario de funções para o funcionamento interno do sistema  */
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

function getProfissoes(& $conexao) {
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
function getTickets(& $conexao) {
    /* Função responsavel por fornecer uma array contendo dos tipos de tickets existentes sistema */
    $Tickets[] = array();
    $sqlQuery = "SELECT * FROM tbl_tipos_tickets order by tipo asc;";
    $query = mysqli_query($conexao, $sqlQuery);
    while ($rsTicket = mysqli_fetch_object($query)) { //rs e uma nomeclatura para uma variavel que contem os registros vindo do bandados ou resultset (rs = record set)
        //exemplo $rsContatos
        $Tickets [] = $rsTicket;
    }
    return $Tickets;
}
function getBancas(& $conexao){
    /* Função responsavel por fornecer uma array contendo as Bancas existentes sistema */
    $bancas[] = array();
    $sqlQuery = "Select b.*,d.nome as dono from tbl_bancas as b, tbl_donos as d where b.idDono = d.id and b.estado='V';";
    $query = mysqli_query($conexao, $sqlQuery);
    while($rsBancas= mysqli_fetch_object($query)){
        $bancas []= $rsBancas;
    }
    return $bancas;
}
function getArtigo(& $conexao){
    $Artigos [] = array();
    $sqlQuery= "select * from tbl_artigos where estado = 'V' order by dtCriacao asc;";
    $query = mysqli_query($conexao, $sqlQuery);
    while($rsArtigos = mysqli_fetch_object($query)){
        $Artigos[]=$rsArtigos;
    }
    return $Artigos;
}
function getNoticias(& $conexao){
    $Noticias []= array();
    $sqlQuery="select n.titulo,n.conteudo,nc.nome as categoria from tbl_noticias as n,tbl_autores_noticias as an, tbl_noticia_categorias as nc where estado='V' and an.idNoticia=n.id and nc.id = n.idCategoria order by an.dtEmissao asc";
    $query = mysqli_query($conexao,$sqlQuery);
    while($rsNoticias = mysqli_fetch_object($query)){
        $Noticias[]= $rsNoticias;
    }
    return $Noticias;
}
function getEntrevistas(& $conexao){
    $Entrevistas []= array();
    $sqlQuery="select e.titulo,e.conteudo,e.url,e.img from tbl_entrevistas as e where e.estado='V' order by e.dtCriacao asc;";
    $query = mysqli_query($conexao,$sqlQuery);
    while($rsEntrevistas = mysqli_fetch_object($query)){
        $Entrevistas[]= $rsEntrevistas;
    }
    return $Entrevistas;
}
function getOfertas(& $conexao){
    $Ofertas []= array();
    $sqlQuery="SELECT * FROM bugbunny.tbl_ofertas as o where o.estado='V';";
    $query = mysqli_query($conexao,$sqlQuery);
    while($rsOfertas = mysqli_fetch_object($query)){
        $Ofertas[]= $rsOfertas;
    }
    return $Ofertas;
}

function gravarPedido($frmPedidoTmp) {
    /* Função responsavel por gravar no db do sistema os tickets(chamandos) */
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