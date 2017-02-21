<?php

class DB extends SQLite3 {
	
	private $open = false;
	
	public function __construct () {}
	
	
	private function ensure_connection () {
		
		if (!$this->open) {
			$this->open('db.sqlite');
			$this->open = true;
		} else {
			$this->close();
			$this->open('db.sqlite');
		}
		
		$table_exists = @$this->query('SELECT * FROM projects LIMIT 1');
		if (!$table_exists) {
			$res = $this->query('
				CREATE TABLE projects (
					name varchar(128),
					slugname varchar(128),
					dossier varchar(128),
					cloud_link varchar(1024),
					wiki_link varchar(1024),
					last_edit_date datetime
				)
			');
			if ($res)
				echo "<pre>created projects table</pre>";
			else
				echo "<pre>error creating projects table: ".$this->lastErrorMsg()."</pre>";
		}
		return true;
	}
	
	
	public function GetProjects () {
		$this->ensure_connection();
		
		$results = $this->query('SELECT rowid, * FROM projects');
		$projects = [];
		
		while ($project = $results->fetchArray(SQLITE3_ASSOC))
			$projects[$project['rowid']] = $project;
		
		return $projects;
	}
	
	
	public function GetEmptyProject () {
		return [
			'rowid'=>'',
			'name'=>'',
			'slugname'=>'',
			'dossier'=>'',
			'cloud_link'=>'',
			'wiki_link'=>'',
			'last_edit_date'=>'',
		];
	}
	
	
	public function CreateOrEditProjet ($params) {
		$this->ensure_connection();
		
		// EDITION
		if (isset($params['rowid']) && $params['rowid']) {
			
			$q = $this->prepare("
				UPDATE projects
				SET
					name = :name,
					dossier = :dossier,
					cloud_link = :cloud_link,
					wiki_link = :wiki_link,
					last_edit_date = datetime('now')
				WHERE
					rowid = :rowid
			");
			
			$q->bindValue(':name', $params['name'], SQLITE3_TEXT);
			$q->bindValue(':dossier', $params['dossier'], SQLITE3_TEXT);
			$q->bindValue(':cloud_link', $params['cloud_link'], SQLITE3_TEXT);
			$q->bindValue(':wiki_link', $params['wiki_link'], SQLITE3_TEXT);
			$q->bindValue(':rowid', $params['rowid'], SQLITE3_INTEGER);
			
			$result = $q->execute();
			
			if (!$result)
				echo "<pre>Erreur à l'édition: ".$this->lastErrorMsg()."</pre>";
			else
				return $params['rowid'];
		}
		
		// CREATION
		else {
			$slug = preg_replace('_\W+_','-',strtolower($params['name']));
			$slug = preg_replace('_^-|-$_','',$slug);
			
			$q = $this->prepare("
				INSERT INTO projects
					(name, slugname, dossier, cloud_link, wiki_link, last_edit_date)
				VALUES
					(:name, :slugname, :dossier, :cloud_link, :wiki_link, datetime('now'))
			");
			
			$q->bindValue(':name', $params['name'], SQLITE3_TEXT);
			$q->bindValue(':slugname', $slug, SQLITE3_TEXT);
			$q->bindValue(':dossier', $params['dossier'], SQLITE3_TEXT);
			$q->bindValue(':cloud_link', $params['cloud_link'], SQLITE3_TEXT);
			$q->bindValue(':wiki_link', $params['wiki_link'], SQLITE3_TEXT);
			
			$result = $q->execute();
			
			if ($result)
				return $this->lastInsertRowID();
		}
		
		return false;
	}
	
	
	public function test () {
		
	}
	
	public function DeleteProject ($id) {
		$this->ensure_connection();
		
		$q = $this->prepare("DELETE FROM projects WHERE rowid = :rowid");
		$q->bindValue(':rowid', $id, SQLITE3_INTEGER);
		$q->execute();
	}
	
}
