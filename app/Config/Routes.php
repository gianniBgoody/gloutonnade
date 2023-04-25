<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// routes de Landing
$routes->add('/', 'Landing::accueil');
$routes->add('login', 'Landing::formLogin');
$routes->add('inscription', 'Landing::formInscription');

// routes de Session
$routes->add('session', 'Session::sessionIndex');
$routes->add('deconnexion', 'Session::deconnexion');
$routes->add('ajoutRecette', 'Session::ajoutRecette');
$routes->add('commentaire', 'Session::ficheRecette');


// routes de Membres pour le backend et CRUD membre
$routes->add('compte', 'Membre::compteMembre');
$routes->add('message', 'Membre::contactAdmin');
$routes->add('commentaireRecette/(:num)', 'Session::editCommentByMembre/$1');
$routes->add('commentaireRecetteDelete/(:num)', 'Session::deleteCommentByMembre/$1');

// routes qui affichent toutes les recettes d'une seule catégorie ou tags ou WhereIn (tableau de plusieurs catégories ou tags)
$routes->add('saison','Session::getRecetteBySaison');
$routes->add('vegetarien','Session::getVegetarien');
$routes->add('iode','Session::getIodeAll');
$routes->add('sucre','Session::getSucreAll');


// routes unique avec $id pour les thématiques
$routes->add('recette/(:num)','Session::ficheRecette/$1');
$routes->add('categorie/(:num)','Session::getRecetteByCategorieId/$1');
$routes->add('tag/(:num)','Session::getRecetteByTagId/$1');
$routes->add('contribution/(:num)','Admin::contributionMembre/$1');


// routes de Admin
$routes->add('admin', 'Admin::adminIndex');
$routes->add('adminMembre','Admin::adminMembre');
$routes->add('adminDatabase','Admin::adminDatabase');
$routes->add('adminRecette','Admin::adminRecette');
$routes->add('adminComment', 'Admin::adminComment');
$routes->add('adminAjoutCat', 'Admin::adminAjoutCategorie');
$routes->add('adminAjoutSouscat', 'Admin::adminAjoutSousCategorie');
$routes->add('adminAjoutTag', 'Admin::adminAjoutTag');

// routes pour le CRUD Admin
$routes->add('adminDatabaseCat/(:num)', 'Admin::editCategorie/$1');
$routes->add('adminDatabaseSouscat/(:num)', 'Admin::editSousCat/$1');
$routes->add('adminDatabaseTag/(:num)', 'Admin::editTag/$1');
$routes->add('adminDatabaseMembre/(:num)', 'Admin::editMembre/$1');
$routes->add('adminDatabaseComment/(:num)', 'Admin::editComment/$1');

$routes->add('adminDeleteCat/(:num)', 'Admin::deleteCategorie/$1');
$routes->add('adminDeleteSouscat/(:num)', 'Admin::deleteSousCat/$1');
$routes->add('adminDeleteTag/(:num)', 'Admin::deleteTag/$1');
$routes->add('adminDeleteMessage/(:num)', 'Admin::deleteMessage/$1');







/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
