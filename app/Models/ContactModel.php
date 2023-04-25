<?php

namespace App\Models;

use CodeIgniter\Model;

class ContactModel extends Model

{
    protected $table      = 'contact';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    protected $allowedFields = ['nom_contact', 'prenom_contact', 'email_contact', 'objet_contact', 'contenu_contact', 'membre_id', 'date_contact'];

    // protected $useTimestamps = false;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // protected $validationRules    = [];
    // protected $validationMessages = [];
    // protected $skipValidation     = false;
    

    public function contactLanding($postData){
        
        return $this-> insert($postData);
        
    }


    public function getMembremessage(){
        $query = $this  -> select('contact.id as idcontact, date_contact, contenu_contact, membre_id, nom_contact,  prenom_contact, objet_contact, email_contact, membre.id, pseudo, avatar')
                        -> join('membre', 'membre.id = contact.membre_id')
                        -> orderBy('date_contact', 'desc')
                        -> get()
                        -> getResultArray();

        return $query;
    }

    public function getAllmessage(){
        $query = $this  
                        -> orderBy('date_contact', 'desc')
                        -> get()
                        -> getResultArray();

        return $query;
    }


    public function deleteMessage($id){

        $this -> where ('contact.id', $id )
              -> delete();
    }


}
