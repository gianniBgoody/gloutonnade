<?php

namespace App\Models;

use CodeIgniter\Model;

class RecetteModel extends Model

{
    protected $table      = 'recette';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    protected $allowedFields = ['titre', 'description', 'image', 'difficulte', 'nbPart', 'duree', 'ingredient', 'etape', 'membre_id', 'categorie_id', 'sousCategorie_id'];

    // protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // protected $validationRules    = [];
    // protected $validationMessages = [];
    // protected $skipValidation     = false;
    


    public function addRecette($postData){
        $this-> insert($postData);
        
        $idRecette =  $this->db->insertID();
    
        foreach($postData['tagEnvoi'] as $idTag){
            $insert = array(
                'id_tag' => $idTag,
                'id_recette' => $idRecette
            );
            $this->db->table('recette_tag')
                     ->insert($insert);
        }
    }


    public function getAllRecette(){

        // pour tout selectionner sans condition
        $query = $this  ->select('id, titre, image', 'membre_id')
                        -> orderBy('id', 'desc')
                        -> get()
                        -> getResultArray();
    
        // pour selectionner des colonnes particulières dans la table avec SELECT 
        // $query = $this -> select('id, titre, image, etape, ingredient')
        //                 -> orderBy('id', 'desc')
        //                 -> get()
        //                 ->getResultArray();
    
        // pour avoir la requete juste avec les data sans le num de l'index [0] dans le tableau
                        // $query = $this -> select('id, titre, image, etape, ingredient, description, duree, nbPart')
                        // -> where(['id' => 20])
                        // ->first(); 
    
    
        // pour avoir une selection de plusieurs id avec la méthode whereIn
                        // $query = $this -> select('id, titre, image, etape, ingredient')
                        // -> whereIn('id',[12, 19, 20, 22])
                        // ->get()
                        // ->getResultArray();
    
        return $query;
    
    }


    public function getRecetteById($id){

        // il faut selectionner les champs qui nous interesse. Si on prend * on selectionne tout et l'id récupérer se transforme en membre.id à la place de recette.id
        $query = $this  -> select('recette.id, titre, description, image, difficulte, nbPart, duree,    ingredient, etape, membre_id, categorie_id, sousCategorie_id, pseudo')
                        -> where ('recette.id', $id)
                        -> join('membre', 'membre.id = recette.membre_id')
                        -> get()
                        -> getRowArray();
        
        return $query;
    }
    

    //  requette pour la table de jointure tags 
    public function getRecetteByTagId($tagId){

        $query = $this  ->db->table('recette_tag')
                        -> select('id_recette, id_tag, recette.id, titre, description, image, difficulte, nbPart, duree,    ingredient, etape, membre_id, categorie_id, sousCategorie_id, membre.id as idMembre, pseudo,')
                        ->where('id_tag', $tagId)
                        ->join('recette', 'recette.id = recette_tag.id_recette')
                        ->join ('membre', 'membre.id = recette.membre_id')
                        ->get()
                        ->getResultArray();
        return $query;

    }


    public function getRecetteByCategorieId($catId){

        $query = $this  ->where('categorie_id', $catId)
                        ->get()
                        ->getResultArray();
    
        return $query;
    
    }


    public function getIode(){
    
        $sousCatIode = [3, 4, 5, 6, 7, 8, 9, 10, 11, 16, 17, 18, 19, 40, 41];
    
        $query = $this  -> whereIn('sousCategorie_id',$sousCatIode)
                        ->get()
                        ->getResultArray();
    
        return $query;
    
    }
    
    public function getSucre(){
        
        $sousCatSucre = [25, 26, 28, 30, 31, 32, 33, 34, 35, 36];
    
        $query = $this  -> whereIn('sousCategorie_id',$sousCatSucre)
                        ->get()
                        ->getResultArray();
    
        return $query;
    
    }

    // ici c'est un tableau pour les recettes de saison, si il faut plusieurs tags.
    // par exemple ici c'est un tableau pour la saison de l'été avec rapport au barbecue et picnic 
    public function getSaison(){
        
        $sousCatSaison = [6, 19, 25];
    
        $query = $this  -> whereIn('sousCategorie_id',$sousCatSaison)
                        ->get()
                        ->getResultArray();
    
        return $query;
    
    }
    
   public function getRecetteByMembreId($id){
        $query = $this  ->where('recette.membre_id', $id)
                        // -> join('membre', 'membre.id = recette.membre_id')
                        ->get()
                        ->getResultArray();

        return $query;

   } 

}