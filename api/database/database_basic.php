<?php
$projectName = "PizzaExpress";
$config = $_SERVER['DOCUMENT_ROOT'].'/'.$projectName."/config.php";
require($config);
mysql_query("set name 'UTF8'");

class Database{
	
	function start(){
		$dbName = MYSQLNAME;
		$host = 'localhost';
		$port = "3306";
		$user = DBUSER;
		$pwd = DBPASSWORD;
		
		$link = mysql_connect($host . ":" . $port, $user, $pwd);

		if (!$link) {
			print("Connect Server Failed");
		    die("Connect Server Failed: " . mysql_error());
		}

		if (!mysql_select_db($dbName, $link)) {
			print("Select Database Failed");
		    die("Select Database Failed: " . mysql_error($link));
		}
		mysql_query("set name 'UTF8'");
		mysql_query("set character set 'UTF8'");
		return $link;
	}

	public function execute_sql($type, $sql){
		$result = -1;
		mysql_query("set name 'UTF8'");
		mysql_query("set character set 'UTF8'");
		switch($type){
		case "insert":
			$result = $this->_insert_data($sql);
			break;
		case "delete":
			$result = $this->_delete_data($sql);
			break;
		case "update":
			$result = $this->_update_data($sql);
			break;
		case"select":
			$result = $this->_select_data($sql);
			break;
		default:
			$result = "no execution";
		}
		return $result;
	}
	private function _insert_data($sql){
	      if(!mysql_query($sql)){
	        return 0;    
	
	    }else{
	          if(mysql_affected_rows()>0){
	              return 1; 
	          }else{
	              return 2;  
	          }
	    }
	}
	
	private function _delete_data($sql){
	      if(!mysql_query($sql)){
	        return 0;   
	      }else{
	          if(mysql_affected_rows()>0){
	              return 1;   
	          }else{
	              return 2;   
	          }
	    }
	}
	
	private function _update_data($sql){
	      if(!mysql_query($sql)){
	        return 0;   
	    }else{
	          if(mysql_affected_rows()>0){
	              return 1;  
	          }else{
	              return 2;   
	          }
	    }
	}
	
	private function _select_data($sql){
	    $ret = mysql_query($sql);
	    return $ret;
	}
}
?>