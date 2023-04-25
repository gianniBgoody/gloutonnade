<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------

    public $inscriptionRules = array(
        'email' => array(
                'label' => 'email',
                'rules'  => 'required|valid_email|is_unique[membre.email]',
                'errors' => array(
                  'required' => 'Le champs email est requis',
                  'valid_email' => 'Vous devez renseigner un email valide.',
                  'is_unique' => 'Cet email possede déjà un compte'
                )
        ),

        'password' => array(
                'label' => 'password',
                'rules' => 'required|min_length[4]|regex_match[/(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-])/]',
                'errors' => array(
                  'required' => 'mot de passe requis',
                   'min_length' => '4 caractères au minimum',
                   'regex_match' => 'Au moins une Majuscule, une minuscule, un chiffre et un caractère spécial ',
                )
        ),

        'confirm_password' => array(
              'label' => 'confirm_password',
              'rules' => 'required|matches[password]',
              'errors' => array(
                'required' => 'champs obligatoire',
                'matches' => 'confirmation défaillante'
              ),
        ),

        'nom_membre' => array(
           'label' => 'nom_membre',
           'rules' => 'required|alpha_space|min_length[3]',
           'errors' => array(
             'required' => 'Le nom est obligatoire',
             'min_length' => '3 caractères au minimum',
             'alpha_space' => 'Lettres et espaces seulement'
           ),
        ),

        'prenom_membre' => array(
            'label' => 'prenom_membre',
            'rules' => 'required|alpha_space|min_length[3]',
            'errors' => array(
              'required' => 'Le prénom est obligatoire',
              'min_length' => '3 caractères au minimum',
              'alpha_space' => 'Uniquement chiffres, lettres, espaces, et ~ ! # $ % & * - _ + = | : . sont autorisés'
            ),
         ),

         'pseudo' => array(
            'label' => 'pseudo',
            'rules' => 'required|alpha_numeric_punct|min_length[3]|is_unique[membre.pseudo]',
            'errors' => array(
              'required' => 'Choisir un Pseudo',
              'min_length' => '3 caractères au minimum',
              'alpha_numeric_punct' => 'Lettres et espaces seulement',
              'is_unique' => 'Ce pseudo existe déjà. Veuillez en choisir un autre'
            ),
         ),
    
      );

      public $connectionRules = array(
        'pseudomail' => array(
          'label' => 'pseudomail',
          'rules'  => 'required|is_not_unique[membre.pseudo]',
          'errors' => array(
            'required' => 'L\'email ou le pseudo est requis',
            'is_not_unique' => 'Ce compte n\'existe pas, veuillez réessayer.'
          )
        ),

        'password' => array(
            'label' => 'password',
            'rules' => 'required',
            'errors' => array(
            'required' => 'Mot de passe requis'
          )
        ),

      );


      public $contactRules = array(
        'email_contact' => array(
                'label' => 'email_contact',
                'rules'  => 'required|valid_email',
                'errors' => array(
                  'required' => 'Le champs email est requis',
                  'valid_email' => 'Vous devez renseigner un email valide.',
                )
        ),

        'nom_contact' => array(
           'label' => 'nom_contact',
           'rules' => 'required|min_length[3]',
           'errors' => array(
             'required' => 'Le nom est obligatoire',
             'min_length' => '3 caractères au minimum',
           ),
        ),

        'prenom_contact' => array(
            'label' => 'prenom_contact',
            'rules' => 'required|min_length[3]',
            'errors' => array(
              'required' => 'Le prénom est obligatoire',
              'min_length' => '3 caractères au minimum',
            ),
         ),

         'objet_contact' => array(
            'label' => 'objet_contact',
            'rules' => 'is_natural',
            'errors' => array(
            'is_natural' => 'Veuillez choisir un objet pour la demande',
            ),
         ),

         'contenu_contact' => array(
          'label' => 'contenu_contact',
          'rules' => 'required|min_length[10]',
          'errors' => array(
            'required' => 'Veuillez écrire un message',
            'min_length' => '10 caractères au minimum',
          ),
       ),

      );

      public $messageRules = array(

         'objet_contact' => array(
            'label' => 'objet_contact',
            'rules' => 'is_natural',
            'errors' => array(
            'is_natural' => 'Veuillez choisir un objet pour la demande',
            ),
         ),

         'contenu_contact' => array(
          'label' => 'contenu_contact',
          'rules' => 'required|min_length[10]',
          'errors' => array(
            'required' => 'Veuillez écrire un message',
            'min_length' => '10 caractères au minimum',
          ),
       ),

      );

      public $commentaireRules = array(

         'contenu' => array(
         'label' => 'contenu',
         'rules' => 'required|min_length[2]',
         'errors' => array(
           'required' => 'Veuillez écrire un message',
           'min_length' => '2 caractères au minimum',
          ),
        ),
      );


      public $avatarRules = array(
        'avatar' => array(
          'label' => 'avatar',
          'rules' => 'uploaded[avatar]|max_size[avatar, 2048]|is_image[avatar]',
          'errors' => array(
            'uploaded' => 'choisir une image',
            'max_size' => 'fichier trop volumineux',
            'is_image' => 'Ceci n\'est pas une image',
          ),
        ),
      );

      public $addRecetteRules = array(
        
        'image' => array(
            'label' => 'image',
            'rules' => 'uploaded[image]|max_size[image, 2048]|is_image[image]',
            'errors' => array(
              'uploaded' => 'insérer une image',
              'max_size' => 'fichier trop volumineux',
              'is_image' => 'Ceci n\'est pas une image',
            ),
          ),

        'categorie_id' => array(
            'label' => 'categorie_id',
            'rules' => 'is_natural',
            'errors' => array(
              'is_natural' => 'Choisir une catégorie',
            ),
          ),

       'sousCategorie_id' => array(
            'label' => 'sousCategorie_id',
            'rules' => 'is_natural',
            'errors' => array(
              'is_natural' => 'Choisir une sous catégorie',
          ),
        ),

      'titre' => array(
          'label' => 'titre',
          'rules' => 'required|min_length[5]',
          'errors' => array(
            'required' => 'Le titre est obligatoire',
            'min_length' => '5 caractères au minimum',
          ),
        ),

        'description' => array(
          'label' => 'description',
          'rules' => 'required|min_length[10]',
          'errors' => array(
            'required' => 'Ajouter une decription',
            'min_length' => '10 caractères au minimum',
          ),
        ),


      'difficulte' => array(
          'label' => 'difficulte',
          'rules' => 'is_natural',
          'errors' => array(
            'is_natural' => 'Choisir une difficulté',
          ),
        ),

      'duree' => array(
          'label' => 'duree',
          'rules' => 'required|numeric',
          'errors' => array(
            'required' => 'renseigner la durée',
            'numeric' => 'indiquer uniquement les chiffres'
          ),
        ),

      'nbPart' => array(
          'label' => 'nbPart',
          'rules' => 'required|numeric',
          'errors' => array(
            'required' => 'info obligatoire',
            'numeric' => 'indiquer uniquement les chiffres'
          ),
        ),

        'ingredient' => array(
            'label' => 'ingredient',
            'rules' => 'min_length[5]',
            'errors' => array(
              'min_length' => 'renseigner au moins 1 ingrédient'
          ),
        ),

        'etape' => array(
            'label' => 'etape',
            'rules' => 'min_length[20]',
            'errors' => array(
              'min_length' => 'renseigner au moins 1 étape'
            ),
        ),
      );

      public $categorieRules = array(

        'nom_categorie' => array(
        'label' => 'nom_categorie',
        'rules' => 'required|min_length[2]',
        'errors' => array(
          'required' => 'Veuillez remplir le champs',
          'min_length' => '2 caractères au minimum',
          ),
        ),
      );

      public $sousCategorieRules = array(

        'nom_souscat' => array(
        'label' => 'nom_souscat',
        'rules' => 'required|min_length[2]',
        'errors' => array(
          'required' => 'Veuillez remplir le champs',
          'min_length' => '2 caractères au minimum',
          ),
        ),

        'categorie_id' => array(
          'label' => 'categorie_id',
          'rules' => 'is_natural',
          'errors' => array(
            'is_natural' => 'le choix d\'une catégorie associée est obligatoire ',
            ),
          ),
      );


      public $tagRules = array(

        'nom_tag' => array(
        'label' => 'nom_tag',
        'rules' => 'required|min_length[2]',
        'errors' => array(
          'required' => 'Veuillez remplir le champs',
          'min_length' => '2 caractères au minimum',
          ),
        ),

        'parent_id' => array(
          'label' => 'parent_id',
          'rules' => 'is_natural',
          'errors' => array(
            'is_natural' => 'choisir une thématique',
            ),
          ),

          'isAdmin' => array(
            'label' => 'isAdmin',
            'rules' => 'is_natural',
            'errors' => array(
              'is_natural' => 'veuillez choisir une réponse',
              ),
            ),
      );

      public $editMembreRules = array(
        'avatar' => array(
          'label' => 'avatar',
          'rules' => 'max_size[avatar, 2048]|is_image[avatar]',
          'errors' => array(
            'max_size' => 'fichier trop volumineux',
            'is_image' => 'Ceci n\'est pas une image',
          ),
        ),

        'statut_id' => array(
          'label' => 'statut_id',
          'rules' => 'is_natural',
          'errors' => array(
            'is_natural' => 'choisir un statut',
            ),
          ),
      );



}


