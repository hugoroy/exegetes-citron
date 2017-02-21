<?php

require_once 'projects.php';


if (isset($_POST['action']))
	switch ($_POST['action']) {
		case 'create-edit':
			$ret = $db->CreateOrEditProjet($_POST);
			if (!$ret)
				echo "<pre>erreur</pre>";
			else {
				header("Location: editer.php?id=$ret");
				die();
			}
			break;
		
		case 'delete':
			$db->DeleteProject($_POST['id']);
			header('Location: index.php');
			die();
	}

$p = isset($_GET['id']) ? $projects[$_GET['id']] : $db->GetEmptyProject();

include_once 'templates/tpl-create-edit.php';


