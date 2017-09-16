    
    <nav class="projets sidebar">
      <span class="heading">Projets</span>
			<?php
			foreach ($projects as $main_p) {
				echo "
					<a class='projet' href='voir.php?type=project&id={$main_p['rowid']}'>{$main_p['name']}</a>
				";
			}
			?>
      <a href="/" class="vers-index">Revenir à l'index des dossiers</a>
    </nav>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap3/js/bootstrap.min.js"></script>
  </body>
</html>
