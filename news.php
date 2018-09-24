<?php require_once "./cdn/resorces.php"?>
<?php require_once "./libs/libsphp/BBcode/bbcode.php"?>
<?php
/**
* @author Gilberto Ramos de O. <gilberto.tec@vivaldi.net>
* @version 1.0 
* @copyright  unlicense <http://unlicense.org/>
*/ 
?>
<?php
try{
    $noticias = getNoticias(conect());
}catch(Exception $e){
    $msgAlertaErro = " Erro Catastrofico no Sistema!!!" . $e->getMessage();
    throw Exception("Erro na pagina de noticia news.php!!");
}
?>
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
                <nav aria-label="main navigation">
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
                            <i class="fas fa-align-justify" data-style="IconMenu"></i>
                            <div data-style="SubMenu">
                                <div class="ItemMenuPesquisa"><i class="fas fa-balance-scale" data-style="margenIcone"></i>Política</div>
                                <div class="ItemMenuPesquisa"><i class="far fa-money-bill-alt" data-style="margenIcone" ></i>Economia</div>
                                <div class="ItemMenuPesquisa"><i class="fas fa-globe" data-style="margenIcone"></i>Internacional</div>
                                <div class="ItemMenuPesquisa"><i class="fas fa-cogs" data-style="margenIcone"></i>Ciência</div>
                                <div class="ItemMenuPesquisa"><i class="fas fa-dove" data-style="margenIcone"></i>Segurança</div>
                            </div>
                        </nav>
                    </div>
                    <div data-style="CaixaPesquisa">
                        <div class="cold8 Direita">
                            <div class="row">
                                <div class="cold7 Direita">
                                    <div class="row">
                                        <form role="search" class="Direita">
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
                    <div class="cold6 Esquerda">
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
                            <h1> Últimos tópicos!</h1>
                            <?php for($i=1;($i<count($noticias) && $i < 7);$i++){?>
                                <p>
                                    <?php
                                        switch ($noticias[$i]->categoria){
                                            case "Ciência":
                                               echo '<i class="fas fa-flask"></i>';
                                              break;
                                            case "Economia":
                                                echo '<i class="far fa-money-bill-alt"></i>';
                                                break;
                                            case "Politica":
                                                echo '<i class="fas fa-balance-scale">';
                                                break;
                                            case "Segurança":
                                                echo '<i class="fas fa-lock"></i>';
                                                break;
                                            default:
                                               echo '<i class="fas fa-globe"></i>';
                                        }
                                        echo $noticias[$i]->titulo;
                                    ?>
                                </p>
                            <?php } ?>
                            <!--<p><i class="fas fa-balance-scale"></i>Lula perde julgamento</p>
                            <p><i class="fas fa-balance-scale"></i>Bolsonaro perde para Ciro Gomes</p>
                            <p><i class="far fa-money-bill-alt"></i>Banco Central declara falência!!</p>
                            <p><i class="far fa-money-bill-alt"></i>Numero de Desempregados sobe para 19 milhões</p>
                            <p><i class="fas fa-balance-scale"></i>Donald Tramp é morto por milicia norte-coreana</p>
                            <p><i class="fas fa-balance-scale"></i>Ditador Chichaum e morto por ministro das armas</p>-->
                        </section>
                    </div>
                </div>
            </div>
        </div>
        <div id="main" role="main" class="arredonda">
            <section class="arredonda">
                <h1>Ultimas Notícias</h1>
                <?php for($i =1; $i< count($noticias) && $i < 10 ;$i++){?>
                <article>
                    <h2><?=$noticias[$i]->titulo?></h2>
                    <div class="CaixaTexto">
                        <?= BBcode($noticias[$i]->conteudo)?>
                    </div>
                </article>
                <?php }?>
                <!--<article>
                    <h2>Motores da epidemia de obesidade no Brasil</h2>
                    <div class="CaixaTexto"> 
                        <p>Se o ritmo atual de crescimento da obesidade no Brasil for mantido, o país poderá apresentar em 2020 uma tendência de prevalência semelhante à dos Estados Unidos e do México, com excesso de peso em 35% da população.</p>
                        <p>A avaliação foi feita por pesquisadores participantes do evento com o tema “Obesidade” no Ciclo de Palestras ILP-FAPESP, realizado no dia 20 de agosto na Assembleia Legislativa do Estado de São Paulo (Alesp).</p>
                        <p>A prevalência de obesidade no Brasil se intensificou a partir dos anos 2000 e mudanças no padrão alimentar da população contribuem para a escalada do problema. Nas últimas décadas, o brasileiro passou a substituir alimentos tradicionais, como arroz, feijão e salada, por preparações multiprocessadas.</p>
                        <p>“Houve uma intensificação de um ambiente alimentar obesogênico [que causa obesidade] que influenciou o estilo de vida e contribuiu para o aumento do problema no país”, disse Patricia Constante Jaime, professora do Departamento de Nutrição da Faculdade de Saúde Pública da Universidade de São Paulo (FSP-USP).</p>
                        <p>De acordo com a mais recente Pesquisa Nacional de Saúde publicada pelo Instituto Brasileiro de Geografia e Estatística (IBGE), 20,8% da população adulta brasileira – 26 milhões de pessoas – está obesa. A prevalência desse problema de saúde tem sido registrada em todas as faixas etárias e níveis de renda e em maior proporção em mulheres do que homens.</p>
                    </div>
                </article>-->
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
