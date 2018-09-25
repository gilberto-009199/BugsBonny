<?php
/**
* @author Gilberto Ramos de O. <gilberto.tec@vivaldi.net>
* @version 1.0 
* @copyright  unlicense <http://unlicense.org/>
*/ 
?>
<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
    <head>
        <title>Home</title>
        <meta name="keywords" content="Site BugBunnySA, Apresentação, oficial"><!-- Definindo palavras chaves para motores de busca -->
        <meta name="description" content="catalogo eletronico da galeria de livros,revistas, jornais,etc de gêneros">
        <meta name="abstract" content="Pagina de apresentação da Empresa BugBunny">
        <meta name="revisit-after" content="5 days">
        <link rel="stylesheet" href="./fonts/awesome/all.css">
        <?php include_once './head.php'; ?>
    </head>
    <body>
        <header>
            <div class="CaixaHeader">
                <div class="ItemCaixaHeader">
                    <div class="Logo">
                        <img alt=" Logo do site" title="logo" height="42" width="42" src="img/logo2.png">
                        <p>BugBunny</p>
                    </div>
                </div>
                <div class="ItemCaixaHeader" role="menubar">
                    <nav aria-label="main navigation">
                        <div class="CaixaMenu" role="menu">
                            <div class="ItemMenu" role="menuitem"><a href="./index.php">Home</a></div>
                            <div class="ItemMenu" role="menuitem"><a href="./news.php">Notícias</a></div>
                            <div class="ItemMenu" role="menuitem"><a href="./about.php">Sobre</a></div>
                            <div class="ItemMenu" role="menuitem"><a href="./offers.php">Promoções</a></div>
                            <div class="ItemMenu" role="menuitem"><a href="./stalls.php">Nossas Bancas</a></div>
                            <div class="ItemMenu" role="menuitem"><a href="./celebrities.php">Celebridades</a></div>
                            <div class="ItemMenu" role="menuitem"><a href="./contact.php">Fale Conosco</a></div>
                        </div>
                    </nav>
                </div>
                <div class="ItemCaixaHeader" id="CaixaLogin">
                    <form accept-charset="utf-8" method="post" action="./cms/login.php">
                        <div class="row">
                            <div class="cold4">
                                <label for="txtUser"><i class="fas fa-user">Usuario:</i></label>
                                <div class="row">
                                    <input id="txtUser" name="txtEmail" required type="text">
                                </div>
                            </div>
                            <div class="cold4">
                                <label for="txtPasswrd"><i class="fas fa-key">Senha:</i></label>
                                <div class="row">
                                    <input id="txtPasswrd" name="txtPassword" required type="password">
                                </div>
                            </div>
                            <div class="cold1">
                                <input class="btn"  id="btnLogin" type="submit" value="ok">
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </header>
        <div id="CaixaRedeSociais">
            <div class="ItemRedeSocial">
                <p>Facebook</p>
            </div>
            <div class="ItemRedeSocial">
                <p>Orkut</p>
            </div>
            <div class="ItemRedeSocial">
                <p>TWITER</p>
            </div>
        </div>
        <div id="CaixaSite" class="arredonda">
            <div role="banner">
                <link rel="stylesheet" href="libs/Blink-Slider/blink.css">
                <script src="libs/Blink-Slider/jquery.blink.js"></script>
                <section class="blink-slider">
                    <button id="prev" aria-label="voltar Imagem"><i class="far fa-arrow-alt-circle-left"></i></button>
                    <button id="next" aria-label="proxima Imagem"><i class="far fa-arrow-alt-circle-right"></i></button>
                    <div class="blink-view" id="blink">
                        <div class="viewSlide">
                            <div class="ItemSlider" style="background-image: url(img/slide/banca.jpg);">
                                <div  class="Painel">
                                    <h1> Ultimas Noticias:</h1>
                                    <p class="sublinhado"><a href="#"> Ponte desaba em Genova</a></p>
                                    <p class="sublinhado"><a href="#"> Lula vira concorente a presidencia</a></p>
                                    <p class="sublinhado"><a href="#"> Marina vence as eleições 2018</a></p>
                                </div>
                            </div>
                        </div>

                        <div class="viewSlide">
                            <div class="ItemSlider" style="background-image:url(img/slide/tec.jpg);">
                                <div  class="Painel">
                                    <h1>  Ciência e Tecnologia:</h1>
                                    <p class="sublinhado"><a href="#"> SpaceX aposta em viajem tripulada em 2019.</a></p>
                                    <p class="sublinhado"><a href="#"> Estudo descobre a rota da chegada do virus zika ao brasil.</a></p>
                                    <p class="sublinhado"><a href="#"> Após adiamento, Nasa lança sonda em direção ao sol.</a></p>
                                </div>                              
                            </div>
                        </div>
                    </div>
                    <div class="blink-control" id="blink-control">
                    </div>
                    <script type="text/javascript">
                        $(document).ready(function () {
                            $("#blink").blink();
                        });
                    </script>
                </section>
            </div>
            <div id="main" role="main">
                <div class="row">
                    <div class="cold4" data-style="MenuBar" >
                        <span class="ItemMenuBar">Revistas</span>
                        <span class="ItemMenuBar">Jornais</span>
                        <span class="ItemMenuBar">Videos</span>
                        <span class="ItemMenuBar">Assinaturas</span>
                    </div>
                    <div class="cold7" data-style="ProductBox">
                        <div class="Produto">
                            <div class="Titulo">Revista Veja</div>
                            <div class="Imagem">
                                <img alt="Imagem de Produto" src="img/assents/computer64x64.png">
                            </div>
                            <div class="Descricao">Descrição</div>
                            <div class="Preco"><span class="destaque">R$8,00</span></div>
                            <div class="Detalhes"><a href="#">Detalhes</a></div>
                        </div>
                        <div class="Produto">
                            <div class="Titulo">Titulo</div>
                            <div class="Imagem">
                                <img alt="Imagem de Produto" src="img/assents/user32x32.png">
                            </div>
                            <div class="Descricao">Descrição</div>
                            <div class="Preco"><span class="destaque">R$8,00</span></div>
                            <div class="Detalhes"><a href="#">Detalhes</a></div>
                        </div>
                        <div class="Produto">
                            <div class="Titulo">Titulo</div>
                            <div class="Imagem">
                                <img alt="Imagem de Produto" src="img/assents/user32x32.png">
                            </div>
                            <div class="Descricao">Descrição</div>
                            <div class="Preco"><span class="destaque">R$8,00</span></div>
                            <div class="Detalhes"><a href="#">Detalhes</a></div>
                        </div>
                        <div class="Produto">
                            <div class="Titulo">Titulo</div>
                            <div class="Imagem">
                                <img alt="Imagem de Produto" src="img/assents/user32x32.png">
                            </div>
                            <div class="Descricao">Descrição</div>
                            <div class="Preco"><span class="destaque">R$8,00</span></div>
                            <div class="Detalhes"><a href="#">Detalhes</a></div>
                        </div>
                        <div class="Produto">
                            <div class="Titulo">Titulo</div>
                            <div class="Imagem">
                                <img alt="Imagem de Produto" src="img/assents/user32x32.png">
                            </div>
                            <div class="Descricao">Descrição</div>
                            <div class="Preco"><span class="destaque">R$8,00</span></div>
                            <div class="Detalhes"><a href="#">Detalhes</a></div>
                        </div>
                        <div class="Produto">
                            <div class="Titulo">Titulo</div>
                            <div class="Imagem">
                                <img alt="Imagem de Produto" src="img/assents/user32x32.png">
                            </div>
                            <div class="Descricao">Descrição</div>
                            <div class="Preco"><span class="destaque">R$8,00</span></div>
                            <div class="Detalhes"><a href="#">Detalhes</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <footer>
                <p>Copyright© Senai 2018</p>
            </footer>
        </div>
        <script>
            $(function () {
                $("#CaixaSite").slideUp(1).slideDown(500);
            });
        </script>
    </body>
</html>
