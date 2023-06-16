<?php

class Seller
{
  public $firstname;
  public $lastname;
  public $amountOfItems = 0;
  public $amountOfSold = 0;
  public $totalAmount = 0;

  public function __construct(
    $firstname,
    $lastname,
    $amountOfItems = 0,
    $amountOfSold = 0,
    $totalAmount = 0
  ) {
    $this->firstname = (string) $firstname;
    $this->lastname = (string) $lastname;
    $this->amountOfItems = (int) $amountOfItems;
    $this->amountOfSold = (int) $amountOfSold;
    $this->totalAmount = (int) $totalAmount;
  }
}
