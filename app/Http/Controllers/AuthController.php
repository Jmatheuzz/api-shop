<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AuthServices;

class AuthController extends Controller
{
    protected $service = null;

    public function __construct(AuthServices $service){
        $this->service = $service;
    }

    public function login(Request $request){
        $result = $this->service->login(['email' => $request->email, 'password' => $request->password]);
        if(isset($result['token'])){
            return response()->json(['token' => $result['token']], 200);
        }
        return response()->json(['error' => $result['error']], 401);
    }
    public function verifyTokenEmailValidation(Request $request){
        $result = $this->service->verifyTokenEmailValidation($request->token);
        if (!isset($result['error'])){
            return (['user'=> $result['user']]);
        }
        return ['error'=> $result['error']];
    }
}
