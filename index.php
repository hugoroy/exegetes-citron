<?php

require_once 'lib/db.php';

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

//phpinfo();
//die();

$db = new DB();
$db->GetProjects();

require_once('templates/tpl-index.php');
