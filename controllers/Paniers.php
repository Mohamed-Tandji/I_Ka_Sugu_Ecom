<?php
class Paniers extends Controller{

    public function index(){
        $panier = new Panier(); 

        $listPaniers = $panier->listPanier(); 
        $this->render("index", compact("listPaniers")); 
    }

    public function ajouterPanier($param){
        $panier = new Panier(); 
        $panier->ajoutPanier($param, 1); 

        header("Location: ".ROOTDOMAINE."paniers/index");
    }

    public function ViderPanier(){
        $panier = new Panier(); 
        $panier->ViderPanier();
        $this->render('index');
    }
    

}
?>