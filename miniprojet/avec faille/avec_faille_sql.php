<?php
require_once('bddconnetion.php');
// $resultat = $pdo ->query("SELECT * FROM Utilisateurs");
// var_dump($resultat);

// $pdo->query("CREATE TABLE IF NOT EXISTS Utilisateurs ( 
//   id            VARCHAR( 250 )         PRIMARY KEY,
//   mdp           VARCHAR( 250 )
// );");

// $stmt = $pdo->prepare("INSERT INTO Utilisateurs (id, mdp) VALUES (:id, :mdp)");
// $result = $stmt->execute(array(
//     'id'         => "admin",
//     'mdp'       =>  "thomas"
// ));

// identifiant = admin, mot de passe = thomas
// 'OR 1 = 1 /*

// $stmt = $pdo->prepare("SELECT * FROM Utilisateurs WHERE id = :id");
// $stmt->execute(array('id' => 'admin'));
// $result = $stmt->fetchAll();
// print_r($result);

echo '<div class="menu">'
.'<ul>'
  .'<li><a href="avec_faille_XSS.php">Faille XSS</a></li>'
.'</ul>'
.'</div>';

echo'<h1>faille INJECTION SQL</h1>'
    ."<form action='' method='post'>"
     .'<input type="text" name = "identifiant" placeholder="identifiant" >'
     .'<input type="password" name = "password" placeholder="Mot de passe">'
        .'<button name="valider" value="valider" >Valider</button>'
    .'</form>';

    if(isset($_POST['valider'])){

      $id = trim($_POST['identifiant']);
      $mdp = trim($_POST['password']);
 
    $stmt = $pdo->prepare("SELECT * FROM Utilisateurs WHERE id = :id");
    $stmt->execute(array("id" => $id));
    $result = $stmt->fetchAll();

        if($result[0]['mdp'] == $mdp)
          echo 'vous etes connectées.';
        else
          echo'Le mot de passe est incorrecte.';
   
    }
 

?>