<?php

namespace App\Models;

use CodeIgniter\Model;

class RecetteTagModel extends Model

{
    protected $table      = 'recette_tag';
    protected $primaryKey = 'id_recette';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    protected $allowedFields = ['id_tag'];

    // protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // protected $validationRules    = [];
    // protected $validationMessages = [];
    // protected $skipValidation     = false;
    



}