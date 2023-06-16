<?php

class Product_Small
{
  public $id;
  public $category;
  public $brand;
  public $color;
  public $size;
  public $description;
  public $price;
  public $sold;

  public function __construct(
    $id,
    $category,
    $brand,
    $color,
    $size,
    $description,
    $price,
    $sold
  ) {
    $this->id = $id;
    $this->category = $category;
    $this->brand = $brand;
    $this->color = $color;
    $this->size = $size;
    $this->description = $description;
    $this->price = $price;
    $this->sold = $sold;
  }
}
