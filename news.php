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
            <div class="row">
                <div class="row" data-style="BarraPesquisa">
                    <div class="cold3" style="float: left;">
                        <nav data-style="MenuPesquisa">
                            <i class="fas fa-align-justify" style="border-radius: 14px; font-size: 28px; margin-top: 8px; margin-left:20px; padding: 4px; background-color: white;"></i>
                            <div data-style="SubMenu">
                                <div class="ItemMenuPesquisa"><i class="fas fa-balance-scale" style="margin-right: 4px;"></i>Política</div>
                                <div class="ItemMenuPesquisa"><i class="far fa-money-bill-alt" style="margin-right: 4px;"></i>Economia</div>
                                <div class="ItemMenuPesquisa"><i class="fas fa-globe" style="margin-right: 4px;"></i>Internacional</div>
                                <div class="ItemMenuPesquisa"><i class="fas fa-cogs" style="margin-right: 4px;"></i>Tecnologia</div>
                                <div class="ItemMenuPesquisa"><i class="fas fa-dove" style="margin-right: 4px;"></i>Segurança</div>
                            </div>
                        </nav>
                    </div>
                    <div data-style="CaixaPesquisa">
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
                                                <button class="btn" type="submit"> Pesquisar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                    
                </div>
                <div class="row">
                    <div class="cold6" style="float:left;">
                        <link rel="stylesheet" href="libs/Blink-Slider/blink.css">
                        <div id="CaixaSlider" style="margin-left: 21px;">
                            <section class="blink-slider">            
                                <button id="prev" aria-label="voltar Imagem">&lt;</button>
                                <button id="next" aria-label="proxima Imagem">></button>
                                <div class="blink-view" id="blink">
                                    <div class="viewSlide">
                                        <div class="ItemSlider" style="background-repeat: no-repeat; background-size: cover; height: 300px; background-image: url(img/noticias/24rohingya-rakhine-1-threeByTwoSmallAt2X.jpg);">

                                        </div>
                                    </div>

                                    <div class="viewSlide">
                                        <div class="ItemSlider" style="background-repeat: no-repeat; background-size: cover;  height: 300px;  background-image:url(img/noticias/merlin_142457877_9ed7f2d3-7282-4538-8bdf-6aef22fec8b7-threeByTwoLargeAt2X.jpg);">

                                        </div>
                                    </div>

                                    <div class="viewSlide">
                                        <div class="ItemSlider" style="background-repeat: no-repeat; background-size: cover;  height: 300px;  background-image:url(img/noticias/xxbees-slide-KN6T-threeByTwoLargeAt2X.jpg);">

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
                    <div class="cold4" data-style="CaixaTopicos">
                        <section>
                            <h1> Ultimos topicos!</h1>
                            <p><i class="fas fa-balance-scale"></i>Lula perde jugamento</p>
                            <p><i class="fas fa-balance-scale"></i>Bolsonaro perde para Ciro Gomes</p>
                            <p><i class="far fa-money-bill-alt"></i>Banco Central declara falencia!!</p>
                            <p><i class="far fa-money-bill-alt"></i>Numero de Desenpregados sobe para 19 milhões</p>
                            <p><i class="fas fa-balance-scale"></i>Donald Tramp é morto por milicia norte-coreana</p>
                            <p><i class="fas fa-balance-scale"></i>Ditador Chichaum e morto por ministro das armas</p>
                        </section>

                    </div>
                </div>
            </div>
        </div>
        <div id="main" role="main" class="arredonda">
            <section class="arredonda">
                <h1>Ultimas Notícias</h1>
                <article>
                    <h2>Asteroide maior do que Grande Pirâmide egípcia está se aproximando da Terra</h2>
                    <div class="CaixaTexto"> 
                        <p>Um enorme asteroide passará perto da Terra em 29 de agosto a uma velocidade de nove quilômetros por segundo, informou o Laboratório de Propulsão a Jato da NASA.</p>
                        <p>O corpo celeste, denominado 2016 NF23, é considerado pela agência espacial como "potencialmente perigoso" devido a seu tamanho: seu diâmetro pode atingir entre 70 e 160 metros. O tamanho do asteroide pode ser comparado, dependendo de suas dimensões definitivas, com um avião Boeing 747 ou com a Grande Pirâmide de Giza (139 metros de altura).</p>
                        <p>A agência estima que o asteroide passará a 4,8 milhões de quilômetros da Terra o que equivale a três vezes a distância entre a Terra e a Lua, segundo o Fox News.</p>
                        <p>Segundo a classificação da NASA, qualquer corpo celeste que passe a uma distância menor que 7,5 milhões de quilômetros da Terra e tenha um diâmetro superior a 140 metros está na lista de corpos perigosos.</p>
                        <p>O asteroide deverá passar pelo nosso planeta por volta da meia-noite, horário GMT, na próxima quarta-feira (29) (21h00, horário de Brasília).</p>
                    </div>
                </article>
                <article>
                    <h2>Motores da epidemia de obesidade no Brasil</h2>
                    <div class="CaixaTexto"> 
                        <p>Se o ritmo atual de crescimento da obesidade no Brasil for mantido, o país poderá apresentar em 2020 uma tendência de prevalência semelhante à dos Estados Unidos e do México, com excesso de peso em 35% da população.</p>
                        <p>A avaliação foi feita por pesquisadores participantes do evento com o tema “Obesidade” no Ciclo de Palestras ILP-FAPESP, realizado no dia 20 de agosto na Assembleia Legislativa do Estado de São Paulo (Alesp).</p>
                        <p>A prevalência de obesidade no Brasil se intensificou a partir dos anos 2000 e mudanças no padrão alimentar da população contribuem para a escalada do problema. Nas últimas décadas, o brasileiro passou a substituir alimentos tradicionais, como arroz, feijão e salada, por preparações ultraprocessadas.</p>
                        <p>“Houve uma intensificação de um ambiente alimentar obesogênico [que causa obesidade] que influenciou o estilo de vida e contribuiu para o aumento do problema no país”, disse Patricia Constante Jaime, professora do Departamento de Nutrição da Faculdade de Saúde Pública da Universidade de São Paulo (FSP-USP).</p>
                        <p>De acordo com a mais recente Pesquisa Nacional de Saúde publicada pelo Instituto Brasileiro de Geografia e Estatística (IBGE), 20,8% da população adulta brasileira – 26 milhões de pessoas – está obesa. A prevalência desse problema de saúde tem sido registrada em todas as faixas etárias e níveis de renda e em maior proporção em mulheres do que homens.</p>
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
