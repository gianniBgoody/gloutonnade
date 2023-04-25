<?php

namespace App\Controllers;

class Session extends BaseController
{

    public function deconnexion(){

        $this->session->destroy();
        return redirect()->to('/');
    }


    public function sessionIndex(){

        // pour empçecher l'accès  aux page si pas de session. A mettre dans tous les controlleurs
        // if(!session('membre.id')){
        //     return redirect()->route('/');
        // }


        $recetteModel = new \App\Models\RecetteModel();
        $cardData = $recetteModel ->getAllRecette();

        $categoryModel = new \App\Models\CategorieModel();
        $cats = $categoryModel->getCategorie();

        $data = [
            'cats' => $cats,
            'cardData' => $cardData,
            'meta_title' => 'Gloutonnade | Recettes de cuisine',
            'title' => 'Le coin des Gloutons',
        ];

        // echo "<pre>";
        // print_r ($data["cardData"]);
        // die();

        // die(var_dump(session('membre.avatar')));

        return view('template/pageSession', $data);

    }


    public function ficheRecette($id){

       helper(['form', 'nettoyageData']);
        
        $recetteModel = new \App\Models\RecetteModel();    
        $recetteData = $recetteModel ->getRecetteById($id);

        $categoryModel = new \App\Models\CategorieModel();
        $cats = $categoryModel->getCategorie();

        $tagModel = new \App\Models\TagModel();
        $tags = $tagModel->getTag();

        $commentaireModel = new \App\Models\CommentaireModel();
        $comments = $commentaireModel->getAllCommentaireByRecetteId($id);

        $data = [
            'comments' => $comments,
            'tags' => $tags,
            'cats' => $cats,
            'recetteData' => $recetteData,
            'meta_title' => 'Gloutest | Recettes de cuisine',
            'title' => 'Fiche recette'
        ];

        //ajout des commentaires 
        $postData = $this->request->getPost();
            if($postData){

                $validation = \config\Services::validation();
                $rules = $validation->getRuleGroup('commentaireRules');

                if($this->validate($rules)){

                    $commentaireModel = new \App\Models\CommentaireModel();
                    $commentaire = $commentaireModel->commentaireRecette($postData);
            
                    return redirect()->to (base_url('recette/'.$recetteData['id']))-> with('messageCommentaireOk', 'Votre Commentaire à bien été ajouté');

                    return view('template/pageRecette', $data);

                }else{
                    $data['validation'] = $this->validator;
                }
                
            }
            // echo "<pre>";
            // print_r ($data["comments"]);
            // die();
        
            return view('template/pageRecette', $data);
    }


        public function getRecettebySaison(){
        // Choix de recettes par la thématique de la saisonnalité. On choisit en fonction des tags et éventuellement si plusieurs tags on créer un tableau via le WhereIn

        $recetteModel = new \App\Models\RecetteModel();
        $cardData = $recetteModel ->getRecetteByTagId(10);

        $categoryModel = new \App\Models\CategorieModel();
        $cats = $categoryModel->getCategorie();


        $data = [
            'cats' => $cats,
            'cardData' => $cardData,
            'meta_title' => 'Gloutest | Recettes de cuisine',
            'title' => 'Les Gloutonneries de Saison à déguster'
        ];

        return view('template/pageSession', $data);
    }     

    public function getVegetarien(){
    // végétarien est un tag donc on va chercher l'id du tag en question dans la table de jointure BdD et on inscrit le numero du tag dans les paramètres ici c'est 23

        $recetteModel = new \App\Models\RecetteModel();
        $cardData = $recetteModel ->getRecetteByTagId(23);

        $categoryModel = new \App\Models\CategorieModel();
        $cats = $categoryModel->getCategorie();

        $data = [
            'cats' => $cats,
            'cardData' => $cardData,
            'meta_title' => 'Gloutest | Recettes de cuisine',
            'title' => 'Les Gloutonneries végétariennes'
        ];

        return view('template/pageSession', $data);
    }


    public function getIodeAll(){
        $recetteModel = new \App\Models\RecetteModel();
        $cardData = $recetteModel ->getIode();

        $categoryModel = new \App\Models\CategorieModel();
        $cats = $categoryModel->getCategorie();

        $data = [
            'cats' => $cats,
            'cardData' => $cardData,
            'meta_title' => 'Gloutest | Recettes de cuisine',
            'title' => 'Les Gloutonneries salées'
        ];


        return view('template/pageSession', $data);
    }


    public function getSucreAll(){
        $recetteModel = new \App\Models\RecetteModel();
        $cardData = $recetteModel ->getSucre();

        $categoryModel = new \App\Models\CategorieModel();
        $cats = $categoryModel->getCategorie();

        $data = [
            'cats' => $cats,
            'cardData' => $cardData,
            'meta_title' => 'Gloutest | Recettes de cuisine',
            'title' => 'Les douceurs gloutonnes'
        ];

        return view('template/pageSession', $data);
    }

