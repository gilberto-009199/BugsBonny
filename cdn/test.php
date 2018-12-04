<?php require_once "./resorces.php" ?>


<?php
    $con = conect();
    $PrincipaisCategorias = getAllCategorias($con);

    echo "<pre>";
    var_dump($PrincipaisCategorias);
    echo($PrincipaisCategorias);       
?>