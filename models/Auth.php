<?php

class Auth extends Model{

public function __construct(){
    $this->table="utilisateur";
    $this->getConnection();
}

public function register($data){
    $error=$this->testData($data);
    if(count($error)){
        return false;
    }

    $this->_estUneLigne=true;
    $this->_sql="INSERT INTO ".$this->table."(nom, prenom, email, password,id_role)
    VALUES(:nom, :prenom, :email, :password,:id_role)";

    return $this->estExecute($data);


}

public function verifierMdp($pw, $cpw){
    return $pw === $cpw;
}

public function isAdmin(){
    if($this->getUserSession()){
        return $_SESSION[$this->table]["nomRole"] === Role::ADMIN;
    }
    return false;
}

public function sessionSave($utilisateur){
    $_SESSION[$this->table] = $utilisateur;
}

public function deconnexion(){
    unset($_SESSION[$this->table]);
}

public function getUserSession(){
    if(isset($_SESSION[$this->table])){
        return $_SESSION[$this->table];
    }
    return false;
}

public function verifierEmail($email){
    $this->_estUneLigne=true;
    $this->_sql= "SELECT utilisateur.*,role.nom AS nomRole FROM ".$this->table." JOIN role On ".$this->table.".id_role = role.role_id where email= :email";
    
    return $this->getLines($email); 
}


}

?>