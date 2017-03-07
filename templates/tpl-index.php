<?php
include_once 'templates/tpl-main-top.php';
?>

<body id="index">

    <h1>Presse à Citron</h1>

    <p class="bievenue">
	Bienvenue ! Le presse citron est encore en version beta. <strong>Sélectionne un projet à gauche</strong> ou bien
        <a href="editer.php?type=project">ajoute un nouveau projet</a> (ou <a href="editer.php?type=dossier">un nouveau dossier</a>) !
    </p>

    <div class="éditer hidden" id="ajouter">
	<form>
	<div class="form-group">
	    <label for="projetNom">Nom du projet:</label>
	    <input type="text" class="form-control" id="projetNom" name="projetNom" placeholder="Projet de mémoire">
	</div>
	<!--div class="form-group">
	    <label for="projetId">Identifiant:</label>
	    <input type="text" class="form-control" id="projetId" name="projetId" placeholder="(automatiquement suggéré en fonction du nom)">
	</div-->
	<div class="form-group">
	    <label for="projetDossier">Dossier: <a href="/editer.php?type=dossier">(Nouveau dossier ?)</a></label>
	    <select name="dossier" id="dossiers" multiple="" class="form-control input-lg select2 select2-offscreen" tabindex="-1">
		<option value="intveld">In 't Veld</option>
		<option value="abroretention">Abrogation de la rétention des données</option>
		<option value="tes">Fichier TES</option>
		<option value="orangefail">#OrangeFail</option>
		<option value="prishield">Privacy Shield</option>
	    </select>
	</div>
	<div class="actions"> 
	    <button type="submit" class="disabled btn btn-lg">Ajouter</button>
	</div>
	</form>
    </div>



<?php
include_once 'templates/tpl-main-bottom.php';
?>
