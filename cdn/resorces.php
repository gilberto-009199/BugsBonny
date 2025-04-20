<?php
/**
* @author Gilberto Ramos de O. <gilberto.tec@vivaldi.net>
* @version 1.0 
* @copyright  unlicense <http://unlicense.org/>
*/ 

error_reporting(E_WARNING);

/* lib temporario de funções para o funcionamento interno do sistema  */
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
function getSubCategoria(& $conexao,$vetor){

    for($i=1;$i < count($vetor);$i++){
        //echo ("<p>Pegando as subcategorias de ".$vetor[$i]->categoria." </p>");
        $id = $vetor[$i]->id;
        $sql = "Select * from tbl_categoria where herda = $id ";
        //echo "SQL".$sql;    
        $query = mysqli_query($conexao,$sql);
        if($rsCategorias = mysqli_fetch_object($query)){
            $Categorias2[]=  array();
            $Categorias2[] = $rsCategorias;
            while($rsCategorias = mysqli_fetch_object($query)){
                $Categorias2[] = $rsCategorias;
                //echo " <br> @ Pegando sub categoria: ".$rsCategorias->categoria;
            }
            
        }
        if(count($Categorias2)>=1){
            //echo "Adicionando SubCategoria  a ".$vetor[$i]->categoria;
            $vetor[$i]->subCategorias =  $Categorias2;
            unset($Categorias2);
            getSubCategoria($conexao,$vetor[$i]->subCategorias);   
        }            
    }
    return $vetor;
}

function getAllProdutos(& $conexao){
    $sql = "Select * from tbl_produtos order by RAND() limit 0,9";
    $query = mysqli_query($conexao,$sql);
    $Produtos[]=  array();
    while($rsProdutos = mysqli_fetch_object($query)){
        $Produtos[]= $rsProdutos;
    }
    return $Produtos;
}

function getAllCategorias(& $conexao){
    $sql = "Select * from tbl_categoria where herda IS NULL";
    $query = mysqli_query($conexao,$sql);
    $Categorias1[]=  array();
    while($rsCategorias = mysqli_fetch_object($query)){
        $Categorias1[]= $rsCategorias;
    }
    return getSubCategoria($conexao,$Categorias1);
}
function getCategoriaById(& $conexao,$idCategoria){
    $sql = "Select * from tbl_categoria where id = $idCategoria";
    $query = mysqli_query($conexao,$sql);
    $Categoria  = array();
    $Categoria[] = NULL;
    if($rsCategorias = mysqli_fetch_object($query)){
        $Categoria[] = $rsCategorias;
    }
    return getSubCategoria($conexao,$Categoria);
}

function getProdutos(& $conexao,$idCategoria){
    $sql = " Select * from tbl_produtos where idCategoria = $idCategoria";
    $Query  =  mysqli_query($conexao,$sql);
    $Produtos = array();
    while($rsProdutos = mysqli_fetch_object($Query)){
        $Produtos [] = $rsProdutos;
    }
    if(count($Produtos)<1){
        //echo "Não tem nada Aqui!! \n\n";
        $Categoria = getCategoriaById($conexao,$idCategoria);
        //echo "Categoras Achados:\n\n";
        //var_dump($Categoria[1]);
        if(isset($Categoria[1]->subCategorias)){
            $Produtos  = getProdutosSub($conexao,$Categoria[1]->subCategorias,null); 
            /*echo "Produtos Achados:\n\n";
            var_dump($Produtos);*/
        }else{
            return null;
            echo " SubCategorias inexitentes ";
        }

    }
    return $Produtos;
}

function getProdutosSub(& $conexao,$vetor,$produtos){
    if($produtos == null){
        $produtos = array();
    }
    //echo "\n\n Sub Categorias Pegar para pegar produtos \n\n";
    //var_dump($vetor);
    //echo " \n\n ------------------- \n\n ";
    for($i=1; $i<count($vetor);$i++){
        //var_dump($vetor[$i]);
        $produtostmp = getProdutos($conexao,$vetor[$i]->id);
        if($produtostmp == null){
           // echo " nUlL ";
        }else{
            for($j=0;$j<count($produtostmp);$j++){
                //array dentro de outro  resulva fazendo um vetor se entra r com outro
                $produtos [] = $produtostmp[$j];
            }
            //$produtos [] = $produtostmp;
        }
    }
    //echo " Produtos  Pegos : \n";
    //var_dump($produtos);
    return $produtos;
}
?>