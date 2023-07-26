<?php


namespace App\Repositories\Cart;

use Illuminate\Database\Eloquent\Model;

interface CartRepositoryInterface {
    public function __construct(Model $model);
    public function store(array $data);
    public function get();
    public function getByUser(int $id);
    public function update(array $data);
    public function delete(int $userId, int $productId);
}