<?php

class SQLConnect {
	var $usr;
	var $pwd;
	var $db;
	var $host;
	var $mysqli;

	function __construct()
	{
		$this->usr = "";
		$this->pwd = "";
		$this->db = "";
		$this->host = "localhost";
		$this->mysqli = new mysqli($this->host, $this->usr, $this->pwd, $this->db);
	}

	function escapeInput($_in)
	{
		return $this->mysqli->real_escape_string($_in);
	}

	function queryDB($_q)
	{
		$result = $this->mysqli->query($_q);
		$row = $result->fetch_assoc();
		return $row;
	}
	
	function saveQuery($_q){
		$this->queryDB($this->escapeInput($_q));
	}

}

class PageHandle {
	var $dbConnect;
	//voor het escapen van input

	function __construct()
	{
		$this->dbConnect = new SQLConnect();
	}

	function handleGET()
	{

		if(is_numeric($_GET[id]))
		{
			//nummer opgegeven in GET
			$clean_ID = $this->dbConnect->escapeInput($_GET['id']);
			//numeric zou al voldoende moeten zijn, maar ALTIJD input scrubben
			return $clean_ID;
		}
		else if( ! $_GET)
		{
			//geen GET data -> geland op de site
			return 1;
		}
		else
		{
			//ongeldige GET data
			return 1;
		}
	}

}

class Page {
	var $id;
	var $title;
	var $html;
	var $dbConnect;

	function __construct($_id)
	{
		$this->id = $_id;
		$this->dbConnect = new SQLConnect();
	}

	//method om content uit de DB te halen
	function getContent($_name)
	{
		$row = $this->dbConnect->saveQuery("SELECT " . $_name . " FROM cms_artikelen WHERE id = " . $this->id . "");
		return $row[$_name];
	}

	//method om statische blokken op te halen
	function getStatic($_name)
	{
		$_name = basename($_name);
		include 'static/' . $_name . ".php";
	}

}
