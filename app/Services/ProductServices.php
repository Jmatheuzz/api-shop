<?php
namespace App\Services;

use App\Helpers\StoreFile;
use App\Mail\EmailVerification;
use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class ProductServices{
    protected $repo = null;

    public function __construct(ProductRepositoryInterface $repo){
        $this->repo = $repo;
    }

    public function store(array $data){

        $product = $this->repo->store($data);
        return $product;
    }

    public function get(){
        return $this->repo->get();
    }

    public function show(int $id){
        $product = $this->repo->getById($id);
        if(is_null($product)) return response()->json(['error' => 'not found product'], HttpResponse::HTTP_NOT_FOUND);
        return $product;
    }

    public function update(array $data){
        $product = $this->repo->update($data);
        if (is_null($product)) return response()->json(['error' => 'not found product'], HttpResponse::HTTP_NOT_FOUND);
        response()->json(['product' => $product]);
        return $product;
    }

    public function delete($id){
        return $this->repo->delete($id);
    }
}