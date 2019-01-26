<?php

class db
{
    public $connect;

	public function __construct()
    {
		$this->connect = $this->dbSelect();
	}

	public function dbConnectOpen()
    {
		$connect = mysqli_connect(dbHost, dbUser, dbPass);
		return $connect;
	}

	public function dbSelect()
    {
		$connect = $this->dbConnectOpen();
		$db_select = mysqli_select_db($connect, dbName);

		return $connect;
	}

	public function dbConnectClose()
    {
		mysqli_close($this->connect);
	}

	public function sqlExec($cmd)
    {
		mysqli_query($this->connect, "SET NAMES utf8");
		$sqlQueryResult = mysqli_query($this->connect, $cmd);

		return $sqlQueryResult;
	}

	public function getLastInsert($table, $fieldName)
    {
		$sql_cmd = "SELECT * FROM `".$table."` ORDER BY `".$fieldName."` ASC";
        $sql_res = $this->sqlExec($sql_cmd);
		$sql_num = mysqli_num_rows($sql_res);
		if($sql_num!==0) {
			while($sql_row = mysqli_fetch_array($sql_res)) {
				$ops = $sql_row[$fieldName];
			}
			$preReturnResult = $ops;
		}else {
			$preReturnResult = 0;
		}

		return $preReturnResult;
	}

}

