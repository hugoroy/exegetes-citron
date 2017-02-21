<?php
include_once 'templates/tpl-main-top.php';
?>

<h1><?php echo $p['rowid'] ? "Éditer « {$p['name']} »" : 'Créer un projet'; ?></h1>

<div class="éditer">
	<form method="post">
		
		<input type="hidden" name="action" value="create-edit" />
		<input type="hidden" name="rowid" value="<?php echo $p['rowid']; ?>" />
		
		<div class="form-group">
			<label>Nom du projet :</label>
			<input type="text" class="form-control" name="name" value="<?php echo $p['name']; ?>" placeholder="Projet de mémoire">
		</div>
		<div class="form-group">
			<label>Dossier :</label>
			<input type="text" class="form-control" name="dossier" value="<?php echo $p['dossier']; ?>" placeholder="Le dossier de rattachement">
<!--			<select name="dossier" id="dossiers" multiple="" class="form-control input-lg select2 select2-offscreen" tabindex="-1">
				<option value="intveld">In 't Veld</option>
				<option value="abroretention">Abrogation de la rétention des données</option>
				<option value="tes">Fichier TES</option>
				<option value="orangefail">#OrangeFail</option>
				<option value="prishield">Privacy Shield</option>
			</select>-->
		</div>
		<div class="form-group">
			<label>Lien cloud :</label>
			<input type="text" class="form-control" name="cloud_link" value="<?php echo $p['cloud_link']; ?>" placeholder="Lien vers le nuage">
		</div>
		<div class="form-group">
			<label>Lien wiki :</label>
			<input type="text" class="form-control" name="wiki_link" value="<?php echo $p['wiki_link']; ?>" placeholder="Lien vers le wiki">
		</div>
		<div class="actions">
			<button type="submit" class="bouton">
				<?php echo $p['rowid'] ? 'Enregistrer': 'Créer'; ?>
			</button>
		</div>
	</form>
	<div class="actions">
		<form method="post">
			<input type="hidden" name="action" value="delete" />
			<input type="hidden" name="id" value="<?php echo $p['rowid']; ?> />" />
			<button type="submit" class="bouton" style="font-size: 80%;">
				Supprimer
			</button>
		</form>
	</div>
</div>


<?php
include_once 'templates/tpl-main-bottom.php';
?>