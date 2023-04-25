<?php

namespace App\Models;

use CodeIgniter\Model;

class TagModel extends Model

{
    protected $table      = 'tag';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    protected $allowedFields = ['nom_tag', 'parent_id', 'isAdmin'];

    // protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // protected $validationRules    = [];
    // protected $validationMessages = [];
    // protected $skipValidation     = false;

    
    public function getTagByParentId($id){

        // pour tout selectionner sans condition
        $query = $this  ->select('id, nom_tag, parent_id, isAdmin')
                        ->where('parent_id',$id)
                        -> get()
                        -> getResultArray();

        return $query;
    }

    public function getNullTags(){

        // pour tout selectionner sans condition
        $query = $this  ->select('id, nom_tag, parent_id, isAdmin')
                        ->where('parent_id',null)
                        -> get()
                        -> getResultArray();

        return $query;
    }

    
    // fonction pour selectionner uniquement les tags qui ont des recettes
    public function getTag(){

        // on recupère les id_tags qui sont associés avec id_recette dans la table de jointure
        // groupBy permet de récuperer 1 seul id même si celui-ci se répète 
        $tagIds = array_values($this->db->table('recette_tag')
                 ->select('id_tag')
                 ->groupBy('id_tag')
                 ->get()
                 ->getResultArray());

        //tableau vide pour pouvoir y stocker  tous les id_tags récupérer via une boucle 
        $tags = [];

        foreach($tagIds as $tagId) {
            $tags[] = $tagId['id_tag'];
        }
        
        $query = $this  -> whereIn('id',$tags)
                        ->get()
                        ->getResultArray();

        return $query;
    }


    public function addTag($postData){
        
        return $this-> insert($postData);
    }

    public function getTagAdmin(){

        $query = $this  
                    -> get()
                    -> getResultArray();

        return $query;

    }

    public function getTagById($id){
        $query = $this  
                        -> where('tag.id', $id)
                        -> get()
                        -> getRowArray();
 
         return $query;
    }


    public function modifierTag($idCat, $postData){

        $this   ->where('id',$idCat)
                ->set('nom_tag',$postData['nom_tag'])
                ->set('parent_id',$postData['parent_id'])
                ->set('isAdmin',$postData['isAdmin'])
                ->update();
        }

        public function deleteTag($id){

            $this -> where ('tag.id', $id )
                  -> delete();
        }

}