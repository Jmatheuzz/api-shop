<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductServices;

class ProductController extends Controller
{
    protected $service = null;

    public function __construct(ProductServices $service){
        $this->service = $service;
    }

    public function store(Request $request){
        return $this->service->store(['name' => $request->name, 'value' => $request->value, 'details'=> $request->details, 'category'=> $request->category, 'user'=> $request->user()->id]);
    }

    public function get(){
        return $this->service->get();
    }

    public function show(Request $request){
        return $this->service->show($request->id);
    }

    public function update(Request $request){
        return $this->service->update(['id' => $request->id, 'name' => $request->name, 'value' => $request->value, 'details'=> $request->details, 'category'=> $request->category, 'user'=> $request->user()->id]);
    }

    public function delete(Request $request){
        return $this->service->delete($request->id);
    }
}
