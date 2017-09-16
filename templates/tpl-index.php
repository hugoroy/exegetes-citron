<?php
include_once 'templates/tpl-main-top.php';
?>

<body id="index">

    <h1>Presse à Citron</h1>

    <p class="bievenue">
	Bienvenue ! <strong>Sélectionne parmi les derniers projets à
    gauche</strong> ou bien <a href="editer.php?type=project">ajoute
    un nouveau projet</a> (ou <a href="editer.php?type=dossier">un
    nouveau dossier</a>) !
    </p>

    <nav class="dossiers hide hidden">
    <h2>Liste des dossiers</h2>
			<?php
			foreach ($dossiers as $main_d) {
				echo "
                <div class='dossier {$main_d['rowid']}'>
					<a href='voir.php?type=dossier&id={$main_d['rowid']}' class='name'>{$main_d['name']}</a>
                    (<a href='{$main_d['cloud_link']}' class='nuage'>Nuage</a>, <a href='{$main_d['wiki_link']}' class='wiki'>Wiki</a>)<!--/FIXME Lien vers dernier pad créé dans ce dossier-->
                </div>
				";
			}
			?>
    </nav>


    <nav class="projets">
    <h2>Liste des projets</h2>
			<?php
			foreach ($projects as $main_p) {
				echo "
                <div class='projet {$main_d['rowid']}'>
                    <a href='/voir.php?type=dossier&id={$o['dossier_id']}' class='dossier'>{$o['dossier']}</a>
					<a href='voir.php?type=project&id={$main_p['rowid']}' class='name'>{$main_p['name']}</a>
                </div>
				";
			}
			?>
    </nav>

<?php
include_once 'templates/tpl-main-bottom.php';
?>
