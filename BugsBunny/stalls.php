	<!DOCTYPE html>
	<html lang="pt-br" dir="ltr">
		<head>
			<title>Nossas Bancas</title>
			<meta name="keywords" content="BugBunnySA, Bancas, Franquias, Localização, Telefone, Endereço"><!-- Definindo palavras chaves para motores de busca -->
			<meta name="description" content="Pagina referente as Franguias(bancas) da empresa BugBunny">
			<meta name="abstract" content="Franquias e seus endereços e telefones">
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

			<div id="mapa" role="banner" style="margin-top: 80px; height: 300px; width: 100%; background-image:url(./img/mapa.png);">

			</div>
			<link rel="stylesheet" href="./libs/leaflet/leaflet.css">
			<script src="./libs/leaflet/leaflet.js"></script>

			<script>
				//setando o ponto de visualização de inicio do mapa para as cordenadas barueri
				var map = L.map('mapa').setView([-23.512052, -46.881924], 13);
				//passando o parametro accesstoken com o token da minha conta para que o leaflet possa acessar o mapa do mapbox, alem de dar os direitos autoraris merecidos ao pessoal mantenedor do projeto!!
				L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}',
				{attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a> ',
					maxZoom: 18,/* mandando o zom padram como parametro*/
					id: 'mapbox.streets-satellite',/* Passado como parametro ao mapbox.com  o tipo de mapa que nos queremos
											https://www.mapbox.com/api-documentation/#maps   */
					accessToken: 'pk.eyJ1IjoiZ2lsYmVydG90ZWMiLCJhIjoiY2psMnF0eHNsMXRhODNrbDd5aGF3OXVwbiJ9.JUWwKVV_ZA-xNQFsIuvwQQ'}).addTo(map);
				//L.marker([-23.512052, -46.881924]) adicionando um markert no mapa
				var banca1 = L.marker([-23.512839, -46.874156]).addTo(map);
				banca1.bindPopup("<h4 id='banca1'>Banca Santa Rica lotes:73/24/90</h4>\n\
								<p>Estrada Municiapal n°123, centro, Barueri</p>");
				var banca2 = L.marker([-23.502056, -46.86523]).addTo(map);
				banca2.bindPopup("<h4 id='banca2'>Banca Monica lotes:70/10/32</h4>\n\
								<p>Rua Topázio n°21, Aldeia, Barueri</p>");
				var banca3 = L.marker([-23.529327, -46.901504]).addTo(map);
				banca3.bindPopup("<h4 id='banca3'>Banca Maria José</h4>\n\
								<p>Av. Carmine Gragnano n°457, Centro, Jandira</p>");
				var banca4 = L.marker([-23.5267, -46.895324]).addTo(map);
				banca4.bindPopup("<h4 id='banca4'>Banca Eduardo 51 </h4>\n\
								<p>Av. Carmine Gragnano n°29, Centro, Jandira</p>");
				var banca5 = L.marker([-23.534747, -46.88319]).addTo(map);
				banca4.bindPopup("<h4 id='banca4'>Banca Rei João </h4>\n\
								<p>Via TUPI n°11, Jd. Silveira, Barueri</p>");
				
			</script>
			<div id="main" role="main">
				<!--    Enviando o visor do mapa para uma posição especifica com 14 de zoom    -->
				<!--<a href="#banca1" onclick="map.setView([-23.512839, -46.874156], 14);">banca 1</a>
				<a href="#banca2" onclick="map.setView([-23.502056, -46.86523], 14);">banca 2</a>
				<a href="#banca3" onclick="map.setView([-23.512052, -46.881924], 14);">banca 3</a>-->
				<div class="row">
					<div class="cold3" style="overflow-y: scroll;  float:left; padding-top:10px; background: linear-gradient(197deg, rgba(255,255,255,1) 25%, rgba(228,228,246,1) 68%); height:490px;" role="navigation" title="Menu da Pagina">
						<style>
							.ItemMenuBanca{
								background: linear-gradient(360deg, rgba(227,227,227,1) 38%, rgba(255,255,255,1) 67%);
                                display: block;
                                width: 100%;
								text-align:center;
								font-weight: bold;
                                font-size: 22px;
							}
                            .ItemMenuBanca:hover{
                                color:#006D5C;
                            }
						</style>
						<span class="ItemMenuBanca" role="menuitem"> Banca de Santo Amaro</span>
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
						<span class="ItemMenuBanca" role="menuitem"> Banca de Monte Castelo Centro</span>
					</div>
					<div class="cold8" style="background: linear-gradient(141deg, rgba(255,255,255,1) 90%, rgba(0,0,255,1) 93%); height:500px;">
					    <section>
                            <h2>Bancas</h2>
                            <article>
                                <h3>Nome da banca </h3>
                                <p>Dono da banca: João da Cunha</p>
                                <p>Endereço: Rua XXXXXX N°XXXX, Bairro: XXXX, Cidade:XXX,UF:XX</p>
                            </article>  
                                <p>Descrição: Uma descrição da banca </p>
                                <p>Horario:9h ate 18h</p>
                        </section>
					</div>
				</div>
			</div>
			<footer>
                <p>Copyright© Senai 2018</p>
			</footer>
		</body>
	</html>
