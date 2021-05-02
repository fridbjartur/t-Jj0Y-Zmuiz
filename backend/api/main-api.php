<?php
require_once(__DIR__ . '/../config/init.php');
session_start();

switch ($_POST['action']) {
    case 'add_player':
        $game->createPlayer($_POST);
        header('Location: home');
        exit();
        break;
    case 'add_score':
        $game->createScore($_SESSION['player_id'], $_POST['points']);
        break;
    case 'get_scores':
        echo json_encode($game->getScores());
        break;
}
