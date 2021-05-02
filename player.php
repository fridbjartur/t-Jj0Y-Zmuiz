<?php
session_start();
if (isset($_SESSION['player_id'])) {
    header('Location: home');
}
require_once 'start.php';
require_once INCLUDES . 'header.inc.php';
require_once INCLUDES . 'navbar.inc.php';
require_once TEMPLATES . 'template-player.php';
require_once INCLUDES . 'footer.inc.php';
