<?php

class SQLConnect {
	var $usr;
    var $pwd;
	var $db;
    var $host;
	var $mysqli;
	
	function __construct(){
		$this->usr = "root";
		$this->pwd = "umlaut";
		$this->db = "gss";
		$this->host = "localhost";
		$this->mysqli = new mysqli($this->host, $this->usr, $this->pwd, $this->db);
	}
	
	function escapeInput($_in){
		return $this->mysqli->real_escape_string($_in);	
	}
	
	function queryDB($_q){
		if(!$result = $this->mysqli->query($_q)){
			echo $this->mysqli->error;
		}
		//var_dump(
		return $result;	
	}
	
	function saveQuery($_q){
		$this->queryDB($this->escapeInput($_q));
	}
	
}

class PageHandle {
	var $dbConnect;//voor het escapen van input

	function __construct(){
			$this->dbConnect = new SQLConnect();
			
	}
	
	function relocate($_dest){
		if($_dest == "cms"){
			$loc = "cms.php";
		}else if($_dest == "home"){
			$loc = "voo/";
		}
		header("location: ".$loc);
	}
	
	function handleGET($_var){
		
		if($_var == 'id'){
			if(is_numeric($_GET['id'])){
				//nummer opgegeven in GET
				$clean_ID = $this->dbConnect->escapeInput($_GET['id']);
				//numeric zou al voldoende moeten zijn, maar ALTIJD input scrubben
				return $clean_ID;		
			}else if(!$_GET){
				//geen GET data -> geland op de site
				return 0;					
			}else {
				//ongeldige GET data
				return 0;
			}
		}
		
	}
}

class Page {
	var $id;
	var $dbConnect;
		
	function __construct(){
		$this->id = 1;
		$this->dbConnect = new SQLConnect();
	}
	
	function setID($_id){
		$this->id = $_id;
	}
	
	//method om content uit de DB te halen
	function getContent($_name){
		$return = $this->dbConnect->queryDB("SELECT ".$_name." FROM cms_artikelen WHERE id = ".$this->id."");
		$row = $return->fetch_assoc();
		return $row[$_name];
	}
		
	//method om statische blokken op te halen
	function getStatic($_name){
		$_name = basename($_name);
		include 'static/' . $_name . ".php";
	}

}

class CMS {
	var $dbConnect;
	
	function __construct(){
		$this->dbConnect = new SQLConnect();
	}
	
	function getArticles(){
		$result = $this->dbConnect->queryDB("SELECT * FROM cms_artikelen");
		while ($row = $result->fetch_assoc()) {
			echo '
			<div class="cms_entry">
				<a href="index.php?id='.$row['id'].'"><b>'.$row['title'].'</b></a> | <a href="edit.php?mode=2&id='.$row['id'].'">edit</a> | <a href="edit.php?mode=3&id='.$row['id'].'">delete</a><br><br>
				<p>
					'.$row['html'].'
				</p>
			</div>			
			';
		}
	}	
	
	function deleteArticle($_id){
		$this->dbConnect->saveQuery("DELETE FROM cms_artikelen WHERE id = ".$_id);
	}
	
	function addArticle($_valuesString) {
		$this->dbConnect->queryDB("INSERT INTO cms_artikelen VALUES ".$_valuesString."");
	}
	
	function updateArticle($_valuesString, $_id) {
		$this->dbConnect->queryDB("UPDATE cms_artikelen SET ".$_valuesString." WHERE id = ".$_id."");
	}
}
