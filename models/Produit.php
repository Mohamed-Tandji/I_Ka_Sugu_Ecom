<?php
class Produit extends Model{

   public  $nomCat;

    public function __construct(){
        $this->getConnection();
        $this->table="produits";
    }
    
    public function save($data){
        unset($data['Enregistrer']);
        $nomCat=$data['nomCat'];
        $data['categorie_id']=$this->getIdByNom($nomCat);
        unset($data['nomCat']);
        $this->table="produits";
       
        $this->_sql="INSERT INTO ".$this->table."(nom,description,prix,categorie_id,url_image) VALUES (:nom,:description,:prix,:categorie_id,:url_image)";
        return $this->getLines($data);


    }

    public function getIdByNom($nomCat) {
        $this->table = "categories";
        $this->_estUneLigne = true;
        $this->_sql = "SELECT id FROM " . $this->table . " WHERE nom = :nom";
        $myCat["nom"] = $nomCat;
    
        $result = $this->getLine($myCat);
    
        if (!empty($result) && isset($result['id'])) {
            unset($myCat["nom"]);
            return $result['id']; 
        }
    
        return null; 
    }
    

     
    public function saveImg($data){

        $image_name=$_FILES["image"]["name"];
        $image_tmp=$_FILES["image"]["tmp_name"];
        $image_destination="medias\Images/".basename($image_name);
        
        $image_type=strtolower(pathinfo($image_destination,PATHINFO_EXTENSION));
        if(!in_array($image_type,array("jpg","jpeg","png","gif"))){
                echo "Seules les images sont autorisees";
                exit();
    
        }

        if (move_uploaded_file($image_tmp, $image_destination)) {
            $data["url_image"] = $image_destination;
            $this->save($data);
        } else {
        echo "Erreur lors du téléchargement du fichier.";
        }
 
    }
    public function saveImgUp($data){

        $image_name=$_FILES["image"]["name"];
        $image_tmp=$_FILES["image"]["tmp_name"];
        $image_destination="medias\Images/".basename($image_name);
        
        $image_type=strtolower(pathinfo($image_destination,PATHINFO_EXTENSION));
        if(!in_array($image_type,array("jpg","jpeg","png","gif"))){
            echo "Seules les images sont autorisees";
            exit();
    
        }

        if (move_uploaded_file($image_tmp, $image_destination)) {
            $data["url_image"] = $image_destination;
            $this->modifier($data);
        } else {
        echo "Erreur lors du téléchargement du fichier.";
        }
 
    }


    public function modifier($data){
        unset($data['Modifier']);
        $nomCat=$data['nomCat'];
        $data['categorie_id']=$this->getIdByNom($nomCat);
        unset($data['nomCat']);
        $this->table="produits";

        $this->_sql = "UPDATE " . $this->table . " SET nom = :nom, description = :description, prix = :prix, categorie_id = :categorie_id, url_image = :url_image WHERE id =".$data["id"]."";
        unset($data["id"]);

        return $this->getLines($data);


    }

    public function supprimer($data){
       $this->table="produits";
       
        $this->_sql="Delete  from ".$this->table." where id= :id";
        $this->_estUneLigne=true;
        return $this->getLines($data);
    }

}


?>