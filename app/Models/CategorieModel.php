<?php

namespace App\Models;

use CodeIgniter\Model;

class CategorieModel extends Model

{
    protected $table      = 'categorie';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    protected $allowedFields = ['nom_categorie'];

    // protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // protected $validationRules    = [];
    // protected $validationMessages = [];
    // protected $skipValidation     = false;
    

    public function getCategorie(){

        // pour tout selectionner sans condition
        $query = $this  ->select('id, nom_categorie')
                        ->orderBy('id', 'asc')
                        -> get()
                        -> getResultArray();

        return $query;
    }

    public function addCategorie($postData){
        
        return $this-> insert($postData);
        
    }

    public function getCategorieById($id){
        $query = $this  
                        -> where('categorie.id', $id)
                        -> get()
                        -> getRowArray();
 
         return $query;

    }

    public function modifierCategorie($idCat, $postData){

        $this   ->where('id',$idCat)
                ->set('nom_categorie',$postData['nom_categorie'])
                ->update();

        }


        public function deleteCat($id){

            $this -> where ('categorie.id', $id )
                  -> delete();
        }
        
}