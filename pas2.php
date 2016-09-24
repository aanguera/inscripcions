<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <head>
      <title>Inscripcions Hivernal del Bages</title>
   </head>
   
   <body>
		
   <?php
   	echo "<h2>Registre de dades</h2>";
      include 'config.php';
		$dbConnected = mysql_connect($hostname, $username, $password);
		$dbSelected = mysql_select_db($databasename, $dbConnected);

		if ($dbConnected) { //check the connection to mysqlserver
			echo "MySQL connection OK <br>";
			if ($dbSelected) {
				echo "DB connection OK<br>";	
				} else {
			echo "DB connection FAILED<br>";
			}	
		}
		
		$query = "INSERT INTO Inscrits (nom,cognoms,email,mobil,telf,federacio)
					VALUES ('$_POST[nom]','$_POST[cognoms]','$_POST[email]','$_POST[mobil1]',
								'$_POST[telf2]','$_POST[federacio]')";
		$result = mysql_query($query)
					or die ("Could not execute");      
      
 //        echo $_POST["federacio"];    
 //        echo $_POST["nom"];
      mysql_close($dbConnected);   
   ?>
      
   </body>
</html>
