<?php

class DisquesController {
    
    public function index() {

        $disques = Disque::findAll();
        view('disques.index', compact());

    }

    public function show($id) {

        $disque = Disque::find($id);
        view('disques.show', compact());

    }

    public function add() {

        view('disques.add');

    }

    public function save() {

    }

    public function delete($id) {

        $disque = Disque::delete($id);

        Header('Location: /');
    }

}