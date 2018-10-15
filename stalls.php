<?php require_once './cdn/resorces.php'; ?>
<?php require_once './libs/libsphp/BBcode/bbcode.php'; ?>
<?php
/**
 * @author Gilberto Ramos de O. <gilberto.tec@vivaldi.net>
 * @version 1.0 
 * @copyright  unlicense <http://unlicense.org/>
 */
?>
<?php
try {
     $con = conect();
    $bancas = getBancas($con);
} catch (Exception $e) {
    $msgAlertaErro = " Erro Catastrofico no Sistema!!!" . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
    <head>
        <title>Nossas Bancas</title>
        <meta name="keywords" content="BugBunnySA, Bancas, Franquias, Localização, Telefone, Endereço"><!-- Definindo palavras chaves para motores de busca -->
        <meta name="description" content="Pagina referente as Franguias(bancas) da empresa BugBunny">
        <meta name="abstract" content="Franquias e seus endereços e telefones">
        <link rel="stylesheet" href="./fonts/awesome/all.css">
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

        <div id="mapa" role="banner">
            <div class="CaixaRedesSociais">
                <i class="fab fa-twitter"></i>
                <i class="fab fa-instagram"></i>
                <i class="fab fa-facebook-f"></i>
            </div>

        </div>
        <link rel="stylesheet" href="./libs/leaflet/leaflet.css">
        <script src="./libs/leaflet/leaflet.js"></script>
        <script>
            //setando o ponto de visualização de inicio do mapa para as cordenadas barueri
            var map = L.map('mapa').setView([-23.53755, -46.802616], 13);
            //passando o parametro accesstoken com o token da minha conta para que o leaflet possa acessar o mapa do mapbox, alem de dar os direitos autoraris merecidos ao pessoal mantenedor do projeto!!
            L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}',
                    {attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a> ',
                        maxZoom: 18, /* mandando o zom padrão como parametro*/
                        id: 'mapbox.streets-satellite', /* Passado como parametro ao mapbox.com  o tipo de mapa que nos queremos
                         https://www.mapbox.com/api-documentation/#maps   */
                        accessToken: 'pk.eyJ1IjoiZ2lsYmVydG90ZWMiLCJhIjoiY2psMnF0eHNsMXRhODNrbDd5aGF3OXVwbiJ9.JUWwKVV_ZA-xNQFsIuvwQQ'}).addTo(map);


<?php for ($i = 1; $i < count($bancas); $i++) { ?>
                var bancatmp<?= $bancas[$i]->id ?> = L.marker([<?= $bancas[$i]->location ?>]).addTo(map);
                bancatmp<?= $bancas[$i]->id ?>.bindPopup("<?= "<h3>" . $bancas[$i]->nome . "</h3>" . $bancas[$i]->logradouro . ", " . $bancas[$i]->bairro . ", " . $bancas[$i]->cidade . ", " . $bancas[$i]->uf ?>");
<?php } ?>
        </script>
        <div id="main" role="main" class="arredonda">
            <div class="row">
                <div class="cold3 arredonda" role="menu" data-style="CaixaBancas" title="Menu da Pagina">
                    <?php for ($i = 1; $i < count($bancas); $i++) { ?>
                        <span class="ItemMenuBanca" role="menuitem"><a href="#banca<?= $bancas[$i]->id ?>"><?= $bancas[$i]->nome ?></a></span>
                    <?php } ?>

                </div>
                <div class="cold8 arredonda" data-style="CaixaBancasSelect">
                    <section>
                        <h2>Bancas:</h2>
                        <?php for ($i = 1; $i < count($bancas); $i++) { ?>
                            <article id="banca<?= $bancas[$i]->id ?>">
                                <h2>Banca: <?= $bancas[$i]->nome ?></h2>
                                <p>Dono da banca: <?= $bancas[$i]->dono ?>, Horario:<?= $bancas[$i]->horario ?></p>
                                <p>Endereço: <a href="#mapa" onclick="map.setView([<?= $bancas[$i]->location ?>], 14);"><?= $bancas[$i]->logradouro . " " . $bancas[$i]->bairro . " " . $bancas[$i]->cidade . " " . $bancas[$i]->uf ?></a></p>
                            </article>
                            <button class="Direita" style="padding-left:5px; padding-right:5px;" onclick="map.setView([<?= $bancas[$i]->location ?>], 14);
                                        location.href = '#mapa';
                                        bancatmp<?= $bancas[$i]->id ?>.openPopup();">Ver no mapa</button>
                            <p>Descrição:</p>
                            <div data-style="DescricaoBancas">
                                <?= BBcode($bancas[$i]->descrisao) ?>
                            </div>
                        <?php } ?>
                    </section>
                </div>
            </div>
        </div>
        <footer>
            <p>Copyright© Senai 2018</p>
        </footer>
        <?php
        if (isset($msgAlertaErro)) {
            include './elements/Alerta.php';
        }
        ?>
        <script>
            $(function () {
                $("#main").slideUp(1).slideDown(2500);
                var $doc = $('html, body');
                $('a').click(function () {
                    $doc.animate({
                        scrollTop: $($.attr(this, 'href')).offset().top
                    }, 500);
                    return false;
                });
                var GeoSuccess = function (position) {//fução obscura que executa após  usuario aceitar
                    map.setView([position.coords.latitude, position.coords.longitude], 13);//seta a localização do usuario atual
                    var IconLocation = L.icon({
                        iconUrl: './img/assents/gps_icon.png',
                        shadowUrl: '',
                        iconSize: [26, 26], // size of the icon
                        shadowSize: [0, 0], // size of the shadow
                        iconAnchor: [0, 0], // point of the icon which will correspond to marker's location
                        shadowAnchor: [0, 0], // the same for the shadow
                        popupAnchor: [10, 0] // point from which the popup should open relative to the iconAnchor
                    });
                    var markettmp = L.marker([position.coords.latitude, position.coords.longitude], {icon: IconLocation}).addTo(map);
                    markettmp.bindPopup('Localização');
                };
                var GeoError = function (error) {//fução obscura que executa se o usuario rejeitar algun erro
                    if (error.code == 0 && error.code == 2) {
                        alert('Erro na ao capturar Localização!!');
                    }
                    map.setView([-23.53755, -46.802616], 13);//seta a localização padrão no mapa 
                };
                //passando as funções 
                navigator.geolocation.getCurrentPosition(GeoSuccess, GeoError);
            });
        </script>
    </body>
</html>
