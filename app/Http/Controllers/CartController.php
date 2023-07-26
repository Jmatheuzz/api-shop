<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CartServices;

class CartController extends Controller
{
    protected $service = null;

    public function __construct(CartServices $service){
        $this->service = $service;
    }

    public function store(Request $request){
        return $this->service->store(['price' => $request->price, 'amount' => $request->amount, 'product'=> $request->product, 'user'=> $request->user()->id]);
    }

    public function get(){
        return $this->service->get();
    }

    public function getByUser(Request $request){
        return $this->service->getByUser($request->user()->id);
    }

    public function update(Request $request){
        return $this->service->update(['product'=> $request->product, 'user'=> $request->user()->id, 'price' => $request->price, 'amount' => $request->amount, 'product'=> $request->product, 'user'=> $request->user()->id]);
    }

    public function delete(Request $request){
        return $this->service->delete($request->user()->id, $request->product);
    }

}
