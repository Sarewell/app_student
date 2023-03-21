<?php
// recupere la conexion a la bdd
require_once('database.php');
require_once('helpers/_function.php');
// je stok la conexion dans $pdo
$pdo = pdo();
/**
 * get all items in DBB
 */
function getAll($table, $order="")
{
    global $pdo;
    $sql = "SELECT * FROM $table"; 

    if ($order){
        $sql .=" ORDER BY " . $order;
    }

    $query = $pdo->prepare($sql);

    $query->execute();

    $items = $query->fetchAll();

    return $items;
}
function getId()
{
    if(!empty($_GET['id']) && isset($_GET['id'])  && is_numeric($_GET['id']))
    {
        //on netoye notre id
        $id = cleanInput($_GET['id']);
    }else{
        $_SESSION['error']= "etudiant inconu";
        header('location:index.php');
    }
    return $id;
}

function get($table)
{
    global $pdo;
    $id =getId();


    //on fai la requette 
    $sql = "SELECT * FROM $table where id= :id";
      //prepare la requete
    $query = $pdo->prepare($sql);
    //on asocie la requette a un parametre
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    //exedcute la requette
    $query->execute();
    $item = $query->fetch();
    // debug_array($student);
    //pas de students redirect

    if(!$item){
        $_SESSION['error']= "etudiant inconu";
        header('location:index.php');
    }
    return $item;
}