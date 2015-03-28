<!DOCTYPE html>
<html lang="fr"
      dir="ltr">
	<head>
		<meta charset="utf-8"/>
		<title>Bilderamme</title>
		<base href="<?php echo URL; ?>" />
		<!-- Lien vers le fichier style -->
		<link rel="stylesheet" href="public/design.css" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
	<body>
	<!-- pas de header à mettre -->
<header>
	<img id="logo" src="public/Logo.png" width="450" height="215">
	<h1><?php echo (empty($titre_page))?"titre":$titre_page; ?></h1>
	
	<form method="GET" action="profil/deconnexion">
		<input class="deconnection" type="submit" value="Deconnexion" />
	</form>
</header>