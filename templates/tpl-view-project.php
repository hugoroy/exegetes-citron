<?php
include_once 'templates/tpl-main-top.php';
?>

<body id="view-project-<?php echo $o['rowid']; ?>" class="page-view-project">

    <h1 class="app titre">
      <a href="/voir.php?type=dossier&id=<?php echo $o['dossier_id']; ?>" class="dossier" id="<?php echo $o['dossier']; ?>"><?php echo $o['dossier']; ?></a> / 
    <?php echo $o['name']; ?>
	    <a href="editer.php?type=project&id=<?php echo $o['rowid']; ?>" class="modifier">
		    Éditer
	    </a>
    </h1>

    <div class="métadonnées hide">
      <span class="heading">Dossier</span>
      <a href="/voir.php?type=dossier&id=<?php echo $o['dossier_id']; ?>" class="dossier" id="<?php echo $o['dossier']; ?>"><?php echo $o['dossier']; ?></a>
    </div>


    <div class="voir">
	<form action="/bartender/shake" method="get">
	<div class="form-group hidden">
	    <label for="projetId">Identifiant:</label>
	    <input type="text" class="form-control" id="projetId" name="projetId" value="<?php echo $o['rowid']; ?>" placeholder="">
	</div>
	<div class="form-group">
	    <label for="projetPadPrincipal">Pad principal:</label>
	    <input type="url" class="form-control hidden" id="projetPadPrincipal" name="projetPadPrincipal" placeholder="https://pad.exegetes.eu.org/" value="<?php echo $o['main_pad']; ?>">
        <a href="<?php echo $o['main_pad']; ?>"><?php echo $o['main_pad']; ?></a>
	</div>
	<div class="form-group">
	    <label for="projetPadGarde">Page de garde:</label>
	    <input type="url" class="form-control hidden" id="projetPadGarde" name="projetPadGarde" placeholder="https://pad.exegetes.eu.org/" value="<?php echo $o['cover_pad']; ?>">
        <a href="<?php echo $o['cover_pad']; ?>"><?php echo $o['cover_pad']; ?></a>
	</div>
	<div class="form-group hidden">
	    <label for="projetPadAutre1">Autre pad: <a href="#">Ajouter</a></label>
	    <input type="url" class="form-control hidden" id="projetPadAutre1" name="projetPadAutre1" placeholder="https://pad.exegetes.eu.org/">
	</div>
	<div class="form-group hidden">
	    <label for="projetDossier">Dossier: <a href="ajout-dossier.html">(Nouveau dossier ?)</a></label>
	    <select name="dossier" id="dossiers" multiple="" class="form-control input-lg select2 select2-offscreen" tabindex="-1">
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

	<div class="actions"> 
	    <button type="submit" class="bouton presse">Presser</button>
	</div>
	</form>
    </div>

    <div class="ressources">
    <h3>Télécharger</h3>
      <a class="pdf" href="/beta/<?php echo $o['dossier_id']; ?>/<?php echo $o['rowid']; ?>.pdf">PDF</a>
      <a class="docx" href="/beta/<?php echo $o['dossier_id']; ?>/<?php echo $o['rowid']; ?>.docx">Docx</a>
      <a class="html5" href="/beta/<?php echo $o['dossier_id']; ?>/<?php echo $o['rowid']; ?>.html">HTML</a>
      <a class="txt" href="/beta/<?php echo $o['dossier_id']; ?>/<?php echo $o['rowid']; ?>.txt">Texte</a>
      <br />Dernière compilation :&nbsp;<div id="statusmsg"></div>
    </div>

<script>
$(document).ready(function() {
    jQuery.get('/bartender/status?dossier=<?php echo $o['dossier_id']; ?>&projetId=<?php echo $o['rowid']; ?>', function(data) {
        $("#statusmsg").html(data["text"]);
    });
});
</script>

<?php
include_once 'templates/tpl-main-bottom.php';
?>
