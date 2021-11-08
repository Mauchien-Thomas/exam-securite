<?php
require_once('bddconnetion.php');
?>
<!DOCTYPE html>
<html>
  <body>
<div>
<ul>
  <li><a href="avec_faille_XSS.php">Faille XSS</a></li>
</ul>
</div>

<h1>faille INJECTION SQL</h1>
    <form action='' method='post'>
     <input type="text" name = "identifiant" placeholder="identifiant" >
     <input type="password" name = "password" placeholder="Mot de passe">
        <button name="valider" value="valider" >Valider</button>
    </form>
</body>
</html>
<?php
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
