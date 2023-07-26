<?php


namespace App\Repositories\User;

use Illuminate\Database\Eloquent\Model;

interface UserRepositoryInterface {
    public function __construct(Model $model);
    public function store(array $data);
    public function get();
    public function getById(int $id);
    public function getByEmail(string $email);
    public function update(int $id, array $data);
    public function delete(int $id);
}