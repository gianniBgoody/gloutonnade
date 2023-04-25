<?php

namespace App\Controllers;

class Landing extends BaseController
{

    public function accueil()
    {
        helper(['form', 'nettoyageData']);

        $recetteModel = new \App\Models\RecetteModel();
        $recettes = $recetteModel ->getRecetteByTagId(24);
        $cardAccueil =$recettes[array_rand($recettes)];

        $data = [
            'cardAccueil' => $cardAccueil,
            'meta_title' => 'Gloutonnade | Recettes de cuisine',
        ];

        // echo "<pre>";
        // print_r ($data["cardAccueil"]);
        // die();
        $postData = $this->request->getPost();
        if($postData){

            $validation = \config\Services::validation();
            $rules = $validation->getRuleGroup('contactRules');

            if($this->validate($rules)){            

            $contactModel = new \App\Models\ContactModel();
            $contactModel -> contactLanding($postData);

            return redirect()->route('/')-> with('messageContactOk', 'Votre message à bien été envoyé');

            }else{
                $data['validation'] = $this->validator;
           }
        }
        return view('template/pageLanding', $data);
    }


    public function formLogin()
    {
        helper('form');

        $data = [
            'meta_title' => 'Gloutonnade | Recettes de cuisine',
            'title' => 'Se connecter à la Communauté Gloutonne'
        ];

        $postData = $this->request->getPost();
        if($postData){

            $validation = \config\Services::validation();
            $rules = $validation->getRuleGroup('connectionRules');

            if($this->validate($rules)){
                
                $membreModel = new \App\Models\MembreModel();

                //fonction checkUser se trouve dans dossier MembreModel. 
                $membre = $membreModel->checkMembre($postData);

                //Vérifier si c'est bien le bon duo login/mdp
                if($membre){                    

                    // récupère ce qui nous intéresse dans la variable session. si on souhaite tout récupérer set('membre', $membre) à la place du tableau
                    $this->session->set('membre', [
                        'id' => $membre['id'],
                        'pseudo' => $membre['pseudo'],
                        'avatar' => $membre['avatar'],
                        'statut_id' => $membre['statut_id'],
                        'email' => $membre['email'],
                        'nom_membre' => $membre['nom_membre'],
                        'prenom_membre' => $membre['prenom_membre'],


                    ]);

                    return redirect()->to('session');
                    }

                $data['notMatching'] = 'Pas de correspondance';

            }else{

                $data['validation'] = $this->validator;
            }
        }
    
        
        return view('template/formLogin', $data);

    }

    

    public function formInscription()
    {
        helper(['form', 'nettoyageData']);

        $data = [
            'meta_title' => 'Gloutonnade | Recettes de cuisine',
            'title' => 'S\'inscrire à la Gloutonnade'
        ];

        //traitement validation, insertion en bdd etc....
        if($this->request->getPost()){

            //valid_data fait référence à NettoyageData_helper
            $postData = valid_data($this->request->getPost());
            //autre façon d'écrire pour ne pas répéter la ligne
            // $postData = valid_data($postData);

            // appel des règles de validations 
            $validation = \config\Services::validation();
            $rules = $validation->getRuleGroup('inscriptionRules');

            if($this->validate($rules)){
                //on insère les données saisies en BBD
                $membreModel = new \App\Models\MembreModel();
                //autre façon d'écrire
                // userModel = model('App\Models\UserModel');

                $membreModel ->inscriptionMembre($postData);
            
                       
               return redirect()->route('/')-> with('messageInscriptionOk', 'Bienvenue chez les Gloutons. Vous pouvez vous connecter');

            }else{
                $data['validation'] = $this->validator;

            }
        }
       
        return view('template/formInscription', $data);

    }

}
