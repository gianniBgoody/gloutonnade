<?php

namespace App\Controllers;

class Admin extends BaseController
{

    public function adminIndex()
    {
        $messageModel = new \App\Models\ContactModel();
        $messageMembre = $messageModel->getMembreMessage();

        $messageModel = new \App\Models\ContactModel();
        $allMessage = $messageModel->getAllMessage();

        $data = [
            'allMessages' => $allMessage,
            'messageMembres' => $messageMembre,
            'meta_title' => 'Gloutest | Recettes de cuisine',
            'title' => 'Courrier reçu',
        ];

        //        echo "<pre>";
        // print_r ($data["messageMembres"]);
        // die();
        return view('template/pageAdminMessage',$data);
    }

    public function adminMembre(){

        $membreModel = new \App\Models\MembreModel();
        $allMembre = $membreModel->getAllMembre();

        $data = [
            'allMembres' => $allMembre,
            'meta_title' => 'Gloutest | Recettes de cuisine',
            'title' => 'Les membres de la Gloutonnade',
        ];
        // echo "<pre>";
        // print_r ($data["allMembres"]);
        // die();
        return view('template/pageAdminMembre',$data);
    }


    public function contributionMembre($id){

        $recetteModel = new \App\Models\RecetteModel();    
        $membreRecette = $recetteModel ->getRecetteByMembreId($id);

        $commentaireModel = new \App\Models\CommentaireModel();    
        $commentMembre = $commentaireModel ->getCommentaireByMembreId($id);

        $membreModel = new \App\Models\MembreModel();    
        $membreId = $membreModel ->getMembreById($id);

        $data = [
            'membreIds' => $membreId,
            'contribComments' => $commentMembre,
            'contribRecettes' => $membreRecette,
            'meta_title' => 'Gloutest | Recettes de cuisine',
            'title' => 'Les contributions de '
        ];
        return view('template/pageAdminContrib',$data);
    }


    public function adminAjoutCategorie(){
        helper(['form', 'nettoyageData']);

        $data = [

            'meta_title' => 'Gloutest | Recettes de cuisine',
            'title' => 'Ajouter une catégorie',
        ];
        
        // on inclus la fonction du nettyadeData dans le $postData
        $postData = valid_data($this->request->getPost());
        if($postData){

            $validation = \Config\Services::validation();
            $rules = $validation->getRuleGroup('categorieRules');

            if($this->validate($rules)){
                $categorieModel = new \App\Models\CategorieModel();
                $categorieModel ->addCategorie($postData);

                return redirect()->route('adminDatabase')-> with('messageCategorieOk', 'La catégorie a bien été ajoutée.');

            }else{
                $data['validation'] = $this->validator;
            }
        }
         return view('template/formAdminCategorie',$data);
    }


    public function adminAjoutSouscategorie(){
        helper(['form', 'nettoyageData']);

        $categorieModel = new \App\Models\CategorieModel();
        $catAdmim = $categorieModel->getCategorie();

        $data = [
            'catAdmins'=> $catAdmim,
            'meta_title' => 'Gloutest | Recettes de cuisine',
            'title' => 'Ajouter une sous-catégorie'
        ];

        $postData = valid_data($this->request->getPost());
        if($postData){
        
            $validation = \Config\Services::validation();
            $rules = $validation->getRuleGroup('sousCategorieRules');

            if($this->validate($rules)){
                $sousCategorieModel = new \App\Models\SousCategorieModel();
                $sousCategorieModel ->addSousCat($postData);

                return redirect()->route('adminDatabase')-> with('messageSousCategorieOk', 'La sous-catégorie a bien été ajoutée.');

            }else{
                $data['validation'] = $this->validator;
            }
        }
        return view('template/formAdminSousCat',$data);
    }


