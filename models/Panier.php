<?php
class Panier extends Model {
    const PANIER = "panier";

    

    public function __construct() {
        $this->getConnection();
        $this->table="panier";

        if(!isset($_SESSION[self::PANIER])){
            $_SESSION[self::PANIER] = [];
        }
    }

    public function suppPanier($id){
        unset($_SESSION[self::PANIER][$id]);
        return true; 
    }
    public function ajoutPanier($id, $quantite){
        $_SESSION[self::PANIER][$id] = $quantite;
        return true; 
    }

  
    public function listPanier(){
        $panierDetails = []; 

foreach ($_SESSION[self::PANIER] as $produit_id => $quantite) {
    $data = $this->getById($produit_id);

    if ($data !== false) {
        $produitDetails = $data;
        $produitDetails["Quantite"] = $quantite;

        $panierDetails[] = $produitDetails;
    }
}

    
    
        return $panierDetails; 
    }
    public function getById($Id) {
        $this->table ="produits";
        $this->_estUneLigne = true;
        $this->_sql = "SELECT * FROM ".$this->table." WHERE id = :id ";
        $myprod["id"] = $Id;
        $result = $this->getLine($myprod);
        if (!empty($result)) {
            return $result; 
        }
    
        return null; 
    }

    public function countPanier(){
        return count($_SESSION[self::PANIER]);
    }

    public function ViderPanier(){
        unset($_SESSION[self::PANIER]);

    }
}

?>