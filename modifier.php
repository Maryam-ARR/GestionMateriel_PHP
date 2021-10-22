<?php
session_start();

  if (isset($_GET['modifier'])){
      if($_GET['designation']=='' || $_GET['categorie']=='' || $_GET['fournisseur']=='' ||
        $_GET['prixHT']=='' || $_GET['date']=='' )
          { 
            $_SESSION['message']="veuillez entrer toutes les informations demandées !! ";
            $_SESSION['msg_type']="danger";
            header("location:modifierForm.php");}
    elseif($_GET['numero']=='' ){
  $_SESSION['message']="veuillez entrer le numero d'ordre !!";
  $_SESSION['msg_type']="danger";
  header("location:modifierForm.php");
  }
  else{
     $numD=$_GET['numero'];
     $depart=$_GET['departement'];
     $categorie=$_GET['categorie'];
     $design=$_GET['designation'];
     $fourni=$_GET['fournisseur'];
     $Prix=$_GET['prixHT'];
     $date=$_GET['date'];

        $mysqli=new mysqli('localhost','root','','gestion materiel','3308') or die(mysqli_error($mysqli));
        $result= $mysqli->query("SELECT*FROM `materiels scientifiques` 
        WHERE `numero_ordre`=$numD");
        if(mysqli_num_rows($result)){
        $mysqli->query("UPDATE `materiels scientifiques` SET 
        `Departement`='$depart',`categorie`= '$categorie',
        `designation`='$design',`fournisseur`='$fourni',`prixHT`=$Prix,`date_aquisition`='$date' WHERE `numero_ordre`=$numD ");
        
         $_SESSION['message']="le matériel est modifier avec succé !";
         $_SESSION['msg_type']="success";
         header("location:modifierForm.php");} 
        else {
           $_SESSION['message']="Le numero d'ordre n'exist pas !!";
           $_SESSION['msg_type']="danger";
           header("location:modifierForm.php");
       $mysqli->close();
        }}}
 ?>