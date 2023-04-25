<?php

namespace App\Controllers;

class Membre extends BaseController
{
    
    public function contactAdmin() {

        if(!session('membre.id')){
            return redirect()->route('/');
        }

        helper(['form', 'nettoyageData']);

        $categoryModel = new \App\Models\CategorieModel();
        $cats = $categoryModel->getCategorie();

        $recetteModel = new \App\Models\RecetteModel();    
        $membreRecette = $recetteModel ->getRecetteByMembreId(session('membre.id'));

        $commentaireModel = new \App\Models\CommentaireModel();    
        $commentMembre = $commentaireModel ->getCommentaireByMembreId(session('membre.id'));

        $data = [
            'commentMembres' => $commentMembre,
            'membreRecettes' => $membreRecette,
            'cats' => $cats,
            'meta_title' => 'Gloutonnade | Recettes de cuisine',
            'title' => 'Page Compte des Gloutons',
        ];

        $postData = $this->request->getPost();

        if($postData){

            $validation = \config\Services::validation();
            $rules = $validation->getRuleGroup('messageRules');

            if($this->validate($rules)){

                $contactModel = new \App\Models\ContactModel();
                $contactModel->insert($postData);

                return redirect()->route('compte')-> with('messageContactOk', 'Votre message à bien été envoyé');

            }else{
                $data['validation'] = $this->validator;

            } 
        }

        return view('template/pageCompte', $data);
    }


    public function compteMembre()
    {

        if(!session('membre.id')){
            return redirect()->route('/');
        }

        helper('form');

        $categoryModel = new \App\Models\CategorieModel();
        $cats = $categoryModel->getCategorie();

        $recetteModel = new \App\Models\RecetteModel();    
        $membreRecette = $recetteModel ->getRecetteByMembreId(session('membre.id'));

        $commentaireModel = new \App\Models\CommentaireModel();    
        $commentMembre = $commentaireModel ->getCommentaireByMembreId(session('membre.id'));

        $data = [
            'commentMembres' => $commentMembre,
            'membreRecettes' => $membreRecette,
            'cats' => $cats,
            'meta_title' => 'Gloutonnade | Recettes de cuisine',
            'title' => 'Page Compte des Gloutons',
        ];

        $postData = $this->request->getPost();
        
        if($postData){
            
            $validation = \Config\Services::validation();
            $rules = $validation->getRuleGroup('avatarRules');
            
            if($this->validate($rules)){
                
                $img = $this->request->getFile('avatar');
                if ($img->isValid() && ! $img->hasMoved()) {
                    $newName = $img->getRandomName();
                    $img->move(FCPATH.'avatar', $newName);
                    $postData['avatar']= $newName;
                }

                $membreModel = new \App\Models\MembreModel();
                $membreModel ->modifierAvatar($postData);

                return redirect()->route('compte')-> with('messageAvatarOk', 'Votre Avatar a bien été enregister.<br> Il se mettra à jour lors de votre prochaine connexion.');
                
            }else{
                $data['validation'] = $this->validator;
            } 
        }
        // echo "<pre>";
        // print_r ($data["commentMembres"]);
        // die();
        return view('template/pageCompte', $data);
    }


 }
