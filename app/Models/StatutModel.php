<?php

namespace App\Models;

use CodeIgniter\Model;

class StatutModel extends Model

{
    protected $table      = 'statut';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    protected $allowedFields = ['nom_statut'];

    // protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // protected $validationRules    = [];
    // protected $validationMessages = [];
    // protected $skipValidation     = false;
    

    public function getStatut(){
            
        $query = $this  
                         -> get()
                         -> getResultArray();
 
         return $query;
    }

    

}