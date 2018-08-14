<?php 
try{
    
    
}  catch (Exception $e){
    
}
?>
<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
    <head>
        <title>Home</title>
<?php include_once './head.php';?>
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
                <div class="ItemCaixaHeader" >
                    <nav>
                        <div class="CaixaMenu">
                            <div class="ItemMenu">Home</div>
                            <div class="ItemMenu">Notícias</div>
                            <div class="ItemMenu">Sobre</div>
                            <div class="ItemMenu">Promoções</div>
                            <div class="ItemMenu">Nossas Bancas</div>
                            <div class="ItemMenu">Fale Conosco</div>
                        </div>
                    </nav>
                </div>
                <div class="ItemCaixaHeader" id="CaixaLogin">
                    <form method="post" action="#">
                        <div class="row">
                            <div class="cold4">
                                <label>Usuario:</label>
                                <div class="row">
                                    <input type="text">
                                </div>
                            </div>
                            <div class="cold4">
                                <label>Senha:</label>
                                <div class="row">
                                    <input type="password" style="">
                                </div>
                            </div>
                            <div class="cold1">
                                <input type="submit" value="ok">
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
        </div>
        <div id="CaixaSite">
            <div role="banner">
                <link rel="stylesheet" href="libs/Blink-Slider/blink.css">
                <script src="libs/Blink-Slider/jquery.blink.js"></script>
                <section class="blink-slider">
                    <button id="prev"><</button>
                    <button id="next">></button>
                    <div class="blink-view" id="blink">
                      <div class="viewSlide">
                          <div class="ItemSlider" style="background-image: url(img/slide/banca.jpg);">
                              <div  class="Painel">
                                  <h1> Ultimas Noticias:</h1>
                                  <p><a href="#"> Ponte desaba em Genova</a></p>
                                  <p><a href="#"> Lula vira concorente a presidencia</a></p>
                                  <p><a href="#"> Marina vence as eleições 2018</a></p>
                              </div>
                          </div>
                      </div>

                      <div class="viewSlide">
                          <div class="ItemSlider" style="background-image:url(img/slide/banca45.jpg);">
                              <div  class="Painel">
                                  <h1>  Ciência e Tecnologia:</h1>
                                  <p><a href="#"> SpaceX aposta em viajem tripulada em 2019.</a></p>
                                  <p><a href="#"> Estudo descobre a rota da chegada do virus zika ao brasil.</a></p>
                                  <p><a href="#"> Após adiamento, Nasa lança sonda em direção ao sol.</a></p>
                              </div>                              
                          </div>
                      </div>
                    </div>
                    <div class="blink-control" id="blink-control">
                    </div>
                    <script type="text/javascript">
                        $(document).ready(function(){
                            $("#blink").blink();
                        });
                    </script>
                  </section>
            </div>
            <div id="main" role="main">
                <div class="row">
                    <div class="cold4" data-style="MenuBar" >
                        <p>jasb sdasdnjs</p>
                        <p>jasb sdasdnjs</p>
                        <p>jasb sdasdnjs</p>
                        <p>jasb sdasdnjs</p>
                        <p>jasb sdasdnjs</p>
                        <p>jasb sdasdnjs</p>
                        <p>jasb sdasdnjs</p>
                    </div>
                    <div class="cold7" data-style="ProductBox">
                        <div class="Produto">
                            <div class="Titulo">Titulo</div>
                            <div class="Imagem">
                                <img alt="Imagem de Produto" src="img/assents/user32x32.png">
                            </div>
                            <div class="Descricao">Descrição</div>
                            <div class="Preco">R$ 10,00</div>
                            <div class="Detalhes"><a href="#">Detalhes</a></div>
                        </div>
                        <div class="Produto">
                            <div class="Titulo">Titulo</div>
                            <div class="Imagem">
                                <img alt="Imagem de Produto" src="img/assents/user32x32.png">
                            </div>
                            <div class="Descricao">Descrição</div>
                            <div class="Preco">R$ 10,00</div>
                            <div class="Detalhes"><a href="#">Detalhes</a></div>
                        </div>
                        <div class="Produto">
                            <div class="Titulo">Titulo</div>
                            <div class="Imagem">
                                <img alt="Imagem de Produto" src="img/assents/user32x32.png">
                            </div>
                            <div class="Descricao">Descrição</div>
                            <div class="Preco">R$ 10,00</div>
                            <div class="Detalhes"><a href="#">Detalhes</a></div>
                        </div>
                        <div class="Produto">
                            <div class="Titulo">Titulo</div>
                            <div class="Imagem">
                                <img alt="Imagem de Produto" src="img/assents/user32x32.png">
                            </div>
                            <div class="Descricao">Descrição</div>
                            <div class="Preco">R$ 10,00</div>
                            <div class="Detalhes"><a href="#">Detalhes</a></div>
                        </div>
                        <div class="Produto">
                            <div class="Titulo">Titulo</div>
                            <div class="Imagem">
                                <img alt="Imagem de Produto" src="img/assents/user32x32.png">
                            </div>
                            <div class="Descricao">Descrição</div>
                            <div class="Preco">R$ 10,00</div>
                            <div class="Detalhes"><a href="#">Detalhes</a></div>
                        </div>
                        <div class="Produto">
                            <div class="Titulo">Titulo</div>
                            <div class="Imagem">
                                <img alt="Imagem de Produto" src="img/assents/user32x32.png">
                            </div>
                            <div class="Descricao">Descrição</div>
                            <div class="Preco">R$ 10,00</div>
                            <div class="Detalhes"><a href="#">Detalhes</a></div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <footer>
                <p>Copyright© Senai 2018</p>
            </footer>
        </div>
    </body>
</html>
