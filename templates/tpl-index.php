<?php
include_once 'templates/tpl-main-top.php';
?>


<h1>Presse à Citron</h1>

<p class="bienvenue">
	Choisis un projet ou bien <a href="editer.php">ajoute un nouveau projet</a> !
</p>


<ul class='projects'>
	<?php
	foreach ($projects as $p) {
		echo "
			<li>
				<a href='voir.php?id={$p['rowid']}'>{$p['name']}</a>
				-
				<i><span>{$p['dossier']}</span></i>
			</div>
		";
	}
	?>
</ul>
	

<?php
include_once 'templates/tpl-main-bottom.php';
?>