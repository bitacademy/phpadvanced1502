<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
    		<div class="row">
    			<h3>PHP CRUD (Create Read Update Delete)</h3>
    		</div>
			<div class="row">
				<p>
					<a href="create.php" class="btn btn-success">Creare</a>
				</p>
				
				<table class="table table-striped table-bordered">
		              <thead>
		                <tr>
		                  <th>Nume</th>
		                  <th>Adresa e-mail</th>
		                  <th>Telefon mobil</th>
		                  <th>Actiune</th>
		                </tr>
		              </thead>
		              <tbody>
		              <?php 
					   include 'database.php';
                                           include './classes/BaseDB.php';
					   $pdo = Database::connect();
//					   $sql = 'SELECT * FROM customers ORDER BY id DESC';
//	 				   foreach ($pdo->query($sql) as $row) {
//						   		echo '<tr>';
//							   	echo '<td>'. $row['name'] . '</td>';
//							   	echo '<td>'. $row['email'] . '</td>';
//							   	echo '<td>'. $row['mobile'] . '</td>';
//							   	echo '<td width=350>';
//							   	echo '<a class="btn" href="read.php?id='.$row['id'].'">Afiseaza</a>';
//							   	echo '&nbsp;';
//							   	echo '<a class="btn btn-success" href="update.php?id='.$row['id'].'">Actualizeaza</a>';
//							   	echo '&nbsp;';
//							   	echo '<a class="btn btn-danger" href="delete.php?id='.$row['id'].'">Sterge</a>';
//							   	echo '</td>';
//							   	echo '</tr>';
//					   }
//					   Database::disconnect();


      
?>
				      </tbody>
	            </table>
    	</div>
    </div> <!-- /container -->
  </body>
</html>
