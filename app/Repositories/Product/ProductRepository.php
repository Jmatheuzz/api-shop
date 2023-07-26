<?php
namespace App\Repositories\Product;

use Illuminate\Database\Eloquent\Model;

class ProductRepository implements ProductRepositoryInterface{
    protected $model = null;

    public function __construct(Model $model){
        $this->model = $model;
    }

    public function store(array $data){
        return $this->model->create($data);
    }

    public function get(){
        return $this->model->paginate(12);
    }

    public function getById(int $id){
        return $this->model->find($id);
    }

    public function update(array $data,){
        return $this->model->find($data['id'])->update($data);
    }

    public function delete($id){
        return $this->model->find($id)->delete();
    }
}