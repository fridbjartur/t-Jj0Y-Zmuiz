<?php
class Game
{

    // Connection
    private $db;

    // Tables
    private $playersTable = "players";
    private $scoresTable = "scores";

    // Db connection
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function createPlayer($post)
    {
        try {
            $q = $this->db->prepare("INSERT INTO $this->playersTable VALUES(:player_id, :player_name, :player_created)");
            $q->bindValue(':player_id', null);
            $q->bindValue(':player_name', $post['name']);
            $q->bindValue(':player_created', date("Y-m-d H:i:s"));
            $q->execute();
            $playerId = $this->db->lastInsertId();
            $_SESSION['player_id'] = $playerId;
            $_SESSION['player_name'] = $post['name'];
            // header('Location: play');
        } catch (Exception $ex) {
            echo "Database could not be connected: " . $ex->getMessage();
        }
    }

    public function createScore($id, $points)
    {
        try {
            $q = $this->db->prepare("INSERT INTO $this->scoresTable VALUES(:score_id, :score_player_fk, :score_points, :score_created)");
            $q->bindValue(':score_id', null);
            $q->bindValue(':score_player_fk', $id);
            $q->bindValue(':score_points', $points);
            $q->bindValue(':score_created', date("Y-m-d H:i:s"));
            $q->execute();
        } catch (Exception $ex) {
            echo "Database could not be connected: " . $ex->getMessage();
        }
    }

    public function getScores()
    {
        try {
            $q = $this->db->prepare("
                SELECT scores.score_points AS points, players.player_name AS player, players.player_id AS player_id, scores.score_created AS created
                FROM $this->scoresTable
                JOIN $this->playersTable ON scores.score_player_fk = players.player_id
                ORDER BY scores.score_points DESC LIMIT 20
            ");
            $q->execute();
            $aRow = $q->fetchAll();
            return $aRow;
        } catch (Exception $ex) {
            echo "Database could not be connected: " . $ex->getMessage();
        }
    }

    public function isLoggedIn()
    {
        session_start();
        if (isset($_SESSION['player_id'])) {
            return true;
        } else {
            return false;
        }
    }
}
