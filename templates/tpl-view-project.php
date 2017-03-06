<?php
include_once 'templates/tpl-main-top.php';
?>

<h1 class="app titre">Projet « <?php echo $o['name']; ?> »</h1>

<div class="métadonnées">
	<span class="dossier">Dossier: <b><?php echo $o['dossier']; ?></b></a>
</div>

<div class="métadonnées">
	<span class="heading">Liens</span>
	<a href="<?php echo $o['main_pad']; ?>" class="nuage">Pad principal</a>
	<a href="<?php echo $o['cover_pad']; ?>" class="wiki">Page de garde</a>
</div>

<div class="actions">
	<a href="editer.php?type=project&id=<?php echo $o['rowid']; ?>" type="submit" class="bouton">
		Éditer
	</a>
</div>



<?php
include_once 'templates/tpl-main-bottom.php';
?>