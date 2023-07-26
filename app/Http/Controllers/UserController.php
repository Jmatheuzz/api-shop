<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserServices;

class UserController extends Controller
{
    protected $service = null;

    public function __construct(UserServices $service){
        $this->service = $service;
    }

    public function store(Request $request){
        return $this->service->store(['email' => $request->email, 'username' => $request->username, 'name'=> $request->name, 'telephone'=> $request->telephone, 'password'=> $request->password]);
    }

    public function get(){
        return $this->service->get();
    }

    public function show(Request $request){
        return $this->service->show($request->id);
    }

    public function update(Request $request){
        return $this->service->update($request->id, ['email' => $request->email, 'username' => $request->username, 'name'=> $request->name, 'telephone'=> $request->telephone, 'password'=> $request->password]);
    }

    public function delete(Request $request){
        return $this->service->delete($request->id);
    }
}
