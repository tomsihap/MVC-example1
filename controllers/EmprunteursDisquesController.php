<?php

class EmprunteursDisquesController {

    public function index() {

        $prets = EmprunteurDisque::findAll();

        view('emprunteursDisques.index', compact('prets'));

    }

    public function show($id) {

        $pret = EmprunteurDisque::findOne($id);
        view('emprunteursDisques.show', compact());

    }

    public function add() {

        $emprunteurs = Emprunteur::findAll();
        $disques = Disque::findAll();

        view('emprunteursDisques.add', compact('emprunteurs', 'disques'));

    }

    public function save() {
        $pret = new EmprunteurDisque($_POST['id_emprunteur'], $_POST['id_disque']);
        $pret->save();

        Header('Location: ../prets');
    }

    public function delete($id) {

        $emprunteur = Emprunteur::delete($id);
        Header('Location: ../prets');
    }
}