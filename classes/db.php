<?php
class DB
{
  protected $pdo;

  public function __construct(PDO $pdo)
  {
    $this->pdo = $pdo;
  }
  public function getAll($table)
  {
    try {
      $query = "SELECT * FROM $table";
      $stmt = $this->pdo->prepare($query);
      $stmt->execute();
      return $stmt->fetchAll();
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
  }
}

?>
