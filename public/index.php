<?php
// chargement de l'autoload en début de fichier
require __DIR__ . '/../vendor/autoload.php';
//...

$items = new \Controller\ItemController();
$items->index();

?>

