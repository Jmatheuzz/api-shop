<?php
namespace App\Services;

use App\Helpers\StoreFile;
use App\Mail\EmailVerification;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\Cart\CartRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class UserServices{
    protected $repo = null;
    protected $repoCart = null;

    public function __construct(UserRepositoryInterface $repo, CartRepositoryInterface $repoCart){
        $this->repo = $repo;
        $this->repoCart = $repoCart;
    }

    public function store(array $data){
        $data['password'] = Hash::make($data['password']);
        $data['token_email_validation'] = (string) Str::uuid();

        $user = $this->repo->store($data);
        Mail::to('joaomatheusantunes@alu.ufc.br', $data['name'])->send(new EmailVerification(['from' => 'joaomatheusantunes@gmail.com', 'fromName' => 'João', 'subject' => 'Validação de Email', 'name'=> $data['name'], 'token' => $data['token_email_validation']]));

        return $user;
    }

    public function get(){
        return $this->repo->get();
    }

    public function show(int $id){
        $user = $this->repo->getById($id);
        if(is_null($user)) return response()->json(['error' => 'not found user'], HttpResponse::HTTP_NOT_FOUND);
        $user->products;
        return response()->json(['user'=> $user ]);
    }

    public function update( int $id, array $data){
        return $this->repo->update($id, $data );
    }

    public function delete($id){
        return $this->repo->delete($id);
    }
}