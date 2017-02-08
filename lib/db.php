<?php

class DB extends SQLite3 {
	
	private $db = null;
	
	public function __construct () {
		
	}
	
	private function ensure_connection () {
		if (!is_null($this->db))
			return;
		
		$this->open('db.sqlite');
		
		if (!$this->ensure_tables()) {
			echo "error";
			return;
		}
	}
	
	private function ensure_tables () {
		try {
			$this->query('SELECT * FROM projects LIMIT 1');
			return true;
		} catch (Exception $e) {
			try {
				$this->query('
					CREATE TABLE projects (
						name varchar(128),
						slugname varchar(128),
						dossier varchar(128),
						cloud_link varchar(1024),
						wiki_link varchar(1024),
						last_edit_date datetime
					)
				');
			} catch (Exception $e) {
				var_dump($e);
			}
			return false;
		}
	}
	
	public function GetProjects () {
		$this->ensure_connection();
		
		return [];
	}
	
}
