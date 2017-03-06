<?php
include_once 'templates/tpl-main-top.php';
?>


<h1>Presse à Citron</h1>


<h2>Liste des projets</h2>
<p class="bienvenue">
	Choisis un projet ou bien <a href="editer.php?type=project">ajoute un nouveau projet</a>.
</p>
<ul class='projects'>
	<?php
	foreach ($projects as $o) {
		echo "
			<li>
				<a href='voir.php?type=project&id={$o['rowid']}'>{$o['name']}</a>
				-
				<i><span>{$o['dossier']}</span></i>
			</div>
		";
	}
	?>
</ul>

<h2>Liste des dossiers</h2>
<p class="bienvenue">
	Choisis un dossier ou bien <a href="editer.php?type=dossier">ajoute un nouveau dossier</a>.
</p>
<ul class='dossiers'>
	<?php
	foreach ($dossiers as $o) {
		echo "
			<li>
				<a href='voir.php?type=dossier&id={$o['rowid']}'>{$o['name']}</a>
			</div>
		";
	}
	?>
</ul>
	

<?php
include_once 'templates/tpl-main-bottom.php';
?>