    public function getRecetteByCategorieId($catId){
        $recetteModel = new \App\Models\RecetteModel();
        $cardData = $recetteModel ->getRecetteByCategorieId($catId);

        $categoryModel = new \App\Models\CategorieModel();
        $cats = $categoryModel->getCategorie();

        $data = [
            'cats' => $cats,
            'cardData' => $cardData,
            'meta_title' => 'Gloutest | Recettes de cuisine',
            'title' => 'Les recettes Gloutonnes'
        ];


        return view('template/pageSession', $data);

    }


    public function getRecetteByTagId($tagId){
        $recetteModel = new \App\Models\RecetteModel();
        $cardData = $recetteModel ->getRecetteByTagId($tagId);

        $tagModel = new \App\Models\TagModel();
        $tags = $tagModel->getTag();

        $categoryModel = new \App\Models\CategorieModel();
        $cats = $categoryModel->getCategorie();

        $data = [
            'cats' => $cats,
            'tags' => $tags,
            'cardData' => $cardData,
            'meta_title' => 'Gloutest | Recettes de cuisine',
            'title' => 'Les recettes Gloutonnes'
        ];

        // echo "<pre>";
        // print_r ($data["cardData"]);
        // die();

        return view('template/pageSession', $data);

    }



    public function ajoutRecette(){
        // pour empçecher l'accès  aux page si pas de session. A mettre dans tous les controlleurs
        if(!session('membre.id')){
            return redirect()->route('/');
        }

        helper(['form', 'nettoyageData']);

        $categoryModel = new \App\Models\CategorieModel();
        $cats = $categoryModel->getCategorie();
    
        $data = [
            'cats' => $cats,
            'meta_title' => 'Gloutonnade | Recettes de cuisine',
            'title' => 'Partager une Gloutonnerie'
        ];

        $categorieModel = model('App\Models\CategorieModel');
        $data["categories"] = $categorieModel->getCategorie();
        // die(var_dump($data["categories"]));

        $sousCategorieModel = model('App\Models\SousCategorieModel');
        $data["sousCategories"] = $sousCategorieModel->getSousCategorie();
        //  die(var_dump($data["sousCategories"]));

        $tagModel = model('App\Models\TagModel');
        $data["tagOccasion"] = $tagModel->getTagByParentId(1);
        $data["tagIngr"] = $tagModel->getTagByParentId(2);
        $data["tagDivers"] = $tagModel->getTagByParentId(3);

        $postData = $this->request->getPost();

        if($postData){
            $validation = \config\Services::validation();
            $rules = $validation->getRuleGroup('addRecetteRules');

            if($this->validate($rules)){

            $img = $this->request->getFile('image');
                if ($img->isValid() && ! $img->hasMoved()) {
                    $newName = $img->getRandomName();
                    $img->move(FCPATH.'uploads', $newName);
                    $postData['image']= $newName;
                }
    
                // si aucun tags n'est choisi (le tableau n'existe pas), donc on crée un tableau vide pour que la boucle puisse se faire quand même.
                if(!isset($postData["tagEnvoi"])){
                    $postData["tagEnvoi"] = [];
                }

                $recetteModel = new \App\Models\RecetteModel();
                $recetteModel ->addRecette($postData);

                return redirect()->route('session') -> with('messageRecetteOk', 'Merci pour avoir ajouté cette Gloutonnerie.');
        
        }else{
            $data['validation'] = $this->validator;
    
            }
        }
        return view('template/formRecette', $data);
    }


    function editCommentByMembre($id) {
        helper(['form', 'nettoyageData']);

        $commentaireModel = new \App\Models\CommentaireModel();
        $editComment = $commentaireModel->getCommentaireById($id);

        $data = [
            'editComment' => $editComment,
            'meta_title' => 'Gloutest | Recettes de cuisine',
            'title' => 'modifier le message'
        ];

        $postData = valid_data($this->request->getPost());
        if($postData){

            $validation = \Config\Services::validation();
            $rules = $validation->getRuleGroup('commentaireRules');

            if($this->validate($rules)){
                $commentaireModel = new \App\Models\CommentaireModel();
                $commentaireModel ->commentaireModel($id, $postData);
    
                return redirect()->to("recette/". $editComment["recette_id"])-> with('commentaireEditOk', 'La modification du message a bien effectuée.');
    
            }else{
                $data['validation'] = $this->validator;
            }

            }
        // echo "<pre>";
        // print_r ($data["editComments"]);
        // die();

        return view('template/formEditCommentaire', $data);
    }

    public function deleteCommentByMembre($id){

        $commentaireModel = new \App\Models\CommentaireModel();
        $editComment = $commentaireModel->getCommentaireById($id);

        $commentaireModel = new \App\Models\CommentaireModel();
        $commentaireModel->deleteCommentaire($id);

        return redirect()->to("recette/". $editComment["recette_id"])-> with('commentaireDeleteOk', 'La suppression du message a bien effectuée.');
    }

}