<!DOCTYPE html>
<html lang="fr-fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exégètes - Presse à Citron</title>

    <!-- Bootstrap -->
    <!-- <link href="bootstrap3/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body id="index">
		
<!--		<nav class="dossiers">
			<h2>Liste des dossiers</h2>
			<a href="/intveld/">In 't Veld</a>
			<a href="/abroretention/">Abrogation de la rétention des données</a>
		</nav>-->

		<nav class="projets">
			<a href="index.php" class="heading">Projets</a>
			<?php
			foreach ($projects as $main_p) {
				echo "
					<a href='voir.php?type=project&id={$main_p['rowid']}'>{$main_p['name']}</a>
				";
			}
			?>
			<a href="editer.php?type=project"><i>Créer un projet</i></a>
			
			<br/>
			<a href="index.php" class="heading">Dossiers</a>
			<?php
			foreach ($dossiers as $main_d) {
				echo "
					<a href='voir.php?type=dossier&id={$main_d['rowid']}'>{$main_d['name']}</a>
				";
			}
			?>
			<a href="editer.php?type=dossier"><i>Créer un dossier</i></a>
		</nav>