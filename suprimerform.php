<!DOCTYPE html>
<html>

	<head>
		<title>supprimer</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <style>
            #grad {
            height: 400;
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
<?php  require_once( 'supprimer.php' ); ?>
<?php if(isset($_SESSION['message'])):?>
    <div class="alert alert-<?=$_SESSION['msg_type']?>">
    <?php echo $_SESSION['message']?>
    <?php unset ($_SESSION['message'])?>
    </div>
<?php endif;?>
<br>
<div class="row justify-content-center">
    <form action="supprimer.php" method="GET">
    <fieldset>
        <legend >Supprimer Materiel</legend>
    <div class="form-group">
    <label>Numero d'Ordre</label><br>
    <input type="text" name="numero" class="form-control" value="">
    </div>
   
    <div class="form-group">
    <button type="submit" name="supprimer" class="btn btn-primary" value="supprimer" onClick="return confirmation()">Supprimer</button>
    <button type="reset" name="annuler" class="btn btn-danger"value="annuler">Annuler</button>

    <script type="text/javascript">
		 function confirmation(){ 
			var sup=confirm('Vous voulez supprimer ce Matériel ?');		
		    return sup;   
			}
				</script> 
    </div>
    </fieldset>
    </form>
    </div>
    <br> <br> <br> <br> <br> <br> <br> <br> 
</body>

 
</html> 