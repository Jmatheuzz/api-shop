<?php
namespace App\Services;

use App\Helpers\StoreFile;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class AuthServices{
    protected $repo = null;

    public function __construct(UserRepositoryInterface $repo){
        $this->repo = $repo;
    }

    public function login(array $data){
        $user = $this->repo->getByEmail($data['email']);
        if (!is_null($user) && is_null($user->email_verified_at)) return ['error' => 'Email not verified'];
        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])){
            $user = Auth::user();
            return ['token' => $user->createToken('JWT')->plainTextToken];
        }
        return ['error' => 'Invalid User'];
    }

    public function verifyTokenEmailValidation(string $token){
        $user = $this->repo->getByToken($token);
        if(isset($user)){
            $this->repo->update($user['id'], ['email_verified_at'=> date('Y-m-d H:i:s')]);
            return ['user'=> $user];
        }
        return ['error' => 'token not valida'];
    }

}