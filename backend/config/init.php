<?php
require_once(__DIR__ . '/database.php');
require_once(__DIR__ . '/../classes/class-game.php');

$database = new Database();
$db = $database->getConnection();

$game = new Game($db);
