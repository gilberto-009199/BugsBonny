<?php require_once './cdn/resorces.php'; ?>
<?php require_once './libs/libsphp/BBcode/bbcode.php'; ?>
<?php
/**
* @author Gilberto Ramos de O. <gilberto.tec@vivaldi.net>
* @version 1.0 
* @copyright  unlicense <http://unlicense.org/>
*/ 
try{
    $con = conect();
    $ofertas= getOfertas($con);
}catch(Exception $e){

}
?>
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
            <div class="CaixaRedesSociais">
                <i class="fab fa-twitter"></i>
                <i class="fab fa-instagram"></i>
                <i class="fab fa-facebook-f"></i>
            </div>
            <div class="row">
                <div class="row" data-style="BarraPesquisa">
                    <div class="cold3 Esquerda">
                        <nav data-style="MenuPesquisa">
                            <i class="fas fa-align-justify"></i>
                            <div data-style="SubMenu">
                                <div class="ItemMenuPesquisa"><i class="fas fa-balance-scale" data-style="margenIcone"></i>Política</div>
                                <div class="ItemMenuPesquisa"><i class="far fa-money-bill-alt" data-style="margenIcone"></i>Economia</div>
                                <div class="ItemMenuPesquisa"><i class="fas fa-globe" data-style="margenIcone"></i>Internacional</div>
                                <div class="ItemMenuPesquisa"><i class="fas fa-cogs" data-style="margenIcone"></i>Tecnologia</div>
                                <div class="ItemMenuPesquisa"><i class="fas fa-dove" data-style="margenIcone"></i>Segurança</div>
                            </div>
                        </nav>
                        
                        
                        <!--<i class="fas fa-align-justify" data-style="MenuPesquisa">
                            <nav>
                                <div class="ItemMenuPesquisa"><i class="far fa-file-alt"></i>Revistas</div>
                                <div class="ItemMenuPesquisa"><i class="far fa-newspaper"></i>Jornais</div>
                                <div class="ItemMenuPesquisa"><i class="fas fa-file-alt"></i>Revistas Internacionais</div>
                                <div class="ItemMenuPesquisa"><i class="fas fa-newspaper"></i>Jornais Internacionais</div>
                            </nav>
                        </i>-->
                    </div>
                    <div data-style="CaixaPesquisa">
                        <div class="cold8 Direita" >
                            <div class="row">
                                <div class="cold7 Direita">
                                    <div class="row">
                                        <form role="search" class="Direita" >
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
                <div data-style="CaixaGrafico">
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
        <div id="main" role="main" class="arredonda">
            <div class="row BordaDireita">
                <div class="cold4" data-style="MenuProdutos">
                    <span class="ItemMenuProduto">Revista Veja</span>
                    <span class="ItemMenuProduto">Jornal Folha</span>
                    <span class="ItemMenuProduto">Revista Courrier Internacional</span>
                    <span class="ItemMenuProduto">Revista Veja</span>
                    <span class="ItemMenuProduto">Revista O Clarim</span>
                    <span class="ItemMenuProduto">Jornal São Paulo</span>
                    <span class="ItemMenuProduto">Revista REST</span>
                    <span class="ItemMenuProduto">Revista DELL</span>
                    <span class="ItemMenuProduto">Revista SAMSUNG</span>
                    <span class="ItemMenuProduto">Jornal Mirax</span>
                    <span class="ItemMenuProduto">Revista DOLBY</span>
                    <span class="ItemMenuProduto">Revista CISCO</span>
                    <span class="ItemMenuProduto">Revista Hawuei</span>
                    <span class="ItemMenuProduto">Revista Cloud HPC</span>
                </div>
                <div class="cold7 arredonda" data-style="PainelProdutos">
                    <?php for($i=1;$i < count($ofertas);$i++){?>
                        <div class="Produto">
                                <div class="Titulo"><?=@$ofertas[$i]->titulo?></div>
                                <div class="Imagem">
                                    <img alt="Imagem de Produto" width='80px' height='100' src="./imgup/<?=@$ofertas[$i]->img?>">
                                </div>
                                <div class="Descricao"><?=@$ofertas[$i]->descricao?></div>
                                <div class="Preco"><span class="riscado">R$<?=@$ofertas[$i]->vlAnterior?></span> por <span class="destaque">R$ <?=@$ofertas[$i]->vlPosterior?></span></div>
                                <div class="Detalhes"><a href="#">Detalhes</a></div>
                          </div>         
                    <?php } ?>
                    <div class="Produto">
                        <div class="Titulo">Titulo</div>
                        <div class="Imagem">
                            <img alt="Imagem de Produto" src="img/assents/user32x32.png">
                        </div>
                        <div class="Descricao">Descrição</div>
                        <div class="Preco"><span class="riscado">R$ 9,00</span> por <span class="destaque">R$8,00</span></div>
                        <div class="Detalhes"><a href="#">Detalhes</a></div>
                    </div>
                    <div class="Produto">
                        <div class="Titulo">Titulo</div>
                        <div class="Imagem">
                            <img alt="Imagem de Produto" src="img/assents/user32x32.png">
                        </div>
                        <div class="Descricao">Descrição</div>
                        <div class="Preco"><span class="riscado">R$ 9,00</span> por <span class="destaque">R$8,00</span></div>
                        <div class="Detalhes"><a href="#">Detalhes</a></div>
                    </div>
                    <div class="Produto">
                        <div class="Titulo">Titulo</div>
                        <div class="Imagem">
                            <img alt="Imagem de Produto" src="img/assents/user32x32.png">
                        </div>
                        <div class="Descricao">Descrição</div>
                        <div class="Preco"><span class="riscado">R$ 9,00</span> por <span class="destaque">R$8,00</span></div>
                        <div class="Detalhes"><a href="#">Detalhes</a></div>
                    </div>
                    <div class="Produto">
                        <div class="Titulo">Titulo</div>
                        <div class="Imagem">
                            <img alt="Imagem de Produto" src="img/assents/user32x32.png">
                        </div>
                        <div class="Descricao">Descrição</div>
                        <div class="Preco"><span class="riscado">R$ 9,00</span> por <span class="destaque">R$8,00</span></div>
                        <div class="Detalhes"><a href="#">Detalhes</a></div>
                    </div>
                    <div class="Produto">
                        <div class="Titulo">Titulo</div>
                        <div class="Imagem">
                            <img alt="Imagem de Produto" src="img/assents/user32x32.png">
                        </div>
                        <div class="Descricao">Descrição</div>
                        <div class="Preco"><span class="riscado">R$ 9,00</span> por <span class="destaque">R$8,00</span></div>
                        <div class="Detalhes"><a href="#">Detalhes</a></div>
                    </div>
                    <div class="Produto">
                        <div class="Titulo">Titulo</div>
                        <div class="Imagem">
                            <img alt="Imagem de Produto" src="img/assents/user32x32.png">
                        </div>
                        <div class="Descricao">Descrição</div>
                        <div class="Preco"><span class="riscado">R$ 9,00</span> por <span class="destaque">R$8,00</span></div>
                        <div class="Detalhes"><a href="#">Detalhes</a></div>
                    </div>
                    <div class="Produto">
                        <div class="Titulo">Titulo</div>
                        <div class="Imagem">
                            <img alt="Imagem de Produto" src="img/assents/user32x32.png">
                        </div>
                        <div class="Descricao">Descrição</div>
                        <div class="Preco"><span class="riscado">R$ 9,00</span> por <span class="destaque">R$8,00</span></div>
                        <div class="Detalhes"><a href="#">Detalhes</a></div>
                    </div>
                    <div class="Produto">
                        <div class="Titulo">Titulo</div>
                        <div class="Imagem">
                            <img alt="Imagem de Produto" src="img/assents/user32x32.png">
                        </div>
                        <div class="Descricao">Descrição</div>
                        <div class="Preco"><span class="riscado">R$ 9,00</span> por <span class="destaque">R$8,00</span></div>
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
