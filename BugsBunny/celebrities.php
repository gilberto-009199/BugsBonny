<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
    <head>
        <title>A sua celebridade está aqui</title>
        <meta name="keywords" content="BugBunnySA, Celebridades,show,shows,atores,filmes"><!-- Definindo palavras chaves para motores de busca -->
        <meta name="description" content="Pagina referente a matérias sobre os atores nacionais que são capas de revistas ou filmes do mês">
        <meta name="abstract" content="Matérias sobre Famosos">
        <meta	name="revisit-after" content="7 days">
        <link rel="stylesheet" href="./fonts/awesome/all.css">
        <?php include_once './head.php'; ?>
    </head>
    <body>
        <header>
            <div class="ItemCaixaHeader">
                <nav>
                    <div class="CaixaMenu" role="menu">
                        <div class="ItemMenu BordaDireita" role="menuitem"><a href="./index.php">Home</a></div>
                        <div class="ItemMenu BordaDireita" role="menuitem"><a href="./news.php">Notícias</a></div>
                        <div class="ItemMenu BordaDireita" role="menuitem"><a href="./about.php">Sobre</a></div>
                        <div class="ItemMenu BordaDireita" role="menuitem"><a href="./offers.php">Promoções</a></div>
                        <div class="ItemMenu BordaDireita" role="menuitem"><a href="./celebrities.php">Celebridades</a></div>
                        <div class="ItemMenu BordaDireita" role="menuitem"><a href="./stalls.php">Nossas Bancas</a></div>
                        <div class="ItemMenu" role="menuitem"><a href="contact.php">Fale Conosco</a></div>
                    </div>                    
                </nav>
            </div>
            <div class="ItemCaixaHeader">
                <div class="Logo">
                    <img alt=" Logo do site" title="logo" height="32" width="32" src="img/logo2.png">
                    <p>BugBunny</p>
                </div>
            </div>
        </header>
        <div role="banner">
            <p style="font-size: 32px; color:black; text-align: right; position: absolute; z-index: 995; background-color: white; padding: 6px; right: 0;">
                <i class="fab fa-twitter"></i>
                <i class="fab fa-instagram"></i>
                <i class="fab fa-facebook-f"></i>
            </p>
            <link rel="stylesheet" href="libs/Blink-Slider/blink.css">
            <div id="CaixaSlider" style="width: 1000px; height: 500px; margin-left: auto; margin-right: auto;">
                <section class="blink-slider">            
                    <button id="prev" aria-label="voltar Imagem" style="    position: absolute;
                            z-index: 990;
                            height: 91px;
                            margin-top: 110px;
                            background: white;
                            color: black;
                            font-weight: bolder;
                            font-size: 22px;
                            border: none;
                            opacity: 0.2;
                            }">&lt;</button>
                    <button id="next" aria-label="proxima Imagem" style=" position: absolute;
                            z-index: 990;
                            height: 91px;
                            margin-top: 110px;
                            right: 0;
                            background: white;
                            color: black;
                            font-weight: bolder;
                            font-size: 22px;
                            border: none;
                            opacity: 0.2;">></button>
                    <div class="blink-view" id="blink">
                        <div class="viewSlide">
                            <div class="ItemSlider" style="background-repeat: no-repeat; background-size: cover; height: 500px; background-image: url(img/noticias/24rohingya-rakhine-1-threeByTwoSmallAt2X.jpg);">

                            </div>
                        </div>

                        <div class="viewSlide">
                            <div class="ItemSlider" style="background-repeat: no-repeat; background-size: cover;  height: 500px;  background-image:url(img/noticias/merlin_142457877_9ed7f2d3-7282-4538-8bdf-6aef22fec8b7-threeByTwoLargeAt2X.jpg);">

                            </div>
                        </div>

                        <div class="viewSlide">
                            <div class="ItemSlider" style="background-repeat: no-repeat; background-size: cover;  height: 500px;  background-image:url(img/noticias/xxbees-slide-KN6T-threeByTwoLargeAt2X.jpg);">

                            </div>
                        </div>
                    </div>
                    <div class="blink-control" id="blink-control">
                    </div>
                    <script src="./libs/Blink-Slider/jquery.blink.js"></script>
                    <script type="text/javascript">
                        $(document).ready(function () {
                            $("#blink").blink();
                        });
                    </script>
                </section>
            </div>
        </div>
        <div id="main" role="main">


        </div>
        <footer>
            <p>Copyright© Senai 2018</p>
        </footer>
    </body>
</html>
