<?php

class Mysql{
	private $query_count = 0;
	private $config;
	/**
	 * @var mysqli
	 */
	private $driver = null;

	/*
	$db['hostname'] = 'localhost';
	$db['username'] = 'root';
	$db['password'] = '123456';
	$db['database'] = 'cur';
	$db['dbprefix'] = 'c_';
	$db['db_debug'] = true;
	$db['char_set'] = 'utf8';
	*/
	function __construct() {
		$this->set_config();
		$this->driver = mysqli_connect( $this->config['hostname'], $this->config['username'], $this->config['password'] );
		if ( ! $this->driver ) {
			$this->debug( "数据库连接错误", true );
		}
		$this->query( 'SET NAMES ' . $this->config['char_set'] );
		$this->query( 'SET CHARACTER_SET_CLIENT=' . $this->config['char_set'] );
		$this->query( 'SET CHARACTER_SET_RESULTS=' . $this->config['char_set'] );
		if ( ! mysqli_select_db( $this->driver, $this->config['database'] ) ) {
			$this->debug( "无法选择数据库，或数据库" . $this->config['database'] . "不存在。", true );
		}
	}

	private function set_config() {
		global $config;
		$this->config = array();
		$this->config = $config['db'];
	}

	public function query( $sql ) {
		$this->query_count ++;

		return mysqli_query( $this->driver, $sql );
	}

	public function select( $table, $list = '*', $where = '1' ) {
		$sql = "SELECT " . $list . " FROM `" . $this->config['dbprefix'] . $table . "` WHERE " . $where;

		return $this->sql_to_arr( $sql );
	}

	public function update( $table, $name_value, $while = 1 ) {
		$setStr = null;
		foreach ( $name_value as $name => $value ) {
			$setStr .= "`" . $name . "`='" . $value . "',";
		}
		$setStr = substr( $setStr, 0, - 1 );
		$sql = "UPDATE `" . $this->config['dbprefix'] . $table . "` SET $setStr WHERE " . $while;
		if ( ! $this->query( $sql ) ) {
			$this->debug( "更新数据失败" );

			return false;
		}

		return true;
	}

	public function insert( $table, $v ) {
		$sql_name = '';
		$sql_value = '';
		foreach ( $v as $name => $value ) {
			$sql_name .= "`" . $name . "`,";
			$sql_value .= "\"" . $value . "\",";
		}
		$sql_name = substr( $sql_name, 0, - 1 );
		$sql_value = substr( $sql_value, 0, - 1 );
		$sql = "INSERT INTO `" . $this->config['dbprefix'] . $table . "` ($sql_name) VALUES ($sql_value)";
		if ( $this->query( $sql ) ) {
			return true;
		} else {
			$this->debug( "插入数据失败" );

			return false;
		}
	}

	private function debug( $title = '', $close = false ) {
		if ( $this->config['db_debug'] ) {
			echo "<div id=\"database_error\">", $title ? "<h2>$title</h2>" : "", mysql_error(), "</div>";
		}
		if ( $close ) {
			exit;
		}
	}

	private function sql_to_arr( $sql ) {
		$return = array();
		$result = $this->query( $sql );
		if ( ! $result ) {
			$this->debug( "数据选择失败" );
		}
		$i = 0;
		while( $row = mysqli_fetch_array( $result ) ){
			$j = 0;
			foreach ( $row as $name => $value ) {
				unset( $row[ $j ++ ] );
			}
			$return[ $i ] = $row;
			$i ++;
		}

		return $return;
	}
}

?>