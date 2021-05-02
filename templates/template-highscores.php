<div class="score_container">
    <?php

    if (isset($_GET['points']) && is_numeric($_GET['points'])) {
        echo '<div class="points_alert">You got  <span>' . $_GET['points'] . '</span>  points</div>';
    }
    ?>

    <div class="highscore_item highscore_header d-flex justify-content-start">
        <div class="highscore_item_points">
            Points
        </div>
        <div class="highscore_item_name">
            Player
        </div>
        <div class="highscore_item_created">
            Date
        </div>
    </div>

    <?php
    $aHighscores = $game->getScores();
    session_start();

    foreach ($aHighscores as $value) {
        if ($value['player_id'] === $_SESSION['player_id']) {
            echo '<div class="highscore_item highscore_item_active  d-flex justify-content-start">
            <div class="highscore_item_points">
                ' . $value['points'] . '
            </div>
            <div class="highscore_item_name">
                ' . $value['player'] . '
            </div>
            <div class="highscore_item_created">
                ' . $value['created'] . '
            </div>
        </div>';
        } else {
            echo '<div class="highscore_item d-flex justify-content-start">
    <div class="highscore_item_points">
        ' . $value['points'] . '
    </div>
    <div class="highscore_item_name">
        ' . $value['player'] . '
    </div>
    <div class="highscore_item_created">
        ' . $value['created'] . '
    </div>
</div>';
        }
    }
    ?>
</div>