<?php

namespace App\DTOs;

class ProductData
{
    public string $title;
    public ?string $description;
    public float $price;
    public int $category_id;

    public function __construct(array $data)
    {
        $this->title = $data['title'];
        $this->description = $data['description'] ?? null;
        $this->price = $data['price'];
        $this->category_id = $data['category_id'];
    }
}