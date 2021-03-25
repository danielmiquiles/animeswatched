<?php

namespace App\Controllers;

use App\Models\User;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class UserController extends ResourceController
{    
    use ResponseTrait;
    
    
    /**
     *  Return user if exists
     */
    public function signin()
    {
        $request = $this->request->getJSON();
        $users = new User();

        $email = isset($request->email) ? $request->email : null ;
        $password = isset($request->password) ? $request->password : null ;

        if(empty($email)){
            return $this->respond(
                [
                    'error' => 'email field is required'
                ],
                 404
            );
        }
        if(empty($password)){
            return $this->respond(
                [
                    'error' => 'password field is required'
                ],
                 404
            );
        }

        $user = $users->where('email', $email)->findAll();
        $password_hash = $user[0]['password'];

        if(password_verify($password, $password_hash)){

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
        } else {
            return $this->respond(
                [
                    'error' => 'invalid email or invalid password'
                ],
                 404
            );
        }        
    }

    /**
     *  Create a new user
     */
    public function signup()
    {
        $request = $this->request->getJSON();
        $users = new User();

        $name = isset($request->name) ? $request->name : null ;
        $email = isset($request->email) ? $request->email : null ;
        $password = isset($request->password) ? $request->password : null ;

        if(empty($name)){
            return $this->respond(
                [
                    'error' => 'name field is required'
                ],
                 404
            );
        }
        if(empty($email)){
            return $this->respond(
                [
                    'error' => 'email field is required'
                ],
                 404
            );
        }
        if(empty($password)){
            return $this->respond(
                [
                    'error' => 'password field is required'
                ],
                 404
            );
        }
        
        $data = [
            'name' => $name,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT) 
        ];

        $user = $users->where('email',$email)->findAll();

        if($user){
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

    /**
     *  Delete a user
     */
    public function delete($id = null)
    {
        $users = new User();

        $result = $users->delete($id);

        if (!$result) {
            return $this->respond('', 404);
        }

        return $this->respond($result, 200);
    }

    /**
     *  Delete a user
     */
    public function edit($id = null)
    {
        $request = $this->request->getJSON();
        $users = new User();

        $name = isset($request->name) ? $request->name : null ;
        $email = isset($request->email) ? $request->email : null ;
        $password = isset($request->password) ? $request->password : null ;

        if(empty($name)){
            return $this->respond(['error' => 'name field is required'],404);
        }
        if(empty($email)){
            return $this->respond(['error' => 'email field is required'],404);
        }
        if(empty($password)){
            return $this->respond(['error' => 'password field is required'],404);
        }
        
        $data = [
            'name' => $name,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT) 
        ];

        $user = $users->where('email',$email)->findAll();

        if($user){

            $result = $users->update($id, $data);

            if (!$result) {
                return $this->respond('', 404);
            }
    
            return $this->respond($result, 200);
            
        } else {

            return $this->respond(['error' => 'user not registered'],404);
        }
    }
}
