<?php

namespace App\Models;

use CodeIgniter\Model;

class Anime extends Model
{
    protected $table = 'animes';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'year', 'url_image', 'updated_at'];

}

