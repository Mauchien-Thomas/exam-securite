<?php
require_once('bddconnetion.php');
?>
<!DOCTYPE html>
<html>
  <body>
    <div>
<ul>
  <li><a href="sans_faille_XSS.php">Faille XSS</a></li>
</ul>
</div>

<h1>faille INJECTION SQL</h1>
    <form action='' method='post'>
     <input type="text" name = "identifiant" placeholder="identifiant" required="required">
     <input type="password" name = "password" placeholder="Mot de passe"required="required">
        <button name="valider" value="valider" >Valider</button>
    </form>
</body>
</html>
<?php
    if(!empty($_POST['valider'])){

      $id = trim(htmlspecialchars($_POST['identifiant']));
      $mdp = trim(htmlspecialchars($_POST['password']));
      
      $stmt = $pdo->prepare("SELECT * FROM Utilisateurs WHERE id = :id");
      $stmt->bindValue(':id',$id);
      $stmt->execute();
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      
      if(empty($result))
        echo'lidentifiant ne ce trouve pas dans la base.';
      else

        if($result[0]['mdp'] == $mdp)
          echo'vous etes connectées.';
        else
          echo'identifiant ou mot de passe incorecte.';

   //la commande sleep vas ralentir l'attaque par un script
   sleep(1);
    }
 

?>