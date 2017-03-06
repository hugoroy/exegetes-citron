
    <nav class="dossiers hide">
    <h2>Liste des dossiers</h2>
			<?php
			foreach ($dossiers as $main_d) {
				echo "
					<a href='voir.php?type=dossier&id={$main_d['rowid']}'>{$main_d['name']}</a>
				";
			}
			?>
    </nav>
    
    <nav class="projets">
      <span class="heading">Projets</span>
			<?php
			foreach ($projects as $main_p) {
				echo "
					<a href='voir.php?type=project&id={$main_p['rowid']}'>{$main_p['name']}</a>
				";
			}
			?>
      <a href="index.html" class="vers-index">Revenir à l'index des dossiers</a>
    </nav>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap3/js/bootstrap.min.js"></script>
  </body>
</html>
