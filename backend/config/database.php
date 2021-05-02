<?php
class Database
{
  private $dbUserName;
  private $dbPassword;
  private $dbConnection;
  private $options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  ];

  public function __construct()
  {
    $ini = parse_ini_file(__DIR__ . '/../private/config.ini');
    $this->dbUserName = $ini["dbUserName"];
    $this->dbPassword = $ini["dbPassword"];
    $this->dbConnection = "mysql:host={$ini["dbHost"]}; dbname={$ini["dbname"]}; charset=utf8mb4";
  }

  public $db;

  public function getConnection()
  {
    $this->db = null;
    try {
      $this->db = new PDO(
        $this->dbConnection,
        $this->dbUserName,
        $this->dbPassword,
        $this->options
      );
    } catch (PDOException $ex) {
      echo "Database could not be connected: " . $ex->getMessage();
    }
    return $this->db;
  }
}
