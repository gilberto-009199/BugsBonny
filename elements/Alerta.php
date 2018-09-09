<?php
$idAlerta = (int) rand(100, 1000);
?>
<div role="dialog" class="Alert" id="<?= $idAlerta ?>">
    <script>
        function FechaJanela(idElemento) {
            document.getElementById(idElemento).style.display = "none";
        }
    </script>
    <div class="AlertTitulo">Atenção</div>
    <div class="Alertcontent">
        Um erro Ocorreu:
        <?php
        if (isset($msgAlertaErro)) {
            echo $msgAlertaErro;
        } else {
            echo "ERRO Desconhecido";
        }
        ?>

        <p><a href="<?= basename($_SERVER['PHP_SELF']); ?>">PorFavor!Recarregue a pagina</a></p>
        <button onclick="FechaJanela('<?= $idAlerta ?>')">Fechar</button>
    </div>
</div>