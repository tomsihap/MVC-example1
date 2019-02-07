<?php

class EmprunteursDisquesController {

    public function index() {

        $prets = EmprunteurDisque::findAll();
        view('emprunteursDisques.index', compact());

    }

    public function show($id) {

        $pret = EmprunteurDisque::find($id);
        view('emprunteursDisques.show', compact());

    }

    public function add() {

        view('emprunteursDisques.add', compact());

    }

    public function save() {

    }

    public function delete($id) {

        $pret = EmprunteurDisque::delete($id);

        Header('Location: /');
    }
}