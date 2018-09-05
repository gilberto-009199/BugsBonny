<?php
/* Biblioteca BBcode 
 * criada para atentder os escritores e a pagina de fale conosco
 * 
*/
function BBcode($textoBBcode){
   $a = array(
      "/\[i\](.*?)\[\/i\]/is",//italico
      "/\[b\](.*?)\[\/b\]/is",//negrito
      "/\[u\](.*?)\[\/u\]/is",//sublinhado
      "/\[img\](.*?)\[\/img\]/is",//imagem
      "/\[url=(.*?)\](.*?)\[\/url\]/is",//link
      "/\[center\](.*?)\[\/center\]/is",//center
      "/\[color=(.*?)\](.*?)\[\/color\]/is",// coloca cor
      //Criando BBCode proprio
      "/\[titulo\](.*?)\[\/titulo\]/is",//titulo
      //BBCode criado para o site
      "/\[livro\]\[nome\](.*?)\[\/nome\]\[capa\](.*?)\[\/capa\]\[\/livro\]/is"//Item Livro bbcode
   );
   $b = array(
      "<i>$1</i>",
      "<b>$1</b>",
      "<u>$1</u>",
      "<img src='$1' />",
      "<a href='$1' target='_blank'>$2</a>",
      "<p style='text-align: center;'>$1</p>",
      "<span style='color:$1;'>$2</span>",
      "<h3>$1</h3>",
      "<div style='border:solid 1px; width:110px; min-height:110px; padding:0;'><h4 style='margin-top:0; width:100%; background-color:black; color:white;'>$1</h4><img style='display: block; margin-left: auto; margin-right: auto;' src='$2'></div>"//Item Livro html 
   );
   $textoBBcode = preg_replace($a, $b, $textoBBcode);
   $textoBBcode = nl2br($textoBBcode);
   return $textoBBcode;
} 
$texto = "[i]italico[/i]".
         "[b]negrito[/b]".
         "[u]sublinhado[/u]".
         "[img]/img/logo.png[/img]".
         "[url=google.com]link[/url]".
         "[center]centro[/center]".
         "[color=green]verde[/color]". 
         "[titulo]titulo[/titulo]".
         "[livro][nome]O Peregrino[/nome][capa]/img/logo.png[/capa][/livro]";
?>

<?=BBcode($texto)?>

