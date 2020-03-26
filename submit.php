<?php 

try{
    include('connect.php');
}
catch(PDOException $e){
    die('erreur: ' . $e->getMessage(). '<br>');
}

if(isset($_POST['tache'])){
    $tache= $_POST['tache'];

    $newtache=filter_var($tache, FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES);
    $sql= $bdd->query("INSERT INTO todo (`todo`) VALUES ('$newtache')");
    header('location:index.php');
}
else if(isset($_POST['idtoarchive'])){
    $id= $_POST['idtoarchive'];
    $sql= "
    INSERT INTO archive (`todo`) SELECT (`todo`) FROM todo WHERE id= $id;
    DELETE FROM todo WHERE id= $id;
    ";
    $bdd->exec($sql);
}
else{
    header("location: index.php");
}
