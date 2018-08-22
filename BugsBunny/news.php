<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
    <head>
        <title>Notícias em Destaque</title>
        <meta name="keywords" content="BugBunnySA, Artigos, Matérias, Notícias, destaques"><!-- Definindo palavras chaves para motores de busca -->
        <meta name="description" content="Pagina referente a matérias e novas notícias">
        <meta name="abstract" content="Notícias que são destaques da semana">
        <meta name="revisit-after" content="7 days">
        <link rel="stylesheet" type="text/css" href="fonts/awesome/all.css">
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
                        height: 50px;
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
                        <style>
                            i[data-style="CaixaMenuPesquisa"] nav {
                                display:none;
                            }
                            i[data-style="CaixaMenuPesquisa"]:hover{
                                color:#006D5C;
                            }
                            i[data-style="CaixaMenuPesquisa"]:hover>nav{
                                display:block;
                                position: absolute;
                                left: 0;
                                width: 100%;
                                z-index: 999;
                                border-top: solid 2px;
                                box-shadow: 2px 2px 2px black;
                                background-color: white;
                            }
                        </style>
                        <div class="cold3" style="float: left;">
                            <i class="fas fa-align-justify" data-style="CaixaMenuPesquisa" style="border-radius: 14px; font-size: 28px; margin-top: 8px; padding: 4px; background-color: white;">
                                <nav>
                                    <div class="ItemMenuPesquisa"><i class="fas fa-balance-scale" style="margin-right: 4px;"></i>Política</div>
                                    <div class="ItemMenuPesquisa"><i class="far fa-money-bill-alt" style="margin-right: 4px;"></i>Economia</div>
                                    <div class="ItemMenuPesquisa"><i class="fas fa-globe" style="margin-right: 4px;"></i>Internacional</div>
                                    <div class="ItemMenuPesquisa"><i class="fas fa-cogs" style="margin-right: 4px;"></i>Tecnologia</div>
                                    <div class="ItemMenuPesquisa"><i class="fas fa-dove" style="margin-right: 4px;"></i>Segurança</div>
                                </nav>
                            </i>
                        </div>
                        <div class="cold8" style="float: right;">
                            <div class="row">
                                <div class="cold7" style="float:right;">
                                    <div class="row">
                                        <form role="search" style="float: right;">
                                            <div class="cold6">
                                                <div class="row">
                                                    <i class="fas fa-search"><label for="txtPesquisa">Pesquisar</label></i>
                                                </div>
                                                <div class="row">
                                                    <input style="width:100%;" type="search" id="txtPesquisa" name="txtPesquisa">
                                                </div>
                                            </div>
                                            <div class="cold3">
                                                <input  class="btn" type="submit">
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
