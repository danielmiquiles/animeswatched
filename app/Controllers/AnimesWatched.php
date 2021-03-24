<?php

namespace App\Controllers;

use App\Models\Anime;
use App\Models\User;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class AnimesWatched extends ResourceController
{
    
    use ResponseTrait;
    protected $modelName = '\App\Models\Anime';
    
    /**
     *  Retorna todos os animes
     */
    public function index()
    {
        $users = new User();
        return $this->respond(
            [
                'users' => $users->findAll(),
            ],
            200
        );
    }

    /**
     * Find All Animes
     */
    public function findAllAnimes(){

        $anime_model = new Anime();
        $animes = $anime_model->findAll();

        if(!$animes){
           return $this->respond([''],404); 
        }

        return $this->respond(
            [
                'animes' => $animes,
            ],
            200
        );

    }

    /**
     * Create a new Anime
     */
    public function store()
    {
        $request = $this->request->getJSON();
        $data = [
            'id' => rand(1, 9999999999),
            'name' => $request->name,
            'year' => $request->year,
            'url_image' => $request->url_image,
        ];

        $anime_model = new Anime();
        $result = $anime_model->insert($data);

        // if (!$result) {
        //     return $this->respond('', 404);
        // }

        return $this->respond(
            [
                'message' => 'success'
            ], 
            201);
    }

    /**
     * Pega anime pelo id
     */
    // public function find($id)
    // {
    //     $client = $this->model->find($id);

    //     if (!$client) {
    //         return $this->respond('', 404);
    //     }

    //     return $this->respond($client, 201);
    // }

    /**
     * Pega anime pelo id 
     */
    // public function update($id = null)
    // {
    //     $data = $this->request->getJSON();
        
    //     $client = $this->model->update($id, $data);

    //     if (!$client) {
    //         return $this->respond('', 404);
    //     }

    //     return $this->respond($client, 200);
    // }

    /**
     * Pega anime pelo id 
     */
    // public function delete($id = null)
    // {

    //     $client = $this->model->delete($id);

    //     if (!$client) {
    //         return $this->respond('', 404);
    //     }

    //     return $this->respond($client, 200);
    // }



    /**
     * Pega episódios de um anime espécifico
     */
    // public function getEpisodios($id = null)
    // {
    //     $client = $this->model->where('episodio_id',$id)->findAll();

    //     if (!$client) {
    //         return $this->respond('', 404);
    //     }

    //     return $this->respond('', 201);
    // }
}
