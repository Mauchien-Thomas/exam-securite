<!DOCTYPE html>
<html>
  <body>
<div>
<ul>
  <li><a href="avec_faille_sql.php">Injection SQL</a></li>
</ul>
</div>
<h1>faille XSS</h1>
    <form action='' method='post'>
     <textarea name="text" rows="5" cols="33"></textarea>
        <button name="valider" value="valider" >Valider</button>
    </form>
</body>
</html>
<?php
    if(isset($_POST['valider'])){
       echo"<p>".$_POST['text']."</p>";
    }
?>