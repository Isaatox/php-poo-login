<?php
function chargerClasse(string $classe)
{
 include $classe . '.php';   
}

spl_autoload_register('chargerClasse');



include('conf.php'); 