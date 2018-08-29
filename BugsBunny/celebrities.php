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
            <div class="CaixaRedesSociais">
                <i class="fab fa-twitter"></i>
                <i class="fab fa-instagram"></i>
                <i class="fab fa-facebook-f"></i>
            </div>
            <link rel="stylesheet" href="libs/Blink-Slider/blink.css">
            <div id="CaixaSlider">
                <section class="blink-slider">            
                    <button id="prev" aria-label="voltar Imagem">&lt;</button>
                    <button id="next" aria-label="proxima Imagem">></button>
                    <div class="blink-view" id="blink">
                        <div class="viewSlide">
                            <div class="ItemSlider" style="background-repeat: no-repeat; background-size: cover; height: 500px; background-image: url(img/celebridades/aprendiz_RobertoJusto.png);">

                            </div>
                        </div>

                        <div class="viewSlide">
                            <div class="ItemSlider" style="background-repeat: no-repeat; background-size: cover;  height: 500px;  background-image:url(img/celebridades/Capturadetela_2018-08-29_12-41-50.png);">

                            </div>
                        </div>

                        <div class="viewSlide">
                            <div class="ItemSlider" style="background-repeat: no-repeat; background-size: cover;  height: 500px;  background-image:url(img/celebridades/Capturadetela_2018-08-29_12-39-42.png);">

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
        <div id="main" role="main" class="arredonda">
            <section>
                <h1>Entrevistas</h1>
                <article>
                    <h2>Entrevista com Roberto Justos</h2>
                    <div class="CaixaTexto"> 
                        <p>Roberto Justus, um dos publicitários mais bem-sucedidos do país, O Aprendiz encalhou justamente no mercado publicitário. Sem anunciantes que viabilizassem a produção do programa, a Band decidiu adiar para 2019 a sua reestreia, prevista inicialmente para o final de setembro. A decisão foi tomada na (21) e confirmada em nota oficial da emissora.</p>
                        <button class="Direita">Ver Mais+</button>
                    </div>
                </article>
                <article>
                    <h2> Entrevista com Carlos Alberto de Nóbrega antes do casamento.</h2>
                    <div class="CaixaTexto"> 
                        <p>O humorista Carlos Alberto de Nóbrega está feliz da vida. Embreve se casará com a médica Renata Domingues no civil, o apresentador comemorará a união em uma cerimônia íntima no restaurante Trio Dezenove, localizado na Vila Olímpia.</p>
                        <button class="Direita">Ver Mais+</button>
                    </div>
                </article>
            </section>
        </div>
        <footer>
            <p>Copyright© Senai 2018</p>
        </footer>
        <script>
            $(function () {
                $("#main").slideUp(1).slideDown(200);
            });
        </script>
    </body>
</html>
