<?php 
	
	require 'database.php';

	if ( !empty($_POST)) {
		// keep track validation errors
		$nameError = null;
		$emailError = null;
		$mobileError = null;
                $datanastereError = null;
                $adresaError = null;
                $datainscriereError = null;
                $datalogareError = null;
            
		
		// keep track post values
		$name = $_POST['name'];
		$email = $_POST['email'];
		$mobile = $_POST['mobile'];
                $datanastere = $_POST['data_nastere'];
                $adresa = $_POST['adresa'];
                $datainscriere = $_POST['data_inscriere'];
		$datalogare = $_POST['data_logare'];
		// validate input
		$valid = true;
		if (empty($name)) {
			$nameError = 'Va rugam introduceti un nume';
			$valid = false;
		}
		
		if (empty($email)) {
			$emailError = 'Va rugam introduceti o adresa de email';
			$valid = false;
		} else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
			$emailError = 'Please enter a valid Email Address';
			$valid = false;
		}
		
		if (empty($mobile)) {
			$mobileError = 'Va rugam introduceti un telefon';
			$valid = false;
		}
                if (empty($datanastere)) {
			$datanastereError = 'Va rugam introduceti data nasterii';
			$valid = false;
		}
                if (empty($adresa)) {
			$adresaError = 'Va rugam introduceti adresa';
			$valid = false;
		}
                if (empty($datainscriere)) {
			$datainscriereError = 'Va rugam introduceti data inscrierii';
			$valid = false;
		}
                if (empty($datalogare)) {
			$datalogareError = 'Va rugam introduceti data logarii';
			$valid = false;
		}
		
		// inserare date
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO plati (name,email,mobile,data_nastere,adresa,data_inscriere,data_logare) values(?, ?, ?, ?, ?, ?, ?)";
			$q = $pdo->prepare($sql);
			$q->execute(array($name,$email,$mobile,$datanastere,$adresa,$datainscriere,$datalogare));
			Database::disconnect();
			header("Location: index.php");
		}
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
		    			<h3>Creare client</h3>
		    		</div>
    		
	    			<form class="form-horizontal" action="create.php" method="post">
					  <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
					    <label class="control-label">Nume</label>
					    <div class="controls">
					      	<input name="name" type="text"  placeholder="Nume" value="<?php echo !empty($name)?$name:'';?>">
					      	<?php if (!empty($nameError)): ?>
					      		<span class="help-inline"><?php echo $nameError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
					  <div class="control-group <?php echo !empty($emailError)?'error':'';?>">
					    <label class="control-label">Email</label>
					    <div class="controls">
					      	<input name="email" type="text" placeholder="Adresa Email" value="<?php echo !empty($email)?$email:'';?>">
					      	<?php if (!empty($emailError)): ?>
					      		<span class="help-inline"><?php echo $emailError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
					  <div class="control-group <?php echo !empty($mobileError)?'error':'';?>">
					    <label class="control-label">Mobil</label>
					    <div class="controls">
					      	<input name="mobile" type="text"  placeholder="Telefon mobil" value="<?php echo !empty($mobile)?$mobile:'';?>">
					      	<?php if (!empty($mobileError)): ?>
					      		<span class="help-inline"><?php echo $mobileError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
                                    <div class="control-group <?php echo !empty($datanastereError)?'error':'';?>">
					    <label class="control-label">Data nastere</label>
					    <div class="controls">
					      	<input name="data_nastere" type="text"  placeholder="Data nastere" value="<?php echo !empty($datanastere)?$datanastere:'';?>">
					      	<?php if (!empty($datanastereError)): ?>
					      		<span class="help-inline"><?php echo $datanastereError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
                                    <div class="control-group <?php echo !empty($adresaError)?'error':'';?>">
					    <label class="control-label">Adresa</label>
					    <div class="controls">
					      	<input name="adresa" type="text"  placeholder="Adresa" value="<?php echo !empty($adresa)?$adresa:'';?>">
					      	<?php if (!empty($adresaError)): ?>
					      		<span class="help-inline"><?php echo $adresaError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
                                    <div class="control-group <?php echo !empty($datainscriereError)?'error':'';?>">
					    <label class="control-label">Data Inscriere</label>
					    <div class="controls">
					      	<input name="data_inscriere" type="text"  placeholder="Data inscriere" value="<?php echo !empty($datainscriere)?$datainscriere:'';?>">
					      	<?php if (!empty($datainscriereError)): ?>
					      		<span class="help-inline"><?php echo $datainscriereError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
                                    <div class="control-group <?php echo !empty($datalogareError)?'error':'';?>">
					    <label class="control-label">Data logare</label>
					    <div class="controls">
					      	<input name="data_logare" type="text"  placeholder="Data logare" value="<?php echo !empty($datalogare)?$datalogare:'';?>">
					      	<?php if (!empty($datalogareError)): ?>
					      		<span class="help-inline"><?php echo $datalogareError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
                                    
					  <div class="form-actions">
						  <button type="submit" class="btn btn-success">Creare</button>
						  <a class="btn" href="index.php">Inapoi</a>
						</div>
					</form>
				</div>
				
    </div> <!-- /container -->
  </body>
</html>
