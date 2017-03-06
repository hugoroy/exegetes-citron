<?php

require_once 'objects.php';

if (!isset($_GET['id'])) {
	header('Location: index.php');
	die();
}

if ($_GET['type'] == 'dossier') {
	$o = $dossiers[$_GET['id']];
	include_once 'templates/tpl-view-dossier.php';
} else {
	$o = $projects[$_GET['id']];
	include_once 'templates/tpl-view-project.php';
}
