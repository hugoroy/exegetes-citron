<?php

function content () {
?>

<h1>Presse à Citron</h1>

<p class="bievenue">
	Choisis un projet ou bien <a href="#ajouter">ajoute un nouveau projet</a> !
</p>

<div class="éditer" id="ajouter">
	<form>
		<div class="form-group">
			<label for="projetNom">Nom du projet:</label>
			<input type="text" class="form-control" id="projetNom" name="projetNom" placeholder="Projet de mémoire">
		</div>
		<div class="form-group">
			<label for="projetId">Identifiant:</label>
			<input type="text" class="form-control" id="projetId" name="projetId" placeholder="(automatiquement suggéré en fonction du nom)">
		</div>
		<div class="form-group">
			<label for="projetDossier">Dossier: <a href="ajout-dossier.html">(Nouveau dossier ?)</a></label>
			<select name="dossier" id="dossiers" multiple="" class="form-control input-lg select2 select2-offscreen" tabindex="-1">
				<option value="intveld">In 't Veld</option>
				<option value="abroretention">Abrogation de la rétention des données</option>
				<option value="tes">Fichier TES</option>
				<option value="orangefail">#OrangeFail</option>
				<option value="prishield">Privacy Shield</option>
			</select>
		</div>
		<div class="actions"> 
			<button type="submit" class="bouton">Ajouter</button>
		</div>
	</form>
</div>

<nav class="dossiers">
	<h2>Liste des dossiers</h2>
	<a href="/intveld/">In 't Veld</a>
	<a href="/abroretention/">Abrogation de la rétention des données</a>
</nav>

<nav class="projets">
	<span class="heading">Projets</span>
	<a href="/replique-premierministre-csi.html">Réplique Premier Ministre CSI</a>
	<a href="/abro-tele2.html">MA Abrogation Tele2</a>
</nav>

<?php
}

require_once('templates/tpl-main.php');
main();
