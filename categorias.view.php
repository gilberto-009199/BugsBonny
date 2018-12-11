<?php require_once "./cdn/resorces.php" ?>
<?php

    $con = conect();
    $PrincipaisCategorias = getAllCategorias($con);

    function genHtmlCategorias($categorias){
        
        $html = ' ';

        for($i =1 ; $i< count($categorias);$i++){
            $categoria = $categorias[$i]->categoria;
            if($categorias[$i]->subCategorias!==null){
                $id = $categorias[$i]->id;
                  //'<ul>'.genHtmlCategorias($categorias[$i]->subCategorias).'</ul>';
                $html.= "<li class='ItemMenuBar'><strong data-id='$id'>$categoria</strong>
                            <ol>".genHtmlCategorias($categorias[$i]->subCategorias)."</ol>
                        </li>";
            }else{
                    $id = $categorias[$i]->id;
                    $html.= "<li class='ItemMenuBar'><strong data-id='$id'>$categoria</strong></li>";
            }
        }
        return $html;

    }

echo ('<ol>'.genHtmlCategorias($PrincipaisCategorias).'</ol>');

?>
