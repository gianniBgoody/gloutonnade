<?php

namespace App\Models;

use CodeIgniter\Model;

class SousCategorieModel extends Model

{
    protected $table      = 'sousCategorie';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    protected $allowedFields = ['nom_souscat', 'categorie_id'];

    // protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // protected $validationRules    = [];
    // protected $validationMessages = [];
    // protected $skipValidation     = false;
    
    public function getSousCategorie(){

        // pour tout selectionner sans condition
        $query = $this  ->select('sousCategorie.id, nom_souscat, categorie_id,nom_categorie')
                        ->orderBy('categorie_id','asc')
                        ->join('categorie','categorie.id = sousCategorie.categorie_id')
                        -> get()
                        -> getResultArray();

        return $query;
    }


    public function addSousCat($postData){
        
        return $this-> insert($postData);
        
    }

    public function getSousCategorieById($id){
        $query = $this  
                        -> where('sousCategorie.id', $id)
                        -> get()
                        -> getRowArray();
          return $query;
    }


    public function modifierSousCategorie($idSouscat, $postData){

        $this   ->where('id',$idSouscat)
                ->set('nom_souscat',$postData['nom_souscat'])
                ->set('categorie_id',$postData['categorie_id'])
                ->update();
        }


        public function deleteSouscat($id){

            $this -> where ('sousCategorie.id', $id )
                  -> delete();
        }

}