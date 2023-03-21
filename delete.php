<?php
 session_start();
require_once('helpers/pdo.php');
 include('helpers/_function.php');

if(!empty($_GET['id']) && isset($_GET['id'])  && is_numeric($_GET['id'])){
    //on netoye notre id
    $id = cleanInput($_GET['id']);
  //on fai la requette 
    $sql = "DELETE FROM student where id= :id";
      //prepare la requete
    $query = $pdo->prepare($sql);
    //on asocie la requette a un parametre
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    //exedcute la requette
    $query->execute();
    $_SESSION['sucess'] = "etudiant suprimer avec succées!";
}else{
    $_SESSION['error']= "id invalide";
    
    header('location:index.php');

}
?>
<h1>suprimer</h1>