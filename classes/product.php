<?php

class Product
{
  public $id;
  public $seller;
  public $category;
  public $brand;
  public $color;
  public $size;
  public $description;
  public $price;
  public $addedDate;
  public $soldDate;
  public $daysForSale;

  public function __construct(
    $id,
    $seller,
    $category,
    $brand,
    $color,
    $size,
    $description,
    $price,
    $added_date,
    $sold_date,
    $daysForSale
  ) {
    $this->id = $id;
    $this->seller = $seller;
    $this->category = $category;
    $this->brand = $brand;
    $this->color = $color;
    $this->size = $size;
    $this->description = $description;
    $this->price = $price;
    $this->addedDate = $added_date;
    $this->soldDate = $sold_date;
    $this->daysForSale = $daysForSale;
  }
}
