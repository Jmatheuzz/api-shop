<?php
namespace App\Services;

use App\Helpers\StoreFile;
use App\Mail\EmailVerification;
use App\Repositories\Cart\CartRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class CartServices{
    protected $repo = null;

    public function __construct(CartRepositoryInterface $repo){
        $this->repo = $repo;
    }

    public function store(array $data){

        $cart = $this->repo->store($data);
        return ['cart'=> $cart];
    }

    public function get(){
        return $this->repo->get();
    }

    public function getByUser(int $userId){
        $carts = $this->repo->getByUser($userId);
        return ['carts'=> $carts];
    }

    public function update(array $data){
        $isUpdated = $this->repo->update($data);
        return $isUpdated;
    }

    public function delete($userId, $productId){
        return $this->repo->delete($userId, $productId);
    }
}