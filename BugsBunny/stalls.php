<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
    <head>
        <title>Nossas Bancas</title>
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

        <div id="mapid" role="banner" style="margin-top: 80px; height: 260px; width: 100%; background-color: white;">

        </div>
        <link rel="stylesheet" href="./libs/leaflet/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ==" crossorigin="">
        <script src="./libs/leaflet/leaflet.js"></script>

        <script>
            //setando o ponto de visualização de inicio do mapa para as cordenadas barueri
            var mymap = L.map('mapid').setView([-23.512052, -46.881924], 13);
            //passando o parametro accesstoken com o token da minha conta para que o leaflet possa acessar o mapa do mapbox, alem de dar os direitos autoraris merecidos ao pessoal mantenedor do projeto!!
            L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a> ', maxZoom: 18, id: 'mapbox.streets', accessToken: 'pk.eyJ1IjoiZ2lsYmVydG90ZWMiLCJhIjoiY2psMnF0eHNsMXRhODNrbDd5aGF3OXVwbiJ9.JUWwKVV_ZA-xNQFsIuvwQQ'}).addTo(mymap);
            //L.marker([-23.512052, -46.881924]) adicionando um markert no mapa
            var banca1 = L.marker([-23.512839, -46.874156]).addTo(mymap);
            banca1.bindPopup("<h4 id='banca1'>Banca Santa Rica lotes:73/24/90</h4>\n\
                            <p>Estrada Municiapal n°123, centro, Barueri</p>");
            var banca2 = L.marker([-23.502056, -46.86523]).addTo(mymap);
            banca2.bindPopup("<h4 id='banca2'>Banca Monica lotes:70/10/32</h4>\n\
                            <p>Rua Topázio n°21, Aldeia, Barueri</p>");
            var banca3 = L.marker([-23.512052, -46.881924]).addTo(mymap);
            banca3.bindPopup("<h4 id='banca3'>Banca Maria José</h4>\n\
                            <p>Av. Carmine Gragnano n°457, Centro, Jandira</p>");
        </script>
        <div id="main" role="main">
            <a href="#banca1" onclick="mymap.setView([-23.512839, -46.874156], 13);">banca 1</a>
            <a href="#banca2" onclick="mymap.setView([-23.502056, -46.86523], 13);">banca 2</a>
            <a href="#banca3" onclick="mymap.setView([-23.512052, -46.881924], 13);">banca 3</a>
        </div>
        <footer>

        </footer>
    </body>
</html>