    public function adminAjoutTag(){
        helper(['form', 'nettoyageData']);

        $tagModel = new \App\Models\TagModel();
        $tagNull = $tagModel->getNullTags();

        $data = [
            'tagNulls' => $tagNull,
            'meta_title' => 'Gloutest | Recettes de cuisine',
            'title' => 'Ajouter un tag',
        ];

        $postData = valid_data($this->request->getPost());
        if($postData){
            $validation = \Config\Services::validation();
            $rules = $validation->getRuleGroup('tagRules');

            if($this->validate($rules)){
                
                if ($postData['parent_id'] == 0) {
                    $postData['parent_id'] = NULL;
                }
                $tagModel ->addTag($postData);

                return redirect()->route('adminDatabase')-> with('messageTagOk', 'Le tag a bien été ajouté.');

            }else{
                $data['validation'] = $this->validator;
            }
        }
        return view('template/formAdminTag',$data);
    }


    public function adminDatabase(){

        $categorieModel = new \App\Models\CategorieModel();
        $catAdmim = $categorieModel->getCategorie();

        $sousCategorieModel = new \App\Models\SousCategorieModel();
        $sousCatAdmim = $sousCategorieModel->getSousCategorie(); 
        
        $tagModel = new \App\Models\TagModel();
        $tagAdmim = $tagModel->getTagAdmin(); 

        $tagModel = new \App\Models\TagModel();
        $tagNullAdmim = $tagModel->getNullTags(); 
        

        $data = [
            'tagNullAdmin' => $tagNullAdmim,
            'tagAdmins' => $tagAdmim,
            'sousCatAdmins' => $sousCatAdmim,
            'catAdmins' => $catAdmim,
            'meta_title' => 'Gloutest | Recettes de cuisine',
            'title' => 'Gestion de la base de données'
        ];
 
        // echo "<pre>";
        // print_r ($data["tagAdmins"]);
        // die();
        return view('template/pageAdminDatabase',$data);
    }


    public function editCategorie($id){

        helper(['form', 'nettoyageData']);

        $categorieModel = new \App\Models\CategorieModel();
        $updateCat = $categorieModel->getCategorieById($id);

        $data = [
            'updateCat' => $updateCat,
            'meta_title' => 'Gloutest | Recettes de cuisine',
            'title' => 'Editer les catégories'
        ];

        $postData = valid_data($this->request->getPost());
        if($postData){

            $validation = \Config\Services::validation();
            $rules = $validation->getRuleGroup('categorieRules');

            if($this->validate($rules)){
                $categorieModel = new \App\Models\CategorieModel();
                $categorieModel ->modifierCategorie($id, $postData);

                return redirect()->route('adminDatabase')-> with('messageUpdateCategorieOk', 'La catégorie a bien été modifiée.');

            }else{
                $data['validation'] = $this->validator;
            }
        }
        //echo "<pre>";
        // print_r ($data["updateCat"]);
        // die();
         return view('template/formAdminCategorie',$data);

    }

    public function editSousCat($id){

        helper(['form', 'nettoyageData']);

        $sousCategorieModel = new \App\Models\SousCategorieModel();
        $editSouscat = $sousCategorieModel->getSousCategorieById($id);

        $categorieModel = new \App\Models\CategorieModel();
        $catAdmim = $categorieModel->getCategorie();

        $data = [
            'editSouscat' => $editSouscat,
            'catAdmins' => $catAdmim,
            'meta_title' => 'Gloutest | Recettes de cuisine',
            'title' => 'Editer les sous-catégories'
        ];

        $postData = valid_data($this->request->getPost());
        if($postData){

            $validation = \Config\Services::validation();
            $rules = $validation->getRuleGroup('sousCategorieRules');

            if($this->validate($rules)){
                $sousCategorieModel = new \App\Models\SousCategorieModel();
                $sousCategorieModel ->modifierSousCategorie($id, $postData);

                return redirect()->route('adminDatabase')-> with('messageUpdateSouscatOk', 'La sous-catégorie a bien été modifiée.');

            }else{
                $data['validation'] = $this->validator;
            }
        }
        return view('template/formAdminSousCat',$data);
    }
    

