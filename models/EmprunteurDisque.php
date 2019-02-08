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
                $objectsList[] = new EmprunteurDisque($d['id_emprunteur'], $d['id_disque'], intval($d['id']));

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
            $article = new EmprunteurDisque($data['id_emprunteur'], $data['id_disque'], intval($data['id']));
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

    // Liste des noms des emprunteurs
    public static function listeNomsEmprunteurs() {

        $req = 'SELECT nom, prenom
                FROM emprunteur_disque
                INNER JOIN emprunteur ON emprunteur.id = emprunteur_disque.id';

        return $data = Db::dbQuery($req);
    }

    // Nombre de disques par emprunteur
    public static function nombreDisquesParEmprunteur() {

        $req = 'SELECT prenom, nom, count(*)
                FROM emprunteur_disque
                INNER JOIN emprunteur ON emprunteur.id = emprunteur_disque.id_emprunteur
                GROUP BY emprunteur_disque.id_emprunteur
                ';

        return $data = Db::dbQuery($req);
    }

    // Nombre d'emprunteurs
    public static function nbEmprunteurs() {

        $req = 'SELECT count(DISTINCT id_emprunteurs)
                FROM emprunteur_disque
                ';

        return $data = Db::dbQuery($req);
    }

    // Nombre de disques différents empruntés
    public static function nbDisquesEmpruntes() {

        $req = 'SELECT count(DISTINCT id_disque)
                FROM emprunteur_disque
                ';

        return $data = Db::dbQuery($req);
    }

    // Nombre d'emprunts
    public static function nbEmprunts() {

        $req = 'SELECT count(*)
                FROM emprunteur_disque
                ';

        return $data = Db::dbQuery($req);
    }

    // Liste des disques non empruntés
    public static function listeDisquesNonEmpruntes() {

        $req = 'SELECT *
                FROM disque
                LEFT JOIN emprunteur_disque ON disque.id = emprunteur_disque.id_disque
                WHERE id_emprunteur IS NULL';

        return $data = Db::dbQuery($req);
    }

    //FIXME:
    // Nombre de disques non empruntés
    public static function nbDisquesNonEmpruntes() {

        $req = 'SELECT count(DISTINCT titre)
                FROM disque
                LEFT JOIN emprunteur_disque ON disque.id = emprunteur_disque.id_disque
                WHERE id_emprunteur IS NULL';

        return $data = Db::dbQuery($req);
    }

    // Liste d'emprunteurs n'ayant rien emprunté
    public static function listeEmprunteursSansPret() {

        $req = 'SELECT prenom, nom
                FROM emprunteur
                LEFT JOIN emprunteur_disque ON emprunteur.id = emprunteur_disque.id_emprunteur
                WHERE emprunteur_disque.id_disque IS NULL';

        return $data = Db::dbQuery($req);
    }

    // Nombre de disques empruntés par Han Solo
    public static function nbDisquesHanSolo() {

        $req = 'SELECT prenom, nom, count(*)
                FROM emprunteur
                INNER JOIN emprunteur_disque ON emprunteur.id = emprunteur_disque.id_emprunteur
                WHERE emprunteur.nom = "Solo"
                GROUP BY emprunteur_disque.id_emprunteur';

        return $data = Db::dbQuery($req);   
    }

    // Liste des disques empruntés par Han Solo
    public static function listeDisquesHanSolo() {

        $req = 'SELECT titre, artiste
                FROM emprunteur
                INNER JOIN emprunteur_disque ON emprunteur.id = emprunteur_disque.id_emprunteur
                INNER JOIN disque ON disque.id = emprunteur_disque.id_disque
                WHERE emprunteur.nom = "Solo"';

        return $data = Db::dbQuery($req);
    }

    // Liste des emprunteurs, avec le nom du disque, meme ceux qui n'ont pas emprunté de disque
    public static function listeEmprunteursDisques() {
        
        $req = 'SELECT titre, artiste, nom, prenom
                FROM disque
                LEFT JOIN emprunteur_disque ON disque.id = emprunteur_disque.id_disque
                LEFT JOIN emprunteur ON emprunteur.id = emprunteur_disque.id_emprunteur';

        return $data = Db::dbQuery($req);
    }

    // FIXME:
    // Liste des disques, avec le nom de l'emprunteur, meme ceux qui n'ont pas été empruntés
}