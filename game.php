<?php
session_start();
if (!isset($_SESSION['player_id'])) {
  header('Location: home');
}
require_once(__DIR__ . '/start.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <meta name="description" content="Pure VanillaJS First Person Shooting Game" />
  <title>Pure VanillaJS | Shooting game</title>
  <link rel="stylesheet" href="<?php echo ASSETS_CSS . 'game.css' ?>" />
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,700i&display=swap" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Bungee&display=swap" rel="stylesheet">
</head>

<body>
  <div id="startScreen">
    <p id="startTimer">3</p>
  </div>

  <div id="startgame">
    <button id="start_game">
      START
    </button>
  </div>

  <div id="endgame">
  </div>

  <div id="game">
    <div id="counterContainer">
      <p id="pointSystem">Score: <span>0</span></p>
      <p id="countdown">Time: <span class="lastseconds">30</span></p>
    </div>
    <div id="crosshair_wrapper">
      <img src="<?php echo ASSETS_IMAGES . 'smoke.png' ?>" id="smoke" alt="smoke" />
      <div id="crosshair_rect"></div>
      <img src="<?php echo ASSETS_IMAGES . 'crosshair.svg' ?>" id="crosshair" alt="crosshair" />
      <img src="<?php echo ASSETS_IMAGES . 'gun_flash.png' ?>" id="gun_flash" alt="gun" />
      <img src="<?php echo ASSETS_IMAGES . 'gun.png' ?>" id="gun" alt="gun" />
    </div>
    <div id="stage">
      <div id="foreground" class="gamelayer"></div>
      <div id="target-0" class="target"></div>
      <div id="target-2" class="target"></div>
      <div id="target-5" class="target"></div>
      <div id="target-8" class="target"></div>
      <div id="target-9" class="target"></div>
      <div id="target-10" class="target"></div>
      <div id="middleground" class="gamelayer"></div>
      <div id="target-1" class="target"></div>
      <div id="target-3" class="target"></div>
      <div id="target-4" class="target"></div>
      <div id="target-6" class="target"></div>
      <div id="target-7" class="target"></div>
      <div id="target-11" class="target"></div>
      <div id="background" class="gamelayer"></div>
    </div>
  </div>
  <script src="<?php echo ASSETS_JS . 'game.js' ?>"></script>
</body>

</html>