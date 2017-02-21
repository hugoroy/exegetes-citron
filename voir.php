<?php

require_once 'projects.php';

if (!isset($_GET['id'])) {
	header('Location: index.php');
	die();
}

$p = $projects[$_GET['id']];

include_once 'templates/tpl-view.php';