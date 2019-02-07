<?php

class EmprunteursController {

    public function index() {

        $emprunteurs = Emprunteur::findAll();

        view('emprunteurs.index', compact('emprunteurs'));

    }

    public function show($id) {

        $emprunteur = Emprunteur::findOne($id);
        view('emprunteurs.show', compact('emprunteur'));

    }

    public function add() {

        view('emprunteurs.add');

    }

    public function save() {
        $emprunteur = new Emprunteur($_POST['nom'], $_POST['prenom']);
        $emprunteur->save();

        Header('Location: ../emprunteurs');
    }

    public function delete($id) {

        $emprunteur = Emprunteur::delete($id);
        Header('Location: ../emprunteurs');
    }
}