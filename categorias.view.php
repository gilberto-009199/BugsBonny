<?php require_once "./cdn/resorces.php" ?>
<?php

    $con = conect();
    $PrincipaisCategorias = getAllCategorias($con);

    function genHtmlCategorias($categorias){
        
        $html = ' ';

        for($i =1 ; $i< count($categorias);$i++){
            $categoria = $categorias[$i]->categoria;
            if($categorias[$i]->subCategorias!==null){
                  //'<ul>'.genHtmlCategorias($categorias[$i]->subCategorias).'</ul>';
                $html.= "<li class='ItemMenuBar'><strong>$categoria</strong>
                            <ul>".genHtmlCategorias($categorias[$i]->subCategorias)."</ul>
                        </li>";
            }else{
                    $html.= "<li class='ItemMenuBar'>$categoria</li>";
            }
        }
        return $html;

    }

echo ('<ul>'.genHtmlCategorias($PrincipaisCategorias).'</ul>');

?>
