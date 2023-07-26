<?php
namespace App\Repositories\Cart;

use Illuminate\Database\Eloquent\Model;

class CartRepository implements CartRepositoryInterface{
    protected $model = null;

    public function __construct(Model $model){
        $this->model = $model;
    }

    public function store(array $data){
        return $this->model->create($data);
    }

    public function get(){
        return $this->model->all();
    }

    public function getByUser(int $userId){
        return $this->model->where('user', $userId)->get();
    }

    public function update(array $data,){
        return $this->model->where(['user'=> $data['user'], 'product' => $data['product']])->update($data);
    }

    public function delete($userId, $productId){
        return $this->model->where(['user'=> $userId, 'product' => $productId])->delete();
    }

}