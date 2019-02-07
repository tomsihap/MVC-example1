<?php

class EmprunteurDisque extends Db {
    
    protected $id;
    protected $idEmprunteur;
    protected $idDisque;

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
}