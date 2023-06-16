<?php

require_once "./classes/db.php";

class Product_Model extends DB
{
  private $table = "products";
  public function getAllProducts()
  {
    try {
      $query = "SELECT p.id, p.description, p.price, sold_date, added_date, sz.size, c.name as `category`, firstname, lastname, color, brand
      FROM products as p
      JOIN sizes as sz on sz.id = p.size_id
      JOIN categories as c on c.id = p.category_id
      JOIN sellers as s on s.id = p.seller_id
      JOIN colors as co on co.id = p.color_id
      JOIN brands as b on b.id = p.brand_id";
      $stmt = $this->pdo->prepare($query);
      $stmt->execute();
      return $stmt->fetchAll();
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
  }
  public function addProduct(
    int $seller_id,
    int $category_id,
    int $brand_id,
    int $color_id,
    int $size_id,
    string $description,
    int $price,
    string $date
  ) {
    try {
      $query = "INSERT INTO $this->table (seller_id, category_id, brand_id, color_id, size_id, description, price, added_date) VALUES (?,?,?,?,?,?,?,?)";
      $stmt = $this->pdo->prepare($query);
      $stmt->execute([
        $seller_id,
        $category_id,
        $brand_id,
        $color_id,
        $size_id,
        $description,
        $price,
        $date,
      ]);
      echo "Produkten Tillagd";
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
  }
  public function setSold(string $date, int $id)
  {
    try {
      $query = "UPDATE $this->table
      SET sold_date = ?
      WHERE id = ?";
      $stmt = $this->pdo->prepare($query);
      $stmt->execute([$date, $id]);
      echo "Produkten markerad som såld";
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
  }
}
