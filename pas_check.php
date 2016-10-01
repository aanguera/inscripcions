<?php
/* Program name: pas_check.php
 * Description: script que verifica que les dades hagin introuit correctament
 * 				 si són correctes les introduieix a la base de dades 
 */
?>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <head>
      <title>Inscripcions Hivernal del Bages</title>
   </head>
   
   <body>
		
   <?php
   	echo "<h2>Verificació de dades</h2>";
      include 'config.php';
      
		/* Check information from form */      
      foreach($_POST as $field => $value)
      {
			/*Check each field for blank fields */
			if($value == "") 
			{
				$blank_array[] = $field;
			}      
      }
      /* if any fields are empty, display error message and form */
      if(@sizeof($blank_array) > 0)
      {
      	echo "<b> No has entrat els seguents camps</b><br>";
   //   	foreach($blank_array as $value)
     // 	{
			//	echo "$value<br>" 
			print_r(array_values($blank_array));     	
      //	} 
      	/*return to the previous page */
//      	header("Location: {$_SERVER['HTTP_REFERER']}");
//     	exit;	
      }
      
      else {
      	echo "<h3>Dades introduides correctament</h3><br>"; 
      
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
      
      	mysql_close($dbConnected);
      }   
   ?>
      
   </body>
</html>
