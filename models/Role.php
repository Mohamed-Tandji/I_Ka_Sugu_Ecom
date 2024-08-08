<?php
class Role extends Model{
    const ADMIN="admin";
    const CLIENT="client";

    private $_nom;
    private $_id;

    public function __construct(){
        $this->table="role";
        $this->getConnection();

    }

    public function getNom(){
        return $this->_nom;
    }
    
    public function setNom($nom){
        if(!isset($nom) || empty($nom)){
            $this->_errors["nom"] = $nom; 
            return false;
        }
        
        $this->_nom = $nom; 
    }

    public function getId(){
        return $this->_id;
    }

    public function getIdByNom(){
        $this->_estUneLigne = true; 
        $this->_sql = "SELECT role_id FROM ".$this->table." WHERE nom= :nom"; 
        $data["nom"] = $this->_nom; 

        return $this->getLines($data);
    }




}
?>