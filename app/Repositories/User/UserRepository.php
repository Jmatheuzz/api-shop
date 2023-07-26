<?php
namespace App\Repositories\User;

use Illuminate\Database\Eloquent\Model;

class UserRepository implements UserRepositoryInterface{
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

    public function getById(int $id){
        return $this->model->find($id);
    }

    public function getByEmail(string $email){
        return $this->model->where('email', $email)->first();
    }
    public function getByToken(string $token){
        return $this->model->where('token_email_validation', $token)->first();
    }

    public function update(int $id, array $data,){
        return $this->model->find($id)->update($data);
    }

    public function delete($id){
        return $this->model->find($id)->delete();
    }
}