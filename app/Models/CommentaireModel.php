<?php

namespace App\Models;

use CodeIgniter\Model;

class CommentaireModel extends Model

{
    protected $table      = 'commentaire';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    protected $allowedFields = ['date_commentaire', 'contenu', 'membre_id', 'recette_id'];

    // protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // protected $validationRules    = [];
    // protected $validationMessages = [];
    // protected $skipValidation     = false;

    
    public function commentaireRecette($postData){
        
        return $this-> insert($postData);
        
    }

    public function getAllCommentaireByRecetteId($id){
        $query = $this  -> select('commentaire.id, date_commentaire, contenu, membre_id, recette_id,  pseudo, avatar')
                        -> where ('recette_id', $id)
                        -> join('membre', 'membre.id = commentaire.membre_id')
                        -> get()
                        -> getResultArray();

        return $query;
    }

    public function getCommentaireByMembreId($id){
        $query = $this  -> select('commentaire.id, date_commentaire, contenu, commentaire.membre_id, recette_id, pseudo, avatar, titre, image')
                        -> where('commentaire.membre_id', $id)
                        -> join('membre', 'membre.id = commentaire.membre_id')
                        -> join('recette', 'recette.id = commentaire.recette_id')
                        -> get()
                        -> getResultArray();

        return $query;

   }
   
   public function getCommentaireById($id){
        $query = $this  -> select('commentaire.id, date_commentaire, contenu, commentaire.membre_id, recette_id, pseudo, avatar')
        -> where('commentaire.id', $id)
        -> join('membre', 'membre.id = commentaire.membre_id')
        -> get()
        -> getRowArray();

    return $query;

   }

   public function commentaireModel($id, $postData){

    $this   ->where('commentaire.id',$id)
            ->set('contenu',$postData['contenu'])
            ->update();
    }

    public function deleteCommentaire($id){

        $this -> where ('commentaire.id', $id )
              -> delete();
    }
}