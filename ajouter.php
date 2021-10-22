<?php
session_start();
   if(isset($_POST['ajouter'])){
       if($_POST['designation']=='' || $_POST['categorie']=='' || $_POST['fournisseur']=='' ||
         $_POST['prixHT']=='' || $_POST['date']=='' )
           { 
             $_SESSION['message']="veuillez entrer toutes les informations demandées !! ";
             $_SESSION['msg_type']="danger";
             header("location:ajouterForm.php");}
     elseif($_POST['numero']=='' ){
   $_SESSION['message']="veuillez entrer le numero d'ordre !!";
   $_SESSION['msg_type']="danger";
   header("location:ajouterForm.php");
   }
   else{
      $numero=$_POST['numero'];
     $depart=$_POST['departement'];
     $categorie=$_POST['categorie'];
     $design=$_POST['designation'];
     $fourni=$_POST['fournisseur'];
     $Prix=$_POST['prixHT'];
     $date=$_POST['date'];
     $mysqli=new mysqli('localhost','root','','gestion materiel','3308') or die(mysqli_error($mysqli));
     $result= $mysqli->query("SELECT*FROM `materiels scientifiques`
      WHERE `numero_ordre`=$numero");
        if(mysqli_num_rows($result)){
       $_SESSION['message']="Le matériel exist dèjà !!";
      $_SESSION['msg_type']="danger";
      header("location:ajouterForm.php"); 
    }else{
     $mysqli->query("INSERT INTO `materiels scientifiques`(
         `numero_ordre`,`Departement`, `categorie`, `designation`, 
         `fournisseur`, `prixHT`, `date_aquisition`)
         VALUES('$numero','$depart','$categorie','$design','$fourni','$Prix','$date')");
        $_SESSION['message']="Le matériel est ajouter avec succés ";
        $_SESSION['msg_type']="success";
         header("location:ajouterForm.php"); 
      
    }
     
    $mysqli->close();
      }}
 ?>