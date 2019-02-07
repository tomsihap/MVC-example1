<?php

class EmprunteursController {

    public function index() {

        $emprunteurs = Emprunteurs::findAll();
        view('emprunteurs.index', compact());

    }

    public function show($id) {

        $emprunteur = Emprunteurs::find($id);
        view('emprunteurs.show', compact());

    }

    public function add() {

        view('emprunteurs.add', compact());

    }

    public function save() {

    }

    public function delete($id) {

        $emprunteur = Emprunteurs::delete($id);
        Header('Location: /');
    }
}