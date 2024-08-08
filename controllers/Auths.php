<?php 
class Auths extends Controller{

  // Méthode pour gérer l'inscription d'un utilisateur
  public function register() {
    $this->loadModel("Auth");
    $this->loadModel("Role");
    
    if (isset($_POST["envoyer"])) {
      // Validation des données postées
      $errors = $this->Auth->testData($_POST);
            
      if(count($errors) > 0){
        $this->render('register'); // Rendu de la vue 'register' en cas d'erreurs
      } else {
        if($this->Auth->verifierMdp($_POST["password"], $_POST["passwordConfirme"])){
          $email['email']=$_POST["email"];
          if($this->Auth->verifierEmail($email)){
              $errors["invalidEmail"]="l'utilisateur existe déjà";
          } else {
            $this->Role->setNom($this->Role::CLIENT);
            $role_id=($this->Role->getIdByNom());
            unset($_POST["passwordConfirme"],$_POST["envoyer"]);
            $_POST["id_role"]=$role_id["role_id"];
            $_POST["password"]=password_hash($_POST["password"], PASSWORD_DEFAULT);

            // Enregistrement de l'utilisateur dans la base de données
            $reponse = $this->Auth->register($_POST);
            var_dump($reponse);

            if($reponse){
              $this->render('login'); // Redirection vers la page de connexion
              return;
            }
          }
        }
      }
    }
    $this->render('register'); // Rendu de la vue 'register' par défaut
  }

  // Méthode de test pour afficher différentes vues en fonction d'une condition
  public function test(){
    if(true){
      $this->render("login");
      return;
    }
    
    $this->render("register");
  }
  

  // Méthode pour gérer la connexion d'un utilisateur
  public function login(){
    if (isset($_POST["envoyer"])) {
      $this->loadModel("Auth");
      $errors = $this->Auth->testData($_POST);
      $email['email'] = $_POST["email"];
      $password = $_POST['password'];
      
      $utilisateur =  $this->Auth->verifierEmail($email);
      
      
      if($utilisateur){
          if(password_verify($password, $utilisateur['password'])){
            $this->Auth->sessionSave($utilisateur);
            $this->render2("produits/index"); // Redirection vers la page d'accueil des films
          }
      }
    }
    $this->render('login'); // Rendu de la vue 'login' par défaut
  }

  public function compte(){
    $this->render('compte');
  }
}
?>