    public function editTag($id){
        helper(['form', 'nettoyageData']);

        $tagModel = new \App\Models\TagModel();
        $editTag = $tagModel->getTagById($id);
        
        $tagModel = new \App\Models\TagModel();
        $tagNull = $tagModel->getNullTags();

        $data = [
            'editTag' => $editTag,
            'tagNulls' => $tagNull,
            'meta_title' => 'Gloutest | Recettes de cuisine',
            'title' => 'Editer les Tags'
        ];

        $postData = valid_data($this->request->getPost());
        if($postData){

            $validation = \Config\Services::validation();
            $rules = $validation->getRuleGroup('tagRules');

            if($this->validate($rules)){
                if ($postData['parent_id'] == 0) {
                    $postData['parent_id'] = NULL;
                }
                $tagModel = new \App\Models\TagModel();
                $tagModel ->modifierTag($id, $postData);

                return redirect()->route('adminDatabase')-> with('messageUpdateTagOk', 'Le Tag a bien été modifié.');

            }else{
                $data['validation'] = $this->validator;
            }
        }
        return view('template/formAdminTag',$data);
    }


    public function editMembre($id){
        helper(['form', 'nettoyageData']);

        // variable boléenne que l'on va mettre a true quand ca nous intéresse
        $delOldAvatar = false;

        $membreModel = new \App\Models\MembreModel();
        $editMembre = $membreModel->getMembreById($id);

        $statutModel = new \App\Models\StatutModel();
        $statutMembre = $statutModel->getStatut();

        $data = [
            'statutMembres' => $statutMembre,
            'editMembre' => $editMembre,
            'meta_title' => 'Gloutest | Recettes de cuisine',
            'title' => 'Modifier le statut ou l\'avatar du membre'
        ];

        $postData = $this->request->getPost();
        if($postData){
            
            if(isset($postData['avatarCheck'])){
                $postData['avatar'] = NULL;
                // si on coche la checkbox alors il faut supprimer l'ancienne image
                $delOldAvatar = true;
            }else{
                $postData['avatar'] = $editMembre['avatar'];
            }
            // die(var_dump($postData));
            $validation = \Config\Services::validation();
            $rules = $validation->getRuleGroup('editMembreRules');
            
            if($this->validate($rules)){
                
                $img = $this->request->getFile('avatar');
                if ($img->isValid() && ! $img->hasMoved()) {
                    $newName = $img->getRandomName();
                    $img->move(FCPATH.'avatar', $newName);
                    $postData['avatar']= $newName;
                    // si on change l'image via un input file alors il faut delete l'ancienne image
                    $delOldAvatar = true;
                }

                $membreModel = new \App\Models\MembreModel();
                $membreModel ->modifierMembre($id,$postData, $delOldAvatar);

                return redirect()->route('adminMembre')-> with('messageEditMembreOk', 'Le profil ou l\'avatar du Glouton a bien été modifié.');
                
            }else{
                $data['validation'] = $this->validator;
            } 
        }
        return view('template/formAdminMembre',$data);
    }    
    

    public function deleteCategorie($id){

        $categorieModel = new \App\Models\CategorieModel();
        $categorieModel->deleteCat($id);

        return redirect()->route('adminDatabase')-> with('deleteCatOk', 'La catégorie a bien été supprimée.');
    }

    public function deleteSouscat($id){

        $categorieModel = new \App\Models\SousCategorieModel();
        $categorieModel->deleteSouscat($id);

        return redirect()->route('adminDatabase')-> with('deleteSouscatOk', 'La sous catégorie a bien été supprimée.');
    }

    public function deleteTag($id){

        $categorieModel = new \App\Models\TagModel();
        $categorieModel->deleteTag($id);

        return redirect()->route('adminDatabase')-> with('deleteTagOk', 'Le tag a bien été supprimée.');
    }


    public function deleteMessage($id){

        $messageModel = new \App\Models\ContactModel();
        $messageModel->deleteMessage($id);

        return redirect()->route('admin')-> with('deleteMessageOk', 'Le message a bien été supprimé.');
    }


    public function adminRecette(){
        
        $data = [

            'meta_title' => 'Gloutest | Recettes de cuisine',
            'title' => 'Les recettes de la Gloutonnade',
        ];

        return view('template/pageAdminRecette',$data);
    }



    public function adminComment(){

        $data = [

            'meta_title' => 'Gloutest | Recettes de cuisine',
            'title' => 'Les membres de la Gloutonnade',
        ];

        return view('template/pageAdminComment',$data);
    }

}
