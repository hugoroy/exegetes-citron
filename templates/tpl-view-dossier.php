<?php
include_once 'templates/tpl-main-top.php';
?>

<body id="view-dossier-<?php echo $o['rowid']; ?>" class="page-view-dossier">

<h1 class="app titre">Dossier « <?php echo $o['name']; ?> »</h1>

<div class="métadonnées">
	<span class="heading">Liens</span>
	<a href="<?php echo $o['cloud_link']; ?>" class="nuage">Nuage</a>
	<a href="<?php echo $o['wiki_link']; ?>" class="wiki">Wiki</a>
	<a href="<?php echo $o['pads']; ?>" class="pads">Pads</a>
	<a href="editer.php?type=dossier&id=<?php echo $o['rowid']; ?>" type="submit" class="bouton">
		Éditer
	</a>
</div>


    <nav class="projets">
    <h2>Liste des projets de ce dossier</h2>
    <!--
			<?php
			foreach ($projects as $main_d) {
				echo "
                <div class='projet {$main_p['rowid']}'>
					<a href='voir.php?type=project&id={$main_p['rowid']}' class='name'>{$main_p['name']}</a>
                </div>
				";
            }
			?>
    -->
    Ici vous trouverez bientôt la liste des projets attachés à ce dossier.
    </nav>


<?php
include_once 'templates/tpl-main-bottom.php';
?>