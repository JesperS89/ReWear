<?php
require_once "./classes/db.php";

class Seller_Model extends DB
{
  protected $table = "sellers";
  public function getAllSellers()
  {
    try {
      $query = "SELECT * FROM $this->table
   ORDER BY firstname ASC";
      $stmt = $this->pdo->prepare($query);
      $stmt->execute();
      return $stmt->fetchAll();
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
  }
  public function getSellerById(int $id)
  {
    try {
      $query = "SELECT * FROM $this->table
   
      where sellers.id = ?";
      $stmt = $this->pdo->prepare($query);
      $stmt->execute([$id]);
      return $stmt->fetchAll();
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
  }
  public function getAmountOfItemsById(int $id)
  {
    try {
      $query = "SELECT count(s.id) as `amountofitems`
      FROM $this->table as s
      JOIN products as p on p.seller_id = s.id
      WHERE s.id = ?
      group by s.id
      ";
      $stmt = $this->pdo->prepare($query);
      $stmt->execute([$id]);
      return $stmt->fetchAll();
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
  }
  public function sellerSoldItemsById(int $id)
  {
    try {
      $query = "SELECT COUNT(p.sold_date) as `amountofsold` FROM sellers as s
      JOIN products AS p on p.seller_id = s.id
      WHERE p.sold_date IS NOT NULL
      AND s.id = ?
      GROUP BY s.id";
      $stmt = $this->pdo->prepare($query);
      $stmt->execute([$id]);
      return $stmt->fetchAll();
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
  }
  public function sellerRevenueById(int $id)
  {
    try {
      $query = "SELECT SUM(p.price) as `total_sold_amount` FROM sellers as s
      JOIN products AS p on p.seller_id = s.id
      WHERE p.sold_date IS NOT NULL
      AND s.id = ?
      GROUP BY s.id";
      $stmt = $this->pdo->prepare($query);
      $stmt->execute([$id]);
      return $stmt->fetchAll();
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
  }
  public function sellerItemsById(int $id)
  {
    try {
      $query = "SELECT p.id, ca.name as `category`, brand, c.color, sz.size, p.description, p.price, p.sold_date FROM sellers as s
      JOIN products AS p on p.seller_id = s.id
      JOIN colors as c on c.id = p.color_id
      JOIN categories as ca on ca.id = p.category_id
      JOIN sizes as sz on sz.id = p.size_id
      JOIN brands as b on b.id = p.brand_id
      WHERE s.id = ?";
      $stmt = $this->pdo->prepare($query);
      $stmt->execute([$id]);
      return $stmt->fetchAll();
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
  }
  public function addSeller(
    string $firstname,
    string $lastname,
    string $email,
    string $phone
  ) {
    try {
      $query = "INSERT INTO $this->table (firstname, lastname, email, phone) VALUES (?,?,?,?)";
      $stmt = $this->pdo->prepare($query);
      $stmt->execute([$firstname, $lastname, $email, $phone]);
      echo "Användare tillagd";
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
  }
}
