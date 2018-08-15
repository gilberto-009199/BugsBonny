<!DOCTYPE html>
<html>
    <head lang="pt-br" dir="ltr">
        <title>Fale Conosco</title>
<?php include_once './head.php';?>
    </head>
    <body>
        <header>
            <div class="ItemCaixaHeader">
                <nav>
                    <div class="CaixaMenu">
                        <div class="ItemMenu BordaDireita" role="ItemMenu"> Home</div>
                        <div class="ItemMenu BordaDireita" role="ItemMenu"> Notícias</div>
                        <div class="ItemMenu BordaDireita" role="ItemMenu"> Sobre</div>
                        <div class="ItemMenu BordaDireita" role="ItemMenu"> Promoções</div>
                        <div class="ItemMenu BordaDireita" role="ItemMenu"> Nossas Bancas</div>
                        <div class="ItemMenu" role="ItemMenu"> Fale Conosco</div>
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
            <script src="libs/Chart.js/Chart.js"></script>
            <canvas id="Grafico" height="300" width="1000">
                               
            </canvas>
            <script>
            var canvas = document.getElementById("Grafico");
            var myChart = new Chart(canvas, {
                type: 'line',
                data: {
                    labels:["abril","maio","Junho","Julho","Agosto"],
                    datasets:[{
                            label:"Ultimos envios - 5 meses",
                            data:[10,16,7,17,10],
                            borderWidth:1,
                            borderColor:"#00fffc",
                            backgroundColor:"transparent",
                    },{
                            label:"Ultimos visitas - 5 meses",
                            data:[18,22,10,29,28],
                            borderWidth:1,
                            borderColor:"blue",
                            backgroundColor:"transparent",
                    }]
                },
                options: {
                    
                }
            });
            </script>
        </div>
        <div id="main" role="main">
            
            
        </div>
        <footer>
            
        </footer>
    </body>
</html>
