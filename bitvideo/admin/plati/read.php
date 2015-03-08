<?php 
	require 'database.php';
	$id = null;
	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}
	
	if ( null==$id ) {
		header("Location: index.php");
	} else {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM customers where id = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		Database::disconnect();
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
    
    			<div class="span10 offset1">
    				<div class="row">
		    			<h3>Afisare client</h3>
		    		</div>
		    		
	    			<div class="form-horizontal" >
					  <div class="control-group">
					    <label class="control-label">Nume</label>
					    <div class="controls">
						    <label class="checkbox">
						     	<?php echo $data['name'];?>
						    </label>
					    </div>
					  </div>
					  <div class="control-group">
					    <label class="control-label">Adresa e-mail</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['email'];?>
						    </label>
					    </div>
					  </div>
					  <div class="control-group">
					    <label class="control-label">Telefon mobil</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['mobile'];?>
						    </label>
					    </div>
					  </div>
                                    <div class="control-group">
					    <label class="control-label">Data nasterii</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['data_nastere'];?>
						    </label>
					    </div>
					  </div>
                                    <div class="control-group">
					    <label class="control-label">Adresa</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['adresa'];?>
						    </label>
					    </div>
					  </div>
                                    <div class="control-group">
					    <label class="control-label">Data inscriere</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['data_inscriere'];?>
						    </label>
					    </div>
					  </div>
                                    <div class="control-group">
					    <label class="control-label">Data logarii</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['data_logare'];?>
						    </label>
					    </div>
					  </div>
					    <div class="form-actions">
						  <a class="btn" href="index.php">Inapoi</a>
					   </div>
					
					 
					</div>
				</div>
				
    </div> <!-- /container -->
  </body>
</html>
