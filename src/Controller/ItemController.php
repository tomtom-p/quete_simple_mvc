<?php
/**
 * Created by PhpStorm.
 * User: wilder2
 * Date: 01/10/18
 * Time: 15:03
 */
// src/Controller/ItemController.php
require __DIR__ . '/../Model/ItemManager.php';

$items = selectAllItems();

require __DIR__ . '/../View/item.php';
?>