<?php

class EmprunteursController {

    public function index() {

        $emprunteurs = Emprunteur::findAll();
        view('emprunteurs.index');

    }

    public function show($id) {

        $emprunteur = Emprunteur::find($id);
        view('emprunteurs.show');

    }

    public function add() {

        view('emprunteurs.add');

    }

    public function save() {

    }

    public function delete($id) {

        $emprunteur = Emprunteur::delete($id);
        Header('Location: /');
    }
}