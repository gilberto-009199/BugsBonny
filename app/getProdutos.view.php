<?php require_once "../cdn/resorces.php" ?>
<?php

    $con = conect();
    if(isset($_GET['get'])){
        if(isset($_GET['idCategoria'])){
            //echo "<pre>";
            $idCategoria = $_GET['idCategoria'];
            $produtos = getProdutos($con,$idCategoria);
            //echo "Produtos que serão colocados: \n";
            //var_dump($produtos);
            if($produtos!=null){
                for($g=0;$g<count($produtos);$g++){ $produto = $produtos[$g]?>
                   <div class="Produto">
                        <div class="Titulo"><?=@$produto->titulo?></div>
                        <div class="Imagem">
                            <img alt="Imagem de Produto" height="111" width="126" src="imgup/<?=@$produto->img?>">
                        </div>
                        <div class="Descricao"><?=@$produto->descrisao?></div>
                        <div class="Preco"><span class="destaque">R$<?=@$produto->valor?></span></div>
                        <div class="Detalhes"><a href="javascript:getDetalhes(<?=@$produto->id?>)">Detalhes</a></div>
                    </div>
            <?php }
            }
        }else{
           //var_dump( getAllProdutos($con));
           $produtosAll = getAllProdutos($con);
           //var_dump($produtosAll);
           if($produtosAll!=null){
                for($v=1;$v<count($produtosAll);$v++){ $produto = $produtosAll[$v]?>
                   <div class="Produto">
                        <div class="Titulo"><?=@$produto->titulo?></div>
                        <div class="Imagem">
                            <img alt="Imagem de Produto" height="111" width="126" src="imgup/<?=@$produto->img?>">
                        </div>
                        <div class="Descricao"><p><?=@$produto->descrisao?></p></div>
                        <div class="Preco"><span class="destaque">R$<?=@$produto->valor?></span></div>
                        <div class="Detalhes"><a href="javascript:getDetalhes(<?=@$produto->id?>)">Detalhes</a></div>
                    </div>
            <?php }
            }
        }
    }
    /*$Categoria = getCategoriaById($con,4);
    $Produtos  = getProdutos($con,$Categoria[1]) 
    var_dump($Categoria);*/
?>