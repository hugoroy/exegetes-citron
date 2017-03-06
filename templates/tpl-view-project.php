<?php
include_once 'templates/tpl-main-top.php';
?>

    <h1 class="app titre"><?php echo $o['name']; ?></h1>

    <div class="métadonnées">
      <span class="heading">Dossier</span>
      <a href="<?php echo $o['dossier']; ?>" class="dossier" id="<?php echo $o['dossier']; ?>"><?php echo $o['dossier']; ?></a>
    </div>
</div>

<div class="métadonnées">
	<span class="heading">Liens</span>
	<a href="<?php echo $o['main_pad']; ?>" class="nuage">Pad principal</a>
	<a href="<?php echo $o['cover_pad']; ?>" class="wiki">Page de garde</a>
</div>




    <div class="éditer">
	<form action="/bartender/shake" method="get">
	<div class="form-group hidden">
	    <label for="projetId">Identifiant:</label>
	    <input type="text" class="form-control" id="projetId" name="projetId" value="<?php echo $o['rowid']; ?>" placeholder="">
	</div>
	<div class="form-group">
	    <label for="projetPadPrincipal">Pad principal:</label>
	    <input type="url" class="form-control" id="projetPadPrincipal" name="projetPadPrincipal" placeholder="https://pad.exegetes.eu.org/" value="<?php echo $o['main_pad']; ?>">
	</div>
	<div class="form-group">
	    <label for="projetPadGarde">Page de garde:</label>
	    <input type="url" class="form-control" id="projetPadGarde" name="projetPadGarde" placeholder="https://pad.exegetes.eu.org/" value="<?php echo $o['cover_pad']; ?>">
	</div>
	<div class="form-group">
	    <label for="projetPadAutre1">Autre pad: <a href="#">Ajouter</a></label>
	    <input type="url" class="form-control hidden" id="projetPadAutre1" name="projetPadAutre1" placeholder="https://pad.exegetes.eu.org/">
	</div>
	<div class="form-group hidden">
	    <label for="projetDossier">Dossier: <a href="ajout-dossier.html">(Nouveau dossier ?)</a></label>
	    <select name="dossier" id="dossiers" multiple="" class="form-control input-lg select2 select2-offscreen" tabindex="-1">
		<option value="intveld" selected="selected">In 't Veld</option>
		<option value="abroretention">Abrogation de la rétention des données</option>
		<option value="tes">Fichier TES</option>
		<option value="orangefail">#OrangeFail</option>
		<option value="prishield">Privacy Shield</option>
	    </select>
	</div>
	<div class="actions"> 
	    <button type="submit" class="bouton presse">Presser</button>
	    <a href="editer.php?type=project&id=<?php echo $o['rowid']; ?>" type="submit" class="bouton">
		    Éditer
	    </a>
	</div>
	</form>
    </div>




<?php
include_once 'templates/tpl-main-bottom.php';
?>