<html>
<head>Citron pressé</head>
<body>
<?php
if ($_GET['run']) {
  # This code will run if ?run=true is set.
  exec("../poivre/pad2doc/compile-abro-tele2.sh");
}
?>

<!-- This link will add ?run=true to your URL, myfilename.php?run=true -->
<a href="?run=true">Click Me!</a>
</body>
</html>
