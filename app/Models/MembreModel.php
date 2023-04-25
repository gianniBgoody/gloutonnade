<?php

namespace App\Models;

use CodeIgniter\Model;

//pour l'utilisation de la Rawsql
use CodeIgniter\Database\RawSql;

class MembreModel extends Model

{
    protected $table      = 'membre';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    protected $allowedFields = ['pseudo', 'nom_membre', 'prenom_membre', 'email', 'password', 'avatar', 'statut_id'];

    // protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // protected $validationRules    = [];
    // protected $validationMessages = [];
    // protected $skipValidation     = false;


    // fonction pour l'inscription de l'utilisateur
    public function inscriptionMembre($postData){
        $postData['password'] = password_hash($postData['password'],PASSWORD_DEFAULT);
        return $this-> insert($postData);
        
    }
    
    
    //fonction pour la connection et pour vérifier si le mail et le mot de passe sont liés et valide
    public function checkMembre($postData){
        $mail = $postData['pseudomail'];
        $where = "email='{$mail}' OR pseudo='{$mail}'";
        $membre = $this->where(new RawSql($where))
                     ->get()
                     ->getRowArray();
        if($membre && password_verify($postData['password'],$membre['password'])){
            return $membre;
        }
        else {
            return FALSE;
        }
    }
    
    public function modifierAvatar($postData){
            $this->where('id',$postData["id"])->set('avatar',$postData["avatar"])->update();

    }

    public function getAllMembre(){
            
           $query = $this  -> select('membre.id, pseudo, nom_membre, prenom_membre, email, avatar, statut_id')
                            -> get()
                            -> getResultArray();
    
            return $query;
    }

    public function getMembreById($id){
            
        $query = $this  -> select('membre.id, pseudo, nom_membre, prenom_membre, email, avatar, statut_id')
                        -> where('membre.id', $id)
                        -> get()
                        -> getRowArray();
 
         return $query;
    }

    // on passe 3 paramètres à cette fonction. Le troisième paramètre est un variable boléenne que l'on passe a true ou false dans le controller
    public function modifierMembre($idMembre, $postData, $delOldAvatar){
        // on récupère l'image avant la suppression dans la variable
        $avatarOld = $this
                    ->select('avatar')
                    ->getWhere(['id' => $idMembre])
                    ->getRowArray();

        // on englobe la requête dans une transaction pour sécuriser la bdd au cas ou la requete s'interrompt car si il il y une coupure on revient au début de la transaction
        $this->transStart();
            $this   ->where('id',$idMembre)
            ->set('statut_id',$postData['statut_id'])
            ->set('avatar',$postData['avatar'])
            
            ->update();

        $transacValid = $this->transComplete();

        // condition pour savoir quand est ce qu'il faut supprimer l'avatar du fichier public
        if($delOldAvatar) {
            // Si checkbox cochée ou si nouvel avatar
            // Suppression de l'iavatar dans le répertoire public
            if((!empty($avatarOld['avatar'])) && $transacValid) {
                unlink(FCPATH.'avatar/'.$avatarOld['avatar']);
            }
        }
    }
}