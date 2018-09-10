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

    $bancas = getBancas(conect());
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
            var map = L.map('mapa').setView([-23.531884, -46.792231], 13);
            //passando o parametro accesstoken com o token da minha conta para que o leaflet possa acessar o mapa do mapbox, alem de dar os direitos autoraris merecidos ao pessoal mantenedor do projeto!!
            L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}',
                    {attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a> ',
                        maxZoom: 18, /* mandando o zom padrão como parametro*/
                        id: 'mapbox.streets-satellite', /* Passado como parametro ao mapbox.com  o tipo de mapa que nos queremos
                         https://www.mapbox.com/api-documentation/#maps   */
                        accessToken: 'pk.eyJ1IjoiZ2lsYmVydG90ZWMiLCJhIjoiY2psMnF0eHNsMXRhODNrbDd5aGF3OXVwbiJ9.JUWwKVV_ZA-xNQFsIuvwQQ'}).addTo(map);
            //L.marker([-23.512052, -46.881924]) adicionando um markert no mapa
<?php for ($i = 1; $i < count($bancas); $i++) { ?>
                var bancatmp<?= $i ?> = L.marker([<?= $bancas[$i]->location ?>]).addTo(map);
                bancatmp<?= $i ?>.bindPopup("<?= "<h3>" . $bancas[$i]->nome . "</h3>" . $bancas[$i]->logradouro . " " . $bancas[$i]->bairro . " " . $bancas[$i]->cidade . " " . $bancas[$i]->uf ?>");
<?php } ?>
        </script>
        <div id="main" role="main" class="arredonda">
            <!--    Enviando o visor do mapa para uma posição especifica com 14 de zoom    -->
            <!--<a href="#banca1" onclick="map.setView([-23.512839, -46.874156], 14);">banca 1</a>
            <a href="#banca2" onclick="map.setView([-23.502056, -46.86523], 14);">banca 2</a>
            <a href="#banca3" onclick="map.setView([-23.512052, -46.881924], 14);">banca 3</a>-->
            <div class="row">
                <div class="cold3 arredonda" role="menu" data-style="CaixaBancas" title="Menu da Pagina">
                    <?php for ($i = 1; $i < count($bancas); $i++) { ?>
                        <span class="ItemMenuBanca" role="menuitem"><a href="#banca<?= $bancas[$i]->id ?>"><?= $bancas[$i]->nome ?></a></span>
                    <?php } ?>
                    <!--<span class="ItemMenuBanca" role="menuitem"> Banca de Santo Amaro</span>
                    <span class="ItemMenuBanca" role="menuitem"> Banca de Santana</span>
                    <span class="ItemMenuBanca" role="menuitem"> Banca de Barueri Aldeia</span>
                    <span class="ItemMenuBanca" role="menuitem"> Banca de Osasco Vila dos Remédios</span>
                    <span class="ItemMenuBanca" role="menuitem"> Banca de Osasco Centro</span>
                    <span class="ItemMenuBanca" role="menuitem"> Banca de São Paulo Jd. Itaquerá</span>
                    <span class="ItemMenuBanca" role="menuitem"> Banca de São Paulo Anhangüera</span>
                    <span class="ItemMenuBanca" role="menuitem"> Banca de São Paulo Aclimação </span>
                    <span class="ItemMenuBanca" role="menuitem"> Banca de Osaco Continental</span>
                    <span class="ItemMenuBanca" role="menuitem"> Banca de Barueri Alphaville Industrial</span>
                    <span class="ItemMenuBanca" role="menuitem"> Banca de Barueri Chácaras Marco</span>
                    <span class="ItemMenuBanca" role="menuitem"> Banca de Monte Castelo Centro</span>-->
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
                            <button class="Direita" onclick="map.setView([<?= $bancas[$i]->location ?>], 14);">Ver no mapa</button>
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
            });
        </script>
    </body>
</html>
