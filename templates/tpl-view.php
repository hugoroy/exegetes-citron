<?php
include_once 'templates/tpl-main-top.php';
?>

<h1 class="app titre"><?php echo $p['name']; ?></h1>

<div class="métadonnées">
	<span class="dossier">Dossier: <?php echo $p['dossier']; ?></a>
</div>

<div class="métadonnées">
	<span class="heading">Liens</span>
	<a href="<?php echo $p['cloud_link']; ?>" class="nuage">Nuage</a>
	<a href="<?php echo $p['wiki_link']; ?>" class="wiki">Wiki</a>
</div>

<div class="actions">
	<a href="editer.php?id=<?php echo $p['rowid']; ?>" type="submit" class="bouton">
		Éditer
	</a>
</div>



<?php
include_once 'templates/tpl-main-bottom.php';
?>