<!DOCTYPE html>
<html>
<?php session_start();?>
	<head>
		<title>Couts par Catégorie</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <style>
            #font{
                font-size: 20px;
                font-weight: bold;
                color: black;
                outline-style: double; 
			    
            }
            #grad {
            background-repeat: no-repeat;
            background-image: linear-gradient(to bottom right, white,royalblue );
            }
            fieldset {
            background-color: #eeeeee;
            display: block;
            margin-left: 6px;
            margin-right: 6px;
            padding-top: 0.35em;
            padding-bottom: 0.625em;
            padding-left: 0.75em;
            padding-right: 0.75em;
            border: 2px groove (internal value);
            }

            legend {
            background-color: gray;
            color: white;
            padding: 5px 10px;
            }
</style>
</head>

<body id="grad">
    
<?php if(isset($_SESSION['message'])):?>
    <div class="alert alert-<?=$_SESSION['msg_type']?>">
    <?php echo $_SESSION['message'];
    unset($_SESSION['message']);?>
    <?php endif;?>
</div>
<br>
<div class="row justify-content-center">
    <form method="POST">
    <fieldset>
        <legend >Afficher couts par Catégorie</legend>
    <div class="form-group">
    <label>Catégorie</label><br>
    <input type="categorie" name="categorie" class="form-control" value="">
    </div>
   
    <div class="form-group">
    <button type="submit" name="afficher" class="btn btn-primary" value="chercher">Afficher</button>
    <button type="reset" name="annuler" class="btn btn-danger"value="annuler">Annuler</button>
    </div>
    </fieldset>
    </form>
    </div>
<br>
<div class="container">
<?php  

if(isset($_POST['afficher'])){
 $categorie=$_POST['categorie'];
  if($categorie=='' ){
    $_SESSION['message']="Veuillez entrer la categorie !!";
    $_SESSION['msg_type']="danger";
    header("location:coutsCategorie.php");
}
else{
    $mysqli=new mysqli('localhost','root','','gestion materiel','3308') or die(mysqli_error($mysqli));
    $result=$mysqli->query("SELECT SUM(prixHT) as `prix` FROM `materiels scientifiques` Where categorie = '$categorie'")or die($mysqli->error);
    $row = mysqli_fetch_assoc($result) ;
    $mysqli->close();
    if($row['prix']==''){
        $_SESSION['message']="la categorie n'existe pas !!";
        $_SESSION['msg_type']="danger";
        header("location:coutsCategorie.php");
        
    }
    
    else{
  ?>
  <div id="font" class="row justify-content-center">
  <?php 
    echo " Le cout global de tout le matériel acheté dans la Catégorie ".$categorie." est : ".$row['prix'] ." DH";}?>
  </div>
<?php  } }?>
 <br> <br> <br> <br> <br> <br> <br> <br> 
 </body>
 </html> 
 