<?php require_once './cdn/resorces.php'; ?>
<?php require_once './libs/libsphp/BBcode/bbcode.php'; ?>
<?php
/**
* @author Gilberto Ramos de O. <gilberto.tec@vivaldi.net>
* @version 1.0 
* @copyright  unlicense <http://unlicense.org/>
*/ 
?>
<?php
try {
     $con = conect();
    $artigos = getArtigo($con);
} catch (Exception $e) {
    $msgAlertaErro = " Erro Catastrofico no Sistema!!!" . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
    <head>
        <title>Sobre a Banca </title>
        <meta name="keywords" content="BugBunnySA, História,Origem"><!-- Definindo palavras chaves para motores de busca -->
        <meta name="description" content="Informações históricas sobre a banca de jornal “Bugs Bunny SA”">
        <meta name="abstract" content="História da empresa">
        <meta name="revisit-after" content="9 month">
        <link rel="stylesheet" href="./fonts/awesome/all.css">
<?php include_once './head.php';?>
    </head>
    <body>
        <header>
            <div class="ItemCaixaHeader">
                <nav aria-label="main navigation" data-display='block'>
                    <div class="CaixaMenu" role="menu">
                        <div class="ItemMenu BordaDireita"  role="menuitem"><a href="./index.php">Home</a></div>
                        <div class="ItemMenu BordaDireita"  role="menuitem"><a href="./news.php">Notícias</a></div>
                        <div class="ItemMenu BordaDireita"  role="menuitem"><a href="./about.php">Sobre</a></div>
                        <div class="ItemMenu BordaDireita"  role="menuitem"><a href="./offers.php">Promoções</a></div>
                        <div class="ItemMenu BordaDireita"  role="menuitem"><a href="./celebrities.php">Celebridades</a></div>
                        <div class="ItemMenu BordaDireita"  role="menuitem"><a href="./stalls.php">Nossas Bancas</a></div>
                        <div class="ItemMenu"   role="menuitem"><a href="contact.php">Fale Conosco</a></div>
                    </div>                    
                </nav>
            </div>
            <div class="ItemCaixaHeader">
                    <div class="Logo">
                        <img alt="Logo do site" title="logo" height="32" width="32" src="img/logo2.png">
                       <p>BugBunny</p>
                    </div>
                </div>
        </header>
        <div role="banner">
            <div class="CaixaRedesSociais">
                <i class="fab fa-twitter"></i>
                <i class="fab fa-instagram"></i>
                <i class="fab fa-facebook-f"></i>
            </div>
            <div class="Painel"></div>
        </div>
        <div id="main" role="main" class="arredonda">
            <section aria-label="historia da Empresa">
                <h1>Artigos BugsBunny</h1>
            <?php for($i = 1; $i < count($artigos); $i++){ ?>
                 <article tabindex="0">
                    <h2><?=$artigos[$i]->titulo?></h2>
                    <div class="CaixaTexto"> 
                        <?= BBcode($artigos[$i]->conteudo)?>
                    </div>
                </article>
            <?php } ?>
            </section>            
        </div>
        <footer>
            <p>Copyright© Senai 2018</p>
        </footer>
         <script>
            if(window.innerWidth<958){
                $('nav[aria-label^="main"]').click(function(){
                    $(this).find('.CaixaMenu').css('display',$(this).attr('data-display'))
                    if(($(this).attr('data-display')+'').search('block')>=0){
                        $(this).attr('data-display','none');
                    }else{
                        $(this).attr('data-display','block');
                    }
                })
            }
        </script>
    </body>
</html>
