<?php
$idAlerta = (int) rand(1000,100000);
?>
<div role="dialog" class="Alert" id="<?= $idAlerta ?>">
    <script>
        function FechaJanela(idElemento) {
            document.getElementById(idElemento).style.display = "none";
        }
    </script>
    <div class="AlertTitulo">Atenção</div>
    <div class="Alertcontent">
        <p> Sucesso:</p>
        <?php
        if (isset($msgAlertaSucess)) {
            echo $msgAlertaSucess;
        } else {
            echo "<p>Success!!!</p>";
        }
        ?>
        <p></p>
        <button class="Direita" style="height:32px; margin:8px; margin-right:16px;" onclick="FechaJanela('<?= $idAlerta ?>')">Fechar</button>
    </div>
</div>