<?php

namespace App\Controllers;

use App\Models\User;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class UserController extends ResourceController
{    
    use ResponseTrait;
    
    
    /**
     *  Retorna todos os animes
     */
    public function signin()
    {
        $request = $this->request->getJSON();
        $users = new User();

        $email = $request->email;
        $password = $request->password;

        $user = $users->where('password',$password)->where('email', $email)->findAll();

        if(empty($user)){
            return $this->respond(
                [
                    'error' => 'user not registered'
                ],
                 404
            );
        }

        return $this->respond(
            [
                'user' => $user
            ], 
            200
        );
    }

    /**
     *  Retorna todos os animes
     */
    public function signup()
    {
        $request = $this->request->getJSON();
        $users = new User();

        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        
        $data = [
            'name' => $name,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT) 
        ];

        $user = $users->where('name',$name)->where('email', $email)->findAll();

        if(!empty($user)){
            return $this->respond(
                [
                    'error' => 'user already registered'
                ],
                 404
            );
        }

        $result = $users->insert($data);

        if (!$result) {
            return $this->respond('', 404);
        }

        return $this->respond('', 201);
    }
}
