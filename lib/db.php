<?php

class DB extends SQLite3 {
	
	private $open = false;
	
	public function __construct () {}
	
	
	/*
	 * If the db is saying "unable to open database":
	 * Check the db.sqlite's permmisions:
	 * - chmod 775 /path/to/webapp/db.sqlite
	 * Check the db.sqlite's parent directory permissions
	 * - chmod 775 /path/to/webapp/
	 * - chown username:www-data /path/to/webapp
	 */
	private function ensure_connection () {
		
		if (!$this->open) {
			$this->open('db.sqlite');
			$this->open = true;
		} else {
			$this->close();
			$this->open('db.sqlite');
		}
		
		// Create tables if they don't exist
		if (!@$this->query('SELECT * FROM dossiers LIMIT 1')) {
			$res = $this->query('
				CREATE TABLE dossiers (
					name varchar(128),
					slugname varchar(128),
					cloud_link varchar(1024),
					wiki_link varchar(1024),
					pads_link varchar(1024),
					last_edit_date datetime
				)
			');
			if ($res)
				echo "<pre>created dossiers table</pre>";
			else
				echo "<pre>error creating dossiers table: ".$this->lastErrorMsg()."</pre>";
		}
		if (!@$this->query('SELECT * FROM projects LIMIT 1')) {
			$res = $this->query('
				CREATE TABLE projects (
					name varchar(128),
					slugname varchar(128),
					dossier_id integer,
					main_pad varchar(1024),
					cover_pad varchar(1024),
					pads text,
					last_edit_date datetime
				)
			');
			if ($res)
				echo "<pre>created projects table</pre>";
			else
				echo "<pre>error creating projects table: ".$this->lastErrorMsg()."</pre>";
		}
		
		// Add columns that don't exist (retro-compatibility)
		// TODO: have a version number (in db/table comment ?) so that we don't have to blindly query
		@$this->query('ALTER TABLE dossiers ADD pads_link varchar(1024)');
		
		return true;
	}
	
	
	public function GetObjects ($type) {
		$this->ensure_connection();
		
		if (!in_array($type,['dossiers','projects'])) {
			echo "<pre>mistake '$type'</pre>";
			return [];
		}
		
		$results = $this->query("SELECT rowid, * FROM $type");
		$objects = [];
		
		while ($o = $results->fetchArray(SQLITE3_ASSOC))
			$objects[$o['rowid']] = $o;
		
		return $objects;
	}
	
	
	public function GetEmptyObject ($type) {
		switch ($type) {
			case 'dossier':
				return [
					'rowid'=>'',
					'name'=>'',
					'slugname'=>'',
					'cloud_link'=>'',
					'wiki_link'=>'',
					'pads_link'=>'',
					'last_edit_date'=>'',
				];
			
			case 'project':
				return [
					'rowid'=>'',
					'name'=>'',
					'slugname'=>'',
					'dossier_id'=>'',
					'dossier'=>'',
					'main_pad'=>'',
					'cover_pad'=>'',
					'pads'=>'',
					'last_edit_date'=>'',
				];
		}
	}
	
	
	public function CreateOrEdit ($type,$params) {
		switch ($type) {
			case 'dossier':
				return $this->CreateOrEditDossier($params);
			case 'project':
				return $this->CreateOrEditProject($params);
		}
	}
	
	
	public function CreateOrEditDossier ($params) {
		$this->ensure_connection();
		
		// EDITION
		if (isset($params['rowid']) && $params['rowid']) {
			
			$q = $this->prepare("
				UPDATE dossiers
				SET
					name = :name,
					cloud_link = :cloud_link,
					wiki_link = :wiki_link,
					pads_link = :pads_link,
					last_edit_date = datetime('now')
				WHERE
					rowid = :rowid
			");
			
			$q->bindValue(':name', $params['name'], SQLITE3_TEXT);
			$q->bindValue(':cloud_link', $params['cloud_link'], SQLITE3_TEXT);
			$q->bindValue(':wiki_link', $params['wiki_link'], SQLITE3_TEXT);
			$q->bindValue(':pads_link', $params['pads_link'], SQLITE3_TEXT);
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
				INSERT INTO dossiers
					(name, slugname, cloud_link, wiki_link, pads_link, last_edit_date)
				VALUES
					(:name, :slugname, :cloud_link, :wiki_link, :pads_link, datetime('now'))
			");
			
			$q->bindValue(':name', $params['name'], SQLITE3_TEXT);
			$q->bindValue(':slugname', $slug, SQLITE3_TEXT);
			$q->bindValue(':cloud_link', $params['cloud_link'], SQLITE3_TEXT);
			$q->bindValue(':wiki_link', $params['wiki_link'], SQLITE3_TEXT);
			$q->bindValue(':pads_link', $params['pads_link'], SQLITE3_TEXT);
			
			$result = $q->execute();
			
			if ($result)
				return $this->lastInsertRowID();
		}
		
		return false;
	}
	
	
	public function CreateOrEditProject ($params) {
		$this->ensure_connection();
		
//		$params['pads'] = json_encode($params['pads']);
		
		// EDITION
		if (isset($params['rowid']) && $params['rowid']) {
			
			$q = $this->prepare("
				UPDATE projects
				SET
					name = :name,
					dossier_id = :dossier_id,
					main_pad = :main_pad,
					cover_pad = :cover_pad,
					pads = :pads,
					last_edit_date = datetime('now')
				WHERE
					rowid = :rowid
			");
			
			$q->bindValue(':name', $params['name'], SQLITE3_TEXT);
			$q->bindValue(':dossier_id', $params['dossier_id'], SQLITE3_INTEGER);
			$q->bindValue(':main_pad', $params['main_pad'], SQLITE3_TEXT);
			$q->bindValue(':cover_pad', $params['cover_pad'], SQLITE3_TEXT);
			$q->bindValue(':pads', 'TODO', SQLITE3_TEXT);
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
					(name, slugname, dossier_id, main_pad, cover_pad, last_edit_date)
				VALUES
					(:name, :slugname, :dossier_id, :main_pad, :cover_pad, datetime('now'))
			");
			
			$q->bindValue(':name', $params['name'], SQLITE3_TEXT);
			$q->bindValue(':slugname', $slug, SQLITE3_TEXT);
			$q->bindValue(':dossier_id', $params['dossier_id'], SQLITE3_INTEGER);
			$q->bindValue(':main_pad', $params['main_pad'], SQLITE3_TEXT);
			$q->bindValue(':cover_pad', $params['cover_pad'], SQLITE3_TEXT);
			$q->bindValue(':pads', $params['pads'], SQLITE3_TEXT);
			
			$result = $q->execute();
			
			if ($result)
				return $this->lastInsertRowID();
		}
		
		return false;
	}
	
	
	public function Delete ($type,$id) {
		switch ($type) {
			case 'dossier':
				return $this->DeleteDossier($id);
			case 'project':
				return $this->DeleteProject($id);
		}
	}
	
	public function DeleteDossier ($id) {
		$this->ensure_connection();
		
		$q = $this->prepare("DELETE FROM dossiers WHERE rowid = :rowid");
		$q->bindValue(':rowid', $id, SQLITE3_INTEGER);
		$result = $q->execute();
		
		if (!$result)
			echo "<pre>Error deleting dossier $id: ".$this->lastErrorMsg()."</pre>";
		
		return $result?true:false;
	}
	
	public function DeleteProject ($id) {
		$this->ensure_connection();
		
		$q = $this->prepare("DELETE FROM projects WHERE rowid = :rowid");
		$q->bindValue(':rowid', $id, SQLITE3_INTEGER);
		$result = $q->execute();
		
		if (!$result)
			echo "<pre>Error deleting project $id: ".$this->lastErrorMsg()."</pre>";
		
		return $result?true:false;
	}
	
}