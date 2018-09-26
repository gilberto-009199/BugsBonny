<?php
/* Burraco sem fundo /dev/null kkkkkkk */
session_start();
unset($_SESSION['token']);
session_destroy();
unset( $_SESSION );
header("location:../../index.php");
?>