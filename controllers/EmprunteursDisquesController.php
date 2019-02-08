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
        $pret = new EmprunteurDisque($_POST['id_emprunteur'], $_POST['id_disque'], $_POST['id']);
        $pret->save();

        Header('Location: '. url('prets'));
    }

    public function delete($id) {

        $pret = EmprunteurDisque::findOne($id);
        $pret->delete();

        Header('Location: '. url('prets'));
        exit();

    }

    public function listeNomsEmprunteurs() {

        $data = EmprunteurDisque::listeNomsEmprunteurs();
        var_dump($data);
    }

    public function nombreDisquesParEmprunteur() {

        $data = EmprunteurDisque::nombreDisquesParEmprunteur();
        var_dump($data);

    }
}