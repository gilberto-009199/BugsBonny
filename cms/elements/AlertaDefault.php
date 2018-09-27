<?php
$idAlerta = (int) rand(1000,100000);
?>
<div role="dialog" class="Alert" id="<?= $idAlerta ?>">
    <script>
        function FechaJanela(idElemento) {
            document.getElementById(idElemento).style.display = "none";
            $('#container').css('display','none');
            $('#modal').css('display','none');
        }
    </script>
    <div class="AlertTitulo">Atenção</div>
    <div class="Alertcontent">
      <div class="msgConteudo">

      </div>  

      <button class="Direita btn" style="height:32px; margin:8px; margin-right:16px;" onclick="FechaJanela('<?= $idAlerta ?>')">Fechar</button>
    </div>
</div>