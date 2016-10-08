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
      
      // !!!!!!!!!!   	
      	print_r(array_values($_POST));
   // !!!!!!!!!!!!!!
      
      /* Set up array of field labels */
      $labels = array("nom" => "Nom",
      					 "cognoms" => "Cognoms",
      					 "email" => "Eamil",
      					 "mobil1" => "Mòbil",
      					 "telf2" => "Telèfom emergencia",
      					 "federacio" => "Federació");
      
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
      	
			echo "&nbsp;&nbsp;&nbsp";      	
      	
      	foreach($blank_array as $value)
      	{
				echo "&nbsp;&nbsp;&nbsp;{labels[$value]}<br>"; 
			//print_r(array_values($blank_array));     	
      	} 
      	/* Redisplay form */
      	echo "<p><hr />";
      	echo "<h3>Entra les dades que falten </h3>";
      	echo "<form action='pas_check.php' method='POST'><table>";
      	foreach($labels as $field => $label)
      	{
      		$good_data[$field]=strip_tags(trim($_POST[$field]));
      		echo "<tr>
      				<td style='text-align: right; font-weight: bold'>$label</td>
      				<td><input type='text' name='$field' size='65'
      					maxlength='65' value='$good_data[$field]'></td>
      				</tr>";
      	}
      	echo "<tr>
      			<td colspan='2' style='text-align: center'>
      				<input type='submit' value='Guarda dades'>";
      	echo "</td></tr></table></form>";
      	
      	
// !!!!!!!!!!   	
      	print_r(array_values($good_data));
   // !!!!!!!!!!!!!!      	
      	
      	exit();
      	
      	
      	/*return to the previous page */
//      	header("Location: {$_SERVER['HTTP_REFERER']}");
//     	exit;	
      }
   
      else {
      	echo "<h3>Dades introduides correctament</h3><br>"; 
   
   
      
			$dbConnected = mysql_connect($hostname, $username, $password);
			$dbSelected = mysql_select_db($databasename, $dbConnected);
  
			$fields_all = array_keys($labels);
	
			
	// !!!!!!!!!!   	
     	print_r(array_values($_POST));
   // !!!!!!!!!!!!!!		
   
			
			foreach($fields_all as $field)
			{
				$good_data[$field] = strip_tags(trim($_POST[$field]));
				echo "hello";
							
			} 
	echo"<br />";		
	// !!!!!!!!!!   	
      	print_r(array_values($good_data));
   // !!!!!!!!!!!!!!
     		
			 
  	//		$good_data[$field] = mysqli_real_escape_string($dbConnected,$good_data[$field]);
  
  
			if ($dbConnected) { //check the connection to mysqlserver
				echo "MySQL connection OK <br>";
				if ($dbSelected) {
					echo "DB connection OK<br>";	
					} else {
				echo "DB connection FAILED<br>";
				}	
			}
			
// !!!!!!!!!!   	
      	print_r(array_values($good_data));
   // !!!!!!!!!!!!!!				
			
		
			$query = "INSERT INTO Inscrits (nom,cognoms,email,mobil,telf,federacio)
						VALUES ('$good_data[nom]','$good_data[cognoms]','$good_data[email]','$good_data[mobil1]',
									'$good_data[telf2]','$good_data[federacio]')";
			$result = mysql_query($query)
						or die ("Could not execute");      
      
      	mysql_close($dbConnected);
      }   
   ?>
      
   </body>
</html>
