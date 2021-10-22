<!DOCTYPE html>
<html>

	<head>
		<title>ajouter</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <style>
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
<?php  require_once( 'ajouter.php' ); ?>
<?php if(isset($_SESSION['message'])):?>
    <div class="alert alert-<?=$_SESSION['msg_type']?>">
    <?php echo $_SESSION['message'];
    unset($_SESSION['message']);?>
    <?php endif;?>
</div>
<br>
<div class="row justify-content-center">
    <form action="ajouter.php" method="POST">
   <fieldset>
        <legend >Ajouter Materiel</legend>
    <div class="form-group">
    <label>Numero d'Ordre</label><br>
    <input type="text" name="numero" class="form-control" value="" >
    </div>
    <div class="form-group">
    <label>Département</label><br>
    
    <input type="radio" id="GEI" name="departement" value="GEI">
    <label for="GEI">GEI</label><br>
    
    <input type="radio" id="GI" name="departement" value="GI">
    <label for="GI">GI</label><br>
    </div>
    <div class="form-group">
    <label>Catégorie</label><br>
    <input type="text" name="categorie" class="form-control" value="">
    </div>
    <div class="form-group">
    <label>Désignation</label><br>
    <input type="text" name="designation" class="form-control" value="">
    </div>
    <div class="form-group">
    <label>Fournisseur</label><br>
    <input type="text" name="fournisseur" class="form-control" value="">
    </div>
    <div class="form-group">
    <label>Prix HT</label><br>
    <input type="text" name="prixHT" class="form-control" value="">
    </div>
    <div class="form-group">
    <label>Date d'Aquisition</label><br>
    <input type="date" name="date"class="form-control" value="">
    </div>
    <div class="form-group">
    <button type="submit" name="ajouter" class="btn btn-primary" value="ajouter">Ajouter</button>
    <button type="reset" name="annuler" class="btn btn-danger"value="annuler">Annuler</button>
    </div>
   </fieldset>
    </form>
    </div> 
</div>
</body>

 
</html> 