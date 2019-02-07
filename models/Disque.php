<?php

class Disque extends Db {
    
    protected $id;
    protected $titre;
    protected $artiste;

    const TABLE_NAME = "disque";

    public function __construct($titre, $artiste, $id = null)
    {
        $this->setTitre($titre);
        $this->setArtiste($artiste);
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
     * Get the value of titre
     */ 
    public function titre()
    {
        return $this->titre;
    }

    /**
     * Set the value of titre
     *
     * @return  self
     */ 
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get the value of artiste
     */ 
    public function artiste()
    {
        return $this->artiste;
    }

    /**
     * Set the value of artiste
     *
     * @return  self
     */ 
    public function setArtiste($artiste)
    {
        $this->artiste = $artiste;

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
            "titre"         => $this->titre(),
            "artiste"       => $this->artiste()
        ];

        if ($this->id > 0) return $this->update();

        $nouvelId = Db::dbCreate(self::TABLE_NAME, $data);

        $this->setId($nouvelId);

        return $this;
    }

    public function update() {

        if ($this->id > 0) {

            $data = [
                "titre"     => $this->titre(),
                "artiste"   => $this->artiste(),
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