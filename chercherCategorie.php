<!DOCTYPE html>
<html>
<?php session_start();?>
	<head>
		<title>chercher materiel</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <style>
             #tb{
                background-color: white;
            }
            #grad {
            
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
    <form method="GET">
    <fieldset>
        <legend >Chercher Matériel par Catégorie</legend>
    <div class="form-group">
    <label>Catégirie</label><br>
    <input type="categorie" name="categorie" class="form-control" value="">
    </div>
   
    <div class="form-group">
    <button type="submit" name="Chercher" class="btn btn-primary" value="chercher">Chercher</button>
    <button type="reset" name="annuler" class="btn btn-danger"value="annuler">Annuler</button>
    </div>
    </fieldset>
    </form>
    </div>

<div class="container">
<?php  

if(isset($_GET['Chercher'])):

  if($_GET['categorie']=='' ){
    $_SESSION['message']="veuillez entrer la categorie !!";
    $_SESSION['msg_type']="danger";
    header("location:chercherCategorie.php");
}
else{

    $categorie=$_GET['categorie'];

 $mysqli=new mysqli('localhost','root','','gestion materiel','3308') or die(mysqli_error($mysqli));
 $result=$mysqli->query("SELECT * FROM `materiels scientifiques`Where categorie='$categorie'");
 
  if(!mysqli_num_rows($result)){
    $_SESSION['message']="La categorie saisie n'existe pas !!";
    $_SESSION['msg_type']="danger";
    header("location:chercherCategorie.php");
 }
    else{
  ?>
   <br>
  <div class="row justify-content-center">
      <table id="tb" class="table table-striped">
        <thead>
            <tr>
                <th>Numero d'ordre</th>
                <th>Département</th>
                <th>Catégorie</th>
                <th>Désignation</th>
                <th>Fournisseur</th>
                <th>Prix HT</th>
                <th>Date d'Aquisition</th>
            </tr>
        </thead>
        <?php
        while($row=$result->fetch_assoc()):
        ?>
        <tr>
            <td><?php echo $row['numero_ordre']?></td>
            <td><?php echo $row['Departement']?></td>
            <td><?php echo $row['categorie']?></td>
            <td><?php echo $row['designation']?></td>
            <td><?php echo $row['fournisseur']?></td>
            <td><?php echo $row['prixHT']?></td>
            <td><?php echo $row['date_aquisition']?></td>
          
        </tr>
<?php endwhile;
$mysqli->close(); ?>
      </table>
  </div>
  <?php 
    function pre_r($array){
        echo'<pre>';
        print_r($array);
        echo'</pre>';
    }
?>
 <?php }} endif;?>
 <br> <br> <br> <br> <br> <br> <br> <br> 
 </body>
 </html> 