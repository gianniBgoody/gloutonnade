<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }


// formulaire recette sans les règles de validation
    public function ajoutRecetteTest(){

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
        // die(var_dump($data["tagsDivers"]));

        $postData = $this->request->getPost();

        if($postData){
            
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

            // die(var_dump($postData));
            $recetteModel = new \App\Models\RecetteModel();
            $recetteModel ->addRecette($postData);
            

            return redirect()->route('session');
        }

            return view('template/formRecette', $data);
    }

    public function isMember(){

        if(!session('membre.id')){
            return redirect()->route('/');
        }
    }
}
