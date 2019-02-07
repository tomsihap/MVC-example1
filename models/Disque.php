<?php

class Disque extends Db {
    
    protected $id;
    protected $titre;
    protected $artiste;

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
}