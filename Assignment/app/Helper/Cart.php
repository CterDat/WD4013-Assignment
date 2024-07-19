<?php

namespace App\Helper;

class Cart
{

    private $items = [];
    private $total_price = 0;
    private $total_quantity = 0;

    public function __construct()
    {
        $this->items = session('cart') ? session('cart') : [];
    }

    public function listCart()
    {
        return $this->items;
    }
    public function addCart($product, $quantity = 1)
    {
        $item = [
            'productId' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'image' => $product->image,
            'quantity' => $quantity
        ];
        $this->items[$product->id] = $item;
        session(['cart' => $this->items]);
    }

    public function getTotalPrice()
    {
        $totalPrice = 0;
        foreach ($this->items as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }
        return $totalPrice;
    }
    public function getTotalQuantity()
    {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item['quantity'];
        }
        return $total;
    }
    public function isEmpty()
    {
        return empty($this->items);
    }
}
