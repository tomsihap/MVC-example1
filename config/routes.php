<?php

$routes = new Router;

// Routes Emprunteurs
$routes->get('emprunteurs',             'EmprunteursController@index'); // Liste des emprunteurs
$routes->get('emprunteurs/(\d+)',       'EmprunteursController@show');  // Affichage et édition d'un emprunteur
$routes->get('emprunteurs/add',         'EmprunteursController@add');   // Formulaire d'ajout d'un emprunteur
$routes->post('emprunteurs/save',       'EmprunteursController@save');  // Servira autant à l'INSERT qu'à l'UPDATE
$routes->get('emprunteurs/delete/(\d+)','EmprunteursController@delete');// Suppression d'un emprunteur

// Routes Disques
$routes->get('disques',                 'DisquesController@index');
$routes->get('disques/(\d+)',           'DisquesController@show');
$routes->get('disques/add',             'DisquesController@add');
$routes->post('disques/save',           'DisquesController@save');
$routes->get('disques/delete/(\d+)',    'DisquesController@delete');

// La relation emprunteur_disque est en fait... des prêts ou des emprunts !
$routes->get('prets',                   'EmprunteursDisquesController@index');
$routes->get('prets/(\d+)',             'EmprunteursDisquesController@show');
$routes->get('prets/add',               'EmprunteursDisquesController@add');
$routes->post('prets/save',             'EmprunteursDisquesController@save');
$routes->get('prets/delete/(\d+)',      'EmprunteursDisquesController@delete');

$routes->get('/',                        'PagesController@home');

$routes->run();