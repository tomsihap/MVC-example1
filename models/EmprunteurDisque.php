<?php

class EmprunteurDisque extends Db {
    
    protected $id;
    protected $idEmprunteur;
    protected $idDisque;

    const TABLE_NAME = "emprunteur_disque";

    public function __construct($idEmprunteur, $idDisque, $id = null)
    {
        $this->setIdEmprunteur($idEmprunteur);
        $this->setIdDisque($idDisque);
        $this->setId($id);
    }
    /**
     * Get the value of id
     */ 
    public function id()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of id_emprunteur
     */ 
    public function idEmprunteur()
    {
        return $this->idEmprunteur;
    }

    /**
     * Set the value of id_emprunteur
     *
     * @return  self
     */ 
    public function setIdEmprunteur($idEmprunteur)
    {
        $this->idEmprunteur = $idEmprunteur;

        return $this;
    }

    /**
     * Get the value of id_disque
     */ 
    public function idDisque()
    {
        return $this->idDisque;
    }

    /**
     * Set the value of id_disque
     *
     * @return  self
     */ 
    public function setIdDisque($idDisque)
    {
        $this->idDisque = $idDisque;

        return $this;
    }

    /**
     * Méthodes CRUD :
     * - find
     * - findAll
     * - findOne
     * - save
     * - update
     * - delete
     */

    public function save() {

        $data = [
            "id_emprunteur"   => $this->idEmprunteur(),
            "id_disque"       => $this->idDisque()
        ];

        if ($this->id > 0) return $this->update();

        $nouvelId = Db::dbCreate(self::TABLE_NAME, $data);

        $this->setId($nouvelId);

        return $this;
    }

    public function update() {

        if ($this->id > 0) {

            $data = [
                "id_emprunteur"   => $this->idEmprunteur(),
                "id_disque"       => $this->idDisque(),
                "id"        => $this->id()
            ];

            Db::dbUpdate(self::TABLE_NAME, $data);

            return $this;
        }

        return;
    }

    public function delete() {
        $data = [
            'id' => $this->id(),
        ];
        
        Db::dbDelete(self::TABLE_NAME, $data);
        return;
    }

    public static function findAll($objects = true) {

        $data = Db::dbFind(self::TABLE_NAME);
        
        if ($objects) {
            $objectsList = [];

            foreach ($data as $d) {

                $objectsList[] = new EmprunteurDisque($d['id_emprunteur'], $d['id_disque'], intval($d['id']));
            }

            return $objectsList;
        }

        return $data;
    }

    public static function find(array $request, $objects = true) {

        $data = Db::dbFind(self::TABLE_NAME, $request);

        if ($objects) {
            $objectsList = [];

            foreach ($data as $d) {
                $objectsList[] = new Emprunteur($d['nom'], $d['prenom'], intval($d['id']));

            }
            return $objectsList;
        }

        return $data;
    }

    public static function findOne(int $id, $object = true) {

        $request = [
            ['id', '=', $id]
        ];

        $data = Db::dbFind(self::TABLE_NAME, $request);

        if (count($data) > 0) $data = $data[0];
        else return;

        if ($object) {
            $article = new Emprunteur($data['nom'], $data['prenom'], intval($data['id']));
            return $article;
        }

        return $data;
    }

    public function emprunteur() {
        return Emprunteur::findOne($this->idEmprunteur());
    }

    public function disque() {
        return Disque::findOne($this->idDisque());
    }
}