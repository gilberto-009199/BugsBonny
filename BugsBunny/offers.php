<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
    <head>
        <title>Promoções</title>
        <meta name="keywords" content="BugBunnySA, Ofertas, Produtos, Promoções"><!-- Definindo palavras chaves para motores de busca -->
        <meta name="description" content="Pagina referente a matérias sobre os atores nacionais que são capas de revistas ou filmes do mês">
        <meta name="abstract" content="Matérias sobre Famosos">
        <meta	name="revisit-after" content="1 days">
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
            <div class="row">
                <style>
                    div[data-style="BarraPesquisa"]{
                        background: linear-gradient(265deg, rgba(255,255,255,1) 38%, rgba(231,227,227,1) 67%);
                        height: 50px;
                        margin-bottom: 10px;
                    }
                    div[data-style="CaixaPesquisa"]{
                        margin-left: auto;
                        margin-right: auto;
                        width: 1000px;
                        height: auto;
                    }
                </style>
                <div class="row" data-style="BarraPesquisa">
                    <style>
                        i[data-style="MenuPesquisa"] nav {
                            display:none;
                        }
                        i[data-style="MenuPesquisa"]:hover{
                            color:#006D5C;
                        }
                        i[data-style="MenuPesquisa"]:hover>nav{
                            display:block;
                            position: absolute;
                            max-width: 100%;
                            margin-left: -24px;
                            width: 100%;
                            z-index: 999;
                            border-top: solid 2px;
                            box-shadow: 2px 2px 2px black;
                            background-color: white;
                        }
                    </style>
                    <div class="cold3" style="float: left;">
                        <i class="fas fa-align-justify" data-style="MenuPesquisa" style="border-radius: 14px; font-size: 28px; margin-top: 8px; margin-left:20px; padding: 4px; background-color: white;">
                            <nav>
                                <div class="ItemMenuPesquisa"><i class="far fa-file-alt" style="margin-right: 4px;"></i>Revistas</div>
                                <div class="ItemMenuPesquisa"><i class="far fa-newspaper" style="margin-right: 4px;"></i>Jornais</div>
                                <div class="ItemMenuPesquisa"><i class="fas fa-file-alt" style="margin-right: 4px;"></i>Revistas Internacionais</div>
                                <div class="ItemMenuPesquisa"><i class="fas fa-newspaper" style="margin-right: 4px;"></i>Jornais Internacionais</div>
                            </nav>
                        </i>
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
                <script src="libs/Chart.js/Chart.js"></script>
                <div style="height: 300px; width: 860px; margin-left: auto; margin-right: auto;">
                    <canvas id="Grafico" height="300" width="600" style="background-color: white;"></canvas>
                </div>
                <script>
                    var canvas = document.getElementById("Grafico");
                    var myChart = new Chart(canvas, {
                        type: 'line',
                        data: {
                            labels: ["1ºsemana", "2ºsemana", "3ºsemana", "4ºsemana", "5ºsemana", "6ºsemana"],
                            datasets: [{
                                    label: "Revistas Veja",
                                    data: [12, 24, 13, 9, 10, 16],
                                    borderWidth: 2,
                                    borderColor: "#454df0",
                                    backgroundColor: "transparent",
                                }, {
                                    label: "Jornal Folha",
                                    data: [12, 10, 13, 8, 11, 10],
                                    borderWidth: 2,
                                    borderColor: "#00ff94",
                                    backgroundColor: "transparent",
                                }, {
                                    label: "Revista Courrier Internacional",
                                    data: [20, 5, 14, 8, 16, 5],
                                    borderWidth: 2,
                                    borderColor: "#090a09",
                                    backgroundColor: "transparent",
                                }, {
                                    label: "Jornal O globo",
                                    data: [20, 17, 10, 12, 18, 13],
                                    borderWidth: 2,
                                    borderColor: "#03acc6",
                                    backgroundColor: "transparent",
                                }, {
                                    label: "Revista Programar",
                                    data: [10, 10, 18, 9, 11, 10, 2, 10],
                                    borderWidth: 2,
                                    borderColor: "#9800ff",
                                    backgroundColor: "transparent",
                                }]
                        },
                        options: {
                            title: {
                                display: true,
                                text: "Vendidos"
                            }
                        }
                    });
                </script>
            </div>
        </div>
        <div id="main" role="main">
            <div class="row BordaDireita">
                <div class="cold4" data-style="MenuProdutos">
                    <span class="ItemMenuProduto">Revista Veja</span>
                    <span class="ItemMenuProduto">Jornal Folha</span>
                    <span class="ItemMenuProduto">Revista Courrier Internacional</span>
                    <span class="ItemMenuProduto">Revista Veja</span>
                    <span class="ItemMenuProduto">Revista Veja</span>
                    <span class="ItemMenuProduto">Jornal Folha</span>
                    <span class="ItemMenuProduto">Revista Courrier Internacional</span>
                    <span class="ItemMenuProduto">Revista Veja</span>
                    <span class="ItemMenuProduto">Revista Veja</span>
                    <span class="ItemMenuProduto">Jornal Folha</span>
                    <span class="ItemMenuProduto">Revista Courrier Internacional</span>
                    <span class="ItemMenuProduto">Revista Veja</span>
                </div>
                <div class="cold7" data-style="PainelProdutos">
                   <div class="Produto">
                        <div class="Titulo">Titulo</div>
                        <div class="Imagem">
                            <img alt="Imagem de Produto" src="img/assents/user32x32.png">
                        </div>
                        <div class="Descricao">Descrição</div>
                        <div class="Preco">R$ 9,00 por <span class="destaque">R$8,00</span></div>
                        <div class="Detalhes"><a href="#">Detalhes</a></div>
                    </div>
                    <div class="Produto">
                        <div class="Titulo">Titulo</div>
                        <div class="Imagem">
                            <img alt="Imagem de Produto" src="img/assents/user32x32.png">
                        </div>
                        <div class="Descricao">Descrição</div>
                        <div class="Preco">R$ 9,00 por <span class="destaque">R$8,00</span></div>
                        <div class="Detalhes"><a href="#">Detalhes</a></div>
                    </div>
                    <div class="Produto">
                        <div class="Titulo">Titulo</div>
                        <div class="Imagem">
                            <img alt="Imagem de Produto" src="img/assents/user32x32.png">
                        </div>
                        <div class="Descricao">Descrição</div>
                        <div class="Preco">R$ 9,00 por <span class="destaque">R$8,00</span></div>
                        <div class="Detalhes"><a href="#">Detalhes</a></div>
                    </div>
                    <div class="Produto">
                        <div class="Titulo">Titulo</div>
                        <div class="Imagem">
                            <img alt="Imagem de Produto" src="img/assents/user32x32.png">
                        </div>
                        <div class="Descricao">Descrição</div>
                        <div class="Preco">R$ 9,00 por <span class="destaque">R$8,00</span></div>
                        <div class="Detalhes"><a href="#">Detalhes</a></div>
                    </div>
                    <div class="Produto">
                        <div class="Titulo">Titulo</div>
                        <div class="Imagem">
                            <img alt="Imagem de Produto" src="img/assents/user32x32.png">
                        </div>
                        <div class="Descricao">Descrição</div>
                        <div class="Preco">R$ 9,00 por <span class="destaque">R$8,00</span></div>
                        <div class="Detalhes"><a href="#">Detalhes</a></div>
                    </div>
                    <div class="Produto">
                        <div class="Titulo">Titulo</div>
                        <div class="Imagem">
                            <img alt="Imagem de Produto" src="img/assents/user32x32.png">
                        </div>
                        <div class="Descricao">Descrição</div>
                        <div class="Preco">R$ 9,00 por <span class="destaque">R$8,00</span></div>
                        <div class="Detalhes"><a href="#">Detalhes</a></div>
                    </div>
                    <div class="Produto">
                        <div class="Titulo">Titulo</div>
                        <div class="Imagem">
                            <img alt="Imagem de Produto" src="img/assents/user32x32.png">
                        </div>
                        <div class="Descricao">Descrição</div>
                        <div class="Preco">R$ 9,00 por <span class="destaque">R$8,00</span></div>
                        <div class="Detalhes"><a href="#">Detalhes</a></div>
                    </div>
                </div>
            </div>

        </div>
        <footer>
            <p>Copyright© Senai 2018</p>
        </footer>
    </body>
</html>
