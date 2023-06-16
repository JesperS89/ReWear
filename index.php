<?php

require "models/seller_model.php";
require "models/product_model.php";
require "view/rewear-api.php";

$pdo = require "partials/connect.php";
$db = new DB($pdo);

$method = $_SERVER["REQUEST_METHOD"];

$json = file_get_contents("php://input");
$data = json_decode($json, true);

$sellerModel = new Seller_Model($pdo);
$productModel = new Product_Model($pdo);

if ($method == "GET") {
  $output = new Rewear_Api();
  if (isset($_GET["sellers"])) {
    $output->outPutSellers($sellerModel->getAllSellers());
  }
  if (isset($_GET["sellerid"])) {
    $sanitizedSellerId = filter_var(
      $_GET["sellerid"],
      FILTER_SANITIZE_NUMBER_INT
    );
    $sellerId = filter_var($sanitizedSellerId, FILTER_VALIDATE_INT);

    $output->outPutSeller(
      $sellerModel->getSellerById($sellerId),
      $sellerModel->getAmountOfItemsById($sellerId),
      $sellerModel->sellerSoldItemsById($sellerId),
      $sellerModel->sellerRevenueById($sellerId),
      $sellerModel->sellerItemsById($sellerId)
    );
  }

  if (isset($_GET["products"])) {
    $output->outPutProducts($productModel->getAllProducts());
  }
}

if ($method == "POST") {
  if (
    isset(
      $data["seller_id"],
      $data["category_id"],
      $data["brand_id"],
      $data["color_id"],
      $data["size_id"],
      $data["description"],
      $data["price"]
    )
  ) {
    $sanitizedSeller_id = filter_var(
      $data["seller_id"],
      FILTER_SANITIZE_NUMBER_INT
    );
    $sanitizedCategory_id = filter_var(
      $data["category_id"],
      FILTER_SANITIZE_NUMBER_INT
    );
    $sanitizedBrand_id = filter_var(
      $data["brand_id"],
      FILTER_SANITIZE_NUMBER_INT
    );
    $sanitizedColor_id = filter_var(
      $data["color_id"],
      FILTER_SANITIZE_NUMBER_INT
    );
    $sanitizedSize_id = filter_var(
      $data["size_id"],
      FILTER_SANITIZE_NUMBER_INT
    );
    $description = filter_var(
      $data["description"],
      FILTER_SANITIZE_SPECIAL_CHARS
    );
    $seller_id = filter_var($sanitizedSeller_id, FILTER_VALIDATE_INT);
    $brand_id = filter_var($sanitizedBrand_id, FILTER_VALIDATE_INT);
    $category_id = filter_var($sanitizedCategory_id, FILTER_VALIDATE_INT);
    $color_id = filter_var($sanitizedColor_id, FILTER_VALIDATE_INT);
    $size_id = filter_var($sanitizedSize_id, FILTER_VALIDATE_INT);
    $timezone = new DateTimeZone("Europe/Stockholm");

    $currentDateTime = new DateTime("now", $timezone);
    $date = $currentDateTime->format("Y-m-d H:i:s");

    $price = filter_var($data["price"], FILTER_SANITIZE_NUMBER_INT);
    $productModel->addProduct(
      $seller_id,
      $category_id,
      $brand_id,
      $color_id,
      $size_id,
      $description,
      $price,
      $date
    );
  }
  if (
    isset($data["firstname"], $data["lastname"], $data["email"], $data["phone"])
  ) {
    $firstname = filter_var($data["firstname"], FILTER_SANITIZE_SPECIAL_CHARS);
    $lastname = filter_var($data["lastname"], FILTER_SANITIZE_SPECIAL_CHARS);
    $sanitizedEmail = filter_var($data["email"], FILTER_SANITIZE_EMAIL);
    $phone = filter_var($data["phone"], FILTER_SANITIZE_NUMBER_INT);
    $email = filter_var($sanitizedEmail, FILTER_VALIDATE_EMAIL);
    $sellerModel->addSeller($firstname, $lastname, $email, $phone);
  }
}
if ($method == "PUT") {
  if (isset($data["id"])) {
    $id = filter_var($data["id"], FILTER_SANITIZE_NUMBER_INT);
    $timezone = new DateTimeZone("Europe/Stockholm");

    $currentDateTime = new DateTime("now", $timezone);
    $date = $currentDateTime->format("Y-m-d H:i:s");

    $productModel->setSold($date, $id);
  }
}

?>
