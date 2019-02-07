<?php

class DisquesController {
    
    public function index() {

        $disques = Disque::findAll();
        view('disques.index', compact('disques'));

    }

    public function show($id) {

        $disque = Disque::findOne($id);
        view('disques.show', compact('disque'));

    }

    public function add() {

        view('disques.add');

    }

    public function save() {
        $disque = new Disque($_POST['titre'], $_POST['artiste'], $_POST['id']);
        $disque->save();

        Header('Location: ../disques');
    }

    public function delete($id) {

        $disque = Disque::delete($id);

        Header('Location: ../disques');
    }

}