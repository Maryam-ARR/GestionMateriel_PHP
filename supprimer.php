<?php 

session_start();
if(isset($_GET['supprimer']))

  if($_GET['numero']=='' ){
    $_SESSION['message']="veuillez entrer le numero d'ordre !!";
    $_SESSION['msg_type']="danger";
    header("location:suprimerform.php");
}
else{
$mysqli=new mysqli('localhost','root','','gestion materiel','3308') or die(mysqli_error($mysqli));
 
 if(isset($_GET['supprimer'])){
     $numD=$_GET['numero'];
     $result= $mysqli->query("SELECT*FROM `materiels scientifiques` WHERE `numero_ordre`=$numD");
     if(mysqli_num_rows($result)){
      $mysqli->query("DELETE FROM `materiels scientifiques` WHERE numero_ordre=$numD") ;
        
      $_SESSION['message']="Le matériel est supprimer avec succée ";
      $_SESSION['msg_type']="success";
        header("location:suprimerform.php");
     }else {
           $_SESSION['message']="Le numero d'ordre n'exist pas !!";
           $_SESSION['msg_type']="danger";
           header("location:suprimerform.php");
       
       
        } 
    }}
 ?>