<?php require_once './cdn/resorces.php'; ?>
<?php
try {
    if (isset($_GET['btnEnviar'])) {
        $nome = strip_tags($_GET['txtNome']);
        $telefone = strip_tags($_GET['txtTelefone']);
        $celular = strip_tags($_GET['txtCelular']);
        $email = strip_tags($_GET['txtEmail']);
        $website = strip_tags($_GET['txtHomePage']);
        $facebook = strip_tags($_GET['txtFacebook']);
        $critica = strip_tags($_GET['ariaCritica']);
        $produto = strip_tags($_GET['txtProduto']);
        $sexo = strip_tags($_GET['slcSexo']);
        $profissao = strip_tags($_GET['slcProfissao']);
        $tipo = strip_tags($_GET['txtTipo']);
        $dataCriacao = date('Y-m-d H:i:s');

        $frmChamado['nome'] = $nome;
        $frmChamado['telefone'] = $telefone;
        $frmChamado['celular'] = $celular;
        $frmChamado['email'] = $email;
        $frmChamado['website'] = $website;
        $frmChamado['facebook'] = $facebook;
        $frmChamado['critica'] = $critica;
        $frmChamado['produto'] = $produto;
        $frmChamado['sexo'] = $sexo;
        $frmChamado['profissao'] = $profissao;
        $frmChamado['dataCriacao'] = $dataCriacao;
        $frmChamado['tipo'] = $tipo;
        $frmChamado = (object) $frmChamado;

        if(gravarPedido($frmChamado)) {
            // area para importar o dialog de success
        }else{
            // area para importar o dialog de error
        }
    }
} catch (Exception $e) {
    
}
?>
<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
    <head>
        <title>Fale Conosco</title>
        <meta name="keywords" content="BugBunnySA, telefone, e-mail, contato,informações"><!-- Definindo palavras chaves para motores de busca -->
        <meta name="description" content="Pagina contendo as informações para contato com a BugBunny empresa">
        <meta name="abstract" content="Contatos da BugBunny">
        <meta	name="revisit-after" content="6 month">
        <link rel="stylesheet" href="./fonts/awesome/all.css">
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
            <script src="libs/Chart.js/Chart.js"></script>
            <canvas id="Grafico" height="300" width="1000">

            </canvas>
            <script>
    var canvas = document.getElementById("Grafico");
    var myChart = new Chart(canvas, {
        type: 'line',
        data: {
            labels: ["janeiro", "fevereiro", "março", "abril", "maio", "Junho", "Julho", "Agosto"],
            datasets: [{
                    label: "Ultimos envios - 5 meses",
                    data: [12, 24, 13, 9, 10, 16, 7, 17],
                    borderWidth: 7,
                    borderColor: "#454df0",
                    backgroundColor: "transparent",
                }, {
                    label: "Atentimentos - 5 meses",
                    data: [12, 10, 13, 8, 11, 10, 2, 15],
                    borderWidth: 7,
                    borderColor: "#006D5C",
                    backgroundColor: "#00ffeb",
                }]
        },
        options: {
            title: {
                display: true,
                text: "Chamados"
            }
        }
    });
            </script>
        </div>
        <div id="main" role="main">
            <div class="row">
                <div data-style="CaixaDireita" class="cold8 BordaDireita">
                    <form name="frmTiket" method="GET">
                        <table>
                            <tr>
                                <td><label  class="Obrigatorio" for="txtNome">Nome:*</label></td>
                                <td> <input id="txtNome" type="text" pattern="[a-z A-Z ã ç á é í õ ó ê è ì Ç Ã Õ Á É Ó À È Ò Ù ú ù]*" name="txtNome" value="" required/> </td>
                            </tr>
                            <tr>
                                <td><label  for="txtTelefone">Telefone:</label></td>
                                <td> <input id="txtTelefone" pattern="^(\((1[1-9]|2[12478]|3[1234578]|4[1-9]|5[1345]|6[1-9]|7[134579]|8[1-9]|9[1-9])\)([0-9]{4}[-][0-9]{4}))+$" type="text" name="txtTelefone" value="" /> </td>
                            </tr>
                            <tr>
                                <td> <label class="Obrigatorio" for="txtCelular"> Celular:*</label> </td>
                                <td> <input id="txtCelular" type="text" name="txtCelular" value="" required/> </td>
                            </tr>
                            <tr>
                                <td><label  class="Obrigatorio" for="txtEmail">E-mail:*</label></td>
                                <td> <input id="txtEmail" type="text" name="txtEmail" value="" required/> </td>
                            </tr>
                            <tr>
                                <td><label for="txtHomePage">Home Page:</label></td>
                                <td> <input id="txtHomePage" type="text" name="txtHomePage" value="" /> </td>
                            </tr>
                            <tr>
                                <td><label for="txtFcebook"> Link no Facebook:</label></td>
                                <td> <input id="txtFcebook" type="text" name="txtFacebook" value="" /> </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <table>
                                        <tr>
                                            <td><label for="areaCritica">Sugestão/Critica</label></td>
                                        </tr>
                                        <tr>
                                            <td> 
                                                <textarea id="areaCritica" name="ariaCritica" rows="4" cols="20"></textarea>
                                            </td>
                                        </tr>
                                    </table>
                                </td>                               
                            </tr>
                            <tr>
                                <td><label for="txtProduto">Informações de Produto </label></td>
                                <td> <input id="txtProduto" type="text" name="txtProduto" value="" /> </td>
                            </tr>
                            <tr>
                                <td><label class="Obrigatorio" for="slcSexo">Sexo:*</label></td>
                                <td>
                                    <select id="slcSexo" name="slcSexo" required>
                                        <option value="" selected>Sexo</option>
                                        <option value="M">M</option>
                                        <option value="F">F</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label class="Obrigatorio" for="slcProfissao">Profissão:*</label></td>
                                <td>
                                    <select id="slcProfissao" name="slcProfissao" required>
                                        <option value="" selected>Profissão</option>
                                        <?php
                                        $ListaProfissoes = getProfissoes(conect());
                                        for ($i = 1; $i < count($ListaProfissoes); $i++) {
                                            ?>
                                            <option value="<?= $ListaProfissoes[$i]->id ?>"><?= $ListaProfissoes[$i]->profissao ?></option>
                                        <?php } ?>

                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="text" name="txtTipo" style=" display:none; " value="1">
                                    <input class="btn" id="btnSubmit" name="btnEnviar" type="submit" value="Enviar" />
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
                <div data-style="CaixaEsquerda">
                    Tipos de Tickets
                    <?php
                    $ListaTickets = getTickets(conect());
                    for ($i = 1; $i < count($ListaTickets); $i++) {
                        ?>
                        <span class="ItemTicket" data-id="<?= $ListaTickets[$i]->id ?>"><?= $ListaTickets[$i]->tipo ?></span>
                    <?php } ?>
                </div>
            </div>            
        </div>
        <footer>
            <p>Copyright© Senai 2018</p>
        </footer>
        <script>
            $(function () {
                $("#main").slideUp(1).slideDown(2500);
            });
        </script>
    </body>
</html>
