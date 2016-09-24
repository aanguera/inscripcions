<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <head>
      <title>Inscripcions Hivernal del Bages</title>
   </head>
   
   <body>
		<h2>Inscripcions Hivernal del Bages 2017</h2>
		<form action="pas2.php" method="post">
		<fieldset>
			<legend>Dades personals</legend>
			<p><label>Non: <input type="text" name="nom" size="30" maxlength="50"> </label></p>
			<p><label>Cognoms: <input type="text" name="cognoms" size="60" maxlength="80"> </label></p>
			<p><label>Email: <input type="text" name="email" size="60" maxlength="80"> </label></p>
			<p><label>Mòbil: <input type="text" name="mobil1" size="9" maxlength="13"> </label></p>
			<p><label>Telf. cas d'emergència: <input type="text" name="telf2" size="9" maxlength="13"> </label></p>
			<p><label for="type">Federació</label>
			<input type="radio" name="federacio" value="F" /> Federat
			<input type="radio" name="federacio" value="N" /> No federat
			</p>
		</fieldset>
		<p><input type="submit" name="submit" value="Següent"</p>
		
		</form>
      <?php
      	                  			
		?>
      
   </body>
</html>
