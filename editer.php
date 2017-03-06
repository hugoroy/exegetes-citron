<?php

require_once 'objects.php';


if (isset($_POST['action']))
	switch ($_POST['action']) {
		case 'create-edit':
			$ret = $db->CreateOrEdit($_POST['type'],$_POST);
			if (!$ret)
				echo "<pre>erreur</pre>";
			else {
				header("Location: voir.php?type={$_POST['type']}&id=$ret");
				die();
			}
			break;
		
		case 'delete':
			if ($db->Delete($_POST['type'],$_POST['id'])) {
				header('Location: index.php');
				die();
			}
	}

if ($_GET['type'] == 'dossier') {
	$o = isset($_GET['id']) ? $dossiers[$_GET['id']] : $db->GetEmptyObject($_GET['type']);
	include_once 'templates/tpl-create-edit-dossier.php';
} else {
	$o = isset($_GET['id']) ? $projects[$_GET['id']] : $db->GetEmptyObject($_GET['type']);
	include_once 'templates/tpl-create-edit-project.php';
}


