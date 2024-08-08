<?php
class Produits extends Controller{

    public function index(){
        $this->loadModel("Produit");
        $lstProduits=$this->Produit->getAll();
        $this->render('index',compact("lstProduits"));

    }
    public function menuAd(){
        $this->loadModel("Produit");
        $lstProduits=$this->Produit->getAll();
        $this->render('menuAd',compact("lstProduits"));

    }

    public function lire($id){
        $this->loadModel("Produit");
        $this->Produit->id=$id;
        $Produit=$this->Produit->getOne();
        $this->render('lire',compact('produit'));
    }

    public function ajout(){
        $this->loadModel("Produit");
      
        if(isset($_POST['Enregistrer'])){
            $errors = $this->Produit->testData($_POST);
            
            if(count($errors) > 0){
                $this->render('ajout', $errors);
                return;
            } else {
                $this->Produit->saveImg($_POST); 
                $this->menuAd(); 
            }
        }
        $this->render('ajout'); 
    }
    
    public function modifier($produit_id){
        $this->loadModel("Produit");
        if(isset($produit_id)) {
        $this->render('modifier');

        if(isset($_POST['Modifier'])){
            $errors = $this->Produit->testData($_POST);
            $_POST["id"]= intval($produit_id);
            if(count($errors) > 0){
                $this->render('modifier', $errors);
                return;
            } else {
                $this->Produit->saveImgUp($_POST); 
            }        
        
        }

        $this->render('menuAd');             

    }
}
    
   

    public function supprimer($produit_id){
        $this->loadModel("Produit");       
         if(isset($produit_id)) {
            $data["id"]= intval($produit_id);
            $this->Produit->supprimer($data); 
            echo " Suppression reussit ";

        } else {
            echo "Erreur lors de la suppression!!!";
        }        
        header("Location: ".ROOTDOMAINE."produits/menuAd"); 

    }
    
    


}


?>