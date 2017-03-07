<?php
include_once 'templates/tpl-main-top.php';
?>

<body id="create-edit-project-<?php echo $o['rowid']; ?>" class="page-create-edit-project">

<h1><?php echo $o['rowid'] ? "Éditer le projet « {$o['name']} »" : 'Créer un projet'; ?></h1>

<div class="éditer">
	<form method="post">
		
		<input type="hidden" name="action" value="create-edit" />
		<input type="hidden" name="type" value="project" />
		<input type="hidden" name="rowid" value="<?php echo $o['rowid']; ?>" />
		
		<div class="form-group">
			<label>Nom du projet :</label>
			<input type="text" class="form-control" name="name" value="<?php echo $o['name']; ?>">
		</div>
		<div class="form-group">
			<label>Dossier : <a href="/editer.php?type=dossier">(ou bien: Nouveau dossier ?)</a></label>
			<select name="dossier_id" id="dossiers" multiple="" class="form-control input-lg select2 select2-offscreen" tabindex="-1">
				<?php foreach ($dossiers as $d) { ?>
					<option value="<?php echo $d['rowid']; ?>"
						<?php
							if ($d['rowid'] === $o['dossier_id'])
								echo " selected ";
						?>
					>
						<?php echo $d['name']; ?>
					</option>
				<?php } ?>
			</select>
		</div>
		<div class="form-group">
			<label>Pad principal :</label>
			<input type="text" class="form-control" name="main_pad" value="<?php echo $o['main_pad']; ?>" placeholder="https://pad.exegetes.eu.org/">
		</div>
		<div class="form-group">
			<label>Page de garde :</label>
			<input type="text" class="form-control" name="cover_pad" value="<?php echo $o['cover_pad']; ?>" placeholder="https://pad.exegetes.eu.org/">
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
			<input type="hidden" name="type" value="project" />
			<input type="hidden" name="id" value="<?php echo $o['rowid']; ?> />" />
			<button type="submit" class="bouton" style="font-size: 80%;">
				Supprimer
			</button>
		</form>
	</div>
</div>


<?php
include_once 'templates/tpl-main-bottom.php';
?>