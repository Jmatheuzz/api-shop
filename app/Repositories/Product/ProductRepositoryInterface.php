<?php


namespace App\Repositories\Product;

use Illuminate\Database\Eloquent\Model;

interface ProductRepositoryInterface {
    public function __construct(Model $model);
    public function store(array $data);
    public function get();
    public function getById(int $id);
    public function update(array $data);
    public function delete(int $id);
}