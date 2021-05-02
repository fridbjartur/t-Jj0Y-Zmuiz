<?php
session_start();
if (!isset($_SESSION['player_id'])) {
    header('Location: player');
}
require_once 'start.php';
require_once INCLUDES . 'header.inc.php';
require_once INCLUDES . 'navbar.inc.php';
require_once TEMPLATES . 'template-index.php';
require_once INCLUDES . 'footer.inc.php';
