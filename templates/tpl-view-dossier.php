<?php
include_once 'templates/tpl-main-top.php';
?>

<h1 class="app titre">Dossier « <?php echo $o['name']; ?> »</h1>

<div class="métadonnées">
	<span class="heading">Liens</span>
	<a href="<?php echo $o['cloud_link']; ?>" class="nuage">Nuage</a>
	<a href="<?php echo $o['wiki_link']; ?>" class="wiki">Wiki</a>
</div>

<div class="actions">
	<a href="editer.php?type=dossier&id=<?php echo $o['rowid']; ?>" type="submit" class="bouton">
		Éditer
	</a>
</div>



<?php
include_once 'templates/tpl-main-bottom.php';
?>