<?php require_once './cdn/resorces.php'; ?>
<?php
/**
* @author Gilberto Ramos de O. <gilberto.tec@vivaldi.net>
* @version 1.0 
* @copyright  unlicense <http://unlicense.org/>
*/ 
?>
<?php
try {
    if (isset($_GET['btnEnviar'])) {// Verifica se o formulario foi submetido
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
        //Valida os Dados caso o usuario esteja usando um browser que não limita campos ou erros Incomuns
        $ValidaTamanho = strlen($nome) <= 100 && strlen($critica) <= 1024 && strlen($telefone) <= 16 && strlen($celular) <= 17 && strlen($email) <= 100 && strlen($website) <= 256 && strlen($facebook) <= 126 && strlen($produto) <= 128;
        //Valida os Dados caso o usuario esteja usando um browser sem patterns
        $ValidaDados = preg_match('/[a-z A-Z ã ç á é í õ ó ê è ì Ç Ã Õ Á É Ó À È Ò Ù ú ù]*/', $nome) && preg_match('/^(|\((1[1-9]|2[12478]|3[1234578]|4[1-9]|5[1345]|6[1-9]|7[134579]|8[1-9]|9[1-9])\)([0-9]{4}[-][0-9]{4}))+$/', $telefone) && preg_match('/^(\((1[1-9]|2[12478]|3[1234578]|4[1-9]|5[1345]|6[1-9]|7[134579]|8[1-9]|9[1-9])\)(9[0-9]{4}[-][0-9]{4}))+$/', $celular) && preg_match('/^([a-z._\-0-9áéíóúàèìòùâêîôûãẽĩõũç]*@+([a-z0-9]+.+[a-z0-9])*)+$/', $email) && (trim($website) == "" || preg_match('/^((http://|https://|)([a-z]*)(.[a-z]+)(/|))+$/', $website)) && (trim($facebook) == "" || preg_match('/^((([a-z]{2}.|)facebook.com([.][a-z]*|))/([a-z A-Z 0-9. ã ç á é í õ ô ó ê è ì Ç Ã Õ Á É Ó À È Ò Ù ú ù]*))+$/', $facebook)) && preg_match('/^[0-9]+$/', $tipo) && preg_match('/^[0-9]+$/', $profissao);
        //if(preg_match('/[a-z A-Z ã ç á é í õ ó ê è ì Ç Ã Õ Á É Ó À È Ò Ù ú ù]*/', $nome) )echo"Ok Nome: $nome <br/>"; else echo ' ERRO NOME ';
        //if(preg_match('/^(|\((1[1-9]|2[12478]|3[1234578]|4[1-9]|5[1345]|6[1-9]|7[134579]|8[1-9]|9[1-9])\)([0-9]{4}[-][0-9]{4}))+$/', $telefone))echo"Ok Telefone: $telefone<br/>"; else echo ' ERRO no Telefone';
        //if(preg_match('/^(\((1[1-9]|2[12478]|3[1234578]|4[1-9]|5[1345]|6[1-9]|7[134579]|8[1-9]|9[1-9])\)(9[0-9]{4}[-][0-9]{4}))+$/',$celular))echo"Ok Celular: $celular <br/>"; else echo ' ERRO no Celular';
        //if(preg_match('/^([a-z._\-0-9áéíóúàèìòùâêîôûãẽĩõũç]*@+([a-z0-9]+.+[a-z0-9])*)+$/', $email))echo"Ok E-mail: $email <br/>"; else echo ' ERRO no E-mail';
        //if(trim($website)=="" || preg_match('/^((http://|https://|)([a-z]*)(.[a-z]+)(/|))+$/',$website) )echo"Ok HomePage: $website <br/>"; else echo ' ERRO no Website';
        //if(trim($facebook)=="" || preg_match('/^((([a-z]{2}.|)facebook.com([.][a-z]*|))/([a-z A-Z 0-9. ã ç á é í õ ô ó ê è ì Ç Ã Õ Á É Ó À È Ò Ù ú ù]*))+$/',$facebook))echo"Ok Facebook: $facebook <br/>"; else echo ' ERRO no Facebook';
        if ($ValidaTamanho && $ValidaDados) { //Inicia o Processo de gravação do formulario caso o formulario seja formado corretamente 
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
            $frmChamado = (object) $frmChamado; //tranforma a array em uM oBJECT ATRAVES DO CASH

            if (gravarPedido($frmChamado)) {
                // area para importar o dialog de success
                $msgAlertaSucess = "<p>Sucesso!! Ticket inserido com sucesso.</p>";
                //Limpando espacos de memoria não mais necessarios
                unset($nome);
                unset($email);
                unset($celular);
                unset($critica);
                unset($website);
                unset($facebook);
                unset($produto);
                unset($telefone);
            }else{
                //area para importar o dialog de falha ao gravar no banco
                $msgAlertaErro = "Erro ao gravar Tickets!Por favor verifique se nenhum campo teve OverFlouw(estourou)";
            }
        }else{
            //area para importar o dialog de falha ao gerar o formulario
            $msgAlertaErro = "Erro ao gerar Ticket!Por favor verifique se o dados estão corretos!";
        }
    }
} catch (Exception $e) {
    //area para importar o dialog de falha
    $msgAlertaErro = " Erro Catastrofico no Sistema!!!" . $e->getMessage();
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
        <script src="./libs/jqueryMask/jquery.mask.js"></script>
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
                    <form name="frmTiket" method="GET" aria-labelledby="infofrm">
                        <div aria-hidden="true" id="infofrm" class="hidden">
                            formulario de contato, formulario para designado para Consulta
                        </div>
                        <div aria-live="polite" aria-relevant="all" id="tipoFrm">Consulta</div>
                        <table>
                            <tr>
                                <td><label  class="Obrigatorio" for="txtNome">Nome:*</label></td>
                                <td> <input id="txtNome" maxlength="100" type="text" pattern="[a-z A-Z ã ç á é í õ ó ê è ì Ç Ã Õ Á É Ó À È Ò Ù ú ù]*" name="txtNome" value="<?=@$nome?>" required/> </td>
                            </tr>
                            <tr>
                                <td><label  for="txtTelefone">Telefone:</label></td>
                                <td> <input id="txtTelefone" maxlength="13" placeholder="(11)2930-9683" pattern="^(\((1[1-9]|2[12478]|3[1234578]|4[1-9]|5[1345]|6[1-9]|7[134579]|8[1-9]|9[1-9])\)([0-9]{4}[-][0-9]{4}))+$" type="text" name="txtTelefone" value="<?=@$telefone?>" /> </td>
                            </tr>
                            <tr>
                                <td> <label class="Obrigatorio" for="txtCelular"> Celular:*</label> </td>
                                <td> <input id="txtCelular" maxlength="14" placeholder="(11)92930-9683" pattern="^(\((1[1-9]|2[12478]|3[1234578]|4[1-9]|5[1345]|6[1-9]|7[134579]|8[1-9]|9[1-9])\)(9[0-9]{4}[-][0-9]{4}))+$" type="text" name="txtCelular" value="<?=@$celular?>" required/> </td>
                            </tr>
                            <tr>
                                <td><label  class="Obrigatorio" for="txtEmail">E-mail:*</label></td>
                                <td> <input id="txtEmail" maxlength="100" type="email" name="txtEmail" value="<?=@$email?>" required/> </td>
                            </tr>
                            <tr>
                                <td><label for="txtHomePage">Home Page:</label></td>
                                <td> <input id="txtHomePage" maxlength="100" type="url" name="txtHomePage" value="<?=@$website?>" /> </td>
                            </tr>
                            <tr>
                                <td><label for="txtFcebook"> Link no Facebook:</label></td>
                                <td> <input id="txtFcebook" maxlength="100" pattern="^((([a-z]{2}.|)facebook.com([.][a-z]*|))/([a-z A-Z 0-9. ã ç á é í õ ô ó ê è ì Ç Ã Õ Á É Ó À È Ò Ù ú ù]*))+$" type="text" name="txtFacebook" value="<?=@$facebook?>" /> </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <table>
                                        <tr>
                                            <td><label for="areaCritica">Sugestão/Critica:</label></td>
                                        </tr>
                                        <tr>
                                            <td> 
                                                <textarea id="areaCritica" name="ariaCritica" rows="6" ><?=@$critica?></textarea>
                                            </td>
                                        </tr>
                                    </table>
                                </td>                               
                            </tr>
                            <tr>
                                <td><label for="txtProduto">Informações de Produto </label></td>
                                <td> <input id="txtProduto" type="text" name="txtProduto" value="<?=@$produto?>" /> </td>
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
                                    <input class="hidden" type="text" aria-hidden="true" id="txtTipoForm" name="txtTipo" value="1">
                                    <button class="btn" id="btnSubmit" name="btnEnviar" type="submit"><i class="far fa-share-square"></i> Enviar</button>
                                    
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
                <div data-style="CaixaEsquerda">
                    Tipos de Tickets
                    <script>

                    </script>
                    <?php
                    $ListaTickets = getTickets(conect());
                    for ($i = 1; $i < count($ListaTickets); $i++) {
                        ?>
                    <span class="ItemTicket" tabindex="0" data-tipo-id="<?= $ListaTickets[$i]->id ?>"><?= $ListaTickets[$i]->tipo ?></span>
                    <?php } ?>
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
        if (isset($msgAlertaSucess)) {
            include './elements/AlertaDefault.php';
        }
        ?>
        <script>
            $("#main").slideUp(1).slideDown(2500);
            jQuery("#txtTelefone").mask("(99)9999-9999");
            jQuery("#txtCelular").mask("(99)99999-9999");
            $(".ItemTicket").click(function () {
                $("#txtTipoForm").attr("value", $(this).attr('data-Tipo-id'));
                $("#tipoFrm").html($(this).text());
                $("#infofrm").html("formulario de contato, formulario para designado para "+$(this).text());
            });

        </script>
    </body>
</html>
