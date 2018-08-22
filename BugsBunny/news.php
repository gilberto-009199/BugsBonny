<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
    <head>
        <title>Notícias em Destaque</title>
        <meta name="keywords" content="BugBunnySA, Artigos, Matérias, Notícias, destaques"><!-- Definindo palavras chaves para motores de busca -->
        <meta name="description" content="Pagina referente a matérias e novas notícias">
        <meta name="abstract" content="Notícias que são destaques da semana">
        <meta	name="revisit-after" content="7 days">
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
            <div class="row" style="height: 500px;">
                <style>
                    div[data-style="BarraPesquisa"]{
                        background: linear-gradient(265deg, rgba(255,255,255,1) 38%, rgba(231,227,227,1) 67%);
                        height: 60px;
                        margin-bottom: 10px;
                    }
                    div[data-style="CaixaPesquisa"]{
                        margin-left: auto;
                        margin-right: auto;
                        width: 1200px;
                        height: auto;
                    }
                </style>
                <div class="row" data-style="BarraPesquisa" style="">
                    <div data-style="CaixaPesquisa">
                        <div class="cold3" style="float: left;">
                            Menu Mobile
                        </div>
                        <div class="cold8" style="float: right;">
                            <div class="row">
                                <div class="cold7" style="float:right;">
                                    <div class="row">
                                        <form role="search">
                                            <div class="cold4">
                                                <div class="row">
                                                    <label for="txtPesquisa">Pesquisa</label>
                                                </div>
                                                <div class="row">
                                                    <input type="search" id="txtPesquisa" name="txtPesquisa">
                                                </div>
                                            </div>
                                            <div class="cold3">
                                                <input type="submit">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                    
                </div>
                <div class="cold5">
                    <link rel="stylesheet" href="libs/Blink-Slider/blink.css">
                    <div id="CaixaSlider" style="margin-left: 21px;">
                        <section class="blink-slider">            
                            <button id="prev" aria-label="voltar Imagem" style="position: absolute; z-index: 990; height: 91px; margin-top: 110px;">&lt;</button>
                            <button id="next" aria-label="proxima Imagem"style="position: absolute; z-index: 990; height: 91px; margin-top: 110px; right: 0;">></button>
                            <div class="blink-view cold5" id="blink">
                                <div class="viewSlide cold5">
                                    <div class="ItemSlider" style="height: 300px; background-image: url(img/slide/banca.jpg);">

                                    </div>
                                </div>

                                <div class="viewSlide cold5">
                                    <div class="ItemSlider" style="height: 300px;  background-image:url(img/slide/banca45.jpg);">

                                    </div>
                                </div>
                            </div>
                            <div class="blink-control" id="blink-control">
                            </div>
                            <script src="libs/Blink-Slider/jquery.blink.js"></script>
                            <script type="text/javascript">
                                $(document).ready(function () {
                                    $("#blink").blink();
                                });
                            </script>
                        </section>
                    </div>
                </div>
                <div class="cold5">


                </div>

            </div>
        </div>
        <div id="main" role="main">


        </div>
        <footer>

        </footer>
    </body>
</html>
