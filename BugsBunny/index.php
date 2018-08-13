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
                        <img alt=" Logo do site" title="logo" height="42"width="42" src="img/logo2.png">
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
        </div>
        <div id="CaixaSite">
            <div role="banner"style="margin:20px auto;width:800;background-color: black;">
                <link rel="stylesheet" href="libs/Blink-Slider/blink.css">
                <script src="libs/Blink-Slider/jquery.blink.js"></script>
                <section class="blink-slider">
                    <button id="prev"><</button>
                    <button id="next">></button>
                    <div class="blink-view" id="blink">
                      <div class="viewSlide">
                          <div style="width: 100%; height:360px; background:url(img/slide/banca.jpg); background-attachment: scroll; background-size: cover;background-repeat: no-repeat;">
                              <h2>Nossas Bancas</h2>
                              <p>Estamos presentes em toda zona Oeste!</p>
                              <button> Verificar minah região </button>
                          </div>
                      </div>

                      <div class="viewSlide">
                          <div style="width: 100%; height:360px; background:url(img/slide/banca45.jpg); background-attachment: scroll; background-size: cover;background-repeat: no-repeat;">
                              
                              
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
                    <div class="cold4" style="min-height:464px; text-align: center; outline: 1px solid black; outline-offset: -1px;float: left;background-color: yellowgreen;" >
                        <p>jasb sdasdnjs</p>
                        <p>jasb sdasdnjs</p>
                        <p>jasb sdasdnjs</p>
                        <p>jasb sdasdnjs</p>
                        <p>jasb sdasdnjs</p>
                        <p>jasb sdasdnjs</p>
                        <p>jasb sdasdnjs</p>
                    </div>
                    <div class="cold7" style="min-height:464px;text-align: center;outline: 1px solid black; outline-offset: -1px; float: left;background-color: yellowgreen;">
                        <p>jasb sdasdnjs</p>
                        <p>jasb sdasdnjs</p>
                        <p>jasb sdasdnjs</p>
                        <p>jasb sdasdnjs</p>
                        <p>jasb sdasdnjs</p>
                        <p>jasb sdasdnjs</p>
                        <p>jasb sdasdnjs</p>
                        
                        <p>jasb sdasdnjs</p>
                        <p>jasb sdasdnjs</p>
                        <p>jasb sdasdnjs</p>
                        <p>jasb sdasdnjs</p>
                        <p>jasb sdasdnjs</p>
                        
                        <p>jasb sdasdnjs</p>
                        <p>jasb sdasdnjs</p>
                        <p>jasb sdasdnjs</p>
                        <p>jasb sdasdnjs</p>
                        <p>jasb sdasdnjs</p>
                    </div>
                </div>
            </div>
            <footer>


            </footer>
        </div>
    </body>
</html>
