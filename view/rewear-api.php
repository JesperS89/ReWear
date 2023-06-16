<?php

require "./classes/seller.php";
require "./classes/product.php";
require "./classes/product_small.php";

class Rewear_Api
{
  public function outPutSellers(array $sellers): void
  {
    $json = [
      "seller_count" => count($sellers),
      "result" => $sellers,
    ];
    header("Content-Type: application/json");
    echo json_encode($json);
  }
  public function outPutProducts(array $products): void
  {
    foreach ($products as $product) {
      $timezone = new DateTimeZone("Europe/Stockholm");
      $currentDateTime = new DateTime("now", $timezone);
      $addedDate = DateTime::createFromFormat(
        "Y-m-d H:i:s",
        $product["added_date"]
      );
      $timeElapsed = $currentDateTime->diff($addedDate);
      $formattedTimeElapsed =
        $product["sold_date"] != null
          ? null
          : (int) $timeElapsed->format("%d");

      $newProduct = new Product(
        $product["id"],
        $product["firstname"] . " " . $product["lastname"],
        $product["category"],
        $product["brand"],
        $product["color"],
        $product["size"],
        $product["description"],
        $product["price"],
        $product["added_date"],
        $product["sold_date"],
        $formattedTimeElapsed
      );
      $productList[] = $newProduct;
    }

    $json = [
      "product_count" => count($productList),
      "result" => $productList,
    ];
    header("Content-Type: application/json");
    echo json_encode($json);
  }
  public function outPutSeller(
    array $seller,
    array $itemsListed,
    array $soldItems,
    array $revenue,
    array $sellerItems
  ): void {
    foreach ($sellerItems as $sellerItem) {
      $sold = $sellerItem["sold_date"] != null ? true : false;
      $newProduct = new Product_Small(
        $sellerItem["id"],
        $sellerItem["category"],
        $sellerItem["brand"],
        $sellerItem["color"],
        $sellerItem["size"],
        $sellerItem["description"],
        $sellerItem["price"],
        $sold
      );
      $productList[] = $newProduct;
    }

    if (count($seller) > 0) {
      if (count($soldItems) > 0) {
        foreach ($seller as $se) {
          foreach ($itemsListed as $i) {
            foreach ($soldItems as $si) {
              foreach ($revenue as $r) {
                $chosenSeller = new Seller(
                  $se["firstname"],
                  $se["lastname"],
                  $i["amountofitems"],
                  $si["amountofsold"],
                  $r["total_sold_amount"]
                );
              }
            }
          }
        }

        $json = [
          "sellerInfo" => $chosenSeller,
          "sellerItems" => $productList,
        ];
      } elseif (count($itemsListed) > 0) {
        foreach ($seller as $se) {
          foreach ($itemsListed as $i) {
            $chosenSeller = new Seller(
              $se["firstname"],
              $se["lastname"],
              $i["amountofitems"]
            );
          }
        }

        $json = [
          "sellerInfo" => $chosenSeller,
          "sellerItems" => $productList,
        ];
      } else {
        foreach ($seller as $se) {
          $chosenSeller = new Seller($se["firstname"], $se["lastname"]);
        }
        $json = [
          "sellerInfo" => $chosenSeller,
          "sellerItems" => $sellerItems,
        ];
      }
      header("Content-Type: application/json");
      echo json_encode($json);
    } else {
      header("HTTP/1.1 404 Not Found");
      echo "404 Not Found";
    }
  }
}
