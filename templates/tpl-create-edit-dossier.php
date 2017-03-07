<?php
include_once 'templates/tpl-main-top.php';
?>

<body id="create-edit-dossier-<?php echo $o['rowid']; ?>" class="page-create-edit-dossier">


<h1><?php echo $o['rowid'] ? "Éditer « {$o['name']} »" : 'Créer un dossier'; ?></h1>

<div class="éditer">
	<form method="post">
		
		<input type="hidden" name="action" value="create-edit" />
		<input type="hidden" name="type" value="dossier" />
		<input type="hidden" name="rowid" value="<?php echo $o['rowid']; ?>" />
		
		<div class="form-group">
			<label>Nom du dossier :</label>
			<input type="text" class="form-control" name="name" value="<?php echo $o['name']; ?>">
		</div>
		<div class="form-group">
			<label>Lien cloud :</label>
			<input type="text" class="form-control" name="cloud_link" value="<?php echo $o['cloud_link']; ?>" placeholder="https://nuage.exegetes.eu.org/index.php/apps/files?dir=/Commun/">
		</div>
		<div class="form-group">
			<label>Lien wiki :</label>
			<input type="text" class="form-control" name="wiki_link" value="<?php echo $o['wiki_link']; ?>" placeholder="https://exegetes.eu.org/amateurs/doku.php?id=affaire:">
		</div>
		<div class="actions">
			<button type="submit" class="bouton">
				<?php echo $o['rowid'] ? 'Enregistrer': 'Créer'; ?>
			</button>
		</div>
	</form>
	<div class="actions">
		<form method="post">
			<input type="hidden" name="action" value="delete" />
			<input type="hidden" name="type" value="dossier" />
			<input type="hidden" name="id" value="<?php echo $o['rowid']; ?>" />
			<button type="submit" class="bouton" style="font-size: 80%;">
				Supprimer
			</button>
		</form>
	</div>
</div>


<?php
include_once 'templates/tpl-main-bottom.php';
?>