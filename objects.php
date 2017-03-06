<?php

require_once 'lib/db.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$db = new DB();
$projects = $db->GetObjects('projects');
$dossiers = $db->GetObjects('dossiers');

foreach ($projects as &$p)
	$p['dossier'] = isset($dossiers[$p['dossier_id']]) ? $dossiers[$p['dossier_id']]['name'] : '';

//echo "<pre>".count($dossiers)." dossiers et ".count($projects)." projets\n</pre>";
