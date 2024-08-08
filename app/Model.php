<?php
abstract class Model{
    private $host ="localhost";
    private $user ="root";
    private $mdp = "";
    private $port = 3306;
    private $name = "mysugudb";

    protected $table;
    protected $_connexion;
    protected $_sql;
    protected $_estUneLigne = false;
    protected $_erreurs =[];

    private $stmt;

    public $id;

    public function getConnection(){
        $this->_connexion=null;

        try{
            $this->_connexion= new PDO('mysql:host='.$this->host.';dbname='.
            $this->name,$this->user,$this->mdp);
        } catch(PDOException $e){
            echo "Erreur : ".$e->getMessage();
        }

    }

    public function getLines($params = []){
        if (!$this->estExecute($params)) {
         
            return false;
        }
        return $this->_estUneLigne ? $this->stmt->fetch(PDO::FETCH_ASSOC) :
            $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    } 

    public function getLine($params = []){
        if (!$this->estExecute($params)) {
         
            return false;
        }
        return $this->_estUneLigne ? $this->stmt->fetch(PDO::FETCH_ASSOC) :
            $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    } 
   

    public function estExecute($params = []) {
        try {
            $this->stmt = $this->_connexion->prepare($this->_sql);
            foreach ($params as $nomParam => $valParam){
                $this->stmt->bindValue(":".$nomParam, $valParam);
            }
            return $this->stmt->execute();
        } catch(PDOException $e) {
            echo "Erreur d'exécution de la requête : " . $e->getMessage();
            return false;
        }
    }
    

    public function getOne(){
        $this->_sql = "SELECT * from ".$this->table.' where id = :produit_id';
        $this->_estUneLigne = true;
        return $this->getLines(["produit_id"=>$id]);
    }
    

    public function getAll(){
        $this->_sql  = "SELECT * from ".$this->table;
        return $this->getLines();
    }

    public function testData($data){
        foreach ($data as $key => $value) {
            if(empty($value)){
                $this->_erreurs[$key] = "Le champ ".$key ." est vide";
            }
        }
        return $this->_erreurs;
    }








}


?>