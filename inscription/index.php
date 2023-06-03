

<!DOCTYPE html>
<html>
<head>
	<title>Inscription</title>
	<link rel="stylesheet" type="text/css" href="style_formulaire.css">
</head>
<body>
	<form action="test.php" method="post">
		<h2>Inscription</h2>

		<label for="gender">Sexe :</label>
		<select id="gender" name="gender"  value ="<?php echo $_POST['gender']?>"required>
			<option value="">Vous êtes :</option>
			<option value="homme">Homme</option>
			<option value="femme">Femme</option>
		</select><br>

		<label for="firstname">Nom :</label>
		<input type="text" id="firstname" name="firstname" value ="<?php echo $_POST['firstname']?>"required ><br>

		<label for="lastname">Prénom :</label>
		<input type="text" id="lastname" name="lastname" value ="<?php echo $_POST['lastname']?>" required><br>
		
		<label for="username">Nom utilisateur:</label>
		<input type="text" id="username" name="username"  value ="<?php echo $_POST['username']?>" required><br>


		<label for="mail">Email :</label>
		<input type="email" id="mail" name="mail"  value ="<?php echo $_POST['mail']?>" required><br>

		
		<label for="password">Mot de passe :</label>
		<input type="password" id="password" name="password"  required><br>


		<label for="birthdate">Date de naissance :</label>
		<input type="date" id="birthdate" name="birthdate"  value ="<?php echo $_POST['birthdate']?>" required><br>


		<label for="country">Pays de Naissance:</label>
		<input type="text" id="country" name="country"  value ="<?php echo $_POST['country']?>" required><br>

		<input type="submit" value="S'inscrire">
	</form>
	<p>


</body>
</html>

