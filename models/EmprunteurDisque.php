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
}